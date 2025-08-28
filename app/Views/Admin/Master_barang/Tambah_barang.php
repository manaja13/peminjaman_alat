<?= $this->extend('Admin/Templates/Index') ?>

<?= $this->section('page-content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-900">Form Tambah Barang</h1>

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
                    <a href="/Admin/master_barang">&laquo; Kembali ke daftar barang</a>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('/Admin/saveBarang') ?> " method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">

                                <div class="form-group ">
                                    <label for="nama_barang">Nama Barang</label>
                                    <input name="nama_barang" type="text"
                                        class="form-control form-control-user <?= ($validation->hasError('nama_barang')) ? 'is-invalid' : ''; ?>"
                                        id="input-nama_barang" placeholder="Masukkan Nama Barang"
                                        value="<?= old('nama_barang'); ?>" />
                                    <div id="nama_barangFeedback" class="invalid-feedback">
                                        <?= $validation->getError('nama_barang'); ?>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <!-- <label for="merk">Merk</label>
                                    <input name="merk" type="text"
                                        class="form-control form-control-user <?= ($validation->hasError('merk')) ? 'is-invalid' : ''; ?>"
                                        id="input-merk" placeholder="Masukkan Merk Barang" />
                                    <div id="merkFeedback" class="invalid-feedback">
                                        <?= $validation->getError('merk'); ?>
                                    </div> -->
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">

                                <div class="form-group ">
                                     <label for="merk">Merk</label>
                                    <input name="merk" type="text"
                                        class="form-control form-control-user <?= ($validation->hasError('merk')) ? 'is-invalid' : ''; ?>"
                                        id="input-merk" placeholder="Masukkan Merk Barang" />
                                    <div id="merkFeedback" class="invalid-feedback">
                                        <?= $validation->getError('merk'); ?>
                                    </div>
                                    <div id="jenis_barangFeedback" class="invalid-feedback">
                                        <?= $validation->getError('jenis_barang'); ?>

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