<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Bago | Pagina de Registro</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  
    <!-- Bago style -->
  <link rel="stylesheet" href="css/bagostyle.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition register-page hero-image">
<div class="register-box ">
  <div class="register-logo">
    <a href="tablero.php"><img src="images/Logo_Bago-completo_blanco.png" height="150" width="350" alt="Logo Image" ></a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Registra un nuevo Usuario</p>

      <form role="form" enctype="multipart/form-data" method="post"  >
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputId">I</label>
                    <input type="hidden"  class="form-control"  id="id" name="id" placeholder="ID" value="0" readonly="true">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputCi">Ci</label>
                    <input type="text" class="form-control" id="ci" name="ci" placeholder="Ingrese su CI">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputNombre">Nombres</label>
                    <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Ingrese sus Nombres">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputApellido">Paterno
                    </label>
                    <input type="text" class="form-control" id="paterno" name="paterno" placeholder="Ingrese sus Apellidos Paterno">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputMaterno">Materno</label>
                    <input type="text" class="form-control" id="materno" name="materno" placeholder="Ingrese su CI">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputCi">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese su Email">
                  </div>
                   

                  <div class="form-group">
                    <label for="exampleInputCi">Telefono</label>
                    <input type="number" class="form-control" id="telefono" name="telefono" placeholder="Ingrese su Telefono">
                  </div>
                                    
                  <div class="form-group">
                    <label for="exampleInputCi">Usuario</label>
                    <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Ingrese su CI">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputCi">Contraseña</label>
                    <input type="text" class="form-control" id="pass" name="pass" placeholder="Ingrese su CI">
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
      <a href="login.php" class="text-center">Ya me encuentro registrado</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
