@extends('adminlte::page')

@section('title', 'Tìm kiếm thể lọai')

@section('content')

<div class="box">
  <div class="box-header">
    <h3 class="box-title">Danh mục tìm kiếm</h3>
    <h4>Tìm kiếm thấy : {{count($loais)}} loại sản phẩm </h4>
  </div>
  <!-- /.box-header -->
  <div class="box-body no-padding">
    <table class="table">
      <tbody>
        <tr>
          <th style>Tên thể loại</th>
          <th style="width: 40px"></th>
        </tr>
        @if (session('thongbao'))
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-check"></i> Thông báo</h4>
          {{ session('thongbao') }}
        </div>
  </div>
  @endif

  @foreach($loais as $loai)
  <tr>

    <td>{{ $loai->Tenloaisanpham }}</td>
    <td style="width: 50px;">
      <button type="button" class="btn btn-block btn-default btn-sm"><a href="sua/{{ $loai->id }}">Sửa</a></button>
    </td>
    <td style="width: 50px;">
      <button type="button" class="btn btn-block btn-default btn-sm"><a href="xoa/{{ 
                    $loai->id }}">Xóa</a></button>
    </td>
  </tr>

  @endforeach
  </tbody>
  </table>
</div>
<!-- /.box-body -->
<div class="box-footer clearfix">
  <ul class="pagination pagination-sm no-margin pull-right">
    <li>{{ $loais->links() }}</li>
  </ul>
</div>
</div>
@stop