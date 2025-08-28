<?= $this->extend('Admin/Templates/Index') ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Detail Barang Inventaris</h1>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow p-3">
                <div class="row col-lg-12 mx-2">
                    <div class="col-lg-4">
                        <label for="nama_barang">Kode Barang</label>
                        <input name="nama_barang" type="text" class="form-control form-control-user"
                            id="input-nama_barang"
                            value="<?= $master_brg['kode_brg']; ?>"
                            readonly />
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="nama_barang">Nama Barang</label>
                            <input name="nama_barang" type="text" class="form-control form-control-user"
                                id="input-nama_barang"
                                value="<?= $master_brg['nama_brg']; ?>"
                                readonly />
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="nama_barang">Merk Barang</label>
                            <input name="nama_barang" type="text" class="form-control form-control-user"
                                id="input-nama_barang"
                                value="<?= $master_brg['merk']; ?>"
                                readonly />
                        </div>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <label for="nama_barang">Jenis Barang</label>
                        <input name="nama_barang" type="text" class="form-control form-control-user"
                            id="input-nama_barang" value="<?php
                                                                                                                                    if ($master_brg['jenis_brg'] == 'inv') {
                                                                                                                                        echo "Inventaris";
                                                                                                                                    } else {
                                                                                                                                        echo "ATK";
                                                                                                                                    }
?>" readonly />
                    </div>

                </div>
                <div class="row col-lg-12 mx-2 table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tipe Barang</th>
                                <th>Total</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php if ($detail_brg) {
                                $jumlah = 0;
                                ?>
                            <?php foreach ($detail_brg as $num => $data) {

                                if ($data['jenis_brg'] == 'inv') {
                                    $detail = $inv_model->where('id_master_barang', $data['detail_master_id'])->countAllResults();
                                    $jumlah = $jumlah + $detail;
                                } else {
                                    $detail = $barang_model->select('(SELECT SUM(stok) FROM barang WHERE id_master_barang = ' . $data['detail_master_id'] . ') as stok')->where('id_master_barang', $data['detail_master_id'])->first();
                                    $jumlah = $jumlah + $detail['stok'];
                                }
                                ?>
                            <tr>
                                <td><?= $num + 1; ?></td>
                                <td><?= $data['nama_brg']; ?>-(<?= $data['tipe_barang']; ?>)
                                </td>
                                <td class="text-center">
                                    <?php
                                            if ($data['jenis_brg'] == 'inv') {
                                                echo $detail;
                                            } else {
                                                echo $detail['stok'];
                                            }
                                ?>
                                </td>
                            </tr>


                            <?php
                            } ?>
                            <tr>
                                <td colspan="2" style="text-align: center;">Total</td>
                                <td class="text-center">
                                    <?= $jumlah; ?>
                                </td>
                            </tr>

                            <?php } else { ?>
                            <tr>
                                <td colspan="3" style="text-align: center;">Data tidak ditemukan</td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <br>
                <a href="/Admin/master_barang" class="btn btn-secondary">&laquo; Kembali ke daftar barang
                </a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('page-content'); ?>