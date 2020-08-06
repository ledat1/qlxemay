<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Xuatkho extends Model
{
    protected $table = 'xuat_sp';

    protected $fillable = ['TenKH','Diachi','SDTKH','Soluongxuat','Thoigianxuat','Thanhtien','id_spxuat'];
}
