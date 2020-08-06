@extends('adminlte::page')

@section('title', 'Trang quản trị')

@section('content_header')
<h1>Sửa thể loại</h1>
@stop

@section('content')
<div class="box box-primary">
  <div class="box-header with-border">
    <h1 class="box-title">Danh mục</h1>
    <p style="font-size : 20px;">{{ $theloai->Tenloaisanpham }}</p>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form role="form" method="POST" action="{{ $theloai->id }}">
    @csrf
    <div class="box-body">
      @if(count($errors) > 0)
      <div class="alert alert-danger">
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
      <label for="Tenloaisanpham">Tên thể loại</label>
      <input name="Tenloaisanpham" type="text" class="form-control" value="{{$theloai->Tenloaisanpham}}" placeholder="Nhập tên thể loại..">
    </div>
</div>
<!-- /.box-body -->

<div class="box-footer">
  <button type="submit" class="btn btn-primary">Sửa</button>
</div>
</form>
</div>
@stop