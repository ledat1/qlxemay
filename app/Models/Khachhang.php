<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Khachhang extends Model
{
    protected $table = 'khach_hang';

    protected $fillable = ['Hoten','Gioitinh','email','Diachi','Sodienthoai','Ghichu'];
}
