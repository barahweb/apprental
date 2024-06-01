<?= $this->extend('tampilanpelanggan/bl'); ?>
<?= $this->section('content'); ?>
<!--Listing-->
<section class="listing-page">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-push-3">
                <div class="result-sorting-wrapper">
                    <div class="sorting-count">
                        <p><span><?php echo $jumlah->motor; ?> List</span></p>
                    </div>
                </div>
                <?php
                $cnt        = 1;

                $db         = \Config\Database::connect();

                $limit      = 10;
                $page       = isset( $_GET['page']) ? $_GET['page'] : 1;
                $start      = ($page -1) * $limit;
                if ($type == 'Pilih Type' or $merk == 'Pilih Merk') {
                    $sql        = $db->query("SELECT * from motor join type using(id_type) where merk='$merk' or id_type='$type' and status='tersedia' limit $start, $limit")->getResultArray();
                    $sql1       = $db->query("SELECT count(id_motor) as motor from motor join type using(id_type) where merk='$merk' or id_type='$type' where status='tersedia'")->getResultArray();

                } else {
                    $sql        = $db->query("SELECT * from motor join type using(id_type) where merk='$merk' and id_type='$type' and status='tersedia' limit $start, $limit")->getResultArray();
                    $sql1       = $db->query("SELECT count(id_motor) as motor from motor join type using(id_type) where merk='$merk' and id_type='$type' where status='tersedia'")->getResultArray();

                }
                
                $cnt        = 1;

                $pages      = ceil($sql1[0]['id_motor'] / $limit);
                $previous   = $page - 1;
                $next       = $page + 1;

                if (count($data) > 0) {
                    foreach ($data as $result) {  ?>
                        <div class="product-listing-m gray-bg">
                            <div class="product-listing-img"><img src="<?= base_url() ?>/img/<?= $result['gambar']; ?>" class="img-responsive" alt="Image" /> </a>
                            </div>
                            <div class="product-listing-content">
                                <h5><a href="/detailmotor/<?= $result['id_motor']; ?>"></i><?php echo $result['merk'] ?></a></h5>
                                <p class="list-price">Rp <?= number_format($result['harga'], 0, ",", "."); ?> /Hari</p>
                                <ul>
                                    <li><i class="fa fa-motorcycle" aria-hidden="true"></i><?php echo $result['nama_type'] ?></li>
                                    <li><i class="fa fa-calendar" aria-hidden="true"></i>Model <?php echo $result['tahun'] ?> </li>
                                    <li><i class="fa fa-cogs" aria-hidden="true"></i>Warna <?php echo $result['warna'] ?></li>
                                </ul>
                                <a href="/detailmotor/<?= $result['id_motor']; ?>" class="btn">Lihat Detail <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
                            </div>
                        </div>
                <?php }
                } ?>

                <nav aria-label="...">
                    <ul class="pagination">
                        <li class="page-item <?= $page == 1 ? 'disabled' : ''; ?>">

                        <?php if ($page != 1) { ?>
                            <a class="page-link" href="/listmotor?page=<?= $previous; ?>" tabindex="-1" aria-disabled="true">Previous</a>
                        <?php } else { ?>
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                        <?php } ?>

                        </li>

                        <?php for ($i = 1; $i <= $pages; $i++) : ?>
                            <li class="page-item <?= $i == $page ? 'active' : ''; ?>"><a class="page-link" href="/listmotor?page=<?= $i; ?>"><?=$i; ?></a></li>
                        <?php endfor ?>

                        <?php if ($page != $pages) { ?>
                            <li class="page-item <?= $page == $pages ? 'disabled' : ''; ?>">
                            <a class="page-link" href="/listmotor?page=<?= $next; ?>">Next</a>
                        <?php } else { ?>
                            <li class="page-item <?= $page == $pages ? 'disabled' : ''; ?>">
                            <a class="page-link" href="#">Next</a>
                        <?php } ?>
                        </li>
                    </ul>
                </nav>
            </div>

            <!--Side-Bar-->
            <aside class="col-md-3 col-md-pull-9">
                <div class="sidebar_widget">
                    <div class="widget_heading">
                        <h5><i class="fa fa-filter" aria-hidden="true"></i> Cari Motor Anda </h5>
                    </div>
                    <div class="sidebar_filter">
                        <form action="/hasilcarimotor" method="post">
                            <div class="form-group select">
                                <select class="form-control" name="type">
                                    <option>Pilih Type</option>
                                    <?php
                                    $db = \Config\Database::connect();
                                    $sql = $db->query("SELECT * from type group by nama_type")->getResultArray();
                                    $cnt = 1;
                                    if (count($sql) > 0) {
                                        foreach ($sql as $result) { ?>
                                            <option value="<?php echo $result['id_type'] ?>" <?=$result['id_type'] == $type ? 'selected' : ''; ?> > <?php echo $result['nama_type'] ?></option>
                                    <?php }
                                    } ?>
                                </select>
                            </div>

                            <div class="form-group select">
                                <select class="form-control select2" name="merk">
                                    <option>Pilih Merk</option>
                                    <?php
                                    $sql = $db->query("SELECT * from motor where status='tersedia' group by merk")->getResultArray();
                                    $cnt = 1;
                                    if (count($sql) > 0) {
                                        foreach ($sql as $result) { ?>
                                            <option value="<?php echo $result['merk'] ?>" <?=$result['merk'] == $merk ? 'selected' : ''; ?> ><?php echo $result['merk'] ?></option>
                                    <?php }
                                    } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-block"><i class="fa fa-search" aria-hidden="true"></i> Cari Motor</button>
                                <a href="/listmotor" class="btn btn-block"><i class="fa fa-refresh" aria-hidden="true"></i> Reset Pencarian</a>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="sidebar_widget">
                    <div class="widget_heading">
                        <h5><i class="fa fa-motorcycle" aria-hidden="true"></i>Motor Baru</h5>
                    </div>
                    <div class="recent_addedcars">
                        <ul>
                            <?php
                            $sql = $db->query("SELECT * FROM motor JOIN TYPE USING(id_type) where status='tersedia' ORDER BY id_motor DESC LIMIT 4 ")->getResultArray();
                            $cnt = 1;
                            if (count($sql) > 0) {
                                foreach ($sql as $result) {  ?>
                                    <li class="gray-bg">
                                        <div class="recent_post_img"> <a href="/detailmotor/<?= $result['id_motor']; ?>"><img src="<?= base_url() ?>/img/<?= $result['gambar']; ?>" alt="image"></a> </div>
                                        <div class="recent_post_title"> <a href="/detailmotor/<?= $result['id_motor']; ?>"><?php echo $result['merk'] ?> , <?php echo $result['nama_type'] ?></a>
                                            <p class="widget_price">Rp <?= number_format($result['harga'], 0, ",", "."); ?> /Hari</p>
                                        </div>
                                    </li>
                            <?php }
                            } ?>

                        </ul>
                    </div>
                </div>
            </aside>
            <!--/Side-Bar-->
        </div>
    </div>
</section>
<?= $this->endSection(); ?>