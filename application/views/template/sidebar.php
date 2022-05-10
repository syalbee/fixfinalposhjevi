<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
            <!-- <center> -->
            <a href="#" class="d-block"><?= $nama; ?></a>
            <!-- </center> -->
        </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item">
                <a href="<?= base_url('dashboard'); ?>" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-cash-register"></i>
                    <p>
                        Transaksi
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="<?= base_url('penjualan'); ?>" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Transaksi Eceran</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('penjualan_grosir'); ?>" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Transaksi Grosir</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="<?= base_url('pembelian'); ?>" class="nav-link">
                    <i class="nav-icon fas fa-shopping-cart"></i>
                    <p>
                        Belanja
                    </p>
                </a>

            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Pelanggan
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="<?= base_url('pelanggan'); ?>" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Pelanggan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('pelanggan/tukarpoint'); ?>" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Tukar Point</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-boxes"></i>
                    <p>
                        Barang
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>

                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="<?= base_url('barang'); ?>" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Barang</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('kategori'); ?>" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Kategori Barang</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('satuan'); ?>" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Satuan Barang</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="<?= base_url('supplier'); ?>" class="nav-link">
                    <i class="nav-icon fas fa-people-arrows"></i>
                    <p>
                        Supplier
                    </p>
                </a>
            </li>

            <?php if ($this->session->userdata('akses') === '1') { ?>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Laporan
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('laporan'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Semua Laporan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('laporan/ecerankomplit'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Laporan Penjualan Eceran</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('laporan/grosirkomplit'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Laporan Penjualan Grosir</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('pengaturan'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Pengaturan
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('pengguna'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            User Manajemen
                        </p>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>