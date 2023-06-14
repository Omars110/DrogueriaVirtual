@extends('plantilla')

@section('titulo',$titulo)

@section('contenido')
 <!-- ======= Section mesenger ======= -->  
 <div class="col-3 text-center" id="mensaje">
   
 </div>
<!-- ======= Section mesenger ======= -->  
<div class="container">
   <div class="row">
      <div class="col-3">
         <a class="btn-primary btn mb-2 ml-1" href="/producto/nuevo" style="border-radius: 20px"><i class="fa-solid fa-plus fa-beat" style="color: #ffffff;"></i>  Nuevo medicamento</a>
      </div>
      <div class="col-5">
         <div class="d-flex">
            <input type="text" class="form-control" id="keyUpBuscar"   value="" placeholder="Buscar medicamentos" style="border-radius: 20px">
            <a class="btn-primary btn mb-2 ml-2" id="botonBuscar" href="" style="border-radius: 20px">Buscar <i class="fa-solid fa-magnifying-glass fa-beat" style="color: #ffffff;"></i></a>
         </div>
      </div>
   </div>
</div>
<div>
   <div class="row">
      <div class="col-12">
         <table class="table border table-hover text-center table-bordered border-primary">
            <thead class="table-secondary">
               <tr>
                  <th>NOMBRE</th>
                  <th>C/BARRA</th>
                  <th>C-INTERNA</th>
                  <th>C-EXTERNA</th>
                  <th>F-INGRESO</th>   
                  <th>F-VENCIMIENTO</th>
                  <th>PRECIO</th>
                  <th>LOTE</th>
                  <th>SECCION</th>
                  <th>PROVEEDOR</th>
                  <th>LABORATORIO</th>
                  <th>TIPO-M</th>
                  <th>ACCIONES</th>
                  </tr>
            </thead>
            <tbody id="medicamentos" class="table-info">
              
            </tbody>
         </table>
      </div>
   </div>
</div>

<script>
$(document).ready(function (){
   const valid = 'omarsoto12'
   var datoMedicamento
   $('#botonBuscar').click(function (e){ 
      e.preventDefault();
      var dato = $('#keyUpBuscar').val();
      $.ajax({
         type: "GET",
         url: "{{asset('/producto/filtrar')}}",
         data: {dato:dato,
                valid:valid},
         dataType: "json",
         success: function (response){
            
            if (response[0] == 'noDato'){
               $('#medicamentos').html('');
               $('#mensaje').html(`<div class="alert alert-danger" role="alert" id="alerta">
                                       No hay resultado para mostrar!
                                    </div>`);
            } else{
               $('#alerta').hide();
               $('#medicamentos').html('');
               response.forEach(element => {
                  datoMedicamento = `<tr>
                                       <td>${element['nombre']}</td>
                                       <td>${element['codigo_barra']}</td>
                                       <td>${element['cantidad_interna']}</td>
                                       <td>${element['cantidad_externa']}</td>
                                       <td>${element['fecha_ingreso']}</td>
                                       <td>${element['fecha_vencimiento']}</td>
                                       <td>${element['precio']}</td>
                                       <td>${element['lote']}</td>
                                       <td>${element['fk_idseccion']}</td>
                                       <td>${element['fk_idproveedor']}</td>
                                       <td>${element['fk_idtipo_medicamento']}</td>
                                       <td>${element['fk_idlaboratorio']}</td>
                                       <td>
                                          <a href="/producto/editar/${element['idmedicamento']}"><i class="fa-solid fa-pen-to-square" style="color: #1ed006;"></i></a>
                                          <a href="/producto/eliminar/${element['idmedicamento']}"><i class="fa-solid fa-trash" style="color: #ff0000;"></i></a>
                                       </td>
                                    </tr>`;
                  $('#medicamentos').append(datoMedicamento);
               }); 
            }       
         }
      });
   }); 
});
//onclick="funcion(event)"
function funcion(e){
      e.preventDefault(); // Evitar el comportamiento por defecto del enlace
      e.stopPropagation(); // Evitar la propagación del evento a los elementos hijos
      console.log(e.currentTarget.href) // Usar e.currentTarget en lugar de e.target
      setTimeout(function() {
         $('#mensaje').html(`<div class="alert alert-success" role="alert" id="alerta2">
                              Producto eliminado correctamente!
                              </div>`);
         // Redirigir a otra página después de mostrar el mensaje
         window.location.href = e.currentTarget.href; // Usar e.currentTarget en lugar de e.target
      }, 3000); // Cambiar el tiempo a 1000 si quieres que dure 1 segundo
      console.log(e.currentTarget.href) // Usar e.currentTarget en lugar de e.target
   }

</script>
@endsection