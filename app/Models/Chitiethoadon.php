<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chitiethoadon extends Model
{
    protected $table = 'chi_tiet_hoa_don';

    protected $fillable = ['Soluong','Giatien','id_spham','id_hoadon'];
}
