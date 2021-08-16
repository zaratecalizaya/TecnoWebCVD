<?php

require_once 'modelo/Funciones/UnidadmedidaDAO.php';
require_once 'modelo/utilitario.php';

class ControladorUnidadmedida{
  
    /* ==============================
     Registro de Usuario Web     
     ===============================*/
  
    
 
 ///aqui
  



    public function ctrRegistroUnidadmedida(){
      
        if(isset($_POST["id"])){
         
         $mutil = new Utils();
                   //   $mutil -> console_log('esta ingresando');
                      
                      
                      if(($_POST["id"])==0){
              
            
                
                 // $mutil -> console_log('esta ingresando');
                      $datos = array(
                        "nombre"=>$_POST["nombre"],
                       
                        
                     
                       // "imagen"=>""
                        );
                    $tabla = "unidad_medida";
                    $Unidadmedidad = new UnidadmedidaDAO ();
                    $respuesta = $Unidadmedidad -> addUnidadmedida($tabla,$datos);
                   // return $respuesta;  
                    if ($respuesta==true){
                      return "true";
                    }else{
                      return $respuesta;  
                    }
  
  
  
                 // return "La subida de imagen ha fallado";
                
          
            }else{
             
                $datos = array("id"=>$_POST["id"],
                    "nombre"=>$_POST["nombre"],
                   
                 
                   // "imagen"=>""
                    );
            
                  $tabla = "unidad_medida";
                  $Unidadmedidad = new UnidadmedidaDAO();
                  $respuesta = $Unidadmedidad -> updateUnidadmedida($tabla,$datos);
            
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



      public function ctrListarUnidadmedida($pagina,$cantidad){
      
            
       $tabla = "unidad_medida";
       $Unidadmedidad = new UnidadmedidaDAO();
        $respuesta = $Unidadmedidad -> listUnidadmedida($pagina,$cantidad);
    
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