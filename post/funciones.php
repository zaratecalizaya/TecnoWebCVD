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
		        
      	$query = "SELECT u.Id,u.Nombres,u.Apellidos,u.FechaNatal,u.IdCargo,u.CI,u.Region,u.Sector,u.SubSector,u.Usuario,u.Clave,u.IdNivel,u.Puntaje, u.Imagen, c.nombre as cargo, n.nombre as nivel,n.Numero,n.PuntajeMin,n.GruposMin  FROM usuarios u inner join cargo c on c.id=u.idcargo inner join nivel n on n.id=u.idnivel   WHERE Usuario = '".$datos["usuario"]."' ";
        $result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error($link));

        $json = array();
        if(mysqli_num_rows($result)>0){
        	if ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $clave = md5($datos["clave"]);
            if ($line["Clave"]==$clave){
              $mensaje="1|".$line["Id"]."|".$line["Nombres"]."|".$line["Apellidos"]."|".$line["FechaNatal"]."|".$line["CI"]."|".$line["IdCargo"]."|".$line["IdCargo"]."|".$line["Region"]."|".$line["Sector"]."|".$line["SubSector"]."|".$line["Usuario"]."|".$line["Usuario"]."|".$line["IdNivel"]."|".$line["Puntaje"];
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
}
 
?>