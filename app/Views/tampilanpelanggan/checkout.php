
<?= $this->extend('tampilanpelanggan/bl'); ?>
<?= $this->section('content'); ?>
<?php
$cnt = 1;
if (count($data) > 0) {
    foreach ($data as $result) {
        // $_SESSION['merk'] = $result->merk;
    $data = [
        'merk' => $result['merk'],
    ];
    session()->set($data);
?>
<section class="listing-detail">
    <div class="container">
        <div class="listing_detail_head row">
            <div><img src="<?= base_url() ?>/img/<?= $result['gambar']; ?>" class="img-responsive" alt="image"
                    style="height: 500px; width: 1260px; margin-bottom: 20px;"></div>
            <div class="col-md-9">
                <h2><?php echo $result['merk'] ?> , <?php echo $result['nama_type'] ?></h2>
            </div>
            <div class="col-md-3">
                <div class="price_info">
                    <p>Rp <?= number_format($result['harga'], 0, ",", "."); ?> </p>/Hari
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="main_features">
                    <ul>
                        <li> <i class="fa fa-calendar" aria-hidden="true"></i>
                            <h5><?php echo $result['tahun'] ?></h5>
                            <p>Model</p>
                        </li>
                        <li> <i class="fa fa-motorcycle" aria-hidden="true"></i>
                            <h5><?php echo $result['nama_type'] ?></h5>
                            <p>Type</p>
                        </li>

                        <li> <i class="fa fa-cogs" aria-hidden="true"></i>
                            <h5><?php echo $result['warna'] ?></h5>
                            <p>Warna</p>
                        </li>
                        <li> <i class="fa fa-motorcycle" aria-hidden="true"></i>
                            <h5><?php echo $result['no_plat'] ?></h5>
                            <p>Plat Motor</p>
                        </li>
                    </ul>
                </div>
                <?php } } ?>
                <div class="divider"></div>
                <form method="POST" action="/simpanGambar" id="payment-form" enctype="multipart/form">
                <?= csrf_field(); ?>
                    <div class="form-group">
                        <input type="hidden" name="id_peminjaman" class="form-control white_bg" id="id_peminjamanCO"
                            value="<?= $kdpeminjaman ?>" required readonly>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="id_pelanggan" class="form-control white_bg" id="id_pelangganCO"
                            value="<?= session()->get('id_pelanggan') ?>" required readonly>
                        <input type="hidden" name="nama" class="form-control white_bg" id="nama"
                            value="<?= session()->get('nama') ?>" required readonly>
                    </div>  
                    <div class="form-group">
                        <input type="hidden" name="id_motor" class="form-control white_bg" id="id_motorCO"
                            value="<?php echo $result['id_motor'] ?>" required readonly>
                        <input type="hidden" name="motor" class="form-control white_bg" id="motorCO"
                            value="<?php echo $result['merk'] ?>" required readonly>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Tanggal Peminjaman <span>*</span></label>
                        <input type="datetime-local" class="form-control white_bg" id="tanggalpeminjaman"
                            name="tanggalpeminjaman"
                            value="<?=$tanggalpeminjaman; ?>"readonly>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Tanggal Kembali <span>*</span></label>
                        <input type="datetime-local" min="<?php date_default_timezone_set('asia/jakarta');
                            echo date('Y-m-d\TH:i:s') ?>" class="form-control white_bg"
                            id="tanggalkembali" name="tanggalkembali"
                            value="<?=$tanggalkembali; ?>" readonly
                            required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control white_bg"
                            id="hargaTotal" name="hargaTotal"
                            value="Rp <?= number_format($harga_total, 0, ",", "."); ?>" readonly
                            required>
                        <input type="hidden" class="form-control white_bg"
                            id="hargaMT" name="hargaMT"
                            value="<?=$harga_total; ?>" readonly
                            required>
                            <input type="hidden" name="result_type" id="result-type" value="">
                            <input type="hidden" name="result_data" id="result-data" value="">
                            <input type="hidden" name="pdf" id="pdf" value="">
                            <input type="hidden" name="order_id" id="order_id" value="">
                    </div>

                    <button class="btn" type="submit" name="send" type="submit" style="margin-left: 970px;" id="pay-button">Checkout <span
                            class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                    </button>

                    <form>
            </div>
            <!--/Side-Bar-->
        </div>
        <div class="space-20"></div>
        <div class="divider"></div>
    </div>
</section>
<?= $this->endSection(); ?>