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
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  
  <!-- Bago style -->
  <link rel="stylesheet" href="css/bagostyle.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  
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
                <a href="./UsuarioWeb.php" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Usuarios Web</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./UsuarioMovil.php" class="nav-link active">
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
                  <p>Grupos de comportamientos</p>
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
                  <p>Reporte de comportamientos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./reporte2.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reporte 2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./reporte3.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reporte 3</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item ">
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
            <h1 class="m-0 text-white">Usuarios Movil</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="tablero.php">Inicio</a></li>
              <li class="breadcrumb-item active text-white">Usuarios Movil</li>
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
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header" >
                <h3 class="card-title">Lista de Usuarios Movil</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="listUsuarioMovil" class="table table-bordered table-striped">
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
                    <th>Imagen</th>
                    <th>Fecha Actualizacion</th>
                    <th>Acciones</th>
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
                      echo "<td>".$Did."</td>";
                      $Dnombres = array_shift($User);
                      echo "<td>".$Dnombres."</td>";
                      $Dapellidos = array_shift($User);
                      echo "<td>".$Dapellidos."</td>";
                      $Dfechanat = array_shift($User);
                      echo "<td>".$Dfechanat."</td>";
                      $Dcargo = array_shift($User);
                      echo "<td>".$Dcargo."</td>";
                      $Dci = array_shift($User);
                      echo "<td>".$Dci."</td>";
                      $Dregion = array_shift($User);
                      echo "<td>".$Dregion."</td>";
                      $Dsector = array_shift($User);
                      echo "<td>".$Dsector."</td>";
                      $Dsubsector = array_shift($User);
                      echo "<td>".$Dsubsector."</td>";
                      
                      $Dusuario = array_shift($User);
                      echo "<td>".$Dusuario."</td>";
                      $Destado = array_shift($User);
                      $Destadobtn="Habilitar";
                      $DestadoIco="thumbs-up";
                      echo "<td>".$Destado."</td>";
                      if ($Destado=="Habilitado"){
                        $Destadobtn="Deshabilitar";
                        $DestadoIco="thumbs-down";
                      }
                      $Dnivel = array_shift($User);
                      echo "<td>".$Dnivel."</td>";
                      $Dpuntaje = array_shift($User);
                      echo "<td>".$Dpuntaje."</td>";
                      $Dfechaact = array_shift($User);
                      $Darchivo = array_shift($User);
                      if ($Darchivo!=""){
                        echo "<td><a href='".$Darchivo."' target='_blank'><img src='".$Darchivo."' width='100'></a></td>";  
                      }else{
                        echo "<td></td>";
                      }
                      echo "<td>".$Dfechaact."</td>";
                      $Didcargo = array_shift($User);
                      $Didsubsector = array_shift($User);
                      $Didsector= array_shift($User);
                      echo '<td>
                              <button class="btn" onclick="saveData('.$Did.',\''.$Dnombres.'\',\''.$Dapellidos.'\',\''.$Dci.'\',\''.$Dfechanat.'\',\''.$Dregion.'\',\''.$Didsector.'\',\''.$Didsubsector.'\',\''.$Didcargo.'\',\''.$Dusuario.'\')"><i class="fas fa-edit"></i> Editar</button>
                              <button class="btn" onclick="updateStatus('.$Did.',\''.$Dusuario.'\')"><i class="far fa-'.$DestadoIco.'"></i>'.$Destadobtn.'</button>
                            </td>';
                      echo "</tr>";
                    }
                    
                    ?>
                    
                  
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            
        
 
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
 
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><label id="TituloUser">Agregar Usuario</label> </h3> 
                <button id="nuevousuario" class="btn float-right" onclick="newUser()" > <i class="fas fa-user-plus"></i> Nuevo Usuario</button>
                
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" enctype="multipart/form-data" method="post"  >
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputId">ID</label>
                    <input type="number"  class="form-control"  id="id" name="id" placeholder="ID" value="0" readonly="true">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputNombre">Nombres</label>
                    <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Ingrese sus Nombres">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputApellido">Apellidos</label>
                    <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Ingrese sus Apellidos">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputApellido">CI</label>
                    <input type="text" class="form-control" id="ci" name="ci" placeholder="Ingrese su CI">
                  </div>
                  <div class="form-group">
                    <label for=>Fecha de Nacimiento:</label>

                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                      </div>
                      <input type="text" id="fechanatal" name="fechanatal" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                    </div>
                    <!-- /.input group -->
                  </div>
                  <div class="form-group">
                    <label>Region</label>
                    <select class="form-control select2"  id="region" name="region" style="width: 100%;"> 
                      <option selected="selected">BENI</option>
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
                  <div class="form-group">
                    <label>Sector</label>
                    <select class="form-control select2" id="sector" name="sector"  style="width: 100%;"> 
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
                  <div class="form-group">
                    <label>Subsector</label>
                    <select class="form-control select2" id="subsector" name="subsector"  style="width: 100%;"> 
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
                  <div class="form-group">
                    <label>Cargo</label>
                    <select class="form-control select2"  id="cargo" name="cargo" style="width: 100%;"> 
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
                  <div class="form-group">
                    <label for="InputUsuario">Foto Perfil</label>
                   <input type="hidden" name="MAX_FILE_SIZE" value="512000" />
                    <p><input name="subir_archivo" type="file" /></p>
                  </div>
                  <div class="form-group">
                    <label for="InputUsuario">Usuario</label>
                    <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Ingrese su Usuario">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Contraseña</label>
                    <input type="password" class="form-control" id="clave" name="clave" placeholder="Ingrese su Contraseña">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword2">Repita su Contraseña</label>
                    <input type="password" class="form-control" id="clave2" name="clave2" placeholder="Repita su Contraseña">
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <?php
                    $resp= $cusuario -> ctrRegistroUsuarioMovil();
                    //echo "<script> alert(' respuesta: ".$resp." ')</script>";
                    
                    if ($resp=="true"){
                      //echo "<script> alert(' respuesta: ".$resp." ')</script>";
                       echo "<meta http-equiv='refresh' content='0'>";
                    //}elseif($resp=="false"){
                      //echo "<script> alert(' respuesta: al parecer fue falso XD')</script>";
                    }else{
                      if ($resp!=""){
                        echo "<script> alert(' respuesta: ".$resp." ')</script>";  
                      }                      
                    }
                    
                  ?>
                  
                  <input type="submit" class="btn btn-primary" value="Enviar">
                </div>
              </form>
            </div>
            <!-- /.card -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

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
      "responsive": true,
      "autoWidth": false,
    });
    
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
    
    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()
  });
</script>

<script  >
  
  $(document).ready(function () {
  $('#listUsuarioMovil').DataTable({
    "scrollX": true
  });
  $('.dataTables_length').addClass('bs-select');
  });
  
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
  
  function saveData(id, nombres,apellidos,ci,fechanatal,region,sector,subsector,cargo, usuario){
    document.getElementById("id").value = id;
    document.getElementById("nombres").value = nombres;
    document.getElementById("apellidos").value = apellidos;
    document.getElementById("ci").value = ci;
    document.getElementById("fechanatal").value = fechanatal;
    /*
    var reg = "5";
    switch (region){
      case "BENI": reg="0"; break;
      case "COCHABAMBA": reg="1"; break;
      case "EL ALTO": reg="2"; break;
      case "LA PAZ": reg="3"; break;
      case "NACIONAL": reg="4"; break;
      case "ORURO": reg="5"; break;
      case "PANDO": reg="6"; break;
      case "POTOSI": reg="7"; break;
      case "SANTA CRUZ": reg="8"; break;
      case "SUCRE": reg="9"; break;
      case "TARIJA": reg="10"; break;
           
    }
    */
    //document.getElementById("region").selectedIndex = reg;
    
    document.getElementById("region").value= region;
    document.getElementById('sector').value=sector;
    var id_category = sector;
            $.post("AjaxSubsector.php", { id_category: id_category }, function(data) {
                $("#subsector").html(data);
                document.getElementById('subsector').value=subsector;
                $("#subsector option:selected").each(function () {
                  var id_category = subsector;
                  $.post("AjaxCargo.php", { id_category: id_category }, function(data) {
                    $("#cargo").html(data);
                    document.getElementById('cargo').value=cargo;
                  });			
                });   
            });			
    document.getElementById("usuario").value = usuario;
    document.getElementById("clave").value = "";
    document.getElementById("clave2").value = "";
    $('#TituloUser').text("Editar Usuario");
//    document.getElementById("TituloUser").value = "Editar Usuario";  
  }
  
  function newUser(){
    document.getElementById("id").value = 0;
    document.getElementById("nombres").value = "";    
    document.getElementById("apellidos").value = "";
    document.getElementById("ci").value = "";
    document.getElementById("fechanatal").value = "";
    document.getElementById('region').value=null;
    document.getElementById('sector').value=null;
    document.getElementById('subsector').value=null;
    document.getElementById('cargo').value=null;
    document.getElementById("usuario").value = "";
    document.getElementById("clave").value = "";
    document.getElementById("clave2").value = "";
    $('#TituloUser').text("Agregar Usuario");
  //  document.getElementById("TituloUser").value = "Agregar Usuario";  
  }
  
  function updateStatus(id, usuario){
      var parametros = {
                "id" : id,
                "usuario" : usuario
        };
      
      $.ajax({
        type: "POST",
        url: "usuariomovilestado.php",
        data: parametros,
        success:function( msg ) {
          window.location.href = window.location.href;
         //alert( "Data actualizada. " + msg );
        }
       });
  }
  
</script>

<!-- Usuario SCRIPTS -->
<script src="build/js/Usuarios.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- InputMask -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>

<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- date-range-picker -->
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- sweetalert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!-- PAGE SCRIPTS -->
</body>
</html>
