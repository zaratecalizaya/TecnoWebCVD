<?php

require_once 'modelo/Funciones/repuestoDAO.php';
require_once 'modelo/utilitario.php';

class ControladorRepuesto{
  
    /* ==============================
     Registro de Usuario Web     
     ===============================*/
  
    
     public function ctrRegistroRepuesto(){
      
      if(isset($_POST["id"])){
       
       $mutil = new Utils();
                 //   $mutil -> console_log('esta ingresando');
                    
                    
                    if(($_POST["id"])==0){
            
          
              
              $subir_archivo = 'imagenes/'.basename($_FILES['subir_archivo']['name']);
              if (move_uploaded_file($_FILES['subir_archivo']['tmp_name'], $subir_archivo)) {
               // $mutil -> console_log('esta ingresando');
                  $datos = array("nombre"=>$_POST["nombre"],
                  "imagen"=>$subir_archivo, 
                        "descripcion"=>$_POST["descripcion"],
                         "marca"=>$_POST["marca"],
                         "precio"=>$_POST["precio"],
                         "idcategoria"=>$_POST["idcategoria"],
                         
                         "idvehiculo"=>$_POST["idvehiculo"]
                         );
          
                  $tabla = "repuesto";
                  $Vehiculod = new RepuestoDAO();
                  $respuesta = $Vehiculod -> addrepuesto($tabla,$datos);
                 // return $respuesta;  
                  if ($respuesta==true){
                    return "true";
                  }else{
                    return $respuesta;  
                  }



              } else {


                $datos = array("nombre"=>$_POST["nombre"],
                "imagen"=>"", 
                      "descripcion"=>$_POST["descripcion"],
                       "marca"=>$_POST["marca"],
                       "precio"=>$_POST["precio"],
                       "idcategoria"=>$_POST["idcategoria"],
                       
                       "idvehiculo"=>$_POST["idvehiculo"]
                       
                         );
          
                         $tabla = "repuesto";
                         $Vehiculod = new RepuestoDAO();
                         $respuesta = $Vehiculod -> addrepuesto($tabla,$datos);
                  if ($respuesta==true){
                    return "true";
                  }else{



                    return $respuesta;  
                  }

               // return "La subida de imagen ha fallado";
              }          
        
          }else{
           
                $datos = array("id"=>$_POST["id"],
                "nombre"=>$_POST["nombre"], 
                        "descripcion"=>$_POST["descripcion"],
                         "marca"=>$_POST["marca"],
                         "precio"=>$_POST["precio"],
                         "idcategoria"=>$_POST["idcategoria"],
                         
                         "idvehiculo"=>$_POST["idvehiculo"]
                                  );
          
                                  $tabla = "repuesto";
                                  $Vehiculod = new RepuestoDAO();
                                  $respuesta = $Vehiculod -> updaterepuesto($tabla,$datos);
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


  public function ctrListarRepuesto($pagina,$cantidad){
      
            
    $tabla = "repuesto";
    $Almacend = new RepuestoDAO();
     $respuesta = $Almacend -> listRepuesto($pagina,$cantidad);
 
     return $respuesta;

   }



  

  /* public function ctrRegistroMedida(){
      
    if(isset($_POST["id"])){
     
     $mutil = new Utils();
                // $mutil -> console_log('esta ingresando');
                  
                  
               if(($_POST["id"])==0){
          
        
            
                $datos = array("nombre"=>$_POST["nombre"]
                
                );
        
                $tabla = "unidad_medida";
                $Categoriad = new RepuestoDAO();
                $respuesta = $Categoriad ->addMedida($tabla,$datos);
               // return $respuesta;  
                if ($respuesta==true){
                  return "true";
                }else{
                  return $respuesta;  
                }        
      
        }else{
         
              $datos = array("id"=>$_POST["id"],
              "nombre"=>$_POST["nombre"]     );
        
              $tabla = "unidad_medida";
              $Categoriad = new RepuestoDAO();
              $respuesta = $Categoriad -> updateMedida($tabla,$datos);
        
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
*/

public function ctrListarMedida(){
      
            
  $tabla = "unidad_medida";
  $Almacend = new RepuestoDAO();
   $respuesta = $Almacend -> listMedida();

   return $respuesta;

 }



///aqui
    public function ctrRegistroAlmacen(){
      
      if(isset($_POST["id"])){
       
       $mutil = new Utils();
                 //   $mutil -> console_log('esta ingresando');
                    
                    
                    if(($_POST["id"])==0){
            
          
              
               // $mutil -> console_log('esta ingresando');
                  $datos = array("nombre"=>$_POST["nombre"]
                         );
          
                  $tabla = "almacen";
                  $Almacend = new RepuestoDAO ();
                  $respuesta = $Almacend -> addAlmacen($tabla,$datos);
                 // return $respuesta;  
                  if ($respuesta==true){
                    return "true";
                  }else{
                    return $respuesta;  
                  }



               // return "La subida de imagen ha fallado";
              
        
          }else{
           
                $datos = array("id"=>$_POST["id"],
                "nombre"=>$_POST["nombre"]                         );
          
                $tabla = "almacen";
                $Almacend = new RepuestoDAO();
                $respuesta = $Almacend -> updateAlmacen($tabla,$datos);
          
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
  



      public function ctrListarAlmacen($pagina,$cantidad){
      
            
       $tabla = "almacen";
       $Almacend = new RepuestoDAO();
        $respuesta = $Almacend -> listAlmacen($pagina,$cantidad);
    
        return $respuesta;
  
      }


      public function ctrListarAlmacenselect(){
      
            
        $tabla = "almacen";
        $Almacend = new RepuestoDAO();
         $respuesta = $Almacend -> listAlmacenselect();
     
         return $respuesta;
   
       }


 
       
      public function ctrListarRepuestoDetalle(){
      
            
       
        $Almacend = new RepuestoDAO();
         $respuesta = $Almacend -> listProductodetalle();
     
         return $respuesta;
   
       }



      

      public function ctrActualizarEstadoRepuesto($id){
      

        $tabla = "repuesto";
        
        $Vehiculod = new RepuestoDAO();
        $respuesta = $Vehiculod -> updatestatusrepuesto($tabla,$id);
        return $respuesta; 
        
      
    }
      
    public function ctrCategoriaVehiculo($idcategoria,$idvehiculo){
      
      $Vehiculod = new RepuestoDAO();
      $respuesta = $Vehiculod -> Capturandodatos($idcategoria,$idvehiculo);
      return $respuesta; 
      
    
  }
  


   
  public function ctrRespuestoMedida(){
    $mutil = new Utils();
   // $mutil -> console_log("recibiendo");
    if(isset($_POST["categoria"]) ){
      
     


      
      $cantidad=$_POST["cantidad"];

      
      $medida=$_POST["categoria"];
     
      $producto=$_POST["id_producto"];
             
            // $mutil -> console_log($cantidad);
            // $mutil -> console_log($medida);
             //$mutil -> console_log($producto);
        $datos = array(
        "cantidad"=>$cantidad,
        "medida"=>$medida,
        "producto"=>$producto
      );
        
       
           
      
    
    $Vehiculod = new RepuestoDAO();
    $respuesta = $Vehiculod -> addrepuestosdetalle($datos);
    return $respuesta;
    }
     
    
  
}

public function ctralmacenrepuesto(){
    $mutil = new Utils();
   // $mutil -> console_log("recibiendo");
    if(isset($_POST["categoria"]) ){
      
     


      
      $stock=$_POST["cantidad"];

      
      $almacen=$_POST["categoria"];
     
      $idproducto=$_POST["id_producto"];
      $idmedida=$_POST["id_medida"];
             
            // $mutil -> console_log($cantidad);
            // $mutil -> console_log($medida);
             //$mutil -> console_log($producto);
        $datos = array(
        "stock"=>$stock,
        "almacen"=>$almacen,
        "idproducto"=>$idproducto,
        "idmedida"=>$idmedida
      );
        
       
           
      
    
    $Vehiculod = new RepuestoDAO();
    $respuesta = $Vehiculod ->addalmacendetalle($datos);
    return $respuesta;
    }
     
    
  
}



public function ctrListarAlmacenDetalle(){
      
            
       
  $Almacend = new RepuestoDAO();
   $respuesta = $Almacend -> listAlmacendetalle();

   return $respuesta;

 }

 public function ctrListarAlmacenDetalleCompra(){
      
            
       
  $Almacend = new RepuestoDAO();
   $respuesta = $Almacend ->listAlmacendetalleCompra();

   return $respuesta;

 }

  

    
}

?>