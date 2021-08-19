<?php

require_once 'modelo/Funciones/EmpleadoDAO.php';
require_once 'modelo/utilitario.php';

class ControladorEmpleado{
  
    /* ==============================
     Registro de Usuario Web     
     ===============================*/
  
    
 
 ///aqui
  



    public function ctrRegistroEmpleado(){
      
        if(isset($_POST["id"])){
         
         $mutil = new Utils();
                   //   $mutil -> console_log('esta ingresando');
                      
                      
                      if(($_POST["id"])==0){
              
            
                
                 // $mutil -> console_log('esta ingresando');
                      $datos = array(
                        "ci"=>$_POST["ci"],
                        "nombre"=>$_POST["nombre"],
                        "paterno"=>$_POST["paterno"],
                        "materno"=>$_POST["materno"],
                        "telefono"=>$_POST["telefono"],
                       // "email"=>$_POST["email"],
                        "direccion"=>$_POST["direccion"],
                        "cargo"=>$_POST["cargo"],
                     
                       // "imagen"=>""
                        );
                    $tabla = "empleado";
                    $Empleadod = new EmpleadoDAO ();
                    $respuesta = $Empleadod -> addEmpleado($tabla,$datos);
                   // return $respuesta;  
                    if ($respuesta==true){
                      return "true";
                    }else{
                      return $respuesta;  
                    }
  
  
  
                 // return "La subida de imagen ha fallado";
                
          
            }else{
             
                $datos = array("id"=>$_POST["id"],
                    "ci"=>$_POST["ci"],
                    "nombre"=>$_POST["nombre"],
                    "paterno"=>$_POST["paterno"],
                    "materno"=>$_POST["materno"],
                    "telefono"=>$_POST["telefono"],
                 //   "email"=>$_POST["email"],
                    "direccion"=>$_POST["direccion"],
                    "cargo"=>$_POST["cargo"],
                 
                   // "imagen"=>""
                    );
            
                  $tabla = "empleado";
                  $Empleadod = new EmpleadoDAO();
                  $respuesta = $Empleadod -> updateEmpleado($tabla,$datos);
            
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



      public function ctrListarEmpleado($pagina,$cantidad){
      
            
       $tabla = "empleado";
       $Empleadod = new EmpleadoDAO();
        $respuesta = $Empleadod -> listEmpleado($pagina,$cantidad);
    
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