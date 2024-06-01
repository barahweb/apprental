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
                <div class="mt-5" style="font-size: 50px;text-align: center;">Yaka Transport</div>
            </strong>
            <div class="tengah" style="font-size: 25px;">Jl. Plemburan, Sedan, Sariharjo, Kec. Ngaglik </div>
            <div class="tengah" style="font-size: 25px;">Kabupaten Sleman, Daerah Istimewa Yogyakarta </div>
        </div>
    </div>
    <br>
    <div style="border-width: 5px; border-bottom-style: outset; border-color: #000;"></div>
    <br>
    <h4 class="tengah"> <strong> LAPORAN PEMINJAMAN</strong></h4>
    <h4 class="tengah"> <strong> Tanggal: <?php if ($tanggalawal == $tanggalakhir) {
                                                date_default_timezone_set('asia/jakarta');
                                                echo tgl_indo($tanggalawal);
                                            } else {
                                                echo tgl_indo($tanggalawal) . ' - ' . tgl_indo($tanggalakhir);
                                            } ?> </strong> </h4>
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
                <form action="/caritanggalpeminjaman" method="post">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-row">
                                <div class="form-group col-md">
                                    <label for="tanggalawal">Dari Tanggal</label>
                                    <div class="input-group mb-2">
                                        <input type="date" class="form-control" id="tanggalawal" name="tanggalawal" value="<?php
                                                                                                                            date_default_timezone_set('asia/jakarta');
                                                                                                                            // echo date('Y-m-d');
                                                                                                                            echo $tanggalawal;
                                                                                                                            ?>">
                                        <div class="col-sm">
                                            <input type="date" class="form-control" id="tanggalakhir" name="tanggalakhir" value="<?php
                                                                                                                                    date_default_timezone_set('asia/jakarta');
                                                                                                                                    // echo date('Y-m-d');
                                                                                                                                    echo $tanggalakhir;
                                                                                                                                    ?>">
                                        </div>
                                        <input type="submit" class="btn btn-primary" value="Cari" style="margin-left: 5px;">
                                        <div class="col-sm">
                                            <a href="/laporanpeminjaman" class="btn btn-info" style="margin-right: 160px;">Refresh</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table" id="example" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Pelanggan</th>
                                <th>Merk Motor</th>
                                <th>Plat Motor</th>
                                <th>Tanggal Peminjaman</th>
                                <th>Kembali</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($data as $record) : ?>
                                <tr class="text-center">
                                    <th scope="row"><?= $no++; ?></th>
                                    <td class="text-center"><?= $record['nama']; ?></td>
                                    <td class="text-center"><?= $record['merk']; ?></td>
                                    <td class="text-center"><?= $record['no_plat']; ?></td>
                                    <td class="text-center"><?php echo date('H:i:s', strtotime($record['tgl_peminjaman'])). '<br>'. tgl_indo($record['tgl_peminjaman'])  ?></td>
                                    <td class="text-center"><?php echo date('H:i:s', strtotime($record['tgl_kembali'])). '<br>'. tgl_indo($record['tgl_kembali'])  ?></td>
                                    <td> Rp <?= number_format($record['harga_peminjaman'], 0, ",", "."); ?> </td>

                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="6" class="text-center">Total:</th>
                                <th></th>
                            </tr>
                        </tfoot>
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
            <p class="col " style="margin-left: 300px; margin-top: 760px;">HP: 0812-2638-5760 & Email: yakatransport@gmail.com</p>
        </div>
    </div>

    <!-- /.container-fluid -->
</section>
<!-- /.content -->
<?= $this->endSection(); ?>