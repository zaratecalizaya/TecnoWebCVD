
<?php
 
 class ExportarDAO {
  
     private $db;
     // constructor
 
     function __construct() {
         require_once 'modelo/Conexion/connectbd.php';
         // connecting to database
 
         $this->db = new DB_Connect();
         $this->db->connect();
 
     }
  
     // destructor
     function __destruct() {
  
     }
     
      
     /**
      * agregar nuevo usuarigrupoComportamiento
      */
      public function listlogrosuser($tabla,$datos){
    	require_once 'modelo/Conexion/connectbd.php';
      require_once 'modelo/utilitario.php';
        // connecting to database
        $this->db = new DB_Connect();
        $link=$this->db->connect();
        
         $fechaini=$datos["fechaini"];
         $fechafin=$datos["fechafin"];
         $fullname='';
         
         header('Content-Type:text/csv; charset=latin1');
         header('Content-Disposition: attachment;filename="Reporte_Fechas_Ingreso.csv"');


         $salida=fopen('php://output','w');

          fputcsv($salida,array('Id','Usuario','Logros','Nombre','Cantidad'));
        $query = "SELECT  ug.Id,u.Nombres, u.Apellidos,gc.Imagen,gc.Nombre,ug.Cantidad from usuarios u inner join usuariogrupo ug on ug.IdUsuario=u.Id inner join grupocomportamiento gc on gc.Id=ug.IdGrupo where 1=1 " ;
		    
        

        if($fechaini != '' && $fechafin != ''){
          
            $query = $query." and   ug.FActualizacion BETWEEN '".$fechaini."' and '". $fechafin ."'" ;
        
        }
     
        $result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error($link));
        $json = array();
        //$json =mysqli_num_rows($result);
        if(mysqli_num_rows($result)>0){
        		//$json['cliente'][]=nada;
        	while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

          //  $query = $query." and r.IdUsuario =".$line["id"] ;
               
                          

                $fullname=$line["Nombres"]."   ".$line["Apellidos"];
                
                fputcsv($salida,array($line["Id"] ,$fullname,$line["Imagen"],$line["Nombre"],$line["Cantidad"]));
         
          	
          }
			
        }
		
		



    }
     
   
 }
  
 ?>