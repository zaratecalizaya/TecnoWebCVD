<?php
 
class EmpleadoDAO {
 
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
     * agregar nuevo usuario
     */

     public function datedelete ($tabla,$datos) {
      require_once 'modelo/Conexion/connectbd.php';
      // connecting to database
      $this->db = new DB_Connect();
      $link=$this->db->connect(); 
      $result=mysqli_query($link,"DELETE from".$tabla."where id = ".$datos["id"]);
     }
    public function updatestatususer($tabla,$datos) { //regusu et no es

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





	
  
	public function getusuario($Nick){
		require_once 'modelo/Conexion/connectbd.php';
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
		$query = "SELECT * FROM EFUsuario where Nick='".$Nick."'";
		$result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error());

		$json = array();
		if(mysqli_num_rows($result)>0){
			while ($line = mysqli_fetch_array($result, MYSQL_ASSOC)) {
				$json['usuario'][]=$line;
			}
			
		}
		
		mysqli_close($link);
		return json_encode($json);
		
	}
  
       
    public function addEmpleado($tabla,$datos) { //regusu et no es

      require_once 'modelo/Conexion/connectbd.php';
      require_once 'modelo/utilitario.php';
      $mutil = new Utils();
      $mutil -> console_log('Entro AddMovil');
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
        
      	
        //$mutil -> console_log('is user:'.$pu);
        

      		$json = array();
      		
      			
      				
              $consulta ="INSERT INTO ".$tabla." (ci, nombre, paterno, materno, telefono, email ,direccion, cargo) VALUES('".$datos["ci"]."','".$datos["nombre"]."','".$datos["paterno"]."','".$datos["materno"]."','".$datos["telefono"]."','".$datos["email"]."','".$datos["direccion"]."','".$datos["cargo"]."')";
           
              $result=mysqli_query($link,$consulta);
              if ($result ==true){
                return "true";
              }else {
                return "Error al guardar el empleado";
              }
            
			
         

    }

    
       
	   public function isempleadoexist($tabla, $id) {

      require_once 'modelo/Conexion/connectbd.php';
      // connecting to database
      $this->db = new DB_Connect();
      $link=$this->db->connect();
  
      if ($result = mysqli_query($link,"SELECT * from ".$tabla." WHERE id_empleado = '".$id."'")) {

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


    public function updateEmpleado($tabla,$datos) { //regusu et no es

      require_once 'modelo/Conexion/connectbd.php';
      // connecting to database
      $this->db = new DB_Connect();
      $link=$this->db->connect();
  
      $pu=$this->isempleadoexist($tabla, $datos["id"]);
      if($pu==true){
        
          $result=mysqli_query($link,"UPDATE ".$tabla." SET ci ='".$datos["ci"]."',nombre='".$datos["nombre"]."' ,paterno='".$datos["paterno"]."',materno='".$datos["materno"]."', telefono ='".$datos["telefono"]."',email='".$datos["email"]."' ,direccion='".$datos["direccion"]."',cargo='".$datos["cargo"]."'   where id_empleado = ".$datos["id"]);
          return $result;
             
      }else{
        return false;
      }
    }

    public function deleteEmpleado($tabla,$datos) { 
        $this->db = new DB_Connect();
        $link=$this->db->connect();
        $result="delete from empleado where id_empleado=$this->id_empleado";
		
		if(parent::ejecutar($sql))
			return true;
		else
			return false;
    }


    
    public function deleteempleado1 ($tabla,$datos) { //regusu et no es

      require_once 'modelo/Conexion/connectbd.php';
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
		
          $result=mysqli_query($link,"DELETE from ".$tabla." where id = ".$datos["id"]);
    
    }
 
    public function listEmpleado($pagina,$cantidad){
      require_once 'modelo/Conexion/connectbd.php';
          // connecting to database
          $this->db = new DB_Connect();
          $link=$this->db->connect();
      //$json=$cuenta;
      
      $query = "SELECT id_empleado,ci,nombre,paterno,materno,telefono,email,direccion,cargo FROM empleado   ";
      $result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error($link));
  
      $json = array();
      //$json =mysqli_num_rows($result);
      if(mysqli_num_rows($result)>0){
          //$json['cliente'][]=nada;
        while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
         // $destado ="Deshabilitado";
         // if ($line["estado"]==1){
           //   $destado ="Habilitado";
        //  }        
          array_push($json, array($line["id_empleado"],$line["ci"],$line["nombre"],$line["paterno"],$line["materno"],$line["telefono"],$line["email"],$line["direccion"],$line["cargo"]));
        }
        
      }
      
      mysqli_close($link);
      return $json;
      
    }
  

    public function updatestatusempleado($tabla,$datos) { //regusu et no es

      require_once 'modelo/Conexion/connectbd.php';
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
    
      
        
        $pu=$this->isempleadoexist($tabla, $datos["id"]);
        if($pu==true){
          $result=mysqli_query($link,"UPDATE ".$tabla." SET estado=ABS(estado-1) where id_vehiculo = ".$datos["id"]);
          return $result;
      	}else{
      		return false;
      	}
      
    }  


  //  public function eliminar(Request $datos){
    //    $obj = Empleado::findOrFail($datos->id);
      //  $obj->delete();
    //}
  


      
  
}
 
 
 
 
?>
