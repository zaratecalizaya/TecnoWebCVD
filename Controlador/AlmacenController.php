<?php

require_once 'modelo/Funciones/AlmacenDAO.php';
require_once 'modelo/utilitario.php';

class ControladorAlmacen{
  
    /* ==============================
     Registro de Usuario Web     
     ===============================*/
  
    
 
      ///aqui


     public function ctrRegistroAlmacen(){
      
      if(isset($_POST["id"])){
       
       $mutil = new Utils();
                 //   $mutil -> console_log('esta ingresando');
                    
                    
                    if(($_POST["id"])==0){
                   // $mutil -> console_log('esta ingresando');
                  $datos = array(
                         "nombre"=>$_POST["nombre"],
                         
                       
                         );
          
                  $tabla = "almacen";
                  $Almacend = new AlmacenDAO();
                  $respuesta = $Almacend -> addAlmacen($tabla,$datos);
                 // return $respuesta;  
                  if ($respuesta==true){
                    return "true";
                  }else{
                    return $respuesta;  
                  }



                        
        
          }else{
           
                $datos = array("id"=>$_POST["id"],
               
                "nombre"=>$_POST["nombre"],
               
            );
          
                $tabla = "almacen";
                $Almacend = new AlmacenDAO();
                $respuesta = $Almacend -> updateAlmacen($tabla,$datos);
          
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
  



      public function ctrListarAlmacen($pagina,$cantidad){
           
       $tabla = "almacen";
       $Almacend = new AlmacenDAO();
        $respuesta = $Almacend->listAlmacen($pagina,$cantidad);
    
        return $respuesta;
  
      }




    


    
}

?>