@extends('plantilla')
@section('titulo', $titulo)

@section('contenido')
   <section class="container">
   <!-- ======= Section mesenger ======= -->  
      @if(isset($mensaje) == 1)
         <div class="alert alert-success" role="alert">
            Laboratorio fue guardado con ¡Exito!
         </div>
      @elseif(isset($mensaje) == 2)
         <div class="alert alert-danger" role="alert">
            Erros al guardar laboratorio porfavor ¡verifique!
         </div>
      @endif
   <!-- ======= Section mesenger ======= -->  
      <form action="" method="POST">
         <div class="row">
            <div>
            <!-- ======= Section token ======= -->  
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <!-- ======= Section token ======= -->  
            </div>
            <div>
            <!-- ======= Cacturar id para poder actualizar y registar ======= -->
               <input type="hidden" name="idlaboratorio" value="{{!$aLaboratorio? '': $aLaboratorio[0]->idlaboratorio;}}">
            <!-- ======= Cacturar id para poder actualizar y registar ======= -->
            </div>
            <div class="form-group col-lg-6">
               <label for="txtNombre">Nombre laboratorio:*</label>
               <input type="text" name="txtNombre" id="txtNombre" value="{{!$aLaboratorio? '': $aLaboratorio[0]->nombre_farmaceutica;}}" placeholder="Nombre laboratorio:*" class="form-control" style="border-radius: 35px" required>
            </div>
            <div class="form-group col-lg-6">
               <label for="txtTelefono">Telefono:*</label>
               <input type="text" name="txtTelefono" id="txtTelefono" value="{{!$aLaboratorio? '': $aLaboratorio[0]->telefono;}}" placeholder="Telefono:*" class="form-control" style="border-radius: 35px" required>
            </div>
            <div class="form-group col-lg-6">
               <label for="txtDireccion">Direccion:*</label>
               <input type="text" name="txtDireccion" id="txtDireccion" value="{{!$aLaboratorio? '': $aLaboratorio[0]->direccion;}}" placeholder="Direccion:*" class="form-control" style="border-radius: 35px" required>
            </div>
            <div class="form-group col-lg-6">
               <label for="txtNit">Nit:*</label>
               <input type="text" name="txtNit" id="txtNit" value="{{!$aLaboratorio? '': $aLaboratorio[0]->nit;}}" placeholder="NIT:*" class="form-control" style="border-radius: 35px" required>
            </div>
            <div class="form-group col-lg-9">
               <label for="txtSucursal">Sucursal:*</label>
               <input type="text" name="txtSucursal" id="txtSucursal" value="{{!$aLaboratorio? '': $aLaboratorio[0]->sucursal;}}" placeholder="Sucursal:*" class="form-control" style="border-radius: 35px" required>
            </div>
            <div class="form-group col-lg-3 mt-4">
               <div>
                  <button type="submit" class="btn btn-primary" style="border-radius: 35px">Guardar</button>
                  <a href="/laboratorio/index" class="btn btn-danger" style="border-radius: 35px">Regresar</a>
               </div>
            </div>
         </div>
      </form> 
   </section>
@endsection
    
