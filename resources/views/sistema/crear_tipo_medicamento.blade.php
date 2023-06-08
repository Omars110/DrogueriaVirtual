@extends('plantilla')
@section('titulo', $titulo)
    
@section('contenido')
<section class="container">
   <form action="" method="POST">
       <div class="row">
        <!-- ======= Section mesenger ======= -->  
         <!-- ======= Section mesenger ======= -->  

         <!-- ======= Section token ======= -->   
         <input type="hidden" name="_token" value="{{ csrf_token() }}">
         <!-- ======= Section token ======= -->

         <!-- ======= Cacturar id para poder actualizar y registar ======= -->
         <input type="hidden" name="txtIdtipoMedicamento" value="{{!$aTmedicamento? '' : $aTmedicamento[0]->idtipoMedicamento}}">
         <!-- ======= Cacturar id para poder actualizar y registar ======= -->

         <div class="form-gruop col-md-6 mt-1">
            <label for="txtTipoMedi">Tipo medicamento</label>
            <input type="text" name="txtTipoMedi" id="txtTipoMedi" value="{{!$aTmedicamento? '' : $aTmedicamento[0]->clasificacion}}" style="border-radius: 35px" class="form-control " placeholder="Tipo medicamento*" required>
         </div>
         <div class="form-gruop col-md-6">
            <button type="submit" class="mt-4 btn btn-primary" style="border-radius: 35px">Guardar</button>
            <a class="btn-danger btn mt-4" href="/Tipo_medicamento/index" style="border-radius: 35px">Regresar</a>                  
         </div>  
       </div>
   </form>    
</section> 
@endsection