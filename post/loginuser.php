<?php
 if(isset($_POST["Usuario"])){
    
    $Usuario= $_POST['Usuario'];
    $Clave=$_POST['Clave'];
    
    include ("funciones.php");
            $datos = array("usuario"=>$Usuario,
                           "clave"=>$Clave);
            
            $tabla = "usuarios";
            $Usuariod = new Funciones();
            $respuesta = $Usuariod -> loginUsermovil($datos);
            
            //return $respuesta;
            if (is_null( $respuesta)){
              echo  "0|Error de conexión al servidor";
            }else{
              echo  $respuesta;  
            }            
     
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
                    <h1>Holis, si lees esto hubo un error en el sistema, contacte con su administrador. que tenga un lindo dia</h1>
                </div>
                 
        </body>
    </html>
 
        <?php
}
?>
