<?php
session_start();
if (!isset($_SESSION['session_id'])) {
    header('location: login.php');
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Bago</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/adminlte.min.css">
  <!-- Bago style -->
  <link rel="stylesheet" href="css/bagostyle.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <?php include("barrasup.php"); ?>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="imagenes/minilogobago.png" alt="Bago Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Bago</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['session_usuario'] ?> </a>
          
        </div>
        <div class="right">
          <i class="fas fa-sign-out-alt"></i>  
        </div>
        
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="./tablero.php" class="nav-link ">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Tablero
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Usuarios
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./UsuarioWeb.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Usuarios Web</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./UsuarioMovil.php" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Usuarios Moviles</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-trophy"></i>
              <p>
                Logros
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./Comportamientos.php" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Comportamientos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./GrupoComportamientos.php" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Grupos de Comportamientos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./Niveles.php" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Niveles</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Reportes
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">3</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./ReporteComportamientos.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ranking de comportamientos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./reporte2.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reporte Comentarios</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./reporte3.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reporte Logros</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="./Configuraciones.php" class="nav-link">
              <i class="nav-icon fa fa-cogs"></i>
              <p>
                Configuraciones
              </p>
            </a>
          
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header hero-image" >
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-white">Reportes</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="tablero.php">Inicio</a></li>
              <li class="breadcrumb-item active text-white">Reportes</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content hero-image" >
      <div class="container-fluid" >

        <div class="row">
        >
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header" >
                <h3 class="card-title">Busquedas </h3>
              </div>
 
   


              <!-- /.card-header -->
              <div class="card-body">
                
              <table class="table table-bordered table-striped" >
                    <thead>
                      <tr>
                       <th>
                         <div class="col">
    
                           <div class="col order-5">
                              <label for="start" class="form-label"  >Fecha Inicio: </label>
                              <input type="date" id="fechaini" name="fechaini" style="margin-left: 20px"  data-inputmask-inputformat="yyyy/mm/dd" data-mask  min="2021-06-01" max="2071-07-01">
  
                              <label for="start" class="form-label" style="margin-left: 40px">Fecha Fin:   </label>

                              <input type="date" id="fechafin" name="fechafin" style="margin-left: 20px" data-inputmask-inputformat="yyyy/mm/dd" data-mask  min="2021-06-01" max="2071-07-01">
          
                            </div>
                         </div>


                       </th>
                      </tr>
                   </thead>
               </table>     
              <table  class="table table-bordered table-striped " id="busquedas" >
                    <thead  >
                          <tr>
                            <th>
                              <div class="col">
    
                                  <div >
                                    <label for="disabledSelect" class="form-label">Region: </label>
      
                                        <select class="form-control select2"  id="region" name="region" style="width: 100%;">
                                           <option selected="selected">seleccione</option>
                                           <option>BENI</option>
                                           <option>COCHABAMBA</option>
                                           <option>EL ALTO</option>
                                           <option>LA PAZ</option>                    
                                           <option>NACIONAL</option>
                                           <option>ORURO</option>
                                           <option>PANDO</option>
                                           <option>POTOSI</option>
                                           <option>SANTA CRUZ</option>
                                           <option>SUCRE</option>
                                           <option>TARIJA</option>

                                        </select>
                                   </div>
                               </div>
                            </th>
 
                            <th>
                              <div class="col order-1">
    
                                  <div >
                                      <label for="disabledSelect" class="form-label">Sector: </label>
      
                                         <select class="form-control select2" id="sector" name="sector"  style="width: 100%;"> 
                                             <option selected="selected">seleccione</option>
                                                <?php
                                                   require_once 'Controlador/usuario.controlador.php';
                     
                                                     $cusuario = new ControladorUsuario();
                                                     $list=  $cusuario -> ctrListarSectores();
                    
                                                        while (count($list)>0){
                                                          $User = array_shift($list);
                                                          $Did = array_shift($User);
                                                          $Dnombres = array_shift($User);
                                                          echo '<option value="'.$Did.'">'.$Dnombres.'</option>';
                                                        }
                                                 ?>
                                          </select>
                                   </div>
                             </div>
                           </th>  
                           <th>
                               <div class="col order-1">
                                    <div >
                                       <label for="disabledSelect" class="form-label">Subsector: </label> 
                                           <select class="form-control select2" id="subsector" name="subsector"  style="width: 100%;">     
                                             <option selected="selected">seleccione</option>
                                               <?php
                                                  require_once 'Controlador/usuario.controlador.php';
                     
                                                     $cusuario = new ControladorUsuario();
                                                     $list=  $cusuario -> ctrListarSubSectores(4);
                                                        while (count($list)>0){
                                                          $User = array_shift($list);
                                                          $Did = array_shift($User);
                                                          $Dnombres = array_shift($User);
                                                           echo '<option value="'.$Did.'">'.$Dnombres.'</option>';
                                                         }
                                               ?>
                                            </select>
                                      </div>
                                 </div>
                             </th>
                              <th>
                                 <div class="col order-5">
                                      <div >
                                          <label for="disabledSelect" class="form-label">Cargo: </label>
                                              <select class="form-control select2"  id="cargo" name="cargo" style="width: 100%;">
                                                 <option selected="selected">seleccione</option>
                                                    <?php
                                                       require_once 'Controlador/usuario.controlador.php';
                                                        $cusuario = new ControladorUsuario();
                                                        $list=  $cusuario -> ctrListarCargo(9);
                    
                                                        while (count($list)>0){
                                                        $User = array_shift($list);
                                                        $Did = array_shift($User);
                                                        $Dnombres = array_shift($User);
                                                         echo '<option value="'.$Did.'">'.$Dnombres.'</option>';
                                                        }
                                                    ?>
                                                </select>
                                       </div>
                                   </div>
                               </th>
                               <th>
                                 <div class="col-sm-3">
                                     <input type="submit" class="btn btn-success" value="Buscar">
                                   </div>
                                   
                                </th>

               </thead>
            </table>
              <table id="listrecomendacion" class="table table-bordered table-striped">
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
                      echo "<td>".$Did."</td>";
                      
                      $Dnombre= array_shift($cont);
                      echo "<td>".$Dnombre."</td>";
                      $Dcantidad= array_shift($cont);
                      echo "<td>".$Dcantidad."</td>";
                      
                      $Dsumando= array_shift($cont);
                      echo "<td>".$Dsumando."</td>";                     
                      
                 


                      echo "</tr>";
                    }               
                ?>   
              </tbody>
          </table>

              </div>
              <!-- /.card-body -->
            </div>
          



           <!-- /.col -->
         </div>
         <!-- /.row -->
 
            <!-- /.card -->
       </div><!--/. container-fluid -->
      </div>
      <div class="card-footer">
        
        <a href="exportarexcel3.php" class="btn btn-success">Descargar Excel</a>
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <?php include("pie.php"); ?>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive":true,
      "autoWidth": false,
    });

    $('.select2').select2()

//Initialize Select2 Elements
$('.select2bs4').select2({
  theme: 'bootstrap4'
});



    
  });
</script>

<script language="javascript">
$("#sector").on('change', function () {
        $("#sector option:selected").each(function () {
            var id_category = $(this).val();
            $.post("AjaxSubsector.php", { id_category: id_category }, function(data) {
                $("#subsector").html(data);
                $("#subsector option:selected").each(function () {
                  var id_category = $(this).val();
                  $.post("AjaxCargo.php", { id_category: id_category }, function(data) {
                    $("#cargo").html(data);
                  });			
                });   
            });			
        });
  });
  $("#subsector").on('change', function () {
        $("#subsector option:selected").each(function () {
            var id_category = $(this).val();
            $.post("AjaxCargo.php", { id_category: id_category }, function(data) {
                $("#cargo").html(data);
            });			
        });
  });


</script>

<script>
 
 
 



</script>

<!-- Usuario SCRIPTS -->
<script src="build/js/Usuarios.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- sweetalert 

<script src="js/sweetalert.min.js"></script>
-->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<!-- PAGE SCRIPTS -->
</body>
</html>
