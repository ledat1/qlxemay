<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Models\Loaisp;
use DB;
use App\Models\Hoadon;
use App\Models\Chitiethoadon;
use App\Models\Nhapkho;
class ThongkeController extends Controller
{
    public function thongKe(Request $request)
    {

        $data = Hoadon::select(DB::raw('count(id) as `data`'), DB::raw('sum(Tongtien) as `tongtien`'), DB::raw("CONCAT_WS('-',MONTH(created_at),YEAR(created_at)) as monthyear"))
        ->whereRaw(DB::raw('YEAR(created_at) = 2020' ))
        ->groupBy('monthyear')
        ->orderBy('monthyear', 'asc')
        ->get();
        $data2 = Nhapkho::select(DB::raw('count(id) as `data`'),DB::raw('sum(Thanhtien) as `thanhtien`'), DB::raw("CONCAT_WS('-',MONTH(Thoigiannhap),YEAR(Thoigiannhap)) as monthyear"))
        ->whereRaw(DB::raw('YEAR(created_at) = 2020' ))
        ->groupBy('monthyear')
        ->orderBy('monthyear', 'asc')
        ->get();
        $data_thu = [];
        $i = 1;
        while($i <= 12){
          $data_thu[] = 0;
          $i ++;
        }

        foreach($data_thu as $key => $value){
          foreach($data as $item){
              if($key == substr($item->monthyear,0,strpos($item->monthyear,'-') )){
                  $data_thu[$key - 1] =  $item->tongtien; 
                }
            }
        }

        $data_chi = [];
        $i = 1;
        while($i <= 12){
          $data_chi[] = 0;
          $i ++;
        }

        foreach($data_chi as $key => $value){
          foreach($data2 as $item){
              if($key == substr($item->monthyear,0,strpos($item->monthyear,'-') )){
                  $data_chi[$key - 1] =  $item->thanhtien; 
                }
            }
        }
        return view('thongke', ['data' => [$data_chi, $data_thu]]);
    }
    public function luuThongKe(Request $request)
    {

        $data = Hoadon::select(DB::raw('count(id) as `data`'), DB::raw('sum(Tongtien) as `tongtien`'), DB::raw("CONCAT_WS('-',MONTH(created_at),YEAR(created_at)) as monthyear"))
            ->whereRaw(DB::raw('YEAR(created_at) = '.$request->groupYear ))
            ->groupBy('monthyear')
            ->orderBy('monthyear', 'asc')
            ->get();
        $data2 = Nhapkho::select(DB::raw('count(id) as `data`'),DB::raw('sum(Thanhtien) as `thanhtien`'), DB::raw("CONCAT_WS('-',MONTH(created_at),YEAR(created_at)) as monthyear"))
            ->whereRaw(DB::raw('YEAR(created_at) = '.$request->groupYear ))
            ->groupBy('monthyear')
            ->orderBy('monthyear', 'asc')
            ->get();
            $data_thu = [];
            $i = 1;
            while($i <= 12){
              $data_thu[] = 0;
              $i ++;
            }
    
            foreach($data_thu as $key => $value){
              foreach($data as $item){
                  if($key == substr($item->monthyear,0,strpos($item->monthyear,'-') )){
                      $data_thu[$key - 1] =  $item->tongtien; 
                    }
                }
            }

            $data_chi = [];
            $i = 1;
            while($i <= 12){
              $data_chi[] = 0;
              $i ++;
            }
    
            foreach($data_chi as $key => $value){
              foreach($data2 as $item){
                  if($key == substr($item->monthyear,0,strpos($item->monthyear,'-') )){
                      $data_chi[$key - 1] =  $item->thanhtien; 
                    }
                }
            }

        return response(['data' => [$data_chi ,$data_thu]]);
    }
    public function thongKe2(Request $request)
    {
      $year = substr($request->Denngay, 0, 4);
      $month = substr($request->Denngay, 5,2);
      $day = substr($request->Denngay, 8,3) + 1;
      $end_day = $year.'-'. $month.'-'.$day;
      $start_day = $request->Tungay;
      $tien = DB::table('hoa_don')
      ->selectRaw('sum(Tongtien) as total')
      ->whereBetween('created_at',array($request->Tungay, $end_day))
      ->first();
      $data = Hoadon::select(DB::raw('count(id) as `data`'), DB::raw('sum(Tongtien) as `tongtien`'), DB::raw("CONCAT_WS('-',MONTH(created_at),YEAR(created_at)) as monthyear"))
      // ->where('Trangthai',1)
      ->whereBetween('created_at',array($request->Tungay, $end_day))
      ->groupBy('monthyear')
      ->orderBy('monthyear', 'asc')
      ->get();
      $data2 = Nhapkho::select(DB::raw('count(id) as `data`'),DB::raw('sum(Thanhtien) as `thanhtien`'), DB::raw("CONCAT_WS('-',MONTH(created_at),YEAR(created_at)) as monthyear"))
  ->whereBetween('created_at',array($request->Tungay, $end_day))
      ->groupBy('monthyear')
      ->orderBy('monthyear', 'asc')
      ->get();
      $data_thu = [];
      $i = 1;
      while($i <= 12){
        $data_thu[] = 0;
        $i ++;
      }

      foreach($data_thu as $key => $value){
        foreach($data as $item){
            if($key == substr($item->monthyear,0,strpos($item->monthyear,'-') )){
                $tongtien = $item->tongtien; 
                $data_thu[$key - 1] =  $item->tongtien; 
              }
          }
      }

      $data_chi = [];
      $i = 1;
      while($i <= 12){
        $data_chi[] = 0;
        $i ++;
      }

      foreach($data_chi as $key => $value){
        foreach($data2 as $item){
            if($key == substr($item->monthyear,0,strpos($item->monthyear,'-') )){
                $data_chi[$key - 1] =  $item->thanhtien; 
              }
          }
      }
      return view('thongke2', [
        'data' => [$data_chi, $data_thu],
        'end_day' => $request->Denngay,
        'start_day' => $start_day,
        'tongtien'   => $tien
      ]);
    }
    public function sanPhamBanChay(Request $request)
    {
      $sanphambc = DB::table('chi_tiet_hoa_don')
      ->join('san_pham','san_pham.id','=','chi_tiet_hoa_don.id_spham')
      ->selectRaw('san_pham.Tensanpham as Tensanpham,sum(Soluong) as total')
      ->groupBy('san_pham.id')
      ->orderBy('total', 'DESC')
      ->paginate(10);
    
      return view('sanphambc', ['sanphambcs' => $sanphambc]);
    }
}
