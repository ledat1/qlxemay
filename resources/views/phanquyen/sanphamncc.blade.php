@extends('adminlte::page')

@section('title', 'Quản ly sản phẩm')

@section('content')

<div class="box">
<div class="box-header">
        <h3 class="box-title">Danh sách sản phẩm</h3>
    </div>
    <!-- <a style="float: right; margin-right: 20px;" href="{{ route('luuSanpham') }}" class="btn btn-success btn-add">Thêm</a> -->
    <form action="{{ route('timkiemSanPham') }}" method="get" role="search">

    <div class="box-tools">
        <div class="input-group input-group-sm hidden-xs" style="width: 200px; float: left; margin-left: 10px;">
            <input type="text" name="sp" class="form-control pull-right" placeholder="Tìm kiếm">
            <div class="input-group-btn">
                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
            </div>
        </div>
    </div>
</form>
  <!-- /.box-header -->
  <div class="box-body">
    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
      <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6"></div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
            <thead>
              <tr role="row">
                <th tabindex="0">STT</th>
                <th class="" tabindex="0">Tên sản phẩm</th>
                <th class="" tabindex="0">Loại sản phẩm</th>
                <th class="" tabindex="0">Hot</th>
                <th class="" tabindex="0">Tên NCC</th>
                <th class="" tabindex="0">Số lượng</th>
                <th class="" tabindex="0">Giá bán</th>
                <th class="" tabindex="0">Giá nhập</th>
                <th class="" tabindex="0">Giá khuyến mãi</th>
                <th class="" tabindex="0">Tình trạng</th>
                <th class="" tabindex="0">Hình sản phẩm</th>
              
              </tr>
              @if (session('thongbao'))
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Thông báo</h4>
                {{ session('thongbao') }}
            </thead>
            <tbody>
              @endif
              @foreach($sanphams as $sanpham)
              <tr role="row" class="odd">
                <td class="sorting_1">SP{{ $sanpham->id_sp }}</td>
             
                <td class="sorting_1">{{ $sanpham->Tensanpham }}</td>
                <td class="sorting_1">{{ $sanpham->Tenloaisanpham }}</td>
                <td class="sorting_1">
                  @if($sanpham->hot == 1)
                  {{'Mẫu hot'}}
                  @else
                  {{'Mẫu không hot'}}
                  @endif
                </td>
              
                <td class="sorting_1">{{$sanpham->name }}</td>
                <td class="sorting_1">{{ $sanpham->Soluongsp }}</td>
                <td class="sorting_1">
                {{ number_format($sanpham->Giaban,0,',','.')}} VNĐ
                </td>
                <td class="sorting_1">
                {{ number_format($sanpham->Gianhap,0,',','.')}} VNĐ
                </td>
                <td class="sorting_1">
                {{ number_format($sanpham->Giakhuyenmai,0,',','.')}} VNĐ
                </td>
                <td class="sorting_1">
                  @if($sanpham->Soluongsp == 0)
                  {{'Hết hàng'}}
                  @else
                  {{'Còn hàng'}}
                  @endif
                </td>
                  <td><img width="80px;" src="/upload/sanpham/{{ $sanpham->Hinhanh }}" /></td>
                </td>
                
                
                <!-- <td style="width: 50px;">
                  <button type="button" class="btn btn-block btn-default btn-sm"><a href="sua/{{ $sanpham->id_sp }}">Sửa</a></button>
                </td>
                <td style="width: 50px;">
                  <button type="button" class="btn btn-block btn-default btn-sm"><a href="xoa/{{ 
                    $sanpham->id_sp }}">Xóa</a></button>
                </td> -->
              </tr>

              @endforeach
            </tbody>
            <tfoot>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-5">
          <div class="dataTables_info" id="example2_info" role="status" aria-live="polite"></div>
        </div>
        <div class="col-sm-7">
          <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
            <ul class="pagination pagination-sm no-margin pull-right">
              <li>{{ $sanphams->links() }}</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.box-body -->
</div>
@stop