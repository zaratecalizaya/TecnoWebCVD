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
                    <label for="exampleInputId">ID</label>
                    <input type="number"  class="form-control"  id="id" name="id" placeholder="ID" value="0" readonly="true">
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
                    <label for="exampleInputCi">Ci</label>
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
