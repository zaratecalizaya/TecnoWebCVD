<?php

class UsuarioDAO
{

  private $db;
  // constructor

  function __construct()
  {
    require_once 'modelo/Conexion/connectbd.php';
    // connecting to database

    $this->db = new DB_Connect();
    $this->db->connect();
  }

  // destructor
  function __destruct()
  {
  }

  public function isuserexist($tabla, $username)
  {

    require_once 'modelo/Conexion/connectbd.php';
    // connecting to database
    $this->db = new DB_Connect();
    $link = $this->db->connect();

    if ($result = mysqli_query($link, "SELECT * from " . $tabla . " WHERE Usuario = '" . $username . "'")) {

      /* determinar el número de filas del resultado */
      $num_rows  = mysqli_num_rows($result);

      if ($num_rows > 0) {
        return true;
      } else {
        // no existe
        return false;
      }
    } else {
      return false;
    }
  }

  /**
   * agregar nuevo usuario
   */
  public function adduserWeb($tabla, $datos)
  { //regusu et no es

    require_once 'modelo/Conexion/connectbd.php';
    // connecting to database
    $this->db = new DB_Connect();
    $link = $this->db->connect();

    $pu = $this->isuserexist($tabla, $datos["usuario"]);
    if ($pu == false) {
      $contraseña = md5($datos["contraseña"]);
      //$contraseña = $datos["contraseña"];
      $result = mysqli_query($link, "INSERT INTO " . $tabla . " (email,Usuario,contraseña,Estado) VALUES('" . $datos["email"] . "','" . $datos["usuario"] . "','" . $contraseña . "',1)");
      return $result;
    } else {
      return "el usuario ya existe";
    }
  }
  /**
   * agregar nuevo usuario
   */
  public function updateuserWeb($tabla, $datos)
  { //regusu et no es

    require_once 'modelo/Conexion/connectbd.php';
    // connecting to database
    $this->db = new DB_Connect();
    $link = $this->db->connect();

    $pu = $this->isuserexist($tabla, $datos["usuario"]);
    if ($pu == true) {
      if ($datos["contraseña"] == "") {
        $result = mysqli_query($link, "UPDATE " . $tabla . " SET email = '" . $datos["email"] . "',Usuario='" . $datos["usuario"] . "' ,FActualizacion = now() where id = " . $datos["id"]);
        return $result;
      } else {
        $contraseña = md5($datos["contraseña"]);
        $result = mysqli_query($link, "UPDATE " . $tabla . " SET email = '" . $datos["email"] . "',Usuario='" . $datos["usuario"] . "' ,contraseña ='" . $contraseña . "',FActualizacion = now() where id = " . $datos["id"]);
        return $result;
      }
    } else {
      return false;
    }
  }

  public function updatestatususer($tabla, $datos)
  { //regusu et no es

    require_once 'modelo/Conexion/connectbd.php';
    // connecting to database
    $this->db = new DB_Connect();
    $link = $this->db->connect();

    $pu = $this->isuserexist($tabla, $datos["usuario"]);
    if ($pu == true) {
      $result = mysqli_query($link, "UPDATE " . $tabla . " SET estado=ABS(estado-1) where id = " . $datos["id"]);
      return $result;
    } else {
      return false;
    }
  }


  public function datedelete($tabla, $datos)
  { //regusu et no es

    require_once 'modelo/Conexion/connectbd.php';
    // connecting to database
    $this->db = new DB_Connect();
    $link = $this->db->connect();

    $result = mysqli_query($link, "DELETE from " . $tabla . " where id = " . $datos["id"]);
  }




  public function listusuarioWeb($pagina, $cantidad)
  {
    require_once 'modelo/Conexion/connectbd.php';
    // connecting to database
    $this->db = new DB_Connect();
    $link = $this->db->connect();
    //$json=$cuenta;


    $query = "SELECT Id,email,Usuario,Estado,FActualizacion FROM usuariosweb ";
    $result = mysqli_query($link, $query) or die('Consulta fallida: ' . mysqli_error($link));

    $json = array();
    //$json =mysqli_num_rows($result);
    if (mysqli_num_rows($result) > 0) {
      //$json['cliente'][]=nada;
      while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $destado = "Deshabilitado";
        if ($line["Estado"] == 1) {
          $destado = "Habilitado";
        }
        array_push($json, array($line["Id"], $line["email"], $line["Usuario"], $destado, $line["FActualizacion"]));
      }
    }

    mysqli_close($link);
    return $json;
  }

  public function contarusuarioMovil()
  {
    require_once 'modelo/Conexion/connectbd.php';
    // connecting to database
    $this->db = new DB_Connect();
    $link = $this->db->connect();
    //$json=$cuenta;


    $query = "SELECT count(Id) as cantidad FROM usuarios where estado=1 ";
    $result = mysqli_query($link, $query) or die('Consulta fallida: ' . mysqli_error($link));

    $json = 0;
    //$json =mysqli_num_rows($result);
    if (mysqli_num_rows($result) > 0) {
      //$json['cliente'][]=nada;
      if ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $json = $line["cantidad"];
      }
    }
    mysqli_close($link);
    return $json;
  }

  public function getusuario($Nick)
  {
    require_once 'modelo/Conexion/connectbd.php';
    // connecting to database
    $this->db = new DB_Connect();
    $link = $this->db->connect();
    $query = "SELECT * FROM usuario where Nick='" . $Nick . "'";
    $result = mysqli_query($link, $query) or die('Consulta fallida: ' . mysqli_error());

    $json = array();
    if (mysqli_num_rows($result) > 0) {
      while ($line = mysqli_fetch_array($result, MYSQL_ASSOC)) {
        $json['usuario'][] = $line;
      }
    }

    mysqli_close($link);
    return json_encode($json);
  }


  public function loginUserWeb($datos)
  { //regusu et no es

    $mensaje = "0|Error no identificado";
    require_once 'modelo/Conexion/connectbd.php';

    require_once 'modelo/utilitario.php';
    $mutil = new Utils();
    // connecting to database
    // $this->db = new DB_Connect();
    // $link=$this->db->connect();
    $link = mysqli_connect("localhost", "root", "", "bdrepuesto1");

    $query = "select *from usuario where email = '".$datos["email"]."' ";
    // $query = "select *from usuario where '$email' = email and contraseña = '$password'";
    // $query = "select *from usuario where '$datos['email]' = email";
    $resultado = mysqli_query($link, $query);

    //Mostrando el resultado, las filas de la consulta
    // $mutil->console_log(mysqli_num_rows($result));

    $consulta = mysqli_fetch_array($resultado);

    if ($consulta['email'] = $datos["email"] && $consulta['contraseña'] = $datos["contraseña"]) {

      $mensaje = "Inicio de sesión exitoso";
      mysqli_close($link);
    } else {
      $mensaje = "0|Usuario o contraseña incorrecto.";
    }

    mysqli_close($link);
    return $mensaje;
  }

  public function listSectores()
  {
    require_once 'modelo/Conexion/connectbd.php';
    // connecting to database
    $this->db = new DB_Connect();
    $link = $this->db->connect();

    $query = "SELECT Id,email FROM sector order by email";
    $result = mysqli_query($link, $query) or die('Consulta fallida: ' . mysqli_error($link));

    $json = array();
    //$json =mysqli_num_rows($result);
    if (mysqli_num_rows($result) > 0) {
      //$json['cliente'][]=nada;
      while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        array_push($json, array($line["Id"], $line["email"]));
      }
    }

    mysqli_close($link);
    return $json;
  }

  //select 2 llamada
  public function listSubSectores($idSector)
  {
    require_once 'modelo/Conexion/connectbd.php';
    // connecting to database
    $this->db = new DB_Connect();
    $link = $this->db->connect();

    $query = "SELECT Id,email FROM subsector WHERE IdSector = " . $idSector . " order by email";
    $result = mysqli_query($link, $query) or die('Consulta fallida: ' . mysqli_error($link));

    $json = array();
    //$json =mysqli_num_rows($result);
    if (mysqli_num_rows($result) > 0) {
      //$json['cliente'][]=nada;
      while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        array_push($json, array($line["Id"], $line["email"]));
      }
    }

    mysqli_close($link);
    return $json;
  }
  public function listCargo($idSubSector)
  {
    require_once 'modelo/Conexion/connectbd.php';
    // connecting to database
    $this->db = new DB_Connect();
    $link = $this->db->connect();

    $query = "SELECT Id,email FROM cargo WHERE IdSubSector = " . $idSubSector . " order by email";
    $result = mysqli_query($link, $query) or die('Consulta fallida: ' . mysqli_error($link));

    $json = array();
    //$json =mysqli_num_rows($result);
    if (mysqli_num_rows($result) > 0) {
      //$json['cliente'][]=nada;
      while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        array_push($json, array($line["Id"], $line["email"]));
      }
    }

    mysqli_close($link);
    return $json;
  }

  public function listusuarioMovil($pagina, $cantidad)
  {
    require_once 'modelo/Conexion/connectbd.php';
    // connecting to database
    $this->db = new DB_Connect();
    $link = $this->db->connect();
    //$json=$cuenta;

    $query = "SELECT u.Id,u.email,u.Apellidos,u.FechaNatal,c.email as Cargo,u.IdCargo,c.IdSubSector,s.IdSector,u.CI,u.Region,u.Sector,u.SubSector,u.Usuario,u.Estado,n.numero,u.Imagen,u.puntaje,FActualizacion FROM usuarios u inner join nivel n on u.idnivel=n.id inner join cargo c on u.idcargo=c.id inner join subsector s on c.idsubsector=s.id  ";
    $result = mysqli_query($link, $query) or die('Consulta fallida: ' . mysqli_error($link));

    $json = array();
    //$json =mysqli_num_rows($result);
    if (mysqli_num_rows($result) > 0) {
      //$json['cliente'][]=nada;
      while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $destado = "Deshabilitado";
        if ($line["Estado"] == 1) {
          $destado = "Habilitado";
        }
        array_push($json, array($line["Id"], $line["email"], $line["Apellidos"], $line["FechaNatal"], $line["Cargo"], $line["CI"], $line["Region"], $line["Sector"], $line["SubSector"], $line["Usuario"], $destado, $line["numero"], $line["puntaje"], $line["FActualizacion"], $line["Imagen"], $line["IdCargo"], $line["IdSubSector"], $line["IdSector"]));
      }
    }

    mysqli_close($link);
    return $json;
  }

  public function contarUsuarios()
  {
    require_once 'modelo/Conexion/connectbd.php';
    // connecting to database
    $this->db = new DB_Connect();
    $link = $this->db->connect();
    //$json=$cuenta;


    $query = "SELECT count(Id) as cantidad FROM usuarios where estado=1 ";
    $result = mysqli_query($link, $query) or die('Consulta fallida: ' . mysqli_error($link));

    $json = 0;
    //$json =mysqli_num_rows($result);
    if (mysqli_num_rows($result) > 0) {
      //$json['cliente'][]=nada;
      if ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $json = $line["cantidad"];
      }
    }
    mysqli_close($link);
    return $json;
  }
  public function cantidadreconocimiento($id)
  {
    require_once 'modelo/Conexion/connectbd.php';
    // connecting to database
    $this->db = new DB_Connect();
    $link = $this->db->connect();
    //$json=$cuenta;


    $query = "SELECT count(Id) as cantidad FROM reconocimiento as r where r.IdUsuario='" . $id . "' ";
    $result = mysqli_query($link, $query) or die('Consulta fallida: ' . mysqli_error($link));

    $json = 0;
    //$json =mysqli_num_rows($result);
    if (mysqli_num_rows($result) > 0) {
      //$json['cliente'][]=nada;
      if ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $json = $line["cantidad"];
      }
    }
    mysqli_close($link);
    return $json;
  }



  public function sumandopuntaje($id)
  {
    require_once 'modelo/Conexion/connectbd.php';
    // connecting to database
    $this->db = new DB_Connect();
    $link = $this->db->connect();
    //$json=$cuenta;


    $query = "SELECT ifnull(Sum(r.Cantidad),0)  as cantidad FROM usuariogrupo as r where r.IdUsuario='" . $id . "' ";
    $result = mysqli_query($link, $query) or die('Consulta fallida: ' . mysqli_error($link));

    $json = 0;
    //$json =mysqli_num_rows($result);
    if (mysqli_num_rows($result) > 0) {
      //$json['cliente'][]=nada;
      if ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $json = $line["cantidad"];
      }
    }
    mysqli_close($link);
    return $json;
  }



  public function listcantidaduser($tabla, $datos)
  {
    require_once 'modelo/Conexion/connectbd.php';
    require_once 'modelo/utilitario.php';
    // connecting to database
    $this->db = new DB_Connect();
    $link = $this->db->connect();
    $cargo = $datos["id_cargo"];
    $region = $datos["region"];
    $subsector = $datos["id_subsector"];
    $sector = $datos["id_sector"];
    $fechaini = $datos["fechaini"];
    $fechafin = $datos["fechafin"];
    $fullname = '';

    $query = "SELECT  u.id , u.email, u.Apellidos from usuarios u inner join cargo c on c.Id=u.IdCargo inner join subsector ss on ss.id=c.IdSubSector inner join sector s on s.id=ss.IdSector inner join reconocimiento as r on r.IdUsuario=u.Id  GROUP BY u.Id  HAVING (1=1) LIMIT 10";

    if ($region != "") {
      $query = $query . " and u.region ='" . $region . "' ";
    }

    if ($subsector != 0) {
      $query = $query . " and ss.Id =" . $subsector;
    }
    if ($sector != 0) {
      $query = $query . " and s.Id =" . $sector;
    }

    if ($cargo != 0) {
      $query = $query . " and c.Id =" . $cargo;
    }

    if ($fechaini != '' && $fechafin != '') {

      $query = $query . " and   date(r.FActualizacion) BETWEEN '" . $fechaini . "' and '" . $fechafin . "' LIMIT 10";
    }
    $util = new Utils();
    $util->console_log($query);


    $result = mysqli_query($link, $query) or die('Consulta fallida: ' . mysqli_error($link));
    $json = array();
    //$json =mysqli_num_rows($result);
    if (mysqli_num_rows($result) > 0) {
      //$json['cliente'][]=nada;
      while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

        //  $query = $query." and r.IdUsuario =".$line["id"];                                         
        $fullname = $line["email"] . "   " . $line["Apellidos"];
        $contador = $this->cantidadreconocimiento($line["id"]);
        $sumando = $this->sumandopuntaje($line["id"]);


        array_push($json, array($line["id"], $fullname, $contador, $sumando));
      }
    }

    mysqli_close($link);
    return $json;
  }


  public function email($id)
  {
    require_once 'modelo/Conexion/connectbd.php';
    // connecting to database
    $this->db = new DB_Connect();
    $link = $this->db->connect();
    //$json=$cuenta;


    $query = "SELECT u.email, u.Apellidos FROM usuarios  u inner join reconocimiento r on u.id=r.IdColega where r.Id='" . $id . "' ";
    $result = mysqli_query($link, $query) or die('Consulta fallida: ' . mysqli_error($link));

    $json = '';
    //$json =mysqli_num_rows($result);
    if (mysqli_num_rows($result) > 0) {
      //$json['cliente'][]=nada;
      if ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $json = $line["email"] . "   " . $line["Apellidos"];
      }
    }
    mysqli_close($link);
    return $json;
  }

  public function iddusuario($id)
  {
    require_once 'modelo/Conexion/connectbd.php';
    // connecting to database
    $this->db = new DB_Connect();
    $link = $this->db->connect();
    //$json=$cuenta;


    $query = "SELECT r.IdUsuario FROM reconocimiento   r  where r.Id='" . $id . "' ";
    $result = mysqli_query($link, $query) or die('Consulta fallida: ' . mysqli_error($link));

    $json = 0;
    //$json =mysqli_num_rows($result);
    if (mysqli_num_rows($result) > 0) {
      //$json['cliente'][]=nada;
      if ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $json = $line["IdUsuario"];
      }
    }
    mysqli_close($link);
    return $json;
  }

  public function listmodal($tabla, $datos)
  {
    require_once 'modelo/Conexion/connectbd.php';
    // connecting to database
    $this->db = new DB_Connect();
    $link = $this->db->connect();
    $id = $datos["id"];

    $query = "SELECT r.Comentario,u.email, u.Apellidos , gc.Imagen   from usuarios u inner join reconocimiento r on u.Id=r.IdColega inner join comportamiento c on c.Id=r.IdComportamiento inner join grupocomportamiento  gc on gc.id=c.IdGrupo WHERE  r.IdColega='" . $id . "' ";
    $result = mysqli_query($link, $query) or die('Consulta fallida: ' . mysqli_error($link));

    $json = array();
    //$json =mysqli_num_rows($result);
    if (mysqli_num_rows($result) > 0) {
      //$json['cliente'][]=nada;
      while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $fullname = $line["email"] . "" . $line["Apellidos"];
        array_push($json, array($line["Comentario"], $fullname, $line["Imagen"]));
      }
    }

    mysqli_close($link);
    return  json_encode($json);
  }




  public function listperfildeuser($tabla, $datos)
  {
    //
    require_once 'modelo/Conexion/connectbd.php';
    // connecting to database
    $this->db = new DB_Connect();
    $link = $this->db->connect();

    $region = $datos["region"];
    $email = $datos["datos"];

    $fullname = '';
    $empleado = '';

    $query = "SELECT   r.Id ,r.IdUsuario, u.email,u.Apellidos, gc.Imagen,c.email as comportamiento, r.Comentario from usuarios  u inner join reconocimiento   r on  u.Id=r.IdUsuario    inner JOIN comportamiento c on r.IdComportamiento=c.Id inner join grupocomportamiento gc on gc.Id=c.IdGrupo where (1=1) ";

    if ($region != "") {
      $query = $query . " and u.region ='" . $region . "'";
    }

    if ($email != "") {
      $query = $query . " and u.email like  '%" . $email . "%' or u.Apellidos like '%" . $email . "%'";
    }


    $result = mysqli_query($link, $query) or die('Consulta fallida: ' . mysqli_error($link));
    $json = array();
    //$json =mysqli_num_rows($result);
    if (mysqli_num_rows($result) > 0) {
      //$json['cliente'][]=nada;
      while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

        //  $query = $query." and r.IdUsuario =".$line["id"] ;




        $fullname = $line["email"] . "   " . $line["Apellidos"];

        //$idUsuario=$this->iddusuario($line["Id"]);
        $empleado = $this->email($line["Id"]);

        array_push($json, array($line["Id"], $line["IdUsuario"], $fullname, $empleado, $line["Imagen"], $line["comportamiento"], $line["Comentario"]));
      }
    }

    mysqli_close($link);
    return $json;
  }

  public function imagenUser($tabla, $datos)
  {
    //
    require_once 'modelo/Conexion/connectbd.php';
    // connecting to database
    $this->db = new DB_Connect();
    $link = $this->db->connect();

    $id = $datos["id"];

    $query = "SELECT  email,Apellidos from usuarios u     where u.id='" . $id . "' ";
    $result = mysqli_query($link, $query) or die('Consulta fallida: ' . mysqli_error($link));
    $json = array();
    //$json =mysqli_num_rows($result);
    if (mysqli_num_rows($result) > 0) {
      //$json['cliente'][]=nada;
      while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $fullname = $line["email"] . "   " . $line["Apellidos"];
        //  $var=["email"=>$fullname];      


      }
    }


    mysqli_close($link);

    return ($fullname);
  }



  public function ImageUser($tabla, $datos)
  {
    //
    require_once 'modelo/Conexion/connectbd.php';
    // connecting to database
    $this->db = new DB_Connect();
    $link = $this->db->connect();

    $id = $datos["id"];

    $query = "SELECT  Imagen from usuarios u     where u.id='" . $id . "' ";
    $result = mysqli_query($link, $query) or die('Consulta fallida: ' . mysqli_error($link));
    $json = array();
    //$json =mysqli_num_rows($result);
    if (mysqli_num_rows($result) > 0) {
      //$json['cliente'][]=nada;
      while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $fullname = $line["Imagen"];
        //  $var=["email"=>$fullname];      


      }
    }
    mysqli_close($link);
    return ($fullname);
  }


  public function CargoUser($tabla, $datos)
  {
    //
    require_once 'modelo/Conexion/connectbd.php';
    // connecting to database
    $this->db = new DB_Connect();
    $link = $this->db->connect();

    $id = $datos["id"];

    $query = "SELECT c.email FROM usuarios u inner join  `cargo`  c on c.Id=u.IdCargo WHERE  u.id='" . $id . "' ";
    $result = mysqli_query($link, $query) or die('Consulta fallida: ' . mysqli_error($link));
    $json = array();
    //$json =mysqli_num_rows($result);
    if (mysqli_num_rows($result) > 0) {
      //$json['cliente'][]=nada;
      while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $fullname = $line["email"];
      }
    }


    mysqli_close($link);

    return ($fullname);
  }

  public function LogrosUser($tabla, $datos)
  {
    //
    require_once 'modelo/Conexion/connectbd.php';
    // connecting to database
    $this->db = new DB_Connect();
    $link = $this->db->connect();
    $fullname = 0;
    $id = $datos["id"];

    $query = "SELECT count(c.Id) as cantidad from usuarios u inner join reconocimiento r on u.Id=r.IdUsuario inner join comportamiento c on c.Id= r.IdComportamiento WHERE  u.id='" . $id . "' ";
    $result = mysqli_query($link, $query) or die('Consulta fallida: ' . mysqli_error($link));

    //$json =mysqli_num_rows($result);
    if (mysqli_num_rows($result) > 0) {
      //$json['cliente'][]=nada;
      while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $fullname = $line["cantidad"];
      }
    }


    mysqli_close($link);

    return ($fullname);
  }

  public function PuntajeUser($tabla, $datos)
  {
    //
    require_once 'modelo/Conexion/connectbd.php';
    // connecting to database
    $this->db = new DB_Connect();
    $link = $this->db->connect();
    $fullname = 0;
    $id = $datos["id"];

    $query = "SELECT puntaje from usuarios WHERE id ='" . $id . "' ";
    $result = mysqli_query($link, $query) or die('Consulta fallida: ' . mysqli_error($link));

    //$json =mysqli_num_rows($result);
    if (mysqli_num_rows($result) > 0) {
      //$json['cliente'][]=nada;
      while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $fullname = $line["puntaje"];
      }
    }


    mysqli_close($link);

    return ($fullname);
  }




  /**
   * agregar nuevo usuario
   */
  public function adduserMovil($tabla, $datos)
  { //regusu et no es

    require_once 'modelo/Conexion/connectbd.php';
    require_once 'modelo/utilitario.php';
    $mutil = new Utils();
    $mutil->console_log('Entro AddMovil');
    // connecting to database
    $this->db = new DB_Connect();
    $link = $this->db->connect();

    $pu = $this->isuserexist($tabla, $datos["usuario"]);
    $mutil->console_log('is user:' . $pu);
    if ($pu == false) {
      $mutil->console_log('Entro AddMovil Usuario');
      $contraseña = md5($datos["contraseña"]);
      //$contraseña = $datos["contraseña"];
      $query = "SELECT s.email as sector,ss.email as subsector FROM sector s inner join subsector ss on s.id=ss.idsector where ss.id=" . $datos["SubSector"];

      $result1 = mysqli_query($link, $query) or die('Consulta fallida: ' . mysqli_error($link));

      $json = array();
      if (mysqli_num_rows($result1) > 0) {
        if ($line = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {

          $consulta = "INSERT INTO " . $tabla . " (email, Apellidos, FechaNatal, IdCargo, CI, Region, Sector,SubSector, Usuario, contraseña, Estado, IdNivel, Puntaje,Imagen,FActualizacion) VALUES('" . $datos["email"] . "','" . $datos["Apellidos"] . "','" . $datos["FechaNatal"] . "','" . $datos["Cargo"] . "','" . $datos["Ci"] . "','" . $datos["Region"] . "','" . $line["sector"] . "','" . $line["subsector"] . "','" . $datos["usuario"] . "','" . $contraseña . "',0,1,0,'" . $datos["Imagen"] . "',now())";

          $result = mysqli_query($link, $consulta);
          if ($result == true) {
            return "true";
          } else {
            return "Error al guardar el usuario";
          }
        }
      }
      return "error al cargar la informacion de sectores";
    } else {
      return "el usuario ya existe";
    }
  }

  public function updateuserMovil($tabla, $datos)
  { //regusu et no es

    require_once 'modelo/Conexion/connectbd.php';
    // connecting to database
    $this->db = new DB_Connect();
    $link = $this->db->connect();

    $pu = $this->isuserexist($tabla, $datos["usuario"]);
    if ($pu == true) {
      $query = "SELECT s.email as sector,ss.email as subsector FROM sector s inner join subsector ss on s.id=ss.idsector where ss.id=" . $datos["SubSector"];
      $result1 = mysqli_query($link, $query) or die('Consulta fallida: ' . mysqli_error($link));

      $json = array();
      if (mysqli_num_rows($result1) > 0) {
        if ($line = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
          if ($datos["contraseña"] == "") {
            $result = mysqli_query($link, "UPDATE " . $tabla . " SET email = '" . $datos["email"] . "',Apellidos = '" . $datos["Apellidos"] . "',FechaNatal = '" . $datos["FechaNatal"] . "',IdCargo = '" . $datos["Cargo"] . "',CI = '" . $datos["Ci"] . "',Region = '" . $datos["Region"] . "',Sector = '" . $line["sector"] . "',SubSector = '" . $line["subsector"] . "',Usuario='" . $datos["usuario"] . "' ,FActualizacion = now() where id = " . $datos["id"]);
            if ($result == true) {
              return "true";
            } else {
              return "Error al guardar el usuario update";
            }
          } else {
            $contraseña = md5($datos["contraseña"]);
            $result = mysqli_query($link, "UPDATE " . $tabla . " SET email = '" . $datos["email"] . "',Apellidos = '" . $datos["Apellidos"] . "',FechaNatal = '" . $datos["FechaNatal"] . "',IdCargo = '" . $datos["Cargo"] . "',CI = '" . $datos["Ci"] . "',Region = '" . $datos["Region"] . "',Sector = '" . $line["sector"] . "',SubSector = '" . $line["subsector"] . "',Usuario='" . $datos["usuario"] . "' ,contraseña ='" . $contraseña . "',FActualizacion = now() where id = " . $datos["id"]);
            return $result;
          }
        }
      }
      return "error al cargar la informacion de sectores";
    } else {
      return "no se pudo encontrar al usuario";
    }
  }



  public function listlogrosuser($tabla, $datos)
  {
    require_once 'modelo/Conexion/connectbd.php';
    require_once 'modelo/utilitario.php';
    // connecting to database
    $this->db = new DB_Connect();
    $link = $this->db->connect();

    $fechaini = $datos["fechaini"];
    $fechafin = $datos["fechafin"];
    $fullname = '';

    $query = "SELECT  ug.Id,u.email, u.Apellidos,gc.Imagen,gc.email,ug.Cantidad from usuarios u inner join usuariogrupo ug on ug.IdUsuario=u.Id inner join grupocomportamiento gc on gc.Id=ug.IdGrupo where 1=1 ";



    if ($fechaini != '' && $fechafin != '') {

      $query = $query . " and   date(ug.FActualizacion) BETWEEN '" . $fechaini . "' and '" . $fechafin . "'";
    }
    $util = new Utils();
    $util->console_log($query);


    $result = mysqli_query($link, $query) or die('Consulta fallida: ' . mysqli_error($link));
    $json = array();
    //$json =mysqli_num_rows($result);
    if (mysqli_num_rows($result) > 0) {
      //$json['cliente'][]=nada;
      while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

        //  $query = $query." and r.IdUsuario =".$line["id"] ;




        $fullname = $line["email"] . "   " . $line["Apellidos"];


        array_push($json, array($line["Id"], $fullname, $line["Imagen"], $line["email"], $line["Cantidad"]));
      }
    }

    mysqli_close($link);
    return $json;
  }
}
