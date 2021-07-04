<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Projectrade | Registration Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
</head>

<body class="hold-transition register-page" style="background-image:url('../assets/img/handshake.jpg'); background-size:cover; background-repeat:no-repeat;background-position:center center;">
  <div class="register-box">
    <div class="register-logo">
    </div>

    <div class="card">
      <div class="card-body register-card-body">
      <img src="../assets/img/projectradelogo.png" style="width: 200px; height: 120px; margin: auto; display:block;" alt="Where Money work for you">
        <p class="login-box-msg">Register a new membership</p>
        <form action="<?= base_url(route_to('store'))?>" method="POST" autocomplete="off">
          <div class="input-group mb-3">
            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Name" value="<?=old('nombre')?>">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <p style="color:red;"><?= session('errors.nombre')?></p>
          <div class="input-group mb-3">
            <input type="text" name="apellido" id ="apellido" class="form-control" placeholder="surname" value="<?=old('apellido')?>">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <p style="color:red"><?= session('errors.apellido')?></p>
          <div class="input-group mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email" value="<?=old('email')?>">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <p style="color: red;"><?= session('errors.email')?></p>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="c-password" class="form-control" placeholder="Repetir password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <p style="color: red;"><?= session('errors.c-password')?></p>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                <p style="color:red"><?= session('errors.terms')?></p>
                <label for="agreeTerms">
                  I agree to the <a href="<?php echo base_url('../assets/TerminosyCondicionesPROJECTRADE.pdf')?>">terms</a>
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Register</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
        <a href="<?= base_url("/")?>" class="text-center">I already have a membership</a>
      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
  </div>
  <!-- /.register-box -->

  <!-- jQuery -->
  <script src="../assets/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../assets/dist/js/adminlte.min.js"></script>
</body>

</html>