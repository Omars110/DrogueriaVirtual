@extends('plantilla')
@section('titulo', $titulo)

@section('contenido')
<section class="container">
   <form action="" method="POST">
      <div class="row">
         <div class="form-group col-lg-6">

            <div>
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div>

            <div class="mt-3">
               <input type="text" name="txtColumna" id="txtColumna" style="border-radius: 35px" class="form-control" placeholder="Columna" required>
            </div>
            <div class="mt-3">
               <input type="text" name="txtFila" id="txtFila" class="form-control" style="border-radius: 35px" placeholder="Fila">
            </div>
            <div>
               <button type="submit" class="mt-2 btn btn-primary">Enviar</button>
            </div>
 
         </div>

         <div class="form-group col-lg-6">
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
                      </tr>
                  @endforeach
               </tbody>
            </table>
         </div>

      </div>
   </form>
</section>
@endsection