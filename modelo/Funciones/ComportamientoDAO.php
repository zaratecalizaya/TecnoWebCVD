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
	
	   public function iscomportamientoexist($tabla, $id) {

        require_once 'modelo/Conexion/connectbd.php';
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
		
        if ($result = mysqli_query($link,"SELECT * from ".$tabla." WHERE Id = '".$id."'")) {

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
    public function addComportamiento($tabla,$datos) { //regusu et no es

      require_once 'modelo/Conexion/connectbd.php';
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
		
             //$clave = $datos["clave"];
          $result=mysqli_query($link,"INSERT INTO ".$tabla." (Nombre,Puntaje,IdGrupo,Estado,FActualizacion) VALUES('".$datos["nombre"]."','".$datos["puntaje"]."','".$datos["grupos"]."',1,now())");
          return $result;
      

    }


    public function updateComportamiento($tabla,$datos ){
  
      require_once 'modelo/Conexion/connectbd.php';
      // connecting to database
      $this->db = new DB_Connect();
      $link=$this->db->connect();
  
      $pu=$this->iscomportamientoexist($tabla, $datos["id"]);
      if($pu==true){
        
          $result=mysqli_query($link,"UPDATE ".$tabla." SET Nombre ='".$datos["nombre"]."',Puntaje='".$datos["puntaje"]."' ,IdGrupo='".$datos["grupos"]."' ,FActualizacion = now() where comportamiento.IdGrupo=grupocomportamiento.IdGrupo and Id = ".$datos["id"]);
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
    
		$query = "SELECT c.Id,c.Nombre,c.Puntaje,gc.Nombre as Grupo,c.Estado,c.FActualizacion FROM grupocomportamiento as gc inner join comportamiento as c on gc.Id=c.Idgrupo ORDER BY c.id DESC ";
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
				array_push($json, array($line["Id"],$line["Nombre"],$line["Puntaje"],$line["Grupo"],$destado,$line["FActualizacion"]));
			}
			
		}
		
		mysqli_close($link);
		return $json;
		
	}







  
  public function updatestatuscomportamiento($tabla,$datos) { //regusu et no es

    require_once 'modelo/Conexion/connectbd.php';
      // connecting to database
      $this->db = new DB_Connect();
      $link=$this->db->connect();
  
    
        $result=mysqli_query($link,"UPDATE ".$tabla." SET estado=ABS(estado-1) where id = ".$datos["id"]);
        return $result;
    
  }  

 
  




 

  public function listGrupos(){
		require_once 'modelo/Conexion/connectbd.php';
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
		
        $query = "SELECT Id,Nombre FROM grupocomportamiento order by Nombre";
        $result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error($link));

        $json = array();
        //$json =mysqli_num_rows($result);
        if(mysqli_num_rows($result)>0){
        		//$json['cliente'][]=nada;
        	while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
          	array_push($json, array($line["Id"],$line["Nombre"]));
          }
			
        }
		
		mysqli_close($link);
		return $json;
		
	}


  public function listGrupo($idGrupo){
    require_once 'modelo/Conexion/connectbd.php';
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
    
        $query = "SELECT Id,Nombre FROM grupocomportamiento gp inner join comportamiento c on gp.id=c.IdGrupo WHERE c.IdGrupo = ".$idGrupo." order by Nombre";
        $result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error($link));

        $json = array();
        //$json =mysqli_num_rows($result);
        if(mysqli_num_rows($result)>0){
            //$json['cliente'][]=nada;
          while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            array_push($json, array($line["Id"],$line["Nombre"]));
          }
      
        }
    
    mysqli_close($link);
    return $json;
    
  }








  
}
 
?>
