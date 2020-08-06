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
							<h3 class="title">SẢN PHẨM MỚI</h3>
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
										@foreach($sanphammois as $sanphammoi)
										<div class="product">
										<form>
										@csrf
										<input type="hidden" value="{{$sanphammoi->id}}" class="cart_product_id_{{$sanphammoi->id}}">
										<input type="hidden" value="{{$sanphammoi->Tensanpham}}" class="cart_product_name_{{$sanphammoi->id}}">
										<input type="hidden" value="{{$sanphammoi->Hinhanh}}" class="cart_product_image_{{$sanphammoi->id}}">
										@if($sanphammoi->Giakhuyenmai == 0)
										<input type="hidden" value="{{$sanphammoi->Giaban}}" class="cart_product_price_{{$sanphammoi->id}}">
										@else
										<input type="hidden" value="{{$sanphammoi->Giakhuyenmai}}" class="cart_product_price_{{$sanphammoi->id}}">
										@endif
										<input type="hidden" value="1" class="cart_product_qty_{{$sanphammoi->id}}">
										 <a href="san-pham/{{$sanphammoi->id}}/{{$sanphammoi->Tensanpham}}.html" tabindex="0">
											<div class="product-img">
											<img style="height: 190px;" src="/upload/sanpham/{{$sanphammoi->Hinhanh}}" alt="">
												<div class="product-label">
													<span class="new">NEW</span>
												</div>
											</div>
											</a>
											<div class="product-body">
											<h3 class="product-name"><a href="san-pham/{{$sanphammoi->id}}/{{$sanphammoi->Tensanpham}}.html" tabindex="0">{{$sanphammoi->Tensanpham}}</a></h3>
											@if($sanphammoi->Giakhuyenmai == 0)
												<h4 class="product-price">{{ number_format($sanphammoi->Giaban,0,',','.')}} VNĐ <del class="product-old-price"></del></h4>
												@else
												<h4 class="product-price">{{ number_format($sanphammoi->Giakhuyenmai,0,',','.')}} VNĐ <del class="product-old-price">{{ number_format($sanphammoi->Giaban,0,',','.')}} VNĐ</del></h4>
												@endif
											</div>
											<div class="add-to-cart">
											<button type="button" class="add-to-cart-btn themgiohang" name="themgiohang" data-id_product="{{$sanphammoi->id}}" >
											<i class="fa fa-shopping-cart"></i>Thêm giỏ hàng
											</button>
											</div>
										</form>
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
		<div id="" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="">
					
						<a href="" target="_blank"><img style="height: 350px;width: 100%;margin-left: 8px;" src="./img/xehay-Honda KM-170718-5.jpg" alt=""></a>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">SẢN PHẨM HOT</h3>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab2" class="tab-pane fade in active">
									<div class="products-slick" data-nav="#slick-nav-2">

										<!-- product -->
										@foreach($sanphamhots as $sanphamhot)
										<div class="product">
										<form>
										@csrf
										<input type="hidden" value="{{$sanphamhot->id}}" class="cart_product_id_{{$sanphamhot->id}}">
										<input type="hidden" value="{{$sanphamhot->Tensanpham}}" class="cart_product_name_{{$sanphamhot->id}}">
										<input type="hidden" value="{{$sanphamhot->Hinhanh}}" class="cart_product_image_{{$sanphamhot->id}}">
										@if($sanphamhot->Giakhuyenmai == 0)
										<input type="hidden" value="{{$sanphamhot->Giaban}}" class="cart_product_price_{{$sanphamhot->id}}">
										@else
										<input type="hidden" value="{{$sanphamhot->Giakhuyenmai}}" class="cart_product_price_{{$sanphamhot->id}}">
										@endif
										<input type="hidden" value="1" class="cart_product_qty_{{$sanphamhot->id}}">
										<a href="san-pham/{{$sanphamhot->id}}/{{$sanphamhot->Tensanpham}}.html" tabindex="0">
											<div class="product-img">
											<img style="height: 190px;" src="/upload/sanpham/{{$sanphamhot->Hinhanh}}" alt="">
												<div class="product-label">
													<span class="new">HOT</span>
												</div>
											</div>
											</a>
											<div class="product-body">
											<h3 class="product-name"><a href="san-pham/{{$sanphamhot->id}}/{{$sanphamhot->Tensanpham}}.html" tabindex="0">{{$sanphamhot->Tensanpham}}</a></h3>
											@if($sanphamhot->Giakhuyenmai == 0)
												<h4 class="product-price">{{ number_format($sanphamhot->Giaban,0,',','.')}} VNĐ <del class="product-old-price"></del></h4>
												@else
												<h4 class="product-price">{{ number_format($sanphamhot->Giakhuyenmai,0,',','.')}} VNĐ <del class="product-old-price">{{ number_format($sanphamhot->Giaban,0,',','.')}} VNĐ</del></h4>
												@endif
											</div>
											<div class="add-to-cart">
												<button type="button" class="add-to-cart-btn themgiohang" 
												name="themgiohang"  data-id_product="{{$sanphamhot->id}}"><i class="fa fa-shopping-cart">
												</i>Thêm giỏ hàng</button>
											</div>
											</form>
										</div>
										@endforeach
										<!-- /product -->

									</div>
									<div id="slick-nav-2" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- /Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
@endsection