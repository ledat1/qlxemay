<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sanpham extends Model
{
    protected $table = 'san_pham';
    protected $fillable = [
    'Tensanpham', 'Soluongsp', 'Hinhanh','Chitiet', 'Gianhap', 'Giaban','hot','Sokhung','Thoigianbh','Giakhuyenmai', 'id_loai', 'id_ncc'
    ];
}
