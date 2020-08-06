@extends('layouts.index')
@section('content')
<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
			
					<ul class="main-nav nav navbar-nav">
					<li class="active"><a href="{{route('trangchu')}}">TRANG CHỦ</a></li>
                    @foreach($theloais as $theloai)
						
						<li class=""><a style="text-transform: uppercase;" href="the-loai/{{$theloai->id}}/{{$theloai->Tenloaisanpham}}.html">{{ $theloai->Tenloaisanpham }}</a></li>
                        @endforeach
                       
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
        <div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">Đặt Hàng</h3>
					</div>
				
				</div>
				@if(count($errors) > 0)
				<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					@foreach($errors->all() as $err)
					{{$err}}<br>

					@endforeach
				</div>
				@endif
				@if(Session::has('thongbao'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                           <h2> {{ Session::get('thongbao') }} </h2>
                        </div>
                        @endif
			
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
        <div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<div class="col-md-7">
						<!-- Billing Details -->
						<form id="contact" action="{{route('luuDatHang')}}" method="POST">
                            @csrf
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">Nhập thông tin</h3>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="Hoten" placeholder="Họ Tên">
							</div>
							<div class="form-group">
							<!-- <label for="">Giới tính : </label> -->
								<input type="radio" name="Gioitinh" value="Nam" checked="checked"><span>Nam</span>
                                <input type="radio" name="Gioitinh" value="Nữ" checked="checked"><span>Nữ</span>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="Diachi" placeholder="Địa Chỉ">
							</div>
							<div class="form-group">
								<input class="input" type="email" name="email" placeholder="Email">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="Sodienthoai" placeholder="Số Điện Thoại">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="Ghichu" placeholder="Ghi chú">
							</div>
							<div class="form-group">
								<select class="form-control" name="id_nhanvien" id="">
									<option value="">Chọn nhân viên bán hàng</option>
									@foreach($nhanviens as $nhanvien)
									<option value="{{ $nhanvien->id }}">{{$nhanvien->name}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<!-- /Billing Details -->

					</div>

					<!-- Order Details -->
					<div class="col-md-5 order-details">
						<div class="section-title text-center">
							<h3 class="title">Hóa Đơn</h3>
						</div>
						<div class="order-summary">
							<div class="order-col">
								<div><strong>Sản phẩm</strong></div>
								<div><strong>Thành tiền</strong></div>
							</div>
							@if(Session('cart') == true)
							@php 
								$tongtien = 0;	
							@endphp
							@foreach(Session::get('cart')  as $key => $giohang)
								@php	
									$thanhtien = $giohang['Giaban']*$giohang['sanpham_qty'];
									$tongtien += $thanhtien;
								@endphp
							<div class="order-products">
								<div class="order-col">
									<div>[{{$giohang['sanpham_qty']}}]-{{$giohang['Tensanpham']}}
									</div>
									<!-- <div class="form-group">
											<div style="width:160px;" class="col-md-12 pull-left">
										<select class="form-control" name="Mausac" id="">
											<option value="">Chọn màu</option>
											<option value="Đỏ">Màu đỏ</option>
											<option value="Xanh">Màu xanh</option>
											<option value="Vàng">Màu vàng</option>
											<option value="Rêu">Màu Rêu</option>
										</select>
										</div>
									</div> -->
									<div>{{ number_format($giohang['Giaban']*$giohang['sanpham_qty'],0,',','.')}} VNĐ</div>
								</div>
							</div>
							@endforeach
							<div class="order-col">
								<div><strong>Tổng tiền:</strong></div>
								<div><strong class="order-total">{{ number_format($tongtien,0,',','.')}} VNĐ</strong></div>
							</div>
							@endif
						</div>
						<input style="margin-left: 155px;" type="submit" class="btn btn-danger btn-large button primary-btn order-submit" value="Đặt Hàng" name="submit">
					</div>
					</form>
					<!-- /Order Details -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
@endsection