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
                 //   $mutil -> console_log('esta ingresando');
                    
                    
                    if(($_POST["id"])==0){
            
          
              
               // $mutil -> console_log('esta ingresando');
                  $datos = array("nit"=>$_POST["nit"],
                         "razon"=>$_POST["razon"],
                         "telefono"=>$_POST["telefono"]
                         );
          
                  $tabla = "proveedor";
                  $Proveedord = new ProveedorDAO ();
                  $respuesta = $Proveedord -> addProveedor($tabla,$datos);
                 // return $respuesta;  
                  if ($respuesta==true){
                    return "true";
                  }else{
                    return $respuesta;  
                  }



               // return "La subida de imagen ha fallado";
              
        
          }else{
           
                $datos = array("id"=>$_POST["id"],
                "nit"=>$_POST["nit"],
                "razon"=>$_POST["razon"],
                "telefono"=>$_POST["telefono"]
                         );
          
                $tabla = "proveedor";
                $Proveedord = new ProveedorDAO();
                $respuesta = $Proveedord -> updateProveedor($tabla,$datos);
          
                //return $respuesta;
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
       $Vehiculod = new ProveedorDAO();
        $respuesta = $Vehiculod -> listProveedor($pagina,$cantidad);
    
        return $respuesta;
  
      }




      

      public function ctrActualizarEstadoVehiculo($id){
      

        $tabla = "vehiculo";
        $datos = array("id"=>$id);
        $Vehiculod = new VehiculosDAO();
        $respuesta = $Vehiculod -> updatestatusvehiculo($tabla,$datos);
        return $respuesta; 
        
      
    }
      
    


    
}

?>