<?php
header('Content-Type:text/xls; charset=utf-8');
header('Content-Disposition: attachment;filename="Reporte.xls"');

?>


<table style="text-align: center;" border width="100%" height="50%" cellpadding="1" cellspacing="1" width="1000">
                  <thead>
                  <tr>
                  <th>Id</th>
                  
                    <th>Usuario</th>
                    <th>Compañero</th>
                    <th>Logo</th>
                    <th>Comportamiento</th>
                    <th>Comentario</th>                    
                </tr>
                  </thead>
                  <tbody>
                    <?php 
                    require_once 'Controlador/usuario.controlador.php';
  
                  
                    $cuser = new ControladorUsuario();
                    $list=  $cuser -> ctrListarPerfilUsuario();
                            
                       while (count($list)>0){
                      $perfil = array_shift($list);
                      echo "<tr>";
                      
                      $Did= array_shift($perfil);
                      echo "<td height='50'>".$Did."</td>";
 
                      $Didusuario= array_shift($perfil);  
                      $Dusuario= array_shift($perfil);
                      echo "<td height='50'>".$Dusuario."</td>";
                      $Dcolega= array_shift($perfil);
                      echo "<td height='50'>".$Dcolega."</td>";
                      
                      $Dlogo= array_shift($perfil);  
                      if ($Dlogo!=""){
                        echo "<td height='50'><img loading='lazy' src='".$Dlogo."' width='40' height='40'></td>";  
                      }else{
                        echo "<td></td>";
                      }
                      $Dcomportamiento= array_shift($perfil);
                      echo "<td height='50'>".$Dcomportamiento."</td>";
                      
                      $Dcomentario= array_shift($perfil);
                      echo "<td height='50'>".$Dcomentario."</td>";
                      echo "</tr>";
                      }
                    
                   ?> 
                    
                  
                  </tbody>
                </table>