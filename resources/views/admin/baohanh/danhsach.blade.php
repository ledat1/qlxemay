@extends('adminlte::page')

@section('title', 'Quản lí bảo hành sản phẩm')

@section('content')

<div class="box">
<div class="box-header">
        <h3 class="box-title">Danh sách sản phẩm bảo hành</h3>
    </div>
    <a style="float: right; margin-right: 20px;" href="{{ route('luuBaohanh') }}" class="btn btn-success btn-add">Thêm</a>
    <form action="{{ route('timKiemBaohanh') }}" method="get" role="search">

    <div class="box-tools">
        <div class="input-group input-group-sm hidden-xs" style="width: 200px; float: left; margin-left: 10px;">
            <input type="text" name="spbh" class="form-control pull-right" placeholder="Số điện thoại khách hàng...">
            <div class="input-group-btn">
                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
            </div>
        </div>
    </div>
</form>
<form action="{{ route('timKiemBaohanh2') }}" method="get" role="search">

<div class="box-tools">
  <div class="input-group input-group-sm hidden-xs ok" style="width: 218px; float: left; margin-left: 10px;">
   
  <input type="text" name="spbh2" class="form-control pull-right" placeholder="Mã khách hàng...">
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
                <th tabindex="0">Mã bảo hành</th>
                <th class="sorting" tabindex="0">Tên sản phẩm</th>
                <th class="sorting" tabindex="0">Tên khách hàng</th>
                <th class="sorting" tabindex="0">Số lượng bảo hành</th>
                <th class="sorting" tabindex="0">Ngày bắt đầu</th>
                <th class="sorting" tabindex="0">Ngày kết thúc</th>
                <th class="sorting" tabindex="0">Nguyên nhân</th>
              
              </tr>
              @if (session('thongbao'))
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Thông báo</h4>
                {{ session('thongbao') }}
            </thead>
            <tbody>
              @endif
              @foreach($sanphambhs as $sanphambh)
              <tr role="row" class="odd">
                <td class="sorting_1">{{ $sanphambh->Sodienthoai }}</td>
             
                <td class="sorting_1">{{ $sanphambh->Tensanpham }}</td>
                <td class="sorting_1">{{ $sanphambh->Hoten }}</td>
                <td class="sorting_1">{{ $sanphambh->Soluongbh }}</td>
                <td class="sorting_1">{{date('d-m-Y', strtotime($sanphambh->Ngaybatdau))}}</td>
                <td class="sorting_1">{{date('d-m-Y', strtotime($sanphambh->Ngayketthuc))}}</td>
                <td class="sorting_1">{!! $sanphambh->Nguyennhan !!}</td>
                <!-- <td style="width: 50px;">
                  <button type="button" class="btn btn-block btn-default btn-sm"><a href="sua/{{ $sanphambh->id_bh }}">Sửa</a></button>
                </td> -->
                <td style="width: 50px;">
                  <button type="button" class="btn btn-block btn-default btn-sm"><a href="xoa/{{ 
                    $sanphambh->id_bh }}">Xóa</a></button>
                </td>
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
              <li>{{ $sanphambhs->links() }}</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.box-body -->
</div>
@stop
<style>
.ok {
    position: absolute;
    left: 124px;
    top: -16px;
    width: 200px;
}
</style>