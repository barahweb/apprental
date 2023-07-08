<?= $this->extend('tampilanpelanggan/bl'); ?>
<?= $this->section('content'); ?>
<section class="page-header profile_page">
    <div class="container">
        <div class="page-header_wrap">
            <div class="page-heading">
                <h1>Pembayaran Peminjaman</h1>
            </div>
            <ul class="coustom-breadcrumb">
                <li><a href="/">Home</a></li>
                <li>Pembayaran Peminjaman</li>
            </ul>
        </div>
    </div>
    <!-- Dark Overlay-->
    <div class="dark-overlay"></div>
</section>
<!-- /Page Header-->

<section class="user_profile inner_pages">
    <div class="container">

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="profile_wrap">
                    <h5 class="uppercase underline">Pembayaran Peminjaman </h5>
                    <div class="my_vehicles_list">
                        <ul class="vehicle_listing">
                            <?php
                            $cnt = 1;
                            if (count($sql) > 0) {
                                foreach ($sql as $result) {  ?>
                                    <li>
                                        <div class="vehicle_img"> <a><img src="<?= base_url() ?>/img/<?= $result['gambar']; ?>" alt="image"></a> </div>
                                        <div class="vehicle_title">
                                            <h6><a> <?php echo $result['merk'] ?> , <?php echo $result['nama_type'] ?></a></h6>
                                            <p><b>Dari Tanggal:</b> <?php echo $result['tgl_peminjaman'] ?><br /> <b>Sampai Tanggal:</b> <?php echo $result['tgl_kembali'] ?></p>
                                        </div>
                                        <div class="divider2" style="color: white;"></div>
                                        <div class="divider"></div>
                                        <form method="POST" action="/bayarpesanan" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label class="control-label">Harga Peminjaman <span>*</span></label>
                                                <input type="hidden" class="form-control" name="id_peminjaman" autocomplete="off" value="<?= $result['id_peminjaman']; ?>" required>
                                                <input type="text" class="form-control" name="harga" autocomplete="off" value="<?= number_format($hargapeminjaman, 0, ",", "."); ?>" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" required readonly>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Bukti Pembayaran <span>*</span></label>
                                                <input type="file" class="form-control white_bg" id="bukti_pembayaran" name="bukti_pembayaran" style="height: 165px;width: 150px;" required>
                                                <img id="input_bukti" src="" style="height: 100px;width: 100px; left: 30px; ">
                                            </div>
                                            <!-- <div class="form-group">
                                                <label class="control-label">Jaminan <span>*</span></label>
                                                <input type="file" class="form-control white_bg" id="jaminan" name="jaminan" style="height: 165px;width: 150px;" onchange="preview()" required>
                                                <img id="input_jaminan" src="" style="height: 100px;width: 100px; left: 30px; ">
                                            </div> -->
                                            <button class="btn" type="submit" name="send" type="submit" style="margin-left: 1000px;">Bayar <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
                                            <form>
                    </div>
                    <!--/Side-Bar-->
                </div>
                </li>
        <?php }
                            } ?>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>