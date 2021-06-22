<?php

  require_once 'modelo/Funciones/UsuarioDAO.php';

class ControladorUsuario{
  
    /* ==============================
     Registro de Usuario Web     
     ===============================*/
  
    public function ctrRegistroUsuario(){
      
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



 public function ctrListarCargoUsuario(){
  if(isset($_POST["region"])){
    $datos = array("id_cargo"=>$_POST["cargo"],
    "region"=>$_POST["region"],
    "id_subsector"=>$_POST["subsector"],
   "id_sector"=>$_POST["sector"],
   "fecha"=>$_POST["fecha"],

  );


    $tabla = "usuarios";
     $Usuariod = new UsuarioDAO();   
     $respuesta = $Usuariod -> listcantidaduser($tabla,$datos);

     return $respuesta;







     
     
  }else{
    $datos = array("id_cargo"=>0,
    "region"=>"",
    "id_subsector"=>0,
   "id_sector"=>0,
   "fecha"=>""
  
  );

    $tabla = "usuarios";
     $Usuariod = new UsuarioDAO();   
     $respuesta = $Usuariod -> listcantidaduser($tabla,$datos);

     return $respuesta;






     
  }
  
            

 }
  
    public function ctrListarUsuariosWeb($pagina,$cantidad){
      
            
            $tabla = "usuariosweb";
            $Usuariod = new UsuarioDAO();
            $respuesta = $Usuariod -> listusuarioWeb($pagina,$cantidad);
            
            return $respuesta;
            
          
    }
    
    public function ctrListarSectores(){
      
            
            $tabla = "sector";
            $Usuariod = new UsuarioDAO();
            $respuesta = $Usuariod -> listSectores();
            
            return $respuesta;
            
          
    }
    
    public function ctrListarSubSectores($id_sector){
      
            
            $Usuariod = new UsuarioDAO();
            $respuesta = $Usuariod -> listSubSectores($id_sector);
            
            return $respuesta;
            
          
    }
    public function ctrListarCargo($id_subsector){
      
            
            $Usuariod = new UsuarioDAO();
            $respuesta = $Usuariod -> listCargo($id_subsector);
            
            return $respuesta;
            
          
    }
    
    public function ctrListarUsuariosMovil($pagina,$cantidad){
      
            
            $tabla = "usuarios";
            $Usuariod = new UsuarioDAO();
            $respuesta = $Usuariod -> listusuarioMovil($pagina,$cantidad);
            
            return $respuesta;
            
          
    }
    public function ctrContarUsuariosMovil(){
      
            
            $tabla = "usuarios";
            $Usuariod = new UsuarioDAO();
            $respuesta = $Usuariod -> contarusuarioMovil();
            
            return $respuesta;
            
          
    }
    
    
    public function ctrContarUsuarios(){
      
            
      $tabla = "usuarios";
      $Usuariod = new UsuarioDAO();
      $respuesta = $Usuariod ->contarUsuarios();
      
      return $respuesta;
      
    
}





    public function ctrActualizarEstadoUsuario($id,$usuario){
      
            
            $tabla = "usuariosweb";
            $datos = array("id"=>$id,
                           "usuario"=>$usuario);
            $Usuariod = new UsuarioDAO();
            $respuesta = $Usuariod -> updatestatususer($tabla,$datos);
            
            return $respuesta;
            
          
    }


    public function ctrEliminarRegistro($id,$usuario){
      
            
      $tabla = "usuarios";
      $datos = array("id"=>$id,
                     "usuario"=>$usuario);
      $Usuariod = new UsuarioDAO();
      $respuesta = $Usuariod -> updatestatususer($tabla,$datos);
      
      return $respuesta;
      
    
}
    
    public function ctrActualizarEstadoUsuarioMovil($id,$usuario){
      
            
            $tabla = "usuarios";
            $datos = array("id"=>$id,
                           "usuario"=>$usuario);
            $Usuariod = new UsuarioDAO();
            $respuesta = $Usuariod -> updatestatususer($tabla,$datos);
            
            return $respuesta;
            
          
    }
    
    public function ctrloginUserWeb(){
      
            require_once 'modelo/utilitario.php';
                    $mutil = new Utils();
                    $mutil -> console_log('entro login');
          if(isset($_POST["usuario"])){
            $mutil -> console_log('entro post login');
            $datos = array("usuario"=>$_POST["usuario"],
                           "clave"=>$_POST["clave"]);
            
            $tabla = "usuariosweb";
            $Usuariod = new UsuarioDAO();
            $respuesta = $Usuariod -> loginUserWeb($datos);
            
            //return $respuesta;
            if (is_null( $respuesta)){
              $mutil -> console_log('null respuesta');
              return "0|Error de conexión al servidor";
            }else{
              $mutil -> console_log('respuesta no null');
              return $respuesta;  
            }
            
          
        }else{
          return "-1|";
        }                 
          
    }
    
    
    public function ctrRegistroUsuarioMovil(){
      
        if(isset($_POST["id"])){
          if(($_POST["clave"])==($_POST["clave2"])){
            if(($_POST["id"])==0){
              if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/',$_POST["nombres"])){
            
                $directorio = 'fotoperfil/';
                $subir_archivo = $directorio.basename($_FILES['subir_archivo']['name']);
                if (move_uploaded_file($_FILES['subir_archivo']['tmp_name'], $subir_archivo)) {
                //  echo "El archivo es válido y se cargó correctamente.<br><br>";
                    $datos = array("Nombres"=>$_POST["nombres"],
                           "Apellidos"=>$_POST["apellidos"],
                           "Ci"=>$_POST["ci"],
                           "FechaNatal"=>$_POST["fechanatal"],
                           "Region"=>$_POST["region"],
                           "Sector"=>$_POST["sector"],
                           "SubSector"=>$_POST["subsector"],
                           "Cargo"=>$_POST["cargo"],
                           "Imagen"=>$subir_archivo,
                           "usuario"=>$_POST["usuario"],
                           "clave"=>$_POST["clave"]);
            
                    $tabla = "usuarios";
                    $Usuariod = new UsuarioDAO();
                    $respuesta = $Usuariod -> adduserMovil($tabla,$datos);
                    return $respuesta;  
                } else {
                  return "La subida ha fallado";
                }
              }else{
                return "Se ha introducido Caracteres invalidos en el nombre";
              }              
          
            }else{
              if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/',$_POST["nombre"])){
                $directorio = 'fotoperfil/';
                $subir_archivo = $directorio.basename($_FILES['subir_archivo']['name']);
                if (move_uploaded_file($_FILES['subir_archivo']['tmp_name'], $subir_archivo)) {
            
                  $datos = array("id"=>$_POST["id"],
                           "Nombres"=>$_POST["nombres"],
                           "Apellidos"=>$_POST["apellidos"],
                           "Ci"=>$_POST["ci"],
                           "FechaNatal"=>$_POST["fechanatal"],
                           "Region"=>$_POST["region"],
                           "Sector"=>$_POST["sector"],
                           "SubSector"=>$_POST["subsector"],
                           "Cargo"=>$_POST["cargo"],
                           "Imagen"=>$subir_archivo,
                           "usuario"=>$_POST["usuario"],
                           "clave"=>$_POST["clave"]);
            
                  $tabla = "usuarios";
                  $Usuariod = new UsuarioDAO();
                  $respuesta = $Usuariod -> updateuserMovil($tabla,$datos);
            
                  //return $respuesta;
                  if ($respuesta==true){
                    return "true";
                  }else{
                    return $respuesta;  
                  }
                } else {
                  return "La subida ha fallado";
                }           
              }else{
                return "Se ha introducido Caracteres invalidos en el nombre";
              }
            }
          }else{
              return "Las contraseñas no coinciden";
          }
        }else{
          return "";
        }
        
    }
    
    public function ctrBuscar($region,$sector,$subsector,$cargo){  
      
            
      $tabla = "usuarios";
      $Usuariod = new UsuarioDAO();
      $respuesta = $Usuariod -> listcantidaduser($region,$sector,$subsector,$cargo);
      
      return $respuesta;
      
    
   }
}

?>