<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Welcome to Projectrade</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../assets/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page" style="background-image:url('../assets/dist/img/dashboard_xl-2015.jpg');background-size:cover; background-repeat:no-repeat;background-position:center center;">
  <div class="login-box">
    <div class="login-logo">
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <img src="../assets/img/projectradelogo.png" style="width: 250px; height: 200px; margin: auto; display:block;" alt="Where Money work for you">
        <p class="login-box-msg">Regístrese para iniciar su sesión</p>
        <?php if (session('msg')) : ?>
          <div class="alert alert-<?= session('msg.type') ?> text-center">
            <?= session('msg.body') ?>
          </div>
        <?php endif ?>
        <form action="<?= base_url(route_to('signin')) ?>" method="POST" autocomplete="off">
          <div class="input-group mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email" value="<?= old('email') ?>">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <p style="color:red;"><?= session('errors.email') ?></p>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <p style="color:red;"><?= session('errors.password') ?></p>
          <p style="color:red;"><?= session('errors.terms') ?></p>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                <label for="agreeTerms">
                  Acepto <a href="<?php echo base_url('../assets/TerminosyCondicionesPROJECTRADE.pdf') ?>">terminos y condiciones</a>
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Entrar</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Recuperar su password</h5>
              </div>
              <div class="modal-body">
                <form action="<?php echo base_url(route_to('forgot')); ?>" method="POST">
                    <div class="input-group mb-3">
                      <input type="email" class="form-control" name="forgotmail" id="forgotmail" placeholder="Email" required>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-envelope"></span>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <button id="btnForgot" class="btn btn-primary btn-block">Escriba su email</button>
                      </div>
                      <!-- /.col -->
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div> -->
        <!-- /.social-auth-links -->

        <p class="mb-1">
          <a href="#" data-toggle="modal" data-target="#exampleModal">
            Olvidé mi password
          </a>
        </p>
        <p class="mb-0">
          <a href="<?php echo base_url(route_to('registro')) ?>" class="text-center">Registrar nueva cuenta</a>
        </p>
        <p class="mb-0">
          <a href="<?php echo base_url('../assets/TerminosyCondicionesPROJECTRADE.pdf') ?>" class="text-center" download>Terminos y condiciones</a>
        </p>
        <div class="message"></div>
        <div class="cartmessage"></div>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="../../assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../assets/dist/js/adminlte.min.js"></script>

</body>
<!-- 
0213
20012
21222
21230
22220
22222 -->

</html>