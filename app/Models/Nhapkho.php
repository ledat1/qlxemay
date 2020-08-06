<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nhapkho extends Model
{
    protected $table = 'nhap_sp';

    protected $fillable = ['Soluongnhap','Thoigiannhap','Thanhtien','id_spnhap'];
}
