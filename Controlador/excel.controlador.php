<?php

  require_once 'modelo/Funciones/ExportarExcelDAO.php';
  require_once 'modelo/utilitario.php';

class ControladorExcel{
  
    /* ==============================
     Registro de Usuario Web     
     ===============================*/
  
   


      public function ctrExportarExcel(){

        if(isset($_POST["fechaini"]) ){ 
          
        $fechaini1="01/01/2000";
        if($fechaini !="" ){
           $fechaini1=$fechaini;
        }
        
        
        $fechafin1="01/01/2000";
        if($fechafin !="" ){
           $fechafin1=$fechafin;
        }
      
        
        $fechaini1="01/01/2000";
        if($fechaini !="00/00/0000" ){
           $fechaini1=$fechaini;
        }
        
        
        $fechafin1="01/01/2000";
        if($fechafin !="00/00/0000" ){
           $fechafin1=$fechafin;
        }
          $datos = array(
          "fechaini"=>$fechaini1,
          "fechafin"=>$fechafin1 );
          
         
      
          $tabla = "usuarios";
          $Usuariod = new ExportarDAO();   
          $respuesta = $Usuariod -> listlogrosuser($tabla,$datos);
      
          return $respuesta;
      
        }else{
      
      
        
         
      
       $datos = array(
       "fechaini"=>"",
       "fechafin"=>""
      
       );
      
        $tabla = "usuarios";
        $Usuariod = new ExportarDAO();   
        $respuesta = $Usuariod -> listlogrosuser($tabla,$datos);
      
        return $respuesta;
      
       }
       
      
   
      
      }
      

   





}

?>