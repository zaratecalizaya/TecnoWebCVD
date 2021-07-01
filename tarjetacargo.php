<?php

    require_once 'Controlador/usuario.controlador.php';
    $cgrupo = new ControladorUsuario();
    $resultado=  $cgrupo ->  ctrCargoUser($_POST['id']);
    
    echo $resultado;
?>