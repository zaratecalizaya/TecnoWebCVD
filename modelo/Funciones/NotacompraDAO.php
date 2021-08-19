<?php
 
class NotacompraDAO {
 
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





	
  
	
       
    public function addNotacompra($tabla,$datos) { //regusu et no es

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
                return "Error al guardar el Notacompra";
              }
            
			
         

    }

    
       
	   public function isnotacompraexist($tabla, $id) {

      require_once 'modelo/Conexion/connectbd.php';
      // connecting to database
      $this->db = new DB_Connect();
      $link=$this->db->connect();
  
      if ($result = mysqli_query($link,"SELECT * from ".$tabla." WHERE id_compra = '".$id."'")) {

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


    public function updateNotacompra($tabla,$datos) { //regusu et no es

      require_once 'modelo/Conexion/connectbd.php';
      // connecting to database
      $this->db = new DB_Connect();
      $link=$this->db->connect();
  
      $pu=$this->isnotacompraexist($tabla, $datos["id"]);
      if($pu==true){
        
          $result=mysqli_query($link,"UPDATE ".$tabla." SET fecha_compra ='".$datos["fecha_compra"]."',precio_total='".$datos["precio_total"]."'     where id_compra = ".$datos["id"]);
          return $result;
             
      }else{
        return false;
      }
    }

    public function deleteNotacompra($tabla,$datos) { 
        $this->db = new DB_Connect();
        $link=$this->db->connect();
        $result="delete from nota_compra where id_compra=$this->id_compra";
		
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
 
    public function listNotacompra($pagina,$cantidad){
      require_once 'modelo/Conexion/connectbd.php';
          // connecting to database
          $this->db = new DB_Connect();
          $link=$this->db->connect();
      //$json=$cuenta;
      
      $query = "SELECT id_fecha_compra,precio_total FROM nota_compra ";
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
          array_push($json, array($line["id_compra"],$line["fecha_compra"],$line["precio_total"]));
        }
        
      
      }
      mysqli_close($link);
      return $json;
      
    }
  

    


  //  public function eliminar(Request $datos){
    //    $obj = Empleado::findOrFail($datos->id);
      //  $obj->delete();
    //}
  


      
  
}
 
 
 
 
?>
