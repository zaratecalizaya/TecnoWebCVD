


<?php

require_once 'Controlador/RepuestoController.php';
    $cgrupo = new ControladorRepuesto();
    $resultado=  $cgrupo ->  ctrActualizarEstadoRepuesto($_POST['id']);
    
    echo $resultado;
?>