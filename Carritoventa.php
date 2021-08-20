<?php

session_start();




$mensaje="";

if(isset($_POST['btnAccion'])){

    switch($_POST['btnAccion']){



        case 'Agregar':
            $id=$_POST['idproducto'];
            $nombre=$_POST['nombre'];
            $precio=$_POST['precio'];
            $cantidad=$_POST['cantidad'];
            $marca=$_POST['marca'];
            $medida=$_POST['medida'];
            $idunidad=$_POST['idunidad'];
            $idalmacen=$_POST['idalmacen'];



            if(!isset($_SESSION['CARRITO'])){
                $producto=array(
                 'ID'=>$id,
                 'NOMBRE'=>$nombre,
                 'CANTIDAD'=>$cantidad,
                 'MARCA'=>$marca,
                 'PRECIO'=>$precio,
                 'MEDIDA'=>$medida,
                 'IDUNIDAD'=>$idunidad,
                 'IDALMACEN'=>$idalmacen              
                );
                $_SESSION['CARRITO'][0]=$producto;
            }else{
                $NumeroProductos=count($_SESSION['CARRITO']);
                $producto=array(
                    'ID'=>$id,
                    'NOMBRE'=>$nombre,
                    'CANTIDAD'=>$cantidad,  
                    'MARCA'=>$marca,
                    'PRECIO'=>$precio,
                    'MEDIDA'=>$medida,
                    'IDUNIDAD'=>$idunidad,
                    'IDALMACEN'=>$idalmacen
                );
                   $_SESSION['CARRITO'][$NumeroProductos]=$producto;

            }
            $mensaje=print_r($_SESSION,true);
            break;
            case "Eliminar":
                 foreach($_SESSION['CARRITO'] AS $indice=>$producto){
                    if($producto['ID']==$_POST['id']){
                      unset($_SESSION['CARRITO'][$indice]);
                      echo "<script>alert('elemento borrado');</script>";


                    }

                 }

                break;
            }
            
    }





?>