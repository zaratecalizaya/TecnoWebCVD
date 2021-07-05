<?php

    require_once 'Controlador/excel.controlador.php';
    $cgrupo = new ControladorExcel();
    $resultado=  $cgrupo ->  ctrExportarExcel();
    
    echo $resultado;
?>