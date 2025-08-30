<?php echo $this->extend('Admin/Templates/Index') ?>

<?php echo $this->section('page-content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-900">Form Tambah Barang</h1>

    <?php if (session()->getFlashdata('msg')): ?>
    <div class="row">
        <div class="col-12">
            <div class="alert alert-success" role="alert">
                <?php echo session()->getFlashdata('msg'); ?>
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
                    <form action="<?php echo base_url('/Admin/saveBarangMaster') ?> " method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">

                                <div class="form-group ">
                                    <label for="nama_barang">Nama Barang</label>
                                    <input name="nama_barang" type="text"
                                        class="form-control form-control-user                                                                                                                                                                                                                                        <?php echo($validation->hasError('nama_barang')) ? 'is-invalid' : ''; ?>"
                                        id="input-nama_barang" placeholder="Masukkan Nama Barang"
                                        value="<?php echo old('nama_barang'); ?>" />
                                    <div id="nama_barangFeedback" class="invalid-feedback">
                                        <?php echo $validation->getError('nama_barang'); ?>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <!-- <label for="merk">Merk</label>
                                    <input name="merk" type="text"
                                        class="form-control form-control-user                                                                                                                                                                                                                                        <?php echo($validation->hasError('merk')) ? 'is-invalid' : ''; ?>"
                                        id="input-merk" placeholder="Masukkan Merk Barang" />
                                    <div id="merkFeedback" class="invalid-feedback">
                                        <?php echo $validation->getError('merk'); ?>
                                    </div> -->
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">

                                <div class="form-group ">
                                     <label for="merk">Merk</label>
                                    <input name="merk" type="text"
                                        class="form-control form-control-user                                                                                                                                                                                                                                        <?php echo($validation->hasError('merk')) ? 'is-invalid' : ''; ?>"
                                        id="input-merk" placeholder="Masukkan Merk Barang" />
                                    <div id="merkFeedback" class="invalid-feedback">
                                        <?php echo $validation->getError('merk'); ?>
                                    </div>
                                    <div id="jenis_barangFeedback" class="invalid-feedback">
                                        <?php echo $validation->getError('jenis_barang'); ?>

                                    </div>
                                </div>
                            </div>

                                 <div class="col-cl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group ">
                                    <label for="tipe_barang">Tipe Barang</label>
                                   <select name="tipe_barang"
                                                            class="form-control form-control-user                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             <?php echo($validation->hasError('tipe_barang')) ? 'is-invalid' : '' ?>">
                                                        <option value="">-- Pilih Tipe Barang --</option>
                                                        <option value="hrd"                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     <?php echo old('tipe_barang') == 'hrd' ? 'selected' : '' ?>>Hardware</option>
                                                        <option value="sfw"                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     <?php echo old('tipe_barang') == 'sfw' ? 'selected' : '' ?>>Software</option>
                                                    </select>
                                    <div id="tipe_barangFeedback" class="invalid-feedback">
                                        <?php echo $validation->getError('tipe_barang'); ?>
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

<?php echo $this->endSection(); ?>
<?php echo $this->section('additional-js'); ?>
<script>
$(document).ready(function() {


    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 3000);
});
</script>

<?php echo $this->endSection(); ?>