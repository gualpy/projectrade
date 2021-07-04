<?php echo $this->extend('access/dashboard_view');?>
<?php echo $this->section('contenido');?>
<div class="row">
    <div class="card-body">
        <div class="row col-12">
            <div class="col-12">
                <header class="card-header">
                    <h2 class="panel-title">Retiros</h2>
                </header>
            </div>
            <div class="col-12 col-xl-7">
                <form action="<?= base_url(route_to('hacerRetiro'))?>" method="post" class="form-horizontal form-bordered" id="safari_checker" name="retiro">
                    <div class="text-center" style="padding:0 0 11px 0;"></div>
                    <div class="row form-group ">
                        <label class="col-12 col-lg-5 col-xl-5 control-label" for="Withdraw-element-1">
                            <span class="required">*</span>Cantidad
                        </label>
                        <div class="col-12 col-lg-5 col-xl-6">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input type="text" class="form-control" name="cantidad">
                                <div class="input-group-append">
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group " id="element_reason"><label
                            class="col-12 col-lg-5 col-xl-5 control-label" for="reason"><span class="required">*
                            </span>Wallet / Monedero</label>
                        <div id="element_id_reason" class="col-12 col-lg-5 col-xl-6">
                            <input type="text" name="monedero" class="form-control" placeholder="3Jet7J75h3j6k5rdEiSRzifZ3MHLf2SHye" required></div>
                    </div>
                    <?php if(session('msg')):?>
                        <div class="alert alert-<?= session('msg.type')?> text-center">
                            <?= session('msg.body')?>
                        </div>
                    <?php endif?>
                    <p style="color:red;"><?= session('errors.deposito')?></p>
                    <div class="card-footer row justify-content-center" style="padding:0px;">
                        <input type="submit" value="Enviar" name="" class="btn btn-primary" id="Withdraw-element-69">
                    </div>
                </form>
            </div>
            <div class="col-12 col-xl-5">
                <p class="mb-3"><u>Reglas de Retiro: </u></p>
                <div style="font-size: 14px;">
                    <ul>
                        <li>Los retiros se solicitan la ultima semana del mes y se realizaran por la empresa los
                            primeros 5 dias de cada mes.
                        </li>
                        <li>Los retiros son en bitcoin.</li>
                        <li>Los retiros pueden generar hasta 2.5% de cobro.</li>
                        <li></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $this->endSection('');?>