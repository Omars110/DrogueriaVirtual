@extends('plantilla')
@section('titulo', $titulo)

@section('contenido')
<section class="container">
   <form action="" method="POST">
         <div class="row">
            <div class="form-group col-lg-6">
               @if (isset($mensaje)==1)
                  <div class="alert alert-success" role="alert">
                     Su nueva seccion fue gurdada con Exito!
                  </div>
               @elseif (isset($mensaje)==2)
                  <div class="alert alert-danger" role="alert">
                     Erros al guardar seccion porfavor verifique!
                  </div>
               @endif
               <div>
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
               </div>

               <div>
                  <input type="hidden" name="txtId" value="{{!$aSeccion? '' : $aSeccion[0]->idseccion;}}">
               </div>
               <div class="mt-3">
                  <input type="text" name="txtColumna" id="txtColumna" value="{{!$aSeccion? '' : $aSeccion[0]->columna;}}" style="border-radius: 35px" class="form-control " placeholder="Columna" required>
               </div>
               <div class="mt-3">
                  <input type="text" name="txtFila" id="txtFila" value="{{!$aSeccion? '': $aSeccion[0]->fila;}}" class="form-control" style="border-radius: 35px" placeholder="Fila" required>
               </div>
               <div>
                  <button type="submit" class="mt-2 btn btn-primary">Guardar</button>
                  <button type="button" class="mt-2 btn btn-danger"><a href="/seccion">Regresar</a></button>
               </div>
         </div> 
   </form>   
</section>
@endsection