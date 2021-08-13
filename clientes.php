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
          <a href="./tablero.php" class="nav-link active">
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
              Ventas
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="./UsuarioWeb.php" class="nav-link ">
                <i class="far fa-circle nav-icon"></i>
                <p>Ventas</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="./UsuarioMovil.php" class="nav-link ">
                <i class="far fa-circle nav-icon"></i>
                <p>Clientes</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-trophy"></i>
            <p>
              Consulta Compras
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="./Comportamientos.php" class="nav-link ">
                <i class="far fa-circle nav-icon"></i>
                <p>Consultar Compras</p>
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
          <h1 class="m-0 text-white">Niveles</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="tablero.php">Inicio</a></li>
            <li class="breadcrumb-item active text-white">Niveles</li>
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
              <h3 class="card-title">Lista de Niveles</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id_cliente</th>
                  <th>Nombre</th>
                  <th>Paterno</th>
                  <th>Materno</th>
                  <th>Telefono</th>
                  <th>Direccion</th>
                  
                </thead>
                <tbody>
               <?php 
                  require_once 'Controlador/logros.controlador.php';

                
                  $clogro = new ControladorLogro();
                  $list=  $clogro -> ctrListarNivelTabla(1,1000);
                  
                  while (count($list)>0){
                    $Nivel = array_shift($list);
                    echo "<tr>";
                    $Did_cliente = array_shift($Nivel);
                    echo "<td>".$Did_cliente."</td>";
                    $Dnombre = array_shift($Nivel);
                    echo "<td>".$Dnombre."</td>";
                    $Dpaterno = array_shift($Nivel);
                    echo "<td>".$Dpaterno."</td>";
                    $Dmaterno = array_shift($Nivel);
                    echo "<td>".$Dmaterno."</td>";
                    $Dtelefono = array_shift($Nivel);
                    echo "<td>".$Dtelefono."</td>";
                    $Ddireccion = array_shift($Nivel);
                    echo "<td>".$Ddireccion."</td>";
                  
                    echo '<td>
                            <button class="btn" onclick="saveData('.$Did_cliente.',\''.$Dnombre.'\',\''.$Dpaterno.'\',\''.$Dmaterno.'\',\''.$Dtelefono.'\',\''.$Ddireccion.'\')"><i class="fas fa-edit"></i> Editar</button>
                          
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
              <h3 class="card-title"><label id="TituloUser">Agregar Cliente</label> </h3> 
              <button id="nuevoNivel" class="btn float-right" onclick="newUser()" > <i class="fas fa-user-plus"></i> Nuevo Cliente</button>
              
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" enctype="multipart/form-data"  method="post"   >
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputId">CODIGO</label>
                  <input type="hidden"  class="form-control"  id="id_cliente" name="id_cliente" placeholder="Codigo" value="0" readonly="true">
                </div>
                <div class="form-group">
                  <label for="exampleInputNombre">NOMBRE</label>
                  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese la Nombre">
                </div>
                <div class="form-group">
                  <label for="InputUsuario">PATERNO</label>
                  <input type="text" class="form-control" id="paterno" name="paterno" placeholder="Ingrese apellido paterno">
                </div>
                 
                 
                <div class="form-group">
                  <label for="InputUsuario">MATERNO</label>
                  <input type="text" class="form-control" id="materno" name="materno" placeholder="Ingrese apellido materno">
                </div>

                <div class="form-group">
                  <label for="InputUsuario">TELEFONO</label>
                  <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingrese telefono">
                </div>
                 
                 
                <div class="form-group">
                  <label for="InputUsuario">DIRECCION</label>
                  <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ingrese direccion">
                </div>
                
               
  

                
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <?php
                  $resp= $clogro -> ctrRegistroNivel();
                  //echo "<script> alert(' respuesta: ".$resp." ')</script>";
                  if ($resp=="true"){
                    //echo "<script> alert(' respuesta: ".$resp." ')</script>";
                     echo "<meta http-equiv='refresh' content='0'>";
                  }elseif($resp=="false"){
                    //echo "<script> alert(' respuesta: al parecer fue falso XD')</script>";
                  }else{  
                    if ($resp!=""){
                    echo "<script> alert(' respuesta: ".$resp." ')</script>";
                  } }
                  
                ?>
                
                <input type="submit" class="btn btn-primary" value="Enviar">
              </div>
            </form>
          </div>
          <!-- /.card -->
    </div><!--/. container-fluid -->
     
    <div class="card-footer">
      
     <!-- <a href="exportarniveles.php" class="btn btn-success">Descargar Excel</a>-->
      </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->

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

  
  
});
</script>

<script>
function saveData(id, nombre,numero,puntajemin,grupomin){
  document.getElementById("id_cliente").value = id_cliente;
  document.getElementById("nombre").value = nombre;
  document.getElementById("paterno").value = paterno;
  document.getElementById("materno").value = materno;
  document.getElementById("telefono").value = telefono;
  document.getElementById("direccion").value = direccion;

  $('#TituloUser').text("Editar Nivel");
//    document.getElementById("TituloUser").value = "Editar Usuario";  
}

function newUser(){
  document.getElementById("id_cliente").value = 0;
  document.getElementById("nombre").value = "";
  document.getElementById("paterno").value = "";
  document.getElementById("materno").value = "";
  document.getElementById("telefono").value = 0;
  document.getElementById("direccion").value = "";
  
 
  
  $('#TituloUser').text("Agregar Automovil");
//  document.getElementById("TituloUser").value = "Agregar Usuario";  
}

function updateStatus(id){
    var parametros = {
              "id_cliente" : id_cliente,
            
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

<!-- PAGE SCRIPTS -->
</body>
</html>
