<?php

require_once 'modelo/Funciones/repuestoDAO.php';
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
                  $datos = array("nombre"=>$_POST["nombre"]
                         );
          
                  $tabla = "almacen";
                  $Almacend = new RepuestoDAO ();
                  $respuesta = $Almacend -> addAlmacen($tabla,$datos);
                 // return $respuesta;  
                  if ($respuesta==true){
                    return "true";
                  }else{
                    return $respuesta;  
                  }



               // return "La subida de imagen ha fallado";
              
        
          }else{
           
                $datos = array("id"=>$_POST["id"],
                "nombre"=>$_POST["nombre"]                         );
          
                $tabla = "almacen";
                $Almacend = new RepuestoDAO();
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
       $Almacend = new RepuestoDAO();
        $respuesta = $Almacend -> listAlmacen($pagina,$cantidad);
    
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