<?php echo $this->extend('access/dashboard_view');?>
<?php echo $this->section('contenido');?>
<div class="card">

    <!-- Billetera-->
    <div class="row card-body nopadding">
        <div class="col-lg-12 col-lg-8">
            <header class="card-header mb-2">
                <h2>Movimientos de la cuenta</h2>
            </header>

            <table style="background-color: #fff!important;" class="table-sortable table-responsive-sm table table-responsive-md table-responsive-xl " role="table">
                <thead role="rowgroup">
                    <tr style="background-color:white!important;" role="row">
                        <th style="text-align:left!important;" id="rank_header" role="columnheader">fecha</th>
                        <th style="text-align:left!important;" id="rank_header" role="columnheader">Depósito</th>
                        <th style="text-align:left!important;" id="riskLevel_header" role="columnheader">Detalle</th>
                        <th style="text-align:left!important;" id="riskLevel_header" role="columnheader">Rendimiento</th>
                        <th style="text-align:left!important;" id="riskLevel_header" role="columnheader">Rendimiento por depósito</th>
                    </tr>
                </thead>
                <tbody id="myTable" role="rowgroup">
                <?php foreach($profits as $i):?>
                    <tr role="row">
                        <td class="content-alignment" align="left" valign="left" role="cell"><?= $i['fecha']; ?></td>
                        <td class="content-alignment" align="left" valign="left" role="cell"><?= $i['deposito']; ?></td>
                        <td class="content-alignment" align="left" valign="left" role="cell"><?= $i['concepto']?></td>
                        <td class="content-alignment" align="left" valign="left" role="cell"><?= $i['rendimiento'].'%'?></td>
                        <td class="content-alignment" align="" valign="right" role="cell"><?= $i['BalanceDeposito']?></td>
                    </tr>
                    <?php endforeach;?>
                <tr role="row">
                        <td class="content-alignment" align="left" valign="left" role="cell"></td>
                        <td class="content-alignment" align="left" valign="left" role="cell"></td>
                        <td class="content-alignment" align="left" valign="left" role="cell"></td>
                        <td class="content-alignment" align="left" valign="left" role="cell">Total</td>
                        <td class="content-alignment" align="" valign="right" role="cell"><?= array_sum(array_column($profits,'BalanceDeposito'))?></td>
                </tr>
                </tbody>
                <tfoot></tfoot>
            </table>
        </div>
    </div>
    <!-- fin de billetera -->

</div>
<?php echo $this->endSection('')?>