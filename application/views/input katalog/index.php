                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $judul;  ?></h1>
                     <!-- Begin Page Content -->
    <?= form_open_multipart('admin/inputKatalog');?>
    <div class="m-5"><label for="Merk">Merk</label><input class="form-control" id="Merk" name="Merk" type="text">
    <?= form_error('merk', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
    <div class="m-5"><label for="Warna">Warna</label><input class="form-control" id="Warna" name="Warna" type="text">
    <?= form_error('warna', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
    <div class="m-5"><label for="Lokasi">Lokasi</label><input class="form-control" id="Lokasi" name="Lokasi" type="text">
    <?= form_error('lokasi', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
    <div class="m-5"><label for="Kapasitas">Kapasitas</label><input class="form-control" id="Kapasitas" name="Kapasitas" type="text">
    <?= form_error('Kapasitas', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
    <div class="m-5">
    <label for="Gambar" class="form-label">Gambar</label>
    <input class="form-control form-control-sm" id="gambar" name="userfile" type="file" required>
    </div>
    <div class="m-5"><label for="Harga">Harga</label><input class="form-control" id="Harga" name="Harga" type="text"></div>
    <div class="m-5"><label for="Stok">Stok</label><input class="form-control" id="Stok" name="Stok" type="number"></div>
    <button type="submit" class="btn btn-primary m-5">Upload</button>
    </form>
    <?=  form_close() ?>
</div>