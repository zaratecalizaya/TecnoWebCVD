<?php
 
class nota_compraDAO {
 
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


    public function datedelete($tabla,$datos) { //regusu et no es

      require_once 'modelo/Conexion/connectbd.php';
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
		
          $result=mysqli_query($link,"DELETE from ".$tabla." where id = ".$datos["id"]);
    
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
  
       
    public function addnota_compra($tabla,$datos) { //regusu et no es

      require_once 'modelo/Conexion/connectbd.php';
      require_once 'modelo/utilitario.php';
      $mutil = new Utils();
      $mutil -> console_log('Entro AddMovil');
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
        
      	
        //$mutil -> console_log('is user:'.$pu);
        

      		$json = array();
      		
      			
      				
              $consulta ="INSERT INTO ".$tabla." (fecha_compra, precio_total) VALUES('".$datos["fecha_compra"]."','".$datos["precio_total"]."')";
           
              $result=mysqli_query($link,$consulta);
              if ($result ==true){
                return "true";
              }else {
                return "Error al guardar el nota-compra";
              }
            
			
         

    }

    
       
	   public function isnota_compraexist($tabla, $id) {

      require_once 'modelo/Conexion/connectbd.php';
      // connecting to database
      $this->db = new DB_Connect();
      $link=$this->db->connect();
  
      if ($result = mysqli_query($link,"SELECT * from ".$tabla." WHERE id_marca = '".$id."'")) {

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


    public function updatenota_compra($tabla,$datos) { //regusu et no es

      require_once 'modelo/Conexion/connectbd.php';
      // connecting to database
      $this->db = new DB_Connect();
      $link=$this->db->connect();
  
      $pu=$this->isnota_compraexist($tabla, $datos["id"]);
      if($pu==true){
        
          $result=mysqli_query($link,"UPDATE ".$tabla." SET fecha_compra ='".$datos["fecha_compra"]."',precio_total='".$datos["precio_total"]."'    where id_compra = ".$datos["id"]);
          return $result;
             
      }else{
        return false;
      }
    }
 
    public function listnota_compra($pagina,$cantidad){
      require_once 'modelo/Conexion/connectbd.php';
          // connecting to database
          $this->db = new DB_Connect();
          $link=$this->db->connect();
      //$json=$cuenta;
      
      $query = "SELECT id_compra,fecha_compra,precio_total FROM nota_compra   ";
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
          array_push($json, array($line["id_compra"],$line["fecha_compra"],$line["precio_total"]));
        }
        
      }
      
      mysqli_close($link);
      return $json;
      
    }
  

    public function updatestatusnota_compra($tabla,$datos) { //regusu et no es

      require_once 'modelo/Conexion/connectbd.php';
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
    
      
        
        $pu=$this->isnota_compraexist($tabla, $datos["id"]);
        if($pu==true){
          $result=mysqli_query($link,"UPDATE ".$tabla." SET estado=ABS(estado-1) where id_compra = ".$datos["id"]);
          return $result;
      	}else{
      		return false;
      	}
      
    }  
  


      
  
}
 
 
 
 
?>
