

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
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  
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
                <a href="./UsuarioWeb.php" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Repuestos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./UsuarioMovil.php" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Categorias</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./UsuarioMovil.php" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Automovil</p>
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
                <a href="./Comportamientos.php" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ingresos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./GrupoComportamientos.php" class="nav-link ">
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
                <a href="./Comportamientos.php" class="nav-link ">
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


    




   <div  class="container" >
                     <div class="modal fade" tabindex="-1" id="modal2">
                           <div class="modal-dialog modal-xl  modal-dialog-scrollable">

                              <div class="modal-content">
                              <div class="modal-header hero-image">
                                        <label for="" style="color:white">Lista producto: </label> 
                                          <button class="btn btn-danger" data-dismiss='modal'>&times;</button>
                                  
                                 </div>
         

         <div class="col" id="col">
  
         <table id="listdetalle" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                     <th>id</th>
                     <th>nombre</th>
                     <th>descripcion</th>
                     <th>imagen</th>
                     <th>marca</th> 
                     <th>precio (Bs)</th>
                     <th>categoria</th>
                     <th>vehiculo</th>
                     
                     <th>Añadir</th>
                    </tr>
                  </thead>
               <tbody>
                <?php 
                    require_once 'Controlador/RepuestoController.php';
  
                  
                    $cuser = new ControladorRepuesto();
                    $list=  $cuser -> ctrListarRepuesto(1,1000);
                   
                    while (count($list)>0){
                      $cont = array_shift($list);
                      echo "<tr>";
                      
                      $Did= array_shift($cont);
                      echo "<td>".$Did."</td>";
                      $Dnombres= array_shift($cont);
                      echo "<td>".$Dnombres."</td>";
                      
                      
                      
                      $Dcodigo= array_shift($cont);
                      echo "<td>".$Dcodigo."</td>";
                      
                      $Dimagen = array_shift($cont);
                      if ($Dimagen!=""){
                        echo "<td><img src='".$Dimagen."' width='100'></td>";  
                      }else{
                        echo "<td></td>";
                      }
                    
                      $Dmarca= array_shift($cont);
                      echo "<td>".$Dmarca."</td>";
                      
                      $Dprecio= array_shift($cont);
                      echo "<td>".$Dprecio."</td>";
                      
                      $Did_categoria= array_shift($cont);
                  
                      $Did_vehiculo= array_shift($cont);
                     

                      $Dnombre= array_shift($cont);
                      echo "<td>".$Dnombre."</td>";
                      
                      $Dnombrevehiculo= array_shift($cont);
                      echo "<td>".$Dnombrevehiculo."</td>";

                     $Destado = array_shift($cont);
                      
                      
                      echo '<td>
                              <button class="btn" onclick="saveData('.$Did.',\''.$Dnombres.'\',\''.$Dmarca.'\')"><i class="fas fa-edit"></i> Editar</button>
                              
                            </td>';


                      echo "</tr>";
                    }               
                ?>   
              </tbody>
          </table>



          </div>
                
  
            
         
       
       </div>
      </div>
     </div>
   </div>




















   <form role="form" enctype="multipart/form-data" method="post"  >
    <!-- Main content -->
    <section class="content hero-image" >
      <div class="container-fluid" >

        <div class="row">
        
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header" >
                <h3 class="card-title">Busquedas </h3>
              </div>
 
   


              <!-- /.card-header -->
              <div class="card-body">
                
                  
              <table  class="table table-bordered table-striped ">
                    <thead  >
                          <tr>
                            <th style="width: 10%;">
                              <div class="col">
    
                                  <div >
                                  <label for="disabledSelect" class="form-label">Unidad: </label>
      
                                         <input type="number"id="cantidad" name="cantidad" style="width: 100%;">
                                   </div>
                               </div>
                            </th>
                            <th>
                              <div class="col">
    
                                  <div >
                                  <label for="disabledSelect" class="form-label">Medida: </label>
                                           
                                         <select class="form-control select2" id="categoria" name="categoria"  style="width: 100%;"> 
                                             <option selected="selected">seleccione</option>
                                                <?php
                                                   require_once 'Controlador/RepuestoController.php';
                     
                                                     $cusuario = new ControladorRepuesto();
                                                     $list=  $cusuario -> ctrListarMedida();
                    
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
                              <div class="col ">
    
                                  <div >
                                      <label for="disabledSelect" class="form-label">Producto : </label>
                                        <br>
                                      <input type="text" id="producto" name="producto"style="width: 50%;">
                                      <input type="hidden" id="id_producto" name="id_producto"style="width: 50%;" value="">

                                          <button type="button" class="btn btn-info"    data-toggle="modal" data-target="#modal2">Info</button>
                                   </div>
                             </div>
                           </th>  
                           
                               
                               <th>
                                 <div class="col-sm-3">

                                 <div class="card-footer">
         <?php
           require_once 'Controlador/RepuestoController.php';
           $cCategoria = new ControladorRepuesto();
           $resp= $cCategoria -> ctrRespuestoMedida();
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
                
                                   
                                   </div>
                                   
                                </th>

               </thead>
            </table>





            <table id="listdetalle" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                    <th>imagen</th>
                     <th>producto</th>
                     <th>marca</th>
                     <th>medida</th>
                     <th>action</th>
                                         </tr>
                  </thead>
               <tbody>
                <?php 
                    require_once 'Controlador/RepuestoController.php';
  
                  
                    $cuser = new ControladorRepuesto();
                    $list=  $cuser -> ctrListarRepuestoDetalle();
                   
                    while (count($list)>0){
                      $cont = array_shift($list);
                      echo "<tr>";
                      
                      $Did_repuesto= array_shift($cont);
                      $Did_unidad= array_shift($cont);
                     
                     
                      $Dimagen = array_shift($cont);
                      if ($Dimagen!=""){
                        echo "<td><img src='".$Dimagen."' width='70'></td>";  
                      }else{
                        echo "<td></td>";
                      }
                    
                      $Dnombre= array_shift($cont);
                      echo "<td>".$Dnombre."</td>";
                      
                      $Dmarca= array_shift($cont);
                      echo "<td>".$Dmarca."</td>";
                      $Dmedida= array_shift($cont);
                      echo "<td>".$Dmedida."</td>";
                      
                 


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
    </form>
    <!-- /.content -->
  </div>
  
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
  $(function () { $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
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
  $('#listdetalle').DataTable({
    "scrollX": false
  });
  $('.dataTables_length').addClass('bs-select');
  });
  

  function saveData(id, nombres,marca){
  document.getElementById("id_producto").value = id;
   document.getElementById("producto").value = nombres+" "+marca;
    
   // /$('#TituloUser').text("Editar Categoria");
//    document.getElementById("TituloUser").value = "Editar Usuario";  
  }
  
  function newUser(){
    document.getElementById("id_producto").value = 0;
    document.getElementById("producto").value = "";
    document.getElementById("cantidad").value = 0;
    document.getElementById("categoria").value = null;
    
    $('#TituloUser').text("Agregar Categoria");
  //  document.getElementById("TituloUser").value = "Agregar Usuario";  
  }
  
  
  
  function updateStatus(id){
      var parametros = {
                "id" : id,
        
              
        };
      
      $.ajax({
        type: "POST",
        url: "estadovehiculo.php",
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

<script src="plugins/select2/js/select2.full.min.js"></script>
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
