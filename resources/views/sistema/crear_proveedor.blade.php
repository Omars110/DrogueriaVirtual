@extends('plantilla')
@section('titulo', $titulo)

@section('contenido')
<section class="container">
    <form action="" method="POST">
        <div class="row">
         <div class="col-12">
            @if (isset($mensaje)==1)
                  <div class="alert alert-success" role="alert">
                     Proveedor fue guardado con Exito!
                  </div>
               @elseif (isset($mensaje)==2)
                  <div class="alert alert-danger" role="alert">
                     Erros al guardar proveedor porfavor verifique!
                  </div>
               @endif
         </div>
            <!-- ======= Section token ======= -->   
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <!-- ======= Section token ======= -->

            <!-- ======= Cacturar id para poder actualizar y registar ======= -->
            <input type="hidden" name="txtIdProveedor" value="{{!$aProveedor? '' : $aProveedor[0]->idproveedor;}}">
            <!-- ======= Cacturar id para poder actualizar y registar ======= -->

            <div class="form-gruop col-md-6 mt-3">
               <input type="text" name="txtNombre" id="txtNombre" value="{{!$aProveedor? '' : $aProveedor[0]->nombre; }}" style="border-radius: 35px" class="form-control " placeholder="Nombre proveedor*" required>
            </div>

            <div class="form-gruop col-md-6 mt-3">
               <input type="text" name="txtTelefono" id="txtTelefono" value="{{!$aProveedor? '' : $aProveedor[0]->telefono; }}" class="form-control" style="border-radius: 35px" placeholder="Telefono*" required>
            </div>

            <div class="form-gruop col-md-6 mt-3">
               <input type="text" name="txtDireccion" id="txtDireccion" value="{{!$aProveedor? '' : $aProveedor[0]->direccion; }}" class="form-control" style="border-radius: 35px" placeholder="direccion*" required>
            </div>

            <div class="form-gruop col-md-6 mt-3">
               <input type="text" name="txtSucursalProveedor" id="txtFila" value="{{!$aProveedor? '' : $aProveedor[0]->fk_idsucursalProveedor; }}" class="form-control" style="border-radius: 35px" placeholder="Sucursal*" required>
            </div>

            <div class="form-gruop col-md-6">
               <button type="submit" class="mt-2 btn btn-primary">Guardar</button>
               <a class="btn-danger btn mt-2" href="/proveedor/index">Regresar</a>                  
            </div>
            
        </div>
    </form>    
</section>    
@endsection