<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sanpham;
use App\Models\LoaiSp;
use User;
use DB;
use Str;
class AdminSanpham extends Controller
{
    public function them(Request $request)
    {
    $ncc = DB::table('users')
            ->join('roles', 'roles.id', '=', 'users.id_role')
            ->select('users.*')
            ->where('users.id_role','=',2)
            ->get();
  
        return view(
            'admin.sanpham.them',
            [

                'loais' => LoaiSp::all(),
                'nccs'  => $ncc

            ]
        );
    }

    
    public function luu(Request $request)
    {
        $this->validate(
            $request,
            [
                'Tensanpham'     =>     'required|unique:san_pham,Tensanpham',
                'Soluongsp' =>     'required',
                'Hinhanh'            =>     'required',
                'Giaban'        =>     'required',
                'Gianhap'   =>     'required',
            ],
            [
                'Tensanpham.required'       => 'Bạn chưa nhập sản phẩm',
                'Tensanpham.unique'         => 'Sản phẩm đã tồn tại',
                'Soluongsp.required'   => 'Bạn chưa nhập số lượng sản phẩm',
                'Hinhanh.required'              => 'Bạn chưa nhập hình ảnh',
                'Giaban.required'          => 'Bạn chưa nhập giá bán',
                'Gianhap.required'     => 'Bạn chưa nhập giá nhập',
            ]
        );
        $sanpham = new Sanpham();
        $sanpham->fill($request->all());
        $sanpham->Sokhung = Str::random(5);
        if ($request->hasFile('Hinhanh')) {
            $file = $request->file('Hinhanh');
            $name = $file->getClientOriginalName();
            $Hinh = Str::random(2) . '--' . $name;
            $file->move('upload/sanpham', $Hinh);
            $sanpham->Hinhanh = $Hinh;
        } else {
            $sanpham->Hinhanh = "";
        }

                $sanpham->save();
            

            return redirect('admin/sanpham/danhsach')->with('thongbao', 'Thêm thành công');
        
    }
    public function sua(Request $request, $id)
    {
        $ncc = DB::table('users')
        ->join('roles', 'roles.id', '=', 'users.id_role')
        ->select('users.*')
        ->where('users.id_role','=',2)
        ->get();
        return view(
            'admin.sanpham.sua',
            [

                'sanpham' => Sanpham::findOrFail($id),
                'loais' => LoaiSp::all(),
                'nccs'  => $ncc

            ]
        );
    }
    public function luuSua(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'Tensanpham'     =>     'required',
                'Soluongsp' =>     'required',
                'Giaban'        =>     'required',
                'Gianhap'   =>     'required',
            ],
            [
                'Tensanpham.required'       => 'Bạn chưa nhập sản phẩm',
                'Soluongsp.required'   => 'Bạn chưa nhập số lượng sản phẩm',
                'Giaban.required'          => 'Bạn chưa nhập giá bán',
                'Gianhap.required'     => 'Bạn chưa nhập giá nhập',
            ]
        );
        $sanpham = Sanpham::findOrFail($id);
        $sanpham->update($request->all());
        if ($request->hasFile('Hinhanh')) {
            $file = $request->file('Hinhanh');
            $name = $file->getClientOriginalName();
            $Hinh = Str::random(2) . '--' . $name;
            $file->move('upload/sanpham', $Hinh);
            $sanpham->Hinhanh = $Hinh;
        }
        $sanpham->save();
            return redirect('admin/sanpham/danhsach')->with('thongbao', 'Sửa thành công');
        
    }
    public function danhsach(Request $request){
        $sanpham = DB::table('san_pham')
            ->join('loai_sps', 'loai_sps.id', '=', 'san_pham.id_loai')
            ->join('users', 'users.id', '=', 'san_pham.id_ncc')
            ->select('*','san_pham.id as id_sp')
            ->where('users.id_role','=',2)
            ->orderBy('san_pham.id', 'DESC')
            ->paginate(5);
            return view(
                'admin.sanpham.danhsach',
                [
    
                    'sanphams' => $sanpham
    
                ]
        );
    }
    public function xoa($id)
    {
        $sanpham =  Sanpham::findOrFail($id);
        $sanpham->delete();
        return redirect('admin/sanpham/danhsach')->with('thongbao', 'Xóa thành công');
    }
        public function timkiem(Request $request)
    {
        $search = $request->sp;
         $sanpham =    DB::table('san_pham')
                        ->join('loai_sps', 'loai_sps.id', '=', 'san_pham.id_loai')
                        ->join('users', 'users.id', '=', 'san_pham.id_ncc')
                        ->select('*','san_pham.id as id_sptk')
                        ->where(function($query) use ($search){ 
                            if($search != ''){
                                $query->where('san_pham.Tensanpham', 'LIKE', '%'.$search.'%')
                                    ->orwhere('users.name', 'LIKE', '%'.$search.'%');
                        }
                        })
            ->paginate(6);
            return view(
                'admin.sanpham.timkiem',
                [
    
                    'sanphams' => $sanpham
    
                ]
            );
    }
}
