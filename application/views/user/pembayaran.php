 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow mb-4 p-3">

<div class="d-grid gap-2 col-6 mx-auto">
<h1 class="h4 mb-4 text-gray-800 text-center">Pembayaran dilakukan melalui transfer bank
<div class="list-group mt-5">
  <a href="#" class="list-group-item list-group-item-action">
    <img src="../assets/images/bank/BNI.png" width=50>
    Bank BNI
  </a>
  <a href="#" class="list-group-item list-group-item-action">
  <img src="../assets/images/bank/BCA.png" width=50>
  Bank BCA
  </a>
  <a href="#" class="list-group-item list-group-item-action">
  <img src="../assets/images/bank/BRI.png" width=50>
  Bank BRI
  </a>
</div>
</h1>
<a href="https://wa.me/6289624546573"
class="btn btn-success btn-block"><i class="fab fa-whatsapp fa-fw"></i> KIRIM BUKTI TRANSFER</a>
</div>
  
</div>
</div>
</div>