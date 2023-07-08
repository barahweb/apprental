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
                    <li class="breadcrumb-item"><a href="/pelanggan">Data Pelanggan</a></li>
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
                <form action=" <?= $link; ?>/simpan" method="post">
                    <label for="Nama">Nama</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama" required>
                    </div>
                    <label for="username">Username</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="username" placeholder="Masukkan Username" required>
                    </div>
                    <label for="Alamat">Alamat</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="alamat" placeholder="Masukkan Alamat">
                    </div>
                    <label for="Gender">Gender</label>
                    <div class="input-group mb-3">
                        <select class="form-control" id="gender" name="gender" required>
                            <option value="" hidden selected disabled>-- Pilih --</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <label for="Telepon">Telepon</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="no_telepon" placeholder="Masukkan No Telepon" onkeypress="return event.charCode >= 48 && event.charCode <=57" required>
                    </div>
                    <label for="No Identitas">No Identitas</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="no_ktp" placeholder="Masukkan No Identitas" onkeypress="return event.charCode >= 48 && event.charCode <=57" required>
                    </div>
                    <label for="Password">Password</label>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Masukkan Password" required>
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