<?php

header('Content-Type:text/xls; charset=utf-8');
header('Content-Disposition: attachment;filename="Reportes.xls"');

?>
   
  <table style="text-align: center;" border width="100%" height="50%" cellpadding="1" cellspacing="1" width="1000">
                  <thead>
                    <tr>
                     <th>Id</th>
                     <th>Usuario</th>
                     <th>Logros </th>
                     <th>Nombre </th>
                     <th>Cantidad</th>                   
                    </tr>
                  </thead>
               <tbody>
                <?php
                
                require_once 'Controlador/usuario.controlador.php';

                      $cuser = new ControladorUsuario(); 
                      $list=  $cuser -> ctrListarlogroscantidad();
                   
                     while (count($list)>0){
                      $cont = array_shift($list);
                      echo "<tr>";
                      $Did= array_shift($cont);
                      echo "<td   >".$Did."</td>";
                      
                      $Dnombre= array_shift($cont);
                      echo "<td  height='50' >".$Dnombre."</td>";

                      $Darchivo = array_shift($cont);
                      if ($Darchivo!=""){
                        echo "<td  height='50'><img src='".$Darchivo."' width='50' height='50'></td>";  
                      }else{
                        echo "<td></td>";
                      }


                      $Dlogro= array_shift($cont);
                      echo "<td  height='50'>".$Dlogro."</td>";
                      
                      $Dcantidad= array_shift($cont);
                      echo "<td  height='50'>".$Dcantidad."</td>";                     
                   
                 


                      echo "</tr>";
                    }               
                ?>   
              </tbody>
          </table>