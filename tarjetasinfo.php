<?php

    require_once 'Controlador/usuario.controlador.php';
    $cgrupo = new ControladorUsuario();
    $resultado=  $cgrupo ->  ctrImagenUsuario($_POST['id']);
    
    echo $resultado;
?>