@extends('adminlte::page')

@section('title', 'Trang quản trị')

@section('content_header')
<h1>Sửa nhập kho sản phẩm</h1>
@stop

@section('content')
<style>
  .icon_del {
    position: relative;
    top: 4px;
    left: 10px;
  }
</style>
<script type="text/javascript" language="javascript" src="/ckeditor/ckeditor.js"></script>
<div class="box box-primary">
  <div class="box-header with-border">
    <h1 class="box-title">Nhập kho sản phẩm</h1>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form role="form" method="POST" action="{{$nhapkho->id}}" name="frmSua" enctype="multipart/form-data">
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
    <label>Sản phẩm:</label>
            <select class="form-control" name="id_spnhap">
                @foreach($sanphams as $sanpham)
                <option @if($sanpham->id == $nhapkho->id_spnhap)
                    {{"selected"}}
                    @endif
                    value="{{ $sanpham->id }}">{{$sanpham->Tensanpham}}</option>
                @endforeach
            </select>
            <label> Số lượng sản phẩm: </label>
             <input name="Soluongnhap" type="text" class="form-control" 
             value="{{$nhapkho->Soluongnhap}}"
             placeholder="Số lượng sản phẩm:">
         <label> Ngày nhập kho:</label>
        <input name="Thoigiannhap" type="date" class="form-control" value="{{$nhapkho->Thoigiannhap}}">
    </div>
</div>
<!-- /.box-body -->

<div class="box-footer">
  <button type="submit" class="btn btn-primary">Sửa</button>
</div>
</form>
</div>
@stop

