<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center"
        href="<?= base_url(); ?>">
        <img src="<?= base_url() ?>/assets/img/11.png" width="75px"
            height="75px">
        <div class="sidebar-brand-text mx-3">LAB ESAE</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>">
            <i class="fas fa-home"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">Interface</div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true"
            aria-controls="collapseThree">
            <i class="fas fa-cogs"></i>
            <span>Component Master</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Component Data :</h6>
                <!-- <a class="collapse-item"
                    href="<?= base_url('Admin/master_barang_inv'); ?>">Master
                    Barang Inv</a> -->
                <a class="collapse-item"
                    href="<?= base_url('Admin/master_barang_atk'); ?>">Master
                    Barang Atk</a>
                <a class="collapse-item"
                    href="<?= base_url('Admin/master_tipe_barang'); ?>">Master
                    Tipe Barang</a>
                <a class="collapse-item"
                    href="<?= base_url('Admin/satuan'); ?>">Master
                    Satuan</a>
            </div>
        </div>
    </li>

     <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Admin/adm_inventaris'); ?>">
            <i class="fas fa-home"></i>
            <span>List Barang</span>
        </a>
    </li>
  
    <hr class="sidebar-divider">
    <div class="sidebar-heading">Kelola</div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#barang" aria-expanded="true"
            aria-controls="barang">
            <i class="fas fa-wrench"></i>
            <span>Peminjaman alat</span>
        </a>
        <div id="barang" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Utilities:</h6>
                <a class="collapse-item"
                    href="<?= base_url('Admin/permintaan_masuk'); ?>">Peminjaman alat</a>
                <a class="collapse-item"
                    href="<?= base_url('Admin/permintaan_proses'); ?>">Peminjaman alat Diproses</a>
                <a class="collapse-item"
                    href="<?= base_url('Admin/permintaan_selesai'); ?>">Peminjaman alat Selesai</a>
            </div>
        </div>
    </li>
 
    
    <hr class="sidebar-divider">
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>