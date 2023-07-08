<?= $this->extend('tampilanpelanggan/bl'); ?>
<?= $this->section('content'); ?>
<?php
function tgl_indo($tgl)
{
    $tanggal = substr($tgl, 8, 2);
    $bulan = getBulan(substr($tgl, 5, 2));
    $tahun = substr($tgl, 0, 4);
    return $tanggal . ' ' . $bulan . ' ' . $tahun;
}

function getBulan($bln)
{
    switch ($bln) {
        case 1:
            return "Januari";
            break;
        case 2:
            return "Februari";
            break;
        case 3:
            return "Maret";
            break;
        case 4:
            return "April";
            break;
        case 5:
            return "Mei";
            break;
        case 6:
            return "Juni";
            break;
        case 7:
            return "Juli";
            break;
        case 8:
            return "Agustus";
            break;
        case 9:
            return "September";
            break;
        case 10:
            return "Oktober";
            break;
        case 11:
            return "November";
            break;
        case 12:
            return "Desember";
            break;
    }
}
?>
<section class="page-header profile_page">
    <div class="container">
        <div class="page-header_wrap">
            <div class="page-heading">
                <h1>Pesanan Saya</h1>
            </div>
            <ul class="coustom-breadcrumb">
                <li><a href="/">Home</a></li>
                <li>Pesanan Saya</li>
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
                    <h5 class="uppercase underline">Pesanan Saya </h5>
                    <div class="my_vehicles_list">
                        <ul class="vehicle_listing" ">
                            <?php
                            $useremail =  session()->get('id_pelanggan');
                            $db = \Config\Database::connect();
                            $sql = $db->query("SELECT * from transaksi_peminjaman join mobil using(id_mobil) join type using(id_type) where id_pelanggan='$useremail' ORDER BY tgl_peminjaman DESC;")->getResultArray();
                            $cnt = 1;
                            if (count($sql) > 0) {
                                foreach ($sql as $result) {  ?>
                                    <li>
                                        <div class="vehicle_img"> <a><img src="<?= base_url() ?>/img/<?= $result['gambar']; ?>" alt="image"></a> </div>
                                        <div class="vehicle_title">
                                            <h6><a> <?php echo $result['merk'] ?> , <?php echo $result['nama_type'] ?></a></h6>
                                            <p><b>Dari Tanggal:</b> <?php echo date('H:i:s', strtotime($result['tgl_peminjaman'])) .' - '. tgl_indo($result['tgl_peminjaman'])  ?><br /> <b>Sampai Tanggal:</b> <?php echo date('H:i:s', strtotime($result['tgl_kembali'])) .' - '. tgl_indo($result['tgl_kembali']) ?></p>
                                            <p><b>Harga peminjaman:</b> Rp <?= number_format($result['harga_peminjaman'], 0, ",", "."); ?></p>
                                            <?php if ($result['status_peminjaman'] == '1') { ?>
                                            <a href="<?=$result['pdf']; ?>" class="button-6">Cara Bayar</a>
                                            <?php } ?>
                                        </div>
                                        <?php if ($result['status_peminjaman'] == '1') { ?>
                                        <div class="vehicle_status" style="display:inline">
                                            <p class="btn outline active-btn">Menunggu Pembayaran.</p>
                                        </div>
                                        <?php } else if ($result['status_peminjaman'] == '2') { ?>
                                            <div class="vehicle_status"> <p class="btn outline active-btn" style="display: block;">Lunas!</p>
                                                <div class="clearfix"></div>
                                            </div>
                                        <?php } else if ($result['status_peminjaman'] == '3') { ?>
                                            <div class="vehicle_status"><p class="btn outline active-btn">Sedang Digunakan.</p>
                                                <div class="clearfix"></div>
                                            </div>
                                        <?php } else if ($result['status_peminjaman'] == '4') { ?>
                                            <div class="vehicle_status"> <p class="btn outline active-btn">Transaksi Selesai.</p>
                                                <div class="clearfix"></div>
                                            </div>
                                        <?php } else if ($result['status_peminjaman'] == '5') { ?>
                                            <div class="vehicle_status"><p class="btn outline">Transaksi Batal.</p>
                                                <div class="clearfix"></div>
                                            </div>
                                        <?php } ?>
                                    </li>
                            <?php }
                            } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
</section>
<style>

.button-6 {
  align-items: center;
  background-color: #FFFFFF;
  border: 1px solid rgba(0, 0, 0, 0.1);
  border-radius: .25rem;
  box-shadow: rgba(0, 0, 0, 0.02) 0 1px 3px 0;
  box-sizing: border-box;
  color: rgba(0, 0, 0, 0.85);
  cursor: pointer;
  display: inline-flex;
  font-family: system-ui,-apple-system,system-ui,"Helvetica Neue",Helvetica,Arial,sans-serif;
  font-size: 16px;
  font-weight: 600;
  justify-content: center;
  line-height: 1.25;
  margin: 0;
  min-height: 3rem;
  padding: calc(.875rem - 1px) calc(1.5rem - 1px);
  position: relative;
  text-decoration: none;
  transition: all 250ms;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  vertical-align: baseline;
  width: auto;
}

.button-6:hover,
.button-6:focus {
  border-color: rgba(0, 0, 0, 0.15);
  box-shadow: rgba(0, 0, 0, 0.1) 0 4px 12px;
  color: rgba(0, 0, 0, 0.65);
}

.button-6:hover {
  transform: translateY(-1px);
}

.button-6:active {
  background-color: #F0F0F1;
  border-color: rgba(0, 0, 0, 0.15);
  box-shadow: rgba(0, 0, 0, 0.06) 0 2px 4px;
  color: rgba(0, 0, 0, 0.65);
  transform: translateY(0);
}
</style>
<?= $this->endSection(); ?>