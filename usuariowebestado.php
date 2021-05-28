<?php

    require_once 'Controlador/usuario.controlador.php';
    $cusuario = new ControladorUsuario();
    $resultado=  $cusuario -> ctrActualizarEstadoUsuario($_POST['id'],$_POST['usuario']);
    
    echo $resultado;
?>