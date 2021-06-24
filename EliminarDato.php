<?php

    require_once 'Controlador/usuario.controlador.php';
    $creconocimiento = new ControladorUsuario();
    $resultado=  $creconocimiento ->   ctrEliminarRegistro($_POST['id']);
    
    echo $resultado;
?>