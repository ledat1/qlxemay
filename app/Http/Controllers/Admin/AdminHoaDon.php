<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Khachhang;
use App\Models\Hoadon;
use App\Models\Chitiethoadon;
class AdminHoaDon extends Controller
{
    public function danhsach(Request $request){
        $hoadon = DB::table('hoa_don')
            ->join('khach_hang', 'khach_hang.id', '=', 'hoa_don.id_khachhang')
            ->join('users', 'users.id', '=', 'hoa_don.id_nhanvien')
            ->select('*','hoa_don.id as id_hoadon')
            ->where('users.id_role','=',3)
            ->paginate(7);
            return view(
                'admin.hoadon.danhsach',
                [
    
                    'hoadons' => $hoadon
    
                ]
        );
    }
    public function xemHoaDon(Request $request,$id){
        $chitiethoadon = DB::table('chi_tiet_hoa_don')
        ->join('hoa_don', 'hoa_don.id', '=', 'chi_tiet_hoa_don.id_hoadon')
        ->join('san_pham', 'san_pham.id', '=', 'chi_tiet_hoa_don.id_spham')
        ->select('*','chi_tiet_hoa_don.id as id_cthd')
        ->where('chi_tiet_hoa_don.id_hoadon',$id)
        ->paginate(7);

        return view(
            'admin.hoadon.xemhoadon',
            [

                'chitiethoadons' => $chitiethoadon

            ]
    );
    }
    public function xoa(Request $request,$id){
        $theloai = Hoadon::findOrFail($id);
        $theloai->delete();
        return redirect('admin/hoadon/danhsach')->with('thongbao', 'Xóa thành công');
      
    }
    public function trangthai(Request $request,$id){
        $theloai = Hoadon::findOrFail($id);
        if($theloai->Trangthai == 0){
        $theloai->Trangthai = 1;
        $theloai->save();
        return redirect('admin/hoadon/danhsach')->with('thongbao', 'Duyệt thành công thành công');
        }elseif($theloai->Trangthai == 1){
        $theloai->Trangthai = 0;
        $theloai->save(); 
        return redirect('admin/hoadon/danhsach')->with('thongbao', 'Bỏ duyệt thành công thành công');
        }
        
    }
    public function danhSachKhachHang(Request $request)
    {
        $khachhang = DB::table('hoa_don')
        ->join('khach_hang', 'khach_hang.id', '=', 'hoa_don.id_khachhang')
        ->select('*','khach_hang.id as id_kh')
        ->where('hoa_don.Tongtien', '>', 100000000 )
        ->paginate(7);

     return view(
            'admin.hoadon.khachhang',
            [

                'khachhangs' => $khachhang

            ]
    );
    }
    public function danhSachKhachHang2(Request $request)
    {
        $khachhang = DB::table('hoa_don')
        ->join('khach_hang', 'khach_hang.id', '=', 'hoa_don.id_khachhang')
        ->select('*','khach_hang.id as id_kh')
        ->where('hoa_don.Tongtien', '<', 100000000 )
        ->paginate(7);

     return view(
            'admin.hoadon.khachhang2',
            [

                'khachhangs' => $khachhang

            ]
    );
    }
    public function timkiem(Request $request)
    {
        $search = $request->hoadon;
        $hoadon =    DB::table('hoa_don')
                    ->join('khach_hang', 'khach_hang.id', '=', 'hoa_don.id_khachhang')
                    ->join('users', 'users.id', '=', 'hoa_don.id_nhanvien')
                    ->select('*','hoa_don.id as id_hoadon')
                        ->where(function($query) use ($search){ 
                            if($search != ''){
                                $query->where('khach_hang.Hoten', 'LIKE', '%'.$search.'%')
                                    ->orwhere('users.name', 'LIKE', '%'.$search.'%');
                        }
                        })
            ->paginate(6);
            return view(
                'admin.hoadon.timkiem',
                [
    
                    'hoadons' => $hoadon
    
                ]
            );
    }
    public function timkiem2(Request $request)
    {
        $search = $request->hoadon3;
        $hoadon =    DB::table('hoa_don')
                    ->join('khach_hang', 'khach_hang.id', '=', 'hoa_don.id_khachhang')
                    ->join('users', 'users.id', '=', 'hoa_don.id_nhanvien')
                    ->select('*','hoa_don.id as id_hoadon')
                        ->where(function($query) use ($search){ 
                            if($search != ''){
                                $query->where('hoa_don.Ngayban', 'LIKE', '%'.$search.'%');
                        }
                        })
            ->paginate(6);
            return view(
                'admin.hoadon.timkiem2',
                [
    
                    'hoadons' => $hoadon
    
                ]
            );
    }
    public function timKiemKhachHang(Request $request)
    {
        $search = $request->khtn;
        $khachhang =    DB::table('hoa_don')
                    ->join('khach_hang', 'khach_hang.id', '=', 'hoa_don.id_khachhang')
                    ->join('users', 'users.id', '=', 'hoa_don.id_nhanvien')
                    ->select('*','hoa_don.id as id_hoadon','khach_hang.id as id_kh')
                        ->where(function($query) use ($search){ 
                            if($search != ''){
                                $query->where('khach_hang.Hoten', 'LIKE', '%'.$search.'%');
                                    // ->orwhere('users.name', 'LIKE', '%'.$search.'%');
                        }
                        })->where('hoa_don.Tongtien', '>', 4000000 )
            ->paginate(6);
            return view(
                'admin.hoadon.timkiemkhachhang',
                [
    
                    'khachhangs' => $khachhang
    
                ]
            );
    }
}
