
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $judul;  ?></h1>
                    <div class="row">
                       <div class="col-lg-6">
                       <?= $this->session->flashdata('pesanedit') ?>
                           <?= $this->session->flashdata('message') ?>
                           <?= $this->session->flashdata('messageProfile') ?>
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
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                <?php $queryKatalog = "SELECT * FROM mobil";
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
                        <td>
                        <a href="<?= base_url('admin/edit?id=').$mbl['id'];?>" class="btn btn-primary" name="status">Edit</a>
                        <a href="<?= base_url('admin/hapus?id=').$mbl['id'];?>" class="btn btn-danger" name="status">Hapus</a>
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

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

