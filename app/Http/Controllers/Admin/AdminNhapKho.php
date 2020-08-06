<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Nhapkho;
use App\Models\Sanpham;
class AdminNhapKho extends Controller
{
    public function them(Request $request)
    {
    $ncc = DB::table('users')
            ->join('roles', 'roles.id', '=', 'users.id_role')
            ->select('users.*')
            ->where('users.id_role','=',2)
            ->get();
  
        return view(
            'admin.nhapkho.them',
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
                'id_spnhap'   =>     'required',
                'Soluongnhap'     =>     'required',
            ],
            [
                'Soluongnhap.required'       => 'Bạn chưa nhập số lượng',
                'id_spnhap.required'       => 'Bạn chưa chọn sản phẩm',
            ]
        );
        
        $input = [
            'Soluongnhap' => $request->Soluongnhap,
            'id_spnhap' => $request->id_spnhap,
            'Thoigiannhap' => $request->Thoigiannhap,
    ];
    $themnhapkho = DB::table('nhap_sp')->insert($input);
    $check =  DB::getPdo('nhap_sp')->lastInsertId();
    $layspnhapkho =  DB::table('nhap_sp')->select('*')->where('id', $check)->first();
    $checksanpham = DB::table('san_pham')->select('*')->where('id', $layspnhapkho->id_spnhap)->first();
    $thanhtien = $checksanpham->Gianhap * $layspnhapkho->Soluongnhap;
    $soluongsp = $checksanpham->Soluongsp + $layspnhapkho->Soluongnhap;
    $config = [
        'thanhtien' => $thanhtien
      ];
      $updatenhapkho =  DB::table('nhap_sp')->where('id',$check)->update($config);
    $config2 = [
        'Soluongsp' => $soluongsp
    ];
    $updatesp =  DB::table('san_pham')->where('id',$layspnhapkho->id_spnhap)->update($config2);
    return redirect('admin/nhapkho/danhsach')->with('thongbao', 'Thêm thành công');
}
public function sua(Request $request, $id)
{
    $ncc = DB::table('users')
    ->join('roles', 'roles.id', '=', 'users.id_role')
    ->select('users.*')
    ->where('users.id_role','=',2)
    ->get();
    return view(
        'admin.nhapkho.sua',
        [

            'nhapkho' => Nhapkho::findOrFail($id),
            'sanphams' => Sanpham::all(),
            'nccs'  => $ncc

        ]
    );
}
public function luuSua(Request $request, $id)
    {  
        $this->validate(
        $request,
        [
            'id_spnhap'   =>     'required',
            'Soluongnhap'     =>     'required',
        ],
        [
            'Soluongnhap.required'       => 'Bạn chưa nhập số lượng',
            'id_spnhap.required'       => 'Bạn chưa chọn sản phẩm',
        ]
    );

              $input = [
            'Soluongnhap' => $request->Soluongnhap,
            'id_spnhap' => $request->id_spnhap,
            'Thoigiannhap' => $request->Thoigiannhap,
    ];
    $nhapkho = Nhapkho::findOrFail($id);
    $checksanpham =  DB::table('san_pham')->select('*')->where('id', $nhapkho->id_spnhap)->first();
    $thanhtien = $checksanpham->Gianhap * $request->Soluongnhap;
    $soluongsp = $checksanpham->Soluongsp - $nhapkho->Soluongnhap;
    $updatesluong = $soluongsp + $request->Soluongnhap;
    $input['Thanhtien'] = $thanhtien;
    $updatenhapkho =  DB::table('nhap_sp')->where('id',$nhapkho->id)->update($input);
    $config = [
        'Soluongsp' => $updatesluong
      ];
      $updatesp =  DB::table('san_pham')->where('id',$nhapkho->id_spnhap)->update($config);
    return redirect('admin/nhapkho/danhsach')->with('thongbao', 'Sửa thành công');
    }

    public function danhsach(Request $request){
        $nhapkho = DB::table('san_pham')
            ->join('users', 'users.id', '=', 'san_pham.id_ncc')
            ->join('nhap_sp', 'san_pham.id', '=', 'nhap_sp.id_spnhap')
            ->select('*','nhap_sp.id as id_nhap')
            // ->where('users.id_role','=',2)
            ->paginate(5);
            return view(
                'admin.nhapkho.danhsach',
                [
    
                    'nhapkhos' => $nhapkho
    
                ]
        );
    }
        public function xoa($id)
    {   
        $Nhapkho =  Nhapkho::findOrFail($id);
        $Nhapkho->delete();
        return redirect('admin/nhapkho/danhsach')->with('thongbao', 'Xóa thành công');
    }
    public function timkiem(Request $request)
    {
        $search = $request->spnk;
        $sanpham =    DB::table('san_pham')
                        ->join('nhap_sp', 'san_pham.id', '=', 'nhap_sp.id_spnhap')
                        ->join('users', 'users.id', '=', 'san_pham.id_ncc')
                        ->select('*','nhap_sp.id as id_nhap')
                        ->where(function($query) use ($search){ 
                            if($search != ''){
                                $query->where('san_pham.Tensanpham', 'LIKE', '%'.$search.'%');
                                    // ->orwhere('users.name', 'LIKE', '%'.$search.'%');
                        }
                        })
            ->paginate(6);
            return view(
                'admin.nhapkho.timkiem',
                [
    
                    'nhapkhos' => $sanpham
    
                ]
            );
    }
    public function timkiem2(Request $request)
    {
            $search = $request->spnk3;
            $sanpham = DB::table('san_pham')
            ->join('nhap_sp', 'san_pham.id', '=', 'nhap_sp.id_spnhap')
            ->join('users', 'users.id', '=', 'san_pham.id_ncc')
            ->select('san_pham.*','nhap_sp.*','users.*','nhap_sp.id as id_nhap')
            ->where(function($query) use ($search){ 
                if($search != ''){
                    $query->where('nhap_sp.Thoigiannhap', 'LIKE', '%'.$search.'%');
            }
            })
        ->paginate(6);
        return view(
        'admin.nhapkho.timkiem2',
        [

        'nhapkhos' => $sanpham

        ]
        );
    }
}
