@extends('adminlte::page')

@section('title', 'Tìm kiếm sản phẩm')

@section('content')

<div class="box">
  <div class="box-header">
    <h3 class="box-title">Danh mục tìm kiếm</h3>
    <h4>Tìm kiếm thấy : {{count($sanphams)}} sản phẩm </h4>
  </div>
  <!-- /.box-header -->
  <div class="box-body no-padding">
    <table class="table">
      <tbody>
        <tr>
        <th tabindex="0">id</th>
                <th class="sorting" tabindex="0">Tên sản phẩm</th>
                <th class="sorting" tabindex="0">Loại sản phẩm</th>
                <th class="sorting" tabindex="0">Tên nhà cung cấp</th>
                <th class="sorting" tabindex="0">Số lượng</th>
                <th class="sorting" tabindex="0">Giá bán</th>
                <th class="sorting" tabindex="0">Giá nhập</th>
                <th class="sorting" tabindex="0">Hình sản phẩm</th>
        </tr>
        @if (session('thongbao'))
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-check"></i> Thông báo</h4>
          {{ session('thongbao') }}
        </div>
  </div>
  @endif

  @foreach($sanphams as $sanpham)
  <tr>

  <td class="sorting_1">SP{{ $sanpham->id }}</td>
             
             <td class="sorting_1">{{ $sanpham->Tensanpham }}</td>
             <td class="sorting_1">{{ $sanpham->Tenloaisanpham }}</td>
             <td class="sorting_1">{{$sanpham->name }}</td>
             <td class="sorting_1">{{ $sanpham->Soluongsp }}</td>
             <td class="sorting_1">
             {{ number_format($sanpham->Giaban,0,',','.')}} VNĐ
             </td>
             <td class="sorting_1">
             {{ number_format($sanpham->Gianhap,0,',','.')}} VNĐ
             </td>
               <td><img width="80px;" src="/upload/sanpham/{{ $sanpham->Hinhanh }}" /></td>
             </td>
             
             
             <td style="width: 50px;">
               <button type="button" class="btn btn-block btn-default btn-sm"><a href="sua/{{ $sanpham->id_sptk }}">Sửa</a></button>
             </td>
             <td style="width: 50px;">
               <button type="button" class="btn btn-block btn-default btn-sm"><a href="xoa/{{ 
                 $sanpham->id_sptk }}">Xóa</a></button>
             </td>
  </tr>

  @endforeach
  </tbody>
  </table>
</div>
<!-- /.box-body -->
<div class="box-footer clearfix">
  <ul class="pagination pagination-sm no-margin pull-right">
    <li>{{ $sanphams->links() }}</li>
  </ul>
</div>
</div>
@stop