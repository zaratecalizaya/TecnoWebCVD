<?php

    require_once 'Controlador/usuario.controlador.php';
    $cgrupo = new ControladorUsuario();
    $resultado=  $cgrupo ->  ctrPuntajeUser($_POST['id']);
    
    echo $resultado;
?>