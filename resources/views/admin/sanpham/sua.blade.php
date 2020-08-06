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
    <h1 class="box-title">Sản phẩm</h1>
    <p style="font-size : 20px;">Tên sản phẩm : {{ $sanpham->Tensanpham }}</p>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form role="form" method="POST" action="{{$sanpham->id}}" name="frmSua" enctype="multipart/form-data">
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
    <label>Loại sản phẩm:</label>
            <select class="form-control" name="id_loai">
                @foreach($loais as $loai)
                <option @if($loai->id == $sanpham->id_loai)
                    {{"selected"}}
                    @endif
                    value="{{ $loai->id }}">{{$loai->Tenloaisanpham}}</option>
                @endforeach
            </select>
            <label>Chức vụ</label>
            <select class="form-control" name="id_ncc">
                @foreach($nccs as $ncc)
                <option @if($ncc->id == $sanpham->id_ncc)
                    {{"selected"}}
                    @endif
                    value="{{ $ncc->id }}">{{$ncc->name}}</option>
                @endforeach
            </select>
      <label> Tên sản phẩm </label>
      <input name="Tensanpham" type="text" class="form-control" value="{{$sanpham->Tensanpham}}">
      <br>
      <label>Sản phẩm hot:</label>
      <label class="radio-inline">
        <input name="hot" value="0" checked="" type="radio">Không
      </label>
      <label class="radio-inline">
        <input name="hot" value="1" type="radio">Có
      </label>
      <br>
      <br>
      <label>Số lượng sản phẩm :</label>
      <input name="Soluongsp" type="text" class="form-control" value="{{$sanpham->Soluongsp}}">
      <label> Thời gian bảo hành:</label>
      <input name="Thoigianbh" type="text" class="form-control" value="{{$sanpham->Thoigianbh}}">
      <label> Giá nhập </label>
      <input name="Gianhap" type="text" class="form-control" value="{{$sanpham->Gianhap}}">
      <label>Giá bán</label>
      <input name="Giaban" type="text" class="form-control" value="{{$sanpham->Giaban}}">
      <label>Giá khuyến mãi</label>
      <input name="Giakhuyenmai" type="text" class="form-control" value="{{$sanpham->Giakhuyenmai}}">
      <label>Chi tiết sản phẩm :</label>
      <textarea name="Chitiet" type="text" class="form-control ckeditor" rows="10">{{$sanpham->Chitiet}}</textarea>
      <label> Hình ảnh :</label>
      <input class="btn btn-app" type="file" name="Hinhanh" multiple>
      <p><img width="100px;" src="/upload/sanpham/{{ $sanpham->Hinhanh }}" /></p>
    </div>
</div>
<!-- /.box-body -->

<div class="box-footer">
  <button type="submit" class="btn btn-primary">Sửa</button>
</div>
</form>
</div>
@stop

