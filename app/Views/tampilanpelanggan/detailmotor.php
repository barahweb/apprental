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
            <div class="col-md-9">
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
                <!-- <button class="btn" type="submit" name="send" type="submit" style="margin-top: -76px; margin-left: 1000px;">Pesan <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button> -->
                <a href="/formpesan/<?= $result['id_motor']; ?>" style="margin-top: -76px; margin-left: 1000px;"
                    class="btn">Pesan <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
                <?php }
        } ?>
            </div>
            <!--Side-Bar-->
            <aside class="col-md-3">
                <!--  -->
            </aside>
            <!--/Side-Bar-->
        </div>

        <div class="space-20"></div>
        <div class="divider"></div>

        <!--Similar-Cars-->
        <div class="similar_cars">
            <h3>Motor Serupa</h3>
            <div class="row">
                <?php
                        $bid =  session()->get('merk');
                        $db = \Config\Database::connect();
                        $sql = $db->query("select * from motor join type using(id_type) where merk='$bid'")->getResultArray();
                        $cnt = 1;
                        if (count($sql) > 0) {
                            foreach ($sql as $result) { ?>
                <div class="col-md-3 grid_listing">
                    <div class="product-listing-m gray-bg">
                        <div class="product-listing-img"> <a href="/detailmotor/<?= $result['id_motor']; ?>"><img
                                    src="<?= base_url() ?>/img/<?= $result['gambar']; ?>" class="img-responsive"
                                    alt="image" /> </a>
                        </div>
                        <div class="product-listing-content">
                            <h5><a href="/detailmotor/<?= $result['id_motor']; ?>"><?php echo $result['merk'] ?> ,
                                    <?php echo $result['nama_type'] ?></a></h5>
                            <p class="list-price">Rp <?= number_format($result['harga'], 0, ",", "."); ?> /Hari</p>

                            <ul class="features_list">
                                <li><i class="fa fa-motorcycle" aria-hidden="true"></i><?php echo $result['nama_type'] ?></li>
                                <li><i class="fa fa-calendar" aria-hidden="true"></i>Model
                                    <?php echo $result['tahun'] ?> </li>
                                <li><i class="fa fa-cogs" aria-hidden="true"></i>Warna <?php echo $result['warna'] ?>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
                <?php }
                        } ?>
            </div>
        </div>
        <!--/Similar-Cars-->
    </div>
</section>
<?= $this->endSection(); ?>