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
                    <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#SPmodaladd"><span class="fa fa-plus"></span> Tambah Supplier</a>
                </div>
                <div class="card-body">
                    <table class="table w-100 table-bordered table-hover" id="tblsupplier">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Telepon</th>
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
<div class="modal fade" id="SPmodaladd">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Suplier</h5>
                <button class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="SPformadd">
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
                    <button class="btn btn-success" name="SPEdtbtn" type="button" onclick="addData()">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Add -->

<!-- Modal Edit -->
<div class="modal fade" id="SPmodaledit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Suplier</h5>
                <button class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="SPformedit">
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
    var SPreadUrl = '<?php echo base_url('supplier/read') ?>';
    var SPaddUrl = '<?php echo base_url('supplier/add') ?>';
    var SPremoveUrl = '<?php echo base_url('supplier/delete') ?>';
    var SPeditUrl = '<?php echo base_url('supplier/edit') ?>';
    var SPget_supplierUrl = '<?php echo base_url('supplier/get_supplier') ?>';
    var SPlisturl = '<?php echo base_url('supplier/listsupplier') ?>';
</script>
<script src="<?php echo base_url('assets/js/supplier.js') ?>"></script>
<script type="text/javascript">
    // var dataMSG = '<?= $this->session->flashdata('msgSupplier'); ?>';
    // // console.log("Data" + dataMSG.length);

    // if (dataMSG.length != 0) {
    //     if (dataMSG === "add") {
    //         Swal.fire("Sukses", "Sukses Menambah Supplier", "success");
    //     } else if (dataMSG === "edit") {
    //         Swal.fire("Sukses", "Sukses Edit Supplier", "success");
    //     } else if (dataMSG === "remove") {
    //         Swal.fire("Sukses", "Sukses Hapus Supplier", "success");
    //     }
    //     dataMSG = "";
    // }
</script>

</body>

</html>