@extends('adminlte::page')

@section('title', 'Tìm kiếm nhà cung cấp')

@section('content')

<div class="box">
  <div class="box-header">
    <h3 class="box-title">Danh mục tìm kiếm</h3>
    <h4>Tìm kiếm thấy : {{count($nccs)}} nhà cung cấp </h4>
  </div>
  <!-- /.box-header -->
  <div class="box-body no-padding">
    <table class="table">
      <tbody>
        <tr>
             <th tabindex="0">id</th>
             <th tabindex="0">Hình ảnh</th>
             <th tabindex="0">Họ và tên</th>
             <th tabindex="0">Địa chỉ</th>
             <th tabindex="0">Số điện thoại</th>
             <th tabindex="0"></th>
             <th tabindex="0"></th>
        </tr>
        @if (session('thongbao'))
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-check"></i> Thông báo</h4>
          {{ session('thongbao') }}
        </div>
  </div>
  @endif

  @foreach($nccs as $ncc)
  <tr>

  <td class="sorting_1">NCC{{ $ncc->id }}</td>
                 <td class="sorting_1"><img style="height:50px" src="/upload/slide/{{ $ncc->image_name }}" /></td>
                 <td class="sorting_1">{{ $ncc->name }}</td>
                 <td class="sorting_1">{{ $ncc->Diachi }}</td>
                 <td class="sorting_1">{{ $ncc->SDT }}</td>
                  <td style="width: 50px;">
                     <button style="background-color: #fff; width:50px;border: none;" type="button" class="btn btn-block btn-default btn-sm"><a href="sua/{{ $ncc->id }}"><i class="fa fa-edit" style="color:green;"></i></a></button>
                 </td>
                  <td style="width: 50px;">
                     <button style="background-color: #fff; width:50px;border: none;" type="button" class="btn btn-block btn-default btn-sm"><a href="xoa/{{ $ncc->id }}"><i class="fa fa-trash" style="color:red;"></i></a></button>
                 </td>
  </tr>

  @endforeach
  </tbody>
  </table>
</div>
<!-- /.box-body -->
<div class="box-footer clearfix">
  <ul class="pagination pagination-sm no-margin pull-right">
    <li>{{ $nccs->links() }}</li>
  </ul>
</div>
</div>
@stop