<?php
 
class LogrosDAO {
 
    private $db;
    // constructor

    function __construct() {
        require_once 'modelo/Conexion/connectbd.php';
        // connecting to database

        $this->db = new DB_Connect();
        $this->db->connect();

    }
 

   
	
	  public function isuserexist($tabla, $username) {

        require_once 'modelo/Conexion/connectbd.php';
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
		
        if ($result = mysqli_query($link,"SELECT * from ".$tabla." WHERE Usuario = '".$username."'")) {

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
 
    /**
     * agregar nuevo usuario
     */
    public function adduserWeb($tabla,$datos) { //regusu et no es

      require_once 'modelo/Conexion/connectbd.php';
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
		
      	$pu=$this->isuserexist($tabla, $datos["usuario"]);
        if($pu==false){
          $clave = md5($datos["clave"]);
          //$clave = $datos["clave"];
          $result=mysqli_query($link,"INSERT INTO ".$tabla." (Nombre,Usuario,Clave,Estado) VALUES('".$datos["nombre"]."','".$datos["usuario"]."','".$clave."',1)");
          return $result;
      	}else{
      		return "el usuario ya existe";
      	}

    }
 
 /**
     * agregar nuevo usuario
     */
    public function updateuserWeb($tabla,$datos) { //regusu et no es

      require_once 'modelo/Conexion/connectbd.php';
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
		
      	$pu=$this->isuserexist($tabla, $datos["usuario"]);
        if($pu==true){
          if ($datos["clave"]==""){
            $result=mysqli_query($link,"UPDATE ".$tabla." SET Nombre = '".$datos["nombre"]."',Usuario='".$datos["usuario"]."' ,FActualizacion = now() where id = ".$datos["id"]);
            return $result;
          }else{
            $clave = md5($datos["clave"]);
            $result=mysqli_query($link,"UPDATE ".$tabla." SET Nombre = '".$datos["nombre"]."',Usuario='".$datos["usuario"]."' ,Clave ='".$clave."',FActualizacion = now() where id = ".$datos["id"]);
            return $result;
          }          
      	}else{
      		return false;
      	}

    }
 
    public function updatestatususerWeb($tabla,$datos) { //regusu et no es

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
	
	public function listLogros($pagina,$cantidad){
		require_once 'modelo/Conexion/connectbd.php';
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
		//$json=$cuenta;
    
		$query = "SELECT Id,Nombre,Descripcion,Estado,Experiencia,FActualizacion FROM logro ";
		$result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error($link));

		$json = array();
		//$json =mysqli_num_rows($result);
		if(mysqli_num_rows($result)>0){
				//$json['cliente'][]=nada;
			while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $destado ="Deshabilitado";
                if ($line["Estado"]==1){
                    $destado ="Habilitado";
                }        
				array_push($json, array($line["Id"],$line["Nombre"],$line["Descripcion"],$destado,$line["Experiencia"],$line["FActualizacion"]));
			}
			
		}
		
		mysqli_close($link);
		return $json;
		
	}
    
    public function listLogrosUsuario($pagina,$cantidad){
		  require_once 'modelo/Conexion/connectbd.php';
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
	      	//$json=$cuenta;
     
	  	$query = "SELECT lu.Id,lu.Comentario ,lu.Estado,lu.IdColega,lu.IdLogro,lu.IdUsuario,lu.FActualizacion, uc.Usuario as Colega, us.Usuario as Usuario
                    FROM logrousuario lu inner join logro l on l.id=lu.IdLogro
                    inner join usuarios uc on uc.id=lu.IdColega
                    inner join usuarios us on us.id=lu.IdUsuario";
	  	$result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error($link));

	  	$json = array();
	   	//$json =mysqli_num_rows($result);
		 if(mysqli_num_rows($result)>0){
				//$json['cliente'][]=nada;
		  	while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $destado ="Deshabilitado";
                if ($line["Estado"]==1){
                    $destado ="Habilitado";
                }        
				array_push($json, array($line["Id"],$line["Nombre"],$line["Descripcion"],$destado,$line["Experiencia"],$line["FActualizacion"]));
			}
			
		 }
  
	  	mysqli_close($link);
		 return $json;
	 	
	 }




    
  
  
  public function contarLogros(){
		require_once 'modelo/Conexion/connectbd.php';
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
		//$json=$cuenta;
    

		$query = "SELECT count(Id) as cantidad FROM grupocomportamiento where estado=1 ";
		$result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error($link));

		$json = 0;
		//$json =mysqli_num_rows($result);
		if(mysqli_num_rows($result)>0){
				//$json['cliente'][]=nada;
			if ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $json=$line["cantidad"];
			}
		}
		mysqli_close($link);
		return $json;
		
	}
	
   
  




  
  public function contarReconocimientos(){
		require_once 'modelo/Conexion/connectbd.php';
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
		//$json=$cuenta;
    

		$query = "SELECT count(Id) as cantidad FROM reconocimiento  ";
		$result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error($link));

		$json = 0;
		//$json =mysqli_num_rows($result);
		if(mysqli_num_rows($result)>0){
				//$json['cliente'][]=nada;
			if ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $json=$line["cantidad"];
			}
		}
		mysqli_close($link);
		return $json;
		
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
  
  
  public function loginUserWeb($datos) { //regusu et no es
        
        $mensaje = "0|Error no identificado";
        require_once 'modelo/Conexion/connectbd.php';
        
            require_once 'modelo/utilitario.php';
                    $mutil = new Utils();
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
		        
      	$query = "SELECT Id,Nombre,Usuario,Clave FROM usuariosweb WHERE Usuario = '".$datos["usuario"]."' ";
        $result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error($link));

        $json = array();
        if(mysqli_num_rows($result)>0){
        	if ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $clave = md5($datos["clave"]);
           // $mutil -> console_log('datosclave: '.$datos["clave"]);
           // $mutil -> console_log('clave: '.$clave);
           // $mutil -> console_log('lineclave: '.$line["Clave"]);
            if ($line["Clave"]==$clave){
              $mensaje="1|".$id."|".$line["Nombre"];
            }else{
              $mensaje="0|Usuario o contraseña incorrecto.";  
            }        
            
          }else{
            $mensaje="0|Error de conexion.";
          }
        }else{
          $mensaje="0|Usuario o contraseña incorrecto.";
        }
				mysqli_close($link);
        return $mensaje;
	}


  

 public function listGrupoComportamiento($pagina,$cantidad){
  require_once 'modelo/Conexion/connectbd.php';
      // connecting to database
      $this->db = new DB_Connect();
      $link=$this->db->connect();
  //$json=$cuenta;
  

  $query = "SELECT Id,Nombre,PuntajeMeta,Imagen,Estado,FActualizacion FROM grupocomportamiento ";
  $result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error($link));

  $json = array();
  //$json =mysqli_num_rows($result);
  if(mysqli_num_rows($result)>0){
      //$json['cliente'][]=nada;
    while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
      $destado ="Deshabilitado";
      if ($line["Estado"]==1){
          $destado ="Habilitado";
      }        
      array_push($json, array($line["Id"],$line["Nombre"],$line["PuntajeMeta"],$line["Imagen"],$destado,$line["FActualizacion"]));
    }
    
  }
  
  mysqli_close($link);
  return $json;
  
 }


 public function listReconocimiento($pagina,$cantidad){
  require_once 'modelo/Conexion/connectbd.php';
      // connecting to database
      $this->db = new DB_Connect();
      $link=$this->db->connect();
  //$json=$cuenta;
  

  $query = "SELECT r.Id as RId,Nombres,Nombre,Comentario,r.FActualizacion as RFActualizacion FROM comportamiento,reconocimiento as r ,usuarios where r.IdComportamiento=comportamiento.Id and r.IdUsuario=usuarios.Id order by r.id DESC LIMIT 10";
  $result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error($link));

  $json = array();
  //$json =mysqli_num_rows($result);
  if(mysqli_num_rows($result)>0){
      //$json['cliente'][]=nada;
    while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
       
      array_push($json, array($line["RId"],$line["Nombres"],$line["Nombre"],$line["Comentario"],$line["RFActualizacion"]));
    }
    
  }
  
  mysqli_close($link);
  return $json;
  
 }




}
 
?>
