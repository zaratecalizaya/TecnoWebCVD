<?php
 
class UsuarioDAO {
 
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
	
	public function listusuarioWeb($pagina,$cantidad){
		require_once 'modelo/Conexion/connectbd.php';
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
		//$json=$cuenta;
    

		$query = "SELECT Id,Nombre,Usuario,Estado,FActualizacion FROM usuariosweb ";
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
				array_push($json, array($line["Id"],$line["Nombre"],$line["Usuario"],$destado,$line["FActualizacion"]));
			}
			
		}
		
		mysqli_close($link);
		return $json;
		
	}
  
  public function contarusuarioMovil(){
		require_once 'modelo/Conexion/connectbd.php';
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
		//$json=$cuenta;
    

		$query = "SELECT count(Id) as cantidad FROM usuarios where estado=1 ";
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
  
  public function listSectores(){
		require_once 'modelo/Conexion/connectbd.php';
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
		
        $query = "SELECT Id,Nombre FROM sector order by Nombre";
        $result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error($link));

        $json = array();
        //$json =mysqli_num_rows($result);
        if(mysqli_num_rows($result)>0){
        		//$json['cliente'][]=nada;
        	while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
          	array_push($json, array($line["Id"],$line["Nombre"]));
          }
			
        }
		
		mysqli_close($link);
		return $json;
		
	}
  
  public function listSubSectores($idSector){
		require_once 'modelo/Conexion/connectbd.php';
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
		
        $query = "SELECT Id,Nombre FROM subsector WHERE IdSector = ".$idSector." order by Nombre";
        $result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error($link));

        $json = array();
        //$json =mysqli_num_rows($result);
        if(mysqli_num_rows($result)>0){
        		//$json['cliente'][]=nada;
        	while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
          	array_push($json, array($line["Id"],$line["Nombre"]));
          }
			
        }
		
		mysqli_close($link);
		return $json;
		
	}
  public function listCargo($idSubSector){
		require_once 'modelo/Conexion/connectbd.php';
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
		
        $query = "SELECT Id,Nombre FROM cargo WHERE IdSubSector = ".$idSubSector." order by Nombre";
        $result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error($link));

        $json = array();
        //$json =mysqli_num_rows($result);
        if(mysqli_num_rows($result)>0){
        		//$json['cliente'][]=nada;
        	while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
          	array_push($json, array($line["Id"],$line["Nombre"]));
          }
			
        }
		
		mysqli_close($link);
		return $json;
		
	}
  
  public function listusuarioMovil($pagina,$cantidad){
		require_once 'modelo/Conexion/connectbd.php';
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
		//$json=$cuenta;
    
		$query = "SELECT u.Id,u.Nombres,u.Apellidos,u.FechaNatal,c.Nombre as Cargo,u.IdCargo,c.IdSubSector,s.IdSector,u.CI,u.Region,u.Sector,u.SubSector,u.Usuario,u.Estado,n.numero,u.Imagen,u.puntaje,FActualizacion FROM usuarios u inner join nivel n on u.idnivel=n.id inner join cargo c on u.idcargo=c.id inner join subsector s on c.idsubsector=s.id  ";
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
				array_push($json, array($line["Id"],$line["Nombres"],$line["Apellidos"],$line["FechaNatal"],$line["Cargo"],$line["CI"],$line["Region"],$line["Sector"],$line["SubSector"],$line["Usuario"],$destado,$line["numero"],$line["puntaje"],$line["FActualizacion"],$line["Imagen"],$line["IdCargo"],$line["IdSubSector"],$line["IdSector"]));
			}
			
		}
		
		mysqli_close($link);
		return $json;
		
	}

  public function contarUsuarios(){
		require_once 'modelo/Conexion/connectbd.php';
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
		//$json=$cuenta;
    

		$query = "SELECT count(Id) as cantidad FROM usuarios where estado=1 ";
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
   public function cantidadreconocimiento($id){
    require_once 'modelo/Conexion/connectbd.php';
    // connecting to database
    $this->db = new DB_Connect();
    $link=$this->db->connect();
    //$json=$cuenta;


   $query = "SELECT count(Id) as cantidad FROM reconocimiento as r where r.IdUsuario='".$id."' ";
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


   
 public function sumandopuntaje($id){
  require_once 'modelo/Conexion/connectbd.php';
  // connecting to database
  $this->db = new DB_Connect();
  $link=$this->db->connect();
  //$json=$cuenta;


 $query = "SELECT ifnull(Sum(r.Cantidad),0)  as cantidad FROM usuariogrupo as r where r.IdUsuario='".$id."' ";
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



  public function listcantidaduser($tabla,$datos){
  	require_once 'modelo/Conexion/connectbd.php';
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
         $cargo=$datos["id_cargo"];
         $region=$datos["region"];
         $subsector=$datos["id_subsector"];
         $sector=$datos["id_sector"];
         $fecha=$datos["fecha"];
       $fullname='';

        $query = "SELECT u.id, u.Nombres, u.Apellidos from usuarios u inner join cargo c on c.Id=u.IdCargo inner join subsector ss on ss.id=c.IdSubSector inner join sector s on s.id=ss.IdSector,reconocimiento as r   where (1=1) and r.IdUsuario=u.id and r.IdColega=u.id" ;
		    
        if ($region!=""){
          $query = $query." and u.region ='".$region."'" ;
        }

        if ($subsector!=0){
          $query = $query." and ss.Id =".$subsector ;
        }
        
        if ($sector!=0){
          $query = $query." and s.Id =".$sector ;
        }
        
        if ($cargo!=0){
          $query = $query." and c.Id =".$cargo ;
        }

        if($fecha == "DIA"){
          $query = $query."and day(r.FActualizacion)=day(current_date()) ";
        }






        $result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error($link));

        



        $json = array();
        //$json =mysqli_num_rows($result);
        if(mysqli_num_rows($result)>0){
        		//$json['cliente'][]=nada;
        	while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

          //  $query = $query." and r.IdUsuario =".$line["id"] ;
               
         
                  

                $fullname=$line["Nombres"]."   ".$line["Apellidos"];
                 $contador=$this->cantidadreconocimiento($line["id"]);
                 $sumando=$this->sumandopuntaje($line["id"]);
                 
                 
          	array_push($json, array($line["id"] ,$fullname,$contador,$sumando));
          }
			
        }
		
		mysqli_close($link);
		return $json;




  }


  
  /**
     * agregar nuevo usuario
     */
    public function adduserMovil($tabla,$datos) { //regusu et no es

      require_once 'modelo/Conexion/connectbd.php';
      require_once 'modelo/utilitario.php';
      $mutil = new Utils();
      $mutil -> console_log('Entro AddMovil');
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
        
      	$pu=$this->isuserexist($tabla, $datos["usuario"]);
        $mutil -> console_log('is user:'.$pu);
        if($pu==false){
          $mutil -> console_log('Entro AddMovil Usuario');
          $clave = md5($datos["clave"]);
          //$clave = $datos["clave"];
          $query = "SELECT s.nombre as sector,ss.nombre as subsector FROM sector s inner join subsector ss on s.id=ss.idsector where ss.id=".$datos["SubSector"];
      		$result1 = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error($link));

      		$json = array();
      		if(mysqli_num_rows($result1)>0){
      			if ($line = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
      				
              $consulta ="INSERT INTO ".$tabla." (Nombres, Apellidos, FechaNatal, IdCargo, CI, Region, Sector,SubSector, Usuario, Clave, Estado, IdNivel, Puntaje,Imagen,FActualizacion) VALUES('".$datos["Nombres"]."','".$datos["Apellidos"]."','".$datos["FechaNatal"]."','".$datos["Cargo"]."','".$datos["Ci"]."','".$datos["Region"]."','".$line["sector"]."','".$line["subsector"]."','".$datos["usuario"]."','".$clave."',0,1,0,'".$datos["Imagen"]."',now())";
              $result=mysqli_query($link,$consulta);
              if ($result ==true){
                return "true";
              }else {
                return "Error al guardar el usuario";
              }
            }
			
          }
          return "error al cargar la informacion de sectores";
          
      	}else{
      		return "el usuario ya existe";
      	}

    }
    
    public function updateuserMovil($tabla,$datos) { //regusu et no es

      require_once 'modelo/Conexion/connectbd.php';
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
		
      	$pu=$this->isuserexist($tabla, $datos["usuario"]);
        if($pu==true){
          $query = "SELECT s.nombre as sector,ss.nombre as subsector FROM sector s inner join subsector ss on s.id=ss.idsector where ss.id=".$datos["SubSector"];
      		$result1 = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error($link));

      		$json = array();
      		if(mysqli_num_rows($result1)>0){
      			if ($line = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
              if ($datos["clave"]==""){
                $result=mysqli_query($link,"UPDATE ".$tabla." SET Nombres = '".$datos["Nombres"]."',Apellidos = '".$datos["Apellidos"]."',FechaNatal = '".$datos["FechaNatal"]."',IdCargo = '".$datos["Cargo"]."',CI = '".$datos["Ci"]."',Region = '".$datos["Region"]."',Sector = '".$line["sector"]."',SubSector = '".$line["subsector"]."',Usuario='".$datos["usuario"]."' ,FActualizacion = now() where id = ".$datos["id"]);
                if ($result ==true){
                    return "true";
                }else {
                  return "Error al guardar el usuario";
                }
                        
              }else{
                $clave = md5($datos["clave"]);
                $result=mysqli_query($link,"UPDATE ".$tabla." SET Nombres = '".$datos["Nombres"]."',Apellidos = '".$datos["Apellidos"]."',FechaNatal = '".$datos["FechaNatal"]."',IdCargo = '".$datos["Cargo"]."',CI = '".$datos["Ci"]."',Region = '".$datos["Region"]."',Sector = '".$line["sector"]."',SubSector = '".$line["subsector"]."',Usuario='".$datos["usuario"]."' ,Clave ='".$clave."',FActualizacion = now() where id = ".$datos["id"]);
                return $result;
              }          
              
            }
          }
          return "error al cargar la informacion de sectores"; 
          
          
      	}else{
      		return "no se pudo encontrar al usuario";
      	}

    }
  
  
}
 
 
 
 
?>
