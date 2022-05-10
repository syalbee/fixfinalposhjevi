<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $title; ?></h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <a href="<?php echo base_url() . 'laporan/lap_data_barang' ?>" target="_blank" class="info-box-icon btn btn-primary"><i class="fas fa-boxes"></i></a>
                        <div class="info-box-content">
                            <span class="info-box-text">Laporan Data Barang</span>
                            <!-- <span class="info-box-number">1,410</span> -->
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <a href="<?php echo base_url() . 'laporan/lap_stok_barang' ?>" target="_blank" class="info-box-icon btn btn-primary"><i class="fas fa-layer-group"></i></a>

                        <div class="info-box-content">
                            <span class="info-box-text">Laporan Stok Barang</span>
                            <!-- <span class="info-box-number">410</span> -->
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <a href="<?php echo base_url() . 'laporan/lap_data_penjualan' ?>" target="_blank" class="info-box-icon btn btn-primary"><i class="fas fa-cart-arrow-down"></i></a>

                        <div class="info-box-content">
                            <span class="info-box-text">Laporan Penjualan</span>
                            <!-- <span class="info-box-number">13,648</span> -->
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <a href="#lap_jual_pertanggal" data-toggle="modal" class="info-box-icon btn btn-primary"><i class="fas fa-cart-arrow-down"></i></a>

                        <div class="info-box-content">
                            <span class="info-box-text"> Penjualan /Tanggal</span>
                            <!-- <span class="info-box-number">93,139</span> -->
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>

            <div class="row">
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <a href="#lap_jual_perbulan" data-toggle="modal" class="info-box-icon btn btn-primary"><i class="fas fa-cart-arrow-down"></i></a>
                        <div class="info-box-content">
                            <span class="info-box-text"> Penjualan /Bulan</span>
                            <!-- <span class="info-box-number">1,410</span> -->
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <a href="#lap_jual_pertahun" data-toggle="modal" class="info-box-icon btn btn-primary"><i class="fas fa-cart-arrow-down"></i></a>

                        <div class="info-box-content">
                            <span class="info-box-text"> Penjualan /Tahun</span>
                            <!-- <span class="info-box-number">410</span> -->
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <a href="#lap_laba_rugi" data-toggle="modal" class="info-box-icon btn btn-primary"><i class="fas fa-chart-line"></i></a>
                        <div class="info-box-content">
                            <span class="info-box-text">Laporan Laba</span>
                            <!-- <span class="info-box-number">13,648</span> -->
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

            </div>
        </div><!-- /.container-fluid -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="modal fade" id="lap_jual_pertanggal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel">Pilih Tanggal</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url() . 'laporan/lap_penjualan_pertanggal' ?>" target="_blank">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3">Tanggal</label>
                        <div class="col-xs-9">
                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                <input type="text" name="tgl" class="form-control datetimepicker-input" data-target="#reservationdate" required />
                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info"><span class="fa fa-print"></span> Cetak</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="lap_jual_perbulan" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel">Pilih Bulan</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url('laporan/lap_penjualan_perbulan') ?>" target="_blank">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3">Bulan</label>
                        <div class="col-xs-9">
                            <select name="bln" class="form-control select2" title="Pilih Bulan" data-width="80%" required />
                            <?php foreach ($jual_bln->result_array() as $k) {
                                $bln = $k['bulan'];
                            ?>
                                <option><?php echo $bln; ?></option>
                            <?php } ?>
                            </select>
                        </div>
                    </div>


                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info"><span class="fa fa-print"></span> Cetak</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="lap_jual_pertahun" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel">Pilih Tahun</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url('laporan/lap_penjualan_pertahun') ?>" target="_blank">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3">Tahun</label>
                        <div class="col-xs-9">
                            <select name="thn" class="form-control select2" title="Pilih Tahun" data-width="80%" required />
                            <?php foreach ($jual_thn->result_array() as $t) {
                                $thn = $t['tahun'];
                            ?>
                                <option><?php echo $thn; ?></option>
                            <?php } ?>
                            </select>
                        </div>
                    </div>


                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info"><span class="fa fa-print"></span> Cetak</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="lap_laba_rugi" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Pilih Bulan</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url('laporan/lap_laba_rugi')  ?>" target="_blank">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3">Bulan</label>
                        <div class="col-xs-9">
                            <select name="bln" class="form-control select2" title="Pilih Bulan" data-width="80%" required />
                            <?php foreach ($jual_bln->result_array() as $k) {
                                $bln = $k['bulan'];
                            ?>
                                <option><?php echo $bln; ?></option>
                            <?php } ?>
                            </select>
                        </div>
                    </div>


                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info"><span class="fa fa-print"></span> Cetak</button>
                </div>
            </form>
        </div>
    </div>
</div>

<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Versi</b> 1.0.0
    </div>
    <strong><a href="<?= base_url('dashboard'); ?>"><?= $this->db->get('tbl_toko')->result_array()[0]['nama']; ?></a></strong>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="<?= base_url(); ?>assets/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="<?= base_url(); ?>assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="<?= base_url(); ?>assets/plugins/moment/moment.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="<?= base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="<?= base_url(); ?>assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="<?= base_url(); ?>assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="<?= base_url(); ?>assets/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="<?= base_url(); ?>assets/plugins/dropzone/min/dropzone.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url(); ?>assets/dist/js/adminlte.min.js"></script>
<script src="<?php echo base_url() . 'assets/js/jquery.price_format.min.js' ?>"></script>

<script type="text/javascript">
    var dataMSG = '<?= $this->session->flashdata('msgPelanggan'); ?>';
    console.log("Data" + dataMSG.length);

    if (dataMSG.length != 0) {
        if (dataMSG === "add") {
            Swal.fire("Sukses", "Sukses Menambah Pelanggan", "success");
        } else if (dataMSG === "edit") {
            Swal.fire("Sukses", "Sukses Edit Pelanggan", "success");
        } else if (dataMSG === "remove") {
            Swal.fire("Sukses", "Sukses Hapus Pelanggan", "success");
        }
        dataMSG = "";
    }
</script>
<script type="text/javascript">
    $('#reservationdate').datetimepicker({
        format: 'L'
    });

    $('.select2').select2();

    //Initialize Select2 Elements
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    });
</script>
</body>

</html>