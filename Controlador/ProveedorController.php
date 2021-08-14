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
                         "telefono"=>$_POST["telefono"],
                         "direccion"=>$_POST["direccion"]
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
                "telefono"=>$_POST["telefono"],
                "direccion"=>$_POST["direccion"]
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
       $Proveedord = new ProveedorDAO();
        $respuesta = $Proveedord -> listProveedor($pagina,$cantidad);
    
        return $respuesta;
  
      }




      

      public function ctrActualizarEstadoProveedor($id){
      

        $tabla = "proveedor";
        $datos = array("id"=>$id);
        $Proveedord = new ProveedorDAO();
        $respuesta = $Proveedord -> updatestatusproveedor($tabla,$datos);
        return $respuesta; 
      
        
      
    }
      
    


    
}

?>