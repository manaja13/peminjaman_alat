<?= $this->extend('Admin/Templates/Index') ?>


<?= $this->section('page-content'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-900">Form Edit Data Barang Inventaris</h1>

    <?php if (session()->getFlashdata('msg')) : ?>
    <div class="row">
        <div class="col-12">
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('msg'); ?>
            </div>
        </div>
    </div>

    <?php endif; ?>

    <div class="row">
        <div class="col-12">

            <div class="card shadow">
                <div class="card-header">
                    <a href="/Admin/adm_inventaris">&laquo; Kembali ke daftar barang inventaris</a>
                </div>
                <div class="card-body">
                    <form
                        action="/Admin/update/<?= $inventaris['kode_barang']; ?>  "
                        method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group ">
                                    <label for="kode_barang">Kode Barang</label>
                                    <input name="kode_barang" type="text"
                                        class="form-control form-control-user <?= ($validation->hasError('kode_barang')) ? 'is-invalid' : ''; ?>"
                                        id="input-kode_barang"
                                        value="<?= $inventaris['kode_barang']; ?>"
                                        readonly />
                                    <div id="kode_barangFeedback" class="invalid-feedback">
                                        <?= $validation->getError('kode_barang'); ?>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="nama_barang">Nama Barang</label>
                                    <select name="nama_barang"
                                        class="form-control form-control-user <?= ($validation->hasError('nama_barang')) ? 'is-invalid' : ''; ?>"
                                        id="input-nama_barang">
                                        <option value="">Pilih Nama Barang</option>
                                        <?php
                                        foreach ($master_barang as $b) : ?>
                                        <option
                                            value="<?= $b['detail_master_id']; ?>"
                                            <?= ($b['detail_master_id'] == $inventaris['id_master_barang']) ? 'selected' : ''; ?>>
                                            <?= $b['nama_brg']; ?>(<?= $b['tipe_barang']; ?>)
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div id="nama_barangFeedback" class="invalid-feedback">
                                        <?= $validation->getError('nama_barang'); ?>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for="id_satuan">satuan Barang</label>
                                    <select name="id_satuan"
                                        class="form-control form-control-user <?= ($validation->hasError('id_satuan')) ? 'is-invalid' : ''; ?>"
                                        id="input-id_satuan">
                                        <option value="">Pilih Satuan Barang</option>
                                        <?php
                                        foreach ($satuan as $s) : ?>
                                        <option
                                            value="<?= $s['satuan_id']; ?>"
                                            <?= ($s['satuan_id'] == $inventaris['id_satuan']) ? 'selected' : ''; ?>>
                                            <?= $s['nama_satuan']; ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div id="id_satuanFeedback" class="invalid-feedback">
                                        <?= $validation->getError('id_satuan'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">

                                <div class="form-group ">
                                    <label for="spesifikasi">Spesifikasi Barang</label>
                                    <textarea name="spesifikasi" type="text"
                                        class="form-control form-control-user <?= ($validation->hasError('spesifikasi')) ? 'is-invalid' : ''; ?>"
                                        id="input-spesifikasi"><?= $inventaris['spesifikasi']; ?></textarea>
                                    <div id="spesifikasiFeedback" class="invalid-feedback">
                                        <?= $validation->getError('spesifikasi'); ?>
                                    </div>
                                </div>


                                <!-- <div class="form-group">
                                <label for="jumlah_barang">jumlah_barang</label>
                                <input type="number" name="jumlah_barang" id="jumlah_barang"
                                    class="form-control form-control-user <?= $validation->hasError('jumlah_barang') ? 'is-invalid' : ''; ?>"
                                value=""
                                autofocus>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('jumlah_barang'); ?>
                                </div>
                            </div> -->
                            <div class="form-group ">
                                <label for="kondisi">Kondisi Barang</label>
                                <input name="kondisi" type="text"
                                    class="form-control form-control-user <?= ($validation->hasError('kondisi')) ? 'is-invalid' : ''; ?>"
                                    id="input-kondisi"
                                    value="<?= $inventaris['kondisi']; ?>" />
                                <div id="kondisiFeedback" class="invalid-feedback">
                                    <?= $validation->getError('kondisi'); ?>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="tgl_perolehan">Tanggal Perolehan</label>
                                <input name="tgl_perolehan" type="date"
                                    class="form-control form-control-user <?= ($validation->hasError('tgl_perolehan')) ? 'is-invalid' : ''; ?>"
                                    value="<?= $inventaris['tgl_perolehan']; ?>" />
                                <div id="tgl_perolehanFeedback" class="invalid-feedback">
                                    <?= $validation->getError('tgl_perolehan'); ?>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="tgl_perolehan">Ruangan</label>
                                <select name="lokasi"
                                    class="form-control form-control-user <?= ($validation->hasError('lokasi')) ? 'is-invalid' : ''; ?>"
                                    id="input-lokasi">
                                    <option value="">Pilih Ruangan</option>
                                    <option value="Staf Umum" <?= ($inventaris['lokasi'] == 'Staf Umum') ? 'selected' : ''; ?>>Staf
                                        Umum
                                    </option>
                                    <option value="LPDSS" <?= ($inventaris['lokasi'] == 'LPDSS') ? 'selected' : ''; ?>>LPDSS
                                    </option>
                                    <option value="Produksi" <?= ($inventaris['lokasi'] == 'Produksi') ? 'selected' : ''; ?>>Produksi
                                    </option>
                                    <option value="Kepela" <?= ($inventaris['lokasi'] == 'Kepela') ? 'selected' : ''; ?>>Kepela
                                    </option>
                                    <option value="PST" <?= ($inventaris['lokasi'] == 'PST') ? 'selected' : ''; ?>>
                                        PST</option>
                                    <option value="Lobby" <?= ($inventaris['lokasi'] == 'Lobby') ? 'selected' : ''; ?>>Lobby
                                    </option>
                                    <option value="Gudang" <?= ($inventaris['lokasi'] == 'Gudang') ? 'selected' : ''; ?>>Gudang
                                    </option>
                                    <option value="Dapur" <?= ($inventaris['lokasi'] == 'Dapur') ? 'selected' : ''; ?>>Dapur
                                    </option>
                                    <option value="Mushola" <?= ($inventaris['lokasi'] == 'Mushola') ? 'selected' : ''; ?>>Mushola
                                    </option>
                                </select>
                                <div id="lokasiFeedback" class="invalid-feedback">
                                    <?= $validation->getError('lokasi'); ?>
                                </div>
                            </div>

                        </div>
                        <button class="btn btn-block btn-warning">Update Data</button>
                </div>
                </form>
            </div>
        </div>

    </div>
</div>
</div>

<?= $this->endSection('page-content'); ?>
<?= $this->section('additional-js'); ?>
<script>
    $(document).ready(function() {

        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 3000);
    });
</script>

<?= $this->endSection(); ?>