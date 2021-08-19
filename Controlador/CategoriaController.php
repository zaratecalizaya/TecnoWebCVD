<?php

require_once 'modelo/Funciones/CategoriaDAO.php';
require_once 'modelo/utilitario.php';

class ControladorCategoria{
  
    /* ==============================
     Registro de Usuario Web     
     ===============================*/
  
    
 
///aqui
    public function ctrRegistroCategoria(){
      
      if(isset($_POST["id"])){
       
       $mutil = new Utils();
                 //   $mutil -> console_log('esta ingresando');
                    
                    
                 if(($_POST["id"])==0){
            
          
              
                  $datos = array("nombre"=>$_POST["nombre"],
                  "tipo"=>$_POST["tipo"]
                  );
          
                  $tabla = "categoria";
                  $Categoriad = new CategoriaDAO();
                  $respuesta = $Categoriad ->addCategoria($tabla,$datos);
                 // return $respuesta;  
                  if ($respuesta==true){
                    return "true";
                  }else{
                    return $respuesta;  
                  }        
        
          }else{
           
                $datos = array("id"=>$_POST["id"],
                "nombre"=>$_POST["nombre"],
                "tipo"=>$_POST["tipo"]        );
          
                $tabla = "categoria";
                $Categoriad = new CategoriaDAO();
                $respuesta = $Categoriad -> updateCategoria($tabla,$datos);
          
                //return $respuesta;
                if ($respuesta==true){
                  return "true";
                }else{
                  return $respuesta;  
                }
          }
        
      }else{
        return "";
      }
      
  }
  



      public function ctrListarCategoria(){
      
        
            
       $tabla = "categoria";
       $Vehiculod = new CategoriaDAO();
        $respuesta = $Vehiculod -> listCategoria();
    
        return $respuesta;
  
      }

      
      public function ctrListarDetalleCategoria(){
      
        
            
        $tabla = "categoria_vehiculo";
        $Vehiculod = new CategoriaDAO();
         $respuesta = $Vehiculod -> listCategoriadetalle();
     
         return $respuesta;
   
       }
 
       

      

      public function ctrActualizarEstadoVehiculo($id){
      

        $tabla = "vehiculo";
        $datos = array("id"=>$id);
        $Vehiculod = new VehiculosDAO();
        $respuesta = $Vehiculod -> updatestatusvehiculo($tabla,$datos);
        return $respuesta; 
        
      
    }

    
    public function ctrCategoriaVehiculo(){
      $mutil = new Utils();
      $mutil -> console_log("recibiendo");
      if(isset($_POST["categoria"]) ){
        
       


        
        $descripcion=$_POST["descripcion"];

        
        $categoria=$_POST["categoria"];
       
        $sector=$_POST["sector"];
               $id_sector=intval($sector);
               //$mutil -> console_log($id_sector);
               //$mutil -> console_log($categoria);
          $datos = array(
          "categoria"=>$categoria,
          "sector"=>$id_sector,
          "descripcion"=>$descripcion
        );
          
         
             
        
      
      $Vehiculod = new CategoriaDAO();
      $respuesta = $Vehiculod -> addCategoriadetalle($datos);
      return $respuesta;
      }
       
      
    
  }

      
    


    
}

?>