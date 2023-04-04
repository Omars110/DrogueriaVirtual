@extends('plantilla')
@section('titulo', $titulo)

@section('contenido')
<section class="container">
    <div class="form-group col-lg-6">

         @if(isset($mensaje)==1)
            <div class="alert alert-danger" role="alert">
               No hay registro para mostrar!
            </div>
         @endif
         <a class="btn-primary btn mb-2" href="/seccion/nuevo">Nueva seccion</a>
         <table class="table table-hover">
            <thead class="border">
               <tr>
                  <th>COLUMNA</th>
                  <th>FILA</th>
                  <th>EDITAR</th>
                  </tr>
               </thead>
                  
               <tbody class="border">
                  @foreach ($aSeccion  as $seccion)
                      <tr class="border">
                        <td>{{$seccion->columna}}</td>
                        <td>{{$seccion->fila}}</td>
                        <td><a href="/seccion/{{$seccion->idseccion}}">{{'Editar'}}</a></td>
                      </tr>
                  @endforeach
               </tbody>
            </table>
      </div>
</section>
@endsection