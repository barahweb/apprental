<?= $this->extend('tampilan/bl') ?>
<?= $this->section('content') ?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tambah <?= $judul; ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item"><a href="/sopir">Data Sopir</a></li>
                    <li class="breadcrumb-item active">Tambah <?= $judul; ?></li>
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
                </h3>
            </div>
            <div class="card-body">
                <form action=" <?= $link; ?>/simpan" method="post">

                    <label for="Nama Sopir">Nama Sopir</label>
                    <div class="input-group mb-3">
                        <select name="sopir" id="sopir" data-placeholder="Pilih sopir" data-width="100%" class="form-control select2" required>
                            <option value=""></option>
                            <?php foreach ($sopir as $s): ?>
                                <option value="<?= $s['id_sopir']; ?>"><?= $s['nama_sopir']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <label for="Hari">Hari</label>
                    <div class="input-group mb-3">
                        <select name="hari" id="hari" data-placeholder="Pilih Hari" data-width="100%" class="form-control select2" required>
                            <option value=""></option>
                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumat">Jumat</option>
                            <option value="Sabtu">Sabtu</option>
                            <option value="Minggu">Minggu</option>
                        </select>
                    </div>


                    <label for="Jam Mulai">Jam Mulai</label>
                    <div class="input-group mb-3">
                        <input type="datetime-local" placeholder="Jam Mulai" name="jamMulai" value="<?php echo date("Y-m-d H:i:s"); ?>" class="form-control" /> 
                    </div>

                    <label for="Jam Akhir">Jam Akhir</label>
                    <div class="input-group mb-3">
                        <input type="datetime-local" placeholder="Jam Akhir" name="jamAkhir" value="<?php echo date("Y-m-d H:i:s", strtotime("+1 hours")) ?>" class="form-control" /> 
                    </div>


                    <div>
                        <button type="submit" class="btn btn-primary">Simpan Jadwal</button>
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