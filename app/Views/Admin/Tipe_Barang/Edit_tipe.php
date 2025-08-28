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
                    <a href="/Admin/master_tipe_barang">&laquo; Kembali ke daftar tipe barang barang</a>
                </div>
                <div class="card-body">
                    <form action="/Admin/updateTipe" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="id" value="<?= $tipe_barang['detail_master_id']; ?>">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group ">
                                    <label for="kode_brg">Kode Barang</label>
                                    <select name="kode_brg"
                                        class="form-control form-control-user <?= ($validation->hasError('kode_brg')) ? 'is-invalid' : ''; ?>"
                                        id="input-kode_brg" required>
                                        <option value="">Pilih Kode Barang</option>
                                        <?php foreach ($master_barang as $mb) : ?>
                                        <option value="<?= $mb['kode_brg']; ?>"
                                            <?= $tipe_barang['kode_brg'] == $mb['kode_brg'] ? 'selected' : ''; ?>>
                                            <?= $mb['kode_brg']; ?>
                                        </option>
                                        <?php endforeach; ?>
                                        <div id="kode_brgFeedback" class="invalid-feedback">
                                            <?= $validation->getError('kode_brg'); ?>
                                        </div>
                                        <div id="kode_brgFeedback" class="invalid-feedback">
                                            <?= $validation->getError('kode_brg'); ?>
                                        </div>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group  ">
                                    <label for="tipe_barang">Tipe Barang</label>
                                    <input name="tipe_barang" type="text"
                                        class="form-control form-control-user <?= ($validation->hasError('tipe_barang')) ? 'is-invalid' : ''; ?>"
                                        id="input-tipe_barang" value="<?= $tipe_barang['tipe_barang']; ?>" required />
                                    <div id="tipe_barangFeedback" class="invalid-feedback">
                                        <?= $validation->getError('tipe_barang'); ?>
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