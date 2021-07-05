<?php

  require_once 'modelo/Funciones/ConfiguracionDAO.php';
  require_once 'modelo/utilitario.php';

class ControladorConfiguracion{
  
    /* ==============================
     Registro de Usuario Web     
     ===============================*/
  
   


     public function ctrListarConfiguracion($pagina,$cantidad){
      
            
        $tabla = "configuracion";
        $Usuariod = new ConfiguracionDAO();
        $respuesta = $Usuariod -> listconfiguraciones($pagina,$cantidad);
        
        return $respuesta;
        
      
      }
  
   
public function ctrRegistroEmail(){
  
      
  if(isset($_POST["emailde"])){
    
      if($_POST["emailde"]!=""){


            $datos = array("EmailDe"=>$_POST["emailde"],"EmailPara"=>$_POST["emailpara"]   );
              $tabla = "configuracion";
              $Usuariod = new ConfiguracionDAO();
              $respuesta = $Usuariod -> addEmail($tabla,$datos);
             // return $respuesta;  
              if ($respuesta==true){
                return "true";
              }else{
                return $respuesta;  
              }
              
      }   else{
        return "";
        }




    
  }else{
    return "";
  }
 
  
}




}

?>