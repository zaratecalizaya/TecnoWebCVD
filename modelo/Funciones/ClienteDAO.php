<?php
 
class ClienteDAO {
 
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
	
    

    public function datedelete($tabla,$datos) { //regusu et no es

      require_once 'modelo/Conexion/connectbd.php';
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
		
          $result=mysqli_query($link,"DELETE from ".$tabla." where id = ".$datos["id"]);
    
    }



	
  
	
       
    public function addCliente($tabla,$datos) { //regusu et no es

      require_once 'modelo/Conexion/connectbd.php';
      require_once 'modelo/utilitario.php';
      $mutil = new Utils();
      //$mutil -> console_log('Entro AddMovil');
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
        
      		$json = array();
      					
              $consulta ="INSERT INTO ".$tabla." (nit, nombre, paterno, materno,email,telefono,direccion) VALUES('".$datos["nit"]."','".$datos["nombre"]."','".$datos["paterno"]."','".$datos["materno"]."','".$datos["email"]."','".$datos["telefono"]."','".$datos["direccion"]."')";
           
              $result=mysqli_query($link,$consulta);
              if ($result ==true){
                return "true";
              }else {
                return "Error al guardar cliente";
              }
            
    }

    
       
	   public function isclienteexist($tabla, $id) {

      require_once 'modelo/Conexion/connectbd.php';
      // connecting to database
      $this->db = new DB_Connect();
      $link=$this->db->connect();
  
      if ($result = mysqli_query($link,"SELECT * from ".$tabla." WHERE id_cliente = '".$id."'")) {

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


    public function updateCliente($tabla,$datos) { //regusu et no es

      require_once 'modelo/Conexion/connectbd.php';
      // connecting to database
      $this->db = new DB_Connect();
      $link=$this->db->connect();
  
      $pu=$this->isclienteexist($tabla, $datos["id"]);
      if($pu==true){
        
          $result=mysqli_query($link,"UPDATE ".$tabla." SET nit ='".$datos["nit"]."',nombre='".$datos["nombre"]."' ,paterno='".$datos["materno"]."',email='".$datos["email"]."',telefono='".$datos["telefono"]."',direccion='".$datos["direccion"]."'   where id_cliente = ".$datos["id"]);
          return $result;
             
      }else{
        return false;
      }
    }
 
    public function listCliente($pagina,$cantidad){
      require_once 'modelo/Conexion/connectbd.php';
          // connecting to database
          $this->db = new DB_Connect();
          $link=$this->db->connect();
      //$json=$cuenta;
      
      $query = "SELECT id_cliente, nit, nombre,paterno,materno,email,telefono,direccion FROM cliente";
      $result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error($link));
  
      $json = array();
      //$json =mysqli_num_rows($result);
      if(mysqli_num_rows($result)>0){
          //$json['cliente'][]=nada;
        while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                
          array_push($json, array($line["id_cliente"],$line["nit"],$line["nombre"],$line["paterno"],$line["materno"],$line["email"],$line["telefono"],$line["direccion"]));
        }
        
      }
      
      mysqli_close($link);
      return $json;
      
    }


    public function listClienteSelect(){
      require_once 'modelo/Conexion/connectbd.php';
          // connecting to database
          $this->db = new DB_Connect();
          $link=$this->db->connect();
      //$json=$cuenta;
      
      $query = "SELECT id_cliente,  nombre,paterno,materno FROM cliente";
      $result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error($link));
  
      $json = array();
      //$json =mysqli_num_rows($result);
      if(mysqli_num_rows($result)>0){
          //$json['cliente'][]=nada;
        while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
          $full= $line["nombre"]."  ".$line["paterno"]."   ".$line["materno"];  
                
          array_push($json, array($line["id_cliente"],$full));
        }
        
      }
      
      mysqli_close($link);
      return $json;
      
    }


  

    


      
  
}
 
 
 
 
?>
