<?php

header('Content-Type:text/xls; charset=utf-8');
header('Content-Disposition: attachment;filename="Reportes.xls"');

?>
   
  <table style="text-align: center;" border width="100%" height="50%" cellpadding="1" cellspacing="1" width="1000">
  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Fecha Nacimiento</th>
                    <th>Cargo</th>
                    <th>CI</th>
                    <th>Region</th>
                    <th>Sector</th>
                    <th>SubSector</th>
                    <th>Usuario</th>
                    <th>Estado</th>
                    <th>Nivel</th>
                    <th>Puntaje</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    require_once 'Controlador/usuario.controlador.php';
  
                  
                    $cusuario = new ControladorUsuario();
                    $list=  $cusuario -> ctrListarUsuariosMovil(1,1000);
                    
                    while (count($list)>0){
                      $User = array_shift($list);
                      echo "<tr>";
                      $Did = array_shift($User);
                      echo "<td height='50'>".$Did."</td>";
                      $Dnombres = array_shift($User);
                      echo "<td height='50'>".$Dnombres."</td>";
                      $Dapellidos = array_shift($User);
                      echo "<td height='50'>".$Dapellidos."</td>";
                      $Dfechanat = array_shift($User);
                      echo "<td height='50'>".$Dfechanat."</td>";
                      $Dcargo = array_shift($User);
                      echo "<td height='50'>".$Dcargo."</td>";
                      $Dci = array_shift($User);
                      echo "<td height='50'>".$Dci."</td>";
                      $Dregion = array_shift($User);
                      echo "<td height='50'>".$Dregion."</td>";
                      $Dsector = array_shift($User);
                      echo "<td height='50'>".$Dsector."</td>";
                      $Dsubsector = array_shift($User);
                      echo "<td height='50'>".$Dsubsector."</td>";
                      
                      $Dusuario = array_shift($User);
                      echo "<td height='50'>".$Dusuario."</td>";
                      $Destado = array_shift($User);
                      $Destadobtn="Habilitar";
                      $DestadoIco="thumbs-up";
                      echo "<td height='50'>".$Destado."</td>";
                      if ($Destado=="Habilitado"){
                        $Destadobtn="Deshabilitar";
                        $DestadoIco="thumbs-down";
                      }
                      $Dnivel = array_shift($User);
                      echo "<td height='50'>".$Dnivel."</td>";
                      $Dpuntaje = array_shift($User);
                      echo "<td height='50'>".$Dpuntaje."</td>";
                      $Dfechaact = array_shift($User);
                      $Darchivo = array_shift($User);
                      if ($Darchivo!=""){  
                      }else{
                        
                      }
                    
                      $Didcargo = array_shift($User);
                      $Didsubsector = array_shift($User);
                      $Didsector= array_shift($User);
                      echo "</tr>";
                    }
                 
                    ?>
                    
                  
                  </tbody>
                </table>