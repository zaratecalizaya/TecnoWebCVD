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
          <li class="nav-item has-treeview">
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
            <h1 class="m-0 text-white">Comportamientos</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="tablero.php">Inicio</a></li>
              <li class="breadcrumb-item active text-white">Comportamientos</li>
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
                <h3 class="card-title">Lista de Comportamientos</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="listacomportamiento" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Puntaje</th>
                    <th>Grupo</th>
                    <th>Estado</th>
                    <th>Fecha Actualizacion</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                      require_once 'Controlador/logros.controlador.php';
   
                  
                       $clogro = new ControladorLogro();
                       $list=  $clogro -> ctrListarComportamientos(1,1000);
                    
                       while (count($list)>0){
                      $Comportamiento = array_shift($list);
                      echo "<tr>";
                      $Did = array_shift($Comportamiento);
                      echo "<td>".$Did."</td>";
                      $Dnombre = array_shift($Comportamiento);
                      echo "<td>".$Dnombre."</td>";
                      $Dpuntaje = array_shift($Comportamiento);
                      echo "<td>".$Dpuntaje."</td>";
                      $Dgruponombre = array_shift($Comportamiento);
                      echo "<td>".$Dgruponombre."</td>";
                      $Destado = array_shift($Comportamiento);
                      $Destadobtn="Habilitar";
                      $DestadoIco="thumbs-up";
                      echo "<td>".$Destado."</td>";
                      if ($Destado=="Habilitado"){
                        $Destadobtn="Deshabilitar";
                        $DestadoIco="thumbs-down";
                      }
                      $Dfechaact = array_shift($Comportamiento);
                      echo "<td>".$Dfechaact."</td>";
                    

                      $Didgrupo = array_shift($Comportamiento);

                      echo '<td>
                              <button class="btn" onclick="saveData('.$Did.',\''.$Dnombre.'\',\''.$Dpuntaje.'\',\''.$Didgrupo.'\')"><i class="fas fa-edit"></i> Editar</button>
                              <button class="btn" onclick="updateStatus('.$Did.')"><i class="far fa-'.$DestadoIco.'"></i>'.$Destadobtn.'</button>
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
                <h3 class="card-title"><label id="TituloUser">Agregar Comportamientos</label> </h3> 
                <button id="nuevoComportamiento" class="btn float-right" onclick="newUser()" > <i class="fas fa-user-plus"></i> Nuevo Comportamiento</button>
                
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post"  >
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputId">ID</label>
                    <input type="number"  class="form-control"  id="id" name="id" placeholder="ID" value="0" readonly="true">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputNombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese su Nombre">
                  </div>
                  <div class="form-group">
                    <label for="InputUsuario">Puntaje</label>
                    <input type="text" class="form-control" id="puntaje" name="puntaje" placeholder="Ingrese el Puntaje">
                  </div>
                   
                  <div class="form-group">
                    <label>Grupos de comportamiento</label>
                    <select class="form-control select2" id="grupos" name="grupos"  style="width: 100%;"> 
                    <?php
                      
                      require_once 'Controlador/logros.controlador.php';
                     
                      $cusuario = new ControladorLogro();
                      $list=  $cusuario -> ctrListarGrupo();
                    
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
                <!-- /.card-body -->

                <div class="card-footer">
                  <?php
                    $resp= $clogro -> ctrRegistroComportamiento();
                    //echo "<script> alert(' respuesta: ".$resp." ')</script>";
                    if ($resp=="true"){
                     // echo "<script> alert(' respuesta: ".$resp." ')</script>";
                       echo "<meta http-equiv='refresh' content='0'>";
                    }elseif($resp=="false"){
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
      <div class="card-footer">
        
        <a href="exportarcomportamiento.php" class="btn btn-success">Descargar Excel</a>
        </div>
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
      "responsive":true,
      "autoWidth": false
    });
    
     //Initialize Select2 Elements
    $('.select2').select2()

//Initialize Select2 Elements
$('.select2bs4').select2({
  theme: 'bootstrap4'
})






  });
</script>

<script>

$(document).ready(function () {
  $('#listacomportamiento').DataTable({
    "scrollX": true
  });
  $('.dataTables_length').addClass('bs-select');
  });
    




  function saveData(id, nombre,puntaje,grupo){
    document.getElementById("id").value = id;
    document.getElementById("nombre").value = nombre;
    document.getElementById("puntaje").value = puntaje;
    console.log("grupo:" +grupo);
    $("#grupos").select2("val", grupo);

   
    $('#TituloUser').text("Editar Comportamiento");
//    document.getElementById("TituloUser").value = "Editar Usuario";  
  }
  
 
function selectElement(id, valueToSelect) {    
    let element = document.getElementById(id);
    element.value = valueToSelect;
}


  function newUser(){
    document.getElementById("id").value = 0;
    document.getElementById("nombre").value = "";
    document.getElementById("puntaje").value = "";
    document.getElementById("grupos").value = "";
    
    $('#TituloUser').text("Agregar Comportamiento");
  //  document.getElementById("TituloUser").value = "Agregar Usuario";  
  }
  
  function updateStatus(id){
      var parametros = {
                "id" : id,
              
        };
      
      $.ajax({
        type: "POST",
        url: "comportamientoestado.php",
        data: parametros,
        success:function( msg ) {
          window.location.href = window.location.href;
       //  alert( "Data actualizada. " + msg );
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
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- sweetalert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>

<!-- PAGE SCRIPTS -->
</body>
</html>
