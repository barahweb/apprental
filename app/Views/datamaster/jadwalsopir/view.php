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
                                <th>Jadwal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no         = 1;
                            $db         = \Config\Database::connect();
                            
                            foreach ($data as $record) : ?>
                                <tr class="text-center">
                                    <th scope="row"><?= $no++; ?></th>
                                    <td> <?= $record['nama_sopir'] ?> </td>

                                    <?php 
                                        $idSopir    = $record['id_sopir'];
                                        $dataJadwal = $db->query("SELECT sopir.nama_sopir, jadwal_sopir.* from sopir join jadwal_sopir on sopir.id_sopir = jadwal_sopir.id_sopir where jadwal_sopir.id_sopir = '$idSopir'")->getResultArray();
                                    ?>
                                    <td>
                                        <?php  if (count($dataJadwal) > 0) { ?>
                                            <?php foreach ($dataJadwal as $jadwal): ?>

                                                <?php if ($jadwal['hari'] == 'Senin') : ?>
                                                    <div class="alert alert-primary" role="alert">
                                                <?php elseif ($jadwal['hari'] == 'Selasa') : ?>
                                                    <div class="alert alert-secondary" role="alert">
                                                <?php elseif ($jadwal['hari'] == 'Rabu') : ?>
                                                    <div class="alert alert-success" role="alert">
                                                <?php elseif ($jadwal['hari'] == 'Kamis') : ?>
                                                    <div class="alert alert-danger" role="alert">
                                                <?php elseif ($jadwal['hari'] == 'Jumat') : ?>
                                                    <div class="alert alert-warning" role="alert">
                                                <?php elseif ($jadwal['hari'] == 'Sabut') : ?>
                                                    <div class="alert alert-info" role="alert">
                                                <?php elseif ($jadwal['hari'] == 'Minggu'): ?>
                                                    <div class="alert alert-dark" role="alert">
                                                <?php endif; ?>


                                                <?= $jadwal['hari']; ?> || <?= $jadwal['jam_mulai']; ?> - <?= $jadwal['jam_akhir']; ?>
                                                    <button type="button" class="btn btn-danger btn-circle btn-sm float-right ml-2" data-toggle="modal" data-target="#del<?= $jadwal['id_jadwal']; ?>"><i class="fas fa-trash"></i>
                                                    </button>
                                                    <a href="/ubah_jadwal_sopir/<?= $jadwal['id_jadwal']; ?>" class="btn btn-primary btn-circle btn-sm float-right">
                                                    <i class="fas fa-edit"></i></a>
                                                        <div class="modal fade" id="del<?= $jadwal['id_jadwal']; ?>">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title"><b>Hapus</b> </h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p style="color: black;">Apakah Anda yakin ingin menghapus Jadwal Sopir <b><?= $jadwal['nama_sopir']; ?> Hari <?=$jadwal['hari']; ?></b>?</p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <a type="button" class="btn btn-primary" href="/delete_jadwal_sopir/<?= $jadwal['id_jadwal']; ?>">Ya</a>
                                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>
                                            <?php endforeach; ?>
                                        <?php } ?>
                                    </td>


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