<?php

require_once 'modelo/Funciones/ProveedorDAO.php';
require_once 'modelo/utilitario.php';

class ControladorProveedor{
  
    /* ==============================
     Registro de Usuario Web     
     ===============================*/
  
    
 
 ///aqui
  



    public function ctrRegistroProveedor(){
      
      if(isset($_POST["id"])){
       
       $mutil = new Utils();
                  //  $mutil -> console_log('esta ingresando');
                    
                    
                    if(($_POST["id"])==0){
            
          
              
               // $mutil -> console_log('esta ingresando');
                  $datos = array("nit"=>$_POST["nit"],
                         "razon_social"=>$_POST["razon_social"],
                         "telefono"=>$_POST["telefono"],
                         "direccion"=>$_POST["direccion"],
                         "email"=>$_POST["email"],
                         );
          
            }else{
             
                $datos = array("id"=>$_POST["id"],
                "nit"=>$_POST["nit"],
                "razon_social"=>$_POST["razon_social"],
                "telefono"=>$_POST["telefono"],
                "dirección"=>$_POST["dirección"],
                "email"=>$_POST["email"],
                 
                   // "imagen"=>""
                    );
            
                  $tabla = "proveedor";
                  $Proveedord = new ProveedorDAO ();
                  $respuesta = $Proveedord ->addProveedor($tabla,$datos);
                 // return $respuesta;  
                  if ($respuesta==true){
                    return "true";
                  }else{
                    return $respuesta;  
                  }
                       
              
            }
          
        }else{
          return "";
        }
        
     }



      public function ctrListarProveedor($pagina,$cantidad){
      
            
       $tabla = "proveedor";
       $Proveedord = new ProveedorDAO();
      $respuesta = $Proveedord -> listProveedor($pagina,$cantidad);
    
        return $respuesta;
  
      }




      

      //public function ctrActualizarEstadoVehiculo($id){
      

       // $tabla = "vehiculo";
       // $datos = array("id"=>$id);
       // $Vehiculod = new VehiculosDAO();
        //$respuesta = $Vehiculod -> updatestatusvehiculo($tabla,$datos);
      //  return $respuesta; 
        
      
    }
      
    
  
  
    


?>