<?= $this->extend('tampilanpelanggan/bl'); ?>
<?= $this->section('content'); ?>
<section class="page-header contactus_page">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1>Lupa Password</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="/">Home</a></li>
        <li>Lupa Password</li>
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
        <h3>Silahkan Isi Username anda:</h3>
        <div class="contact_form gray-bg">
          <form method="get" action="/cekusernamecust">
            <div class="form-group">
              <label class="control-label">Username <span>*</span></label>
              <input type="username" name="username" class="form-control white_bg" id="username" required>
            </div>
            <div class="form-group">
              <button class="btn" type="submit" name="send" type="submit" style="margin-left: 170px;">Cek Username <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<?= $this->endSection(); ?>