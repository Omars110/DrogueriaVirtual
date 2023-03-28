@extends('plantilla')

@section('titulo',$titulo)

@section('contenido')
<div class="container">
   <div class="row">
      <div class="col-12">
         <table class="table border table-hover text-center">
            <thead>
               <tr>
                  <th>Nombre</th>
                  <th>Fabricante</th>
                  <th>Miligramos</th>
                  <th>Cantidad</th>
                  <th>Precio unitario</th>
                  <th>Precio por caja</th>
                  <th>Codigo</th>
                  <th>Seccion</th>
                  </tr>
            </thead>
         <tbody>
               @foreach ($aMedicamentos as $item)
                  <tr>
                     <td>{{ $item->nombre_P }}</td>
                     <td>{{ $item->fabricante_P }}</td>
                     <td>{{ $item->miligramos }}</td>
                     <td>{{ $item->cantidad_P }}</td>
                     <td>{{ $item->precio_unitario}}</td>
                     <td>{{ $item->precio_caja }}</td>
                     <td>{{ $item->codigo_P }}</td>
                     <td>{{ $item->seccion }}</td>
                  </tr>
               @endforeach
         </tbody>
         </table>
      </div>
   </div>
</div>
@endsection