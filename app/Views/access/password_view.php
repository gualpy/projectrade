<?php echo $this->extend('access/dashboard_view');?>
<?php echo $this->section('contenido');?>
<div class="card">
    <div class="row card-body nopadding">
        <div class="col-12 col-lg-3 col-lg-4 col-lg-6 col-lg-8">
            <header class="card-header mb-2">
                <h2>Restablecer password</h2>
            </header>
            <?php if(session('msg')):?>
              <div class="alert alert-<?= session('msg.type')?> text-center">
                  <?= session('msg.body')?>
              </div>
              <p style="color: red;"><?= session('errors.c-password')?></p>
            <?php endif?>
          <form action="<?= base_url(route_to('actualizaPassword'))?>" method="POST" autocomplete="off">
          <div class="input-group mb-3">
          <label class="col-12 col-sm-4 col-lg-4 col-xl-4 control-label" for="reason">
            <span class="required">*</span>Actual password
          </label>
            <input type="password" name="v-password" id="v-password" class="form-control">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-check"></span>
              </div>
            </div>
          </div>
          <p style="color:red;"><?= session('errors.v-password')?></p>
          <div class="input-group mb-3">
          <label class="col-12 col-sm-4 col-lg-4 col-xl-4 control-label" for="reason">
            <span class="required">*</span>Nuevo password
          </label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-key"></span>
              </div>
            </div>
          </div>
          <p style="color:red;"><?= session('errors.password')?></p>
          <p style="color:red;"><?= session('errors.c-password')?></p>
          <div class="input-group mb-3">
          <label class="col-12 col-sm-4 col-lg-4 col-xl-4 control-label" for="reason">
            <span class="required">*</span>Repetir password
          </label>
            <input type="password" name="c-password" id="c-password" class="form-control" placeholder="Repita el password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-key"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Actualizar</button>
            </div>
            <!-- /.col -->
          </div>
        </form>            
        </div>
    </div>
</div>
<?php echo $this->endSection('')?>