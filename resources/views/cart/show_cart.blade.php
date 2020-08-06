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
					</div>
                    <div class="col-md-12">
						<div class="row">
                        <table class="cartlist table table-striped table-bordered table-hover">
                    <?php
                        $content  = Cart::content();
                    ?>
		<tbody>
        <tr class="info">			 
			<td>Sản phẩm</td>
			<td>Số lượng</td>
			<td>Giá</td>
			<td>Thành Tiền</td>
			<td>Xóa</td>
		</tr>
            @foreach($content as $ct)
			<tr>				 
				<td>
				<div class="infospcart">
					<div class="haspcartpage">
						<img src="">
					</div>
					<h4>{{$ct->name}}</h4>
				</div>
				</td>
				<td>{{$ct->qty}}</td>
                @if($ct->weight == 0)
				<td>{{ number_format($ct->price,0,',','.')}} VNĐ </td>
                @else
                <td>{{ number_format($ct->weight,0,',','.')}} VNĐ </td>
                @endif
                @if($ct->weight == 0)
                <td>{{ number_format($ct->price* $ct->qty,0,',','.')  }}  VNĐ</td>
                @else
                <td>{{ number_format($ct->weight* $ct->qty,0,',','.') }} VNĐ </td>
                @endif
				<td><a class="" href="delete-cart/{{$ct->rowId}}"> <img src="https://www.pianomozart.com/templates/protostar/images/icon-xoa.png" title="Bạn muốn xóa thật à?"> </a></td>
			</tr>
            @endforeach
			<tr class="error">
			 
			 
			<!-- <td colspan="5" style="background-color: #f2dede;text-align: right;" class="thanhtien">Thành tiền: <span>30.000.000 đ</span></td> -->
			 
		</tr>
		
		<tr>
		
		 
			<td colspan="3" class="continueshopp">  
				<a href="https://www.pianomozart.com/">Tiếp tục mua hàng </a>
			</td>
			 
			<td colspan="2" class="thanhtoannow">
				<a href="/mua-dan-piano/payment.html">Tiến hành thanh toán</a>
			</td>
			
		</tr>
	</tbody></table>
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