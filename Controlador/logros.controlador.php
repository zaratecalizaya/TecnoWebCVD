<?php


  require_once 'modelo/Funciones/GrupoComportamientoDAO.php';
  require_once 'modelo/Funciones/ComportamientoDAO.php';

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
      
            
            $tabla = "logro";
            $Logrosd = new LogrosDAO();
            $respuesta = $Logrosd -> contarLogros();
            
            return $respuesta;
            
          
    }
    

    public function ctrListarComportamientos($pagina,$cantidad){
      
            
      $tabla = "comportamiento";
      $Comportamientod = new ComportamientoDAO();
      $respuesta = $Comportamientod ->  listComportamientos($pagina,$cantidad);
      
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
                return "La subida de imagen ha fallado";
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
           echo $datos["puntaje"];
              $tabla = "comportamiento";
              $Usuariod = new ComportamientoDAO();
              $respuesta = $Usuariod ->updateComportamiento($tabla,$datos);
        
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




      public function ctrListarGrupoComportamientosTabla($pagina,$cantidad){
      
            
       $tabla = "grupocomportamiento";
       $GrupoComportamientod = new GrupoComportamientoDAO();
        $respuesta = $GrupoComportamientod -> listGrupoComportamiento($pagina,$cantidad);
  
        return $respuesta;
  
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
    
    
}

?>