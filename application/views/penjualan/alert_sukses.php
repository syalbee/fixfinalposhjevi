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

    </section>
    <!-- /.content -->
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
<!-- AdminLTE App -->
<script src="<?= base_url(); ?>assets/dist/js/adminlte.min.js"></script>
<script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/sweetalert2/sweetalert2.min.js') ?>"></script>
<script src="<?php echo base_url() . 'assets/js/jquery.price_format.min.js' ?>"></script>
<!-- Select2 -->
<script src="<?= base_url(); ?>assets/plugins/select2/js/select2.full.min.js"></script>

<script type="text/javascript">
    let dataMSG = '<?= $token; ?>';
    let jenis = '<?= $jenis; ?>';
    var urlCetak = '<?= base_url('cetak/struk/') . $token; ?>';
    console.log("Data " + dataMSG);

    if (dataMSG.length != 0) {
        Swal.fire({
            title: "Transaksi",
            text: "Cetak Struk ?",
            showCancelButton: !0,
            type: "warning",
        }).then(() => {
            $.ajax({
                url: urlCetak + dataMSG,
                type: "post",
                data: {
                    id: dataMSG
                },
                dataType: "html",
                success: (a) => {
                    if (jenis == "grosir") {
                        window.location.href = "<?= base_url('penjualan_grosir'); ?>";
                    } else {
                        window.location.href = "<?= base_url('penjualan'); ?>";
                    }
                },
                error: (a) => {
                    console.log(a);
                },
            });
        });
        dataMSG = "";
    }
</script>
</body>

</html>