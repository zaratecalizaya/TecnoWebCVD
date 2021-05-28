<?php
 if(isset($_POST["Nombre"])){
    
    $Nombre= $_POST['Nombre'];
    $FechaNatal=$_POST['FechaNatal'];
    $Telefono=$_POST['Telefono'];
    $Correo=$_POST['Correo'];
    $Genero=$_POST['Genero'];



    require_once 'datos/funciones_bd.php';
    $db = new funciones_BD();
    // regproducto($Nombre,$Codp,$Precio,$Imagen,$Coduni,$Codsup)
    if($db->regcliente($Nombre,$FechaNatal,$Telefono,$Correo,$Genero)){

     	$resultado="Se registro correctamente el Usuario";
    }else{
     	$resultado="Error al registrar el usuario, Consulte con su administrador.";
    }

    echo $resultado;

 }else{
    ?>
    
     <!DOCTYPE html>
    <html>
        <head>
            <title>Ipax Studio</title>
            <style>
                body{
                    background-color: black;
                }
                .box{
                    background-color: white;
                    margin: 10px;
                    padding: 10px;
                }
            </style>
        </head>
        <body>
             
                <div class="box">
                    <h1>Holis</h1>
                </div>
                 
        </body>
    </html>
 
        <?php
}
?>
