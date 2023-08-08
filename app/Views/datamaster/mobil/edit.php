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
                    <li class="breadcrumb-item"><a href="/mobil">Data Mobil</a></li>
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
                <?php foreach ($mobil as $us) : ?>
                    <form action="/ubah_mobil/<?= $us['id_mobil']; ?>" method="post" enctype="multipart/form-data">
                        <label for="Merk">Merk</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="merk" autocomplete="off" value="<?= $us['merk']; ?>" required>
                        </div>
                        <label for="Warna">Warna</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="warna" autocomplete="off" value="<?= $us['warna']; ?>" required>
                        </div>
                        <label for="Plat">Plat</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="no_plat" autocomplete="off" value="<?= $us['no_plat']; ?>" required>
                        </div>
                        <label for="Tahun">Tahun</label>
                        <div class="input-group mb-3">
                            <select class="form-control" name="tahun">
                                <option value="2023" <?= $us['tahun'] == '2023' ? 'selected' : '';?>>2023</option>
                                <option value="2022" <?= $us['tahun'] == '2022' ? 'selected' : '';?>>2022</option>
                                <option value="2021" <?= $us['tahun'] == '2021' ? 'selected' : '';?>>2021</option>
                                <option value="2020" <?= $us['tahun'] == '2020' ? 'selected' : '';?>>2020</option>
                                <option value="2019" <?= $us['tahun'] == '2019' ? 'selected' : '';?>>2019</option>
                                <option value="2018" <?= $us['tahun'] == '2018' ? 'selected' : '';?>>2018</option>
                                <option value="2017" <?= $us['tahun'] == '2017' ? 'selected' : '';?>>2017</option>
                                <option value="2016" <?= $us['tahun'] == '2016' ? 'selected' : '';?>>2016</option>
                                <option value="2015" <?= $us['tahun'] == '2015' ? 'selected' : '';?>>2015</option>
                                <option value="2014" <?= $us['tahun'] == '2014' ? 'selected' : '';?>>2014</option>
                                <option value="2013" <?= $us['tahun'] == '2013' ? 'selected' : '';?>>2013</option>
                                <option value="2012" <?= $us['tahun'] == '2012' ? 'selected' : '';?>>2012</option>
                                <option value="2011" <?= $us['tahun'] == '2011' ? 'selected' : '';?>>2011</option>
                                <option value="2010" <?= $us['tahun'] == '2010' ? 'selected' : '';?>>2010</option>
                                <option value="2009" <?= $us['tahun'] == '2009' ? 'selected' : '';?>>2009</option>
                                <option value="2008" <?= $us['tahun'] == '2008' ? 'selected' : '';?>>2008</option>
                                <option value="2007" <?= $us['tahun'] == '2007' ? 'selected' : '';?>>2007</option>
                                <option value="2006" <?= $us['tahun'] == '2006' ? 'selected' : '';?>>2006</option>
                                <option value="2005" <?= $us['tahun'] == '2005' ? 'selected' : '';?>>2005</option>
                                <option value="2004" <?= $us['tahun'] == '2004' ? 'selected' : '';?>>2004</option>
                                <option value="2003" <?= $us['tahun'] == '2003' ? 'selected' : '';?>>2003</option>
                                <option value="2002" <?= $us['tahun'] == '2002' ? 'selected' : '';?>>2002</option>
                                <option value="2001" <?= $us['tahun'] == '2001' ? 'selected' : '';?>>2001</option>
                                <option value="2000" <?= $us['tahun'] == '2000' ? 'selected' : '';?>>2000</option>
                                <option value="1999" <?= $us['tahun'] == '1999' ? 'selected' : '';?>>1999</option>
                                <option value="1998" <?= $us['tahun'] == '1998' ? 'selected' : '';?>>1998</option>
                                <option value="1997" <?= $us['tahun'] == '1997' ? 'selected' : '';?>>1997</option>
                                <option value="1996" <?= $us['tahun'] == '1996' ? 'selected' : '';?>>1996</option>
                                <option value="1995" <?= $us['tahun'] == '1995' ? 'selected' : '';?>>1995</option>
                                <option value="1994" <?= $us['tahun'] == '1994' ? 'selected' : '';?>>1994</option>
                                <option value="1993" <?= $us['tahun'] == '1993' ? 'selected' : '';?>>1993</option>
                                <option value="1992" <?= $us['tahun'] == '1992' ? 'selected' : '';?>>1992</option>
                                <option value="1991" <?= $us['tahun'] == '1991' ? 'selected' : '';?>>1991</option>
                                <option value="1990" <?= $us['tahun'] == '1990' ? 'selected' : '';?>>1990</option>
                            </select>
                        </div>
                        <label for="Status">Status</label>
                        <div class="input-group mb-3">
                            <select class="form-control" id="status" name="status" required>
                                <option <?php if ($us['status'] == "Tersedia") {
                                            echo "selected";
                                        } ?> value="Tersedia">Tersedia</option>
                                <option <?php if ($us['status'] == "Tidak Tersedia") {
                                            echo "selected";
                                        } ?> value="Tidak Tersedia">Tidak Tersedia</option>
                            </select>
                        </div>
                        <label for="Harga">Harga</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp.</span>
                            </div>
                            <input type="text" class="form-control" name="harga" autocomplete="off" value="<?= number_format($us['harga'], 0, ",", "."); ?>" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" value="<?= old('jumlah'); ?>" required>
                        </div>
                        <label for="Gambar">Gambar</label>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" id="gambar" name="gambar" style="height: 150px;width: 150px;">
                            <img id="input_img" src="<?= base_url() ?>/img/<?= $us['gambar']; ?>" style="height: 100px;width: 100px; left: 30px; ">
                            <input type="hidden" name="gambarlama" value="<?= $us['gambar']; ?>">
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">simpan</button>
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