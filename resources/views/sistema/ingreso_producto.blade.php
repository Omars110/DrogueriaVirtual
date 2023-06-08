@extends('plantilla')

@section('titulo',$titulo)

@section('contenido')
<section class="container">   
      <form action="" method="POST" class="mt-0">
         <div class="row">
               <div>
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
               </div>
               <div>
               <!-- ======= Cacturar id para poder actualizar y registar ======= -->
                  <input type="hidden" name="txtIdmedicamento" value="">
               <!-- ======= Cacturar id para poder actualizar y registar ======= -->
               </div>
               <div class="form-group col-lg-6">
                  <label for="">Nombre:*</label>
                  <input type="text" name="txtNombre" id="txtNombre" value="" class="form-control" style="border-radius: 35px" required>
               </div>
               <div class="form-group col-lg-6">
                  <label for="">Codigo de barra:*</label>
                  <input type="text" name="txtCodigoBarra" id="txtCodigoBarra" value="" class="form-control" style="border-radius: 35px" required>
               </div>
               <div class="form-group col-lg-6">
                  <label for="">Cantidad interna:*</label>
                  <input type="text" name="txtCantidadInterna" id="txtCantidadInterna" value="" class="form-control" style="border-radius: 35px" required>
               </div>
               <div class="form-group col-lg-6">
                  <label for="">Cantidad externa:*</label>
                  <input type="text" name="txtCantidadExterna" id="txtCantidadExterna" value="" class="form-control" style="border-radius: 35px" required>
               </div>
               <div class="form-group col-lg-6">
                  <label for="">fecha de ingreso:*</label>
                  <input type="date" name="txtFechaDeIngreso" id="txtFechaDeIngreso" value="" class="form-control" style="border-radius: 35px" required>
               </div>
               <div class="form-group col-lg-6">
                  <label for="">Precio:*</label>
                  <input type="number" name="numPrecio" id="numPrecio" value="" class="form-control" style="border-radius: 35px" required>
               </div>
               <div class="form-group col-lg-6">
                  <label for="">Fecha de vencimiento:*</label>
                  <input type="date" name="txtFechaDeVenciemiento" id="txtFechaDeVenciemiento" value="" class="form-control" style="border-radius: 35px" required>
               </div>
               <div class="form-group col-lg-6">
                  <label for="">Numero lote:*</label>
                  <input type="text" name="txtLote" id="txtLote" value="" class="form-control" style="border-radius: 35px" required>
               </div>
               <!-- ======= Section sesion ======= -->
               <div class="form-group col-lg-6">
                  <label for="">Seccion:*</label>
                  <select name="lstSeccion" id="lstSeccion" class="form-control" style="border-radius: 35px" required>
                     <option value="" selected>-Seleccionar-</option>
                     @foreach ($aSeccion as $seccion)
                        <option value={{$seccion->idseccion}}>{{$seccion->columna}} / {{$seccion->fila}}</option>
                     @endforeach
                  </select>
               </div>
               <!-- ======= Section sesion ======= --> 
               <!-- ======= Section proveedor ======= -->
               <div class="form-group col-lg-6">
                  <label for="">Proveedor:*</label>
                  <select name="lstProveedor" id="lstProveedor" class="form-control" style="border-radius: 35px" required>
                     <option value="" selected>-Seleccionar-</option>
                     @foreach ($aProveedor as $proveedores)
                        <option value={{$proveedores->idproveedor}}>{{$proveedores->nombre}}</option>
                     @endforeach  
                  </select>
               </div>
               <!-- ======= Section proveedor ======= -->
               <!-- ======= Section laboratorios ======= -->
               <div class="form-group col-lg-6">
                  <label for="">laboratorio:*</label>
                  <select name="lstlaboratorio" id="lstlaboratorio" class="form-control" style="border-radius: 35px" required>
                     <option value="" selected>-Seleccionar-</option>
                     @foreach ($aLaboratorio as $laboratorio)
                     <option value="{{$laboratorio->idlaboratorio}}">{{$laboratorio->nombre_farmaceutica}}</option>
                     @endforeach
                  </select>
               </div>
               <!-- ======= Section laboratorios ======= -->
               <!-- ======= Section tipo medicamentos ======= -->
               <div class="form-group col-lg-6">
                  <label for="">Tipo de medicamento:*</label>
                  <select name="lstTipoMed" id="lstTipoMed" class="form-control" style="border-radius: 35px" required>
                     <option value="" selected>-Seleccionar-</option>
                     @foreach ($aTmedicamento as $tipo)
                     <option value="{{$tipo->idtipoMedicamento}}">{{$tipo->clasificacion}}</option>
                     @endforeach
                  </select>
               </div>
               <!-- ======= Section tipo medicamentos ======= -->               
               <div class="form-group col-lg-6">
                  <button type="submit" name="btnEnviar" id="" value="" class="btn btn-primary mt-3" style="border-radius: 35px">Guardar</button>
                  <a href="" class="btn btn-danger mt-3" style="border-radius: 35px">Regresar</a>
               </div>
            </div>
      </form>  
   </section>
@endsection