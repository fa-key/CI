   <!-- Begin Page Content -->
   <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
<?php 
    $mobil = $this->db->get('mobil')->result_array();
?>
<div class="row g-5">
<?php foreach($mobil as $mbl) : ?>
<div class="card m-4" style="width: 18rem;">

  <img class="m-3" src="<?= base_url('assets/images/') . $mbl['gambar'];?> " width="150">
  <div class="card-body">
    <h3 class="card-text"><?= $mbl['merk'];?></h3>
    <p class="card-text">Harga Sewa : <?= $mbl['harga'];?></p>
    <?php
                        if($mbl['stok']>0){
                        ?>    
                        <a href="<?= base_url('user/pinjam?id=').$mbl['id'];?>" class="btn btn-primary">
                        PESAN SEKARANG
                        </a>
                        <?php }else{ ?> 
                            <button href="<?= base_url('user/pinjam?id=').$mbl['id'];?>" class="btn btn-dark" disabled>
                                 KOSONG      
                            </button>
                        <?php } ?> 
  </div>

</div>
<?php endforeach; ?>
</div>
</div>
<!-- /.container-fluid -->


