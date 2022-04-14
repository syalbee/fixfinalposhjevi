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
                    <!-- <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#largeModal">Cari Barang</a> -->
                    <!-- <hr> -->
                    <form id="addTocartjual">
                        <table>
                            <tr>
                                <th>Nama Barang</th>
                            </tr>
                            <tr>
                                <th>
                                    <select style="width:200px;margin-right:5px;" name="kode_brg" id="kode_brg" class="form-control select2 col-sm-12">

                                    </select>
                                    <!-- <input style="width:160px;margin-right:5px;" type="text" name="kode_brg" id="kode_brg" class="form-control input-sm"> -->
                                </th>
                            </tr>
                            <div id="detail_barang" style="position:absolute;">

                            </div>
                        </table>
                    </form>
                </div>
                <div class="card-body">
                    <table class="table w-100 table-bordered table-hover" id="tblbarang">
                        <thead>
                            <tr>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th style="text-align:center;">Satuan</th>
                                <th style="text-align:center;">Harga(Rp)</th>
                                <th style="text-align:center;">Diskon(Rp)</th>
                                <th style="text-align:center;">Qty</th>
                                <th style="text-align:center;">Sub Total</th>
                                <th style="width:100px;text-align:center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="detail_cart">

                        </tbody>
                    </table>

                </div>
            </div>

            <form action="<?= base_url('penjualan/simpan_penjualan'); ?>" method="POST">
                <table>
                    <tr>
                        <td style="width:760px;" rowspan="2"><button type="submit" class="btn btn-info btn-lg">Simpan</button></td>
                        <th style="width:140px;">Total Belanja(Rp)</th>
                        <th style="text-align:right;width:140px;"><input type="text" id="total2" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" readonly></th>
                        <input type="hidden" id="total" name="total" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" readonly>
                    </tr>
                    <tr>
                        <th>Tunai(Rp)</th>
                        <th style="text-align:right;"><input type="text" id="jml_uang" name="jml_uang" class="jml_uang form-control input-sm" style="text-align:right;margin-bottom:5px;" required></th>
                        <input type="hidden" id="jml_uang2" name="jml_uang2" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" required>
                    </tr>
                    <tr>
                        <td></td>
                        <th>Kembalian(Rp)</th>
                        <th style="text-align:right;"><input type="text" id="kembalian" name="kembalian" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" readonly></th>
                    </tr>
                    <tr>
                        <td></td>
                        <th>Pelanggan</th>
                        <th style="text-align:right;">
                            <!-- <input type="text" id="pelanggan" name="pelanggan" placeholder="Pelanggan ID" class="form-control input-sm" style="margin-bottom:5px;"> -->
                            <select style="width:200px;margin-right:5px;" name="pelanggan" id="pelanggan" class="form-control select2 col-sm-12">

                            </select>
                        </th>
                    </tr>
                    <tr>
                        <td></td>
                        <th>Set Total</th>
                        <th style="text-align:center;">
                            <br>
                            <input type="checkbox" class="form-check-input" id="setTotal" name="setTotal">
                            <label class="form-check-label" for="setTotal">Set Total</label>
                        </th>
                    </tr>
                    <tr>
                        <td></td>
                        <th>Deskripsi</th>
                        <th style="text-align:right;">
                            <br>
                            <textarea cols="25" rows="3" id="message" name="message"></textarea>
                        </th>
                    </tr>
                </table>
            </form>
            <hr />
        </div><!-- /.container-fluid -->

    </section>
    <!-- /.content -->

</div>

<!-- Modal show Kg -->
<div class="modal fade" id="showBRGKg">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="title_modal" class="modal-title">Masukan Qty Dalam</h5>
                <button class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5 id="titleKg"></h5>
                <!-- <form id="BRGkginsert"> -->
                <input type="hidden" id="idkg" name="idkg">
                <div class="form-group">
                    <!-- <label>QTY :</label> -->
                    <input id="kgqty" name="kgqty" type="text" onkeydown="addKeranjangkilo()" class="form-control">
                </div>
                <!-- <button class="btn btn-success" onclick="addKeranjangkilo()" type="button">Tambah</button> -->
                <!-- </form> -->
            </div>
        </div>
    </div>
</div>
<!-- End Modal show Kg -->


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
<script src="<?= base_url('assets/js/jquery.price_format.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/sweetalert2/sweetalert2.min.js') ?>"></script>

<script type="text/javascript">
    function resultHasil() {
        // $(function() {
        $("#kode_brg")[0].focus();
        $.ajax({
            type: "GET",
            url: "<?php echo base_url('penjualan/readtotal'); ?>",
            success: function(msg) {
                console.log(msg);
                $('#total').val(msg);
                $('#total2').val(formatRupiah(msg));
            },
            error: (a) => {
                console.log(a);
            },
        });

        $('#jml_uang').on("input", function() {
            var total = $('#total').val();
            var jumuang = $('#jml_uang').val();
            var hsl = jumuang.replace(/[^\d]/g, "");
            $('#jml_uang2').val(hsl);
            $('#kembalian').val(hsl - total);
        })

        $('.jml_uang').priceFormat({
            prefix: '',
            //centsSeparator: '',
            centsLimit: 0,
            thousandsSeparator: ','
        });
        $('#jml_uang2').priceFormat({
            prefix: '',
            //centsSeparator: '',
            centsLimit: 0,
            thousandsSeparator: ''
        });
        $('#kembalian').priceFormat({
            prefix: '',
            //centsSeparator: '',
            centsLimit: 0,
            thousandsSeparator: ','
        });
        $('.harjul').priceFormat({
            prefix: '',
            //centsSeparator: '',
            centsLimit: 0,
            thousandsSeparator: ','
        });
        // });
    }

    function formatRupiah(bilangan) {
        var reverse = bilangan.toString().split("").reverse().join(""),
            ribuan = reverse.match(/\d{1,3}/g);
        ribuan = ribuan.join(".").split("").reverse().join("");

        if (bilangan < 0) {
            return "Rp. " + bilangan;
        } else {
            return "Rp. " + ribuan;
        }
    }
</script>

<script type="text/javascript">
    $(document).on('select2:open', () => {
        document.querySelector('.select2-search__field').focus();
    });

    $("#kode_brg").select2({
        placeholder: "Nama Barang",
        ajax: {
            url: '<?php echo site_url('barang/get_barcode') ?>',
            type: "post",
            dataType: "json",
            data: (params) => ({
                barcode: params.term,
            }),
            success: function(msg) {
                $('#detail_barang').html(msg);
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

    $('#mydata').DataTable();
    $('#selectsuplier').select2();
    $('#reservationdate').datetimepicker({
        format: 'L'
    });

    function addTochart() {
        console.log("Cek Btn");
        $.ajax({
            url: '<?= base_url('penjualan/add_to_cart'); ?>',
            type: "post",
            dataType: "json",
            data: $("#addTocartjual").serialize(),
            success: (a) => {
                $('#detail_cart').load("<?= site_url('penjualan/read'); ?>");
                resultHasil();
                console.log('s' + a);
            },
            error: (a) => {
                console.log('e' + a);
            },
        });
    }
    $('#detail_cart').load("<?= site_url('penjualan/read'); ?>");
    resultHasil();
    $(document).ready(function() {
        $('#mydata').DataTable();
    });
</script>
<script type="text/javascript">
    $("#kode_brg")[0].focus();
    $(document).ready(function() {

        $("#kode_brg").focus();
        $("#kode_brg").on("input", function() {
            var kobar = {
                kode_brg: $(this).val()
            };
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('penjualan/get_barang'); ?>",
                data: kobar,
                success: function(msg) {
                    const obj = JSON.parse(msg);
                    console.log(obj)
                    $("#titleKg").html(obj['barang_nama']);
                    $("#idkg").val(obj['barang_id']);
                    $("#title_modal").html("Masukan Qty Dalam " + obj['barang_satuan']);
                    $("#showBRGKg").modal("show");
                    $('#showBRGKg').on('shown.bs.modal', function() {
                        $('#kgqty').focus();
                        $("#kgqty").val("");
                    });
                }
            });
        });

    });


    function addKeranjangkilo() {
        if (event.key === 'Enter') {
            $.ajax({
                url: '<?= base_url('penjualan/add_to_cart_kilo'); ?>',
                type: "POST",
                data: {
                    idkg: $("#idkg").val(),
                    kgqty: $("#kgqty").val(),
                },
                success: (a) => {
                    $('#detail_cart').load("<?= site_url('penjualan/read'); ?>");
                    resultHasil();
                    $("#showBRGKg").modal("hide");
                },
                error: (a) => {
                    console.log('e' + a);
                },
            });
        }
    }

    function ambilbarang(kodebar) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('penjualan/ambil_barang'); ?>",
            data: kodebar,
            success: function(msg) {
                // console.log(msg);
                $('#detail_barang').html(msg);
                addTochart();
                $("#kode_brg")[0].focus();
            }
        });
    }

    $(document).ready(function() {
        // Edit item cart
        $("#tblbarang").on('click', '.edit_cart', function() {
            var currentRow = $(this).closest("tr");
            var brgid = currentRow.find('#BRGiD').val();
            var brgprice = currentRow.find('#BRGprice').val();
            var brgdisc = currentRow.find('#etdisc').val();
            var brgqty = currentRow.find('#etqty').val();

            $.ajax({
                url: "<?php echo base_url(); ?>penjualan/edit",
                method: "POST",
                data: {
                    diskon: brgdisc,
                    qty: brgqty,
                    price: brgprice,
                    row_id: brgid
                },
                success: function(data) {
                    $('#detail_cart').load("<?= site_url('penjualan/read'); ?>");
                    resultHasil();
                }
            });
        });
    });

    //Hapus Item Cart
    $(document).on('click', '.hapus_cart', function() {
        var row_id = $(this).attr("id"); //mengambil row_id dari artibut id
        $.ajax({
            url: "<?php echo base_url(); ?>penjualan/remove",
            method: "POST",
            data: {
                row_id: row_id
            },
            success: function(data) {
                $('#detail_cart').load("<?= site_url('penjualan/read'); ?>");
                resultHasil();
            }
        });
    });

    $("#pelanggan").select2({
        placeholder: "Id Pelanggan",
        ajax: {
            url: '<?php echo site_url('pelanggan/get_pelangganid') ?>',
            type: "post",
            dataType: "json",
            data: (params) => ({
                namaID: params.term,
            }),
            success: function(msg) {
                // $('#detail_barang').html(msg);
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

    function search(ele) {
        if (event.key === 'Enter') {
            $('.edit_cart').click();
            $("#kode_brg")[0].focus();
        }
    }

    $(document).ready(function() {
        $('#setTotal').change(function() {
            var varSettotal = $('input[name="setTotal"]:checked').length > 0;
            if (varSettotal != false) {
                var totalValue = $('#total').val();
                $('#jml_uang').val(totalValue);
                $('#jml_uang2').val(totalValue);
                console.log(totalValue);
            }

        });
    });

    //buat nampilin satuan kilo
</script>

</body>

</html>