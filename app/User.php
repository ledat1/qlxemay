<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role','image_name','Diachi','SDT','STK','Nganhang',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'permissions'   => 'array'

    ];
    public function chucVu(){
    	return $this->belongsTo('App\Chucvu', 'id_chucvu', 'id');
    }
    public function phongBan(){
    	return $this->belongsTo('App\Phongban', 'id_phongban', 'id');
    }
    public function quaTrinhCongTac(){
    	return $this->hasMany('App\Quatrinhcongtac', 'id_nhansu', 'id');
    }
    public function khenThuongKyLuat(){
    	return $this->hasMany('App\Khenthuongkyluat', 'nhansu_id', 'id');
    }
    public function chamCong(){
    	return $this->hasMany('App\Chamcong', 'idNhansu', 'id');
    }
    public function Role(){
    	return $this->hasMany('App\Role', 'id_role', 'id');
    }
}
