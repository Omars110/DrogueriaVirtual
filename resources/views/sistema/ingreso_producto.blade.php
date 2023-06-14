@extends('plantilla')

@section('titulo',$titulo)

@section('contenido')
<section class="container">   
      <!-- ======= Section mesenger ======= -->  
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
      <!-- ======= Section mesenger ======= --> 
      <form action="" method="POST" class="mt-0">
         <div class="row">
               <div>
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
               </div>
               <div>
               <!-- ======= Cacturar id para poder actualizar y registar ======= -->
                  <input type="hidden" name="txtIdmedicamento" value="{{!$aProducto? '' : $aProducto[0]->idmedicamento}}">
               <!-- ======= Cacturar id para poder actualizar y registar ======= -->
               </div>
               <div class="form-group col-lg-6">
                  <label for="">Nombre:*</label>
                  <input type="text" name="txtNombre" id="txtNombre" value="{{!$aProducto? '' : $aProducto[0]->nombre}}" class="form-control" style="border-radius: 35px" required>
               </div>
               <div class="form-group col-lg-6">
                  <label for="">Codigo de barra:*</label>
                  <input type="text" name="txtCodigoBarra" id="txtCodigoBarra" value="{{!$aProducto? '' : $aProducto[0]->codigo_barra}}" class="form-control" style="border-radius: 35px" required>
               </div>
               <div class="form-group col-lg-6">
                  <label for="">Cantidad interna:*</label>
                  <input type="text" name="txtCantidadInterna" id="txtCantidadInterna" value="{{!$aProducto? '' : $aProducto[0]->cantidad_interna}}" class="form-control" style="border-radius: 35px" required>
               </div>
               <div class="form-group col-lg-6">
                  <label for="">Cantidad externa:*</label>
                  <input type="text" name="txtCantidadExterna" id="txtCantidadExterna" value="{{!$aProducto? '' : $aProducto[0]->cantidad_externa}}" class="form-control" style="border-radius: 35px" required>
               </div>
               <div class="form-group col-lg-6">
                  <label for="">fecha de ingreso:*</label>
                  <input type="date" name="txtFechaDeIngreso" id="txtFechaDeIngreso" value="{{!$aProducto? '' : $aProducto[0]->fecha_ingreso}}" class="form-control" style="border-radius: 35px" required>
               </div>
               <div class="form-group col-lg-6">
                  <label for="">Precio:*</label>
                  <input type="number" name="numPrecio" id="numPrecio" value="{{!$aProducto? '' : $aProducto[0]->precio}}" class="form-control" style="border-radius: 35px" required>
               </div>
               <div class="form-group col-lg-6">
                  <label for="">Fecha de vencimiento:*</label>
                  <input type="date" name="txtFechaDeVenciemiento" id="txtFechaDeVenciemiento" value="{{!$aProducto? '' : $aProducto[0]->fecha_vencimiento}}" class="form-control" style="border-radius: 35px" required>
               </div>
               <div class="form-group col-lg-6">
                  <label for="">Numero lote:*</label>
                  <input type="text" name="txtLote" id="txtLote" value="{{!$aProducto? '' : $aProducto[0]->lote}}" class="form-control" style="border-radius: 35px" required>
               </div>
               <!-- ======= Section sesion ======= -->
               <div class="form-group col-lg-6">
                  <label for="">Seccion:*</label>
                  <select name="lstSeccion" id="lstSeccion" class="form-control" style="border-radius: 35px" required>
                     <option value="" select>-Seleccionar-</option>
                        @if ($aProducto)
                           <option value="{{$aProducto[0]->fk_idseccion}}" selected>{{$aProducto[0]->fk_idseccion}}</option>
                           @foreach ($aSeccion as $seccion)
                              <option value={{$seccion->idseccion}}>{{$seccion->columna}} / {{$seccion->fila}}</option>
                           @endforeach
                        @else
                           @foreach ($aSeccion as $seccion)
                              <option value={{$seccion->idseccion}}>{{$seccion->columna}} / {{$seccion->fila}}</option>
                           @endforeach
                        @endif
                  </select>
               </div>
               <!-- ======= Section sesion ======= --> 
<!-- ====================================================================================================================================== -->             
               <!-- ======= Section proveedor ======= -->
               <div class="form-group col-lg-6">
                  <label for="">Proveedor:*</label>
                  <select name="lstProveedor" id="lstProveedor" class="form-control" style="border-radius: 35px" required>
                     <option value="" selected>-Seleccionar-</option>
                     @if($aProducto)
                        <option value="{{$aProducto[0]->fk_idproveedor}}" selected>{{$aProducto[0]->fk_idproveedor}}</option>
                        @foreach ($aProveedor as $proveedores)
                           <option value={{$proveedores->idproveedor}}>{{$proveedores->nombre}}</option>
                        @endforeach 
                     @else
                        @foreach ($aProveedor as $proveedores)
                           <option value={{$proveedores->idproveedor}}>{{$proveedores->nombre}}</option>
                        @endforeach         
                     @endif
                  </select>
               </div>
               <!-- ======= Section proveedor ======= -->
<!-- ====================================================================================================================================== -->
               <!-- ======= Section laboratorios ======= -->
               <div class="form-group col-lg-6">
                  <label for="">laboratorio:*</label>
                  <select name="lstlaboratorio" id="lstlaboratorio" class="form-control" style="border-radius: 35px" required>
                     <option value="" selected>-Seleccionar-</option>
                     @if($aProducto)
                        <option value="{{$aProducto[0]->fk_idlaboratorio}}" selected>{{$aProducto[0]->fk_idlaboratorio}}</option>
                        @foreach ($aLaboratorio as $laboratorio)
                           <option value="{{$laboratorio->idlaboratorio}}">{{$laboratorio->nombre_farmaceutica}}</option>
                        @endforeach 
                     @else
                        @foreach ($aLaboratorio as $laboratorio)
                           <option value="{{$laboratorio->idlaboratorio}}">{{$laboratorio->nombre_farmaceutica}}</option>
                        @endforeach 
                     @endif
                  </select>
               </div>
               <!-- ======= Section laboratorios ======= -->
<!-- ====================================================================================================================================== -->               
               <!-- ======= Section tipo medicamentos ======= -->
               <div class="form-group col-lg-6">
                  <label for="">Tipo de medicamento:*</label>
                  <select name="lstTipoMed" id="lstTipoMed" class="form-control" style="border-radius: 35px" required>
                     <option value="" selected>-Seleccionar-</option>
                     @if($aProducto)
                        <option value="{{$aProducto[0]->fk_idtipo_medicamento}}" selected>{{$aProducto[0]->fk_idtipo_medicamento}}</option>
                        @foreach ($aTmedicamento as $tipo)
                           <option value="{{$tipo->idtipoMedicamento}}">{{$tipo->clasificacion}}</option>
                        @endforeach
                     @else
                        @foreach ($aTmedicamento as $tipo)
                           <option value="{{$tipo->idtipoMedicamento}}">{{$tipo->clasificacion}}</option>
                        @endforeach
                     @endif
                  </select>
               </div>
               <!-- ======= Section tipo medicamentos ======= -->               
               <div class="form-group col-lg-6">
                  <button type="submit" name="btnEnviar" id="" value="" class="btn btn-primary mt-3" style="border-radius: 35px">Guardar</button>
                  <a href="/producto/index" class="btn btn-danger mt-3" style="border-radius: 35px">Regresar</a>
               </div>
            </div>
      </form>  
   </section>
@endsection