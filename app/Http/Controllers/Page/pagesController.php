<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LoaiSp;
use App\Models\Sanpham;
use DB;
class pagesController extends Controller
{
    public function trangchu(Request $request){

        $loai = DB::table('loai_sps')->select('*')->get();
        $spmoi = DB::table('san_pham')->select('*')->orderBy('id', 'DESC')->take(8)->get();
        $sphot = DB::table('san_pham')->select('*')->where('hot',1)->take(8)->get();
        return view(
            'page.trangchu',
            [

                'theloais' =>  $loai,
                'sanphammois' => $spmoi,
                'sanphamhots' => $sphot
            ]
        );
    }
    public function laySanPham($id)
    {
        $sphot = DB::table('san_pham')->select('*')->where('hot',1)->take(8)->get();
        $loai = DB::table('loai_sps')->select('*')->get();
        $tl =  DB::table('loai_sps')
            ->join('san_pham', 'loai_sps.id', '=', 'san_pham.id_loai')
            ->select('san_pham.*')
            ->where('loai_sps.id', $id)
            ->paginate(5);

        return view(
            'page.sanphamtl',
            [
                'loais'     =>  LoaiSp::where('id', $id)->first(),
                'theloais' =>  $loai,
                'tls'        =>  $tl,
                'sanphamhots' => $sphot
            ]
        );
    }
    public function chiTietSanPham($id)
    {
        $chitiet  =  DB::table('san_pham')
        ->join('loai_sps', 'loai_sps.id', '=', 'san_pham.id_loai')
        ->join('users', 'users.id', '=', 'san_pham.id_ncc')
        ->select('*','san_pham.id as id_sp')
        ->where('san_pham.id','=',$id)
        ->first();
        $spcungloai =  DB::table('san_pham')
        ->join('loai_sps', 'loai_sps.id', '=', 'san_pham.id_loai')
        ->join('users', 'users.id', '=', 'san_pham.id_ncc')
        ->select('*','san_pham.id as id_sp')
        ->where('san_pham.id_loai','=',$chitiet->id_loai)
        ->whereNotIn('san_pham.id',[$id])
        ->get();
        $loai = DB::table('loai_sps')->select('*')->get();
        return view(
            'page.chitietsanpham',
            [
                'theloais' =>  $loai,
                'chitietsp' => $chitiet,
                'spcungloais' => $spcungloai
            ]
        );
    }
    public function footer(Request $request){

        $loai = DB::table('loai_sps')->select('*')->get();
      
        return view(
            'layouts.footer',
            [

                'theloais' =>  $loai,
                
            ]
        );
    }
    public function timKiemSp(Request $request){
        $loai = DB::table('loai_sps')->select('*')->get();
        $search = $request->sptl;
        $sanpham =    DB::table('san_pham')
                       ->join('loai_sps', 'loai_sps.id', '=', 'san_pham.id_loai')
                       ->join('users', 'users.id', '=', 'san_pham.id_ncc')
                       ->select('*','san_pham.id as id_sptl')
                       ->where(function($query) use ($search){ 
                           if($search != ''){
                               $query->where('san_pham.Tensanpham', 'LIKE', '%'.$search.'%')
                                   ->orwhere('users.name', 'LIKE', '%'.$search.'%')
                                   ->orwhere('san_pham.Sokhung', 'LIKE', '%'.$search.'%');
                       }
                       })
           ->get();
        return view(
            'page.timkiemsanpham',
            [
                'theloais' =>  $loai,
                'sanphams'  =>  $sanpham,
            ]
        );
    
    }
    
}
