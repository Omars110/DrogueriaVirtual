@extends('plantilla_web')
@section('titulo', $titulo)

@section('contenido')

<body class="animsition">
	<!-- Content page -->
	<section class="bg0 p-t-104 p-b-116">
		<div class="container">
			<div class="flex-w flex-tr">
				<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
					<!-- Formulario de registro -->
					<form method="POST" action="">
						<h4 class="mtext-105 cl2 txt-center p-b-30">
							Inicia sesion con tu usuario y contraseña
						</h4>
						<!-- ======= Section token ======= -->
						<div>
							<input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
						</div>
						<!-- ======= Section token ======= -->
						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="usuario" id="usuario" placeholder="Usuario" required>
							<img class="how-pos4 pointer-none" src="/archivos/icons/icon-email.png" alt="ICON">
						</div>

						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="password" name="contraseña" id="contraseña" placeholder="Contraseña" required>
							<img class="how-pos4 pointer-none" src="/archivos/icons/icon-email.png" alt="ICON">
						</div>

						<button type="submit" onclick="funtion(dato)" data-dato="0" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
							Entrar
						</button>
					</form>
				</div>

				<div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
					<div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-map-marker"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Direccion
							</span>

							<p class="stext-115 cl6 size-213 p-t-18">
								Calle 20 de Julio Tv 44-54B | Arjona bolivar
							</p>
						</div>
					</div>

					<div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-phone-handset"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Telefono
							</span>

							<p class="stext-115 cl1 size-213 p-t-18">
								3015086597
							</p>
						</div>
					</div>

					<div class="flex-w w-full">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-envelope"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Correo Electronico
							</span>

							<p class="stext-115 cl1 size-213 p-t-18">
								drogueriaencasa@gmail.com
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Map 
	<div class="map">
		<div class="size-303" id="google_map" data-map-x="40.691446" data-map-y="-73.886787" data-pin="/archivos/icons/pin.png" data-scrollwhell="0" data-draggable="1" data-zoom="11"></div>
	</div>-->
</body>

</html>
@endsection