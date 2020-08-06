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
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Tìm thấy : {{count($sanphams)}} sản phẩm</h3>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
										<!-- product -->
										@foreach($sanphams as $sanpham)
										<div class="product">
										 <a href="san-pham/{{$sanpham->id_sptl}}/{{$sanpham->Tensanpham}}.html" tabindex="0">
											<div class="product-img">
											<img style="height: 190px;" src="/upload/sanpham/{{$sanpham->Hinhanh}}" alt="">
												<div class="product-label">
													<span class="new">NEW</span>
												</div>
											</div>
											</a>
											<div class="product-body">
											<h3 class="product-name"><a href="san-pham/{{$sanpham->id_sptl}}/{{$sanpham->Tensanpham}}.html" tabindex="0">{{$sanpham->Tensanpham}}</a></h3>
											@if($sanpham->Giakhuyenmai == 0)
												<h4 class="product-price">{{ number_format($sanpham->Giaban,0,',','.')}} VNĐ <del class="product-old-price"></del></h4>
												@else
												<h4 class="product-price">{{ number_format($sanpham->Giakhuyenmai,0,',','.')}} VNĐ <del class="product-old-price">{{ number_format($sanpham->Giaban,0,',','.')}} VNĐ</del></h4>
												@endif
											</div>
											<!-- <div class="add-to-cart">
												<button type="submit" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Thêm giỏ hàng</button>
											</div> -->
										</div>
										@endforeach
										<!-- /product -->
										<!-- /product -->
									</div>
									<div id="slick-nav-1" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
@endsection