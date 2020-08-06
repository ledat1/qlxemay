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
							<li class="active">LOẠI SẢN PHẨM : {{$loais->Tenloaisanpham}}({{(count($tls))}})</li>
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
					<!-- ASIDE -->
					<div id="aside" class="col-md-3">
						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">danh mục sản phẩm</h3>
                            @foreach($theloais as $theloai)
							<div class="checkbox-filter">

								<div class="input-checkbox">
									<input type="checkbox" id="category-1">
									<label for="category-1">
										<span></span>
										<a href="the-loai/{{$theloai->id}}/{{$theloai->Tenloaisanpham}}.html">{{ $theloai->Tenloaisanpham }}</a>
									</label>
								</div>

							</div>
                            @endforeach
						</div>
						<div class="aside">
                        @foreach($sanphamhots as $sanphamhot)
							<h3 class="aside-title">Sản phẩm hot</h3>
							<div class="product-widget">
								<div class="product-img">
									<img src="/upload/sanpham/{{$sanphamhot->Hinhanh}}" alt="">
								</div>
								<div class="product-body">
								<h3 class="product-name"><a href="san-pham/{{$sanphamhot->id}}/{{$sanphamhot->Tensanpham}}.html">{{$sanphamhot->Tensanpham}}</a></h3>
									@if($sanphamhot->Giakhuyenmai == 0)
												<h4 class="product-price">{{ number_format($sanphamhot->Giaban,0,',','.')}} VNĐ <del class="product-old-price"></del></h4>
												@else
												<h4 class="product-price">{{ number_format($sanphamhot->Giakhuyenmai,0,',','.')}} VNĐ <del class="product-old-price">{{ number_format($sanphamhot->Giaban,0,',','.')}} VNĐ</del></h4>
												@endif
								</div>
							</div>
                        @endforeach
						</div>
						<!-- /aside Widget -->
					</div>
					<!-- /ASIDE -->

					<!-- STORE -->
					<div id="store" class="col-md-9">
						<!-- store top filter -->
						<!-- <div class="store-filter clearfix">
							<div class="store-sort">
								<label>
									Sort By:
									<select class="input-select">
										<option value="0">Popular</option>
										<option value="1">Position</option>
									</select>
								</label>

								<label>
									Show:
									<select class="input-select">
										<option value="0">20</option>
										<option value="1">50</option>
									</select>
								</label>
							</div>
							<ul class="store-grid">
								<li class="active"><i class="fa fa-th"></i></li>
								<li><a href="#"><i class="fa fa-th-list"></i></a></li>
							</ul>
						</div> -->
						<!-- /store top filter -->

						<!-- store products -->
						<div class="row">
						

							<!-- product -->
                            @foreach($tls as $tl)
							<div class="col-md-4 col-xs-6">
								<div class="product">
								<form>
										@csrf
										<input type="hidden" value="{{$tl->id}}" class="cart_product_id_{{$tl->id}}">
										<input type="hidden" value="{{$tl->Tensanpham}}" class="cart_product_name_{{$tl->id}}">
										<input type="hidden" value="{{$tl->Hinhanh}}" class="cart_product_image_{{$tl->id}}">
										@if($tl->Giakhuyenmai == 0)
										<input type="hidden" value="{{$tl->Giaban}}" class="cart_product_price_{{$tl->id}}">
										@else
										<input type="hidden" value="{{$tl->Giakhuyenmai}}" class="cart_product_price_{{$tl->id}}">
										@endif
										<input type="hidden" value="1" class="cart_product_qty_{{$tl->id}}">
								<a href="san-pham/{{$tl->id}}/{{$tl->Tensanpham}}.html" tabindex="0">
									<div class="product-img">
                                    <img style="height: 190px;" src="/upload/sanpham/{{$tl->Hinhanh}}" alt="">
										<div class="product-label">
                                            @if($tl->hot == 1)
											<span class="new">HOT</span>
                                            @else
                                            <span style="display:none;" class="new">HOT</span>
                                            @endif
										</div>
									</div>
									</a>
									<div class="product-body">
										<h3 class="product-name"><a href="san-pham/{{$tl->id}}/{{$tl->Tensanpham}}.html">{{$tl->Tensanpham}}</a></h3>
                                        @if($tl->Giakhuyenmai == 0)
												<h4 class="product-price">{{ number_format($tl->Giaban,0,',','.')}} VNĐ <del class="product-old-price"></del></h4>
												@else
												<h4 class="product-price">{{ number_format($tl->Giakhuyenmai,0,',','.')}} VNĐ <del class="product-old-price">{{ number_format($tl->Giaban,0,',','.')}} VNĐ</del></h4>
										@endif
									</div>
									<div class="add-to-cart">
										<button type="button" class="add-to-cart-btn themgiohang" name="themgiohang" data-id_product="{{$tl->id}}" >
											<i class="fa fa-shopping-cart"></i>Thêm giỏ hàng
											</button>
									</div>
								</div>
								</form>
							</div>
                            @endforeach
							<!-- /product -->

							<div class="clearfix visible-sm visible-xs"></div>


						</div>
							<!-- /product -->

							<div class="clearfix visible-sm visible-xs"></div>


						</div>
						<!-- /store products -->

						<!-- store bottom filter -->
						<div class="store-filter clearfix">
							
						</div>
						<!-- /store bottom filter -->
					</div>
					<!-- /STORE -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
 @endsection       