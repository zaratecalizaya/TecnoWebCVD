<?php

    require_once 'Controlador/logros.controlador.php';
    $cgrupo = new ControladorLogro();
    $resultado=  $cgrupo ->  ctrActualizarEstadoGrupoComportamiento($_POST['id']);
    
    echo $resultado;
?>