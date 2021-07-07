<?php
$html = '';

  require_once 'modelo/Funciones/GrupoComportamientoDAO.php';
  require_once 'modelo/utilitario.php';
  
  $id_grupo = $_POST['id_Grupo'];
  $mutil = new Utils();
  $mutil -> console_log('llego Grupo Comportamiento: '.$id_Grupo);
  
  $GrupoComportamientod = new GrupoComportamientoDAO();
  $respuesta = $GrupoComportamientod -> listGrupo($id_grupo);
  
  while (count($respuesta)>0){
    $Comportamiento = array_shift($respuesta);
    $Did = array_shift($Comportamiento);
    $Dnombre = array_shift($Comportamiento);
    $html .= '<option value="'.$Did.'">'.$Dnombre.'</option>';
  }
  //$html .= '<option value="1">Salio id '.$id_category.'</option>';
  echo $html;
?>