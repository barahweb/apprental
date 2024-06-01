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
                    <li class="breadcrumb-item"><a href="/motor">Data Motor</a></li>
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
                    Tambah <?= $judul; ?>
                </h3>
            </div>
            <div class="card-body">
                <form action=" <?= $link; ?>/simpan" method="post" enctype="multipart/form-data">
                    <input type="hidden" class="form-control" name="id_customerservice" value="<?= session()->get('id_customerservice') ?>" required>
                    <label for="Merk">Merk</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="merk" placeholder="Masukkan merk" required>
                    </div>
                    <label for="Warna">Warna</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="warna" placeholder="Masukkan warna" required>
                    </div>
                    <label for="Type">Type</label>
                    <div class="input-group mb-3">
                        <select class="form-control select2" id="nama_type" name="nama_type" required>
                            <option value="" hidden selected disabled>-- Pilih --</option>
                            <?php foreach ($type as $type) : ?>
                                <option value="<?= $type['id_type']; ?>"><?= $type['nama_type']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <label for="Plat">Plat</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="no_plat" placeholder="Masukkan Plat" required>
                    </div>
                    <label for="Tahun">Tahun</label>
                    <div class="input-group mb-3">
                        <select class="form-control" name="tahun" required>
                            <?php
                            for ($year = (int)date('Y'); 1900 <= $year; $year--) : ?>
                                <option value="<?= $year; ?>"><?= $year; ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>

                    <label for="Status">Status</label>
                    <div class="input-group mb-3">
                        <select class="form-control" id="status" name="status" required>
                            <option value="" hidden selected disabled>-- Pilih --</option>
                            <option value="Tersedia">Tersedia</option>
                            <option value="Tidak Tersedia">Tidak Tersedia</option>
                        </select>
                    </div>
                    <label for="Harga">Harga</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp.</span>
                        </div>
                        <input type="text" class="form-control" name="harga" placeholder="Masukkan Harga" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" value="<?= old('jumlah'); ?>" required>
                    </div>
                    <label for="Gambar">Gambar</label>
                    <div class="input-group mb-3">
                        <input type="file" class="form-control" id="gambar" name="gambar" style="height: 150px;width: 150px;">
                        <img id="input_img" src="" style="height: 100px;width: 100px; left: 30px; ">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">simpan</button>
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