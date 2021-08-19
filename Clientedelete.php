<?php


    require_once 'modelo/Conexion/connectbd.php';
    // connecting to database
    $db = new DB_Connect();
    $link=$db->connect(); 


    
    $result=mysqli_query($link,"DELETE from cliente where id_cliente = ".$_POST["idcliente"]);
   

      if($result==1){
        header("Location: Cliente.php");
    } else{
        echo "Error a eliminar";
        echo $result;
        echo $_POST["idcliente"];
        
    }
   
?>