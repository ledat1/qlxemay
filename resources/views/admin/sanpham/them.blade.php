@extends('adminlte::page')

@section('title', 'Thêm sản phẩm')

@section('content_header')
<h1>Tạo sản phẩm</h1>
@stop

@section('content')
<script type="text/javascript" language="javascript" src="/ckeditor/ckeditor.js"></script>
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Sản phẩm</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form role="form" method="POST" action="{{ route('luuSanpham') }}" enctype="multipart/form-data">
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
      <label>Thể loại sản phẩm</label>
      <select class="form-control" name="id_loai" id="">
        <option value="">------</option>
        @foreach($loais as $loai)
        <option value="{{ $loai->id }}">{{$loai->Tenloaisanpham}}</option>
        @endforeach
      </select>
      <label>Nhà cung cấp</label>
      <select class="form-control" name="id_ncc" id="">
        <option value="">------</option>
        @foreach($nccs as $ncc)
        <option value="{{ $ncc->id }}">{{$ncc->name}}</option>
        @endforeach
      </select>
      <label> Tên sản phẩm </label>
      <input name="Tensanpham" type="text" class="form-control" placeholder="Tên sản phẩm">
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
      <label> Thời gian bảo hành:</label>
      <input name="Thoigianbh" type="text" class="form-control" placeholder="Thời gian bảo hành...">
      <label> Số lượng sản phẩm:</label>
      <input name="Soluongsp" type="text" class="form-control" placeholder="Số lượng..">
      <label> Giá nhập </label>
      <input name="Gianhap" type="text" class="form-control" placeholder="Giá tiền">
      <label>Giá bán</label>
      <input name="Giaban" type="text" class="form-control" placeholder="Giá bán">
      <label>Giá khuyến mãi</label>
      <input name="Giakhuyenmai" type="text" class="form-control" placeholder="Giá khuyến mãi">
      <label> Hình ảnh </label>
      <input class="btn btn-app" type="file" name="Hinhanh" multiple>
      <label>Chi tiết sản phẩm</label>
      <textarea name="Chitiet" type="text" class="form-control ckeditor" rows="10"></textarea>
    </div>
</div>
<!-- /.box-body -->

<div class="box-footer">
  <button type="submit" class="btn btn-primary">Thêm</button>
</div>
</form>
</div>
@stop