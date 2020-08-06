<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\User;
use App\Models\Hoadon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    public function layMatKhau(Request $request)
    {

        return view('admin.taikhoan.matkhau');
    }
    public function doiMatKhau(Request $request)
    {
        $request->validate(
            [
                're_password' => 'required|same:password'
            ],
            [
                're_password.same' => 'Mật khẩu không trùng nhau',
              

            ]
        );
        $user = User::find(Auth::user()->id);

        $user->password = Hash::make($request->password);

        $user->save();
  
        return redirect('admin/laymatkhau')->with('thongbao', 'Sửa thành công');
    }
    public function hoaDonNhanVien(Request $request)
    {
        $hoadon = DB::table('hoa_don')
        ->join('khach_hang', 'khach_hang.id', '=', 'hoa_don.id_khachhang')
        ->join('users', 'users.id', '=', 'hoa_don.id_nhanvien')
        ->select('*','hoa_don.id as id_hoadon')
        ->where('users.id','=',Auth::user()->id)
        ->paginate(7);

        return view('phanquyen.hoadon',['hoadons' => $hoadon]);
    }

    public function xoaHoaDon(Request $request,$id){
        $theloai = Hoadon::findOrFail($id);
        $theloai->delete();
        return redirect('admin/nhanvien/hoadon')->with('thongbao', 'Xóa thành công');
    }
    
    public function sanPhamNCC(Request $request){
        $sanpham = DB::table('san_pham')
        ->join('loai_sps', 'loai_sps.id', '=', 'san_pham.id_loai')
        ->join('users', 'users.id', '=', 'san_pham.id_ncc')
        ->select('*','san_pham.id as id_sp')
        ->where('users.id','=',Auth::user()->id)
        ->orderBy('san_pham.id', 'DESC')
        ->paginate(5);
        return view(
            'phanquyen.sanphamncc',
            [

                'sanphams' => $sanpham

            ]
    );

    }
    public function TimKiemHoaDonNhanVien(Request $request)
    {
        $search = $request->hoadonnv;
        $hoadon =    DB::table('hoa_don')
                    ->join('khach_hang', 'khach_hang.id', '=', 'hoa_don.id_khachhang')
                    ->join('users', 'users.id', '=', 'hoa_don.id_nhanvien')
                    ->select('*','hoa_don.id as id_hoadon')
                        ->where(function($query) use ($search){ 
                            if($search != ''){
                                $query->where('khach_hang.Hoten', 'LIKE', '%'.$search.'%')
                                    ->orwhere('users.name', 'LIKE', '%'.$search.'%');
                        }
                        })->where('users.id','=',Auth::user()->id)
            ->paginate(6);
            return view(
                'phanquyen.timkiemhoadon',
                [
    
                    'hoadons' => $hoadon
    
                ]
            );
    }
}
