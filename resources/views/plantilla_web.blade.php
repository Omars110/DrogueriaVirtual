<!DOCTYPE html>
<html lang="es">

<head>
	<title>@yield('titulo')</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="{{ asset('/archivos/icons/favicon.png') }}" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('/vendor/bootstrap/css/bootstrap.min.css') }}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('/fonts/iconic/css/material-design-iconic-font.min.css') }}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('/fonts/linearicons-v1.0.0/icon-font.min.css') }}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('/vendor/animate/animate.css') }}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('/vendor/css-hamburgers/hamburgers.min.css') }}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('/vendor/animsition/css/animsition.min.css') }}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('/vendor/select2/select2.min.css') }}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('/vendor/daterangepicker/daterangepicker.css') }}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('/vendor/slick/slick.css') }}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('/vendor/MagnificPopup/magnific-popup.css') }}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('/vendor/perfect-scrollbar/perfect-scrollbar.css') }}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/web_ccs/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/web_ccs/main.css') }}">
	<!--===============================================================================================-->
	<link href="{{ asset('css/fontawesome/css/fontawesome.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/fontawesome/css/all.min.css') }}" rel="stylesheet" type="text/css">
	<!--===============================================================================================-->
</head>

<body class="animsition">
	<!-- Header -->
	<header>
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<!-- Topbar -->
			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop container">
					<!-- Logo desktop -->
					<a href="#" class="logo">
						<img src="/archivos/icons/logo-01.png" alt="IMG-LOGO">
					</a>
					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li><a href="#">Inicio</a></li>
							<li><a href="/productoWeb/index">Medicamento</a></li>
							<li class="label1" data-label1="hot"><a href="shoping-cart.html">Factura</a></li>
							<li><a href="blog.html">Blog</a></li>
							<li><a href="about.html">Quienes somos</a></li>
							<li><a href="contact.html">Contacto</a></li>
							@if ($login === '1')
							<li><a href="/login/cerrar_sesion">Cerrar sesion</a></li>
							@else
							<li><a href="/registrar/index">Registrate</a></li>
							<li><a href="/login/index">Iniciar sesion</a></li>
							@endif
						</ul>
					</div>
					<!-- Iconos header -->
					<div class="wrap-icon-header flex-w flex-r-m">
						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
							<i class="zmdi zmdi-search"></i>
						</div>

						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify={{$tamaño}}>
							<i class="zmdi zmdi-shopping-cart"></i>
						</div>

						<a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" data-notify="5">
							<i class="zmdi zmdi-favorite-outline"></i>
						</a>
					</div>
				</nav>
			</div>
		</div>
		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->
			<div class="logo-mobile">
				<a href="index.html"><img src="/archivos/icons/logo-01.png" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
					<i class="zmdi zmdi-search"></i>
				</div>

				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify={{$tamaño}}>
					<i class="zmdi zmdi-shopping-cart"></i>
				</div>

				<a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti" data-notify="5">
					<i class="zmdi zmdi-favorite-outline"></i>
				</a>
			</div>
			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>
		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<ul class="main-menu-m">
				<li><a href="/">inicio</a></li>
				<li><a href="/productoWeb/index">Medicamentos</a></li>
				<li><a href="shoping-cart.html" class="label1 rs1" data-label1="hot">factura</a></li>
				<li><a href="blog.html">Blog</a></li>
				<li><a href="about.html">Quienes somos</a></li>
				<li><a href="contact.html">Contacto</a></li>
				@if ($login === '1')
				<li><a href="/login/cerrar_sesion">Cerrar sesion</a></li>
				@else
				<li><a href="/registrar/index">Registrate</a></li>
				<li><a href="/login/index">Iniciar sesion</a></li>
				@endif
			</ul>
		</div>
		<!-- Modal buscar -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="/archivos/icons/icon-close2.png" alt="CLOSE">
				</button>

				<form class="wrap-search-header flex-w p-l-15">
					<button type="submit" id="btnBuscar" name="btnBuscar" class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input class="plh3" type="text" name="buscar" id="buscar" placeholder="!Hola¡ a la Orden">
				</form>
			</div>
		</div>
	</header>
	<!-- Carrito -->
	<div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>
		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Mi carrito
				</span>
				<!-- Boton cerrar carrito -->
				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
				<!-- Icono Boton cerrar carrito -->
			</div>
			<?php
			$total = 0;
			$subtotal = 0;
			$cantidad_carrito = 0;
			$c_P = 0;
			?>
			<div class="header-cart-content flex-w js-pscroll">
				@foreach ($aCarritoProducto as $producto)
				<ul class="header-cart-wrapitem w-full">
					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							<img src="/archivos/imagenes_producto/{{$producto->imagen}}" alt="IMG">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="/productoWeb/eliminarP_C/{{$producto->idpedido_producto}}" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								{{$producto->nombre}}
							</a>

							<span class="header-cart-item-info">
								{{$producto->cantidad}} x ${{$producto->precio_unitario}}
							</span>
							<span class="header-cart-item-info">
								Subtotal: {{$subtotal = $producto->cantidad * $producto->precio_unitario}}
							</span>

							<div class="icono-eliminar">
								<a href="/productoWeb/eliminarP_C/{{$producto->idpedido_producto}}"><i class="fa-solid fa-trash" style="color: #ff0000;"></i></a>
							</div>
						</div>
					</li>
				</ul>
				<div id="cantidad_carrito">
					<?php
					$total = $subtotal + $total;
					?>
				</div>
				@endforeach
				<div class="w-full">
					<div class="header-cart-total w-full p-tb-40">
						Total: ${{$total}}
					</div>

					<div class="header-cart-buttons flex-w w-full">
						<a href="shoping-cart.html" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
							Ver Carrito
						</a>

						<a href="shoping-cart.html" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
							Confirmar
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Carrusel -->
	@if($onCarrucel === 'on')
	<section class="section-slide">
		<div class="wrap-slick1">
			<div class="slick1">
				<div class="item-slick1" style="background-image: url(/archivos/imagenes_producto/2023062906065201.png);">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
								<span class="ltext-101 cl2 respon2">
									Women Collection 2018
								</span>
							</div>

							<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
								<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
									NEW SEASON
								</h2>
							</div>

							<div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
								<a href="product.html" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
									Shop Now
								</a>
							</div>
						</div>
					</div>
				</div>

				<div class="item-slick1" style="background-image: url(/archivos/imagenes_producto/2023062906060010.png);">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">
								<span class="ltext-101 cl2 respon2">
									Men New-Season
								</span>
							</div>

							<div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn" data-delay="800">
								<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
									Jackets & Coats
								</h2>
							</div>

							<div class="layer-slick1 animated visible-false" data-appear="slideInUp" data-delay="1600">
								<a href="product.html" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
									Shop Now
								</a>
							</div>
						</div>
					</div>
				</div>

				<div class="item-slick1" style="background-image: url(/archivos/slide-03.jpg);">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="rotateInDownLeft" data-delay="0">
								<span class="ltext-101 cl2 respon2">
									Men Collection 2018
								</span>
							</div>

							<div class="layer-slick1 animated visible-false" data-appear="rotateInUpRight" data-delay="800">
								<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
									New arrivals
								</h2>
							</div>

							<div class="layer-slick1 animated visible-false" data-appear="rotateIn" data-delay="1600">
								<a href="product.html" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
									Shop Now
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	@endif
	</header>
	<div>
		@yield('contenido')
	</div>
	<!-- Footer -->
	<footer class="bg3 p-t-75 p-b-32">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Categories
					</h4>

					<ul>
						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Women
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Men
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Shoes
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Watches
							</a>
						</li>
					</ul>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Help
					</h4>

					<ul>
						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Track Order
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Returns
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Shipping
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								FAQs
							</a>
						</li>
					</ul>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						GET IN TOUCH
					</h4>

					<p class="stext-107 cl7 size-201">
						Any questions? Let us know in store at 8th floor, 379 Hudson St, New York, NY 10018 or call us on (+1) 96 716 6879
					</p>

					<div class="p-t-27">
						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-facebook"></i>
						</a>

						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-instagram"></i>
						</a>

						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-pinterest-p"></i>
						</a>
					</div>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Newsletter
					</h4>

					<form>
						<div class="wrap-input1 w-full p-b-4">
							<input class="input1 bg-none plh1 stext-107 cl7" type="text" name="email" placeholder="email@example.com">
							<div class="focus-input1 trans-04"></div>
						</div>

						<div class="p-t-18">
							<button class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04">
								Subscribe
							</button>
						</div>
					</form>
				</div>
			</div>

			<div class="p-t-40">
				<div class="flex-c-m flex-w p-b-18">
					<a href="#" class="m-all-1">
						<img src="/archivos/icons/icon-pay-01.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="/archivos/icons/icon-pay-02.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="/archivos/icons/icon-pay-03.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="/archivos/icons/icon-pay-04.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="/archivos/icons/icon-pay-05.png" alt="ICON-PAY">
					</a>
				</div>

				<p class="stext-107 cl6 txt-center">
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					Copyright &copy;<script>
						document.write(new Date().getFullYear());
					</script> Totos los derechos reservados | Colombia-Arjona Bolivar <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> &amp; distributed by <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
				</p>
			</div>
		</div>
	</footer>
	<!--===============================================================================================-->
	<script src="{{ asset('/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
	<!--===============================================================================================-->
	<script src="{{ asset('/vendor/animsition/js/animsition.min.js')}}"></script>
	<!--===============================================================================================-->
	<script src="{{ asset('/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{ asset('/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
	<!--===============================================================================================-->
	<script src="{{ asset('/vendor/select2/select2.min.js')}}"></script>
	<script>
		$(".js-select2").each(function() {
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
	<!--===============================================================================================-->
	<script src="{{ asset('/vendor/daterangepicker/moment.min.js')}}"></script>
	<script src="{{ asset('/vendor/daterangepicker/daterangepicker.js')}}"></script>
	<!--===============================================================================================-->
	<script src="{{ asset('/vendor/slick/slick.min.js')}}"></script>
	<script src="{{ asset('/js/web_js/slick-custom.js')}}"></script>
	<!--===============================================================================================-->
	<script src="{{ asset('/vendor/parallax100/parallax100.js')}}"></script>
	<script>
		$('.parallax100').parallax100();
	</script>
	<!--===============================================================================================-->
	<script src="{{ asset('/vendor/MagnificPopup/jquery.magnific-popup.min.js')}}"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
				delegate: 'a', // the selector for gallery item
				type: 'image',
				gallery: {
					enabled: true
				},
				mainClass: 'mfp-fade'
			});
		});
	</script>
	<!--===============================================================================================-->
	<script src="{{ asset('/vendor/isotope/isotope.pkgd.min.js')}}"></script>
	<!--===============================================================================================-->
	<script src="{{ asset('/vendor/sweetalert/sweetalert.min.js')}}"></script>
	<script>
		$('.js-addwish-b2').on('click', function(e) {
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function() {
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function() {
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function() {
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function() {
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function() {
			//var nameProduct = $(this).parent().parent().parent().parent().find('js-name-detail').html();	
			$(this).on('click', function() {
				var nameProduct = $('#nombreP').attr("value");
				swal(nameProduct, "Añadido a tu carrito !", "success");
			});
		});
	</script>
	<!--===============================================================================================-->
	<script src="{{ asset('/vendor/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
	<script>
		$('.js-pscroll').each(function() {
			$(this).css('position', 'relative');
			$(this).css('overflow', 'hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function() {
				ps.update();
			})
		});
	</script>
	<!--===============================================================================================-->
	<script src="{{ asset('/js/web_js/main.js')}}"></script>
	<script>
		$(document).ready(function() {
			$("#cantidad_carrito").on("DOMSubtreeModified", function() {
				var cantidad = $(this).text(); // Obtienes el texto del elemento con id "cantidad_carrito"
				console.log(cantidad);
			});
		});
	</script>
</body>

</html>