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
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Transaksi <?= $judul; ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item active">Transaksi <?= $judul; ?></li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- COLOR PALETTE -->
        <div class="card card-default color-palette-box">
            <div class="card-header">

                <a class=" btn btn-success m-0 float-right " href="<?= $link; ?>/tambah">Tambah Data <i class="fa fa-plus"></i></a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Pelanggan</th>
                                <th>Merk Motor</th>
                                <th>Plat Motor</th>
                                <th>Tanggal Peminjaman</th>
                                <th>Tanggal Kembali</th>
                                <th>Status Peminjaman</th>
                                <th>Harga Peminjaman</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($data as $record) : ?>
                                <tr class="text-center">
                                    <th scope="row"><?= $no++; ?></th>
                                    <td class="text-center"><?= $record['nama']; ?></td>
                                    <td class="text-center"><?= $record['merk']; ?></td>
                                    <td class="text-center"><?= $record['no_plat']; ?></td>
                                    <td class="text-center"><?php echo date('H:i:s', strtotime($record['tgl_peminjaman'])). '<br>'. tgl_indo($record['tgl_peminjaman'])  ?></td>
                                    <td class="text-center"><?php echo date('H:i:s', strtotime($record['tgl_kembali'])). '<br>'. tgl_indo($record['tgl_kembali'])  ?></td>
                                    <?php if ($record['status_peminjaman'] == "2") {
                                        echo "<td class='text-center'>Sudah Dibayar
                                        </a></td>";
                                    } elseif ($record['status_peminjaman'] == "1") {
                                        echo "<td class='text-center'>Menunggu Pembayaran</td>";
                                    } ?>
                                    <td class="text-center">Rp <?= number_format($record['harga_peminjaman'], 0, ",", "."); ?></td>

                                    <?php if ($record['status_peminjaman'] == "2") { ?>
                                        <td class="text-center"><a data-toggle="modal" id="Edit" title="Edit" class="btn btn-success btn-sm" href="#edit<?= $record['id_peminjaman']; ?>">
                                            <li class="fas fa-edit"></li>
                                    </a></td>
                                    <?php } elseif ($record['status_peminjaman'] == "1") { ?>
                                        <td class='text-center'><li class='fa fa-times-circle' style='font-size: 2em; color:red'></li></td>
                                    <?php } ?>
                                    <div class="modal fade" id="edit<?= $record['id_peminjaman']; ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title"><b>Ubah Status peminjaman</b> </h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <form method="post" action="/selesaipeminjaman/<?= $record['id_peminjaman']; ?>">
                                                    <input type="hidden" name="id_peminjaman" value="<?= $record['id_peminjaman']; ?>">
                                                    <div class="col-sm-12 mt-3">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12">
                                                                <div class="modal-body">
                                                                    <p>Apakah anda yakin ingin mengubah status peminjaman Motor <b>"<?=$record['merk']; ?>"</b> menjadi <b>"Sedang Digunakan"</b> ? </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-success">Ubah</button>
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                                    </div>
                                                    <!-- /.row -->
                                                </form>
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                    </div>
                                    <div class="modal fade" id="editpersetujuan<?= $record['id_peminjaman']; ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title"><b>Ubah Status peminjaman</b> </h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <form method="post" action="/selesaipeminjamansetuju/<?= $record['id_peminjaman']; ?>">
                                                    <input type="hidden" name="id_peminjaman" value="<?= $record['id_peminjaman']; ?>">
                                                    <div class="col-sm-12 mt-3">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12">
                                                                <div class="modal-body">
                                                                    <p>Apakah anda yakin ingin mengubah status peminjaman menjadi <b>"Sedang Digunakan"</b> ? </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-success">Ubah</button>
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
<?= $this->endSection(); ?>