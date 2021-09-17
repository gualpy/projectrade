<?php
echo $this->extend('access/dashboard_view');
echo $this->section('contenido');?>
<div class="card">

    <!-- Billetera-->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <!-- Barras estadisticas -->
                    <!-- BAR CHART -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Información de Cuenta</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-primary">
                            <div class="my-3">
                                <table>
                                    <tbody>
                                    <?php 
                                        //dd($cuenta);
                                    foreach($cuenta as $i):?>
                                        <tr>
                                            <th>
                                                <h4>Estado:</h4>
                                            </th>
                                            <td>
                                                <h4><?= $i->estado?></h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><h4>Apertura:</h4></th>
                                            <td><h4><?php echo date_format($i->created_at, "d-M-Y");?></h4></td>
                                        </tr>
                                        <tr>
                                            <th><h4>Depósitos</h4></th>
                                            <td><h4><?php if($i->deposito<=0){echo "0,00";}else{echo "$"."0000";}?></h4></td>
                                        </tr>
                                        <?php endforeach;?>
                                        <tr>
                                                <th><h4>Total de Profit:</h4></th>
                                                <td><h4><?php echo '$'.array_sum(array_column($profits,'BalanceDeposito'))?></h4>
                                                </td>
                                        </tr>
                                        <tr>
                                            <td><h4>Total:</h4></td>
                                            <th>
                                                <h4><?//= $'.$balance=array_sum(array_column($profits,'BalanceDeposito'))+ array_sum(array_column($cuenta,'deposito'))?></h4>
                                            </th>
                                        </tr><br>
                                    </tbody>
                                </table>
                                <br><br><br><br>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- Fin de barras estadisticas -->
                    <!-- imagen velas-->
                    <!-- Fin velas -->
                </div>
                <!-- /.col-md-6 -->
                <div class="col-lg-6">
                    <!-- Barras estadisticas -->
                    <!-- BAR CHART -->
                    <canvas id="profitChart"
                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block;"
                        width="468" height="275" class="chartjs-render-monitor">
                    </canvas>
                    <!-- Fin de barras estadisticas -->
                    <!-- /.card -->
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- Columna de movimientos -->
            <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Listado de depósitos</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Código</th>
                      <th>Fecha - Hora</th>
                      <th>Descripción</th>
                      <th>Valor</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach($cuenta as $i):?>
                    <tr  class="interes" data-id="<?= $i->id;?>">
                      <td><?= $i->id;?></td>
                      <td><?= $i->codigoCuenta;?></td>
                      <td><?= $i->created_at;?></td>
                      <td><?= $i->observacion;?></td>
                      <td><?= $i->deposito;?></td>
                    </tr>
                    <?php endforeach;?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- fin de billetera -->

</div>
<?php echo $this->endSection('')?>