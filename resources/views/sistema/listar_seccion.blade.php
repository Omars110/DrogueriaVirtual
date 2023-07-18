@extends('plantilla')
@section('titulo', $titulo)

@section('contenido')
<section class="container">
   <!-- ======= Section mesenger ======= -->   
         @if(isset($mensaje)==1)
            <div class="alert alert-danger" role="alert">
               No hay registro para mostrar!
            </div>
         @endif
   <!-- ======= Section mesenger ======= --> 
      <div class="form-group col-lg-6">
         <a class="btn-primary btn mb-2" href="/seccion/nuevo" style="border-radius: 35px"><i class="fa-solid fa-plus fa-beat" style="color: #ffffff;"></i>  Nueva seccion</a>
         <table class="table border table-hover text-center table-bordered border-primary">
            <thead class="table-secondary">
               <tr>
                  <th class="text-center">COLUMNA</th>
                  <th class="text-center">FILA</th>
                  <th class="text-center">EDITAR/ELIMINAR</th>
                  </tr>
               </thead>
                  
               <tbody class="table-info">
                  @foreach ($aSeccion  as $seccion)
                      <tr class="border">
                        <td class="text-center">{{$seccion->columna}}</td>
                        <td class="text-center">{{$seccion->fila}}</td>
                        <td class="text-center">
                           <a href="/seccion/{{$seccion->idseccion}}" class="px-3 py-0 mx-0 border"><i class="fa-solid fa-pen-to-square" style="color: #1ed006;"></i></a>
                           <a href="/seccion/eliminar/{{$seccion->idseccion}}" class="px-3 py-0 mx-0 border"><i class="fa-solid fa-trash" style="color: #ff0000;"></i></a>
                        </td>
                       <!--<td><a href="/seccion/eliminar/{{$seccion->idseccion}}">{{'Eliminar'}}</a></td>--> 
                      </tr>
                  @endforeach
               </tbody>
            </table>
      </div>
</section>
@endsection