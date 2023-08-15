<?= $this->extend('tampilan/bl') ?>
<?= $this->section('content') ?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"> <?= $judul; ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item"><a href="/jadwal_sopir">Data Jadwal Sopir</a></li>
                    <li class="breadcrumb-item active"> <?= $judul; ?></li>
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
            <form action="/ubah_jadwal_sopir/<?= $sopir['id_jadwal'];?>" method="post">

                <label for="Nama Sopir">Nama Sopir</label>
                <div class="input-group mb-3">
                    <input type="text" name="sopir" value="<?= $sopir['nama_sopir']; ?>" class="form-control" readonly>
                </div>

                <label for="Hari">Hari</label>
                <div class="input-group mb-3">
                    <select name="hari" id="hari" data-placeholder="Pilih Hari" data-width="100%" class="form-control select2" required>
                        <option value=""></option>
                        <option value="Senin" <?= $sopir['hari'] == 'Senin' ? 'selected' : ''; ?>>Senin</option>
                        <option value="Selasa" <?= $sopir['hari'] == 'Selasa' ? 'selected' : ''; ?>>Selasa</option>
                        <option value="Rabu" <?= $sopir['hari'] == 'Rabu' ? 'selected' : ''; ?>>Rabu</option>
                        <option value="Kamis" <?= $sopir['hari'] == 'Kamis' ? 'selected' : ''; ?>>Kamis</option>
                        <option value="Jumat" <?= $sopir['hari'] == 'Jumat' ? 'selected' : ''; ?>>Jumat</option>
                        <option value="Sabtu" <?= $sopir['hari'] == 'Sabtu' ? 'selected' : ''; ?>>Sabtu</option>
                        <option value="Minggu" <?= $sopir['hari'] == 'Minggu' ? 'selected' : ''; ?>>Minggu</option>
                    </select>
                </div>


                <label for="Jam Mulai">Jam Mulai</label>
                <div class="input-group mb-3">
                    <input type="time" placeholder="Jam Mulai" name="jamMulai" value="<?php echo date($sopir['jam_mulai']); ?>" class="form-control" /> 
                </div>

                <label for="Jam Akhir">Jam Akhir</label>
                <div class="input-group mb-3">
                    <input type="time" placeholder="Jam Akhir" name="jamAkhir" value="<?php echo date($sopir['jam_akhir']) ?>" class="form-control" /> 
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