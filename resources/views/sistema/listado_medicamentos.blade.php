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
                  <th>Codigo de barra</th>
                  <th>C-interna</th>
                  <th>C-externa</th>
                  <th>F-ingreso</th>
                  <th>Precio</th>
                  <th>F-vencimiento</th>
                  <th>Seccion</th>
                  <th>Proveedor</th>
                  <th>Laboratorio</th>
                  <th>Tipo-M</th>
                  </tr>
            </thead>
         <tbody>
               @foreach ($aMedicamentos as $medicamento)
                  <tr>
                     <td>{{ $medicamento->nombre }}</td>
                     <td>{{ $medicamento->codigo_barra }}</td>
                     <td>{{ $medicamento->cantidad_interna }}</td>
                     <td>{{ $medicamento->cantidad_externa }}</td>
                     <td>{{ $medicamento->fecha_ingreso}}</td>
                     <td>{{ $medicamento->precio }}</td>
                     <td>{{ $medicamento->fecha_vencimiento }}</td>
                     <td>{{ $medicamento->lote }}</td>
                     <td>{{ $medicamento->fk_idseccion }}</td>
                     <td>{{ $medicamento->fk_idproveedor }}</td>
                     <td>{{ $medicamento->fk_idlaboratorio }}</td>
                     <td>{{ $medicamento->fk_idtipo_medicamento }}</td>
                  </tr>
               @endforeach
         </tbody>
         </table>
      </div>
   </div>
</div>
@endsection