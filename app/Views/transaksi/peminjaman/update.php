<?= $this->extend('tampilan/bl') ?>
<?= $this->section('content') ?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"> Transaksi Pengembalian</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item"><a href="/pengembalian">Transaksi Pengembalian</a></li>
                    <li class="breadcrumb-item active">Ubah Status Transaksi Pengembalian</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<section class="content mb-3">
    <div class="container-fluid">
        <!-- COLOR PALETTE -->
        <div class="card card-default color-palette-box">
            <div class="card-header">
                <h3 class="card-title">
                    Transaksi Pengembalian
                </h3>
            </div>
            <div class="card-body">
                <?php foreach ($peminjaman as $us) : ?>
                    <form action="/ubah_peminjaman/<?= $us['id_peminjaman']; ?>" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="hidden" class="form-control" name="id_customerservice" value="<?= session()->get('id_customerservice') ?>" required>
                                <label for="ID peminjaman">ID Peminjaman</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="id_peminjaman" value="<?= $us['id_peminjaman']; ?>" required readonly>
                                </div>
                                <label for="Nama Pelanggan">Nama Pelanggan</label>
                                <div class="input-group mb-3">
                                    <select class="form-control select2" id="nama" name="nama" required disabled>
                                        <option value="" hidden selected>-- Pilih --</option>
                                        <?php foreach ($peminjaman as $kat) : ?>
                                            <option value="<?= $kat['id_pelanggan']; ?>" <?php if ($kat['id_pelanggan'] == $pelanggan->id_pelanggan) {
                                                                                            echo 'selected';
                                                                                        } ?>><?= $kat['nama']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <label for="Mobil">Mobil</label>
                                <div class="input-group mb-3">
                                    <select class="form-control select2" id="mobil" name="mobil" required disabled>
                                        <option value="" hidden selected disabled>-- Pilih --</option>
                                        <?php foreach ($peminjaman as $kat) : ?>
                                            <option value=" <?= $kat['id_mobil']; ?>" <?php if ($kat['id_mobil'] == $mobil->id_mobil) {
                                                                                            echo 'selected';
                                                                                        } ?>><?= $kat['merk']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <input type="hidden" class="form-control" name="id_mobil" value="<?= $us['id_mobil']; ?>" required readonly>
                                </div>
                                <label for="Tanggal peminjaman">Tanggal Peminjaman</label>
                                <div class="input-group mb-3">
                                    <input type="datetime-local" class="form-control" id="tanggalpeminjaman" name="tanggalpeminjaman" value="<?php date_default_timezone_set('asia/jakarta');
                                                                                                                                        echo date('Y-m-d\TH:i:s', strtotime($us['tgl_peminjaman'])); ?>" readonly>
                                </div>
                                <label for="Tanggal Kembali">Tanggal Kembali</label>
                                <div class="input-group mb-3">
                                    <input type="datetime-local" class="form-control" id="tanggalkembali" name="tanggalkembali" value="<?php date_default_timezone_set('asia/jakarta');
                                                                                                                                        echo date('Y-m-d\TH:i:s', strtotime($us['tgl_kembali'])); ?>" readonly>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="Denda">Denda</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp.</span>
                                    </div>

                                    <?php
                                        // untuk menghitung selisih hari terlambat
                                        // $t = date_create($us['tgl_kembali']);
                                        // $n = date_create(date('Y-m-d'));
                                        // $terlambat = date_diff($t, $n);
                                        // $hari = $terlambat->format("%a");

                                        // menghitung denda


                                        $today = date("Y-m-d H:i:s");
                                        $date = $us['tgl_kembali'];


                                        $start_datetime = new DateTime($today); 
                                        $diff = $start_datetime->diff(new DateTime($date)); 
                                        $denda = $diff->days * $us['harga_peminjaman'];
                                        ?>

                                <input type="text"   <?php if ($date < $today) : ?> value="<?= number_format($denda, 0, ",", "."); ?>" <?php endif; ?> class="form-control" name="denda" id="denda" placeholder="Masukkan Denda" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" required>
                                </div>
                                <label for="Harga">Harga Peminjaman</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp.</span>
                                    </div>
                                    <input type="text" value="<?= number_format($us['harga_peminjaman'], 0, ",", "."); ?>" class="form-control" name="harga" placeholder="Masukkan Harga" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" required readonly>
                                </div>
                                <label for="Tanggal Pengembalian">Tanggal Pengembalian</label>
                                <div class="input-group mb-3">
                                    <input type="datetime-local" class="form-control" id="tanggalpengembalian" name="tanggalpengembalian" value="<?php date_default_timezone_set('asia/jakarta');
                                                                                                                                                    echo date('Y-m-d\TH:i'); ?>" min="<?php date_default_timezone_set('asia/jakarta');
                                                                                                                                                                                        echo date('Y-m-d\TH:i'); ?>" required>
                                </div>

                                <label for="Status Pengembalian">Status Pengembalian</label>
                                <div class="input-group mb-3">
                                    <select class="form-control" id="status_pengembalian" name="status_pengembalian" required style="background: #eee; cursor:no-drop;">
                                        <option value="" hidden selected disabled>-- Pilih --</option>
                                        <option style=" display:none;" value="Sesuai Jadwal" <?php if ($jam->jam <= $us['tgl_kembali']) {
                                                                                                    echo "Selected";
                                                                                                } ?>>Sesuai Jadwal</option>
                                        <option value="Terlambat" style=" display:none;" <?php if ($jam->jam >= $us['tgl_kembali']) {
                                                                                                echo "Selected";
                                                                                            } ?>>Terlambat</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                        <!-- /.row -->
                    </form>
                <?php endforeach; ?>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- -->

<?= $this->endSection(); ?>