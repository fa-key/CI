<?php 
error_reporting(E_ALL ^ E_DEPRECATED && E_NOTICE);
if($this->session->userdata('username')){
  redirect('user');
}



$biaya = "";
if (isset($_POST['calculate'])){

  $tgl_pinjam = $_POST['tgl_pinjam'];
	$tgl_kembali = $_POST['tgl_kembali'];
  $tgl_pjm = $tgl_pinjam;
  $tgl_kbl =	$tgl_kembali; 
  $harga = $_POST['harga'];
	$biaya = ((abs(strtotime($tgl_pinjam)-strtotime($tgl_kembali))) /(60*60*24) * $harga );

}
if (isset($_POST["submit"])){
  $merkMobil = $this->input->post('merkMobil');

  $dataSewa = [ 
    'nama' => $this->input->post('nama'),
    'id_mobil' => $this->input->post('id_mobil'),
    'merkMobil' => $merkMobil,
    'tgl_pinjam' =>  $this->input->post('tgl_pjm'),
    'tgl_kembali' => $this->input->post('tgl_kbl'),
    'biaya' =>  $this->input->post('biaya'),
];

if($this->db->insert('sewamobil', $dataSewa)){
  $id = $_GET['id'];
  $mobil = $this->db->query("SELECT * FROM mobil WHERE id = $id")->result_array();
  $this->db->query("UPDATE mobil SET stok = stok - 1 WHERE id = $id");
}
$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                Anda Telah Melakukan Sewa silahkan melanjutkan Pembayaran
                </div>');
redirect('user/pembayaran');
}


$id = $_GET['id'];
if($id == 0){ 
  $mobil = $this->db->query("SELECT * FROM mobil")->result_array();
// $queryKatalog = ("SELECT * FROM mobil WHERE id = $id")[0];

?>
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $judul;  ?></h1>
 <!-- Begin Page Content -->
 <form action="<?= site_url('user/pinjam') ?>" method="post" enctype="multipart/form-data" >
<div class="m-5"><label for="nama">Nama</label><input class="form-control" name="nama" id="nama" type="text" value="<?= $_SESSION['nama'];?>"></div>
<div class="m-5"><label for="merk">Merk</label><input class="form-control" aria-describedby="basic-addon3" name="merkMobil" id="merkMobil"  type="text"></div>
<input type="hidden" class="form-control" aria-describedby="basic-addon3" name="harga" id="harga"/>
<div class="m-5"><label for="tgl_pinjam">Tanggal Pinjam</label><input type="date" class="form-control" name="tgl_pinjam" id="tgl_pinjam" value="<?= set_value('tgl_pinjam'); ?>"></div>
<input type="hidden" class="form-control" aria-describedby="basic-addon3" name="tgl_pjm" id="tgl_pjm" value="<?= $tgl_pinjam; ?>"/>
<div class="m-5"><label for="tgl_kembali">Tanggal Kembali</label><input class="form-control" name="tgl_kembali" id="tgl_kembali" type="date" ></div>
<input type="hidden" class="form-control" aria-describedby="basic-addon3" name="tgl_kbl" id="tgl_kbl" value="<?= $tgl_kembali; ?>"/>
<button type="submit" class="btn btn-primary m-5" autocomplete="off"  name="calculate" id="calculate">Hitung</button>
<div class="m-5"><label for="biaya">Biaya</label><input class="form-control" name="biaya" id="biaya" type="number" value="<?= $biaya; ?>" readonly></div>
<div>
<button type="submit" name="submit" class="btn btn-primary m-5">submit</button>
</div>
</form>

</div>

<?php } else {
  $mobil = $this->db->query("SELECT * FROM mobil WHERE id = $id");
?> 
<?php foreach ($mobil->result_array() as $mbl) : ?>
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $judul;  ?></h1>
 <!-- Begin Page Content -->
 <form action="<?= site_url('user/pinjam?id='.$_GET['id']) ?>" method="post" enctype="multipart/form-data" >
<div class="m-5"><label for="nama">Nama</label><input class="form-control" name="nama" id="nama" type="text" value="<?= $_SESSION['nama'];?>"></div>
<input type="hidden" class="form-control" aria-describedby="basic-addon3" name="id_mobil" id="id_mobil" value="<?=$mbl['id']; ?>"/>
<div class="m-5"><label for="merk">Merk</label><input class="form-control" aria-describedby="basic-addon3" name="merkMobil" id="merkMobil"  type="text" value="<?=$mbl['merk']; ?>"></div>
<input type="hidden" class="form-control" aria-describedby="basic-addon3" name="harga" id="harga" value="<?= $mbl['harga']; ?>"/>
<div class="m-5"><label for="tgl_pinjam">Tanggal Pinjam</label><input type="date" class="form-control" name="tgl_pinjam" id="tgl_pinjam"></div>
<input type="hidden" class="form-control" aria-describedby="basic-addon3" name="tgl_pjm" id="tgl_pjm" value="<?= $tgl_pinjam; ?>"/>
<div class="m-5"><label for="tgl_kembali">Tanggal Kembali</label><input class="form-control" name="tgl_kembali" id="tgl_kembali" type="date" ></div>
<input type="hidden" class="form-control" aria-describedby="basic-addon3" name="tgl_kbl" id="tgl_kbl" value="<?= $tgl_kembali; ?>"/>
<button type="submit" class="btn btn-primary m-5" autocomplete="off"  name="calculate" id="calculate">Hitung</button>
<div class="m-5"><label for="biaya">Biaya</label><input class="form-control" name="biaya" id="biaya" type="number" value="<?= $biaya; ?>" readonly></div>
<div>
<button type="submit" name="submit" class="btn btn-primary m-5">submit</button>
</div>
</form>
<?php endforeach; ?>
</div>
<?php } ?>

