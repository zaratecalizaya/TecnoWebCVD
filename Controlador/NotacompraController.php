<?php

require_once 'modelo/Funciones/NotacompraDAO.php';
require_once 'modelo/utilitario.php';

class ControladorNotacompra{
  
    /* ==============================
     Registro de Usuario Web     
     ===============================*/
  
    
 
 ///aqui
  



    public function ctrRegistroNotacompra(){
      
        if(isset($_POST["id"])){
         
         $mutil = new Utils();
                   //   $mutil -> console_log('esta ingresando');
                      
                      
                      if(($_POST["id"])==0){
              
            
                
                 // $mutil -> console_log('esta ingresando');
                      $datos = array(
                        "fecha_compra"=>$_POST["fecha_compra"],
                        "precio_total"=>$_POST["precio_total"],
                       
                        
                     
                       // "imagen"=>""
                        );
                    $tabla = "nota_compra";
                    $Notacomprad = new NotacompraDAO ();
                    $respuesta = $Notacomprad ->addNotacompra($tabla,$datos);

                   // return $respuesta;  
                    if ($respuesta==true){
                      return "true";
                    }else{
                      return $respuesta;  
                    }
  
  
  
                 // return "La subida de imagen ha fallado";
                
          
            }else{
             
                $datos = array("id"=>$_POST["id"],
                "fecha_compra"=>$_POST["fecha_compra"],
                "precio_total"=>$_POST["precio_total"],
              
                 
                   // "imagen"=>""
                    );
            
                  $tabla = "nota_compra";
                  $Notacomprad = new NotacompraDAO();
                  $respuesta = $Notacomprad -> updateNotacompra($tabla,$datos);
            
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



      public function ctrListarNotacompra($pagina,$cantidad){
      
            
       $tabla = "proveedor";
       $Notacomprad = new ProveedorDAO();
      $respuesta = $Notacomprad -> listNotacompra($pagina,$cantidad);
    
        return $respuesta;
  
      }




      

      //public function ctrActualizarEstadoVehiculo($id){
      

       // $tabla = "vehiculo";
       // $datos = array("id"=>$id);
       // $Vehiculod = new VehiculosDAO();
        //$respuesta = $Vehiculod -> updatestatusvehiculo($tabla,$datos);
      //  return $respuesta; 
        
      
    }
      
    


    


?>