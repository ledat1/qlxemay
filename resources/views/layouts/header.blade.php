<header>
			<!-- TOP HEADER -->
			<div id="top-header" style="background-color:#15161dde">
				<div class="container">
					<ul class="header-links pull-left">
						<li style="color:#fff"><i class="fa fa-phone"></i> +021-95-51-84</li>
						<li style="color:#fff"><i class="fa fa-envelope-o"></i> email@email.com</li>
						<li style="color:#fff"><i class="fa fa-map-marker"></i> Cầu Giấy- Hà Nội</li>
					</ul>
					<ul class="header-links pull-right">
						<!-- <li><a href="#"><i class="fa fa-user-o"></i> Đăng nhập</a></li> -->
					</ul>
				</div>
			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header" style="background-color:#15161dde">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="/trangchu" class="logo">
									<img style="width: 200px;" src="./img/quangpuong.png" alt="">
								</a>
							</div>
						</div>
						<!-- /LOGO -->
						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
							<form action="{{ route('timKiemSp') }}" method="get" role="search">
									<input type="text" class="input" name="sptl" placeholder="Tìm kiếm sản phẩm">
									<button type="submit" class="search-btn">Tim kiếm</button>
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->
					

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
							

								<!-- Cart -->
								<div class="dropdown">
									<a href="{{route('giohang')}}">
										<i class="fa fa-shopping-cart"></i>
										<span>Giỏ Hàng</span>
									</a>
								</div>
								<!-- /Cart -->

								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>