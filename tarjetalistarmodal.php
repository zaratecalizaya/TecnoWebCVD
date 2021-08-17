<?php

    require_once 'Controlador/CategoriaController.php';
    $cgrupo = new ControladorCategoria();
    $resultado=  $cgrupo ->  ctrListarCategoria();
    
    echo $resultado;
?>