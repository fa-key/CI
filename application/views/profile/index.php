<?php 
if(!isset($_POST["upload"])){
?>
<div class="container-fluid">
      <!-- Page Heading -->
      <h1 class="h3 mb-4 text-gray-800"><?= $judul;  ?></h1>
       <!-- Begin Page Content -->
    <form action="<?= site_url('admin/profile') ?>" method="post" enctype="multipart/form-data" >
    <input class="form-control" id="iduser" name="iduser" type="hidden" value="<?= $user['id'] ?>" >
    <div class="m-5"><label for="Nama">Nama</label><input class="form-control" id="Nama" name="Nama" type="text" value="<?= $user['nama'] ?>" readonly>
    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
    <div class="m-5"><label for="no_telp">Nomor Telepon</label><input class="form-control" id="no_telp" name="no_telp" type="text" value="<?= $user['No_telpon'] ?>" readonly>
    </div>
    <div class="m-5"><label for="Alamat">Alamat</label><input class="form-control" id="Alamat" name="Alamat" type="text" value="<?= $user['alamat'] ?>" readonly>
    </div>
    <button type="submit" name="upload" class="btn btn-primary m-5">Upload</button>
    </form>
<?php
  } else{ 
?>
<!-- Begin Page Content -->
<form action="<?= site_url('admin/profile') ?>" method="post" enctype="multipart/form-data" >
    <input class="form-control" id="iduser" name="iduser" type="hidden" value="<?= $user['id'] ?>" >
    <div class="m-5"><label for="Nama">Nama</label><input class="form-control" id="Nama" name="Nama" type="text" value="<?= $user['nama'] ?>" readonly>
    </div>
    <div class="m-5"><label for="no_telp">Nomor Telepon</label><input class="form-control" id="no_telp" name="no_telp" type="text" value="<?= $user['No_telpon'] ?>" readonly>
    </div>
    <div class="m-5"><label for="Alamat">Alamat</label><input class="form-control" id="Alamat" name="Alamat" type="text" value="<?= $user['alamat'] ?>" readonly>
    </div>
    <a type="submit" name="upload" class="btn btn-secondary m-5">Terdata</a>
    <?php
    }
    ?>
    </form>
<?=  form_close() ?>
</div>