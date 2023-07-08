<?= $this->extend('tampilanpelanggan/bl'); ?>
<?= $this->section('content'); ?>

<section id="banner" class="banner-section">
    <header>
        <div class="header">
            <h3>Get Your</h3>
            <h1>Favorite Car</h1>
            <h3>in <span>Yaka Transport</span></h3>
            <br>
            <a href="/listmobil">
            <button>FIND NOW</button>
            </a>
        </div>
    </header>
    <div class="container">
        <div class="div_zindex">
            <div class="row">
                <div class="col-md-5 col-md-push-7">
                    <div class="banner_content">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /Banners -->


<!-- Resent Cat-->
<section class="section-padding gray-bg">
    <div class="container">
        <div class="section-header text-center">
            <h2>Temukan Mobil <span>Yang Tepat Untuk Anda</span></h2>
            <p>Kami menyediakan berbagai jenis kendaraan dari berbagai merk sesuai dengan kebutuhan Anda karena kami memiliki jalinan kerjasama dengan berbagai pelaku usaha seperti kami. Kami yakin dengan segala bentuk jaminan pelayanan dan prima, serta selalu belajar untuk berbenah diri akan membuat kami menjadi yang lebih baik di kemudian hari.</p>
        </div>
        <div class="row">

            <!-- Nav tabs -->
            <div class="recent-tab">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#resentnewcar" role="tab" data-toggle="tab">List Beberapa Mobil</a></li>
                </ul>
            </div>
            <!-- Recently Listed New Cars -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="resentnewcar">

                    <?php
                    $db = \Config\Database::connect();
                    $sql = $db->query("SELECT * from mobil join type using(id_type) where status='tersedia' LIMIT 9")->getResultArray();
                    $cnt = 1;
                    if (count($sql) > 0) {
                        foreach ($sql as $result) {
                    ?>
                            <div class="col-list-3">
                                <div class="recent-car-list">
                                    <div class="car-info-box"> <a href="/detailmobil/<?= $result['id_mobil']; ?>"><img src="<?= base_url() ?>/img/<?= $result['gambar']; ?>" class="img-responsive" alt="image" style="height: 200px; width: 360px;"></a>
                                        <ul>
                                            <li><i class="fa fa-car" aria-hidden="true"></i><?php echo $result['nama_type'] ?></li>
                                            <li><i class="fa fa-calendar" aria-hidden="true"></i>Model <?php echo $result['tahun'] ?> </li>
                                            <li><i class="fa fa-cogs" aria-hidden="true"></i>Warna <?php echo $result['warna'] ?></li>
                                        </ul>
                                    </div>
                                    <div class="car-title-m">
                                        <h6><a href="/detailmobil/<?= $result['id_mobil']; ?>"> <?php echo $result['merk'] ?></a></h6>
                                        <span class="price">Rp <?= number_format($result['harga'], 0, ",", "."); ?> /Hari</span>
                                    </div>
                                </div>
                            </div>
                    <?php }
                    } ?>
                </div>
            </div>
        </div>
</section>
<?= $this->endSection(); ?>
<!-- /Resent Cat -->