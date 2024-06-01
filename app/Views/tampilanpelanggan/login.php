<?= $this->extend('tampilanpelanggan/bl'); ?>
<?= $this->section('content'); ?>
<?php
$random1 = 1;
$random2 = 10;
$randomnomor1 = mt_rand($random1, $random2);
$randomnomor2 = mt_rand($random1, $random2);
?>
<section class="page-header contactus_page">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1>Login</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="/">Home</a></li>
        <li>Login</li>
      </ul>
    </div>
  </div>
  <!-- Dark Overlay-->
  <div class="dark-overlay"></div>
</section>
<!-- /Page Header-->

<!--Contact-us-->
<section class="contact_us section-padding" style="margin-left: 450px;">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h3>Silahkan Isi Username dan Password anda:</h3>
        <div class="contact_form gray-bg">
          <form method="post" action="/cek_login">
            <div class="form-group">
              <label class="control-label">Username <span>*</span></label>
              <input type="username" name="username" class="form-control white_bg" id="username" required>
            </div>
            <div class="form-group">
              <label class="control-label">Password <span>*</span></label>
              <input type="password" name="password" class="form-control white_bg form-password" id="password" required>
            </div>
            <div class="form-group">
              <input type="checkbox" id="show-hide" class="form-checkbox" name="show-hide" value="">
              <label for="show-hide">&nbsp; Tampilkan Password</label>
            </div>

            <div class="form-group">
              <?php echo $randomnomor1 . ' ditambah ' . $randomnomor2 . ' jadi berapa? '; ?>
              <input type="hidden" class="form-control white_bg" name="random1" value="<?php echo $randomnomor1; ?>">
              <input type="hidden" class="form-control white_bg" name="random2" value="<?php echo $randomnomor2; ?>">
              <input type="text" class="form-control white_bg" name="jawaban" placeholder="Jawaban anda" required onkeypress="return event.charCode >= 48 && event.charCode <=57">
            </div>
            <div class="form-group">
              <button class="btn" type="submit" name="send" type="submit" style="margin-left: 170px;">Login <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
            </div>
          </form>
          <div class="center">
            <a href="/lupa_passwordcust" style="margin-left: 190px; color: #000000;">Lupa Password?</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?= $this->endSection(); ?>