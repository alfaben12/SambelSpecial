<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>SS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />

    <link rel="shortcut icon" href="<?= base_url() ?>appassets/favicon/favicon.ico">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>appassets/favicon/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url() ?>appassets/favicon/favicon-32x32.png">

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

    <!-- Bamburgh UI Kit Stylesheets -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@beta/dist/js.cookie.min.js"></script>

    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>appassets/assets/css/bamburgh.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>appassets/assets/js/demo/clockpicker/clockpicker.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css" />
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.bootstrap4.min.css" />
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedheader/3.1.4/css/fixedHeader.bootstrap4.min.css" />
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/keytable/2.5.0/css/keyTable.bootstrap4.min.css" />
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.2/css/responsive.bootstrap4.min.css" />
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/scroller/2.0.0/css/scroller.bootstrap4.min.css" />
        <!-- clockpicker -->
        <script type="text/javascript" src="<?= base_url() ?>appassets/assets/js/demo/clockpicker/clockpicker.js"></script>
    <script>
        var base_url = 'http://localhost:3002/';
    </script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    "Authorization": "Bearer " + localStorage.getItem('jwtTokenShop')
                }
            });
        });
    </script>
</head>

<body id="app-top">
    <div class="demo-elements-wrapper">
        <div class="container-fluid">
            <div class="row demo-wrapper">
                <div class="col-lg-12">
                    <br/>
                    <div class="row">
                        <?php
                            if($this->uri->segment(2) != "public"){
                                ?>
                                    <div class="col-md-3">
                                        <div class="mb-5">
                                            <div class="btn-group btn-block">
                                                <button type="button" class="btn btn-first dropdown-toggle btn-block" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Buka Menu
                                                </button>
                                                <div class="dropdown-menu bg-slick-carbon border-0 dropdown-menu-xxl">
                                                    <div class="p-2 text-center">
                                                        <a data-toggle="tooltip" title="" href="<?= site_url('dashboards') ?>" class="m-3 btn btn-link p-0 bg-arielle-smile d-inline-block text-center text-white font-size-xl d-60 rounded-circle card-box-hover-rise-alt" data-original-title="Dashboard">
                                                            <i class="fas fa-chart-line"></i>
                                                        </a>
                                                        <a data-toggle="tooltip" title="" href="<?= site_url('products') ?>" class="m-3 btn btn-link p-0 bg-arielle-smile d-inline-block text-center text-white font-size-xl d-60 rounded-circle card-box-hover-rise-alt" data-original-title="Produk">
                                                            <i class="fas fa-list-ul"></i>
                                                        </a>
                                                        <a data-toggle="tooltip" title="" href="<?= site_url('sales') ?>" class="m-3 btn btn-link p-0 bg-arielle-smile d-inline-block text-center text-white font-size-xl d-60 rounded-circle card-box-hover-rise-alt" data-original-title="Penjualan">
                                                            <i class="fas fa-shopping-basket"></i>
                                                        </a>
                                                        <a data-toggle="tooltip" title="" href="<?= site_url('sales/list') ?>" class="m-3 btn btn-link p-0 bg-arielle-smile d-inline-block text-center text-white font-size-xl d-60 rounded-circle card-box-hover-rise-alt" data-original-title="List Penjualan">
                                                            <i class="fas fa-money-bill-alt"></i>
                                                        </a>
                                                        <a data-toggle="tooltip" title="" href="<?= site_url('floorplans') ?>" class="m-3 btn btn-link p-0 bg-arielle-smile d-inline-block text-center text-white font-size-xl d-60 rounded-circle card-box-hover-rise-alt" data-original-title="Denah Ruangan">
                                                            <i class="fas fa-braille"></i>
                                                        </a>
                                                        <a data-toggle="tooltip" title="" href="<?= site_url('reports') ?>" class="m-3 btn btn-link p-0 bg-arielle-smile d-inline-block text-center text-white font-size-xl d-60 rounded-circle card-box-hover-rise-alt" data-original-title="Laporan">
                                                            <i class="fas fa-clipboard-list"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                            }
                        ?>
                    </div>
                    <div class="row">
                        <?= $content_for_layout ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bamburgh UI Kit Javascript Core -->
        <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script type="text/javascript" src="<?= base_url() ?>appassets/assets/vendor/bootstrap/js/bootstrap.min.js"></script>

        <!--Bootstrap init-->

        <script type="text/javascript" src="<?= base_url() ?>appassets/assets/js/demo/bootstrap/bootstrap.min.js"></script>

        <!-- Bamburgh UI Kit Javascript Widgets -->

        <!--Perfect scrollbar-->

        <script type="text/javascript" src="<?= base_url() ?>appassets/assets/vendor/perfect-scrollbar/js/perfect-scrollbar.min.js"></script>

        <!--Perfect scrollbar init-->

        <script type="text/javascript" src="<?= base_url() ?>appassets/assets/js/demo/perfect-scrollbar/perfect-scrollbar.min.js"></script>

        <!--StickyKit-->

        <script type="text/javascript" src="<?= base_url() ?>appassets/assets/vendor/stickykit/js/stickykit.min.js"></script>

        <!--StickyKit init-->

        <script type="text/javascript" src="<?= base_url() ?>appassets/assets/js/demo/stickykit/stickykit.min.js"></script>

        <!--Headroom-->

        <script type="text/javascript" src="<?= base_url() ?>appassets/assets/vendor/headroom/js/headroom.min.js"></script>

        <!--Headroom init-->

        <script type="text/javascript" src="<?= base_url() ?>appassets/assets/js/demo/headroom/headroom.min.js"></script>

        <!--Animations-->

        <script type="text/javascript" src="<?= base_url() ?>appassets/assets/vendor/wow/js/wow.min.js"></script>

        <!--Animations init-->

        <script type="text/javascript" src="<?= base_url() ?>appassets/assets/js/demo/wow/wow.min.js"></script>
        <!--Slick slideshow-->

        <script type="text/javascript" src="<?= base_url() ?>appassets/assets/vendor/slick/js/slick.min.js"></script>

        <!--Slick slideshow init-->

        <script type="text/javascript" src="<?= base_url() ?>appassets/assets/js/demo/slick/slick.min.js"></script>

        <!--SweetAlerts-->

        <script type="text/javascript" src="<?= base_url() ?>appassets/assets/vendor/sweet-alerts/js/sweetalert.min.js"></script>

        <!--SweetAlerts init-->

        <script type="text/javascript" src="<?= base_url() ?>appassets/assets/js/demo/sweet-alerts/sweetalert.min.js"></script>

        <!--DataTables-->

        <!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>-->
        <!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>-->
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.bootstrap4.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.colVis.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
        <!--<script type="text/javascript" src="https://cdn.datatables.net/fixedheader/3.1.4/js/dataTables.fixedHeader.min.js"></script>-->
        <script type="text/javascript" src="https://cdn.datatables.net/keytable/2.5.0/js/dataTables.keyTable.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.2/js/dataTables.responsive.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.2/js/responsive.bootstrap4.min.js"></script>
        <!--<script type="text/javascript" src="https://cdn.datatables.net/scroller/2.0.0/js/dataTables.scroller.min.js"></script>-->

        <!--Apexcharts-->

        <?php
if($this->uri->segment(1) == "dashboards"){
    ?>
            <!-- <script type="text/javascript" src="<?= base_url() ?>appassets/assets/vendor/apexcharts/js/apexcharts.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>appassets/assets/js/demo/apexcharts/sparklines.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>appassets/assets/js/demo/apexcharts/light-charts.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>appassets/assets/js/demo/apexcharts/dark-charts.min.js"></script> -->
            <?php
}
?>

                <!--Datatables init-->
                <!-- <script type="text/javascript" src="<?= base_url() ?>appassets/assets/js/demo/datatables/datatables.min.js"></script> -->
                <!--Notify-->

                <script type="text/javascript" src="<?= base_url() ?>appassets/assets/vendor/notify/js/notify.min.js"></script>

                <!--Notify init-->

                <script type="text/javascript" src="<?= base_url() ?>appassets/assets/js/demo/notify/notify.min.js"></script>

                <!--Bootstrap Datepicker-->

<script type="text/javascript" src="<?= base_url() ?>appassets/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

<!--Bootstrap Datepicker init-->

<script type="text/javascript" src="<?= base_url() ?>appassets/assets/js/demo/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
</body>

</html>