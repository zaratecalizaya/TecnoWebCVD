<?php


    require_once 'modelo/Conexion/connectbd.php';
    // connecting to database
    $db = new DB_Connect();
    $link=$db->connect(); 


    
    $result=mysqli_query($link, "DELETE from categoria_vehiculo where id_categoria ='".$_POST["cate"]."' and id_vehiculo = ".$_POST["vehi"]);
   

      if($result==1){
        header("Location: Categoria.php");
    } else{
        echo "Error a eliminar";
        echo $result;
        echo $_POST["cate"];
        
    }
   
?>