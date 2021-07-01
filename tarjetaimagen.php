<?php

    require_once 'Controlador/usuario.controlador.php';
    $cgrupo = new ControladorUsuario();
    $resultado=  $cgrupo ->  ctrImagenUser($_POST['id']);
    
    echo $resultado;
?>