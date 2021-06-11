<?php
 
class ComportamientoDAO {
 
    private $db;
    // constructor

    function __construct() {
        require_once 'modelo/Conexion/connectbd.php';
        // connecting to database

        $this->db = new DB_Connect();
        $this->db->connect();

    }
 
    // destructor
    function __destruct() {
 
    }
	
	   public function isuserexist($tabla, $username) {

        require_once 'modelo/Conexion/connectbd.php';
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
 
    /**
     * agregar nuevo usuario
     */
    public function adduserWeb($tabla,$datos) { //regusu et no es

      require_once 'modelo/Conexion/connectbd.php';
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
		
      	$pu=$this->isuserexist($tabla, $datos["usuario"]);
        if($pu==false){
          $clave = md5($datos["clave"]);
          //$clave = $datos["clave"];
          $result=mysqli_query($link,"INSERT INTO ".$tabla." (Nombre,Usuario,Clave,Estado) VALUES('".$datos["nombre"]."','".$datos["usuario"]."','".$clave."',1)");
          return $result;
      	}else{
      		return "el usuario ya existe";
      	}

    }
 
 /**
     * agregar nuevo usuario
     */
    public function updateuserWeb($tabla,$datos) { //regusu et no es

      require_once 'modelo/Conexion/connectbd.php';
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
		
      	$pu=$this->isuserexist($tabla, $datos["usuario"]);
        if($pu==true){
          if ($datos["clave"]==""){
            $result=mysqli_query($link,"UPDATE ".$tabla." SET Nombre = '".$datos["nombre"]."',Usuario='".$datos["usuario"]."' ,FActualizacion = now() where id = ".$datos["id"]);
            return $result;
          }else{
            $clave = md5($datos["clave"]);
            $result=mysqli_query($link,"UPDATE ".$tabla." SET Nombre = '".$datos["nombre"]."',Usuario='".$datos["usuario"]."' ,Clave ='".$clave."',FActualizacion = now() where id = ".$datos["id"]);
            return $result;
          }          
      	}else{
      		return false;
      	}

    }
 
    public function updatestatususerWeb($tabla,$datos) { //regusu et no es

      require_once 'modelo/Conexion/connectbd.php';
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
		
      	$pu=$this->isuserexist($tabla, $datos["usuario"]);
        if($pu==true){
          $result=mysqli_query($link,"UPDATE ".$tabla." SET estado=ABS(estado-1) where id = ".$datos["id"]);
          return $result;
      	}else{
      		return false;
      	}

    }
	
	public function listComportamientos($pagina,$cantidad){
		require_once 'modelo/Conexion/connectbd.php';
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
		//$json=$cuenta;
    
		$query = "SELECT Id,Nombre,Puntaje,IdGrupo,Estado,FActualizacion FROM comportamiento ";
		$result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error($link));

		$json = array();
		//$json =mysqli_num_rows($result);
		if(mysqli_num_rows($result)>0){
				//$json['cliente'][]=nada;
			while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $destado ="Deshabilitado";
                if ($line["Estado"]==1){
                    $destado ="Habilitado";
                }        
				array_push($json, array($line["Id"],$line["Nombre"],$line["Puntaje"],$line["IdGrupo"],$destado,$line["FActualizacion"]));
			}
			
		}
		
		mysqli_close($link);
		return $json;
		
	}

  public function addcomportamiento($tabla,$datos) { //añadiendo comportamiento

    require_once 'modelo/Conexion/connectbd.php';
    require_once 'modelo/utilitario.php';
    $mutil = new Utils();
    $mutil -> console_log('Entro Addcomportamiento');
      // connecting to database
      $this->db = new DB_Connect();
      $link=$this->db->connect();
            
            $consulta ="INSERT INTO ".$tabla." (Nombre, Puntaje, IdGrupo, IdCargo, CI, Region, Sector,SubSector, Usuario, Clave, Estado, IdNivel, Puntaje,Imagen,FActualizacion) VALUES('".$datos["Nombres"]."','".$datos["Apellidos"]."','".$datos["FechaNatal"]."','".$datos["Cargo"]."','".$datos["Ci"]."','".$datos["Region"]."','".$line["sector"]."','".$line["subsector"]."','".$datos["usuario"]."','".$clave."',0,1,0,'".$datos["Imagen"]."',now())";
            $result=mysqli_query($link,$consulta);
            if ($result ==true){
              return "true";
            }else {
              return "Error al guardar el usuario";
            }
          
    
        
        return "error al cargar la informacion de sectores";
        
      
  }
  




 

    










  
}
 
?>
