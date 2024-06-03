@extends('plantilla_web')
@section('titulo', $titulo)

@section('contenido')

<body class="animsition">

	<!-- Header -->
	<header class="header-v4">
	</header>

	<!-- Cart -->

	<!-- breadcrumb -->
	<div class="container mt-5">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="/productoWeb/index" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Shoping Cart
			</span>
		</div>
	</div>
	<!-- Shoping Cart -->
	<form class="bg0 p-t-75 p-b-85">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">Producto</th>
									<th class="column-2"></th>
									<th class="column-3">Precio</th>
									<th class="column-4">Cantidad</th>
									<th class="column-5">Total</th>
								</tr>
								<?php
								$total_factura = 0;
								?>
								<div id="arrayCarrito" data-arrayCarrito='<?php echo json_encode($aCarritoProducto); ?>'></div>
								<!-- <?php print_r($aCarritoProducto); ?> line comentada para mirar informacion del carrito -->
								@foreach ($aCarritoProducto as $itemCarrito)
								<tr class="table_row">
									<td class="column-1">
										<div class="how-itemcart1">
											<img src="/archivos/imagenes_producto/{{$itemCarrito->imagen}}" alt="IMG">
										</div>
									</td>
									<td class="column-2">{{$itemCarrito->nombre}}</td>
									<td class="column-3">$ {{$itemCarrito->precio_unitario}}</td>
									<td class="column-4">
										<div class="wrap-num-product flex-w m-l-auto m-r-0">
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product1" value="{{$itemCarrito->cantidad}}">

											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>
									</td>

									<td class="column-5">$ {{$itemCarrito->total}}</td>
								</tr>
								<?php
								$total_factura  = $itemCarrito->total + $total_factura;
								?>
								@endforeach
							</table>
						</div>

						<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
							<div class="flex-w flex-m m-r-20 m-tb-5">
								<input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" name="coupon" placeholder="Coupon Code">

								<div class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
									Apply coupon
								</div>
							</div>

							<div class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
								Update Cart
							</div>
						</div>
					</div>
				</div>

				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Total compra
						</h4>

						<div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
									Subtotal:
								</span>
							</div>

							<div class="size-209">
								<span id="totalFactura" data-total="<?php echo $total_factura; ?>" class="mtext-110 cl2">
									$ <?php echo $total_factura; ?>
								</span>
							</div>
						</div>

						<div class="flex-w flex-t bor12 p-t-15 p-b-30">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Forma de pago:
								</span>
							</div>

							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
								<p class="stext-111 cl6 p-t-2">
								<div id="paypal-button-container"></div>
								<p id="result-message"></p>
								</p>

								<div class="p-t-15">
									<span class="stext-112 cl8">
										Seleccione metodo de pago
									</span>

									<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
										<select class="js-select2" name="time">
											<option>Metodos de pago</option>
											<option>Nequi</option>
											<option>Efectivo</option>
											<option>PayPal</option>
											<option>PSE</option>
										</select>
										<div class="dropDownSelect2"></div>
									</div>

									<div class="bor8 bg0 m-b-12">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="state" placeholder="State /  country">
									</div>

									<div class="bor8 bg0 m-b-22">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="postcode" placeholder="Postcode / Zip">
									</div>

									<div class="flex-w">
										<div class="flex-c-m stext-101 cl2 size-115 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer">
											Update Totals
										</div>
									</div>

								</div>
							</div>
						</div>

						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2">
									Total:
								</span>
							</div>

							<div class="size-209 p-t-1">
								<span class="mtext-110 cl2">
									$ {{$total_factura}}
								</span>
							</div>
						</div>

						<button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
							CONFIRMAR PAGO
						</button>
					</div>
				</div>
			</div>
		</div>
	</form>
	<script src="https://www.paypal.com/sdk/js?client-id=AfEgTTiS59c_cJSBmCLxE2jfuqIE0ZXerJlRFX54rN_B-oFoGbS4TzNHgA5zGVEfXCQaMYKmuFOno08o&currency=USD"></script>
	<script src="/js/Capp.js"></script>
	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script>
		document.addEventListener('DOMContentLoaded', function() {
			document.addEventListener('datosPaypalRecibidos', function(event) {
				const orderData = event.detail;
				procesarDatos(orderData);
			});
		});

		function procesarDatos(orderData) {
			var arrayCarrito  = JSON.parse(document.getElementById('arrayCarrito').getAttribute('data-arrayCarrito'));
			//var datos = {
				//orderData: orderData,
				//carrito: arrayCarrito,
			//}
			$.ajax({
				type: "GET",
				url: "{{asset('/factura/capture')}}",
				dataType: "json",
				data: {
					orderData: orderData,
					carrito: arrayCarrito,
				},
				
				success: function(response) {
					//console.log(response.data.orderData.payer.name.given_name);
					alert(response.Message);
					//console.log(response.Message);
					//window.location.href = "{{asset('/quienes-somos/index')}}"
				},
				error: function(error) {
					console.error(error);
				}
			});
		}
	</script>
</body>
@endsection