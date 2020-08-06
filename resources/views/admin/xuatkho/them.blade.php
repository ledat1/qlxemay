@extends('adminlte::page')

@section('title', 'Thêm xuất sản phẩm')

@section('content_header')
<h1>Thêm xuất sản phẩm</h1>
@stop

@section('content')
<script type="text/javascript" language="javascript" src="/ckeditor/ckeditor.js"></script>

<div class="box box-primary" id="modal-add">
    <div class="box-header with-border">
        <h3 class="box-title">Xuất sẩn phẩm</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form role="form" method="POST" action="{{ route('luuNhapkho') }}" enctype="multipart/form-data">
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
             <label>Sản phẩm</label>
                <select class="form-control" name="id_spxuat" id="">
                    <option value="">------</option>
                    @foreach($sanphams as $sanpham)
                    <option value="{{ $sanpham->id }}">{{$sanpham->Tensanpham}}</option>
                    @endforeach
                </select>
             </div>
             <div class="col-md-6 pull-left">
                <label>Tên khách hàng:</label>
                <input name="TenKH" type="text" class="form-control" placeholder="Nhập tên khách hàng">
             </div>
        </div>
        <div class="form-group">
       
             <div class="col-md-6 pull-left">
             <label>Số lượng xuất sản phẩm:</label>
            <input name="Soluongxuat" type="text" class="form-control" placeholder="Nhập số lượng">
             </div>
        </div>
        <div class="form-group">
             <div class="col-md-6 pull-left">
                <label>Số điện thoại khách hàng:</label>
                 <input name="SDTKH" type="text" class="form-control" placeholder="Nhập SĐT">
             </div>
        </div>
      
        <div class="form-group">
        <div class="col-md-6 pull-left">
             <label>Địa chỉ:</label>
            <input name="Diachi" type="text" class="form-control" placeholder="Nhập địa chỉ">
             </div>
             <div class="col-md-6 pull-left">
             <label> Ngày xuất kho:</label>
             <input name="Thoigianxuat" type="date" class="form-control" placeholder=" Ngày xuất kho..">
             </div>
        </div>
        <!-- /.box-body -->
        </div>
        <div class="box-footer">
            <button style="margin-top: 17px;margin-left: 19px;" type="submit" class="btn btn-primary">Thêm</button>
            <a style="float: right; margin-right: 21px;margin-top: 19px;" href="danhsach" class="btn btn-primary btn-add">Danh sách xuất kho</a>
        </div>
    </form>
</div>
@stop