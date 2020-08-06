@extends('adminlte::page')

@section('title', 'Mật khẩu')

@section('content_header')
    <h1>Đổi mật khẩu</h1>
@stop

@section('content')
<div class="box box-primary">
            <div class="box-header with-border">
              <h4 class="box-title" style="margin-left: 266px;">ĐỔI MẬT KHẨU</h4>
            </div>
            <form role="form" method="POST" action="{{ route('doimatkhau') }}" id="form-add">
                        @csrf
                        @if(count($errors) > 0)
                  <div class="alert alert-danger">
                    @foreach($errors->all() as $err)
                    {{$err}}<br>

                    @endforeach
                  </div>
                  @endif
                        @if(session('thongbao'))
                <div style="width: 40%;margin-left: 267px;" class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> Thông báo</h4>
                    {{ session('thongbao') }}
                </div>
                </div>
                @endif
              <div class="box-body">
                <div class="form-group" style="width: 40%;margin-left: 270px;">
                  <label for="exampleInputPassword1">Tên đăng nhập</label>
                  <input name="name" class="form-control" id="" disabled="disabled" value="{{Auth::user()->name}}">
                </div>
                   <div class="form-group" style="width: 40%;margin-left: 270px;">
                  <label for="exampleInputPassword1">Email</label>
                  <input name="email" class="form-control" id="" disabled="disabled" value="{{Auth::user()->email}}">
                </div>
                      <div class="form-group" style="margin-left: 253px;width: 42%;">
                        <div class="col-md-12 pull-left">
                            <label style="font-size:  14px;">Nhập mật khẩu(<span style="color: red;">*</span>)</label>
                             <input id="p1" name="password" type="password"  style="font-size:13px;padding: .4rem .75rem" class="form-control"  placeholder="VD:*******" data-date-format="MM/YYYY">
                        </div>
                        </div>
                        <div class="form-group" style="margin-left: 253px;width: 42%;">
                        <div class="col-md-12 pull-left">
                            <label style="font-size:  14px;">Nhập lại mật khẩu(<span style="color: red;">*</span>)</label>
                             <input id="p2"  name="re_password" type="password" style="font-size:13px;padding: .4rem .75rem" class="form-control" placeholder="VD:*******" data-date-format="MM/YYYY">
                        </div>
                        </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button style="margin-left: 270px;" type="submit" class="btn btn-primary">Sửa</button>
                <p class="text-danger" id="error"></p>
              </div>
            </form>
            <!-- <script>
                    function checkpass() {
                        var p1 = document.getElementById('p1').value;
                        var p2 = document.getElementById('p2').value;
                        if (p1 !== p2)
                            document.getElementById("error").innerHTML = "Mật khẩu không khớp nhau?";
                        else if (p1.trim() === '' || p2.trim() === '')
                            document.getElementById("error").innerHTML = "Mật khẩu không được để trống?";
                        else if (p1.length < 6 || p2.length < 6)
                            document.getElementById("error").innerHTML = "Mật khẩu phải từ 6 ký tự?";
                        else if (p1 === p2)
                            document.getElementById('password').submit();
                    }
                </script> -->
          
</div>     
@stop