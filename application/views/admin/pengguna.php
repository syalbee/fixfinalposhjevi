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
                    <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#PGmodaladd"><span class="fa fa-plus"></span> Tambah Pengguna</a>
                </div>
                <div class="card-body">
                    <table class="table w-100 table-bordered table-hover" id="tblpengguna">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Level</th>
                                <th>Status</th>
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
<div class="modal fade" id="PGmodaladd">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Pengguna</h5>
                <button class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="PGformadd">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" placeholder="Nama" name="addnama" required>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" placeholder="Username" name="addusername" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" class="form-control" placeholder="Password" name="addpassword" required>
                    </div>
                    <div class="form-group">
                        <label for="addlevel">User level</label>
                        <select class="form-control" id="addlevel" name="addlevel">
                            <option value="1">Admin</option>
                            <option value="2">Kasir</option>
                        </select>
                    </div>
                    <button class="btn btn-success" name="PGEdtbtn" type="button" onclick="addData()">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Add -->

<!-- Modal Edit -->
<div class="modal fade" id="PGmodaledit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Suplier</h5>
                <button class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="PGformedit">
                    <input type="hidden" name="id">
                    <input type="hidden" name="Etpassword">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" placeholder="Nama" name="edtnama" required>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" placeholder="Username" name="edtusername" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" class="form-control" placeholder="Password" name="edtpassword" required>
                    </div>
                    <div class="form-group">
                        <label for="edtlevel">User level</label>
                        <select class="form-control" id="edtlevel" name="edtlevel">
                            <option value="1">Admin</option>
                            <option value="2">Kasir</option>
                        </select>
                    </div>
                    <button class="btn btn-success" name="SPEdtbtn" type="button" onclick="editData()">Edit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Edit -->

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
<script>
    var PGreadUrl = '<?php echo base_url('pengguna/read') ?>';
    var PGaddUrl = '<?php echo base_url('pengguna/add') ?>';
    var PGremoveUrl = '<?php echo base_url('pengguna/delete') ?>';
    var PGeditUrl = '<?php echo base_url('pengguna/edit') ?>';
    var PGget_penggunaUrl = '<?php echo base_url('pengguna/get_pengguna') ?>';
    var PGlisturl = '<?php echo base_url('pengguna/listpengguna') ?>';
</script>
<script src="<?php echo base_url('assets/js/pengguna.js') ?>"></script>
</body>

</html>