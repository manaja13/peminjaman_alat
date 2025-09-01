<?= $this->extend('Admin/Templates/Index') ?>
<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-900"><?= esc($title) ?></h1>

    <?php if (session()->has('PesanBerhasil')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session('PesanBerhasil') ?>
        </div>
    <?php elseif (session()->has('PesanGagal')) : ?>
        <div class="alert alert-danger" role="alert">
            <?= session('PesanGagal') ?>
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h3>Daftar Barang </h3>
                    <a href="/Admin/tambah_inv" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Barang</a>
                    <!-- <a href="<?= base_url('Admin/lap_inventaris/'); ?>" class="btn btn-success"><i class="fa fa-print"></i> Cetak </a>
                    <a href="<?= base_url('Admin/lap_ruangan/'); ?>" class="btn btn-success"><i class="fa fa-print"></i> Barang Ruangan</a>
                    <a href="<?= base_url('Admin/lap_qr/'); ?>" class="btn btn-success"><i class="fa fa-print"></i> Cetak QR</a> -->
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Merk</th>
                                    <th>Tipe</th>
                                    <th>Stok</th>
                                    <!-- <th>Opsi</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($inventaris)) : ?>
                                    <?php
                                    $rule_cek = 90;
                                    $daynow = date('Y-m-d');
                                    foreach ($inventaris as $num => $data) :
                                        // Cari pengecekan dari data yang sudah dilempar controller
                                        $pengecekanData = array_filter($pengecekan, function ($row) use ($data) {
                                            return $row['id_inventaris'] == $data['kode_barang'];
                                        });
                                        $pengecekanData = reset($pengecekanData); // ambil data pertama
                                    ?>
                                        <tr>
                                            <td><?= $num + 1; ?></td>
                                            <td style="text-align:center;"><?= esc($data['kode_barang']); ?></td>
                                            <td><?= esc($data['nama_brg']); ?></td>
                                            <td><?= esc($data['merk']); ?></td>
                                            <td><?= esc($data['jenis_brg']); ?></td>
                                            <td style="text-align:center;"><?= esc($data['stok_tersedia']); ?></td> <!-- 👈 tampilkan stok -->
                                            <!-- <td style="text-align:center; width: 150px;">
                                                <?php if ($pengecekanData) :
                                                    $date1 = date_create($pengecekanData['tanggal_pengecekan']);
                                                    $date2 = date_create($daynow);
                                                    $diff = date_diff($date1, $date2);
                                                    $hari = $diff->format("%a");

                                                    if ($hari > $rule_cek) : ?>
                                                        <a href="<?= site_url('/Admin/pengecekan/' . $data['kode_barang']) ?>" class="btn btn-danger"><i class="fa fa-exclamation-triangle"></i></a>
                                                    <?php else : ?>
                                                        <a href="<?= site_url('/Admin/detail_inv/' . $data['kode_barang']) ?>" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                                        <a href="/Admin/ubah/<?= $data['kode_barang'] ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                                        <a href="#" class="btn btn-danger btn-delete" data-toggle="modal" data-target="#modalKonfirmasiDelete" data-delete-url="<?= site_url('/Admin/delete/' . $data['kode_barang']) ?>"><i class="fa fa-trash"></i></a>
                                                    <?php endif; ?>
                                                <?php else : ?>
                                                    <a href="<?= site_url('/Admin/detail_inv/' . $data['kode_barang']) ?>" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                                    <a href="/Admin/ubah/<?= $data['kode_barang'] ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                                    <a href="#" class="btn btn-danger btn-delete" data-toggle="modal" data-target="#modalKonfirmasiDelete" data-delete-url="<?= site_url('/Admin/delete/' . $data['kode_barang']) ?>"><i class="fa fa-trash"></i></a>
                                                <?php endif; ?>
                                            </td> -->
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <tr>
                                        <td colspan="7"> <!-- 👈 jadi 7 karena ada kolom stok -->
                                            <h3 class="text-gray-900 text-center">Data belum ada.</h3>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                            <!-- #region -->
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi Delete -->
<div class="modal fade" id="modalKonfirmasiDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus barang ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <a id="deleteLink" href="#" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('additional-js'); ?>
<script>
    // Hilangkan notifikasi otomatis
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 3000);

    // Modal konfirmasi delete
    $('.btn-delete').on('click', function(e) {
        e.preventDefault();
        var deleteUrl = $(this).data('delete-url');
        $('#deleteLink').attr('href', deleteUrl);
        $('#modalKonfirmasiDelete').modal('show');
    });
</script>
<?= $this->endSection(); ?>