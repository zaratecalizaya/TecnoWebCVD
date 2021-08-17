<?php

require_once 'modelo/Funciones/repuestoDAO.php';
require_once 'modelo/utilitario.php';

class ControladorRepuesto{
  
    /* ==============================
     Registro de Usuario Web     
     ===============================*/
  
    
     public function ctrRegistroRepuesto(){
      
      if(isset($_POST["id"])){
       
       $mutil = new Utils();
                 //   $mutil -> console_log('esta ingresando');
                    
                    
                    if(($_POST["id"])==0){
            
          
              
              $subir_archivo = 'imagenes/'.basename($_FILES['subir_archivo']['name']);
              if (move_uploaded_file($_FILES['subir_archivo']['tmp_name'], $subir_archivo)) {
               // $mutil -> console_log('esta ingresando');
                  $datos = array("codigo"=>$_POST["codigo"],
                  "imagen"=>$subir_archivo, 
                        "descripcion"=>$_POST["descripcion"],
                         "marca"=>$_POST["marca"],
                         "precio"=>$_POST["precio"],
                         "idcategoria"=>$_POST["idcategoria"],
                         
                         "idvehiculo"=>$_POST["idvehiculo"]
                         );
          
                  $tabla = "repuesto";
                  $Vehiculod = new RepuestoDAO();
                  $respuesta = $Vehiculod -> addrepuesto($tabla,$datos);
                 // return $respuesta;  
                  if ($respuesta==true){
                    return "true";
                  }else{
                    return $respuesta;  
                  }



              } else {


                $datos = array("codigo"=>$_POST["codigo"],
                "imagen"=>"", 
                      "descripcion"=>$_POST["descripcion"],
                       "marca"=>$_POST["marca"],
                       "precio"=>$_POST["precio"],
                       "idcategoria"=>$_POST["idcategoria"],
                       
                       "idvehiculo"=>$_POST["idvehiculo"]
                       
                         );
          
                         $tabla = "repuesto";
                         $Vehiculod = new RepuestoDAO();
                         $respuesta = $Vehiculod -> addrepuesto($tabla,$datos);
                  if ($respuesta==true){
                    return "true";
                  }else{



                    return $respuesta;  
                  }

               // return "La subida de imagen ha fallado";
              }          
        
          }else{
           
                $datos = array("id"=>$_POST["id"],
                "codigo"=>$_POST["codigo"], 
                        "descripcion"=>$_POST["descripcion"],
                         "marca"=>$_POST["marca"],
                         "precio"=>$_POST["precio"],
                         "idcategoria"=>$_POST["idcategoria"],
                         
                         "idvehiculo"=>$_POST["idvehiculo"]
                                  );
          
                                  $tabla = "repuesto";
                                  $Vehiculod = new RepuestoDAO();
                                  $respuesta = $Vehiculod -> updaterepuesto($tabla,$datos);
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


  public function ctrListarRepuesto($pagina,$cantidad){
      
            
    $tabla = "repuesto";
    $Almacend = new RepuestoDAO();
     $respuesta = $Almacend -> listRepuesto($pagina,$cantidad);
 
     return $respuesta;

   }



  







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
      
    public function ctrCategoriaVehiculo($idcategoria,$idvehiculo){
      
      $Vehiculod = new RepuestoDAO();
      $respuesta = $Vehiculod -> Capturandodatos($idcategoria,$idvehiculo);
      return $respuesta; 
      
    
  }


    
}

?>