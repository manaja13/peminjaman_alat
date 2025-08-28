<?= $this->extend('Admin/Templates/Index') ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Detail Pengadaan Barang </h1>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow p-3">
                <div class="row col-lg-12 mx-2">
                    <div class="col-lg-4">
                        <label for="kode_pengadaan">Kode Pengadaan</label>
                        <input name="kode_pengadaan" type="text" class="form-control form-control-user"
                            id="input-kode_pengadaan" value="<?= $detail['pengadaan_barang_id']; ?>" readonly />
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="tanggal_pengadaan">Tanggal Pengadaan</label>
                            <input name="tanggal_pengadaan" type="text" class="form-control form-control-user"
                                id="input-tanggal_pengadaan" value="<?= $detail['tanggal_pengadaan']; ?>" readonly />
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <label for="nama_barang">Tahun Periode</label>
                        <input name="tahun_periode" type="text" class="form-control form-control-user"
                            id="input-tahun_periode" value="<?= $detail['tahun_periode']; ?>" readonly />
                    </div>

                </div>
                <div class="row col-lg-12 mx-2 table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Status Barang</th>
                                <th>Jumlah</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php if ($detail_pengadaaan) {
                            ?>
                            <?php foreach ($detail_pengadaaan as $num => $data) {

                                ?>
                            <tr>
                                <td><?= $num + 1; ?></td>
                                <td><?= $data['nama_barang']; ?></td>
                                <td><?= $data['jumlah']; ?></td>
                                <td><span
                                        class="btn <?= $data['status'] === 'belum diproses' ? 'btn-danger' : ($data['status'] === 'diproses' ? 'btn-warning' : 'btn-success') ?> text-white"><?= $data['status']; ?></span>

                                </td>
                                <td>
                                    <?php if ($data['status'] == 'belum diproses') { ?>

                                    <a href="/admin/editPengadaan/<?= $data['id'] ?>" class="  btn btn-success"><i
                                            class="fa fa-edit"></i> </a>



                                    <?php } else { ?>
                                    <button class="  btn btn-secondary"><i class="fa fa-edit"></i> </button>

                                    <?php } ?>
                                </td>
                            </tr>




                            <?php }
                            } else { ?>
                            <tr>
                                <td colspan="3" style="text-align: center;">Data tidak ditemukan</td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <br>
                <a href="/Admin/pengadaan" class="btn btn-secondary">&laquo; Kembali ke daftar Pengadaan barang
                </a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('page-content'); ?>