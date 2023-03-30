<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('titulo')</title>
<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('css/bootstrap-select.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{ asset('css/normalize.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('css/bootstrap-select.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('css/fontawesome/css/all.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('css/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('css/sb-admin.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('css/estilos.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('css/fontawesome/css/fontawesome.min.css') }}" rel="stylesheet" type="text/css">
<script src="{{ asset('js/jquery.min.js') }}"></script> 
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script> 
<script src="{{ asset('js/jquery.easing.min.js') }}"></script> 
<script src="{{ asset('js/Chart.min.js') }}"></script> 
<script src="{{ asset('js/jquery.dataTables.js') }}"></script> 
<script src="{{ asset('js/dataTables.bootstrap4.js') }}"></script> 
<script src="{{ asset('js/sb-admin.min.js') }}"></script> 
<script src="{{ asset('js/jquery.validate.js') }}"></script> 
<script src="{{ asset('js/localization/messages_es.js') }}"></script> 
<script src="{{ asset('js/funciones_generales.js') }}"></script> 
<script src="{{ asset('js/bootstrap-select.js') }}"></script>
</head>

<body>
<section>
  <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid"> <a class="navbar-brand" href="/">Drogueria Virtual</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
      
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item"> <a class="nav-link active" aria-current="page" href="/nuevo">Ingresar medicamento</a> </li>
          <li class="nav-item"> <a class="nav-link active" aria-current="page" href="/seccion">Seccion</a> </li>
          <li class="nav-item"> <a class="nav-link" href="/medicamentos">Medicamentos</a> </li>

          <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="true">Mas</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Seccion</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Proveedor</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Laboratorio</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Tipo medicamento</a></li>
            </ul>
          </li>
        </ul>

        <div class="m-auto">
          <h3>Administracion</h3>
        </div>
        <form class="d-flex" role="search" method="GET" action="">
          <input class="form-control me-2" type="search" placeholder="Medicamento" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Buscar</button>
        </form>
      </div>

    </div>
  </nav>
</section>
   <div class="container mt-3">
      <h2>@yield('titulo')</h2>
   </div>
   <div>
      @yield('contenido')
   </div>
</body>
</html>