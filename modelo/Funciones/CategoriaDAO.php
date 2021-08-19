<?php
 
class CategoriaDAO {
 
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

    
    public function addCategoria($tabla,$datos) { //regusu et no es

      require_once 'modelo/Conexion/connectbd.php';
      //require_once 'modelo/utilitario.php';
      //$mutil = new Utils();
      //$mutil -> console_log('Entro AddMovil');
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
        //$mutil -> console_log('is user:'.$pu);
        
      		$json = array();
              $consulta ="INSERT INTO ".$tabla." (nombre,tipo) VALUES('".$datos["nombre"]."','".$datos["tipo"]."')";
           
              $result=mysqli_query($link,$consulta);
              if ($result ==true){
                return "true";
              }else {
                return "Error al guardar categoria";
              }
            
    }

    public function iscategoria($tabla, $id) {

      require_once 'modelo/Conexion/connectbd.php';
      // connecting to database
      $this->db = new DB_Connect();
      $link=$this->db->connect();
  
      if ($result = mysqli_query($link,"SELECT * from ".$tabla." WHERE id_categoria = '".$id."'")) {

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
     

    
    public function updateCategoria($tabla,$datos) { //regusu et no es

      require_once 'modelo/Conexion/connectbd.php';
      // connecting to database
      $this->db = new DB_Connect();
      $link=$this->db->connect();
  
      $pu=$this->isalmacenexist($tabla, $datos["id"]);
      if($pu==true){
        
          $result=mysqli_query($link,"UPDATE ".$tabla." SET nombre ='".$datos["nombre"]."'   where id_categoria = ".$datos["id"]);
          return $result;
             
      }else{
        return false;
      }
    }
    
    public function listCategoria(){
      require_once 'modelo/Conexion/connectbd.php';
          // connecting to database
          $this->db = new DB_Connect();
          $link=$this->db->connect();
      //$json=$cuenta;
      
      $query = "SELECT id_categoria, nombre FROM categoria   ";
      $result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error($link));
  
      $json = array();
      //$json =mysqli_num_rows($result);
      if(mysqli_num_rows($result)>0){
          //$json['cliente'][]=nada;
        while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        
        
            array_push($json, array($line["id_categoria"],$line["nombre"]));
        }
        
      }
      
      mysqli_close($link);
      return $json;
      
    }

    

    public function idVehiculo($marca,$modelo,$año){
      require_once 'modelo/Conexion/connectbd.php';
          // connecting to database
          $this->db = new DB_Connect();
          $link=$this->db->connect();
         
          
     
          //$json=$cuenta;
      $query = "SELECT id_vehiculo FROM vehiculo where marca=".$marca."and modelo=".$modelo." and año=".$año."";
      $result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error($link));
  
     
      //$json =mysqli_num_rows($result);
      if(mysqli_num_rows($result)>0){
          //$json['cliente'][]=nada;
     
          while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        
         $primary=$line["id_vehiculo"];
            
        }
        
      }
      
      mysqli_close($link);
      return $primary;
       
    }



    public function idcategoria($categoria){
      require_once 'modelo/Conexion/connectbd.php';
          // connecting to database
          $this->db = new DB_Connect();
          $link=$this->db->connect();
         
          
     
          //$json=$cuenta;
      $query = "SELECT id_categoria FROM categoria where nombre=".$categoria."";
      $result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error($link));
  
     
      //$json =mysqli_num_rows($result);
      if(mysqli_num_rows($result)>0){
          //$json['cliente'][]=nada;
     
          while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        
         $categoriaid=$line["id_categoria"];
            
        }
        
      }
      
      mysqli_close($link);
      return $categoriaid;
       
    }



    public function listCategoriadetalle(){
      require_once 'modelo/Conexion/connectbd.php';
          // connecting to database
          $this->db = new DB_Connect();
          $link=$this->db->connect();
      //$json=$cuenta;

      
      
      $query = "SELECT cv.id_categoria,cv.id_vehiculo,c.nombre,c.tipo,descripcion,v.marca,v.modelo,v.año FROM categoria as c inner join categoria_vehiculo cv on  cv.id_categoria=c.id_categoria inner join vehiculo v on cv.id_vehiculo=v.id_vehiculo ";
      $result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error($link));
  
      $json = array();
      //$json =mysqli_num_rows($result);
      if(mysqli_num_rows($result)>0){
          //$json['cliente'][]=nada;
        while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        
        
            array_push($json, array($line["id_categoria"],$line["id_vehiculo"],$line["nombre"],$line["tipo"],$line["descripcion"],$line["marca"],$line["modelo"],$line["año"]));
        }
        
      }
      
      mysqli_close($link);
      return $json;
      
    }




    public function listAlmacen($pagina,$cantidad){
      require_once 'modelo/Conexion/connectbd.php';
          // connecting to database
          $this->db = new DB_Connect();
          $link=$this->db->connect();
      //$json=$cuenta;
      
      $query = "SELECT id_almacen, nombre FROM almacen   ";
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
  
    public function addCategoriadetalle($datos) { //regusu et no es

      require_once 'modelo/Conexion/connectbd.php';
      //require_once 'modelo/utilitario.php';
      //$mutil = new Utils();
      //$mutil -> console_log('Entro AddMovil');
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
        //$mutil -> console_log('is user:'.$pu);
        
      		$json = array();
          $consulta ="INSERT INTO categoria_vehiculo (descripcion,id_categoria,id_vehiculo) VALUES('".$datos["descripcion"]."','".$datos["categoria"]."','".$datos["sector"]."')";
              $result=mysqli_query($link,$consulta);
              if ($result ==true){
                return "true";
              }else {
                return "";
              }
            
    }
    


   
      

    
  
}
 
 
 
 
?>
