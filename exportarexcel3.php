<?php


header('Content-Type:text/xls; charset=utf-8');
header('Content-Disposition: attachment;filename="Reporte.xls"');

?>


<table style="text-align: center;" border width="100%" height="50%" cellpadding="1" cellspacing="1" width="1000">
                  <thead>
                    <tr>
                     <th>Id</th>
                     <th>Nombre</th>
                     <th>Cantidad de reconocimiento</th>
                     <th>Puntaje</th>                   
                    </tr>
                  </thead>
               <tbody>
                <?php 
                    require_once 'Controlador/usuario.controlador.php';
  
                  
                    $cuser = new ControladorUsuario();
                    $list=  $cuser -> ctrListarCargoUsuario();
                   
                    while (count($list)>0){
                      $cont = array_shift($list);
                      echo "<tr>";
                      $Did= array_shift($cont);
                      echo "<td height='50'>".$Did."</td>";
                      
                      $Dnombre= array_shift($cont);
                      echo "<td height='50'>".$Dnombre."</td>";
                      $Dcantidad= array_shift($cont);
                      echo "<td height='50'>".$Dcantidad."</td>";
                      
                      $Dsumando= array_shift($cont);
                      echo "<td height='50'>".$Dsumando."</td>";                     
                      
                 


                      echo "</tr>";
                    }               
                ?>   
              </tbody>
          </table>
