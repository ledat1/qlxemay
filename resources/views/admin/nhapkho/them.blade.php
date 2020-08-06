@extends('adminlte::page')

@section('title', 'Thêm nhập kho')

@section('content_header')
<h1>Nhập kho sản phẩm</h1>
@stop

@section('content')
<script type="text/javascript" language="javascript" src="/ckeditor/ckeditor.js"></script>
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Nhập kho</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form role="form" method="POST" action="{{ route('luuNhapKho') }}" enctype="multipart/form-data">
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
      <label>Thể loại sản phẩm</label>
      <select class="form-control" name="id_spnhap" id="">
        <option value="">------</option>
        @foreach($sanphams as $sanpham)
        <option value="{{ $sanpham->id }}">{{$sanpham->Tensanpham}}</option>
        @endforeach
      </select>
      <label> Số lượng sản phẩm: </label>
      <input name="Soluongnhap" type="text" class="form-control" placeholder="Số lượng sản phẩm:">
      <label> Ngày nhập kho:</label>
      <input name="Thoigiannhap" type="date" class="form-control" placeholder=" Ngày nhập kho..">
    </div>
</div>
<!-- /.box-body -->

<div class="box-footer">
  <button type="submit" class="btn btn-primary">Thêm</button>
</div>
</form>
</div>
@stop