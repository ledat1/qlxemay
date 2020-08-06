@extends('adminlte::page')

@section('title', 'Trang chủ admin')

@section('content_header')
<h1>CHÀO MỪNG ĐẾN VỚI TRANG QUẢN LÝ XE MÁY !!</h1>
<div style="margin-top: 50px" class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{count($sohoadon)}}</h3>

              <p style="font-size: 16px;">hóa đơn mới</p>
            </div>
            <div class="icon">
              <i style="padding-top: 14px;" class="ion ion-bag"></i>
            </div>
            <a href="http://localhost:8000/admin/hoadon/danhsach" class="small-box-footer">Xem ngay<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
@stop

@section('content')

@stop