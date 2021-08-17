<?php
$html = '';

  require_once 'modelo/Funciones/vehiculoDAO.php';
  require_once 'modelo/utilitario.php';
  
  $nombre = $_POST['nombre'];
  $mutil = new Utils();
  $mutil -> console_log('llego marca: '.$nombre);
  
  $Usuariod = new VehiculosDAO();
  $respuesta = $Usuariod -> listModelo($nombre);
  $mutil -> console_log('llego marca: '.$respuesta);
  while (count($respuesta)>0){
    $User = array_shift($respuesta);
   
    $Dnombres = array_shift($User);
    $html .= '<option >'.$Dnombres.'</option>';
  }
  //$html .= '<option value="1">Salio id '.$id_category.'</option>';
  echo $html;
?>