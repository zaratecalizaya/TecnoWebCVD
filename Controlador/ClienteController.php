<?php

require_once 'modelo/Funciones/ClienteDAO.php';
require_once 'modelo/utilitario.php';

class ControladorCliente{
  
    /* ==============================
     Registro de Usuario Web     
     ===============================*/
  
    
 
      ///aqui


     public function ctrRegistroCliente(){
      
      if(isset($_POST["id"])){
       
       $mutil = new Utils();
                 //   $mutil -> console_log('esta ingresando');
                    
                    
                    if(($_POST["id"])==0){
                   // $mutil -> console_log('esta ingresando');
                  $datos = array("ci"=>$_POST["ci"],
                         "nombre"=>$_POST["nombre"],
                         "paterno"=>$_POST["paterno"],
                         "materno"=>$_POST["materno"],
                         "telefono"=>$_POST["telefono"],
                       
                       
                         );
          
                  $tabla = "cliente";
                  $Cliented = new ClienteDAO();
                  $respuesta = $Cliented -> addCliente($tabla,$datos);
                 // return $respuesta;  
                  if ($respuesta==true){
                    return "true";
                  }else{
                    return $respuesta;  
                  }



                        
        
          }else{
           
                $datos = array("id"=>$_POST["id"],
                "ci"=>$_POST["ci"],
                "nombre"=>$_POST["nombre"],
                "paterno"=>$_POST["paterno"],
                "materno"=>$_POST["materno"],
                "telefono"=>$_POST["telefono"]
                  
            
            );
          
                $tabla = "cliente";
                $Cliented = new ClienteDAO();
                $respuesta = $Cliented -> updateCliente($tabla,$datos);
          
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
  



      public function ctrListarCliente($pagina,$cantidad){
           
       $tabla = "cliente";
       $Cliented = new ClienteDAO();
        $respuesta = $Cliented->listCliente($pagina,$cantidad);
    
        return $respuesta;
  
      }
     
       
      
      public function ctrListarClienteselect(){
           
        $tabla = "cliente";
        $Cliented = new ClienteDAO();
         $respuesta = $Cliented->listClienteSelect();
     
         return $respuesta;
   
       }



    


    
}

?>