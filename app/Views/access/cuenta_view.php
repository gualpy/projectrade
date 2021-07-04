<?php echo $this->extend('access/dashboard_view');?>
<?php echo $this->section('contenido');?>
<div class="card">

    <!-- Billetera-->
    <div class="row card-body nopadding">
        <div class="col-12 col-lg-8">
            <script type="text/javascript" src="/js/fix_dropdown_menu.js"></script>
            <header class="card-header mb-2">
                <h2>Cuenta de Monedero(Wallet)</h2>
            </header>

            <div class="table-responsive">
                <table class="table table-responsive-md mb-5 table-hover sortable wallet-table" id="sorttable"
                    style="background-color: #f2ffed;">
                    <thead>
                    </thead>

                    <tbody class="d-none d-sm-block">
                        <tr style="border-bottom: 2px solid #17448e;">
                            <td style="width: 5000px;">
                                <a style="display: block;text-decoration: none;" href="/accounts/transactions/27533">
                                    <span class="mb-2" style="font-size: 20px;padding: 9px 14px;">Mi
                                        monedero(wallet)-1102670</span><br>
                                    <span
                                        style="font-size: 25px;font-weight: 600;padding: 9px 14px;color:#777">USD</span>
                                </a>
                            </td>
                            <td style="text-align: right;position: absolute;right: 1%;">
                                <a style="display: block;text-decoration: none;" href="/accounts/transactions/27533">
                                    <span
                                        style="position: absolute;right: 50%;bottom: -54px;font-size: 25px;font-weight: 600;color:#777;">100.000,00</span>
                                </a>
                            </td>
                        </tr>
                    </tbody>

                    <tbody class="d-block d-sm-none">
                        <tr>
                            <td style="width: 1%;text-align: center;">
                                <a style="display: block;text-decoration: none;" href="/accounts/transactions/27533">
                                    <span class="mb-2" style="font-size: 20px;padding: 9px 14px;">Mi
                                        monedero(wallet)</span>
                                </a>
                            </td>
                        </tr>
                        <tr style="border-bottom: 2px solid #17448e;">
                            <td style="text-align: center;font-size: 25px;font-weight: 600;border-top: none;">
                                <a style="display: block;text-decoration: none;" href="/accounts/transactions/27533">
                                    <span
                                        style="font-size: 25px;font-weight: 600;padding: 9px 14px;color:#777">USD</span>
                                    <span style="color:#777;">0.00</span>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-12 col-lg-4 text-center">

                <a href="#"><img class="img-fluid" src="../assets/img/bannerCuenta.jpg">
            </a><br><br>
        </div>
    </div>
    <!-- fin de billetera -->

</div>
<?php echo $this->endSection('')?>