<?php echo $this->extend('admin/dadmin_view'); ?>
<?php echo $this->section('contenido'); ?>
<div class="card">
    <!-- Billetera-->
    <div class="row card-body nopadding">
        <div class="col-12 col-lg-6">
            <div class="row card-body nopadding">
                <header class="card-header mb-2">
                    <h2>Depósitos de la cuenta de <??></h2>
                </header>

                <form action="" method="POST" autocomplete="off">
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
                    <div class="input-group mb-3">
                        <label class="col-12 col-sm-4 col-lg-4 col-xl-4 control-label" for="reason">
                            <span class="required">*</span>Ganancia %
                        </label>
                        <input type="text" name="ganancia" id="ganancia" class="form-control" placeholder="0.00 %">
                    </div>
                    
                    <div class="input-group mb-3">
                        <label class="col-12 col-sm-4 col-lg-4 col-xl-4 control-label" for="reason">
                            <span class="required">*</span>Bono
                        </label>
                        <input type="text" name="bono" id="bono" class="form-control" value="0">
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-lg-4">
                            <button type="submit" class="btn btn-primary btn-block">Guardar</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-6">
        <table style="background-color: #fff!important;" class="table-sortable table-responsive-sm table table-responsive-md table-responsive-xl " role="table">
                <thead role="rowgroup">
                    <tr style="background-color:white!important;" role="row">
                        <th style="text-align:left!important;" id="rank_header" role="columnheader">Fecha</th>
                        <th style="text-align:left!important;" id="rank_header" role="columnheader">Concepto</th>
                        <th style="text-align:left!important;" id="riskLevel_header" role="columnheader">Ganancia %</th>
                        <th style="text-align:left!important;" id="riskLevel_header" role="columnheader">Bono</th>
                    </tr>
                </thead>
                <tbody id="myTable" role="rowgroup">
                <?php foreach($profit as $i):?>
                    <tr role="row">
                        <td class="content-alignment" align="left" valign="left" role="cell"><?= $i['fecha']; ?></td>
                        <td class="content-alignment" align="left" valign="left" role="cell"><?= $i['Concepto'] ?></td>
                        <td class="content-alignment" align="left" valign="left" role="cell"><?= $i['ganancia'].'%'?></td>
                        <td class="content-alignment" align="left" valign="left" role="cell"><?= $i['bono']?></td>
                    </tr>
                    
                <?php endforeach;?>
                </tbody>
                <tfoot></tfoot>
            </table>
    </div>
    <!-- fin de billetera -->
</div>
<?php echo $this->endSection('')?>