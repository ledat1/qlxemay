<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Baohanh extends Model
{
    protected $table = 'bao_hanh';

    protected $fillable = ['Tensanphambh','Soluongbh','id_kh','Ngaybatdau','Ngayketthuc','Nguyennhan','id_spbh'];
}
