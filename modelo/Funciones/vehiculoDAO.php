<?php
 
class VehiculosDAO {
 
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
     



	
  
       
    public function addVehiculo($tabla,$datos) { //regusu et no es

      require_once 'modelo/Conexion/connectbd.php';
      require_once 'modelo/utilitario.php';
      $mutil = new Utils();
      $mutil -> console_log('Entro AddMovil');
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
        
      	
        //$mutil -> console_log('is user:'.$pu);
        

      		$json = array();
      		
      			
      				
              $consulta ="INSERT INTO ".$tabla." (marca, año, modelo, estado, imagen) VALUES('".$datos["marca"]."','".$datos["año"]."','".$datos["modelo"]."',1,'".$datos["imagen"]."')";
           
              $result=mysqli_query($link,$consulta);
              if ($result ==true){
                return "true";
              }else {
                return "Error al guardar el vehiculo";
              }
            
			
         

    }

    
       
	   public function isvehiculoexist($tabla, $id) {

      require_once 'modelo/Conexion/connectbd.php';
      // connecting to database
      $this->db = new DB_Connect();
      $link=$this->db->connect();
  
      if ($result = mysqli_query($link,"SELECT * from ".$tabla." WHERE id_vehiculo = '".$id."'")) {

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


    public function updateVehiculo($tabla,$datos) { //regusu et no es

      require_once 'modelo/Conexion/connectbd.php';
      // connecting to database
      $this->db = new DB_Connect();
      $link=$this->db->connect();
  
      $pu=$this->isvehiculoexist($tabla, $datos["id"]);
      if($pu==true){
        
          $result=mysqli_query($link,"UPDATE ".$tabla." SET marca ='".$datos["marca"]."',año='".$datos["año"]."' ,modelo='".$datos["modelo"]."'   where id_vehiculo = ".$datos["id"]);
          return $result;
             
      }else{
        return false;
      }
    }
 
    public function listVehiculo($pagina,$cantidad){
      require_once 'modelo/Conexion/connectbd.php';
          // connecting to database
          $this->db = new DB_Connect();
          $link=$this->db->connect();
      //$json=$cuenta;
      
      $query = "SELECT id_vehiculo,imagen,año,modelo,marca,estado FROM vehiculo   ";
      $result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error($link));
  
      $json = array();
      //$json =mysqli_num_rows($result);
      if(mysqli_num_rows($result)>0){
          //$json['cliente'][]=nada;
        while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
          $destado ="Deshabilitado";
          if ($line["estado"]==1){
              $destado ="Habilitado";
          }        
          array_push($json, array($line["id_vehiculo"],$line["imagen"],$line["año"],$line["modelo"],$line["marca"],$destado));
        }
        
      }
      
      mysqli_close($link);
      return $json;
      
    }


    public function listVehiculomarca(){
      require_once 'modelo/Conexion/connectbd.php';
          // connecting to database
          $this->db = new DB_Connect();
          $link=$this->db->connect();
      //$json=$cuenta;
      
      $query = "SELECT id_vehiculo,marca,modelo,año FROM vehiculo   ";
      $result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error($link));
  
      $json = array();
      //$json =mysqli_num_rows($result);
      if(mysqli_num_rows($result)>0){
          //$json['cliente'][]=nada;
        while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $full=$line["marca"]."   ".$line["modelo"]."   ".$line["año"];
          array_push($json, array($line["id_vehiculo"],$full));
        }
        
      }
      
      mysqli_close($link);
      return $json;
      
    }
  
    

    public function listVehiculomodelo(){
      require_once 'modelo/Conexion/connectbd.php';
          // connecting to database
          $this->db = new DB_Connect();
          $link=$this->db->connect();
      //$json=$cuenta;
      
      $query = "SELECT id_vehiculo,modelo FROM vehiculo   ";
      $result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error($link));
  
      $json = array();
      //$json =mysqli_num_rows($result);
      if(mysqli_num_rows($result)>0){
          //$json['cliente'][]=nada;
        while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                
          array_push($json, array($line["id_vehiculo"],$line["modelo"]));
        }
        
      }
      
      mysqli_close($link);
      return $json;
      
    }

    public function listVehiculoaño(){
      require_once 'modelo/Conexion/connectbd.php';
          // connecting to database
          $this->db = new DB_Connect();
          $link=$this->db->connect();
      //$json=$cuenta;
      
      $query = "SELECT id_vehiculo,año FROM vehiculo   ";
      $result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error($link));
  
      $json = array();
      //$json =mysqli_num_rows($result);
      if(mysqli_num_rows($result)>0){
          //$json['cliente'][]=nada;
        while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                
          array_push($json, array($line["id_vehiculo"],$line["año"]));
        }
        
      }
      
      mysqli_close($link);
      return $json;
      
    }


    public function updatestatusvehiculo($tabla,$datos) { //regusu et no es

      require_once 'modelo/Conexion/connectbd.php';
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
    
      
        
        $pu=$this->isvehiculoexist($tabla, $datos["id"]);
        if($pu==true){
          $result=mysqli_query($link,"UPDATE ".$tabla." SET estado=ABS(estado-1) where id_vehiculo = ".$datos["id"]);
          return $result;
      	}else{
      		return false;
      	}
      
    }  


    
     
  
  public function listModelo($idMarca){
		require_once 'modelo/Conexion/connectbd.php';
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
		
        $query = "SELECT modelo FROM vehiculo WHERE marca = ".$idMarca." order by Nombre";
        $result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error($link));

        $json = array();
        //$json =mysqli_num_rows($result);
        if(mysqli_num_rows($result)>0){
        		//$json['cliente'][]=nada;
        	while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
          	array_push($json, array($line["modelo"]));
          }
			
        }
		
		mysqli_close($link);
		return $json;
		
	}


  public function listaño($nombre){
		require_once 'modelo/Conexion/connectbd.php';
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
		
        $query = "SELECT año FROM vehiculo WHERE modelo = ".$nombre." order by Nombre";
        $result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error($link));

        $json = array();
        //$json =mysqli_num_rows($result);
        if(mysqli_num_rows($result)>0){
        		//$json['cliente'][]=nada;
        	while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
          	array_push($json, array($line["Nombre"]));
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
    $result=mysqli_query($link,"DELETE from".$tabla."where id_vehiculo = ".$datos["id"]);
    if(   $result){
        header("Location: Vehiculo.php");
    } else{
        echo "Error a eliminar";
    }
   }
    
      
  
}
 
 
 
 
?>
