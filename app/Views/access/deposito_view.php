<?php echo $this->extend('access/dashboard_view');?>
<?php echo $this->section('contenido');?>
<div class="row">
    <div class="card-body">
        <div class="row col-12">
            <div class="col-12">
                <header class="card-header">
                    <h2 class="panel-title">
                        Depósitos en Dólares </h2>
                </header><br>
            </div>
            <div class="col-12 col-xl-7">
                <form action="<?= base_url(route_to('hacerDeposito'))?>" autocomplete="off" method="post" class="form-horizontal form-bordered was-validated" name="deposito">
                    <div class="row form-group ">
                        <label class="col-12 col-lg-5 col-xl-5 control-label" for="reason">
                            <span class="required">*</span>Cantidad</label>
                        <div id="element_id_reason" class="col-12 col-lg-5 col-xl-6">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input type="text" class="form-control" name="deposito" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group " id="element_reason">
                        <label class="col-12 col-lg-5 col-xl-5 control-label" for="reason">
                            <span class="required">*</span>Motivo</label>
                        <div id="element_id_reason" class="col-12 col-lg-5 col-xl-6">
                            <div class="input-group"> 
                                <select class="form-control" name="motivo">
                                    <option value="Inversion">Inversión</option>
                                    <option value="Re-inversion">Re-Inversion</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <?php if(session('msg')):?>
                        <div class="alert alert-<?= session('msg.type')?> text-center">
                            <?= session('msg.body')?>
                        </div>
                    <?php endif?>
                    <p style="color:red;"><?= session('errors.deposito')?></p>
                    <div class="card-footer row justify-content-center" style="padding:0px;">
                        <button type="submit" class="btn btn-primary" id="btnDeposito">Enviar</button>
                    </div>
                </form>
            </div>
            <div class="col-12 col-xl-5">
                <p class="mb-3"><u>Reglas de depósito: </u></p>
                <div style="font-size: 14px;">
                    <ul>
                        <li>Los depositos se reciben de Martes a Viernes y se veran reflejados en las cuentas el siguiente Lunes de la semana despues de haber realizado el deposito.</li>
                    </ul>
                    <!-- En  breve recibiras un correo con las instrucciones del depósito. Gracias con boton Ok -->
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $this->endSection('');?>