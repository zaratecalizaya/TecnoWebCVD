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


    public function datedelete($tabla,$datos) { //regusu et no es

      require_once 'modelo/Conexion/connectbd.php';
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
		
          $result=mysqli_query($link,"DELETE from ".$tabla." where id = ".$datos["id"]);
    
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
    require_once 'modelo/utilitario.php';
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
         $cargo=$datos["id_cargo"];
         $region=$datos["region"];
         $subsector=$datos["id_subsector"];
         $sector=$datos["id_sector"];
         $fechaini=$datos["fechaini"];
         $fechafin=$datos["fechafin"];
         $fullname='';

        $query = "SELECT  u.id , u.Nombres, u.Apellidos from usuarios u inner join cargo c on c.Id=u.IdCargo inner join subsector ss on ss.id=c.IdSubSector inner join sector s on s.id=ss.IdSector inner join reconocimiento as r on r.IdUsuario=u.Id  GROUP BY u.Id  HAVING (1=1) LIMIT 10" ;
		    
          if ($region!=""){
              $query = $query." and u.region ='".$region."' "  ;
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

        if($fechaini != '' && $fechafin != ''){
          
            $query = $query." and   date(r.FActualizacion) BETWEEN '".$fechaini."' and '". $fechafin ."' LIMIT 10" ;
        
        }
        $util = new Utils();
        $util->console_log($query);


        $result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error($link));
        $json = array();
        //$json =mysqli_num_rows($result);
        if(mysqli_num_rows($result)>0){
        		//$json['cliente'][]=nada;
        	while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

          //  $query = $query." and r.IdUsuario =".$line["id"];                                         
                $fullname=$line["Nombres"]."   ".$line["Apellidos"];
                 $contador=$this->cantidadreconocimiento($line["id"]);
                 $sumando=$this->sumandopuntaje($line["id"]);
                 
                 
          	array_push($json, array($line["id"] ,$fullname,$contador,$sumando));
          }
			
        }
		
		mysqli_close($link);
		return $json;




  }


  public function nombreusuario($id){
    require_once 'modelo/Conexion/connectbd.php';
    // connecting to database
    $this->db = new DB_Connect();
    $link=$this->db->connect();
    //$json=$cuenta;


      $query = "SELECT u.Nombres, u.Apellidos FROM usuarios  u inner join reconocimiento r on u.id=r.IdColega where r.Id='".$id."' ";
      $result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error($link));

      $json = '';
     //$json =mysqli_num_rows($result);
   if(mysqli_num_rows($result)>0){
         //$json['cliente'][]=nada;
    if ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
             $json=$line["Nombres"]."   ".$line["Apellidos"];
    }
   }
   mysqli_close($link);
    return $json;
}

public function iddusuario($id){
  require_once 'modelo/Conexion/connectbd.php';
  // connecting to database
  $this->db = new DB_Connect();
  $link=$this->db->connect();
  //$json=$cuenta;


    $query = "SELECT r.IdUsuario FROM reconocimiento   r  where r.Id='".$id."' ";
    $result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error($link));

    $json = 0;
   //$json =mysqli_num_rows($result);
 if(mysqli_num_rows($result)>0){
       //$json['cliente'][]=nada;
  if ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
           $json=$line["IdUsuario"];
  }
 }
 mysqli_close($link);
  return $json;
}

public function listmodal($tabla,$datos){
  require_once 'modelo/Conexion/connectbd.php';
      // connecting to database
      $this->db = new DB_Connect();
      $link=$this->db->connect();
      $id=$datos["id"];
  
      $query = "SELECT r.Comentario,u.Nombres, u.Apellidos , gc.Imagen   from usuarios u inner join reconocimiento r on u.Id=r.IdColega inner join comportamiento c on c.Id=r.IdComportamiento inner join grupocomportamiento  gc on gc.id=c.IdGrupo WHERE  r.IdColega='".$id."' ";
      $result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error($link));

      $json = array();
      //$json =mysqli_num_rows($result);
      if(mysqli_num_rows($result)>0){
          //$json['cliente'][]=nada;
        while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
          $fullname= $line["Nombres"]."".$line["Apellidos"];
          array_push($json, array($line["Comentario"],$fullname,$line["Imagen"]));
        }
    
      }
  
  mysqli_close($link);
  return  json_encode( $json);
  
}


  

  public function listperfildeuser($tabla,$datos){
    //
  	require_once 'modelo/Conexion/connectbd.php';
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
         
         $region=$datos["region"];
         $nombre=$datos["datos"];
         
         $fullname='';
         $empleado='';
         
        $query = "SELECT   r.Id ,r.IdUsuario, u.Nombres,u.Apellidos, gc.Imagen,c.Nombre as comportamiento, r.Comentario from usuarios  u inner join reconocimiento   r on  u.Id=r.IdUsuario    inner JOIN comportamiento c on r.IdComportamiento=c.Id inner join grupocomportamiento gc on gc.Id=c.IdGrupo where (1=1) " ;
		    
          if ($region!="" ){
              $query = $query." and u.region ='".$region."'" ;
          }
          
          if ($nombre!="" ){
            $query = $query." and u.Nombres like  '%".$nombre."%' or u.Apellidos like '%".$nombre."%'" ;
        } 
        

        $result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error($link));
        $json = array();
        //$json =mysqli_num_rows($result);
        if(mysqli_num_rows($result)>0){
        		//$json['cliente'][]=nada;
        	while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

          //  $query = $query." and r.IdUsuario =".$line["id"] ;
               
         
                  

                $fullname=$line["Nombres"]."   ".$line["Apellidos"];
                
                 //$idUsuario=$this->iddusuario($line["Id"]);
                 $empleado=$this->nombreusuario($line["Id"]); 
                 
          	array_push($json, array($line["Id"],$line["IdUsuario"],$fullname,$empleado,$line["Imagen"],$line["comportamiento"],$line["Comentario"]));
          }
			
        }
		
		mysqli_close($link);
		return $json;




  }

  public function imagenUser($tabla,$datos){
    //
  	require_once 'modelo/Conexion/connectbd.php';
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
         
         $id=$datos["id"];
        
        $query = "SELECT  Nombres,Apellidos from usuarios u     where u.id='".$id."' " ;
        $result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error($link));
        $json = array();
        //$json =mysqli_num_rows($result);
        if(mysqli_num_rows($result)>0){
        		//$json['cliente'][]=nada;
        	while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $fullname=$line["Nombres"]."   ".$line["Apellidos"];
           //  $var=["nombrecompleto"=>$fullname];      
          
      
        }
			
       }

		
		mysqli_close($link);
            
		return  ( $fullname) ;
  }



  public function ImageUser($tabla,$datos){
    //
  	require_once 'modelo/Conexion/connectbd.php';
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
         
         $id=$datos["id"];
        
        $query = "SELECT  Imagen from usuarios u     where u.id='".$id."' " ;
        $result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error($link));
        $json = array();
        //$json =mysqli_num_rows($result);
        if(mysqli_num_rows($result)>0){
        		//$json['cliente'][]=nada;
        	while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $fullname=$line["Imagen"];
           //  $var=["nombrecompleto"=>$fullname];      
          
      
        }
			
       }
       		mysqli_close($link);     
		return  ( $fullname) ;
  }


  public function CargoUser($tabla,$datos){
    //
  	require_once 'modelo/Conexion/connectbd.php';
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
         
         $id=$datos["id"];
        
        $query = "SELECT c.Nombre FROM usuarios u inner join  `cargo`  c on c.Id=u.IdCargo WHERE  u.id='".$id."' " ;
        $result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error($link));
        $json = array();
        //$json =mysqli_num_rows($result);
        if(mysqli_num_rows($result)>0){
        		//$json['cliente'][]=nada;
        	while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $fullname=$line["Nombre"];
           
          
      
        }
			
       }

		
		mysqli_close($link);
            
		return  ( $fullname) ;




  }

  public function LogrosUser($tabla,$datos){
    //
  	require_once 'modelo/Conexion/connectbd.php';
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
         $fullname=0;
         $id=$datos["id"];
        
        $query = "SELECT count(c.Id) as cantidad from usuarios u inner join reconocimiento r on u.Id=r.IdUsuario inner join comportamiento c on c.Id= r.IdComportamiento WHERE  u.id='".$id."' " ;
        $result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error($link));
       
        //$json =mysqli_num_rows($result);
        if(mysqli_num_rows($result)>0){
        		//$json['cliente'][]=nada;
        	while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $fullname=$line["cantidad"];
           
          
      
        }
			
       }

		
		mysqli_close($link);
            
		return  ( $fullname) ;




  }
  
  public function PuntajeUser($tabla,$datos){
    //
  	require_once 'modelo/Conexion/connectbd.php';
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
         $fullname=0;
         $id=$datos["id"];
        
        $query = "SELECT puntaje from usuarios WHERE id ='".$id."' " ;
        $result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error($link));
       
        //$json =mysqli_num_rows($result);
        if(mysqli_num_rows($result)>0){
        		//$json['cliente'][]=nada;
        	while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $fullname=$line["puntaje"];
        }
       }

		
		mysqli_close($link);
            
		return  ( $fullname) ;




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
                  return "Error al guardar el usuario update";
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



    public function listlogrosuser($tabla,$datos){
    	require_once 'modelo/Conexion/connectbd.php';
      require_once 'modelo/utilitario.php';
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
        
         $fechaini=$datos["fechaini"];
         $fechafin=$datos["fechafin"];
         $fullname='';

        $query = "SELECT  ug.Id,u.Nombres, u.Apellidos,gc.Imagen,gc.Nombre,ug.Cantidad from usuarios u inner join usuariogrupo ug on ug.IdUsuario=u.Id inner join grupocomportamiento gc on gc.Id=ug.IdGrupo where 1=1 " ;
		    
        

        if($fechaini != '' && $fechafin != ''){
          
            $query = $query." and   date(ug.FActualizacion) BETWEEN '".$fechaini."' and '". $fechafin ."'" ;
        
        }
        $util = new Utils();
        $util->console_log($query);


        $result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error($link));
        $json = array();
        //$json =mysqli_num_rows($result);
        if(mysqli_num_rows($result)>0){
        		//$json['cliente'][]=nada;
        	while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

          //  $query = $query." and r.IdUsuario =".$line["id"] ;
               
         
                  

                $fullname=$line["Nombres"]."   ".$line["Apellidos"];
                
                 
          	array_push($json, array($line["Id"] ,$fullname,$line["Imagen"],$line["Nombre"],$line["Cantidad"]));
          }
			
        }
		
		mysqli_close($link);
		return $json;



    }
  
  
}
 
 
 
 
?>
