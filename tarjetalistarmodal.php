<?php

    require_once 'Controlador/usuario.controlador.php';
    $cgrupo = new ControladorUsuario();
    $resultado=  $cgrupo ->  ctrListarUserModal($_POST['id']);
    
    echo $resultado;
?>