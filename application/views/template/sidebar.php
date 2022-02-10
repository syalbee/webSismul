<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
            <a href="#" class="d-block"><?= $nama; ?></a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Admin  -->
            <?php
            if ($this->session->userdata('role') === 'admin') { ?>

                <li class="nav-item">
                    <a href="<?= base_url('admin'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>



                <li class="nav-item">
                    <a href="<?= base_url('absen/rekapabsen'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-clipboard"></i>
                        <p>
                            Rekap Absensi
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            User
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('user/listuser'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('user/tambahuser'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tambah User</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('setting'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Setting
                        </p>
                    </a>
                </li>
                <!-- User -->
            <?php } else { ?>
                <li class="nav-item">
                    <a href="<?= base_url('user'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('absen/rekapuser'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-clipboard"></i>
                        <p>
                            Rekap Absensi
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('user/profile'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-user-circle"></i>
                        <p>
                            Profile
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