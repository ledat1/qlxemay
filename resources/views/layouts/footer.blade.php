<footer id="footer" style="background-color:#15161dde">
			<!-- top footer -->
			<div class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-4 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Về chúng tôi</h3>
								<ul class="footer-links">
									<li><i class="fa fa-map-marker"></i>Cầu Giấy-Hà Nội</li>
									<li><i class="fa fa-phone"></i>+021-95-51-84</li>
									<li><i class="fa fa-envelope-o"></i>email@email.com</li>
								</ul>
							</div>
						</div>

						<div class="col-md-4 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Danh mục</h3>
								
								<ul class="footer-links">
								@foreach($theloais as $theloai)
									<li><a href="the-loai/{{$theloai->id}}/{{$theloai->Tenloaisanpham}}.html">{{ $theloai->Tenloaisanpham }}</a></li>
								
									@endforeach
								</ul>
							</div>
						</div>

						<div class="clearfix visible-xs"></div>

				

						<div class="col-md-4 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Giỏ hàng</h3>
								<ul class="footer-links">
									<li><a href="{{route('giohang')}}">Xem giỏ hàng</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /top footer -->

			<!-- bottom footer -->
		
			<!-- /bottom footer -->
		</footer>