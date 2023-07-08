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
                    <li class="breadcrumb-item"><a href="/type">Data Type</a></li>
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
                    <label for="Nama Tipe">Nama Tipe</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="nama_type" placeholder="Masukkan Nama Type" required>
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