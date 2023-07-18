@extends('plantilla')
@section('titulo', $titulo)

@section('contenido')
<section class="container">
      <!-- ======= Section mesenger ======= -->   
        
      <!-- ======= Section mesenger ======= --> 
      <div class="form-group col-lg-6">
         <a class="btn-primary btn mb-2" href="/Tipo_medicamento/nuevo" style="border-radius: 35px"><i class="fa-solid fa-plus fa-beat" style="color: #ffffff;"></i>  Nuevo tipo</a>
         <table class="table border table-hover text-center table-bordered border-primary">
            <thead class="table-secondary">
               <tr>
                  <th class="text-center">ID</th>
                  <th class="text-center">CLASIFICACION</th>
                  <th class="text-center">ACCIONES</th>
               </tr>
            </thead>
                  
            <tbody class="table-info">
               @foreach ($aTmedicamento as $tipo)
                  <tr class="border">
                     <td class="text-center">{{$tipo->idtipoMedicamento}}</td>
                     <td class="text-center">{{$tipo->clasificacion}}</td>
                     <td class="text-center">
                        <a href="/Tipo_medicamento/editar/{{$tipo->idtipoMedicamento}}" class="px-3 py-0 mx-0 border"><i class="fa-solid fa-pen-to-square" style="color: #1ed006;"></i></a>
                        <a href="/Tipo_medicamento/eliminar/{{$tipo->idtipoMedicamento}}" class="px-3 py-0 mx-0 border"><i class="fa-solid fa-trash" style="color: #ff0000;"></i></a>
                     </td> 
                  </tr>
                  @endforeach
               </tbody>
         </table>
      </div>
</section>
@endsection