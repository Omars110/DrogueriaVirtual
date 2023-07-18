<?php 
if($_GET)
{
   $idP = $_GET["idproveedor"];
   print_r($idP);
   exit;
}
?>
@extends('plantilla')
@section('titulo', $titulo)

@section('contenido')
<section class="container">
    <div class="form-group col-lg-12">
         <!-- ======= Section mesenger ======= -->   
         @if(isset($mensaje)==1)
            <div class="alert alert-danger" role="alert">
               No hay registro para mostrar!
            </div>
         @endif
         <!-- ======= Section mesenger ======= -->  

         <div class="mb-3" >
            <form action="" method="POST">
               <div class="row">
                  <div class="col-2">
                     <a class="btn-primary btn mb-2 ml-1" href="/proveedor/nuevo" style="border-radius: 20px"><i class="fa-solid fa-plus fa-beat" style="color: #ffffff;"></i>  Nuevo proveedor</a>
                  </div>  
                  <div class="col-5">
                     <div class="d-flex">
                           <input type="text" name="buscarProveedor" id="buscarProveedortxt" placeholder="Buscar" class="form-control mb-2 ml-2" style="border-radius: 20px">
                           <a class="btn-primary btn mb-2 ml-2" id="buscarProveedorbutton" href="#" style="border-radius: 100px">Buscar  <i class="fa-solid fa-magnifying-glass fa-beat" style="color: #ffffff;"></i></a>
                     </div>
                  </div>  
               </div> 
            </form>
         </div> 
         <!-- Modal -->
         <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  ...
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary" onclick="eliminar()">Save changes</button>
                </div>
              </div>
            </div>
          </div>
         <!-- Modal -->

         <table id="tablaContacto" class="table border table-hover text-center table-bordered border-primary">
            <thead class="table-secondary">
               <tr>
                  <th>PROVEEDOR</th>
                  <th>TELEFONO</th>
                  <th>DIRECCION</th>
                  <th>SUCURSAL</th>
                  <th>ACCIONES</th>
                  </tr>
               </thead>
                  
               <tbody class="table-info" id="proveedores">
                  
               </tbody>
      </div>
</section>
<script>
$(document).ready(function(){ 
   const valid = 'omarsoto12.';//NO ALVIDAR CAMBIAR ESTE COMANDO
   $('#buscarProveedortxt').keyup(function (e){ 
      let datoProveedor
      let dato = $('#buscarProveedortxt').val();
      $.ajax({
         type: "GET",
         url:"{{asset('/proveedor/filtrar')}}",
         data: {dato:dato,
                valid:valid 
               },
         dataType: "json",
         success: function (response) 
         {
            if (response === 'noDato')
            {
               $('#mensaje').html(`<div class="alert alert-success" role="alert">
                                       No hay resultado para mostrar!
                                    </div>`);          
            }else{
               $('#proveedores').html('');
               response.forEach(function(element,index,arreglo){
                           datoProveedor =`<tr>
                                             <td>${element['nombre']}</td>
                                             <td>${element['telefono']}</td>
                                             <td>${element['direccion']}</td>
                                             <td>${element['fk_idsucursalProveedor']}</td>
                                             <td>
                                                <a href="/proveedor/editar/${element['idproveedor']}"><i class="fa-solid fa-pen-to-square" style="color: #1ed006;"></i></a>
                                                <a href="/proveedor/eliminar/${element['idproveedor']}"><i class="fa-solid fa-trash" style="color: #ff0000;"></i></a>
                                             </td>
                                           </tr>`;
                  $('#proveedores').html($('#proveedores').html()+datoProveedor);    
               });          
            }         
         }
      });
   });
});
   
function tablaContacto(){
   const valid = 'omarsoto12';//NO ALVIDAR CAMBIAR ESTE COMANDO
   $.ajax({
            type: "GET",
            url:"{{asset('/proveedor/filtrar')}}",
            data: { valid:valid },
            dataType: "json",
            success: function (response) 
            {
               if (response == 'noDato')
               {
                  $('#proveedores').html('');
                  datoProveedor = 'No hay registro';           
               }else{
                  $('#proveedores').html('');
                  response.forEach(function(element,index,arreglo){
                              datoProveedor =`<tr>
                                                <td>${element['nombre']}</td>
                                                <td>${element['telefono']}</td>
                                                <td>${element['direccion']}</td>
                                                <td>${element['fk_idsucursalProveedor']}</td>
                                                <td>
                                                   <a href="/proveedor/editar/${element['idproveedor']}"><i class="fa-solid fa-pen-to-square" style="color: #1ed006;"></i></a>
                                                   <a href="/proveedor/eliminar/${element['idproveedor']}"><i class="fa-solid fa-trash" style="color: #ff0000;"></i></a>
                                                </td>
                                             </tr>`; 
                  $('#proveedores').append(datoProveedor);    
                  });          
               }         
            }
         });
      }

function eliminar()
{
   console.log($id);
}

tablaContacto();
</script>
@endsection