<?php

header('Content-Type:text/xls; charset=utf-8');
header('Content-Disposition: attachment;filename="Reportes.xls"');

?>
   
  <table style="text-align: center;" border width="100%" height="50%" cellpadding="1" cellspacing="1" width="500">
  
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Puntaje</th>
                    <th>Grupo</th>
                    <th>Estado</th>
                    <th>Fecha Actualizacion</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                      require_once 'Controlador/logros.controlador.php';
   
                  
                       $clogro = new ControladorLogro();
                       $list=  $clogro -> ctrListarComportamientos(1,1000);
                    
                       while (count($list)>0){
                      $Comportamiento = array_shift($list);
                      echo "<tr>";
                      $Did = array_shift($Comportamiento);
                      echo "<td height='50'>".$Did."</td>";
                      $Dnombre = array_shift($Comportamiento);
                      echo "<td height='50'>".$Dnombre."</td>";
                      $Dpuntaje = array_shift($Comportamiento);
                      echo "<td height='50'>".$Dpuntaje."</td>";
                      $Didgrupo = array_shift($Comportamiento);
                      echo "<td height='50'>".$Didgrupo."</td>";
                      $Destado = array_shift($Comportamiento);
                      $Destadobtn="Habilitar";
                      $DestadoIco="thumbs-up";
                      echo "<td height='50'>".$Destado."</td>";
                     
                    
                     
                      echo "</tr>";
                      }
                    
                   ?> 
                    
                  
                  </tbody>
                </table>