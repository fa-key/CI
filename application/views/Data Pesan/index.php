                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><?= $judul;  ?></h1>
                        <a href="<?=base_url('admin/cetakdataPesan');?>"  class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
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
                        <th>Nama</th>
                        <th>Merk</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Biaya</th>
                        <th>Pembayaran</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Merk</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Biaya</th>
                        <th>Pembayaran</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                <?php $queryKatalog = "SELECT * FROM sewamobil";
                $sewa = $this->db->get('sewamobil')->result_array();
                ?>
                <?php $i=1; ?>
                <form class="user" method="POST" action="<?= base_url('admin/dataPesan'); ?>">
                <?php foreach($sewa as $sw) : ?>
                    <tr>
                        <td><?= $sw['id']; ?></td>
                        <td><?= $sw['nama']; ?></td>
                        <td><?= $sw['merkMobil']; ?></td>
                        <td><?= $sw['tgl_pinjam']; ?></td>
                        <td><?= $sw['tgl_kembali']; ?></td>
                        <td><?= $sw['biaya']; ?></td>
                        <td> 
                            <?php
                            if($sw['pembayaran']>0){
                            ?>
                            <button class="btn btn-secondary" name="bayar" disabled>Lunas</button>

                            <?php
                            }else {?>
                            <a href="<?= base_url('admin/bayar?id=').$sw['id'];?>" class="btn btn-primary" name="bayar">Belum Lunas</a>

                            <?php
                            }
                            ?>   
                        </td>
                        <td>
                        <?php
                            if($sw['status']>0){
                            ?>
                            <button class="btn btn-secondary" name="status" disabled>Dikembalikan</button>

                            <?php
                            }else {?>
                            <a href="<?= base_url('admin/status?id=').$sw['id'];?>" class="btn btn-primary" name="status">Belum Dikembalikan</a>

                            <?php
                            }
                            ?> 
                        </td>
                        <td>
                        <a href="<?= base_url('admin/hapusPesan?id=').$sw['id'];?>" class="btn btn-danger" name="status">Hapus</a>
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

