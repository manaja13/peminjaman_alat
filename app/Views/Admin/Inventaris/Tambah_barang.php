<?php echo $this->extend('Admin/Templates/Index')?>

<?php echo $this->section('page-content');?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-900">Form Tambah Barang</h1>

    <?php if (session()->getFlashdata('msg')): ?>
    <div class="row">
        <div class="col-12">
            <div class="alert alert-success" role="alert">
                <?php echo session()->getFlashdata('msg');?>
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
                    <form action="<?php echo base_url('/Admin/add_data')?> " method="post" enctype="multipart/form-data">
                        <?php echo csrf_field();?>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group ">
                                    <label for="nama_barang">Nama Barang</label>
                                    <select name="nama_barang"
                                        class="form-control form-control-user <?php echo ($validation->hasError('nama_barang')) ? 'is-invalid' : '';?>"
                                        id="input-nama_barang">
                                        <option value="">Pilih Nama Barang</option>
                                        <?php
                                        foreach ($master_barang as $b): ?>
                                        <option value="<?php echo $b['detail_master_id'];?>">
                                            <?php echo $b['nama_brg'];?>(<?php echo $b['tipe_barang'];?>)</option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div id="nama_barangFeedback" class="invalid-feedback">
                                        <?php echo $validation->getError('nama_barang');?>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for="id_satuan">satuan Barang</label>
                                    <select name="id_satuan"
                                        class="form-control form-control-user <?php echo ($validation->hasError('id_satuan')) ? 'is-invalid' : '';?>"
                                        id="input-id_satuan">
                                        <option value="">Pilih Satuan Barang</option>
                                        <?php
                                        foreach ($satuan as $s): ?>
                                        <option value="<?php echo $s['satuan_id'];?>"><?php echo $s['nama_satuan'];?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div id="id_satuanFeedback" class="invalid-feedback">
                                        <?php echo $validation->getError('id_satuan');?>

                                    </div>

                                </div>
                                <div class="form-group ">
                                    <label for="lokasi">Ruangan </label>
                                    <select name="lokasi"
                                        class="form-control form-control-user <?php echo ($validation->hasError('lokasi')) ? 'is-invalid' : '';?>"
                                        id="input-lokasi">
                                        <option value="">Pilih Ruangan</option>
                                        <option value="Lab">Lab</option>
                                        <!-- <option value="LPDSS">LPDSS</option>
                                        <option value="Produksi">Produksi</option>
                                        <option value="Kepela">Kepela</option>
                                        <option value="PST">PST</option>
                                        <option value="Lobby">Lobby</option>
                                        <option value="Gudang">Gudang</option>
                                        <option value="Dapur">Dapur</option>
                                        <option value="Mushola">Mushola</option> -->
                                    </select>
                                    <div id="lokasiFeedback" class="invalid-feedback">
                                        <?php echo $validation->getError('lokasi');?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">

                                <div class="form-group ">
                                    <label for="spesifikasi">Spesifikasi Barang</label>
                                    <textarea name="spesifikasi" type="text"
                                        class="form-control form-control-user <?php echo ($validation->hasError('spesifikasi')) ? 'is-invalid' : '';?>"
                                        id="input-spesifikasi" placeholder="Masukkan spesifikasi Barang"
                                        value="<?php echo old('spesifikasi');?>"></textarea>
                                    <div id="spesifikasiFeedback" class="invalid-feedback">
                                        <?php echo $validation->getError('spesifikasi');?>
                                    </div>
                                </div>
 <div class="form-group">
                                    <label for="stok">Stok</label>
                                    <input type="number" name="stok" id="stok" class="form-control form-control-user <?php echo $validation->hasError('stok') ? 'is-invalid' : '';?>" value="<?php echo old('stok');?>" autofocus>
                                    <div class="invalid-feedback">
                                        <?php echo $validation->getError('stok');?>
                                    </div>
                                </div>
                                <!-- <div class="form-group">
                                    <label for="jumlah_barang">jumlah_barang</label>
                                    <input type="number" name="jumlah_barang" id="jumlah_barang"
                                        class="form-control form-control-user <?php echo $validation->hasError('jumlah_barang') ? 'is-invalid' : '';?>"
                                value="<?php echo old('jumlah_barang');?>"
                                autofocus>
                                <div class="invalid-feedback">
                                    <?php echo $validation->getError('jumlah_barang');?>
                                </div>
                            </div> -->
                                <div class="form-group ">
                                    <label for="kondisi">Kondisi Barang</label>
                                    <select name="kondisi"
        id="input-kondisi"
        class="form-control form-control-user <?php echo ($validation->hasError('kondisi')) ? 'is-invalid' : '';?>">
    <option value="">-- Pilih Kondisi Barang --</option>
    <option value="baru" <?php echo old('kondisi') == 'baru' ? 'selected' : ''?>>Baru</option>
    <option value="bekas" <?php echo old('kondisi') == 'bekas' ? 'selected' : ''?>>Bekas</option>
</select>
<div class="invalid-feedback">
    <?php echo $validation->getError('kondisi');?>
</div>

                                    <div id="kondisiFeedback" class="invalid-feedback">
                                        <?php echo $validation->getError('kondisi');?>
                                    </div>
                                </div>


                            </div>
                            <button class="btn btn-block btn-primary">Tambah Data</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

</div>

<?php echo $this->endSection();?>
<?php echo $this->section('additional-js');?>
<script>
$(document).ready(function() {


    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 3000);
});
</script>

<?php echo $this->endSection();?>