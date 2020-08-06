<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Exports\ChamcongsExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;


class ExportExcelController extends Controller
{

    
    public function excel(){
        return Excel::download(new ChamcongsExport(), 'Chamcong.xlsx');
   }
}
