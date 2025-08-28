<?= $this->extend('Admin/Templates/Index') ?>


<?= $this->section('page-content'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-900">Form Edit Data Barang</h1>

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
                    <a href="/Admin/master_barang">&laquo; Kembali ke daftar barang barang</a>
                </div>
                <div class="card-body">
                    <form action="/Admin/editMaster/<?= $master_brg['kode_brg']; ?>  " method="post"
                        enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group ">
                                    <label for="kode_brg">Kode Barang</label>
                                    <input name="kode_brg" type="text"
                                        class="form-control form-control-user <?= ($validation->hasError('kode_brg')) ? 'is-invalid' : ''; ?>"
                                        id="input-kode_brg" value="<?= $master_brg['kode_brg']; ?>" readonly />
                                    <div id="kode_brgFeedback" class="invalid-feedback">
                                        <?= $validation->getError('kode_brg'); ?>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="nama_brg">Nama Barang</label>
                                    <input name="nama_brg" type="text"
                                        class="form-control form-control-user <?= ($validation->hasError('nama_brg')) ? 'is-invalid' : ''; ?>"
                                        id="input-nama_brg" value="<?= $master_brg['nama_brg']; ?>" />
                                    <div id="nama_brgFeedback" class="invalid-feedback">
                                        <?= $validation->getError('nama_brg'); ?>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="merk">Merk</label>
                                    <input name="merk" type="text"
                                        class="form-control form-control-user <?= ($validation->hasError('merk')) ? 'is-invalid' : ''; ?>"
                                        id="input-merk" placeholder="Masukkan Merk Barang"
                                        value="<?= $master_brg['merk']; ?>" />
                                    <div id="merkFeedback" class="invalid-feedback">
                                        <?= $validation->getError('merk'); ?>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="satuan_barang">Jenis Barang</label>
                                    <select name="jenis_brg"
                                        class="form-control form-control-user <?= ($validation->hasError('jenis_brg')) ? 'is-invalid' : ''; ?>"
                                        id="input-jenis_brg">
                                        <option value="">Pilih Jenis Barang</option>
                                        <option value="inv" <?= $master_brg['jenis_brg'] == 'inv' ? 'selected' : ''; ?>>
                                            Inventaris</option>
                                        <option value="atk" <?= $master_brg['jenis_brg'] == 'atk' ? 'selected' : ''; ?>>
                                            ATK
                                        </option>
                                    </select>
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