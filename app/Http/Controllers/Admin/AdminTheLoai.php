<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Loaisp;
class AdminTheLoai extends Controller
{   
    public function them(Request $request)
    {
        return view('admin.LoaiSp.them');
    }
    public function luu(Request $request)
    {
        $request->validate(
            [
                'Tenloaisanpham' => 'required|unique:loai_sps,Tenloaisanpham|min:3|max:100'
            ],
            [
                'Tenloaisanpham.required' => 'Bạn chưa nhập thể loại',
                'Tenloaisanpham.unique'   => 'Tên thể loại đã tồn tại',
                'Tenloaisanpham.min'      => 'Tên từ 3 đến 100 kí tự',
                'Tenloaisanpham.max'      => 'Tên từ 3 đến 100 kí tự',

            ]
        );
        Loaisp::create($request->all());
        return redirect('admin/theloai/danhsach')->with('thongbao', 'Thêm thành công');
    }
    public function sua($id)
    {

        return view(

            'admin.LoaiSp.sua',
            [

                'theloai'   => Loaisp::findOrFail($id),

            ]
        );
    }
    public function luuSua(Request $request, $id)
    {
        $theloai = Loaisp::findOrFail($id);
        $this->validate(
            $request,
            [
                'Tenloaisanpham' => 'required|unique:loai_sps,Tenloaisanpham|min:3|max:100'
            ],
            [
                'Tenloaisanpham.required' => 'Bạn chưa nhập thể loại',
                'Tenloaisanpham.unique'   => 'Tên thể loại đã tồn tại',
                'Tenloaisanpham.min'      => 'Tên từ 3 đến 100 kí tự',
                'Tenloaisanpham.max'      => 'Tên từ 3 đến 100 kí tự',

            ]
        );

        $theloai->update($request->all());
        $theloai->save();
        return redirect('admin/theloai/danhsach')->with('thongbao', 'Sửa thành công');
    }
    public function danhsach(Request $request)
    {

        return view(

            'admin.LoaiSp.danhsach',
            [

                'loais' =>  Loaisp::paginate(5)

            ]
        );
    }
    public function xoa($id)
    {
        $theloai = Loaisp::findOrFail($id);
        $theloai->delete();
        return redirect('admin/theloai/danhsach')->with('thongbao', 'Xóa thành công');
    }
    public function timkiem(Request $request)
    {
        return view(
            'admin.LoaiSp.timkiem',
            [

                'loais' => Loaisp::where('Tenloaisanpham', 'like', '%' . $request->lsp . '%')->paginate(5)

            ]
        );
    }

}
