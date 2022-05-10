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

                <!-- <div class="card-header">
                    <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#largeModal"><span class="fa fa-plus"></span> Tambah Pelanggan</a>
                </div> -->

                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label for="tukarpoint">Nama Pelanggan</label>
                            <select style="width:500px;margin-right:5px;" name="tukarpoint" id="tukarpoint" class="form-control select2 col-sm-12">

                            </select>
                            <!-- <input id="tukarpoint" type="text" class="form-control" placeholder="Masukan ID Pelanggan"> -->
                        </div>
                        <button type="button" onclick="cekPoint()" class="btn btn-primary">Cari</button>
                    </form>
                </div>
            </div>
        </div><!-- /.container-fluid -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<div class="modal fade" id="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Pelanggan</h5>
                <button class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- <form id="cekPoint"> -->
                <div class="form-group">
                    <b>Mininimal point :</b> <span class="minpoint"></span><br>
                    <b>Setiap penukaran mendapatkan :</b> <span class="minuang"></span><br>
                    <hr>
                    <b>Nama :</b> <span class="npoint"></span> <br>
                    <b>Jumlah point :</b> <span class="jpoint"></span> <br>
                    <b>Tanggal :</b> <span class="tpoint"></span>

                </div>

                <div class="form-group">
                    <label>Point yang ingin ditukar</label>
                    <input type="hidden" id="pointdia">
                    <input type="hidden" id="pointtoko">
                    <input type="number" class="form-control" name="jumlahpoint" id="jumlahpoint" required>
                </div>

                <button id="add" class="btn btn-success" type="button" onclick="setPoint()">Tukar</button>
                <button class="btn btn-danger" data-dismiss="modal">Close</button>
                <!-- </form> -->
            </div>
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
<script src="<?= base_url(); ?>assets/plugins/jquery/jquery.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url(); ?>assets/dist/js/adminlte.min.js"></script>
<script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/sweetalert2/sweetalert2.min.js') ?>"></script>
<!-- Select2 -->
<script src="<?= base_url(); ?>assets/plugins/select2/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="<?= base_url(); ?>assets/plugins/moment/moment.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/inputmask/jquery.inputmask.min.js"></script>
<script type="text/javascript">
    $('#tblpelanggan').DataTable();
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
    function cekPoint() {
        $.ajax({
            url: '<?php echo site_url('pelanggan/cekdatapoint') ?>',
            type: "post",
            dataType: "json",
            data: {
                id: $("#tukarpoint").val()
            },
            success: (res) => {
                console.log(res);
                $('#modal').modal('show');
                $("#jumlahpoint").focus();
                $(".npoint").html(res.nama);
                $(".jpoint").html(res.point);
                document.getElementById("pointdia").value = res.point;
                document.getElementById("pointtoko").value = res.minpoint;
                $(".minpoint").html(res.minpoint);
                $(".minuang").html(formatRupiah(res.uang));
                $(".tpoint").html(moment().format("D-MM-YY"));
            },
        });
    }

    function setPoint() {
        var cekStatus = $("#pointdia").val() >= $("#pointtoko").val();
        console.log(cekStatus);
        if (cekStatus != false) {
            console.log("Cek");
            $.ajax({
                url: '<?php echo site_url('pelanggan/updatepoint') ?>',
                type: "post",
                dataType: "json",
                data: {
                    id: $("#tukarpoint").val(),
                    tanggal: moment().format("Y-M-D HH:mm:ss"),
                    point: $("#jumlahpoint").val()
                },
                success: (res) => {
                    console.log(moment().format("D-M-Y H:mm:ss"));
                    Swal.fire("<h1>Jumlah Uang</h1>", "<h3>" + formatRupiah(parseInt(res)) + "</h3>", "success").then(() =>
                        window.location.reload()
                    );

                },
            });
        } else {
            Swal.fire("Perhatian !", "Jumlah Point Kurang", "warning")
        }
    }

    function formatRupiah(bilangan) {
        var reverse = bilangan.toString().split("").reverse().join(""),
            ribuan = reverse.match(/\d{1,3}/g);
        ribuan = ribuan.join(".").split("").reverse().join("");

        if (bilangan < 0) {
            return "RP." + bilangan;
        } else {
            return "RP." + ribuan;
        }
    }

    var inputJumlah = document.getElementById("tukarpoint");
    inputJumlah.addEventListener("keyup", function(event) {
        if (event.keyCode === 13) {
            event.preventDefault();
            document.getElementById("clickcek").click();
        }
    });

    var inputJumlah = document.getElementById("jumlahpoint");
    inputJumlah.addEventListener("keyup", function(event) {
        if (event.keyCode === 13) {
            event.preventDefault();
            document.getElementById("add").click();
            console.log("cek biutt");
        }
    });

    $(document).on('select2:open', () => {
        document.querySelector('.select2-search__field').focus();
    });
    $("#tukarpoint").select2({
        placeholder: "Nama Pelanggan",
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
</script>
</body>

</html>