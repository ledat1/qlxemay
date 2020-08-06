<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="vi-vn" lang="vi-vn" dir="ltr">

<head>
  <meta name="google-site-verification" content="CCt-_80tpDcHEZ_dy5Rb2H0hRoZa_bgxxw9E-XNRe0o" />
  <meta name="google-site-verification" content="rg-9NjE8-rnsqvdAylGopJqKwl6HEX6f5GLgqlQHmdw" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />

  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  
  <title>@yield('title')</title>
  <base href="{{ asset('') }}">
  <link href="/?format=feed&amp;type=rss" rel="alternate" type="application/rss+xml" title="RSS 2.0" />
  <link href="/?format=feed&amp;type=atom" rel="alternate" type="application/atom+xml" title="Atom 1.0" />
  <link href="/templates/protostar/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
  <link rel="stylesheet" href="css-tt/bootstrap.min.css" type="text/css" />
  <link rel="stylesheet" href="css-tt/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="css-tt/nouislider.min.css" type="text/css" />
  <link rel="stylesheet" href="css-tt/slick-theme.css" type="text/css" />
  <link rel="stylesheet" href="css-tt/slick.css" type="text/css" />
  <link rel="stylesheet" href="css-tt/style.css" type="text/css"/>
  <link rel="stylesheet" href="css/sweetalert.css" type="text/css"/>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">


  @yield('css')
  <!-- End Facebook Pixel Code -->
</head>

<body class="site com_content view-featured no-layout no-task itemid-101">

  <!-- Body -->
  @include('layouts.header')


  @yield('content')

  @yield('script')
  @include('layouts.footer')


    <script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/slick.min.js"></script>
		<script src="js/nouislider.min.js"></script>
		<script src="js/jquery.zoom.min.js"></script>
		<script src="js/main.js"></script>
    <script src="js/sweetalert.min.js"></script>
    <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
    <<script>
      $(document).ready(function(){
        $('.themgiohang').click(function(){
          var id = $(this).data('id_product');
          var cart_product_id = $('.cart_product_id_' + id).val();
          var cart_product_name = $('.cart_product_name_' + id).val();
          var cart_product_image = $('.cart_product_image_' + id).val();
          var cart_product_price = $('.cart_product_price_' + id).val();
          var cart_product_qty = $('.cart_product_qty_' + id).val();
          var _token = $('input[name="_token"]').val();

          $.ajax({
                    url: '{{url('/add-cart-ajax')}}',
                    method: 'POST',
                    data:{cart_product_id:cart_product_id,cart_product_name:cart_product_name,
                    cart_product_image:cart_product_image,cart_product_price:
                    cart_product_price,cart_product_qty:cart_product_qty,_token:_token},
                   
                    success:function(){
                        swal({
                                title: "Đã thêm sản phẩm vào giỏ hàng",
                                text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                                showCancelButton: true,
                                cancelButtonText: "Xem tiếp",
                                confirmButtonClass: "btn-success",
                                confirmButtonText: "Đi đến giỏ hàng",
                                closeOnConfirm: false
                              },
                            function() {
                                window.location.href = "{{url('/gio-hang')}}";
                            });


                          
                    }

                });
            });

        });
    </script>
 
</body>

</html>
