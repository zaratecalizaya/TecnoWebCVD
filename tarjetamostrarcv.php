<?php

    require_once 'Controlador/RepuestoController.php';
    $cgrupo = new ControladorRepuesto();
    $resultado=  $cgrupo ->  ctrCategoriaVehiculo($_POST['idcategoria'],$_POST['idvehiculo']);
    
    echo $resultado;
?>