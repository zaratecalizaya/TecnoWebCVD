<?php


    require_once 'modelo/Conexion/connectbd.php';
    // connecting to database
    $db = new DB_Connect();
    $link=$db->connect(); 


    
    $result=mysqli_query($link,"DELETE from unidad_medida where id_unidad = ".$_POST["idmedida"]);
   

      if($result==1){
        header("Location: Unidadmedida.php");
    } else{
        echo "Error a eliminar";
        echo $result;
        echo $_POST["idmedida"];
        
    }
   
?>