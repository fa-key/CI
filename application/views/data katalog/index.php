                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><?= $judul;  ?></h1>
                        <a href="<?=base_url('admin/cetakdataKatalog');?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Cetak Laporan </a>
                    </div>

                    <div class="row">
                       <div class="col-lg-6">
                           <?= $this->session->flashdata('message') ?>
                       </div>
                    </div>
                     <!-- Begin Page Content -->
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
                        <th>Stok</th>
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
                        <th>Stok</th>
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
                        <td><img src="<?= base_url('assets/images/').$mbl['gambar'];?> " width="100"></td>
                        <td><?= $mbl['harga']; ?></td>
                        <td><?= $mbl['stok']; ?></td>
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

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
