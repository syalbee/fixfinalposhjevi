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
                            <span class="info-box-icon bg-info"><i class="fas fa-tachometer-alt"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text"><a href="<?= base_url('dashboard'); ?>">Dashboard</a></span>
                                <!-- <span class="info-box-number">1,410</span> -->
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-success"><i class="fas fa-cash-register"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text"><a href="<?= base_url('penjualan'); ?>">Transaksi</a></span>
                                <!-- <span class="info-box-number">410</span> -->
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-warning"><i class="fas fa-users"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text"><a href="<?= base_url('pelanggan'); ?>">Pelanggan</a></span>
                                <!-- <span class="info-box-number">13,648</span> -->
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-danger"><i class="fas fa-shopping-cart"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text"><a href="<?= base_url('pembelian'); ?>">Belanja</a></span>
                                <!-- <span class="info-box-number">93,139</span> -->
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div>

                <!--  -->

                <div class="row">
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-info"><i class="fas fa-boxes"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text"><a href="<?= base_url('barang'); ?>">Barang</a></span>
                                <!-- <span class="info-box-number">1,410</span> -->
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-success"><i class="fas fa-people-arrows"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text"><a href="<?= base_url('supplier'); ?>">Supplier</a></span>
                                <!-- <span class="info-box-number">410</span> -->
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <?php if ($this->session->userdata('akses') === '1') { ?>
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-warning"><i class="fas fa-edit"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text"><a href="<?= base_url('laporan'); ?>">Laporan</a></span>
                                    <!-- <span class="info-box-number">13,648</span> -->
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-danger"><i class="fas fa-cog"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text"><a href="<?= base_url('pengaturan'); ?>">Pengaturan</a></span>
                                    <!-- <span class="info-box-number">93,139</span> -->
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-primary"><i class="fas fa-user"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text"><a href="<?= base_url('pengguna'); ?>">User Manajemen</a></span>
                                    <!-- <span class="info-box-number">93,139</span> -->
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                    <?php } ?>
                    <!-- /.col -->
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->