<?php

    require_once 'Controlador/usuario.controlador.php';
    $cdato = new ControladorUsuario();
    $resultado=  $cdato ->  ctrActualizarEstadoGrupoComportamiento($_POST['id']);
    
    echo $resultado;
?>