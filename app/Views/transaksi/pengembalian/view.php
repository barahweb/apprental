<?= $this->extend('tampilan/bl'); ?>
<?= $this->section('content'); ?>
<?php
function tgl_indo($tgl)
{
    $tanggal = substr($tgl, 8, 2);
    $bulan = getBulan(substr($tgl, 5, 2));
    $tahun = substr($tgl, 0, 4);
    return $tanggal . ' ' . $bulan . ' ' . $tahun;
}

function getBulan($bln)
{
    switch ($bln) {
        case 1:
            return "Januari";
            break;
        case 2:
            return "Februari";
            break;
        case 3:
            return "Maret";
            break;
        case 4:
            return "April";
            break;
        case 5:
            return "Mei";
            break;
        case 6:
            return "Juni";
            break;
        case 7:
            return "Juli";
            break;
        case 8:
            return "Agustus";
            break;
        case 9:
            return "September";
            break;
        case 10:
            return "Oktober";
            break;
        case 11:
            return "November";
            break;
        case 12:
            return "Desember";
            break;
    }
}
?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Transaksi Berjalan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item active">Transaksi Berjalan</li>
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
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Pelanggan</th>
                                <th>Sopir</th>
                                <th>Merk Mobil</th>
                                <th>Plat Mobil</th>
                                <th>Tanggal Peminjaman</th>
                                <th>Tanggal Kembali</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $db = \Config\Database::connect();

                            foreach ($data as $record) : ?>
                            <?php 
                                $idSopir = $record['id_sopir'];
                                if ($idSopir != NULL) {
                                    $sql = $db->query("SELECT * from sopir where id_sopir = $idSopir")->getRow();
                                } 
                                                        ?>
                                <tr class="text-center">
                                    <th scope="row"><?= $no++; ?></th>
                                    <td class="text-center"><?= $record['nama']; ?></td>
                                    <td class="text-center"><?= $sql->nama_sopir ?? '-' ?></td>
                                    <td class="text-center"><?= $record['merk']; ?></td>
                                    <td class="text-center"><?= $record['no_plat']; ?></td>
                                    <td class="text-center"><?php echo date('H:i:s', strtotime($record['tgl_peminjaman'])). '<br>'. tgl_indo($record['tgl_peminjaman'])  ?></td>
                                    <td class="text-center"><?php echo date('H:i:s', strtotime($record['tgl_kembali'])). '<br>'. tgl_indo($record['tgl_kembali'])  ?></td>
                                    <td> Rp <?= number_format($record['harga_peminjaman'], 0, ",", "."); ?> </td>
                                    <td class="text-center">
                                        <a href="/ubahpeminjaman/<?= $record['id_peminjaman']; ?>" class="btn btn-success btn-circle btn-sm">
                                            <i class="fas fa-edit"></i></a>
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