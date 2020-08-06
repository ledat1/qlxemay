@extends('adminlte::page')

@section('title', 'Quản lý xuất kho')

@section('content')
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Danh mục tìm kiếm</h3>
    <h4>Tìm kiếm thấy : {{count($xuatkhos)}} sản phẩm </h4>
  </div>

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
                <th tabindex="0">id</th>
                <th class="sorting" tabindex="0">Tên sản phẩm</th>
                <th class="sorting" tabindex="0">Tên khách hàng</th>
                <th class="sorting" tabindex="0">Số lượng xuất</th>
                <th class="sorting" tabindex="0">Thành tiền</th>
                <th class="sorting" tabindex="0">Thời gian xuất</th>
                <th class="sorting" tabindex="0">Số điện thoại</th>
                <th class="sorting" tabindex="0">Địa chỉ</th>
              </tr>
              @if (session('thongbao'))
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Thông báo</h4>
                {{ session('thongbao') }}
            </thead>
            <tbody>
              @endif
              @foreach($xuatkhos as $xuatkho)
              <tr role="row" class="odd">
                <td class="sorting_1">XK{{ $xuatkho->id_xuat }}</td>
             
                <td class="sorting_1">{{ $xuatkho->Tensanpham }}</td>
                <td class="sorting_1">{{$xuatkho->TenKH }}</td>
                <td class="sorting_1">{{ $xuatkho->Soluongxuat }}</td>
                <td class="sorting_1">
                {{ number_format($xuatkho->Thanhtien,0,',','.')}} VNĐ
                </td>
                <td class="sorting_1">{{date('d-m-Y', strtotime($xuatkho->Thoigianxuat))}}</td>
                <td class="sorting_1">{{ $xuatkho->SDTKH }}</td>
                <td class="sorting_1">{{ $xuatkho->Diachi }}</td>
                <td style="width: 50px;">
                  <button type="button" class="btn btn-block btn-default btn-sm"><a href="sua/{{ 
                    $xuatkho->id_xuat }}">Sửa</a></button>
                </td>
                <td style="width: 50px;">
                  <button type="button" class="btn btn-block btn-default btn-sm"><a href="xoa/{{ 
                    $xuatkho->id_xuat }}">Xóa</a></button>
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
              <li>{{ $xuatkhos->links() }}</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.box-body -->
</div>
@stop