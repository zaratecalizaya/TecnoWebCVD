<?php


    require_once 'modelo/Conexion/connectbd.php';
    // connecting to database
    $db = new DB_Connect();
    $link=$db->connect(); 


    
    $result=mysqli_query($link,"DELETE from empleado where id_empleado = ".$_POST["idempleado"]);
   

      if($result==1){
        header("Location: Empleado.php");
    } else{
        echo "Error a eliminar";
        echo $result;
        echo $_POST["idempleado"];
        
    }
   
?>