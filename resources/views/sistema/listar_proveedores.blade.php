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
                     <a class="btn-primary btn mb-2 ml-1" href="/proveedor/nuevo">Nuevo proveedor</a>
                  </div>  
                  <div class="col-10">
                     <div class="row d-flex">
                        <div class="col-5">
                           <input type="text" name="buscarProveedor" id="buscarProveedortxt" placeholder="Buscar" class="form-control mb-2 ml-2">
                        </div>
                        <div class="col-0">
                           <a class="btn-primary btn mb-2" id="buscarProveedorbutton" href="#">Buscar</a>
                        </div>
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

         <table class="table table-hover" id="tablaContacto">
            <thead class="border">
               <tr>
                  <th>PROVEEDOR</th>
                  <th>TELEFONO</th>
                  <th>DIRECCION</th>
                  <th>SUCURSAL</th>
                  <th>ACCIONES</th>
                  </tr>
               </thead>
                  
               <tbody class="border" id="proveedores">
                  <table>
                  </table>
               </tbody>
      </div>
</section>
<script>
$(document).ready(function(){ 
   const valid = 'omarsoto12.';//NO ALVIDAR CAMBIAR ESTE COMANDO
   $('#buscarProveedortxt').keyup(function (e){ 
      let datoProveedor
      let dato = $('#buscarProveedortxt').val();
      console.log(dato);
      $.ajax({
         type: "GET",
         url:"{{asset('/proveedor/filtrar')}}",
         data: {dato:dato,
                valid:valid 
               },
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
                  $('#proveedores').html($('#proveedores').html()+datoProveedor);    
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