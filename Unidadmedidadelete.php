<?php

    require_once 'Controlador/UnidadmedidaController.php';
    $cunidadmedida = new ControladorUnidadmedida();
    $resultado=  $cunidadmedida -> ctrListarUnidadmedida($_POST['id']);
    
    echo $resultado;
?>