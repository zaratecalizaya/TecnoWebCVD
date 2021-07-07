<?php

header('Content-Type:text/xls; charset=latin1');
header('Content-Disposition: attachment;filename="Reportes.xls"');

?>
   
  <table style="text-align: center;" border width="100%" height="50%" cellpadding="1" cellspacing="1" width="500">
  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Puntaje Meta</th>
                    <th>Imagen</th>
                    <th>Estado</th>
                    
                    
                  </tr>
                  </thead>
                  <tbody>
                  <!--datos de la lista -->
                <?php 
                    require_once 'Controlador/logros.controlador.php';
                    $cgrupo = new ControladorLogro();
                    $list=  $cgrupo -> ctrListarGrupoCompotamientosTabla(1,1000);
                    
                    while (count($list)>0){
                      $Grupo = array_shift($list);
                      echo "<tr>";
                      $Did = array_shift($Grupo);
                      echo "<td height='50'>".$Did."</td>";
                      $Dnombre = array_shift($Grupo);
                      echo "<td height='50'>".$Dnombre."</td>";
                      $DPuntajeMeta = array_shift($Grupo);
                      echo "<td height='50'>".$DPuntajeMeta."</td>";
                      $Darchivo = array_shift($Grupo);
                      if ($Darchivo!=""){
                        echo "<td height='50'><img src='".$Darchivo."' width='40' height='40'></td>";  
                      }else{
                        echo "<td></td>";
                      }
                      $Destado = array_shift($Grupo);
                      $Destadobtn="Habilitar";
                      $DestadoIco="thumbs-up";
                      echo "<td>".$Destado."</td>";
                      echo "</tr>";
                    }
                    
                    ?>
                    
                  
                  </tbody>
                </table>