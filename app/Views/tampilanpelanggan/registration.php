<?= $this->extend('tampilanpelanggan/bl'); ?>
<?= $this->section('content'); ?>
<section class="page-header contactus_page">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1>Daftar</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="/">Home</a></li>
        <li>Daftar</li>
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
        <h3>Silahkan Isi Data Anda Dibawah Ini:</h3>

        <div class="contact_form gray-bg">
          <form action="/datadaftarcust" method="post" enctype="multipart/form-data">
            <h5>Informasi Pribadi</h5>
            <div class="form-group">
              <label class="control-label">Nama Lengkap <span>*</span></label>
              <input type="text" name="nama" class="form-control white_bg" id="nama" required>
            </div>
            <div class="form-group">
              <label class="control-label">Alamat <span>*</span></label>
              <textarea class="form-control white_bg" name="alamat" rows="4" required></textarea>
            </div>
            <div class="form-group">
              <label class="control-label">Gender <span>*</span></label>
              <select class="form-control white_bg" id="gender" name="gender" required>
                <option value="" hidden selected disabled>-- Pilih --</option>
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
            </div>
            <div class="form-group">
              <label class="control-label">Nomor Telepon <span>*</span></label>
              <input type="text" name="no_telepon" class="form-control white_bg" id="no_telepon" required onkeypress="return event.charCode >= 48 && event.charCode <=57">
            </div>
            <div class="form-group">
              <label class="control-label">No KTP <span>*</span></label>
              <input type="text" name="no_ktp" class="form-control white_bg" id="no_ktp" required onkeypress="return event.charCode >= 48 && event.charCode <=57">
            </div>
            <h6>Informasi Login</h6>
            <div class="form-group">
              <label class="control-label">Username <span>*</span></label>
              <input type="text" name="username" class="form-control white_bg" id="username" required>
            </div>
            <div class="form-group">
              <label class="control-label">Password <span>*</span></label>
              <input type="password" name="password" class="form-control white_bg" id="password" required>
            </div>
            <div class="form-group">
              <button class="btn" type="submit" name="send" type="submit" style="margin-left: 170px;">Daftar <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<?= $this->endSection(); ?>