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
        <div class="section">
            <div class="container">
			
                <div class="row">
			
                <div class="col-md-12">
						<div class="section-title">
							<h3 class="title">GIỎ HÀNG</h3>
						</div>
						@if (session('thongbao'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-check"></i> Thông báo</h4>
                                {{ session('thongbao') }}

								@endif
					</div>
                    <div class="col-md-12">
						<div class="row">
					<form action="{{ route('sua_giohang') }}" method="POST">
						@csrf
                        <table class="cartlist table table-striped table-bordered table-hover">
                  
		<tbody>
        <tr class="info">			 
			<td>Sản phẩm</td>
			<td>Số lượng</td>
			<td>Giá sản phẩm</td>
			<td>Thành Tiền</td>
			<td>Xóa</td>
		</tr>
		@if(Session('cart') == true)
			@php 
				$tong = 0;	
			@endphp
			@foreach(Session::get('cart')  as $key => $cart)
				@php	
					$thanhtien = $cart['Giaban']*$cart['sanpham_qty'];
					$tong += $thanhtien;
				@endphp
			<tr>				 
				<td>
				<div class="infospcart">
					<div class="haspcartpage">
						<img style="height: 50px;" src="/upload/sanpham/{{$cart['Hinhanh']}}">
					</div>
					<h4>{{$cart['Tensanpham']}}</h4>
				</div>
				</td>
				<td>
						<input type="number" min="1" name="cart_qty[{{$cart['session_id']}}]" value="{{$cart['sanpham_qty']}}">
					
				</td>
				<td>{{ number_format($cart['Giaban'],0,',','.')}} VNĐ</td>
				<td>{{ number_format($thanhtien,0,',','.')}} VNĐ
				</td>
				<td><a class="" href="/delete-sp/{{$cart['session_id']}}"> <img src="https://www.pianomozart.com/templates/protostar/images/icon-xoa.png" title="Bạn muốn xóa thật à?"> </a>
				</td>
              
				
			</tr>
           @endforeach
			<tr class="error">
			 
			 
			<td colspan="5" style="background-color: #f2dede;text-align: right;" class="thanhtien">
			Thành tiền: <span>{{ number_format($tong,0,',','.')}} VNĐ</span></td>
			 
		</tr>
		
		<tr>
		
		 
			<td colspan="3" class="continueshopp">  
				<input type="submit" value="Cập nhật giỏ hàng" name="suagiohang" class="btn btn-danger btn-sm">
			</td>
			 
			<td colspan="2" class="thanhtoannow">
				<a href="{{route('datHang')}}">Tiến hành thanh toán</a>
			</td>
			
		</tr>
		@else	
		
			<h4 style="color:red;"> Giỏ hàng trống</h4>
	 		
		@endif
	</tbody>
	</table>
	</form>
						</div>
					</div>
                </div>
            </div>
        </div>
@endsection
<style>
.thanhtoannow a {
    opacity: .8;
    filter: alpha(opacity=80);
    border-radius: 4px;
    display: block;
    padding: 10px 20px;
    background: #D60C0C;
    color: #fff;
    font-size: 15px;
    text-align: center;
    text-decoration: none;
}
</style>