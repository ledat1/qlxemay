@extends('adminlte::page')

@section('title', 'Quản lý nhà cung cấp')

@section('content')

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Danh sách nhà cung cấp</h3>
    </div>
    <a style="float: right; margin-right: 20px;" href="{{ route('luuNCC') }}" class="btn btn-success btn-add">Thêm</a>
    <form action="{{ route('timKiemNCC') }}" method="get" role="search">

    <div class="box-tools">
        <div class="input-group input-group-sm hidden-xs" style="width: 200px; float: left; margin-left: 10px;">
            <input type="text" name="nccap" class="form-control pull-right" placeholder="Tìm kiếm">
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
                                <th tabindex="0">id</th>
                                <th tabindex="0">Hình ảnh</th>
                                <th tabindex="0">Họ và tên</th>
                                <th tabindex="0">Địa chỉ</th>
                                <th tabindex="0">Số điện thoại</th>
                                <th tabindex="0">Số tài khoản</th>
                                <th tabindex="0">Ngân hàng</th>
                                <th tabindex="0"></th>
                                <th tabindex="0"></th>
                            </tr>
                            @if (session('thongbao'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-check"></i> Thông báo</h4>
                                {{ session('thongbao') }}
                        </thead>
                        <tbody>
                            @endif
                            @foreach($nccs as $ncc)
                            <tr role="row" class="odd">
                                <td class="sorting_1">NCC{{ $ncc->id }}</td>
                                <td class="sorting_1"><img style="height:50px" src="/upload/slide/{{ $ncc->image_name }}" /></td>
                                <td class="sorting_1">{{ $ncc->name }}</td>
                                <td class="sorting_1">{{ $ncc->Diachi }}</td>
                                <td class="sorting_1">{{ $ncc->SDT }}</td>
                                <td class="sorting_1">{{ $ncc->STK }}</td>
                                <td class="sorting_1">{{ $ncc->Nganhang }}</td>
                                <td style="width: 50px;">
                                    <button style="background-color: #fff; width:50px;border: none;" type="button" class="btn btn-block btn-default btn-sm"><a href="sua/{{ $ncc->id }}"><i class="fa fa-edit" style="color:green;"></i></a></button>
                                </td>
                                <td style="width: 50px;">
                                    <button style="background-color: #fff; width:50px;border: none;" type="button" class="btn btn-block btn-default btn-sm"><a href="xoa/{{ $ncc->id }}"><i class="fa fa-trash" style="color:red;"></i></a></button>
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
                            <li>{{ $nccs->links() }}</li>
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
    top: -4px;
    width: 200px;
}
</style>