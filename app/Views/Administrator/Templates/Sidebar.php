    <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center"
            href="<?= base_url(); ?>">
            <img src="<?php echo base_url() ?>/assets/img/11.png"
                width="75px" height="75px">
            <div class="sidebar-brand-text mx-3">BPS KOTA
                PEKALONGAN

            </div>
        </a>
        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url(); ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link"
                href="<?= base_url('Administrator/kelola_user'); ?>">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Daftar Pengguna</span></a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">



    </ul>