<?php
 
class ConfiguracionDAO {
 
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
    public function addEmail($tabla,$datos) { //regusu et no es

      require_once 'modelo/Conexion/connectbd.php';
      // connecting to database
      $this->db = new DB_Connect();
      $link=$this->db->connect();

        $clavede="EmailDe";
        $clavepara="EmailPara";  
        
      
        $sw=$this->isclaveexist($tabla,$clavede);
      if($sw==true ){
        $result=mysqli_query($link,"UPDATE ".$tabla." SET Valor ='".$datos["EmailDe"]."' where Clave='".$clavede."'");        

     }else{

        $result=mysqli_query($link,"INSERT INTO ".$tabla." (Clave,Valor) VALUES('".$clavede."','".$datos["EmailDe"]."')");
        
     } 
     

      $sw1=$this->isclaveexist($tabla,$clavepara);
     if($sw1==true){
        $result=mysqli_query($link,"UPDATE ".$tabla." SET Valor ='".$datos["EmailPara"]."' where Clave='".$clavepara."'");        

     }else{

        $result=mysqli_query($link,"INSERT INTO ".$tabla." (Clave,Valor) VALUES('".$clavepara."','".$datos["EmailPara"]."')");
        
     } 

      
             
          return $result;
    }
 

    public function isclaveexist($tabla, $clave) {

        require_once 'modelo/Conexion/connectbd.php';
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
		
        if ($result = mysqli_query($link,"SELECT * from ".$tabla." WHERE Clave = '".$clave."'")) {

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
 
 


    
    
  
}
 
?>