<?php
 
class ProveedorDAO {
 
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





	
  
	
       
    public function addProveedor($tabla,$datos) { //regusu et no es

      require_once 'modelo/Conexion/connectbd.php';
      require_once 'modelo/utilitario.php';
      $mutil = new Utils();
      $mutil -> console_log('Entro AddMovil');
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
        
      	
        //$mutil -> console_log('is user:'.$pu);
        

      		$json = array();
      		
      			
      				
              $consulta ="INSERT INTO ".$tabla." (nit, razon_social, telefono,dirección, email) VALUES('".$datos["nit"]."','".$datos["razon_social"]."','".$datos["telefono"]."','".$datos["dirección"]."','".$datos["email"]."')";
           
              $result=mysqli_query($link,$consulta);
              if ($result ==true){
                return "true";
              }else {
                return "Error al guardar el proveedor";
              }
            
			
         

    }

    
       
	   public function isproveedorexist($tabla, $id) {

      require_once 'modelo/Conexion/connectbd.php';
      // connecting to database
      $this->db = new DB_Connect();
      $link=$this->db->connect();
  
      if ($result = mysqli_query($link,"SELECT * from ".$tabla." WHERE id_proveedor = '".$id."'")) {

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


    public function updateProveedor($tabla,$datos) { //regusu et no es

      require_once 'modelo/Conexion/connectbd.php';
      // connecting to database
      $this->db = new DB_Connect();
      $link=$this->db->connect();
  
      $pu=$this->isproveedorexist($tabla, $datos["id"]);
      if($pu==true){
        
          $result=mysqli_query($link,"UPDATE ".$tabla." SET nit ='".$datos["nit"]."',razon_social='".$datos["razon_social"]."' , telefono ='".$datos["telefono"]."', dirección ='".$datos["dirección"]."',email='".$datos["email"]."'    where id_proveedor = ".$datos["id"]);
          return $result;
             
      }else{
        return false;
      }
    }



    
    public function deleteempleado1 ($tabla,$datos) { //regusu et no es

      require_once 'modelo/Conexion/connectbd.php';
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
		
          $result=mysqli_query($link,"DELETE from ".$tabla." where id = ".$datos["id"]);
    
    }
 
    public function listProveedor($pagina,$cantidad){
      require_once 'modelo/Conexion/connectbd.php';
          // connecting to database
          $this->db = new DB_Connect();
          $link=$this->db->connect();
      //$json=$cuenta;
      
      $query = "SELECT id_proveedor,nit,razon_social,telefono,dirección,email FROM proveedor ";
      $result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error($link));
  
      $json = array();
      //$json =mysqli_num_rows($result);
      if(mysqli_num_rows($result)>0){
          //$json['cliente'][]=nada;
       while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
             // $destado ="Deshabilitado";
        //  if ($line["estado"]==1){
            // $destado ="Habilitado";
        // }        
          array_push($json, array($line["id_proveedor"],$line["nit"],$line["razon_social"],$line["telefono"],$line["dirección"],$line["email"]));
        }
        
      
      }
      mysqli_close($link);
      return $json;
      
    }

    
    public function delete ($tabla,$datos) {
      require_once 'modelo/Conexion/connectbd.php';
      // connecting to database
      $this->db = new DB_Connect();
      $link=$this->db->connect(); 
      $result=mysqli_query($link,"DELETE from".$tabla."where id_proveedor = ".$datos["id"]);
      if(   $result){
          header("Location: Proveedor.php");
      } else{
          echo "Error a eliminar";
      }
     }


      
  
}
 
 
 
 
?>
