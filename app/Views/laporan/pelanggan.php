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
<div id="printOnly" hidden>
    <div class="row">
        <div class="col-sm-1">
            <img src="<?= base_url() ?>/img/Logo.jpg" width="220px" alt="">
        </div>
        <div class="col-sm">

            <strong>
                <div class="mt-5" style="font-size: 50px;text-align: center;">MTG Trans</div>
            </strong>
            <div class="tengah" style="font-size: 25px;">Jl Pogung Kidul No.25, Sinduadi, Kec. Mlati </div>
            <div class="tengah" style="font-size: 25px;">Kabupaten Sleman, Daerah Istimewa Yogyakarta </div>
        </div>
    </div>
    <br>
    <div style="border-width: 5px; border-bottom-style: outset; border-color: #000;"></div>
    <br>
    <h4 class="tengah"> <strong> LAPORAN DATA PELANGGAN</strong></h4>
    <h4 class="tengah"> <strong> Tanggal: <?php echo tgl_indo(date('Y-m-d')); ?> </h4>
    <br>
    <div style="border-width: 5px; border-bottom-style: outset; border-color: #000;"></div>
    <strong>
        <div hidden class="mt-5" id="ttd">Tanda Tangan</div>
    </strong>

</div>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"> <?= $judul; ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active"> <?= $judul; ?></li>
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
                <button onclick="window.print()" class="btn btn-outline-success shadow float-right">Cetak Laporan</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-center">
                            <th>No</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Alamat</th>
                                <th>Gender</th>
                                <th>No Telepon</th>
                                <th>No Identitas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($data as $record) : ?>
                                <tr class="text-center">
                                <th scope="row"><?= $no++; ?></th>
                                    <td> <?= $record['nama'] ?> </td>
                                    <td> <?= $record['username'] ?> </td>
                                    <td> <?= $record['alamat'] ?> </td>
                                    <td> <?= $record['gender'] ?> </td>
                                    <td> <?= $record['no_telepon'] ?> </td>
                                    <td> <?= $record['no_ktp'] ?> </td>

                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <div class="kanan float-right" hidden>
        <div class="col-sm-12">
            <p class="col " style="margin-right: 30px; margin-top: 60px;">Yogyakarta, <?php echo tgl_indo(date('Y-m-d')); ?></p>
        </div>
        <div class="col-sm-12">
            <p class="col " style="margin-right: 30px; margin-top: 80px;">(<?= session()->get('nama_customerservice') ?>)</p>
        </div>
    </div>
    <div class="kanan" hidden>
        <div class="col-sm-12">
            <p class="col " style="margin-left: 300px; margin-top: 760px;">HP: 0813-9376-5850 & Email: mtgtransport@gmail.com</p>
        </div>
    </div>

    <!-- /.container-fluid -->
</section>
<!-- /.content -->
<?= $this->endSection(); ?>