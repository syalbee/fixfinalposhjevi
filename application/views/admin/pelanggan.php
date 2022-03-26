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
                    <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#PLGmodaladd"><span class="fa fa-plus"></span> Tambah Pelanggan</a>
                </div>
                <div class="card-body">
                    <table class="table w-100 table-bordered table-hover" id="tblpelanggan">
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Telepon</th>
                                <th>NIK</th>
                                <th>Point</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div><!-- /.container-fluid -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<!-- Modal Add -->
<div class="modal fade" id="PLGmodaladd">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Pelanggan</h5>
                <button class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="PLGformadd">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" placeholder="Nama" name="addnama" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" placeholder="Alamat" name="addalamat" required>
                    </div>
                    <div class="form-group">
                        <label>Telepon</label>
                        <input type="text" class="form-control" placeholder="Telepon" name="addtelepon" required>
                    </div>
                    <div class="form-group">
                        <label>NIK</label>
                        <input type="text" class="form-control" placeholder="NIK" name="addnik">
                    </div>
                    <button class="btn btn-success" name="PLGEdtbtn" type="button" onclick="addData()">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Add -->

<!-- Modal edt -->
<div class="modal fade" id="PLGmodaledit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Pelanggan</h5>
                <button class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="PLGformedit">
                    <input type="hidden" name="id">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" placeholder="Nama" name="edtnama" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" placeholder="Alamat" name="edtalamat" required>
                    </div>
                    <div class="form-group">
                        <label>Telepon</label>
                        <input type="text" class="form-control" placeholder="Telepon" name="edttelepon" required>
                    </div>
                    <div class="form-group">
                        <label>NIK</label>
                        <input type="text" class="form-control" placeholder="NIK" name="edtnik">
                    </div>
                    <button class="btn btn-success" name="PLGEdtbtn" type="button" onclick="editData()">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal edt -->


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
<script src="<?= base_url(); ?>assets/plugins/jquery/jquery.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url(); ?>assets/dist/js/adminlte.min.js"></script>
<script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/sweetalert2/sweetalert2.min.js') ?>"></script>

<script type="text/javascript">
    var PLGreadUrl = '<?php echo base_url('pelanggan/read') ?>';
    var PLGaddUrl = '<?php echo base_url('pelanggan/add') ?>';
    var PLGremoveUrl = '<?php echo base_url('pelanggan/delete') ?>';
    var PLGeditUrl = '<?php echo base_url('pelanggan/edit') ?>';
    var PLGget_pelangganUrl = '<?php echo base_url('pelanggan/get_pelanggan') ?>';
    var PLGlisturl = '<?php echo base_url('pelanggan/listpelanggan') ?>';
</script>
<script src="<?php echo base_url('assets/js/pelanggan.js') ?>"></script>
</body>

</html>