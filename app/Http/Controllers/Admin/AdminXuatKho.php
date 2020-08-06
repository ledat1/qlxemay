<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Xuatkho;
use App\Models\Sanpham;
class AdminXuatKho extends Controller
{
    public function them(Request $request)
    {
    $ncc = DB::table('users')
            ->join('roles', 'roles.id', '=', 'users.id_role')
            ->select('users.*')
            ->where('users.id_role','=',2)
            ->get();
  
        return view(
            'admin.xuatkho.them',
            [

                'sanphams' => Sanpham::all(),
                'nccs'  => $ncc

            ]
        );
    }
    public function luu(Request $request){
        $this->validate(
            $request,
            [
                'id_spxuat'   =>     'required',
                'Soluongxuat'     =>     'required',
                'TenKH'     =>     'required',
                'Diachi'     =>     'required',
                'SDTKH'     => 'required'
            ],
            [
                'Soluongxuat.required' => 'Bạn chưa nhập số lượng',
                'id_spxuat.required'   => 'Bạn chưa chọn sản phẩm',
                'SDTKH.required'       => 'Bạn chưa nhập sđt',
                'TenKH.required'       => 'Bạn chưa nhập tên khách hàng',
                'Diachi.required'      => 'Bạn chưa nhập địa chỉ',
            ]
        );
        
        $input = [
            'Soluongxuat' => $request->Soluongxuat,
            'id_spxuat' => $request->id_spxuat,
            'TenKH'   => $request->TenKH,
            'Diachi'    =>  $request->Diachi,
            'SDTKH'     => $request->SDTKH,
            'Thoigianxuat' => $request->Thoigianxuat,
    ];
    $checksanpham = DB::table('san_pham')->select('*')->where('id', $request->id_spxuat)->first();

    if($request->Soluongxuat > $checksanpham->Soluongsp){
        return redirect('admin/xuatkho/danhsach')->with('thongbao', 'Không đủ số lượng trong kho');
    }else{
        $themxuatkho = DB::table('xuat_sp')->insert($input);
        $check =  DB::getPdo('xuat_sp')->lastInsertId();
        $layspxuatkho =  DB::table('xuat_sp')->select('*')->where('id', $check)->first();
        $checksanpham = DB::table('san_pham')->select('*')->where('id', $layspxuatkho->id_spxuat)->first();
        $thanhtien = $checksanpham->Giaban * $layspxuatkho->Soluongxuat;
        $soluongsp = $checksanpham->Soluongsp - $layspxuatkho->Soluongxuat;
        $config = [
            'Thanhtien' => $thanhtien
          ];
          $updatexuatkho =  DB::table('xuat_sp')->where('id',$check)->update($config);
        $config2 = [
            'Soluongsp' => $soluongsp
        ];
        $updatesp =  DB::table('san_pham')->where('id',$layspxuatkho->id_spxuat)->update($config2);
        return redirect('admin/xuatkho/danhsach')->with('thongbao', 'Thêm thành công');
    }

    
}
    public function danhsach(Request $request){
        $xuatkho = DB::table('san_pham')
            ->join('users', 'users.id', '=', 'san_pham.id_ncc')
            ->join('xuat_sp', 'san_pham.id', '=', 'xuat_sp.id_spxuat')
            ->select('*','xuat_sp.id as id_xuat')
            ->paginate(5);
            return view(
                'admin.xuatkho.danhsach',
                [
    
                    'xuatkhos' => $xuatkho
    
                ]
        );
    }
    public function xoa($id)
    {
        $xuatkho =  Xuatkho::findOrFail($id);
        $xuatkho->delete();
        return redirect('admin/xuatkho/danhsach')->with('thongbao', 'Xóa thành công');
    }
    public function timkiem(Request $request)
    {
        $search = $request->spxk;
        $sanpham =    DB::table('san_pham')
                        ->join('users', 'users.id', '=', 'san_pham.id_ncc')
                        ->join('xuat_sp', 'san_pham.id', '=', 'xuat_sp.id_spxuat')
                        ->select('*','xuat_sp.id as id_xuat')
                        ->where(function($query) use ($search){ 
                            if($search != ''){
                                $query->where('san_pham.Tensanpham', 'LIKE', '%'.$search.'%')
                                    ->orwhere('xuat_sp.TenKH', 'LIKE', '%'.$search.'%');
                        }
                        })
            ->paginate(7);
            return view(
                'admin.xuatkho.timkiem',
                [
    
                    'xuatkhos' => $sanpham
    
                ]
            );
    }
    public function timkiem2(Request $request)
    {
        $search = $request->spxk3;
        $sanpham =    DB::table('san_pham')
                        ->join('users', 'users.id', '=', 'san_pham.id_ncc')
                        ->join('xuat_sp', 'san_pham.id', '=', 'xuat_sp.id_spxuat')
                        ->select('*','xuat_sp.id as id_xuat')
                        ->where(function($query) use ($search){ 
                            if($search != ''){
                                $query->where('xuat_sp.Thoigianxuat', 'LIKE', '%'.$search.'%');
                        }
                        })
            ->paginate(7);
            return view(
                'admin.xuatkho.timkiem2',
                [
    
                    'xuatkhos' => $sanpham
    
                ]
            );
    }
}
