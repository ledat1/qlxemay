<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hoadon extends Model
{
    protected $table = 'hoa_don';

    protected $fillable = ['Tongtien','Ghichu','Ngayban','Trangthai','id_khachhang','id_nhanvien'];
}
