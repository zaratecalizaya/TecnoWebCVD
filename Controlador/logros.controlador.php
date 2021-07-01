<?php



  require_once 'modelo/Funciones/GrupoComportamientoDAO.php';
  require_once 'modelo/Funciones/ComportamientoDAO.php';
  require_once 'modelo/Funciones/NivelesDAO.php';
  require_once 'modelo/Funciones/LogrosDAO.php';
class ControladorLogro{
  
    /* ==============================
     Registro de Usuario Web     
     ===============================*/
  
    public function ctrRegistroLogro(){
      
        if(isset($_POST["id"])){
          if(($_POST["clave"])==($_POST["clave2"])){
          if(($_POST["id"])==0){
            if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/',$_POST["nombre"])){
            
            $datos = array("nombre"=>$_POST["nombre"],
                           "usuario"=>$_POST["usuario"],
                           "clave"=>$_POST["clave"]);
            
            $tabla = "usuariosweb";
            $Usuariod = new UsuarioDAO();
            $respuesta = $Usuariod -> adduserWeb($tabla,$datos);
            
            //return $respuesta;
            if ($respuesta==true){
              return "true";
            }else{
              return $respuesta;  
            }
            
            
            }else{
            
              return "false2";
            }
          
          }else{
            if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/',$_POST["nombre"])){
            
            $datos = array("id"=>$_POST["id"],
                           "nombre"=>$_POST["nombre"],
                           "usuario"=>$_POST["usuario"],
                           "clave"=>$_POST["clave"]);
            
            $tabla = "usuariosweb";
            $Usuariod = new UsuarioDAO();
            $respuesta = $Usuariod -> updateuserWeb($tabla,$datos);
            
            //return $respuesta;
            if ($respuesta==true){
              return "true";
            }else{
              return $respuesta;  
            }
            
            
            }else{
            
              return "false2";
            }
            
            }
            }else{
              return "Las contraseñas no coinciden";
          }
        }else{
          return "false";
        }
        
    }
  
    public function ctrListarLogros($pagina,$cantidad){
      
            
            $tabla = "logro";
            $Logrosd = new LogrosDAO();
            $respuesta = $Logrosd -> listLogros($pagina,$cantidad);
            
            return $respuesta;
            
          
    }



  



    

    public function ctrContarLogros(){
      
            
            $tabla = "grupocomportamiento";
            $Logrosd = new LogrosDAO();
            $respuesta = $Logrosd -> contarLogros();
            
            return $respuesta;
            
          
    }


    public function ctrContarReconocimientos(){
      
            
      $tabla = "reconocimiento";
      $Logrosd = new LogrosDAO();
      $respuesta = $Logrosd -> contarReconocimientos();
      
      return $respuesta;
      
    
}


   

    
    


    public function ctrListarComportamientos($pagina,$cantidad){
      
            
      $tabla = "comportamiento";
      $Comportamientod = new ComportamientoDAO();
      $respuesta = $Comportamientod ->  listComportamientos($pagina,$cantidad);
      
      return $respuesta;
    }


    public function ctrlistTablero($pagina,$cantidad){
          
      $tabla = "reconocimiento";
      $Reconocimientod = new LogrosDAO();
      $respuesta = $Reconocimientod ->  listReconocimiento($pagina,$cantidad);
      
      return $respuesta;


    }
      

    public function ctrListarGrupo(){
      
            
      $tabla = "grupocomportamiento";
      $Usuariod = new ComportamientoDAO();
      $respuesta = $Usuariod -> listGrupos();
      
      return $respuesta;
      
    
    }





    public function ctrListarGrupoComportamiento(){
      
            
      $tabla = "grupocomportamiento";
      $Logrosd = new LogrosDAO();
      $respuesta = $Logrosd -> listGrupoComportamiento();
      
      return $respuesta;
      
    }

  
///aqui
    public function ctrRegistroGrupo(){
      
      if(isset($_POST["id"])){
       
          if(($_POST["id"])==0){
            if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/',$_POST["nombre"])){
          
              
              $subir_archivo = 'logros/'.basename($_FILES['subir_archivo']['name']);
              if (move_uploaded_file($_FILES['subir_archivo']['tmp_name'], $subir_archivo)) {
           
                  $datos = array("nombre"=>$_POST["nombre"],
                         "puntajemeta"=>$_POST["puntajemeta"],
                         "imagen"=>$subir_archivo
                         );
          
                  $tabla = "grupocomportamiento";
                  $Usuariod = new GrupoComportamientoDAO();
                  $respuesta = $Usuariod -> addGrupoComportamiento($tabla,$datos);
                 // return $respuesta;  
                  if ($respuesta==true){
                    return "true";
                  }else{



                    return $respuesta;  
                  }



              } else {


                $datos = array("nombre"=>$_POST["nombre"],
                         "puntajemeta"=>$_POST["puntajemeta"],
                         "imagen"=>""
                         );
          
                  $tabla = "grupocomportamiento";
                  $Usuariod = new GrupoComportamientoDAO();
                  $respuesta = $Usuariod -> addGrupoComportamiento($tabla,$datos);
                  if ($respuesta==true){
                    return "true";
                  }else{



                    return $respuesta;  
                  }

               // return "La subida de imagen ha fallado";
              }
            }else{
              return "Se ha introducido Caracteres invalidos en el nombre";
            }              
        
          }else{
            if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/',$_POST["nombre"])){
                $datos = array("id"=>$_POST["id"],
                         "nombre"=>$_POST["nombre"],
                         "puntajemeta"=>$_POST["puntajemeta"],
                         "imagen"=>$subir_archivo
                         );
          
                $tabla = "grupocomportamiento";
                $Usuariod = new GrupoComportamientoDAO();
                $respuesta = $Usuariod -> updateGrupo($tabla,$datos);
          
                //return $respuesta;
                if ($respuesta==true){
                  return "true";
                }else{
                  return $respuesta;  
                }
                     
            }else{
              return "Se ha introducido Caracteres invalidos en el nombre";
            }
          }
        
      }else{
        return "";
      }
      
  }
  


  public function ctrRegistroComportamiento(){
      
    if(isset($_POST["id"])){
     
        if(($_POST["id"])==0){
          if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/',$_POST["nombre"])){

                $datos = array("nombre"=>$_POST["nombre"],
                       "puntaje"=>$_POST["puntaje"],
                       "grupos"=>$_POST["grupos"]
                       
                     
                       );
                       
          
        
                $tabla = "comportamiento";
                $Usuariod = new ComportamientoDAO();
                $respuesta = $Usuariod -> addComportamiento($tabla,$datos);
               // return $respuesta;  
                if ($respuesta==true){
                  return "true";
                }else{
                  return $respuesta;  
                }



            
          }else{
            return "Se ha introducido Caracteres invalidos en el nombre";
          }              
      
        }else{
          if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/',$_POST["nombre"])){
            
              $datos = array("id"=>$_POST["id"],
              "nombre"=>$_POST["nombre"],
              "puntaje"=>$_POST["puntaje"],
              "grupos"=>$_POST["grupos"]
              );
              


              //    echo $datos["id"],$datos["nombre"],$datos["puntaje"],$datos["grupos"];

           //echo $datos["puntaje"];
              $tabla = "comportamiento";
              $Usuariod = new ComportamientoDAO();
              $respuesta = $Usuariod ->updateComportamiento($tabla,$datos);
        
              return $respuesta;
              if ($respuesta==true){
                return "true";
              }else{
                return $respuesta;  
              }
                   
          }else{
            return "Se ha introducido Caracteres invalidos en el nombre";

            ;

             

          }
        }
      
    }else{
      return "";
    }
    
}




      public function ctrListarNivelTabla($pagina,$cantidad){
      
            
       $tabla = "nivel";
       $Niveld = new NivelesDAO();
        $respuesta = $Niveld -> listNivel($pagina,$cantidad);
    
        return $respuesta;
  
      }

      public function ctrRegistroNivel(){
      
        if(isset($_POST["id"])){
         
            if(($_POST["id"])==0){
              if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/',$_POST["nombre"])){
    
                    $datos = array("nombre"=>$_POST["nombre"],
                           "numero"=>$_POST["numero"],
                          "puntajemin"=>$_POST["puntajemin"],
                          "grupomin"=>$_POST["grupomin"]
                           
                         
                           );
                           
              
            
                    $tabla = "nivel";
                    $Usuariod = new NivelesDAO();
                    $respuesta = $Usuariod -> addNivel($tabla,$datos);
                   // return $respuesta;  
                    if ($respuesta==true){
                      return "true";
                    }else{
                      return $respuesta;  
                    }
    
    
    
                
              }else{
                return "Se ha introducido Caracteres invalidos en el nombre";
              }              
          
            }else{
              if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/',$_POST["nombre"])){
                
                  $datos = array("id"=>$_POST["id"],
                  "nombre"=>$_POST["nombre"],
                  "numero"=>$_POST["numero"],
                  "puntajemin"=>$_POST["puntajemin"],
                  "grupomin"=>$_POST["grupomin"]
                  );
                  
    
    
                  //    echo $datos["id"],$datos["nombre"],$datos["puntaje"],$datos["grupos"];
    
               //echo $datos["puntaje"];
                  $tabla = "nivel";
                  $Usuariod = new NivelesDAO();
                  $respuesta = $Usuariod ->updateNivel($tabla,$datos);
            
                  return $respuesta;
                  if ($respuesta==true){
                    return "true";
                  }else{
                    return $respuesta;  
                  }
                       
              }else{
                return "Se ha introducido Caracteres invalidos en el nombre";
    
                ;
    
                 
    
              }
            }
          
        }else{
          return "";
        }
        
    }
    

      public function ctrActualizarEstadoGrupoComportamiento($id){
      
            
        $tabla = "grupocomportamiento";
        $datos = array("id"=>$id);
        $Grupod = new GrupoComportamientoDAO();
        $respuesta = $Grupod -> updatestatusgrupo($tabla,$datos);
        
        return $respuesta;
        
      
    }
      
      
    
    public function ctrActualizarEstadoComportamiento($id){
      
            
      $tabla = "comportamiento";
      $datos = array("id"=>$id);
      $Comportamientod = new ComportamientoDAO();
      $respuesta = $Comportamientod -> updatestatuscomportamiento($tabla,$datos);
      
      return $respuesta;
      
    
  }




    public function ctrListarComentarios($pagina,$cantidad){
      
            
            $tabla = "usuarios";
            $Usuariod = new UsuarioDAO();
            $respuesta = $Usuariod -> listusuarioMovil($pagina,$cantidad);
            
            return $respuesta;
            
          
    }
    
    
    public function ctrActualizarEstadoLogros($id,$usuario){
      
            
            $tabla = "usuariosweb";
            $datos = array("id"=>$id,
                           "usuario"=>$usuario);
            $Usuariod = new UsuarioDAO();
            $respuesta = $Usuariod -> updatestatususerWeb($tabla,$datos);
            
            return $respuesta;
            
          
    }
    

    public function ctrListarGrupoCompotamientosTabla($pagina,$cantidad){
      
            
      $tabla = "grupocomportamiento";
      $Grupod = new GrupoComportamientoDAO();
       $respuesta = $Grupod -> listGrupoComportamiento($pagina,$cantidad);
   
       return $respuesta;
 
     }

    
}

?>