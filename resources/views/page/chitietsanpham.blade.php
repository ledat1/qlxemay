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
						<ul class="breadcrumb-tree">
							<li><a href="#">TÊN SẢN PHẨM : {{$chitietsp->Tensanpham}}</a></li>
						</ul>
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
				<form>
					@csrf
					<input type="hidden" value="{{$chitietsp->id_sp}}" class="cart_product_id_{{$chitietsp->id_sp}}">
					<input type="hidden" value="{{$chitietsp->Tensanpham}}" class="cart_product_name_{{$chitietsp->id_sp}}">
					<input type="hidden" value="{{$chitietsp->Hinhanh}}" class="cart_product_image_{{$chitietsp->id_sp}}">
					@if($chitietsp->Giakhuyenmai == 0)
					<input type="hidden" value="{{$chitietsp->Giaban}}" class="cart_product_price_{{$chitietsp->id_sp}}">
					@else
					<input type="hidden" value="{{$chitietsp->Giakhuyenmai}}" class="cart_product_price_{{$chitietsp->id_sp}}">
					@endif
					<input type="hidden" value="1" class="cart_product_qty_{{$chitietsp->id_sp}}">
					<!-- Product main img -->
					<div class="col-md-7 col-md-push-2">
						<div id="product-main-img" class="slick-initialized slick-slider">
							<div class="slick-list draggable">
                            <div class="slick-track" style="opacity: 1; width: 1832px;">
                        
								<img style="width: 24%;" src="/upload/sanpham/{{$chitietsp->Hinhanh}}" alt="">

                        </div>
                        </div>
                        
                        </div>
					</div>
					<!-- /Product main img -->

					<!-- Product thumb imgs -->
			
					<!-- /Product thumb imgs -->

					<!-- Product details -->
					<div class="col-md-5">
						<div class="product-details">
							<h2 class="product-name">{{$chitietsp->Tensanpham}}</h2>
							<div>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o"></i>
								</div>
								<a class="review-link" href="#"> </a>
							</div>
                            @csrf
							<div>
                            @if($chitietsp->Giakhuyenmai == 0)
						  <h3 class="product-price">{{ number_format($chitietsp->Giaban,0,',','.')}} VNĐ <del class="product-old-price"></del></h3>
						  @else
						  <h3 class="product-price">{{ number_format($chitietsp->Giakhuyenmai,0,',','.')}} VNĐ <del class="product-old-price">{{ number_format($chitietsp->Giaban,0,',','.')}} VNĐ</del></h3>
						  @endif
							</div>

							<div class="product-options">
							
								<!-- <label>
									Color
									<select class="input-select">
										<option value="0">Red</option>
									</select>
								</label> -->
							</div>


							<!-- <ul class="product-btns">
								<li><a href="#"><i class="fa fa-heart-o"></i> add to wishlist</a></li>
								<li><a href="#"><i class="fa fa-exchange"></i> add to compare</a></li>
							</ul> -->

							<ul class="product-links">
								<li>Loại sản phẩm:</li>
								<li><a href="#">{{$chitietsp->Tenloaisanpham}}</a></li>
							
							</ul>
							<ul class="product-links">
								<li>Số khung:</li>
								<li><a href="#">{{$chitietsp->Sokhung}}</a></li>
							</ul>
							<div style="margin-top: 20px;" class="add-to-cart">
								<div class="ncc" style="">
									Thời gian bảo hành: {{$chitietsp->Thoigianbh}}
								</div>
							</div>
							<!-- <ul class="product-links">
								<li>Share:</li>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#"><i class="fa fa-envelope"></i></a></li>
							</ul> -->

							<div style="margin-top: 20px;" class="add-to-cart">
								<div class="ncc" style="padding-bottom: 30px;">
									Nhà cung cấp: {{$chitietsp->name}}
								</div>
								<button type="button" class="add-to-cart-btn themgiohang" name="themgiohang" data-id_product="{{$chitietsp->id_sp}}"><i class="fa fa-shopping-cart"></i> THÊM GIỎ HÀNG</button>
							</div>
						</div>
					</div>
					<!-- /Product details -->

					<!-- Product tab -->
					<div class="col-md-12">
						<div id="product-tab">
							<!-- product tab nav -->
							<ul class="tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab1" aria-expanded="true">CHI TIẾT SẢN PHẨM</a></li>
							</ul>
							<!-- /product tab nav -->

							<!-- product tab content -->
							<div class="tab-content">
								<!-- tab1  -->
								<div id="tab1" class="tab-pane fade active in">
									<div class="row">
										<div class="col-md-12">
											<p>{!! $chitietsp->Chitiet !!}</p>
										</div>
									</div>
								</div>
								<!-- /tab1  -->
							</div>
							<!-- /product tab content  -->
						</div>
					</div>
					<!-- /product tab -->
				</div>
				</form>
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
							<h3 class="title">SẢN PHẨM LIÊN QUAN</h3>
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
										@foreach($spcungloais as $spcungloai)
										<div class="product">
										 <a href="san-pham/{{$spcungloai->id_sp}}/{{$spcungloai->Tensanpham}}.html" tabindex="0">
											<div class="product-img">
											<img style="height: 190px;" src="/upload/sanpham/{{$spcungloai->Hinhanh}}" alt="">
												<div class="product-label">
                                                @if($spcungloai->hot == 1)
													<span class="new">HOT</span>
                                                    @else
                                                    <span style="display:none;" class="new">HOT</span>
                                                    @endif
												</div>
											</div>
											</a>
											<div class="product-body">
											<h3 class="product-name"><a href="san-pham/{{$spcungloai->id_sp}}/{{$spcungloai->Tensanpham}}.html" tabindex="0">{{$spcungloai->Tensanpham}}</a></h3>
											@if($spcungloai->Giakhuyenmai == 0)
												<h4 class="product-price">{{ number_format($spcungloai->Giaban,0,',','.')}} VNĐ <del class="product-old-price"></del></h4>
												@else
												<h4 class="product-price">{{ number_format($spcungloai->Giakhuyenmai,0,',','.')}} VNĐ <del class="product-old-price">{{ number_format($spcungloai->Giaban,0,',','.')}} VNĐ</del></h4>
												@endif
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Thêm giỏ hàng</button>
											</div>
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