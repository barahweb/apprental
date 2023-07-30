 <?= $this->extend('tampilan/bl'); ?>
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

 <!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
     <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
 </div>

 <!-- Content Row -->
 <div class="row">
     <div class="col-md-4 col-sm-12 col-xs-12">
         <div class="panel panel-primary text-center no-boder bg-color-blue">
             <div class="panel-body">
                 <i class="fa fa-users fa-5x"></i>
                 <h3>
                     <?php
                        $db = \Config\Database::connect();
                        $query = $db->query("SELECT COUNT(id_pelanggan) as cust FROM pelanggan");
                        $row   = $query->getRow();
                        echo $row->cust;
                        ?>
                 </h3>
             </div>
             <div class="panel-footer back-footer-blue">
             <?php if (session()->get('nama_customerservice') != 'pemilik') : ?>
                <a href="/pelanggan" style="text-decoration: none;color: white"><strong>Pelanggan</strong></a>

            <?php else: ?>
                <a href="#" style="text-decoration: none;color: white"><strong>Pelanggan</strong></a>

            <?php endif; ?>

             </div>
         </div>
     </div>
     <div class="col-md-4 col-sm-12 col-xs-12">
         <div class="panel panel-primary text-center no-boder bg-color-blue">
             <div class="panel-body">
                 <i class="fa fa-car fa-5x"></i>
                 <h3>
                     <?php
                        $db = \Config\Database::connect();
                        $query = $db->query("SELECT COUNT(id_mobil) as mobil FROM mobil");
                        $row   = $query->getRow();
                        echo $row->mobil;
                        ?>
                 </h3>
             </div>
             <div class="panel-footer back-footer-blue">
             <?php if (session()->get('nama_customerservice') != 'pemilik') : ?>
                <a href="/mobil" style="text-decoration: none;color: white"><strong>Mobil</strong></a>

                <?php else: ?>
                    <a href="#" style="text-decoration: none;color: white"><strong>Mobil</strong></a>

            <?php endif; ?>
             </div>
         </div>
     </div>
     <div class="col-md-4 col-sm-12 col-xs-12">
         <div class="panel panel-primary text-center no-boder bg-color-green">
             <div class="panel-body">
                 <i class="fa fa fa-calendar fa-5x"></i>
                 <h3><?php echo tgl_indo(date('Y-m-d')); ?></h3>
             </div>
             <div class="panel-footer back-footer-green">
                 <strong>Tanggal</strong>
             </div>
         </div>
     </div>
 </div>

 <!-- Bawah -->

 <div class="row">
     <div class="col-md-4 col-sm-12 col-xs-12">
         <div class="panel panel-primary text-center no-boder bg-color-brown">
             <div class="panel-body">
                 <i class="fas fa-money-check fa-5x"></i>
                 <h3>
                     <?php
                        $db = \Config\Database::connect();
                        $query = $db->query("SELECT COUNT(id_peminjaman) as peminjaman FROM transaksi_peminjaman where status_peminjaman='3'");
                        $row   = $query->getRow();
                        echo $row->peminjaman;
                        ?>
                 </h3>
             </div>
             <div class="panel-footer back-footer-brown">
             <?php if (session()->get('nama_customerservice') != 'pemilik') : ?>
                <a href="/peminjaman" style="text-decoration: none;color: white"><strong>Penyewaan Sedang
                        Berjalan</strong></a>
            <?php else: ?>
                <a href="#" style="text-decoration: none;color: white"><strong>Penyewaan Sedang
                        Berjalan</strong></a>

            <?php endif; ?>
             </div>
         </div>
     </div>

     <div class="col-md-4 col-sm-12 col-xs-12">
         <div class="panel panel-primary text-center no-boder bg-color-green">
             <div class="panel-body">
                 <i class="fa fa fa-check-circle fa-5x"></i>
                <h3>
                <?php
                        $db = \Config\Database::connect();
                        $query = $db->query("SELECT COUNT(id_mobil) as mobil FROM mobil where status='Tersedia'");
                        $query2 = $db->query("SELECT COUNT(id_peminjaman) as peminjaman FROM transaksi_peminjaman where status_peminjaman<='3'");
                        $row   = $query->getRow();
                        $row2   = $query2->getRow();
                        $pengurangan = $row->mobil - $row2->peminjaman;
                        echo $pengurangan;
                    ?>
                </h3>
            </div>
            <div class="panel-footer back-footer-green">
            <?php if (session()->get('nama_customerservice') != 'pemilik') : ?>
                <a href="/mobil" style="text-decoration: none;color: white"><strong>Mobil Tersedia</strong></a>
            <?php else: ?>
                <a href="#" style="text-decoration: none;color: white"><strong>Mobil Tersedia</strong></a>
            <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!-- Content Row -->
<?= $this->endSection(); ?>