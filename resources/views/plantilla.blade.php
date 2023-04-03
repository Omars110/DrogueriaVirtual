<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('titulo')</title>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>

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
<script src="{{ asset('js/popper.min.js') }}"></script>

</head>

<body>
<section>
  <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid"><a class="navbar-brand" href="/">Drogueria Virtual</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
      
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

          <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" href="">Medicamentos</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/medicamentos">Lista Medicamentos</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="/nuevo">Nuevo Medicamento</a></li>
            </ul>
          </li>   

          <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="true" href="">Seccion</a> 
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/seccion">Listar Seccion</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="/seccion/nuevo">Nueva Seccion</a></li>
            </ul>
          </li>

          <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="true" href="">Proveedor</a> 
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Listar Proveedores</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Nuevo Proveedor</a></li>
            </ul>
          </li>

          <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="true" href="">laboratorio</a> 
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Listar Laboratorios</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Nuevo Laboratorio</a></li>
            </ul>
          </li>

          <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="true" href="">Tipo medicamento</a> 
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Listar tipos</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">nuevo Tipo</a></li>
            </ul>
          </li>
        </ul>
        
        <div class="m-auto">
          <h3>Administracion</h3>
        </div>
        <form class="d-flex" role="search" method="POST">
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