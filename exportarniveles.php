<?php

header('Content-Type:text/xls; charset=latin1');
header('Content-Disposition: attachment;filename="Reportes.xls"');

?>
   
  <table style="text-align: center;" border width="100%" height="50%" cellpadding="1" cellspacing="1" width="500">
  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Numero</th>
                    <th>Puntaje Minimo</th>
                    <th>Grupos Minimo</th>
                    
                  </thead>
                  <tbody>
                 <?php 
                    require_once 'Controlador/logros.controlador.php';
  
                  
                    $clogro = new ControladorLogro();
                    $list=  $clogro -> ctrListarNivelTabla(1,1000);
                    
                    while (count($list)>0){
                      $Nivel = array_shift($list);
                      echo "<tr>";
                      $Did = array_shift($Nivel);
                      echo "<td height='50'>".$Did."</td>";
                      $Dnombre = array_shift($Nivel);
                      echo "<td height='50'>".$Dnombre."</td>";
                      $Dnumero = array_shift($Nivel);
                      echo "<td height='50'>".$Dnumero."</td>";
                      $Dpuntajemin = array_shift($Nivel);
                      echo "<td height='50'>".$Dpuntajemin."</td>";
                      $Dgrupomin = array_shift($Nivel);
                      echo "<td height='50'>".$Dgrupomin."</td>";
                      echo "</tr>";
                    }
                    
                    ?> 
                    
                  
                  </tbody>
                </table>