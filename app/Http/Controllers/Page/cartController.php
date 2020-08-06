<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;
use Cart;
use App\Models\Khachhang;
use App\Models\Hoadon;
use App\Models\Chitiethoadon;
class cartController extends Controller
{
    public function addCart(Request $request){
        $sanphamid = $request->sanphamid_hidden;
        $quantity = $request->qty;
        $loai = DB::table('loai_sps')->select('*')->get();
        $sanpham_info =  DB::table('san_pham')->select('*')->where('id',$sanphamid )->first();
        $data['id'] = $sanpham_info->id;
        $data['qty'] = $quantity;
        $data['name']  =  $sanpham_info->Tensanpham;
        $data['price'] = $sanpham_info->Giaban;
        $data['weight'] = $sanpham_info->Giakhuyenmai;
        $data['options']['image'] = $sanpham_info->Hinhanh;
        Cart::add($data);
        return redirect('/show-cart')->with('thongbao', 'Thêm thành công');
    
    }
    public function showCart(Request $request){
        $loai = DB::table('loai_sps')->select('*')->get();
        return view(
            'cart.show_cart',
            [
                'theloais' =>  $loai,
            ]
            );
    }
    public function deleteCart(Request $request,$rowId){
        Cart::update($rowId,0);
        return redirect('/show-cart')->with('thongbao', 'Xóa thành công');
    }
    public function add_cart_ajax(Request $request){
        $data = $request->all();
        $session_id = substr(md5(microtime()),rand(0,26),5);
        $cart = Session::get('cart');
        if($cart==true){
            $is_avaiable = 0;
            foreach($cart as $key => $val){
                if($val['id']==$data['cart_product_id']){
                    $is_avaiable++;
                }
            }
            if($is_avaiable == 0){
                $cart[] = array(
                'session_id' => $session_id,
                'Tensanpham' => $data['cart_product_name'],
                'id' => $data['cart_product_id'],
                'Hinhanh' => $data['cart_product_image'],
                'sanpham_qty' => $data['cart_product_qty'],
                'Giaban' => $data['cart_product_price'],
                );
                Session::put('cart',$cart);
            }
        }else{
            $cart[] = array(
                'session_id' => $session_id,
                'Tensanpham' => $data['cart_product_name'],
                'id' => $data['cart_product_id'],
                'Hinhanh' => $data['cart_product_image'],
                'sanpham_qty' => $data['cart_product_qty'],
                'Giaban' => $data['cart_product_price'],

            );
            Session::put('cart',$cart);
        }
       
        Session::save();

    }
    public function gio_hang(Request $request){
        $loai = DB::table('loai_sps')->select('*')->get();
        return view(
            'cart.cart_ajax',
            [
                'theloais' =>  $loai,
            ]
            );
    
    }
    public function deleteSp(Request $request,$session_id){
        $cart = Session::get('cart');
            if($cart == true){
                foreach($cart as $key => $value){
                    if($value['session_id'] == $session_id){
                        unset($cart[$key]);
                    }
                }
                Session::put('cart',$cart);
                return redirect()->back()->with('thongbao', 'Xóa thành công');
            }
        }
        public function update_cart_ajax(Request $request){
            $data = $request->all();
            $cart = Session::get('cart');
            if($cart == true){
                foreach($data['cart_qty'] as $key => $qty){
                    foreach($cart as $a => $value){
                        if($value['session_id'] == $key){
                            $cart[$a]['sanpham_qty'] = $qty;

                        }
                    }
                }
                Session::put('cart',$cart);
                return redirect()->back()->with('thongbao', 'Sửa số lượng thành công');
            }else {
                return redirect()->back()->with('thongbao', 'Sửa số lượng thất bại');
            }

        }
        public function datHang(Request $request){
            $nhanvien =  DB::table('users')
            ->join('roles', 'roles.id', '=', 'users.id_role')
            ->select('users.*')
            ->where('users.id_role','=',3)
            ->paginate(5);
            $loai = DB::table('loai_sps')->select('*')->get();
            return view(
                'cart.dathang',
                [   
                    'theloais' =>  $loai,
                    'nhanviens' => $nhanvien,
                ]);
        }
        public function luuDatHang(Request $request){
            $this->validate(
                $request,
                [
                    'Hoten'     =>     'required',
                    'email' =>     'required',
                    'Diachi'            =>     'required',
                    'Sodienthoai'        =>     'required',
                    'id_nhanvien'             => 'required',
                ],
                [
                    'Hoten.required'       => 'Bạn chưa nhập tên',
                    'email.required'         => 'Bạn chưa nhập email',
                    'Diachi.required'   => 'Bạn chưa nhập địa chỉ',
                    'Sodienthoai.required'              => 'Bạn chưa nhập số điện thoại',
                    'id_nhanvien.required'     => 'Bạn chưa chọn nhân viên bán hàng',
                ]
            );
            $cart = Session::get('cart');
          
            $tongtien = 0;
            foreach($cart as $k => $v){
                $thanhtien[] = $v['Giaban']*$v['sanpham_qty'];
                
            }           
            foreach($thanhtien as $key  => $value){
                $tongtien += $value;
            }
            $khachhang = new Khachhang();
            $khachhang->fill($request->all());
            $khachhang->save();

            $hoadon = new Hoadon();
            $hoadon->id_nhanvien = $request->id_nhanvien;
            $hoadon->id_khachhang = $khachhang->id;
            $hoadon->Ngayban = date('Y-m-d');
            $hoadon->Tongtien = $tongtien;
            $hoadon->Ghichu = $request->Ghichu;
            $hoadon->save();
            foreach($cart as $k => $v){
                $chitiethoadon = new Chitiethoadon();
                $chitiethoadon->id_hoadon = $hoadon->id;
                $chitiethoadon->id_spham = $v['id'];
                $chitiethoadon->Soluong = $v['sanpham_qty'];
                $chitiethoadon->Giatien = $v['Giaban'];
                $chitiethoadon->save();

                // $checksanpham = DB::table('san_pham')->where('id', $chitiethoadon->id_spham)->first();
                //     $soluong = $checksanpham->Soluongsp - $chitiethoadon->Soluong;
                    
                //     $config = [
                //         'Soluongsp' => $soluong
                //       ];
                     
                //     $updatesp =  DB::table('san_pham')->where('id',$chitiethoadon->id_spham)->update($config);
                
            }
            Session::forget('cart');
            return redirect()->back()->with('thongbao', 'Đã đặt hàng thành công');
        }
}
