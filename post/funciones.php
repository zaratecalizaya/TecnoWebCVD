<?php
 
class Funciones {
 
    private $db;
    // constructor

    function __construct() {
        require_once 'Conexion/connectbd.php';
        // connecting to database

        $this->db = new DB_Connect();
        $this->db->connect();

    }
 
    // destructor
    function __destruct() {
 
    }
    
      
   public function isuserexist($tabla, $username) {

        require_once 'Conexion/connectbd.php';
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
		
        if ($result = mysqli_query($link,"SELECT * from ".$tabla." WHERE Usuario = '".$username."'")) {

          /* determinar el número de filas del resultado */
          $num_rows  = mysqli_num_rows($result);

          if ($num_rows > 0) {
            return true;
          } else {
            // no existe
            return false;
          }

        }else {
          return false;
        }
        
    }     
      
      public function loginUsermovil($datos) { //regusu et no es
        
        $mensaje = "0|Error no identificado";
        require_once ('Conexion/connectbd.php');
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
		        
      	$query = "SELECT u.Id,u.Nombres,u.Apellidos,u.FechaNatal,u.IdCargo,u.CI,u.Region,u.Sector,u.SubSector,u.Usuario,u.Clave,u.IdNivel,u.Puntaje, u.Imagen, c.nombre as cargo FROM usuarios u inner join cargo c on c.id=u.idcargo WHERE Usuario =  '".$datos["usuario"]."' ";
        $result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error($link));

        $json = array();
        if(mysqli_num_rows($result)>0){
        	if ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $clave = md5($datos["clave"]);
            if ($line["Clave"]==$clave){
              $mensaje="1|".$line["Id"]."|".$line["Nombres"]."|".$line["Apellidos"]."|".$line["FechaNatal"]."|".$line["CI"]."|".$line["Region"]."|".$line["Sector"]."|".$line["SubSector"]."|".$line["Usuario"].."|".$line["IdCargo"]."|".$line["cargo"]."|".$line["IdNivel"]."|".$line["Puntaje"];
            }else{
              $mensaje="0|Usuario o contraseña incorrecto.";  
            }        
            
          }else{
            $mensaje="0|Error de conexion.";
          }
        }else{
          $mensaje="0|Usuario o contraseña incorrecto.";
        }
				mysqli_close($link);
        return $mensaje;
	}
  
  public function NivelUsuario($datos) { //regusu et no es
        
        $mensaje = "0|Error no identificado";
        require_once ('Conexion/connectbd.php');
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
		        
      	$query = "select n2.Numero,n2.PuntajeMin,n2.GruposMin from nivel n2 where Numero=(select n.Numero from nivel n where id =".$datos["nivel"]." ) +1";
        $result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error($link));

        $json = array();
        if(mysqli_num_rows($result)>0){
        	if ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $clave = md5($datos["clave"]);
            if ($line["Clave"]==$clave){
              $mensaje="1|".$line["Numero"]."|".$line["PuntajeMin"]."|".$line["GruposMin"];
            }else{
              $mensaje="0|Usuario o contraseña incorrecto.";  
            }        
            
          }else{
            $mensaje="0|Error de conexion.";
          }
        }else{
          $mensaje="0|Usuario o contraseña incorrecto.";
        }
				mysqli_close($link);
        return $mensaje;
	}
  
  public function CargarComboSector() { //regusu et no es
        
        $mensaje = "0|Objeto no encontrado";
        require_once ('Conexion/connectbd.php');
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
		        
      	$query = "SELECT Id,Nombre FROM Sector ";
        $result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error($link));

        $json = array();
        if(mysqli_num_rows($result)>0){
          $mensaje="1";
        	while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
              $mensaje=$mensaje."|".$line["Id"]."!".$line["Nombre"];
          }
        }else{
          $mensaje="0|No se encuentro ningun sector activo.";
        }
				mysqli_close($link);
        return $mensaje;
	}
  
   public function CargarComboSubSector() { //regusu et no es
        
        $mensaje = "0|Objeto no encontrado";
        require_once ('Conexion/connectbd.php');
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
		        
      	$query = "SELECT ss.Id,ss.Nombre,ss.IdSector,s.Nombre as Sector FROM SubSector ss inner join Sector s on s.Id = ss.IdSector ";
        $result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error($link));

        $json = array();
        if(mysqli_num_rows($result)>0){
          $mensaje="1";
        	while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
              $mensaje=$mensaje."|".$line["Id"]."!".$line["Nombre"]."!".$line["IdSector"]."!".$line["Sector"];
          }
        }else{
          $mensaje="0|No se encuentro ningun sector activo.";
        }
				mysqli_close($link);
        return $mensaje;
	}
}
 
?>