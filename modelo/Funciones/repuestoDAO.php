<?php
 
class RepuestoDAO {
 
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
 
    public function datedelete($tabla,$datos) { //regusu et no es

      require_once 'modelo/Conexion/connectbd.php';
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
		
          $result=mysqli_query($link,"DELETE from ".$tabla." where id = ".$datos["id"]);
    
    }


    public function addrepuesto($tabla,$datos) { //regusu et no es

      require_once 'modelo/Conexion/connectbd.php';
      require_once 'modelo/utilitario.php';
      $mutil = new Utils();
      
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
        
      	
        //$mutil -> console_log('is user:'.$pu);
        

      		$json = array();
      		
      			
      				
              $consulta ="INSERT INTO ".$tabla." (nombre,imagen,descripcion,marca,precio,estado,id_categoria,id_vehiculo) VALUES('".$datos["nombre"]."','".$datos["imagen"]."','".$datos["descripcion"]."','".$datos["marca"]."','".$datos["precio"]."',1,'".$datos["idcategoria"]."','".$datos["idvehiculo"]."')";
           
              $result=mysqli_query($link,$consulta);
              if ($result ==true){
                return "true";
              }else {
                return "Error al guardar el vehiculo";
              }
            
			
         

    }
	
  

    public function isrepuestoexist($tabla, $id) {

      require_once 'modelo/Conexion/connectbd.php';
      // connecting to database
      $this->db = new DB_Connect();
      $link=$this->db->connect();
  
      if ($result = mysqli_query($link,"SELECT * from ".$tabla." WHERE id_repuesto = '".$id."'")) {

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


   
  public function updaterepuesto($tabla,$datos) { //regusu et no es

    require_once 'modelo/Conexion/connectbd.php';
    // connecting to database
    $this->db = new DB_Connect();
    $link=$this->db->connect();

    $pu=$this->isrepuestoexist($tabla, $datos["id"]);
    if($pu==true){
      
        $result=mysqli_query($link,"UPDATE ".$tabla." SET nombre ='".$datos["nombre"]."',descripcion ='".$datos["descripcion"]."',marca ='".$datos["marca"]."',precio ='".$datos["precio"]."' where id_repuesto = ".$datos["id"]);
        return $result;
           
    }else{
      return false;
    }
  }


  public function listRepuesto($pagina,$cantidad){
    require_once 'modelo/Conexion/connectbd.php';
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
    //$json=$cuenta;
    
    $query = "SELECT r.id_repuesto,r.nombre as Nombres,r.descripcion,r.imagen,r.marca as repuesto,r.precio,r.id_categoria,r.id_vehiculo,c.nombre,v.marca,v.modelo,v.año,r.estado FROM categoria  c,vehiculo v,categoria_vehiculo cv,repuesto r where c.id_categoria=cv.id_categoria and v.id_vehiculo=cv.id_vehiculo and r.id_categoria=cv.id_categoria and r.id_vehiculo=cv.id_vehiculo";
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
      
        $fullvehiculo= $line["marca"]."".$line["modelo"]."".$line["año"];
          array_push($json, array($line["id_repuesto"],$line["Nombres"],$line["descripcion"],$line["imagen"],$line["repuesto"],$line["precio"],$line["id_categoria"],$line["id_vehiculo"],$line["nombre"],$fullvehiculo,$destado));
      }
      
    }
    
    mysqli_close($link);
    return $json;
    
  }
       
    public function addAlmacen($tabla,$datos) { //regusu et no es

      require_once 'modelo/Conexion/connectbd.php';
      //require_once 'modelo/utilitario.php';
      //$mutil = new Utils();
      //$mutil -> console_log('Entro AddMovil');
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
        
      	
        //$mutil -> console_log('is user:'.$pu);
        

      		$json = array();
      		
      			
      				
              $consulta ="INSERT INTO ".$tabla." (nombre) VALUES('".$datos["nombre"]."')";
           
              $result=mysqli_query($link,$consulta);
              if ($result ==true){
                return "true";
              }else {
                return "Error al guardar el almacen";
              }
            
			
         

    }

    
       
	   public function isalmacenexist($tabla, $id) {

      require_once 'modelo/Conexion/connectbd.php';
      // connecting to database
      $this->db = new DB_Connect();
      $link=$this->db->connect();
  
      if ($result = mysqli_query($link,"SELECT * from ".$tabla." WHERE id_almacen = '".$id."'")) {

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


    public function updateAlmacen($tabla,$datos) { //regusu et no es

      require_once 'modelo/Conexion/connectbd.php';
      // connecting to database
      $this->db = new DB_Connect();
      $link=$this->db->connect();
  
      $pu=$this->isalmacenexist($tabla, $datos["id"]);
      if($pu==true){
        
          $result=mysqli_query($link,"UPDATE ".$tabla." SET nombre ='".$datos["nombre"]."'   where id_almacen = ".$datos["id"]);
          return $result;
             
      }else{
        return false;
      }
    }
 
    public function listAlmacen($pagina,$cantidad){
      require_once 'modelo/Conexion/connectbd.php';
          // connecting to database
          $this->db = new DB_Connect();
          $link=$this->db->connect();
      //$json=$cuenta;
      
      $query = "SELECT id_almacen,nombre FROM almacen   ";
      $result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error($link));
  
      $json = array();
      //$json =mysqli_num_rows($result);
      if(mysqli_num_rows($result)>0){
          //$json['cliente'][]=nada;
        while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        
        
            array_push($json, array($line["id_almacen"],$line["nombre"]));
        }
        
      }
      
      mysqli_close($link);
      return $json;
      
    }


    public function addMedida($tabla,$datos) { //regusu et no es

      require_once 'modelo/Conexion/connectbd.php';
      //require_once 'modelo/utilitario.php';
      //$mutil = new Utils();
      //$mutil -> console_log('Entro AddMovil');
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
        
      	
        //$mutil -> console_log('is user:'.$pu);
        

      		$json = array();
      		
      			
      				
              $consulta ="INSERT INTO ".$tabla." (nombre) VALUES('".$datos["nombre"]."')";
           
              $result=mysqli_query($link,$consulta);
              if ($result ==true){
                return "true";
              }else {
                return "Error al guardar el almacen";
              }
            
			
         

    }

    
       
	   public function ismedidaexist($tabla, $id) {

      require_once 'modelo/Conexion/connectbd.php';
      // connecting to database
      $this->db = new DB_Connect();
      $link=$this->db->connect();
  
      if ($result = mysqli_query($link,"SELECT * from ".$tabla." WHERE id_almacen = '".$id."'")) {

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


    public function updateMedida($tabla,$datos) { //regusu et no es

      require_once 'modelo/Conexion/connectbd.php';
      // connecting to database
      $this->db = new DB_Connect();
      $link=$this->db->connect();
  
      $pu=$this->ismedidaexist($tabla, $datos["id"]);
      if($pu==true){
        
          $result=mysqli_query($link,"UPDATE ".$tabla." SET nombre ='".$datos["nombre"]."'   where id_unidad = ".$datos["id"]);
          return $result;
             
      }else{
        return false;
      }
    }
 
    public function listMedida($pagina,$cantidad){
      require_once 'modelo/Conexion/connectbd.php';
          // connecting to database
          $this->db = new DB_Connect();
          $link=$this->db->connect();
      //$json=$cuenta;
      
      $query = "SELECT id_almacen,nombre FROM unidad_medida   ";
      $result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error($link));
  
      $json = array();
      //$json =mysqli_num_rows($result);
      if(mysqli_num_rows($result)>0){
          //$json['cliente'][]=nada;
        while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        
        
            array_push($json, array($line["id_almacen"],$line["nombre"]));
        }
        
      }
      
      mysqli_close($link);
      return $json;
      
    }



    public function Capturandodatos($idcategoria,$idvehiculo){
      require_once 'modelo/Conexion/connectbd.php';
          // connecting to database
          $this->db = new DB_Connect();
          $link=$this->db->connect();
      //$json=$cuenta;
      
      $query = "SELECT c.nombre,v.marca,v.modelo,v.año FROM categoria as c inner join categoria_vehiculo cv on cv.id_categoria=c.id_categoria inner join vehiculo v on cv.id_vehiculo=v.id_vehiculo where cv.id_categoria='".$idcategoria."' and cv.id_vehiculo='".$idvehiculo."'";
      $result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error($link));
  
      $json = array();
      //$json =mysqli_num_rows($result);
      if(mysqli_num_rows($result)>0){
          //$json['cliente'][]=nada;
        while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
              $fullvehiculo= $line["marca"]."".$line["modelo"]."".$line["año"];     
        
            array_push($json, array($line["nombre"],$fullvehiculo));
        }
        
      }
      
  
      mysqli_close($link);
      return  json_encode( $json);
      
    }
  
  

    public function updatestatusrepuesto($tabla,$id) { //regusu et no es

      require_once 'modelo/Conexion/connectbd.php';
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
    
      
        
        $pu=$this->isrepuestoexist($tabla, $id);
        if($pu==true){
          $result=mysqli_query($link,"UPDATE ".$tabla." SET estado=ABS(estado-1) where id_repuesto = ".$id);
          return $result;
      	}else{
      		return false;
      	}
      
    } 

    
    public function delete ($tabla,$datos) {
      require_once 'modelo/Conexion/connectbd.php';
      // connecting to database
      $this->db = new DB_Connect();
      $link=$this->db->connect(); 
      $result=mysqli_query($link,"DELETE from".$tabla."where id_repuesto = ".$datos["id"]);
      if(   $result){
          header("Location: Repuesto.php");
      } else{
          echo "Error a eliminar";
      }
     }

      
  
}
 
 
 
 
?>
