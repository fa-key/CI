                <!-- Begin Page Content -->
                <div class="container-fluid">
                <?= $this->session->flashdata('pesan'); ?>
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $judul;  ?></h1>
                    <div class="container-fluid">
                    <div class="card shadow mb-4 p-3">
                        <h1>Tentang Kami</h1>
                        <p>Biro perentalan mobil untuk penyewaan domestik. Melayani anda berlibur dengan pilihan mobil yang banyak, layanan terbaik, dan tentunya dengan harga yang terjangkau </p>
                    </div>
</div>                    
                     <!-- Begin Page Content --
                <div class="container-fluid">

<!-- Page Heading -->

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Merk</th>
                        <th>Lokasi</th>
                        <th>Kapasitas</th>
                        <th>Warna</th>
                        <th>Gambar</th>
                        <th>harga</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Merk</th>
                        <th>Lokasi</th>
                        <th>Kapasitas</th>
                        <th>Warna</th>
                        <th>Gambar</th>
                        <th>harga</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                <?php 
                $mobil = $this->db->get('mobil')->result_array();
                ?>
                <?php $i=1; ?>
                <?php foreach($mobil as $mbl) : ?>
                    <tr>
                        <td><?= $mbl['id']; ?></td>
                        <td><?= $mbl['merk']; ?></td>
                        <td><?= $mbl['lokasi']; ?></td>
                        <td><?= $mbl['kapasitas']; ?></td>
                        <td><?= $mbl['warna']; ?></td>
                        <td><img src="<?= base_url('assets/images/') . $mbl['gambar'];?> " width="100"></td>
                        <td><?= $mbl['harga']; ?></td>
                        <td>
                        <?php
                        if($mbl['stok']>0){
                            echo "stok tersedia";
                        }else{
                            echo "mobil kosong";
                        }
                        ?>

                        </td>
                        <td>
                        <?php
                        if($mbl['stok']>0){
                        ?>    
                        <a href="<?= base_url('user/pinjam?id=').$mbl['id'];?>" class="btn btn-primary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-arrow-right"></i>
                                        </span>
                                        <span class="text">Sewa</span>
                                    </a>
                        <?php }else{ ?> 
                            <button href="<?= base_url('user/pinjam?id=').$mbl['id'];?>" class="btn btn-dark btn-icon-split" disabled>
                                        <span class="icon text-white-50">
                                            <i class="fas fa-arrow-right"></i>
                                        </span>
                                        <span class="text">Sewa</span>
                                    </button>
                        <?php } ?> 
                        </td>
                    </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->
 <!-- Begin Page Content -->

                    <div class="container-fluid">
                    <div class="card shadow mb-4 p-3">
                        <h1>Ketentuan Penyewaan Mobil</h1>
                        <h4>
                        <ol>
                            <li>Biaya Penyewaan
                                <ul>
                                    <li>Biaya tidak termasuk BBM dan Supir</li>
                                    <li>Biaya tidak termasuk TOL dan lain-lainnya</li>
                                    
                                </ul>
                            </li>
                            <li>Penyewaan dan Pengembalian Mobil
                                <ul>
                                    <li>Wajib memiliki sim C</li>
                                    <li>Selama masa sewa berlangsung, segala bentuk <b>KEHILANGAN dan KERUSAKAN</b> Mobil sewa beserta kelengkapan-nya menjadi tanggung jawab penuh Penyewa.</li>
                                    <li>unit kendaraan hanya dipakai untuk kepentingan rental, tidak digunakan untuk melanggar hukum <b>TIDAK DIPINDAH TANGANKAN/DIGADAIKAN</b></li>
                                    <li>Ban Bocor di garansi oleh pihak Rental selama 1 (satu) jam semenjak Motor di terima oleh Penyewa, selebihnya menjadi tanggung jawab penyewa. Termasuk apabila harus mengganti Ban Dalam...maka Penyewa wajib untuk menggantinya.</li>
                                    <li>Untuk <b>Pengantaran</b> dan <b>Pengambilan</b> mobil buka dari jam 06.30 s/d 20.00</li>                    
                                </ul>
                            <li> Pembayaran
                                <ul>
                                    <li>Bukti Pembayaran dikirim melalui WA Admin Rental</li>
                                </ul>
                            </li>
                            </li>
                        </ol>
                        </h4>
                    </div>
                 
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

