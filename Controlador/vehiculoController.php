<?php

require_once 'modelo/Funciones/vehiculoDAO.php';
require_once 'modelo/utilitario.php';

class ControladorVehiculo{
  
    /* ==============================
     Registro de Usuario Web     
     ===============================*/
  
    
 
///aqui
    public function ctrRegistroVehiculo(){
      
      if(isset($_POST["id"])){
       
       $mutil = new Utils();
                 //   $mutil -> console_log('esta ingresando');
                    
                    
                    if(($_POST["id"])==0){
            
          
              
              $subir_archivo = 'imagenes/'.basename($_FILES['subir_archivo']['name']);
              if (move_uploaded_file($_FILES['subir_archivo']['tmp_name'], $subir_archivo)) {
               // $mutil -> console_log('esta ingresando');
                  $datos = array("marca"=>$_POST["marca"],
                         "año"=>$_POST["año"],
                         "modelo"=>$_POST["modelo"],
                         "imagen"=>$subir_archivo
                         );
          
                  $tabla = "vehiculo";
                  $Vehiculod = new VehiculosDAO();
                  $respuesta = $Vehiculod -> addVehiculo($tabla,$datos);
                 // return $respuesta;  
                  if ($respuesta==true){
                    return "true";
                  }else{
                    return $respuesta;  
                  }



              } else {


                $datos = array("marca"=>$_POST["marca"],
                         "año"=>$_POST["año"],
                         "modelo"=>$_POST["modelo"],
                         "imagen"=>""
                         );
          
                  $tabla = "vehiculo";
                  $Vehiculod = new VehiculosDAO();
                  $respuesta = $Vehiculod -> addVehiculo($tabla,$datos);
                  if ($respuesta==true){
                    return "true";
                  }else{



                    return $respuesta;  
                  }

               // return "La subida de imagen ha fallado";
              }          
        
          }else{
           
                $datos = array("id"=>$_POST["id"],
                "marca"=>$_POST["marca"],
                "año"=>$_POST["año"],
                "modelo"=>$_POST["modelo"]
                         );
          
                $tabla = "vehiculo";
                $Vehiculod = new VehiculosDAO();
                $respuesta = $Vehiculod -> updateVehiculo($tabla,$datos);
          
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
  



      public function ctrListarVehiculo($pagina,$cantidad){
      
            
       $tabla = "vehiculo";
       $Vehiculod = new VehiculosDAO();
        $respuesta = $Vehiculod -> listVehiculo($pagina,$cantidad);
    
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