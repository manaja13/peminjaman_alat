<?= $this->extend('Petugas_pengadaan/Templates/Index'); ?>

<?= $this->section('page-content'); ?>
<?php

use App\Models\detailPengadaanModel;

$detailPengadaanModel = new detailPengadaanModel();
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-900"></h1>

    <?php if (session()->has('pesanBerhasil')) : ?>
    <div class="alert alert-success" role="alert">
        <?= session('pesanBerhasil') ?>
    </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-12">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h3><?= $title; ?></h3>

                    <a href="<?php echo base_url('Petugas_pengadaan/lap_pengadaan/'); ?>" class="btn btn-success"><i
                            class="fa fa-print"></i> Cetak </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Pengadaan</th>
                                    <th>Tanggal</th>
                                    <th>Jumlah</th>
                                    <th>Tahun Periode</th>
                                    <th>opsi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Pengadaan</th>
                                    <th>Tanggal</th>
                                    <th>Jumlah</th>
                                    <th>Tahun_periode</th>
                                    <th>Opsi</th>
                                </tr>
                            </tfoot>
                            <tbody>

                                <?php if ($pengadaan) { ?>
                                <?php foreach ($pengadaan as $num => $data) {
                                        $total = $detailPengadaanModel->where('id_pengadaan_barang', $data['pengadaan_barang_id'])->countAllResults();

                                    ?>


                                <tr>
                                    <td><?= $num + 1; ?></td>
                                    <td><?= $data['pengadaan_barang_id'] ?></td>
                                    <td><?php $date = date_create($data['tanggal_pengadaan']); ?>
                                        <?= date_format($date, "d M Y"); ?>
                                    </td>
                                    <td>
                                        <?= $total; ?>
                                    </td>

                                    <td><?= $data['tahun_periode']; ?>
                                    <td>
                                        <!-- <div class="dropdown show">
                                        <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Action
                                        </a> -->

                                        <!-- <div class="dropdown-menu" aria-labelledby="dropdownMenuLink"> -->
                                        <a href="/Petugas_pengadaan/list_pengadaan/<?= $data['pengadaan_barang_id'] ?>"
                                            class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                        <!-- <a href="/Petugas_pengadaan/editPengadaan/<?= $data['pengadaan_barang_id'] ?>"
                                        class=" btn btn-warning"><i class="fas fa-edit"></i></a>
                                        <a href="/Petugas_pengadaan/deletePengadaan/<?= $data['pengadaan_barang_id'] ?>"
                                            class="  btn btn-danger"><i class="fas fa-trash"></i></a> -->



                                        <!-- </div> -->
                                        <!-- </div> -->

                                    </td>
                                </tr>
                                <?php } ?>
                                <!-- end of foreach                -->
                                <?php } else { ?>
                                <tr>
                                    <td colspan="4">
                                        <h3 class="text-gray-900 text-center">Data belum ada.</h3>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

<?= $this->endSection(); ?>
<?= $this->section('additional-js'); ?>
<script>
window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function() {
        $($this).remove();
    })

}, 3000);
</script>
<?= $this->endSection(); ?>