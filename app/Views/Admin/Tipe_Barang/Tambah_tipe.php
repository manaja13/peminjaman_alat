<?= $this->extend('Admin/Templates/Index') ?>

<?= $this->section('page-content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-900">Form Tambah Tipe Barang</h1>

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
                    <a href="/Admin/master_tipe_barang">&laquo; Kembali ke daftar tipe barang</a>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('/Admin/simpanTipe') ?> " method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">

                                <div class="form-group ">
                                    <label for="kode_brg">Nama Barang</label>
                                    <select name="kode_brg"
                                        class="form-control form-control-user <?= ($validation->hasError('kode_brg')) ? 'is-invalid' : ''; ?>"
                                        id="input-kode_brg">
                                        <option value="">Pilih Nama Barang</option>
                                        <?php foreach ($master_barang as $mb) : ?>
                                        <option value="<?= $mb['kode_brg']; ?>"
                                            <?= old('kode_brg') == $mb['kode_brg'] ? 'selected' : ''; ?>>
                                            <?= $mb['nama_brg']; ?>
                                        </option>
                                        <?php endforeach; ?>
                                        <div id="kode_brgFeedback" class="invalid-feedback">
                                            <?= $validation->getError('kode_brg'); ?>
                                        </div>
                                    </select>
                                </div>


                            </div>
                            <div class="col-cl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group ">
                                    <label for="tipe_barang">Tipe Barang</label>
                                   <select name="tipe_barang" 
        class="form-control form-control-user <?= ($validation->hasError('tipe_barang')) ? 'is-invalid' : '' ?>">
    <option value="">-- Pilih Tipe Barang --</option>
    <option value="hrd" <?= old('tipe_barang') == 'hrd' ? 'selected' : '' ?>>Hardware</option>
    <option value="sfw" <?= old('tipe_barang') == 'sfw' ? 'selected' : '' ?>>Software</option>
</select>
                                    <div id="tipe_barangFeedback" class="invalid-feedback">
                                        <?= $validation->getError('tipe_barang'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-block btn-primary">Tambah Data</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

</div>

<?= $this->endSection(); ?>
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