@extends('adminlte::page')

@section('title', 'Thêm nhân viên')

@section('content_header')
<h1>Thêm nhà cung cấp</h1>
@stop

@section('content')
<script type="text/javascript" language="javascript" src="/ckeditor/ckeditor.js"></script>

<div class="box box-primary" id="modal-add">
    <div class="box-header with-border">
        <h3 class="box-title">Nhân viên</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form role="form" method="POST" action="{{ route('luuNhanVien') }}" enctype="multipart/form-data">
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

        </div>
        <div class="modal-body">
        <div class="form-group">
             <div class="col-md-6 pull-left">
                <label>Họ tên:</label>
                <input name="name" type="text" class="form-control" placeholder="Họ tên">   
             </div>
             <div class="col-md-6 pull-left">
                <label>Email:</label>
                <input name="email" type="text" class="form-control" placeholder="Email">
             </div>
        </div>
        <div class="form-group">
             <div class="col-md-6 pull-left">
             <label>Địa chỉ</label>
            <input name="Diachi" type="text" class="form-control" placeholder="Nhập địa chỉ">
             </div>
        </div>
        <div class="form-group">
             <div class="col-md-6 pull-left">
                <label>SDT</label>
                 <input name="SDT" type="text" class="form-control" placeholder="Nhập SĐT">
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
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Thêm</button>
            <a style="float: right; margin-right: 20px;" href="danhsach" class="btn btn-primary btn-add">Danh sách nhân viên</a>
        </div>
    </form>
</div>
@stop