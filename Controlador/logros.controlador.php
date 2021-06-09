<?php

  require_once 'modelo/Funciones/UsuarioDAO.php';
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
      $respuesta = $Comportamientod -> listComportamientos($pagina,$cantidad);
      
      return $respuesta;
      
    
}


public function ctrListarGrupoComportamientos($pagina,$cantidad){
      
            
  $tabla = "grupocomportamiento";
  $GrupoComportamientod = new GrupoComportamientoDAO();
  $respuesta = $Comportamientod -> listGrupoComportamientos($pagina,$cantidad);
  
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