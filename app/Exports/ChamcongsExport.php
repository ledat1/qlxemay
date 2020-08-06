<?php

namespace App\Exports;
use App\Chamcong;
use DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Http\Request;

// use Maatwebsite\Excel\Concerns\Exportable;
class ChamcongsExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function view(): View
    {
    
        $data = DB::table('chamcongs')
            ->join('nhansus', 'nhansus.id', '=', 'chamcongs.idNhansu')
            ->select('nhansus.Hoten', 'nhansus.Hinhanh', 'chamcongs.*')
            ->get();
           
        return view('admin.exportexcel', [
             'datas' => $data
        ]);
    }
}
