<?php
header('Content-Type:text/xls; charset=latin1');
header('Content-Disposition: attachment;filename="Reporte.xls"');

?>


<table style="text-align: center;" border width="100%" height="50%" cellpadding="1" cellspacing="1" width="1000">
<thead>
                    <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Comportamiento</th>
                    <th>Comentarios</th>
                    
                   
                  </tr>
                    </thead>
                    <tbody>
      
                    <?php
                  require_once 'Controlador/logros.controlador.php' ;
                  $ctablero =  new ControladorLogro();
                  $list=$ctablero->ctrlistTablero(1,1000);
                  
                  while (count($list)>0){
                   
                    $Tablero = array_shift($list);
                    echo "<tr>";
                    $Did = array_shift($Tablero);
                    echo "<td height='50'>".$Did."</td>";
                    $Dnombres = array_shift($Tablero);
                    echo "<td height='50'>".$Dnombres."</td>";
                    $Dnombre = array_shift($Tablero);
                    echo "<td height='50'>".$Dnombre."</td>";
                    $Dcomentario = array_shift($Tablero);
                    echo "<td height='50'>".$Dcomentario."</td>";
                  
                    
                    
                  
                  
                  
                  }
                  
                

                  ?>  
                    </tbody>
                  </table>