<?php
namespace App\Http\Controllers;
use App\entidades\Proveedor;
use Illuminate\Http\Request;

class ControladorProveedor extends Controller{

   public function index()//Se crea la funcion index para visualizar en una lista todos los proveedores registrados
   {
      $titulo = 'Proveedores';//titulo que se pasa a la vista
      $mensaje = 0;//Variable inicializada en 0

      $proveedor = new Proveedor();// nuevo objeto de tipo proveedor
      $aProveedor = $proveedor->seleccionarTodo();//Se crea una variable para guardar el resgristro que viene de la consulta de(selecionar todos los registros existente ne la DB)
      if(!$aProveedor){//Se pregunta si la la variable es diferente a true. si lo es entre al if()
         $mensaje == 1;
         return view('sistema.listar_proveedores', compact('titulo', 'aProveedor', 'mensaje'));
      }else{
         return view('sistema.listar_proveedores', compact('titulo', 'aProveedor'));
      }   
   }

   public function nuevo()//Se crea la funcion nuevo para visualizar los campos que se van a registrar
   {
      $titulo = 'Nuevo proveedor';//Titulo que se pasa a la vista 
      $aProveedor = array(); //Se crea este array vacio para pasarlo a la vista
      return view('sistema.crear_proveedor', compact('titulo', 'aProveedor'));//Se envian todas las variables a la vista para ser visulaisadas
   }

   public function ingresar_proveedor(Request $request)
   {
      $titulo = 'Nuevo proveedor';
      $mensaje = 0;

      $proveedor = new Proveedor();
      $proveedor->CargarDatosFormulario($request);

      if($_POST['txtIdProveedor'] > 0) {
         $mensaje = 1;
         $proveedor->actualizar();
         $aProveedor = array();
         return(view('sistema.crear_proveedor',compact('titulo', 'mensaje', 'aProveedor')));
      } else {
         $rInsert = $proveedor->insertar();
         $aProveedor = array();
         if ($rInsert == 1) {
            $mensaje = 1;
            return(view('sistema.crear_proveedor',compact('titulo', 'mensaje', 'aProveedor')));
         } else {
            $mensaje = 2;
            return(view('sistema.crear_proveedor',compact('titulo', 'mensaje', 'aProveedor')));
         }
      }
   }

   public function editar($id)
   {
      $titulo = 'Editar - Proveedor';

      $proveedor = new Proveedor();
      $aProveedor = $proveedor->seleccionarPorId($id);
      return(view('sistema.crear_proveedor',compact('titulo', 'aProveedor')));
   }

   public function eliminar($id)
   {
      $proveedor = new Proveedor();
      $proveedor->eleminar($id);
      return(redirect('/proveedor/index'));
   }

   public function filtrado(Request $get)
   {
      if($_GET['valid'] == 'omarsoto12.'){//NO ALVIDAR CAMBIAR ESTE COMANDO
         $dato = $_GET['dato'];
         $proveedor = new Proveedor();
         $aProveedor = $proveedor->filtrar($dato);
         if ($aProveedor) { 
            $row = json_encode($aProveedor,JSON_UNESCAPED_UNICODE);
            echo $row;
         }else{
            echo 'noDato';
         }
      }   

      if($_GET['valid'] == 'omarsoto12'){//NO ALVIDAR CAMBIAR ESTE COMANDO
         $dato = '';
         $proveedor = new Proveedor();
         $aProveedor = $proveedor->seleccionarTodo();
         if ($aProveedor) { 
            $row = json_encode($aProveedor,JSON_UNESCAPED_UNICODE);
            echo $row;
         }else{
            echo 'noDato';
         }
      }  
   }
}




/*for ($i=0 ; $i < count($aProveedor) ; $i++ ) { 
   $dato = array();
   $dato[] = $aProveedor[$i]->idproveedor;
   $dato[] = $aProveedor[$i]->nombre;
   $dato[] = $aProveedor[$i]->telefono;
   $dato[] = $aProveedor[$i]->direccion;
   $dato[] = $aProveedor[$i]->fk_idsucursalProveedor;
   $row [] = $dato;
}
//print_r($row);
//exit;*/

/*@foreach ($aMedicamentos as $medicamento)
                  <tr>
                     <td>{{ $medicamento->nombre }}</td>
                     <td>{{ $medicamento->codigo_barra }}</td>
                     <td>{{ $medicamento->cantidad_interna }}</td>
                     <td>{{ $medicamento->cantidad_externa }}</td>
                     <td>{{ $medicamento->fecha_ingreso}}</td>
                     <td>{{ $medicamento->fecha_vencimiento }}</td>
                     <td>{{ $medicamento->precio }}</td>
                     <td>{{ $medicamento->lote }}</td>
                     <td>{{ $medicamento->fk_idseccion }}</td>
                     <td>{{ $medicamento->fk_idproveedor }}</td>
                     <td>{{ $medicamento->fk_idlaboratorio }}</td>
                     <td>{{ $medicamento->fk_idtipo_medicamento }}</td>
                     <td> eliminar</td>
                  </tr>
               @endforeach*/