    <?php 
    error_reporting(E_ALL ^ E_DEPRECATED && E_NOTICE);
    if($this->session->userdata('username')){
      redirect('user');
    }
    $id = $_GET['id'];
    $mobil = $this->db->query("SELECT * FROM mobil WHERE id = $id");
    foreach ($mobil->result_array() as $mbl) :
    ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $judul;  ?></h1>
                     <!-- Begin Page Content -->
    <?= form_open_multipart('admin/edit?id='.$_GET['id']);?>
    <div class="m-5"><label for="Merk">Merk</label><input class="form-control" id="Merk" name="Merk" type="text" value="<?= $mbl['merk'] ?>">
    <?= form_error('merk', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
    <div class="m-5"><label for="Warna">Warna</label><input class="form-control" id="Warna" name="Warna" type="text" value="<?= $mbl['warna'] ?>">
    </div>
    <div class="m-5"><label for="Lokasi">Lokasi</label><input class="form-control" id="Lokasi" name="Lokasi" type="text" value="<?= $mbl['lokasi'] ?>">
    </div>
    <div class="m-5"><label for="Kapasitas">Kapasitas</label><input class="form-control" id="Kapasitas" name="Kapasitas" type="text" value="<?= $mbl['kapasitas'] ?>">
    </div>
    <div class="m-5">
    <label for="Gambar" class="form-label">Gambar</label>
    <br>
    <img src="<?= base_url('assets/images/').$mbl['gambar']; ?>" width=200>
    <input class="form-control form-control-sm" id="gambar" name="userfile" type="file">
    </div>
    <div class="m-5"><label for="Harga">Harga</label><input class="form-control" id="Harga" name="Harga" type="text" value="<?= $mbl['harga'] ?>"></div>
    <div class="m-5"><label for="Stok">Stok</label><input class="form-control" id="Stok" name="Stok" type="number" value="<?= $mbl['stok'] ?>"></div>
    <button type="submit" class="btn btn-primary m-5">Upload</button>
    </form>
    <?php endforeach; ?>
    <?=  form_close() ?>
</div>