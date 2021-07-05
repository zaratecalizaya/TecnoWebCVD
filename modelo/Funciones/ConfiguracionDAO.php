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
     if($result==false ){
       return false;
     }

      $swt=$this->isclaveexist($tabla,$clavepara);
     if($swt==true){
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
 
 
    public function listconfiguraciones($pagina,$cantidad){
      require_once 'modelo/Conexion/connectbd.php';
          // connecting to database
          $this->db = new DB_Connect();
          $link=$this->db->connect();
      //$json=$cuenta;
      
    
      $query = "SELECT Id,Clave,Valor FROM configuracion ";
      $result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error($link));
    
      $json = array();
      //$json =mysqli_num_rows($result);
      if(mysqli_num_rows($result)>0){
          //$json['cliente'][]=nada;
        while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
          
          array_push($json, array($line["Id"],$line["Clave"],$line["Valor"]));
        }
        
      }
      
      mysqli_close($link);
      return $json;
      
    }


    
    
  
}
 
?>