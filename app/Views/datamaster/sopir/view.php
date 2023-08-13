<?= $this->extend('tampilan/bl'); ?>
<?= $this->section('content'); ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"><?= $judul; ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item active"><?= $judul; ?></li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- COLOR PALETTE -->
        <div class="card card-default color-palette-box">
            <div class="card-header">

                <a class=" btn btn-success m-0 float-right " href="<?= $link; ?>/tambah">Tambah Data <i class="fa fa-plus"></i></a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Nama Sopir</th>
                                <th>Ketersediaan</th>
                                <th>Alamat</th>
                                <th>Gender</th>
                                <th>No Telepon</th>
                                <th>No Identitas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($data as $record) : ?>
                                <tr class="text-center">
                                    <th scope="row"><?= $no++; ?></th>
                                    <td> <?= $record['nama_sopir'] ?> </td>
                                    <td> <?= $record['ketersediaan'] ?> </td>
                                    <td> <?= $record['alamat'] ?> </td>
                                    <td> <?= $record['gender'] ?> </td>
                                    <td> <?= $record['no_telepon'] ?> </td>
                                    <td> <?= $record['no_ktp'] ?> </td>
                                    <td>
                                        <a href="/ubah_sopir/<?= $record['id_sopir']; ?>" class="btn btn-primary btn-circle btn-sm">
                                            <i class="fas fa-edit"></i></a>
                                        <button type="button" class="btn btn-danger btn-circle btn-sm" data-toggle="modal" data-target="#del<?= $record['id_sopir']; ?>"><i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                    <div class="modal fade" id="del<?= $record['id_sopir']; ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title"><b>Hapus</b> </h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Apakah Anda yakin ingin menghapus Pelanggan <b><?= $record['nama_sopir']; ?></b>?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <a type="button" class="btn btn-primary" href="/delete_pelanggan/<?= $record['id_sopir']; ?>">Ya</a>
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->
<?= $this->endSection(); ?>