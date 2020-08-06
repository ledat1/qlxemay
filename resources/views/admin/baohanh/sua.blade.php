@extends('adminlte::page')

@section('title', 'Trang quản trị')

@section('content_header')
<h1>Sửa Sản Phẩm</h1>
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
    <h1 class="box-title">Bảo hành Sản phẩm</h1>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form role="form" method="POST" action="{{$baohanh->id}}" name="frmSua" enctype="multipart/form-data">
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
            <select class="form-control" name="id_loai">
                @foreach($sanphams as $sanpham)
                <option @if($sanpham->id == $baohanh->id_spbh)
                    {{"selected"}}
                    @endif
                    value="{{ $sanpham->id }}">{{$sanpham->Tensanpham}}</option>
                @endforeach
            </select>
      <label>Số lượng sản phẩm bảo hành :</label>
      <input name="Soluongbh" type="text" class="form-control" value="{{$baohanh->Soluongbh}}">
      <label> Ngày bắt đầu:</label>
      <input name="Ngaybatdau" type="date" class="form-control" value="{{$baohanh->Ngaybatdau}}">
      <label>Ngày kết thúc:</label>
      <input name="Ngayketthuc" type="date" class="form-control" value="{{$baohanh->Ngayketthuc}}">
      <label>Nguyên nhân bảo hành:</label>
      <textarea name="Nguyennhan" type="text" class="form-control ckeditor" rows="10">{{$baohanh->Nguyennhan}}</textarea>
    </div>
</div>
<!-- /.box-body -->

<div class="box-footer">
  <button type="submit" class="btn btn-primary">Sửa</button>
</div>
</form>
</div>
@stop

