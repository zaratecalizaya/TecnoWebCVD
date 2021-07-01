<?php

    require_once 'Controlador/usuario.controlador.php';
    $cgrupo = new ControladorUsuario();
    $resultado=  $cgrupo ->  ctrLogrosUser($_POST['id']);
    
    echo $resultado;
?>