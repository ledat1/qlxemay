<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use DB;
use Str;
use Hash;

class AdminNhanVien extends Controller
{
    public function them(Request $request)
    {
        return view('admin.nhanvien.them');
    }
    public function luu(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|unique:users,name|min:3|max:100',
                'email' => 'required|unique:users',
                'Diachi' => 'required',
                'SDT' => 'required|unique:users',
                'image_name' => 'required'
            ],
            [
                'name.required' => 'Bạn chưa nhập họ tên',
                'name.unique'   => 'Tên nhân viên đã tồn tại',
                'email.required' => 'Bạn chưa nhập email',
                'Diachi.required' => 'Bạn chưa nhập địa chỉ',
                'SDT.required' => 'Bạn chưa nhập số điện thoại',
                'SDT.unique'   => 'Số điện thoại đã tồn tại',
                'image_name.required' => 'Bạn chưa nhập hình ảnh',
            ]
        );
        $user = new User();
        $user->fill($request->all());
        $user->password = Hash::make(123456);
        $user->id_role  = 3;
        if ($request->hasFile('image_name')) {

            $file = $request->file('image_name');
            $name = $file->getClientOriginalName();
            $Hinh = Str::random(2) . '--' . $name;
            $file->move('upload/slide', $Hinh);
            $user->image_name = $Hinh;
          } else {
      
            $user->image_name = "";
          }
          $user->save();
        return redirect('admin/nhanvien/danhsach')->with('thongbao', 'Thêm thành công');
    }
    public function danhsach(Request $request)
    {
        $nhanvien =  DB::table('users')
        ->join('roles', 'roles.id', '=', 'users.id_role')
        ->select('users.*')
        ->where('users.id_role','=',3)
        ->paginate(5);
        return view(
            'admin.nhanvien.danhsach',
            [
               'nhanviens'  => $nhanvien

            ]
        );
    }
    public function sua(Request $request, $id)
    {
        return view(
            'admin.nhanvien.sua',
            [

                'nhanvien' => User::findOrFail($id),

            ]
        );
    }
    public function luuSua(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required',
                'Diachi' => 'required',
                'SDT' => 'required'
            ],
            [
                'name.required' => 'Bạn chưa nhập họ tên',
                'email.required' => 'Bạn chưa nhập email',
                'Diachi.required' => 'Bạn chưa nhập địa chỉ',
                'SDT.required' => 'Bạn chưa nhập số điện thoại',
            ]
        );
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->Diachi = $request->Diachi;
        $user->SDT = $request->SDT;
        $user->id_role = 3;
        if ($request->hasFile('image_name')) {
            $file = $request->file('image_name');
            $name = $file->getClientOriginalName();
            $Hinh = Str::random(2) . '--' . $name;
            $file->move('upload/slide', $Hinh);
            unlink('upload/slide/' . $user->image_name);
            $user->image_name = $Hinh;
        }
        $user->save();
        return redirect('admin/nhanvien/danhsach')->with('thongbao', 'Sửa thành công');
    }
    public function xoa($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('admin/nhacungcap/danhsach')->with('thongbao', 'Xóa thành công');
    }
    public function timkiem(Request $request)
    {
        $nhanvien =  DB::table('users')->select('*')
        ->where('name', 'like', '%' . $request->nv . '%')
        ->where('id_role',3)
        ->paginate(5);
        return view(
            'admin.nhanvien.timkiem',
            [

                'nhanviens' => $nhanvien

            ]
        );
    }
}
