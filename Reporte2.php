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
   
<!--section modal-->





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
          <li class="nav-item ">
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
            <h1 class="m-0 text-white">Reportes Comentarios</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="tablero.php">Inicio</a></li>
              <li class="breadcrumb-item active text-white">Reportes Comentarios</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
      
<?php
    require_once 'Controlador/usuario.controlador.php';
    
  
                  
    ///$cusuario = new ControladorUsuario();
   // $DImagen=  $cusuario -> ctrImagenUsuario();
    //$DIma= array_shift($DImagen); 
  

  

  //  $listuser=  $cusuario -> ctrListarUsuariosMovil(1,1000);
      
    ?>






   <div  class="container" >
    <div class="modal fade" tabindex="-1" id="modal1">
      <div class="modal-dialog modal-xl  modal-dialog-scrollable">

       <div class="modal-content">
         <div class="modal-header hero-image">
         <label for="" style="color:white">Perfil del Usuario: </label> 
         <button class="btn btn-danger" data-dismiss='modal'>&times;</button>
         </div>
         <div class="modal-body">

         <div class="row" id="row">
                <div class="col1" id="col1">
                
                <img  id="myImag" src="" width='150'>


                </div>
                <div class="col2"id="col2">
             
             <label for="" id="lnombre" >Nombre:</label> <br>
             <label for="" id="lcargo">Cargo:</label> <br>
             <label for="" id="Puntaje">Puntaje:</label> <br>
             <label for="" id="Logros">Logros:</label> <br>

                </div>
                <div class="col3"id="col3"></div>
            </div>
                    
             
            <table  class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>Comentarios</th>
                  <th>Compañero</th>
                  <th>Logro</th>
                  </tr>
                  </thead>
                  <tbody id="listar">
             
                  
                  </tbody>
                </table>

  
        
             
            
         </div>
         <div class="modal-footer hero-image">
      
         </div>
       </div>
      </div>
     </div>
   </div>





 <form role="form" enctype="multipart/form-data" method="post"  >
  <section class="content hero-image" >
      <div class="container-fluid" >
        <div class="row">
          <div class="col-12">
        
 <div class="card card-primary">
           <div class="card-header" >
                <h3 class="card-title">Busquedas</h3>
            </div>

   


              <div class="card-body">


                <table  class="table table-bordered table-striped" >
                  <thead  >
                            <tr>
                               <th >
                                   <div class="col">
    
                                      <div class="mb-3">
                                         <label for="disabledSelect" class="form-label">Region: </label>
      
                                             <select class="form-control select2"  id="region" name="region" style="width: 80%;">
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
 
                               <th >
                                   <div class="col">
    
                                       <div class="mb-3">
                                           <label for="disabledSelect" class="form-label">Usuario: </label>
                                              <input type="text" id="datos" name="datos" placeholder="Ingrese Nombre o Apellido">
                                      </div>
                                   </div>
                               </th>
                               <th >   

                                      <div class="col" >
                
                                         <input type="submit" class="btn btn-success" value="Buscar">
                                     </div>
                                          <br>
                               </th>

                  </thead>
                </table> 



                <table id="listacomportamientos" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>Id</th>
                  <th>Perfil</th>
                    
                    <th>Usuario</th>
                    <th>Compañero</th>
                    <th>Logo</th>
                    <th>Comportamiento</th>
                    <th>Comentario</th>                    
                    <th>Acciones</th>
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
                      echo "<td>".$Did."</td>";
 
                      $Didusuario= array_shift($perfil);
                      
                      echo '<td>
                      <button  class="open" type="button" onclick="obtenerinfo('.$Didusuario.')" data-toggle='.modal.' data-target=#'.modal1.' ><i class="fa fa-user" aria-hidden="true"></i></button></td>';
                     
                      
                      $Dusuario= array_shift($perfil);
                      echo "<td>".$Dusuario."</td>";
                      $Dcolega= array_shift($perfil);
                      echo "<td>".$Dcolega."</td>";
                      
                      $Dlogo= array_shift($perfil);  
                      if ($Dlogo!=""){
                        echo "<td><a href='".$Dlogo."' target='_blank'><img loading='lazy' src='".$Dlogo."' width='50'></a></td>";  
                      }else{
                        echo "<td></td>";
                      }
                      $Dcomportamiento= array_shift($perfil);
                      echo "<td>".$Dcomportamiento."</td>";
                      
                      $Dcomentario= array_shift($perfil);
                      echo "<td>".$Dcomentario."</td>";

                      echo '<td>
                      <button  class="btn" type="button" onclick="dateDelete('.$Did.')"  ><i class="fa fa-trash"></i>ELIMINAR </button></td>';
                    

                      

                    
                      echo "</tr>";
                      }
                    
                   ?> 
                    
                  
                  </tbody>
                </table>
              </div>    






 </div>


 </div>
        
        
    </div>
          <!-- /.col -->
      
        <!-- /.row -->
        <div class="card-footer">
        
        <a href="exportarexcel2.php" class="btn btn-success">Descargar Excel</a>
        </div>
 
    </section>
    </form>
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
      

      "autoWidth": false,
    });

    $('.select2').select2()

//Initialize Select2 Elements
$('.select2bs4').select2({
  theme: 'bootstrap4'
})
    
  });
</script>




<script>
 
 
$(document).ready(function () {
  $('#listacomportamientos').DataTable({
    "scrollX": true
  });
  $('.dataTables_length').addClass('bs-select');
  });
    


  function dateDelete(id){
      var parametros = {
                "id" : id,
              
        };
      
        $.ajax({
        type: "POST",
        url: "EliminarDato.php",
        data: parametros,
        success:function( msg ) {
          window.location.href = window.location.href;
       //  alert( "Data actualizada. " + msg );
        }
       });
  }
  
  function getNombre(id){
      var parametros = {
                "id" : id,
              
        };
      
        $.ajax({
        type: "POST",
        url: "tarjetasinfo.php",
        data: parametros,
        success:function(respuesta ) {
          //window.location.href = window.location.href;

        document.getElementById("lnombre").innerHTML ="Nombre: "+respuesta;  
                
    
        }
       });
  }


  function getCargo(id){
      var parametros = {
                "id" : id,
              
        };
      
        $.ajax({
        type: "POST",
        url: "tarjetacargo.php",
        data: parametros,
        success:function(respuesta ) {
          //window.location.href = window.location.href;

        document.getElementById("lcargo").innerHTML ="Cargo: "+respuesta;  
                
    
        }
       });
  }
      
  function getPuntaje(id){
      var parametros = {
                "id" : id,
              
        };
      
        $.ajax({
        type: "POST",
        url: "tarjetapuntaje.php",
        data: parametros,
        success:function(respuesta ) {
          //window.location.href = window.location.href;
     //  console.log(respuesta);
    document.getElementById("Puntaje").innerHTML ="Puntaje :"+respuesta.toString();  
                
    
        }
       });
  }


  function getLogro(id){
      var parametros = {
                "id" : id,
              
        };
      
        $.ajax({
        type: "POST",
        url: "tarjetalogros.php",
        data: parametros,
        success:function(respuesta ) {
          //window.location.href = window.location.href;
  //   console.log(respuesta);
    document.getElementById("Logros").innerHTML ="Logros :"+respuesta.toString();  
        }
       });
  }



  function getImagen(id){
      var parametros = {
                "id" : id,
              
        };
      
        $.ajax({
        type: "POST",
        url: "tarjetaimagen.php",
        data: parametros,
        success:function(respuesta ) {
          //window.location.href = window.location.href;
   // console.log(respuesta);
             document.getElementById("myImag").src=respuesta;  
        }
       });
  }
    
  
  
  function getTabla(id){
      var parametros = {
                "id" : id,
              
        };
      
        $.ajax({
        type: "POST",
        url: "tarjetalistarmodal.php",
        data: parametros,
        success:function(respuesta ) {
          //window.location.href = window.location.href;

          
          console.log(respuesta.length);
          console.log(respuesta);
       var html='';
       var i;

       const text = respuesta;
      const myArr = JSON.parse(text);

      
      console.log(myArr.length);
          console.log(myArr);
      for(i=0;i<myArr.length;i++){

            html+='<tr>'+
          
          '<td>'+myArr[i][0]+'</td>'+
          '<td>'+myArr[i][1]+'</td>'+
          '<td><img src= "'+ myArr[i][2]+'"width=60></td>'+
         '</tr>';
         
        
        }
        $('#listar').html(html);
       }
       
      });
  }
    


   function obtenerinfo(id){
   // document.getElementById("id").value = id;
    //document.getElementById("lnombre").innerHTML ="Nombre:"+id.toString();
     getNombre(id);
     getCargo(id);
     getLogro(id);
     getPuntaje(id);
     getImagen(id);
     getTabla(id)
  //    document.getElementById("TituloUser").value = "Editar Usuario";  
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
