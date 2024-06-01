<?= $this->extend('tampilan/bl') ?>
<?= $this->section('content') ?>
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
                <h1 class="m-0"> <?= $judul; ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item"><a href="/peminjaman">Transaksi Peminjaman</a></li>
                    <li class="breadcrumb-item active"> <?= $judul; ?></li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<section class="content mb-3">
    <div class="container-fluid">
        <!-- COLOR PALETTE -->
            <h2 style="text-align: center">Jadwal Terisi</h2>
            <table class="table table-bordered CSTable">
                <thead>
                    <tr>
                        <th scope="col" style="text-align: center;">Tanggal Mulai</th>
                        <th scope="col" style="text-align: center;">Tanggal Selesai</th>
                    </tr>
                </thead>
                <tbody class="isiTable">

                </tbody>
            </table>
        <div class="card card-default color-palette-box">
            <div class="card-header">
                <h3 class="card-title">
                    <?= $judul; ?>
                </h3>
            </div>
            <div class="card-body">
                <form action=" <?= $link; ?>/simpan" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-6">
                            <input type="hidden" class="form-control" name="id_customerservice" value="<?= session()->get('id_customerservice') ?>" required>
                                <input type="hidden" class="form-control" name="id_peminjaman" value="<?= $kdpeminjaman; ?>" required readonly>
                            <label for="Nama Pelanggan">Nama Pelanggan</label>
                            <div class="input-group mb-3">
                                <select class="form-control select2" id="nama" name="nama" required>
                                    <option value="" hidden selected disabled>-- Pilih --</option>
                                    <?php foreach ($pelanggan as $pelanggan) : ?>
                                        <option value="<?= $pelanggan['id_pelanggan']; ?>"><?= $pelanggan['nama']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <label for="Motor">Motor</label>
                            <div class="input-group mb-3">
                                <select class="form-control select2" id="motorInput" name="motor" required>
                                    <option value="" hidden selected disabled>-- Pilih --</option>
                                    <?php foreach ($motor as $motor) : ?>
                                        <option value="<?= $motor['id_motor']; ?>"><?= $motor['merk']; ?> || <?=$motor['no_plat']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <label for="Status Peminjaman">Status Peminjaman</label>
                            <div class="input-group mb-3">
                                <select class="form-control" id="status_peminjaman" name="status_peminjaman" required>
                                    <option value="" hidden selected disabled>-- Pilih --</option>
                                    <option value="2" selected>Lunas</option>
                                    <option value="3">Sedang Digunakan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="Harga">Harga Peminjaman</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp.</span>
                                </div>
                                <input type="text" class="form-control" name="harga" placeholder="Masukkan Harga" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" required>
                            </div>
                            <label for="Tanggal peminjaman">Tanggal Peminjaman</label>
                            <div class="input-group mb-3">
                                <input type="datetime-local" class="form-control" id="tanggalpeminjaman" name="tanggalpeminjaman" min="<?php date_default_timezone_set('asia/jakarta');
                                                            echo date('Y-m-d\TH:i:s') ?>"value="<?php date_default_timezone_set('asia/jakarta');
                                                            echo date('Y-m-d\TH:i:s'); ?>">
                            </div>
                            <label for="Tanggal Kembali">Tanggal Kembali</label>
                            <div class="input-group mb-3">
                                <input type="datetime-local" class="form-control" id="tanggalkembali" name="tanggalkembali" min="<?php date_default_timezone_set('asia/jakarta');
                                                            echo date('Y-m-d\TH:i:s') ?>" value="<?php date_default_timezone_set('asia/jakarta');
                              echo date('Y-m-d\TH:i:s'); ?>">
                            </div>
                            <input type="datetime-local" class="form-control" id="tanggalpengembalian" name="tanggalpengembalian" readonly hidden>
                            <!-- <label for="Jaminan">Jaminan</label>
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" id="jaminan" name="jaminan" style="height: 165px;width: 150px;" onchange="preview()">
                                <img id="input_jaminan" src="" style="height: 100px;width: 100px; left: 30px; ">
                            </div> -->
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    <!-- /.row -->
                </form>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- -->

<?= $this->endSection(); ?>