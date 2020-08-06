<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Baohanh;
use App\Models\Sanpham;
use App\Models\Khachhang;
use DB;
class AdminBaoHanh extends Controller
{   
    public function them(Request $request)
    {
    $sanpham = Sanpham::all();
        return view(
            'admin.baohanh.them',
            [

                'sanphams'  => $sanpham,
                'khachhangs' => Khachhang::all()

            ]
        );
    }
    public function luu(Request $request){
        $this->validate(
            $request,
            [
                'id_spbh'   =>     'required',
                'Soluongbh'     =>     'required',
                'Ngaybatdau'     =>     'required',
                'Ngayketthuc'     =>     'required',
                'Nguyennhan'     =>     'required',
                'id_kh'          =>     'required',
            ],
            [
                'Soluongbh.required'       => 'Bạn chưa nhập số lượng',
                'id_spbh.required'       => 'Bạn chưa chọn sản phẩm',
                'Ngaybatdau.required'       => 'Bạn chưa chọn ngày bắt đầu',
                'Ngayketthuc.required'       => 'Bạn chưa chọn ngày kết thúc',
                'Nguyennhan.required'       => 'Bạn chưa nhập nguyên nhân',
                'id_kh.required'           => 'Bạn chưa chọn khách hàng',
            ]
        );

        
        $input = [
            'Soluongbh' => $request->Soluongbh,
            'Nguyennhan' => $request->Nguyennhan,
            'id_spbh' => $request->id_spbh,
            'Ngaybatdau' => $request->Ngaybatdau,
            'Ngayketthuc' => $request->Ngayketthuc,
            'id_kh'     => $request->id_kh,
    ];
    $thembaohanh = DB::table('bao_hanh')->insert($input);
    return redirect('admin/baohanh/danhsach')->with('thongbao', 'Thêm thành công');
}
public function sua(Request $request, $id)
{
    return view(
        'admin.baohanh.sua',
        [

            'baohanh' => Baohanh::findOrFail($id),
            'sanphams'   =>  $sanpham = Sanpham::all()

        ]
    );
}

    public function danhsach(Request $request){
        $sanphambh = DB::table('bao_hanh')
            ->join('san_pham', 'san_pham.id', '=', 'bao_hanh.id_spbh')
            ->join('khach_hang', 'khach_hang.id', '=', 'bao_hanh.id_kh')
            ->select('bao_hanh.*','san_pham.*','khach_hang.*','bao_hanh.id as id_bh')
            ->paginate(5);
            return view(
                'admin.baohanh.danhsach',
                [
    
                    'sanphambhs' => $sanphambh
    
                ]
        );
    }
    public function xoa(Request $request,$id)
    {
        $sanpham =  Baohanh::findOrFail($id);
        $sanpham->delete();
        return redirect('admin/baohanh/danhsach')->with('thongbao', 'Xóa thành công');
    }

    public function timkiem(Request $request)
    {
        $search = $request->spbh;
        $sanpham =    DB::table('hoa_don')
                        ->join('khach_hang', 'khach_hang.id', '=', 'hoa_don.id_khachhang')
                        ->join('users', 'users.id', '=', 'hoa_don.id_nhanvien')
                        ->select('*','hoa_don.id as id_hoadon','khach_hang.created_at as ngaymuahang')
                        ->where(function($query) use ($search){ 
                            if($search != ''){
                                $query->where('khach_hang.Sodienthoai', 'LIKE', '%'.$search.'%');
                        }
                        })
            ->paginate(6);
            return view(
                'admin.baohanh.timkiem',
                [
    
                    'sanphams' => $sanpham
    
                ]
            );
    }
    public function timkiem2(Request $request)
    {
        $search = $request->spbh2;
        $sanpham =    DB::table('bao_hanh')
                        ->join('khach_hang', 'khach_hang.id', '=', 'bao_hanh.id_kh')
                        ->join('san_pham', 'san_pham.id', '=', 'bao_hanh.id_spbh')
                        ->select('*','bao_hanh.id as id_bh','khach_hang.created_at as ngaymuahang')
                        ->where(function($query) use ($search){ 
                            if($search != ''){
                                $query->where('khach_hang.Hoten', 'LIKE', '%'.$search.'%')
                                ->orWhere('khach_hang.Sodienthoai', 'LIKE', '%'.$search.'%');
                        }
                        })
            ->paginate(6);
            return view(
                'admin.baohanh.timkiem2',
                [
    
                    'sanphams' => $sanpham
    
                ]
            );
    }
}
