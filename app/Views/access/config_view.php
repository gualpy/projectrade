<?php echo $this->extend('access/dashboard_view');?>
<?php echo $this->section('contenido');?>
<div class="card">
    <div class="row card-body nopadding">
        <div class="col-12 col-lg-4">
            <header class="card-header mb-2">
                <h2>Información Personal</h2>
            </header>
            <?php if(session('msg')):?>
              <div class="alert alert-<?= session('msg.type')?> text-center">
                  <?= session('msg.body')?>
              </div>
          <?php endif?>
            <form action="<?= base_url(route_to('actualizaCliente'))?>" method="POST" autocomplete="off">
          <div class="input-group mb-3">
            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Name" value="<?=$cliente[0]['nombreCliente']?>">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <p style="color:red;"><?= session('errors.nombre')?></p>
          <div class="input-group mb-3">
            <input type="text" name="apellido" id ="apellido" class="form-control" placeholder="surname" value="<?=$cliente[0]['apellido']?>">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <p style="color:red"><?= session('errors.apellido')?></p>
          <div class="input-group mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email" value="<?=$cliente[0]['email']?>">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <p style="color: red;"><?= session('errors.email')?></p>
          <div class="input-group mb-3">
            <select name="pais" class="form-control">
              <option disabled selected>Elja un país</option>
              <option value="<?=$cliente[0]['codigo']?>"selected><?=$cliente[0]['nombrePais']?></option>
              <?php foreach($pais as $paises):?>
                <option value="<?= $paises->pais?>"><?=$paises->nombre?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <p style="color: red;"><?= session('errors.country')?></p>
          <div class="input-group mb-3">
            <input type="number" name="telefono" class="form-control" placeholder="1234567890" value="<?=$cliente[0]['telefono']?>">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-phone-square"></span>
              </div>
            </div>
          </div>
          <p style="color: red;"><?= session('errors.telefono')?></p>
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