@extends('plantilla')
@section('titulo', $titulo)

@section('contenido')
<section class="container">
   <form action="" method="POST">
      @foreach ($aSeccion as $seccion)
      <div class="row">
         <div class="form-group col-lg-6">

            <div>
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div>

            <div class="mt-3">
               <input type="text" name="txtColumna" id="txtColumna" value="{{$seccion->columna}}" style="border-radius: 35px" class="form-control" placeholder="Columna" required>
            </div>
            <div class="mt-3">
               <input type="text" name="txtFila" id="txtFila" value="{{$seccion->fila}}" class="form-control" style="border-radius: 35px" placeholder="Fila" required>
            </div>
            <div>
               <button type="submit" class="mt-2 btn btn-primary">Enviar</button>
               <button class="mt-2 btn btn-danger"><a href="/seccion">Regresar</a></button>
            </div>
         </div>
      @endforeach
   </form>   
</section>
@endsection