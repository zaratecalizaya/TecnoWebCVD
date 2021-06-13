<?php
 
class GrupoComportamientoDAO {
 
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
	
	 
    /**
     * agregar nuevo usuarigrupoComportamiento
     */
    public function addGrupoComportamiento($tabla,$datos) { //regusu et no es

      require_once 'modelo/Conexion/connectbd.php';
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
		
             //$clave = $datos["clave"];
          $result=mysqli_query($link,"INSERT INTO ".$tabla." (Nombre,PuntajeMeta,Imagen,Estado,FActualizacion) VALUES('".$datos["nombre"]."','".$datos["puntajemeta"]."','".$datos["imagen"]."',1,now())");
          return $result;
      

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
 


    public function isgrupoexist($tabla, $id) {

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




    public function updateGrupo($tabla,$datos) { //regusu et no es

      require_once 'modelo/Conexion/connectbd.php';
      // connecting to database
      $this->db = new DB_Connect();
      $link=$this->db->connect();
  
      $pu=$this->isgrupoexist($tabla, $datos["id"]);
      if($pu==true){
        
          $result=mysqli_query($link,"UPDATE ".$tabla." SET Nombre = '".$datos["nombre"]."',PuntajeMeta='".$datos["puntajemeta"]."' ,FActualizacion = now() where id = ".$datos["id"]);
          return $result;
             
      }else{
        return false;
      }


    }






    public function listGrupo($idGrupo){
      require_once 'modelo/Conexion/connectbd.php';
          // connecting to database
          $this->db = new DB_Connect();
          $link=$this->db->connect();
      
          $query = "SELECT Id,Nombre FROM grupocomportamiento WHERE Id = ".$idGrupo." order by Nombre";
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



    public function updatestatusgrupo($tabla,$datos) { //regusu et no es

      require_once 'modelo/Conexion/connectbd.php';
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
		
      
          $result=mysqli_query($link,"UPDATE ".$tabla." SET estado=ABS(estado-1) where id = ".$datos["id"]);
          return $result;
      
    }


    public function listGrupoComportamiento($pagina,$cantidad){
      require_once 'modelo/Conexion/connectbd.php';
          // connecting to database
          $this->db = new DB_Connect();
          $link=$this->db->connect();
      //$json=$cuenta;
      
    
      $query = "SELECT Id,Nombre,PuntajeMeta,Imagen,Estado,FActualizacion FROM grupocomportamiento ";
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
          array_push($json, array($line["Id"],$line["Nombre"],$line["PuntajeMeta"],$line["Imagen"],$destado,$line["FActualizacion"]));
        }
        
      }
      
      mysqli_close($link);
      return $json;
      
    }
    
  
}
 
?>