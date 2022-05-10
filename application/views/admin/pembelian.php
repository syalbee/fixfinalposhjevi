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
                    <form id="addTocartbeli">
                        <!-- action="<?= base_url('pembelian/add_to_cart'); ?>" method="POST" -->
                        <table>
                            <tr>
                                <th style="width:100px;padding-bottom:5px;">No Faktur</th>
                                <th style="width:300px;padding-bottom:5px;"><input type="text" name="nofak" value="<?= $this->session->userdata('nofak'); ?>" class="form-control input-sm" style="width:300px;" required></th>
                                <th style="width:90px;padding-bottom:5px;">&nbsp;&nbsp;Suplier</th>
                                <td style="width:350px;">
                                    <select class="form-control select2" style="width: 100%;" id="selectsuplier" name="suplierbeli">
                                        <?php foreach ($sup->result_array() as $s) {
                                            $id_sup = $s['suplier_id'];
                                            $nm_sup = $s['suplier_nama'];
                                            $sess_id = $this->session->userdata('suplier');
                                            if ($sess_id === $id_sup)
                                                echo "<option value='$id_sup' selected>$nm_sup</option>";
                                            else
                                                echo "<option value='$id_sup'>$nm_sup</option>";
                                        } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>Tanggal</th>
                                <td>
                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                        <input type="text" name="tgl" value="<?= $this->session->userdata('tglfak'); ?>" class="form-control datetimepicker-input" data-target="#reservationdate" required />
                                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <hr>
                        <table>
                            <tr>
                                <th>Barcode</th>
                            </tr>
                            <tr>
                                <th>
                                    <select style="width:200px;margin-right:5px;" name="kode_brg" id="kode_brg" class="form-control select2 col-sm-12">

                                    </select>

                                </th>
                                </th>
                            </tr>
                            <div id="detail_barang" style="position:absolute;">
                            </div>
                        </table>
                    </form>
                </div>

                <div class="card-body">

                    <table class="table table-bordered table-condensed" style="font-size:11px;margin-top:10px;">
                        <thead>
                            <tr>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th style="text-align:center;">Satuan</th>
                                <th style="text-align:center;">Harga Pokok</th>
                                <th style="text-align:center;">Harga Jual</th>
                                <th style="text-align:center;">Jumlah Beli</th>
                                <th style="text-align:center;">Sub Total</th>
                                <th style="width:100px;text-align:center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="detail_cart">

                        </tbody>
                    </table>
                    <br>
                    <a href="<?= base_url('pembelian/simpan_pembelian') ?>" class="btn btn-info btn-lg"><span class="fa fa-save"></span> Simpan</a>
                </div>
            </div>

            <hr />
        </div><!-- /.container-fluid -->

    </section>
    <!-- /.content -->
</div>

<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>versi</b> 1.0.0
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
<script src="<?= base_url('assets/js/jquery.price_format.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/sweetalert2/sweetalert2.min.js') ?>"></script>
<script type="text/javascript">
    // $('#kode_brg').next().find('.select2-selection').focus();

    $(document).on('select2:open', () => {
        document.querySelector('.select2-search__field').focus();
    });

    $("#kode_brg").select2({
        placeholder: "Barcode",
        ajax: {
            url: '<?php echo site_url('barang/get_barcode') ?>',
            type: "post",
            dataType: "json",
            data: (params) => ({
                barcode: params.term,
            }),
            success: function(msg) {
                $('#detail_barang').html(msg);
                $("#jumlah").focus();
                // $("#kode_brg")[0].focus();
            },
            processResults: function(data) {
                return {
                    results: $.map(data, function(obj) {
                        return {
                            id: obj.id,
                            text: obj.text
                        };
                    })
                };
            },
            cache: true,
        },
    });


    $("#kode_brg")[0].focus();
    $(document).ready(function() {

        $("#kode_brg").focus();
        $("#kode_brg").on("input", function() {
            var kobar = {
                kode_brg: $(this).val()
            };
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('pembelian/get_barang'); ?>",
                data: kobar,
                success: function(msg) {
                    // console.log(msg);
                    $('#detail_barang').html(msg);
                    $("#jumlah").focus();
                    // addTochart();
                    // $("#kode_brg")[0].focus();
                }
            });
        });

    });

    $('#mydata').DataTable();
    $('#selectsuplier').select2();
    $('#reservationdate').datetimepicker({
        format: 'L'
    });

    function addTochart() {
        $.ajax({
            url: '<?= base_url('pembelian/add_to_cart'); ?>',
            type: "post",
            dataType: "json",
            data: $("#addTocartbeli").serialize(),
            success: (a) => {
                $('#detail_cart').load("<?= site_url('pembelian/read'); ?>");
                $("#kode_brg")[0].focus();
                console.log('s' + a);
            },
            error: (a) => {
                console.log('e' + a);
            },
        });
    }
    $('#detail_cart').load("<?= site_url('pembelian/read'); ?>");

    var dataMSG = '<?= $this->session->flashdata('msgPembelian'); ?>';
    console.log("Data" + dataMSG);

    if (dataMSG.length != 0) {
        if (dataMSG === "saveSuccess") {
            Swal.fire("Sukses", "Sukses Save ke Database", "success");
        } else if (dataMSG === "saveFailed") {
            Swal.fire("Peringatan", "Pastikan Semua Inputan Benar", "warning");
        }
        dataMSG = "";
    }

    function setValues(ele) {
        if (event.key === 'Enter') {
            addTochart();
            // alert(ele.value);
        }
    }
</script>

</body>

</html>