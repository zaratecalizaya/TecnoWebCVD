<?php

    require_once 'Controlador/logros.controlador.php';
    $cgrupo = new ControladorLogro();
    $resultado=  $cgrupo ->   ctrActualizarEstadoComportamiento($_POST['id']);
    
    echo $resultado;
?>