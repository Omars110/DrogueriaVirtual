@extends('plantilla_web')
@section('titulo', $titulo)

@section('contenido')
<!-- Producto categoria -->
<div class="bg0 m-t-23 p-b-140">
	<div class="container mt-5">
		<div class="flex-w flex-sb-m p-b-15" id="tipoMedic"> <!-- las infomacion de la clase(class) se encuentra en el archivo util.css -->
			<div class="flex-w flex-l-m filter-tope-group m-tb-10">
				<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
					Todos los medicamentos
				</button>
				@foreach ($aTipoMedi as $aTipoMedi)
				<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".{{$aTipoMedi->clasificacion}}">
					{{$aTipoMedi->clasificacion}}
				</button>
				@endforeach
			</div>

			<div class="flex-w flex-c-m m-tb-10">
				<div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
					<i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
					<i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
					Filtro
				</div>

				<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
					<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
					<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
					Buscar
				</div>
			</div>

			<!-- Search product - (Buscar producto) -->
			<div class="dis-none panel-search w-full p-t-10 p-b-15">
				<!--<form action="" method="post">-->
					<div class="bor8 dis-flex p-l-15">
						<button type="submit" id="btnBuscar_2" name="buscar_2" class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
							<i class="zmdi zmdi-search"></i>
						</button>
						<input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" id="compraBuscar_2" name="compraBuscar_2" placeholder="¡Hola! a la orden">
					</div>
				<!-- </form>-->
			</div>

			<!-- Filter -->

			<!-- Filter -->
		</div>

		<!-- Producto detalles -->
		<div id="productoBuscar" class="mt-5">

		</div>

		<div class="row isotope-grid" id="productoGeneral">
			@foreach ($aProducto as $producto)
			<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item {{$producto->clasificacion}}">
				<!-- Block2 -->
				<div class="block2">
					<div class="block2-pic hov-img0">
						<img src="/archivos/imagenes_producto/{{$producto->imagen}}" alt="IMG-PRODUCT">

						<a href="" id="{{$producto->idmedicamento}}" onclick="detalle(this.id)" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
							Detalles
						</a>
					</div>

					<div class="block2-txt flex-w flex-t p-t-14">
						<div class="block2-txt-child1 flex-col-l ">
							<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
								{{$producto->nombre}}
							</a>

							<span class="stext-105 cl3">
								${{$producto->precio}}
							</span>
						</div>

						<div class="block2-txt-child2 flex-r p-t-3">
							<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
								<img class="icon-heart1 dis-block trans-04" src="/archivos/icons/icon-heart-01.png" alt="ICON">
								<img class="icon-heart2 dis-block trans-04 ab-t-l" src="/archivos/icons/icon-heart-02.png" alt="ICON">
							</a>
						</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>

		<!-- Cargar mas -->
		<div class="flex-c-m flex-w w-full p-t-45">
			<a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
				Cargar mas productos
			</a>
		</div>
	</div>
</div>

<!-- Back to top / Volver al principio -->
<div class="btn-back-to-top" id="myBtn">
	<span class="symbol-btn-back-to-top">
		<i class="zmdi zmdi-chevron-up"></i>
	</span>
</div>

<!-------------------------------------------------------------- MODAL ---------------------------------------------------------------------------------------------------->
<!-- Modal 1 -->
<div class="wrap-modal1 js-modal1 p-t-60 p-b-20">
	<div class="overlay-modal1 js-hide-modal1"></div>

	<div class="container">
		<div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
			<button class="how-pos3 hov3 trans-04 js-hide-modal1">
				<img src="/archivos/icons/icon-close.png" alt="CLOSE">
			</button>
			<!-- IMAGENES -->
			<div class="row">
				<div class="col-md-6 col-lg-7 p-b-30">
					<div class="p-l-25 p-r-30 p-lr-0-lg">
						<div class="wrap-slick3 flex-sb flex-w">
							<div class="wrap-slick3-dots"></div>
							<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

							<div class="slick3 gallery-lb">
								<div class="item-slick3" id="imagen_1">
									<div class="wrap-pic-w pos-relative">
										<img id="imagen_2" alt="IMG-PRODUCT">

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" id="imagen_3">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>

								<div class="item-slick3" id="imagen_01">
									<div class="wrap-pic-w pos-relative">
										<img id="imagen_02" alt="IMG-PRODUCT">

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" id="imagen_03">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>

								<div class="item-slick3" id="imagen_001">
									<div class="wrap-pic-w pos-relative">
										<img id="imagen_002" alt="IMG-PRODUCT">

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" id="imagen_003">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- IMAGENES -->

				<!-- DETALLE DEL PRODUCTO SELECCIONADO -->
				<div class="col-md-6 col-lg-5 p-b-30">
					<div class="p-r-50 p-t-5 p-lr-0-lg">

						<h4 class="mtext-105 cl2 js-name-detail p-b-14" id="nombreP">

						</h4>

						<span class="mtext-106 cl2" id="precioP">
							<!-- precio producto -->
						</span>

						<p class="stext-102 cl3 p-t-23" id="detalleP">
							Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.
						</p>

						<!--  -->
						<div class="p-t-33">
							<div class="flex-w flex-r-m p-b-10">
								<div class="size-204 flex-w flex-m respon6-next">

									<div class="wrap-num-product flex-w m-r-20 m-tb-10">
										<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
											<i class="fs-16 zmdi zmdi-minus"></i>
										</div>

										<input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" id="num-product" value="1">

										<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
											<i class="fs-16 zmdi zmdi-plus"></i>
										</div>
									</div>

									<div>
										<input type="hidden" name="nombre" id="nombre" value="">
										<input type="hidden" name="precio" id="precio" value="">
										<input type="hidden" name="idmedicamento" id="idmedicamento" value="">
									</div>

									<button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail" onclick="datosCarrito()">
										Agregar al carrito
									</button>
								</div>
							</div>
						</div>
						<!-- DETALLE DEL PRODUCTO SELECCIONADO -->

						<div class="flex-w flex-m p-l-100 p-t-40 respon7">
							<div class="flex-m bor9 p-r-10 m-r-11">
								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" data-tooltip="Add to Wishlist">
									<i class="zmdi zmdi-favorite"></i>
								</a>
							</div>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
								<i class="fa fa-facebook"></i>
							</a>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
								<i class="fa fa-twitter"></i>
							</a>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Google Plus">
								<i class="fa fa-google-plus"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-------------------------------------------------------------- FIN MODAL ---------------------------------------------------------------------------------------------------->

<script src="{{asset('/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<script>
//<!---------------------------------------------------- Busqueda desde boton buscar barra ------------------------------------------------------------------------------------>
	$(document).ready(function() {
		$('#btnBuscar_2').click(function(e) {
			e.preventDefault();
			var productoEncontrado;
			var dato = $('#compraBuscar_2').val();
			$.ajax({
				type: "GET", url: "{{asset('/productoWeb/compraBuscar')}}", data: {dato: dato,}, dataType: "json",
				success: function(response) {
					if (response) {
						$('#productoBuscar').html('');
						$("#productoGeneral").hide();
						$("#off_carrucel").hide();
						$("#tipoMedic").css("padding-top", "20px");
						$("#productoBuscar").addClass("row isotope-grid");

						response.forEach(elemento => { //inicio del forEach (data-id1=${elemento['idmedicamento']} )
							productoEncontrado =	
		`<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item ${elemento['clasificacion']}">
				<!-- Block2 -->
				<div class="block2">
					<div class="block2-pic hov-img0">
						<img src="/archivos/imagenes_producto/${elemento['imagen']}" alt="IMG-PRODUCT">

						<button id="${elemento['idmedicamento']}" onclick="detalle(this.id)" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
							Detalles
						</button>
					</div>

					<div class="block2-txt flex-w flex-t p-t-14">
						<div class="block2-txt-child1 flex-col-l ">
							<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
								${elemento['nombre']}
							</a>

							<span class="stext-105 cl3">
								$${elemento['precio']}
							</span>
						</div>

						<div class="block2-txt-child2 flex-r p-t-3">
							<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
								<img class="icon-heart1 dis-block trans-04" src="/archivos/icons/icon-heart-01.png" alt="ICON">
								<img class="icon-heart2 dis-block trans-04 ab-t-l" src="/archivos/icons/icon-heart-02.png" alt="ICON">
							</a>
						</div>
					</div>
				</div>
			</div>`
			$("#productoBuscar").append(productoEncontrado);		
						});//Fin del forEach
					}
				}
			});
		});
	});
//<!---------------------------------------------------- fin Busqueda desde boton buscar barra ------------------------------------------------------------------------------------>
//<!---------------------------------------------------- Busqueda desde boton buscar menu ----------------------------------------------------------------------------------------->	
	$(document).ready(function() {
		$('#btnBuscarMenu').click(function(e) {
			e.preventDefault();
			var productoEncontrado;
			var dato = $('#compraBuscar').val();
			$.ajax({type: "GET", url: "{{asset('/productoWeb/compraBuscar')}}", data: {dato: dato,}, dataType: "json",
				success: function(response) {
					if (response) {
						$("#productoGeneral").hide();
						$("#off_carrucel").hide();
						$("#tipoMedic").css("padding-top", "20px");//se agrega 20px asia abajo para separar los tipos de medicamentos del menu atraves de jquery
						$("#productoBuscar").addClass("row isotope-grid");
						$('#productoBuscar').html('');
						response.forEach(elemento => {
							productoEncontrado =	
			`<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item ${elemento['clasificacion']}">
				<!-- Block2 -->
				<div class="block2">
					<div class="block2-pic hov-img0">
						<img src="/archivos/imagenes_producto/${elemento['imagen']}" alt="IMG-PRODUCT">

						<button id="${elemento['idmedicamento']}" onclick="detalle(this.id)" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
							Detalles
						</button>
					</div>

					<div class="block2-txt flex-w flex-t p-t-14">
						<div class="block2-txt-child1 flex-col-l ">
							<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
								${elemento['nombre']}
							</a>

							<span class="stext-105 cl3">
								$${elemento['precio']}
							</span>
						</div>

						<div class="block2-txt-child2 flex-r p-t-3">
							<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
								<img class="icon-heart1 dis-block trans-04" src="/archivos/icons/icon-heart-01.png" alt="ICON">
								<img class="icon-heart2 dis-block trans-04 ab-t-l" src="/archivos/icons/icon-heart-02.png" alt="ICON">
							</a>
						</div>
					</div>
				</div>
			</div>`
			$("#productoBuscar").append(productoEncontrado);
						});
					}
				}
			});
		});
	});
	//<!---------------------------------------------------- Fin Busqueda desde boton buscar barra ------------------------------------------------------------------------------------>
	//$('#modal').click(function (e) { 
	//e.preventDefault();
	//var id1 = $(this).data('id1');
	//console.log(id, id1);
	function detalle(id) {
		$('.js-modal1').addClass('show-modal1');
		$.ajax({
			type: "GET",
			url: "{{asset('/productoWeb/detalle')}}",
			data: {
				id: id
			},
			dataType: "json",
			success: function(response) {
				response.forEach(element => {
					$('#num-product').attr("value", 0);
					$('#imagen_1 > .item-slick3').attr("data-thumb", "/archivos/imagenes_producto/" + element['imagen']);
					$('#imagen_2').attr("src", "/archivos/imagenes_producto/" + element['imagen']);
					$('#imagen_3').attr("href", "/archivos/imagenes_producto/" + element['imagen']);

					$('#imagen_01 > .item-slick3').attr("data-thumb", "/archivos/imagenes_producto/" + element['imagen']);
					$('#imagen_02').attr("src", "/archivos/imagenes_producto/" + element['imagen']);
					$('#imagen_03').attr("href", "/archivos/imagenes_producto/" + element['imagen']);

					$('#imagen_001 > .item-slick3').attr("data-thumb", "/archivos/imagenes_producto/" + element['imagen']);
					$('#imagen_002').attr("src", "/archivos/imagenes_producto/" + element['imagen']);
					$('#imagen_003').attr("href", "/archivos/imagenes_producto/" + element['imagen']);

					$('#nombreP').text(element['nombre']);
					$('#nombreP').attr("value", element['nombre']);
					$('#precioP').text('$' + element['precio']);

					//$('#detalleP').text(element['detalle']);  agregar esto mas adelante

					$('#nombre').attr("value", element['nombre']);
					$('#precio').attr("value", element['precio']);
					$('#idmedicamento').attr("value", element['idmedicamento']);
					$('#num-product').attr("value", 1);
				});
			}
		});
	};

	function datosCarrito() {
		var nombre_P = $('#nombre').attr("value");
		var precio_P = $('#precio').attr("value");
		var id_P = $('#idmedicamento').attr("value");
		var cantidad_P = $('#num-product').attr("value");

		$.ajax({
			type: "GET",
			url: "{{asset('/productoWeb/pedidoProducto')}}",
			data: {
				nombre_P: nombre_P,
				precio_P: precio_P,
				cantidad_P: cantidad_P,
				id_P: id_P
			},
			dataType: "json",
			success: function(response) {
				console.log(response);
			}
		});
	}
</script>
@endsection