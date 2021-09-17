<?php echo $this->extend('admin/dadmin_view'); ?>
<?php echo $this->section('contenido'); ?>
<div class="card">
    <div class="row card-body nopadding">
        <div class="col-12">
            <canvas id="myChart" style="min-height: 75%; height: 200px; max-height: 250px; max-width: 75%; display: block;"
                width="468" height="275" class="chartjs-render-monitor">
            </canvas>
        </div>
    </div>
</div>
<div class="card">
    <!-- Billetera-->
    <div class="row card-body nopadding">
        <div class="col-12 col-lg-6">
            <div class="card-body nopadding">
                <header class="card-header mb-2">
                    
                    <h4>Depósitos de la cuenta de <?= $presentaInteres[0]->nombre;
                                                    $presentaInteres[0]->apellido; ?></h4>
                </header>
                <?php if (session('msg')) : ?>
                <div class="alert alert-<?= session('msg.type') ?> text-center">
                    <?= session('msg.body') ?>
                </div>
                <?php endif ?>
                <p style="color: red;"><?= session('errors.fecha') ?></p>
                <form action="<?= base_url(route_to('addProfits')) ?>" method="POST" autocomplete="off">
                    <input type="hidden" name="codigo" id="codigo" value="profit">
                    <div class="input-group mb-3">
                        <label class="col-12 col-sm-4 col-lg-4 col-xl-4 control-label" for="reason">
                            <span class="required">*</span>Fecha
                        </label>
                        <input type="date" name="fecha" id="fecha" class="form-control">
                    </div>
                    <div class="input-group mb-3">
                        <label class="col-12 col-sm-4 col-lg-4 col-xl-4 control-label" for="reason">
                            <span class="required">*</span>Concepto
                        </label>
                        <select name="concepto" id="concepto" class="form-control">
                            <option value="Rendimiento Mensual">Rendimiento Mensual</option>
                        </select>
                    </div>
                    <p style="color: red;"><?= session('errors.ganancia') ?></p>
                    <div class="input-group mb-3">
                        <label class="col-12 col-sm-4 col-lg-4 col-xl-4 control-label" for="reason">
                            <span class="required">*</span>Ganancia %
                        </label>
                        <input type="text" name="ganancia" id="ganancia" class="form-control" placeholder="0.00 %">
                        <input type="hidden" name="cuenta" id="cuenta" value="<?= $profit[0]['cuenta'] ?>">
                    </div>
                    <div class="input-group mb-3">
                        <label class="col-12 col-sm-4 col-lg-4 col-xl-4 control-label" for="reason">
                            <span class="required">*</span>Bono
                        </label>
                        <input type="text" name="bono" id="bono" class="form-control" value="0">
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-lg-8">
                            <button type="submit" class="btn btn-primary btn-block">Guardar</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <table id="tblInteres" style="background-color: #fff!important;"
                class="table-sortable table-responsive-sm table table-responsive-md table-responsive-xl " role="table">
                <thead role="rowgroup">
                    <tr style="background-color:white!important;" role="row">
                        <th style="text-align:left!important;" id="rank_header" role="columnheader">IdCuenta</th>
                        <th style="text-align:left!important;" id="rank_header" role="columnheader">Fecha</th>
                        <th style="text-align:left!important;" id="rank_header" role="columnheader">Ganancia %</th>
                        <th style="text-align:left!important;" id="riskLevel_header" role="columnheader">profit</th>

                    </tr>
                </thead>
                <tbody id="myTable" role="rowgroup">
                    <?php //dd($presentaInteres);?>
                    <tr role="row">
                        
                        <h4><?= '<b>Depostio Inicial: </b> $' . $deposito = $presentaInteres[0]->deposito; ?></h4>
                    </tr>
                    <?php //dd($profit);
                    
                    foreach ($profit as $i) : ?>
                    <tr role="row" class="interes" data-id="<?= $i['cuenta'];?>">
                        <td class="content-alignment" align="left" valign="left" role="cell" data-id="<?= $i['cuenta']?>" id="cuenta"><?= $i['cuenta']; ?></td>
                        <td class="content-alignment" align="left" valign="left" role="cell" id="fecha"><?= $i['created_at']; ?></td>
                        <td class="content-alignment" align="left" valign="left" role="cell" id="ganancia"><?= '$' . $i['ganancia'] ?></td>
                        <td class="content-alignment" align="left" valign="left" role="cell" id="total"><?= setlocale(LC_MONETARY, 'en_US');
                        echo number_format($deposito = ($deposito * $i['ganancia'] / 100) + $deposito, 2, ".", ","); ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
        <!-- fin de billetera -->
    </div>

    
    <?php echo $this->endSection('') ?>