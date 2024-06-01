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
                <h2 style="text-align: center">Jadwal Terisi</h2>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" style="text-align: center;">Tanggal Mulai</th>
                            <th scope="col" style="text-align: center;">Tanggal Selesai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(empty($cekjamMotor)) { ?>
                            <td colspan="2" style="text-align: center;">
								<p class="text-center" style="size: 100px;">Tidak Ada Jadwal Peminjaman Yang Digunakan!</p>
							</td>
                        <?php } else { ?>
                        <?php foreach ($cekjamMotor as $cek) : ?>
                        <tr>
                            <td style="text-align: center;"><?=$cek['tgl_peminjaman']; ?></td>
                            <td style="text-align: center;"><?=$cek['tgl_kembali']; ?></td>
                        </tr>
                        <?php endforeach; ?>
                        <?php } ?>
                    </tbody>
                </table>

                <form method="POST" action="/pesansekarang" id="formpesan">
                    <input type="hidden" name="harga" id="harga" value="<?php echo $result['harga']?>">
                    <div class="form-group">
                        <input type="hidden" name="id_peminjaman" class="form-control white_bg" id="id_peminjaman"
                            value="<?= $kdpeminjaman ?>" required readonly>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="id_pelanggan" class="form-control white_bg" id="id_pelanggan"
                            value="<?= session()->get('id_pelanggan') ?>" required readonly>
                        <input type="hidden" name="nama" class="form-control white_bg" id="nama"
                            value="<?= session()->get('nama') ?>" required readonly>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="id_motorPesan" class="form-control white_bg" id="id_motorPesan"
                            value="<?php echo $result['id_motor'] ?>" required readonly>
                        <input type="hidden" name="motor" class="form-control white_bg" id="motor"
                            value="<?php echo $result['merk'] ?>" required readonly>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Tanggal Peminjaman <span>*</span></label>
                        <input type="datetime-local" class="form-control white_bg" id="tanggalpeminjamanpesan"  min="<?php date_default_timezone_set('asia/jakarta');
                                                            echo date('Y-m-d\TH:i:s', strtotime('6 hour')); ?>"
                            name="tanggalpeminjamanpesan" value="<?php date_default_timezone_set('asia/jakarta');
                            echo date('Y-m-d\TH:i:s', strtotime('6 hour')); ?>">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Tanggal Kembali <span>*</span></label>
                        <input type="datetime-local" min="<?php date_default_timezone_set('asia/jakarta');
                                                            echo date('Y-m-d\TH:i:s', strtotime('7 hour')); ?>" class="form-control white_bg"
                            id="tanggalkembalipesan" name="tanggalkembalipesan" value="<?php date_default_timezone_set('asia/jakarta');
                            echo date('Y-m-d\TH:i:s', strtotime('1 day')) ?>" required>
                    </div>

                    <div class="form-group">
                    <label class="control-label">Dengan Sopir</span>*</label><br>
                        <label class="switch">
                            <input type="checkbox" name="checkSopir" id="checkSopir">
                            <span class="slider round"></span>
                        </label>
                    </div>

                    <div id="showDataSopir">
                        
                    </div>
                    
                    <button class="btn" type="submit" name="send" type="submit" style="margin-left: 1000px;" id="buttonsubmit">Pesan <span class="angle_arrow"><i class="fa fa-angle-right"
                                aria-hidden="true"></i></span>
                    </button>
                <form>
            </div>
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



<style>
    /* The switch - the box around the slider */
    .switch {
    position: relative;
    display: inline-block;
    width: 60px;
    height: 34px;
    }

    /* Hide default HTML checkbox */
    .switch input {
    opacity: 0;
    width: 0;
    height: 0;
    }

    /* The slider */
    .slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    -webkit-transition: .4s;
    transition: .4s;
    }

    .slider:before {
    position: absolute;
    content: "";
    height: 26px;
    width: 26px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
    }

    input:checked + .slider {
    background-color: #2196F3;
    }

    input:focus + .slider {
    box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(26px);
    transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
    border-radius: 34px;
    }

    .slider.round:before {
    border-radius: 50%;
    }
</style>
<?= $this->endSection(); ?>
