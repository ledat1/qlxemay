@extends('adminlte::page')

@section('title', 'Thêm bảo hành sản phẩm')

@section('content_header')
<h1>Sản phẩm bảo hành</h1>
@stop

@section('content')
<script type="text/javascript" language="javascript" src="/ckeditor/ckeditor.js"></script>
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Bảo hành</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form role="form" method="POST" action="{{ route('luuBaohanh') }}" enctype="multipart/form-data">
    @csrf
    <div class="box-body">
      @if(count($errors) > 0)
      <div class="alert alert-danger">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        @foreach($errors->all() as $err)
        {{$err}}<br>

        @endforeach
      </div>
      @endif

      @if (session('thongbao'))
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Thông báo</h4>
        {{ session('thongbao') }}
      </div>
    </div>
    @endif
    <div class="form-group">
      <label>Sản phẩm:</label>
      <select class="form-control" name="id_spbh" id="">
        <option value="">------</option>
        @foreach($sanphams as $sanpham)
        <option value="{{ $sanpham->id }}">{{$sanpham->Tensanpham}}</option>
        @endforeach
      </select>
      <label>Khách hàng:</label>
      <select class="form-control" name="id_kh" id="">
        <option value="">------</option>
        @foreach($khachhangs as $khachhang)
        <option value="{{ $khachhang->id }}">{{$khachhang->Hoten}}</option>
        @endforeach
      </select>
      <label>Số lượng bảo hành:</label>
      <input name="Soluongbh" type="text" class="form-control" placeholder="Số lượng bảo hành">
      <label> Ngày bắt đầu bảo hành:</label>
      <input name="Ngaybatdau" type="date" class="form-control" placeholder=" Ngày bắt đầu..">
      <label>Ngày kết thúc bảo hành: </label>
      <input name="Ngayketthuc" type="date" class="form-control" placeholder="Ngày kết thúc..">
      <label>Nguyên nhân bảo hành:</label>
      <textarea name="Nguyennhan" type="text" class="form-control ckeditor" rows="10"></textarea>
    </div>
</div>
<!-- /.box-body -->

<div class="box-footer">
  <button type="submit" class="btn btn-primary">Thêm</button>
</div>
</form>
</div>
@stop