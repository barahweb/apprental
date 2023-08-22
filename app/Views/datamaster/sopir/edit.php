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
                    <li class="breadcrumb-item"><a href="/sopir">Data Sopir</a></li>
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
                    <?= $judul; ?>
                </h3>
            </div>
            <div class="card-body">
                <?php foreach ($sopir as $us) : ?>
                    <form action="/ubah_sopir/<?= $us['id_sopir']; ?>" method="post" enctype="multipart/form-data">
                        <label for="Nama Sopir">Nama Sopir</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="nama_sopir" autocomplete="off" value="<?= $us['nama_sopir']; ?>" required>
                        </div>
                        <label for="status">Status</label>
                        <div class="input-group mb-3">
                            <select class="form-control" id="status" name="status" required>
                                <option <?php if ($us['status'] == "Aktif") {
                                            echo "selected";
                                        } ?> value="Aktif">Aktif</option>
                                <option <?php if ($us['status'] == "Tidak Aktif") {
                                            echo "selected";
                                        } ?> value="Tidak Aktif">Tidak Aktif</option>
                            </select>
                        </div>
                        <label for="Alamat">Alamat</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="alamat" autocomplete="off" value="<?= $us['alamat']; ?>" required>
                        </div>
                        <label for="Gender">Gender</label>
                        <div class="input-group mb-3">
                            <select class="form-control" id="gender" name="gender" required>
                                <option <?php if ($us['gender'] == "Laki-Laki") {
                                            echo "selected";
                                        } ?> value="Laki-Laki">Laki-Laki</option>
                                <option <?php if ($us['gender'] == "Perempuan") {
                                            echo "selected";
                                        } ?> value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <label for="Telepon">Telepon</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="no_telepon" autocomplete="off" value="<?= $us['no_telepon']; ?>" onkeypress="return event.charCode >= 48 && event.charCode <=57" required>
                        </div>
                        <label for="Harga">Harga Sewa</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp.</span>
                            </div>
                            <input type="text" class="form-control" name="harga_sewa" autocomplete="off" value="<?= number_format($us['harga_sewa'], 0, ",", "."); ?>" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" value="<?= old('jumlah'); ?>" required>
                        </div>
                        <label for="No Identitas">No Identitas</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="no_ktp" autocomplete="off" value="<?= $us['no_ktp']; ?>" onkeypress="return event.charCode >= 48 && event.charCode <=57" required>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
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