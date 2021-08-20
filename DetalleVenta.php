

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
  <?php include("barrasup.php");
  include 'carritoventa.php';
  ?>

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
            <h1 class="m-0 text-white">DetalleCompra</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="tablero.php">Inicio</a></li>
              <li class="breadcrumb-item active text-white">  Detalle Compra</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    

  
      
   <div  class="container" >
                     <div class="modal fade" tabindex="-1" id="modal1">
                           <div class="modal-dialog modal-xl  modal-dialog-scrollable">

                              <div class="modal-content">
                              <div class="modal-header hero-image">
                                        <label for="" style="color:white">Lista producto detalle: </label> 
                                          <button class="btn btn-danger" data-dismiss='modal'>&times;</button>
                                  
                                 </div>
         

         <div class="col" id="col">
  
         <table id="listdetalle" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                    <th>Almacen</th>
                    
                    <th>Imagen</th>
                     <th>Producto</th>
                     
                     <th>Marca</th>
                     <th>Medida</th>
                     <th>Precio /Bs</th>
                     <th>Action</th>
                                         </tr>
                  </thead>
               <tbody>
                <?php 
                    require_once 'Controlador/RepuestoController.php';
  
                  
                    $cuser = new ControladorRepuesto();
                    $list=  $cuser -> ctrListarAlmacenDetalleCompra();
                   
                    while (count($list)>0){
                      $cont = array_shift($list);
                      echo "<tr>";
                      
                      $Did_repuesto= array_shift($cont);
                      $Did_unidad= array_shift($cont);
                      $Did_almacen= array_shift($cont);
                     
                      $Dalmacen= array_shift($cont);
                      echo "<td>".$Dalmacen."</td>";
                      
                      
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
                      
                      $Dprecio= array_shift($cont);
                      echo "<td>".$Dprecio."</td>";
                      $cantidad=1;
                      echo '<td>
                      <form action="" method="post">
                      <input type="hidden" id="idproducto" name="idproducto" value="'.$Did_repuesto.'">
                     
                      <input type="hidden" id="idunidad" name="idunidad" value="'.$Did_unidad.'">
                      <input type="hidden" id="idalmacen" name="idalmacen" value="'.$Did_almacen.'">
                      <input type="hidden" id="nombre" name="nombre" value="'.$Dnombre.'">
                      <input type="hidden" id="precio" name="precio" value="'.$Dprecio.'">
                      <input type="hidden" id="cantidad" name="cantidad" value="'.$cantidad.'">
                      <input type="hidden" id="marca" name="marca" value="'.$Dmarca.'">
                      <input type="hidden" id="medida" name="medida" value="'.$Dmedida.'">
                      <button class="btn btn-primary" name="btnAccion" value="Agregar" type="submit">
                        Carrito
                      
                        </button>
                    </form>              
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

              <div class="alert alert-success">
              No hay productos en el carrito

              <?php echo($mensaje);
              ?>
            </div>
                
                  
              <table  class="table table-bordered table-striped " id="busquedas" >
                    <thead  >
                          <tr>
                            <th>
                              <div class="col">
    
                                  <div >
                                  <label for="disabledSelect" class="form-label">Categoria: </label>
      
                                         <select class="form-control select2" id="categoria" name="categoria"  style="width: 100%;"> 
                                             <option selected="selected">seleccione</option>
                                                <?php
                                                   require_once 'Controlador/CategoriaController.php';
                     
                                                     $cusuario = new ControladorCategoria();
                                                     $list=  $cusuario -> ctrListarCategoria();
                    
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
                                      <label for="disabledSelect" class="form-label">vehiculo : </label>
      
                                         <select class="form-control select2" id="sector" name="sector"  style="width: 100%;"> 
                                             <option selected="selected">seleccione</option>
                                                <?php
                                                   require_once 'Controlador/vehiculoController.php';
                     
                                                     $cusuario = new ControladorVehiculo();
                                                     $list=  $cusuario -> ctrListarVehiculoselect();
                    
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

                               
                  <?php
                   require_once 'Controlador/CategoriaController.php';
  
                  
                   $cuser = new ControladorCategoria;
                  
                    $resp= $cuser -> ctrCategoriaVehiculo();
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
                  
                  <input type="submit" class="btn btn-primary" value="Registrar">
                
                                   
                                                                         <br><br>
                                     <button  class="btn btn-warning" type="button"  data-toggle="modal" data-target="#modal1" >addproducto</button>
                     
                                   </div>
                                   
                                </th>

               </thead>
            </table>
            <h3>Lista de venta</h3>


            <?php  if(!empty($_SESSION['CARRITO'])){?>
              <table id="listdetalle" class="table table-bordered table-striped">
              <thead>
                    <tr>
                    <th>Nombre</th>
                    <th>Marca</th>
                    <th>Medida</th>
                    <th>Precio</th>
                    
                    <th>Cantidad</th>
                    
                     <th>Total</th>
                                         </tr>
               
                          </thead>
               <tbody>
               <?php $total=0;?>
                <?php foreach($_SESSION['CARRITO'] as $indice->$producto){?>
                  
                    <tr>
                         <td><?php echo $producto['NOMBRE']?></td>
                         <td  class="text-center"><?php echo $producto['MARCA']?></td>
                         <td class="text-center"><?php echo $producto['MEDIDA']?></td>
                         <td class="text-center"><?php echo $producto['PRECIO']?></td>
                         <td class="text-center"><?php echo $producto['CANTIDAD']?></td>
     
                         <td class="text-center"><?php echo number_format($producto['CANTIDAD']*$producto['PRECIO'],2)?></td>
                         
                         
                         
                         <td>
                         <form action="" method="POST">
                         <input type="hidden" id="id" name="id" value="<?php echo $producto['ID']?>">
                         <button class="btn btn-danger" type="submit" name="btnAccion" value="Eliminara">Eliminar</button>
                       
                         </form>  
                         </td>
                         
                         </tr>
                     <?php $total=$total+($producto['CANTIDAD']*$producto['PRECIO']);?>
                    <?php }?>
               <tr>
                    <td colspan="3" align="right"> <h3>Total</h3></td>
                    <td align="right"><h3>$<?php echo number_format($total,2);?></h3></td>
                    </tr>
             
             
              </tbody>
          </table>
          <?php }else{?>
            <div class="alert alert-success">
              No hay productos en el carrito
            </div>

            <?php }?>

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
  
  

  function saveData(id, nombre){
    document.getElementById("id").value = id;
    document.getElementById("nombre").value = nombre;
    
    $('#TituloUser').text("Editar Categoria");
//    document.getElementById("TituloUser").value = "Editar Usuario";  
  }
  
  function newUser(){
    document.getElementById("id").value = 0;
    document.getElementById("nombre").value = "";
    document.getElementById("tipo").value = null;
    
    $('#TituloUser').text("Agregar Categoria");
  //  document.getElementById("TituloUser").value = "Agregar Usuario";  
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
