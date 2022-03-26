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
            <div class="card">

                <div class="card-header">
                    <h5>Pengaturan Toko</h5>
                </div>

                <div class="card-body">
                    <form action="<?= base_url('pengaturan/edit_toko'); ?>" method="POST">
                        <input type="hidden" name="id" value="<?= $data->id  ?>">
                        <div class="form-row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Nama Toko</label>
                                    <input type="text" class="form-control" placeholder="Nama Toko" name="nama" value="<?php echo $data->nama ?>" required>
                                </div>

                                <div>
                                    <label>Jumlah minimal penukaran point</label>
                                    <input type="text" class="form-control" placeholder="Jumlah Minimal Point" name="point" value="<?php echo $data->minPoint ?>" required>
                                </div>
                                <div>
                                    <label>Minimal total belanja untuk mendapatkan point</label>
                                    <input type="text" class="form-control" placeholder="Jumlah Penukaran Uang" name="uang" value="<?php echo $data->jumUang ?>" required>
                                </div>
                                <div>
                                    <label>Point yang didapat setiap transaksi</label>
                                    <input type="text" class="form-control" name="dapatpoint" value="<?php echo $data->point ?>" required>
                                </div>
                                <div>
                                    <label>Jumlah uang yang didapat saat penukaran</label>
                                    <input type="text" class="form-control" name="dapatuang" value="<?php echo $data->uang ?>" required>
                                </div>

                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea name="alamat" placeholder="Alamat" class="form-control" required><?php echo $data->alamat ?></textarea>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-success" type="submit">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- /.container-fluid -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Versi</b> 1.0.0
    </div>
    <strong><a href="<?= base_url('dashboard'); ?>"><?=  $this->db->get('tbl_toko')->result_array()[0]['nama']; ?></a></strong>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url(); ?>assets/plugins/jquery/jquery.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url(); ?>assets/dist/js/adminlte.min.js"></script>
<script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/sweetalert2/sweetalert2.min.js') ?>"></script>

<script type="text/javascript">
    var dataMSG = '<?= $this->session->flashdata('msgPengaturan'); ?>';
    if (dataMSG.length != 0) {
        if (dataMSG === "edit") {
            Swal.fire("Sukses", "Sukses Update Pengaturan", "success");
        }
        dataMSG = "";
    }
</script>
</body>

</html>