

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AutoTech</title>
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
                Almacen
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./Repuesto.php" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Repuestos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./Categoria.php" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Categorias</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./Vehiculo.php" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Vehiculo</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-trophy"></i>
              <p>
                Compras
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./Ingresos.php" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ingresos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./Proveedor.php" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Proveedor</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Consultar Compras
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">3</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./consulta_compra.php" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Consultar Compras</p>
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
            <h1 class="m-0 text-white">Proveedor</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="tableroAlmacenero.php">Inicio</a></li>
              <li class="breadcrumb-item active text-white">Proveedor</li>
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
                <h3 class="card-title">Lista de Proveedor</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Nit</th>
                    <th>Razon_Social</th>
                    <th>Telefono</th>
                    <th>Direccion</th>
                    <th>Email</th>
                    <th>Acciones</th>

                    
                  </thead>
                  <tbody>
                 <?php 
                    require_once 'Controlador/ProveedorController.php';
  
                  
                    $cproveedor = new ControladorProveedor();
                    $list=  $cproveedor -> ctrListarProveedor(1,1000);
                    
                    while (count($list)>0){
                      $Proveedor = array_shift($list);
                      echo "<tr>";
                      $Did = array_shift($Proveedor );
                      echo "<td>".$Did."</td>";
                      $Dnit = array_shift($Proveedor);
                      echo "<td>".$Dnit."</td>";
                      $Drazon_social = array_shift($Proveedor);
                      echo "<td>".$Drazon_social."</td>";
                      $Dtelefono = array_shift($Proveedor);
                      echo "<td>".$Dtelefono."</td>";
                      $Ddirección = array_shift($Proveedor);
                      echo "<td>".$Ddirección."</td>";
                      $Demail = array_shift($Proveedor);
                      echo "<td>".$Demail."</td>";
                      
                     
                      
                     
                    
                    
                      echo '<td>
                      <button class="btn" onclick="saveData('.$Did.',\''.$Dnit.'\',\''.$Drazon_social.'\',\''.$Dtelefono.'\',\''.$Ddirección.'\',\''.$Demail.'\')"><i class="fas fa-edit"></i> Editar</button> 
                  
                      
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
                <h3 class="card-title"><label id="TituloUser">Agregar Proveedor</label> </h3> 
                <button id="nuevoNivel" class="btn float-right" onclick="newUser()" > <i class="fas fa-user-plus"></i> Nuevo Proveedor</button>
                
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" enctype="multipart/form-data"  method="post"   >
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputId"></label>
                    <input type="hidden"  class="form-control"  id="id" name="id" placeholder="ID" value="0" readonly="true">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputNombre">Nit</label>
                    <input type="text" class="form-control" id="nit" name="nit" placeholder="Ingrese el nit">
                  </div>
                  <div class="form-group">
                    <label for="InputUsuario">Razon Social</label>
                    <input type="text" class="form-control" id="razon_social" name="razon_social" placeholder="Ingrese el razon_social">
                  </div>
                   
                   
                  <div class="form-group">
                    <label for="InputUsuario">Telefono</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingrese el telefono">
                  </div>
                  
                 

                  <div class="form-group">
                    <label for="InputUsuario">Direccion</label>
                    <input type="text" class="form-control" id="dirección" name="dirección" placeholder="Ingrese el direccion">
                  </div>
                   
                  

                  
                  <div class="form-group">
                    <label for="InputUsuario">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Ingrese el Email">
                  </div>
                  
                 

                   
                  

                
  
                
    
    
                
                  
                </div>
                  
                

               
                <!-- /.card-body -->

                <div class="card-footer">
                  <?php
                    $resp= $cproveedor -> ctrRegistroProveedor();
                    //echo "<script> alert(' respuesta: ".$resp." ')</script>";
                    if ($resp=="true"){
                     // echo "<script> alert(' respuesta: ".$resp." ')</script>";
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

  
   
  
  function saveData(id, nit, razon_social,telefono,direccion,email){
    document.getElementById("id").value = id;
    document.getElementById("nit").value = nit;
    document.getElementById("razon_social").value = razon_social;
    document.getElementById("telefono").value = telefono;
    document.getElementById("dirección").value = dirección;
    document.getElementById("email").value = email;
    
 
    $('#TituloUser').text("Editar PROVEEDOR");
 //    document.getElementById("TituloUser").value = "Editar Usuario";  
  }
  
  function newUser(){
    document.getElementById("id").value = 0;
    document.getElementById("nit").value = 0;
    document.getElementById("razon_social").value = "";
    document.getElementById("telefono").value = 0;
    document.getElementById("dirección").value = "";
    document.getElementById("email").value = "";
   
     
    
    $('#TituloUser').text("Agregar PROVEEDOR");
  //  document.getElementById("TituloUser").value = "Agregar Usuario";  
  }
  
  
  
  function updateStatus(id){
      var parametros = {
                "id" : id,
        
              
        };
      
      $.ajax({
        type: "POST",
        url: "estadoproveedor.php",
        data: parametros,
        success:function( msg ) {
          window.location.href = window.location.href;
         alert( "Data actualizada. " + msg );
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
