@extends('adminlte::page')

@section('title', 'Sửa thông tin nhà cung cấp')

@section('content_header')
<h1>Sửa Thông Tin Nhà Cung Cấp</h1>
@stop

@section('content')
<script type="text/javascript" language="javascript" src="/ckeditor/ckeditor.js"></script>
<div class="box box-primary">
    <div class="box-header with-border">
        <p style="font-size : 20px;"> Tên nhà cung cấp : {{ $ncc->name }}</p>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form role="form" method="POST" action="{{$ncc->id}} " enctype="multipart/form-data">
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
        <div class="modal-body">
        <div class="form-group">
             <div class="col-md-6 pull-left">
                <label>Họ tên:</label>
                <input name="name" type="text" class="form-control" value="{{$ncc->name}}" placeholder="Họ tên">   
             </div>
             <div class="col-md-6 pull-left">
                <label>Email:</label>
                <input name="email" type="text" class="form-control" value="{{$ncc->email}}" placeholder="Email">
             </div>
        </div>
        <div class="form-group">
             <div class="col-md-6 pull-left">
             <label>Địa chỉ</label>
            <input name="Diachi" type="text" class="form-control" value="{{$ncc->Diachi}}" placeholder="Nhập địa chỉ">
             </div>
        </div>
        <div class="form-group">
             <div class="col-md-6 pull-left">
                <label>SDT</label>
                 <input name="SDT" type="text" class="form-control" value="{{$ncc->SDT}}" placeholder="Nhập SĐT">
             </div>
        </div>
        <div class="form-group">
             <div class="col-md-6 pull-left">
             <label>SDT</label>
            <input name="STK" type="text" class="form-control" value="{{$ncc->STK}}" placeholder="Nhập số tài khoản">
             </div>
        </div>
        <div class="form-group">
             <div class="col-md-6 pull-left">
             <label>Ngân hàng</label>
                 <input name="Nganhang" type="text" class="form-control" value="{{$ncc->Nganhang}}" placeholder="Nhập ngân hàng">
             </div>
        </div>
        <div class="form-group">
        <div class="col-md-12 pull-left">
            <label> Hình ảnh  </label>
            <input class="btn btn-app" type="file" name="image_name" multiple>
             </div>
        </div>
        <!-- /.box-body -->
        </div>
</div>
<!-- /.box-body -->

<div class="box-footer">
    <button type="submit" class="btn btn-primary">Sửa</button>
</div>
</form>
</div>
@stop