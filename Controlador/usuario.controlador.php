<?php

require_once 'modelo/Funciones/UsuarioDAO.php';
require_once 'modelo/utilitario.php';

class ControladorUsuario
{

  /* ==============================
     Registro de email Web     
     ===============================*/

  public function ctrRegistroemail()
  {

    if (isset($_POST["id"])) {
      if (($_POST["contraseña"]) == ($_POST["contraseña2"])) {
        if (($_POST["id"]) == 0) {
          if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/', $_POST["nombre"])) {

            $datos = array(
              "nombre" => $_POST["nombre"],
              "email" => $_POST["email"],
              "contraseña" => $_POST["contraseña"]
            );

            $tabla = "empleado";
            $emaild = new UsuarioDAO();
            $respuesta = $emaild->adduser($tabla, $datos);

            //return $respuesta;
            if ($respuesta == true) {
              return "true";
            } else {
              return $respuesta;
            }
          } else {

            return "false2";
          }
        } else {
          if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/', $_POST["nombre"])) {

            $datos = array(
              "id" => $_POST["id"],
              "nombre" => $_POST["nombre"],
              "email" => $_POST["email"],
              "contraseña" => $_POST["contraseña"]
            );

            $tabla = "emailsweb";
            $emaild = new UsuarioDAO();
            $respuesta = $emaild->updateuserWeb($tabla, $datos);

            //return $respuesta;
            if ($respuesta == true) {
              return "true";
            } else {
              return $respuesta;
            }
          } else {

            return "false2";
          }
        }
      } else {
        return "Las contraseñas no coinciden";
      }
    } else {
      return "false";
    }
  }



  public function ctrListarCargoemail()
  {

    if (isset($_POST["region"])) {
      $cargo = $_POST["cargo"];
      $region = $_POST["region"];
      $id_subsector = $_POST["subsector"];
      $id_sector = $_POST["sector"];
      $fechaini = $_POST["fechaini"];
      $fechafin = $_POST["fechafin"];

      $idcargo = 0;
      if ($cargo != "seleccione") {
        $idcargo = intval($cargo);
      }

      if ($region == "seleccione") {
        $region = "";
      }

      $idsubsector = 0;
      if ($id_subsector != "seleccione") {
        $idsubsector = intval($id_subsector);
      }


      $idsector = 0;
      if ($id_sector != "seleccione") {
        $idsector = intval($id_sector);
      }


      $fechaini1 = "01/01/2000";
      if ($fechaini != "") {
        $fechaini1 = $fechaini;
      }


      $fechafin1 = "01/01/2000";
      if ($fechafin != "") {
        $fechafin1 = $fechafin;
      }


      $fechaini1 = "01/01/2000";
      if ($fechaini != "00/00/0000") {
        $fechaini1 = $fechaini;
      }


      $fechafin1 = "01/01/2000";
      if ($fechafin != "00/00/0000") {
        $fechafin1 = $fechafin;
      }
      $datos = array(
        "id_cargo" => $idcargo,
        "region" => $region,
        "id_subsector" => $idsubsector,
        "id_sector" => $idsector,
        "fechaini" => $fechaini1,
        "fechafin" => $fechafin1
      );



      $tabla = "emails";
      $emaild = new UsuarioDAO();
      $respuesta = $emaild->listcantidaduser($tabla, $datos);

      return $respuesta;
    } else {



      $datos = array(
        "id_cargo" => 0,
        "region" => "",
        "id_subsector" => 0,
        "id_sector" => 0,
        "fechaini" => $_POST["fechaini"],
        "fechafin" => $_POST["fechafin"]

      );

      $tabla = "emails";
      $emaild = new UsuarioDAO();
      $respuesta = $emaild->listcantidaduser($tabla, $datos);

      return $respuesta;
    }



    $datos = array(
      "id_cargo" => 0,
      "region" => "",
      "id_subsector" => 0,
      "id_sector" => 0,
      "fechaini" => "",
      "fechafin" => "",

    );

    $tabla = "emails";
    $emaild = new UsuarioDAO();
    $respuesta = $emaild->listcantidaduser($tabla, $datos);

    return $respuesta;
  }

  public function ctrListaremailsWeb($pagina, $cantidad)
  {


    $tabla = "emailsweb";
    $emaild = new UsuarioDAO();
    $respuesta = $emaild->listemailWeb($pagina, $cantidad);

    return $respuesta;
  }

  public function ctrListarSectores()
  {


    $tabla = "sector";
    $emaild = new UsuarioDAO();
    $respuesta = $emaild->listSectores();

    return $respuesta;
  }

  public function ctrListarSubSectores($id_sector)
  {


    $emaild = new UsuarioDAO();
    $respuesta = $emaild->listSubSectores($id_sector);

    return $respuesta;
  }
  public function ctrListarCargo($id_subsector)
  {


    $emaild = new UsuarioDAO();
    $respuesta = $emaild->listCargo($id_subsector);
    return $respuesta;
  }

  public function ctrListaremailsMovil($pagina, $cantidad)
  {


    $tabla = "emails";
    $emaild = new UsuarioDAO();
    $respuesta = $emaild->listemailMovil($pagina, $cantidad);

    return $respuesta;
  }
  public function ctrContaremailsMovil()
  {


    $tabla = "emails";
    $emaild = new UsuarioDAO();
    $respuesta = $emaild->contaremailMovil();

    return $respuesta;
  }


  public function ctrContaremails()
  {


    $tabla = "emails";
    $emaild = new UsuarioDAO();
    $respuesta = $emaild->contaremails();

    return $respuesta;
  }





  public function ctrActualizarEstadoemail($id, $email)
  {


    $tabla = "emailsweb";
    $datos = array(
      "id" => $id,
      "email" => $email
    );
    $emaild = new UsuarioDAO();
    $respuesta = $emaild->updatestatususer($tabla, $datos);

    return $respuesta;
  }


  public function ctrEliminarRegistro($id)
  {


    $tabla = "reconocimiento";
    $datos = array("id" => $id);
    $emaild = new UsuarioDAO();
    $respuesta = $emaild->datedelete($tabla, $datos);

    return $respuesta;
  }

  public function ctrActualizarEstadoemailMovil($id, $email)
  {
    $tabla = "emails";
    $datos = array(
      "id" => $id,
      "email" => $email
    );
    $emaild = new UsuarioDAO();
    $respuesta = $emaild->updatestatususer($tabla, $datos);

    return $respuesta;
  }

  public function ctrloginUserWeb()
  {

    require_once 'modelo/utilitario.php';
    $mutil = new Utils();
    $mutil->console_log('entro login');
    if (isset($_POST["IniciarSesion"])) {
      $mutil->console_log('entro post login');
      $datos = array(
        "email" => $_POST["email"],
        "contraseña" => $_POST["contraseña"]
      );

      $tabla = "email";
      $emaild = new UsuarioDAO();
      $respuesta = $emaild->loginUserWeb($datos);

      //return $respuesta;
      if (is_null($respuesta)) {
        $mutil->console_log('null respuesta');
        return "0|Error de conexión al servidor";
      } else {
        $mutil->console_log('respuesta no null');
        return $respuesta;
      }
    } else {
      return "-1|";
    }
  }


  public function ctrRegistroemailMovil()
  {

    if (isset($_POST["id"])) {
      if (($_POST["contraseña"]) == ($_POST["contraseña2"])) {
        if (($_POST["id"]) == 0) {
          if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/', $_POST["nombres"])) {

            $directorio = 'fotoperfil/';
            $subir_archivo = $directorio . basename($_FILES['subir_archivo']['name']);
            if (move_uploaded_file($_FILES['subir_archivo']['tmp_name'], $subir_archivo)) {
              //  echo "El archivo es válido y se cargó correctamente.<br><br>";
              $datos = array(
                "Nombres" => $_POST["nombres"],
                "Apellidos" => $_POST["apellidos"],
                "Ci" => $_POST["ci"],
                "FechaNatal" => $_POST["fechanatal"],
                "Region" => $_POST["region"],
                "Sector" => $_POST["sector"],
                "SubSector" => $_POST["subsector"],
                "Cargo" => $_POST["cargo"],
                "Imagen" => $subir_archivo,
                "email" => $_POST["email"],
                "contraseña" => $_POST["contraseña"]
              );

              $tabla = "emails";
              $emaild = new UsuarioDAO();
              $respuesta = $emaild->adduserMovil($tabla, $datos);
              return $respuesta;
            } else {
              return "La subida ha fallado";
            }
          } else {
            return "Se ha introducido Caracteres invalidos en el nombre";
          }
        } else {
          if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/', $_POST["nombre"])) {
            $directorio = 'fotoperfil/';
            $subir_archivo = $directorio . basename($_FILES['subir_archivo']['name']);
            if (move_uploaded_file($_FILES['subir_archivo']['tmp_name'], $subir_archivo)) {

              $datos = array(
                "id" => $_POST["id"],
                "Nombres" => $_POST["nombres"],
                "Apellidos" => $_POST["apellidos"],
                "Ci" => $_POST["ci"],
                "FechaNatal" => $_POST["fechanatal"],
                "Region" => $_POST["region"],
                "Sector" => $_POST["sector"],
                "SubSector" => $_POST["subsector"],
                "Cargo" => $_POST["cargo"],
                "Imagen" => $subir_archivo,
                "email" => $_POST["email"],
                "contraseña" => $_POST["contraseña"]
              );

              $tabla = "emails";
              $emaild = new UsuarioDAO();
              $respuesta = $emaild->updateuserMovil($tabla, $datos);

              //return $respuesta;
              if ($respuesta == true) {
                return "true";
              } else {
                return $respuesta;
              }
            } else {
              return "La subida ha fallado";
            }
          } else {
            return "Se ha introducido Caracteres invalidos en el nombre";
          }
        }
      } else {
        return "Las contraseñas no coinciden";
      }
    } else {
      return "";
    }
  }

  public function ctrBuscar($region, $sector, $subsector, $cargo)
  {


    $tabla = "emails";
    $emaild = new UsuarioDAO();
    $respuesta = $emaild->listcantidaduser($region, $sector, $subsector, $cargo);

    return $respuesta;
  }

  public function ctrListarPerfilemail()
  {



    $region = $_POST["region"];
    $datos = $_POST["datos"];
    if (isset($_POST["region"])) {
      if ($region != "seleccione") {


        $datos = array(
          "region" => $_POST["region"],
          "datos" => $_POST["datos"]
        );
        $tabla = "emails";
        $emaild = new UsuarioDAO();
        $respuesta = $emaild->listperfildeuser($tabla, $datos);

        return $respuesta;
      }
    } else {
      $datos = array(
        "datos" => $_POST["datos"],
        "region" => ""


      );

      $tabla = "emails";
      $emaild = new UsuarioDAO();
      $respuesta = $emaild->listperfildeuser($tabla, $datos);

      return $respuesta;
    }
    $datos = array(
      "datos" => "",
      "region" => ""
    );

    $tabla = "emails";
    $emaild = new UsuarioDAO();
    $respuesta = $emaild->listperfildeuser($tabla, $datos);

    return $respuesta;
  }



  public function ctrImagenemail($id)
  {
    $datos = array("id" => $id);

    $tabla = "emails";
    $emaild = new UsuarioDAO();
    $respuesta = $emaild->imagenUser($tabla, $datos);

    return $respuesta;
  }

  public function ctrCargoUser($id)
  {
    $datos = array("id" => $id);

    $tabla = "emails";
    $emaild = new UsuarioDAO();
    $respuesta = $emaild->CargoUser($tabla, $datos);

    return $respuesta;
  }

  public function ctrLogrosUser($id)
  {
    $datos = array("id" => $id);

    $tabla = "emails";
    $emaild = new UsuarioDAO();
    $respuesta = $emaild->LogrosUser($tabla, $datos);

    return $respuesta;
  }

  public function ctrPuntajeUser($id)
  {
    $datos = array("id" => $id);
    $tabla = "emails";
    $emaild = new UsuarioDAO();
    $respuesta = $emaild->PuntajeUser($tabla, $datos);

    return $respuesta;
  }


  public function ctrImagenUser($id)
  {
    $datos = array("id" => $id);
    $tabla = "emails";
    $emaild = new UsuarioDAO();
    $respuesta = $emaild->ImageUser($tabla, $datos);

    return $respuesta;
  }


  public function ctrListarUserModal($id)
  {
    $datos = array("id" => $id);
    $tabla = "emails";
    $emaild = new UsuarioDAO();
    $respuesta = $emaild->listmodal($tabla, $datos);

    return $respuesta;
  }


  public function ctrListarlogroscantidad()
  {

    if (isset($_POST["fechaini"])) {
      $fechaini = $_POST["fechaini"];
      $fechafin = $_POST["fechafin"];


      $fechaini1 = "01/01/2000";
      if ($fechaini != "") {
        $fechaini1 = $fechaini;
      }


      $fechafin1 = "01/01/2000";
      if ($fechafin != "") {
        $fechafin1 = $fechafin;
      }


      $fechaini1 = "01/01/2000";
      if ($fechaini != "00/00/0000") {
        $fechaini1 = $fechaini;
      }


      $fechafin1 = "01/01/2000";
      if ($fechafin != "00/00/0000") {
        $fechafin1 = $fechafin;
      }
      $datos = array(
        "fechaini" => $fechaini1,
        "fechafin" => $fechafin1
      );



      $tabla = "emails";
      $emaild = new UsuarioDAO();
      $respuesta = $emaild->listlogrosuser($tabla, $datos);

      return $respuesta;
    } else {





      $datos = array(
        "fechaini" => "",
        "fechafin" => ""

      );

      $tabla = "emails";
      $emaild = new UsuarioDAO();
      $respuesta = $emaild->listlogrosuser($tabla, $datos);

      return $respuesta;
    }


    $datos = array(
      "fechaini" => "",
      "fechafin" => ""

    );

    $tabla = "emails";
    $emaild = new UsuarioDAO();
    $respuesta = $emaild->listlogrosuser($tabla, $datos);

    return $respuesta;
  }
}
