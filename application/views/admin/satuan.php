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
                    <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#largeModal"><span class="fa fa-plus"></span> Tambah Satuan</a>
                </div>
                <div class="card-body">
                    <table class="table w-100 table-bordered table-hover" id="tblSatuan">
                        <thead>
                            <tr>
                                <th style="text-align:center;width:40px;">No</th>
                                <th>Satuan Pokok</th>
                                <th>Satuan Turunan</th>
                                <th style="width:140px;text-align:center;">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $no = 0;
                            foreach ($data->result_array() as $a) :
                                $no++;
                                $id = $a['satuan_id'];
                                $nm = $a['satuan_nama'];
                                $tur = $a['satuan_turunan'];
                            ?>
                                <tr>
                                    <td style="text-align:center;"><?php echo $no; ?></td>
                                    <td><?php echo $nm; ?></td>
                                    <td><?php echo $tur; ?></td>
                                    <td style="text-align:center;">
                                        <a class="btn btn-xs btn-warning" href="#modalEditPelanggan<?php echo $id ?>" data-toggle="modal" title="Edit"><span class="fa fa-edit"></span> Edit</a>
                                        <a class="btn btn-xs btn-danger" href="#modalHapusPelanggan<?php echo $id ?>" data-toggle="modal" title="Hapus"><span class="fa fa-close"></span> Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- /.container-fluid -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Modal Add -->
<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data</h5>
                <button class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post" action="<?= base_url('satuan/tambah_satuan') ?>">
                    <input type="hidden" name="id">
                    <div class="form-group">
                        <label>Satuan</label>
                        <input type="text" class="form-control" placeholder="Satuan" name="satuan" required>
                    </div>

                    <div class="form-group">
                        <label>Satuan Turunan</label>
                        <input type="text" class="form-control" placeholder="Satuan Turunan" name="satuanturunan">
                    </div>

                    <button class="btn btn-sm btn-success">Simpan</button>
                    <button class="btn btn-sm btn-danger" data-dismiss="modal" aria-hidden="true">Tutup</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Add -->

<!-- Modal Edit -->
<?php
foreach ($data->result_array() as $a) {
    $id = $a['satuan_id'];
    $nm = $a['satuan_nama'];
    $tur = $a['satuan_turunan'];
?>
    <div id="modalEditPelanggan<?php echo $id ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data</h5>
                    <button class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="post" action="<?= base_url('satuan/edit_satuan') ?>">
                        <input name="kode" type="hidden" value="<?php echo $id; ?>">
                        <div class="form-group">
                            <label class="control-label col-xs-3">Satuan</label>
                            <div class="col-xs-9">
                                <input name="satuan" class="form-control" type="text" value="<?php echo $nm; ?>" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">Satuan Turunan</label>
                            <div class="col-xs-9">
                                <input type="text" class="form-control" value="<?php echo $tur; ?>" name="edtsatuanturunan" required>
                            </div>
                        </div>

                        <button class="btn btn-sm btn-success">Simpan</button>
                        <button class="btn btn-sm btn-danger" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!-- End Modal Edit -->


<!-- Modal Hapus -->
<?php
foreach ($data->result_array() as $a) {
    $id = $a['satuan_id'];
    $nm = $a['satuan_nama'];

?>
    <div id="modalHapusPelanggan<?php echo $id ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus satuan</h5>
                    <button class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="post" action="<?= base_url('satuan/hapus_satuan') ?>">
                        <input type="hidden" name="kode" value="<?= $id; ?>">
                        <div class="modal-body">
                            <p>Hapus Data satuan <b><?php echo $nm; ?></b> ?</p>
                        </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                            <button type="submit" class="btn btn-primary">Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!-- End Modal Hapus -->


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
    $('#tblSatuan').DataTable();
    var dataMSG = '<?= $this->session->flashdata('msgSatuan'); ?>';
    console.log("Data" + dataMSG.length);

    if (dataMSG.length != 0) {
        if (dataMSG === "add") {
            Swal.fire("Sukses", "Sukses Menambah Satuan", "success");
        } else if (dataMSG === "edit") {
            Swal.fire("Sukses", "Sukses Edit Satuan", "success");
        } else if (dataMSG === "remove") {
            Swal.fire("Sukses", "Sukses Hapus Satuan", "success");
        }
        dataMSG = "";
    }
</script>
</body>

</html>