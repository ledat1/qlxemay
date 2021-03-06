<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use DB;
use Str;
use Hash;
class AdminNCC extends Controller
{
    public function them(Request $request)
    {
        return view('admin.NCC.them');
    }
    public function luu(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|unique:users,name|min:3|max:100',
                'email' => 'required|unique:users',
                'SDT' => 'required|unique:users',
                'image_name' => 'required'
            ],
            [
                'name.required' => 'Bạn chưa nhập họ tên',
                'name.unique'   => 'Tên nhà cung cấp đã tồn tại',
                'email.required' => 'Bạn chưa nhập email',
                'name.unique'   => 'Email đã tồn tại',
                'Diachi.required' => 'Bạn chưa nhập địa chỉ',
                'SDT.required' => 'Bạn chưa nhập số điện thoại',
                'SDT.unique'   => 'Số điện thoại đã tồn tại',
                'image_name.required' => 'Bạn chưa nhập hình ảnh',
            ]
        );
        $user = new User();
        $user->fill($request->all());
        $user->password = Hash::make(123456);
        $user->id_role  = 2;
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
        return redirect('admin/nhacungcap/danhsach')->with('thongbao', 'Thêm thành công');
    }

    public function sua(Request $request, $id)
    {
        return view(
            'admin.NCC.sua',
            [

                'ncc' => User::findOrFail($id),

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
        $user->STK = $request->STK;
        $user->Nganhang = $request->Nganhang;
        $user->id_role = 2;
        if ($request->hasFile('image_name')) {
            $file = $request->file('image_name');
            $name = $file->getClientOriginalName();
            $Hinh = Str::random(2) . '--' . $name;
            $file->move('upload/slide', $Hinh);
            unlink('upload/slide/' . $user->image_name);
            $user->image_name = $Hinh;
        }
        $user->save();
        return redirect('admin/nhacungcap/danhsach')->with('thongbao', 'Sửa thành công');
    }
    public function danhsach(Request $request)
    {
        $ncc =  DB::table('users')
        ->join('roles', 'roles.id', '=', 'users.id_role')
        ->select('users.*')
        ->where('users.id_role','=',2)
        ->paginate(5);
        return view(
            'admin.NCC.danhsach',
            [
               'nccs'  => $ncc

            ]
        );
    }
    public function xoa($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('admin/nhacungcap/danhsach')->with('thongbao', 'Xóa thành công');
    }
     public function timkiem(Request $request)
    {
        $ncc = DB::table('users')->select('*')
        ->where('name', 'like', '%' . $request->nccap . '%')
        ->where('id_role',2)
        ->paginate(5);
        return view(
            'admin.NCC.timkiem',
            [

                'nccs' => $ncc

            ]
        );
    }
}
