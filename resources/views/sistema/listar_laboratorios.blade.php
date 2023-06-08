@extends('plantilla')
@section('titulo', $titulo)
@section('contenido')
   <section class="container">
      <div>
         <a href="/laboratorio/nuevo" class="btn btn-primary mb-2" style="border-radius: 35px"><i class="fa-solid fa-plus fa-beat" style="color: #ffffff;"></i>  Nuevo laboratorio</a>
         <!-- ======= Section mesenger ======= -->  
         @if (isset($mensaje)==1)
            <div class="alert alert-danger" role="alert">
               No hay registro para mostrar!
            </div>               
         @endif
         <!-- ======= Section mesenger ======= -->  
         <table class="table table-hover border">
            <thead>
               <tr>
                  <th>LABORATORIO</th>
                  <th>TELEFONO</th>
                  <th>DIRECCION</th>
                  <th>NIT</th>
                  <th>SUCURSAL</th>
                  <th>ACCIONES</th>
               </tr>
            </thead>
            <tbody>
               @foreach ($aLaboratorios as $laboratorio)
                  <tr>
                     <td>{{$laboratorio->nombre_farmaceutica}}</td>
                     <td>{{$laboratorio->telefono}}</td>
                     <td>{{$laboratorio->direccion}}</td>
                     <td>{{$laboratorio->nit}}</td>
                     <td>{{$laboratorio->sucursal}}</td>
                     <td class="text-center">
                        <a href="/laboratorio/editar/{{$laboratorio->idlaboratorio}}"><i class="fa-solid fa-pen-to-square" style="color: #1ed006;"></i></a>
                        <a href="/laboratorio/eliminar/{{$laboratorio->idlaboratorio}}"><i class="fa-solid fa-trash" style="color: #ff0000;"></i></a>
                     </td>
                  </tr>
               @endforeach 
            </tbody>
         </table>
      </div>
   </section>
@endsection