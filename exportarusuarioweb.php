<?php
header('Content-Type:text/xls; charset=latin1');
header('Content-Disposition: attachment;filename="Reporte.xls"');

?>


<table style="text-align: center;" border width="100%" height="50%" cellpadding="1" cellspacing="1" width="1000">
<thead>
                  <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Usuario</th>
                    <th>Estado</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    require_once 'Controlador/usuario.controlador.php';
  
                  
                    $cusuario = new ControladorUsuario();
                    $list=  $cusuario -> ctrListarUsuariosWeb(1,1000);
                    
                    while (count($list)>0){
                      $User = array_shift($list);
                      echo "<tr>";
                      $Did = array_shift($User);
                      echo "<td height='50'>".$Did."</td>";
                      $Dnombre = array_shift($User);
                      echo "<td height='50'>".$Dnombre."</td>";
                      $Dusuario = array_shift($User);
                      echo "<td height='50'>".$Dusuario."</td>";
                      $Destado = array_shift($User);
                      $Destadobtn="Habilitar";
                      $DestadoIco="thumbs-up";
                      echo "<td height='50'>".$Destado."</td>";
                      echo "</tr>";
                    }
                    
                    ?>
                    
                  
                  </tbody>
                </table>