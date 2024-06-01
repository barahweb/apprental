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
<section class="page-header profile_page no-print">
    <div class="container">
        <div class="page-header_wrap">
            <div class="page-heading">
                <h1>Invoice</h1>
            </div>
            <ul class="coustom-breadcrumb">
                <li><a href="/">Home</a></li>
                <li><a href="/pesanancust">Pesanan Saya</a></li>
                <li>Invoice</li>
            </ul>
        </div>
    </div>
    <!-- Dark Overlay-->
    <div class="dark-overlay"></div>
</section>
<div id="printOnly" hidden>
<div class="container">
        <div class="image" style="margin-top:40px">
            <!-- <img src="https://i.pinimg.com/564x/59/32/29/593229739184504afd9507cc42a9cb86.jpg"> -->
            <img src="<?= base_url() ?>/img/Logo.jpg" width="150px" alt="">
        </div>

        <div class="text" style="margin-top:40px">
            <h3 class="mt-5" style="font-size: 50px;text-align: center;">MTG Trans</h3>
            <h5 class="tengah" style="font-size: 25px;">Jl Pogung Kidul No.25, Sinduadi, Kec. Mlati </h5>
            <h5 class="tengah" style="font-size: 25px;">Kabupaten Sleman, Daerah Istimewa Yogyakarta </h5>
        </div>
    </div>
    <br>
    <div style="border-width: 5px; border-bottom-style: outset; border-color: #000;"></div>
</div>
<section class="user_profile inner_pages">
    <div class="container">
        <section class="section">
            <div class="section-body">
                <div class="invoice">
                    <div class="invoice-print">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="invoice-title">
                                    <h2>Invoice</h2>
                                    <div class="invoice-number">Order <?= $invoice->id_peminjaman; ?></div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <address>
                                            <strong>Billed To:</strong><br>
                                            <?= $invoice->nama; ?><br>
                                            <?= $invoice->no_telepon; ?><br>
                                            <?= $invoice->alamat; ?><br>
                                        </address>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 text-md-right">
                                        <address>
                                            <strong>Order Date:</strong><br>
                                            <?=  tgl_indo($invoice->tgl_peminjaman). ' | '. date('H:i:s', strtotime($invoice->tgl_peminjaman)); ?><br><br>
                                        </address>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover table-md">
                                        <tr>
                                            <th>No</th>
                                            <th>Merk Motor</th>
                                            <th>Plat Motor</th>
                                            <th>Tanggal Peminjaman</th>
                                            <th>Tanggal Kembali</th>
                                            <th>Harga Peminjaman</th>
                                        </tr>
                                        <tr>
                                            <?php 
                                                $db = \Config\Database::connect();
                                                $idSopir = $invoice->id_sopir;
                                                if ($idSopir != NULL) {
                                                    $sql = $db->query("SELECT * from sopir where id_sopir = $idSopir")->getRow();
                                                } 
                                            ?>
                                            <td>1</td>
                                            <td><?= $invoice->merk; ?></td>
                                            <td><?= $invoice->no_plat; ?></td>
                                            <td><?= $invoice->tgl_peminjaman; ?></td>
                                            <td><?= $invoice->tgl_kembali; ?></td>
                                            <td class="text-center">Rp <?= number_format($invoice->harga_peminjaman, 0, ",", "."); ?></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-lg-8">

                                    </div>
                                    <div class="col-lg-4 text-right">
                                        <div class="invoice-detail-item">
                                            <div class="invoice-detail-name">Subtotal</div>
                                            <div class="invoice-detail-value">Rp <?= number_format($invoice->harga_peminjaman, 0, ",", "."); ?></div>
                                        </div>
                                        <hr class="mt-2 mb-2">
                                        <div class="invoice-detail-item">
                                            <div class="invoice-detail-name">Total</div>
                                            <div class="invoice-detail-value invoice-detail-value-lg">Rp <?= number_format($invoice->harga_peminjaman, 0, ",", "."); ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="text-md-right">
                        <button class="btn btn-warning btn-icon icon-right no-print" onclick="window.print()"><i class="fa fa-print"></i> Print</button>
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>
<?= $this->endSection(); ?>