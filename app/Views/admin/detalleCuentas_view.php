<?php echo $this->extend('admin/dadmin_view'); ?>
<?php echo $this->section('contenido'); ?>
<div class="card">

    <!-- Billetera-->
    <div class="row card-body nopadding">
        <div class="col-lg-12 col-lg-8">
            <header class="card-header mb-2">
                
                <h2>Depósitos de la cuenta de  <?= $cliente[0]['nombre']?></h2>
                
            </header>

            <table style="background-color: #fff!important;" class="table-sortable table-responsive-sm table table-responsive-md table-responsive-xl " role="table">
                <thead role="rowgroup">
                    <tr style="background-color:white!important;" role="row">
                        <th style="text-align:left!important;" id="rank_header" role="columnheader">IdCliente</th>
                        <th style="text-align:left!important;" id="rank_header" role="columnheader">Código</th>
                        <th style="text-align:left!important;" id="rank_header" role="columnheader">Fecha</th>
                        <th style="text-align:left!important;" id="rank_header" role="columnheader">Concepto</th>
                        <th style="text-align:left!important;" id="riskLevel_header" role="columnheader">Cantidad</th>
                        <th style="text-align:left!important;" id="riskLevel_header" role="columnheader">IdCuenta</th>
                        <th style="text-align:left!important;" id="riskLevel_header" role="columnheader">Acciones</th>
                    </tr>
                </thead>
                <tbody id="myTable" role="rowgroup">
                <?php  foreach($cliente as $i):?>
                    <tr role="row">
                        <td class="content-alignment" align="left" valign="left" role="cell"><?= $i['idCliente']; ?></td>
                        <td class="content-alignment" align="left" valign="left" role="cell"><?= $i['codigo']; ?></td>
                        <td class="content-alignment" align="left" valign="left" role="cell"><?= $i['created_at']; ?></td>
                        <td class="content-alignment" align="left" valign="left" role="cell"><?= $i['observacion']?></td>
                        <td class="content-alignment" align="left" valign="left" role="cell"><?= $i['deposito'] ?></td>
                        <td class="content-alignment" align="left" valign="left" role="cell"><?= $i['idCuenta']?></td>
                        <td colspan="4">
                        <a href="<?= base_url(route_to('presenta_Interes',$i['idCuenta']))?>" class="btn btn-success btn-sm" id="editar" title="Agregar Ganancias">
                            Agregar Ganancias
                        </a>
                    </td>
                    </tr>
                <?php endforeach;?>
                </tbody>
                <tfoot></tfoot>
            </table>
        </div>
    </div>
    
    <!-- fin de billetera -->

</div>
<div class="card">

    <!-- Billetera-->
    <div class="row card-body nopadding">
        <div class="col-lg-12 col-lg-8">
            <header class="card-header mb-2">
                <h2>Total de depósitos</h2>
            </header>
            
                <div>Todos lo depósitos son sumados una vez que el cliente ya no hace reinversión para agregar las ganancias mensuales al total de depósitos
            <table style="background-color: #fff!important;" class="table-sortable table-responsive-sm table table-responsive-md table-responsive-xl " role="table">
                <thead role="rowgroup">
                    <tr style="background-color:white!important;" role="row">
                        <th style="text-align:left!important;" id="rank_header" role="columnheader">IdCliente</th>
                        <th style="text-align:left!important;" id="rank_header" role="columnheader">Código</th>
                        <th style="text-align:left!important;" id="rank_header" role="columnheader">Fecha</th>
                        <th style="text-align:left!important;" id="riskLevel_header" role="columnheader">Cantidad</th>
                        <th style="text-align:left!important;" id="rank_header" role="columnheader">Concepto</th>
                        <th style="text-align:left!important;" id="riskLevel_header" role="columnheader">IdCuenta</th>
                    </tr>
                </thead>
                <tbody id="myTable" role="rowgroup">
                <?php //dd($clientePocCuentas);
                if($clientePorCuentas==null){
                    echo "<tr role ='row'>";
                    echo "<tr>";
                    echo "<td colspan='6' class='content-alignment'>Como solo hay una inversión no se registran totales</td>";
                    echo"</tr>"; 
                    echo "</tr>";
                }
                foreach($clientePorCuentas as $i):?>
                    <tr role="row">
                        <td class="content-alignment" align="left" valign="left" role="cell"><?= $i->cliente; ?></td>
                        <td class="content-alignment" align="left" valign="left" role="cell"><?= $i->codigo; ?></td>
                        <td class="content-alignment" align="left" valign="left" role="cell"><?= $i->created_at; ?></td>
                        <td class="content-alignment" align="left" valign="left" role="cell"><?= $i->deposito ?></td>
                        <td class="content-alignment" align="left" valign="left" role="cell"><?= $i->observacion?></td>
                        <td class="content-alignment" align="left" valign="left" role="cell"><?= $i->cuenta?></td>
                    </tr>
                <?php endforeach;?>
                </tbody>
                <tfoot></tfoot>
            </table>
        </div>
    </div>
    
    <!-- fin de billetera -->

</div>
<?php echo $this->endSection('')?>