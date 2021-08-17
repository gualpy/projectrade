<?php echo $this->extend('admin/dadmin_view'); ?>
<?php echo $this->section('contenido'); ?>
<div class="card">

    <!-- Billetera-->
    <div class="content">
        <div class="container-fluid">

            <!-- Columna de movimientos -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Directorio de Clientes</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Email</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($cliente as $i): ?>
                                        <tr>
                                            <td><?= $i->nombre;?></td>
                                            <td><?= $i->apellido;?></td>
                                            <td><?= $i->email;?></td>
                                            <td><?= $i->estado;?></td>
                                            <td colspan="4">
                                                <a href="<?= base_url('/admin/Admin/edit/'.$i->cliente)?>" class="btn btn-success btn-sm" id="editar" title="Editar">
                                                    <i class="fa fa-pencil-alt"></i>
                                                </a>
                                                <a href="<?= base_url('/admin/Admin/detalleCuentas/'.$i->cliente)?>" class="btn btn-secondary btn-sm" id="deposito"  title="Deposito">
                                                    <i class="fas fa-file-invoice-dollar"></i>
                                                </a>
                                                <a href="#" id="<?= $i->cliente?>" class="btn btn-info btn-sm" id="deshabilitar" title="Deshabilitar">
                                                    <i class="far fa-eye-slash"></i>
                                                </a>
                                                <a href="#" role="button" data-id="<?=$i->cliente?>" class="btn btn-danger btn-sm" id="eliminar" title="Eliminar">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
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
<?php echo $this->endSection('') ?>