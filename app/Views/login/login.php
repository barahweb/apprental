<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MTG Trans</title>
    <link rel="shortcut icon" href="<?= base_url() ?>/img/Logo.jpg" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>/template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>/template/css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="<?= base_url(); ?>/template/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <?php
    $random1 = 1;
    $random2 = 10;
    $randomnomor1 = mt_rand($random1, $random2);
    $randomnomor2 = mt_rand($random1, $random2);
    ?>
</head>

<body>
    <main role="main" class="container">

        <body class="">
            <div class="container">
                <!-- Outer Row -->
                <div class="row justify-content-center">

                    <div class="col-xl-10 col-lg-12 col-md-9">

                        <div class="card o-hidden border-0 shadow-lg my-5 w-75" style="margin-left: 70px;">
                            <div class="row">

                                <div class="col-lg-12">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h2 class="card-header" style="color: steelblue;">MTG Trans</h2>
                                        </div>
                                        <div class="card-body">
                                            <form method="POST" action="/cek-login">

                                                <div class="form-group has-feedback">
                                                    <input type="text" class="form-control" name="username" placeholder="Username" required>
                                                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                                </div>

                                                <div class="form-group has-feedback">
                                                    <input type="password" class="form-control form-password" name="password" autocapitalize="on" placeholder="Password" required>
                                                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                                </div>

                                                <div class="form-group has-feedback">
                                                    <input type="checkbox" id="show-hide" class="form-checkbox" name="show-hide" value="">
                                                    <label for="show-hide">&nbsp; Tampilkan Password</label>
                                                </div>

                                                <div class="form-group has-feedback">
                                                    <?php echo $randomnomor1 . ' ditambah ' . $randomnomor2 . ' jadi berapa? '; ?>
                                                    <input type="hidden" class="form-control" name="random1" value="<?php echo $randomnomor1; ?>">
                                                    <input type="hidden" class="form-control" name="random2" value="<?php echo $randomnomor2; ?>">
                                                    <input type="text" class="form-control" name="jawaban" placeholder="Jawaban anda" required onkeypress="return event.charCode >= 48 && event.charCode <=57">
                                                </div>

                                                <div class="form-group has-feedback">

                                                    <button type="submit" class="btn btn-primary btn-lg btn-block btn-flat">Login</button>
                                                    <!-- <input type="submit" class="btn btn-primary btn-lg btn-block btn-flat" name="login" value="Login" /> -->

                                                </div>
                                                <br>
                                                <!-- <div class="center">
                                                    <a href="/lupa_password">Lupa Password?</a>
                                                </div> -->

                                            </form>
                                        </div>
                                        <footer>
                                            <div class="copyright text-center my-auto">
                                                <span>Copyright &copy; <?php echo "MTG Trans " . (int)date('Y') ?></span>
                                            </div>
                                        </footer>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </body>
    </main>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="<?= base_url(); ?>/template/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>/template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="<?= base_url(); ?>/template/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="<?= base_url(); ?>/template/js/sb-admin-2.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".form-checkbox").click(function() {
                if ($(this).is(":checked")) {
                    $(".form-password").attr("type", "text");
                } else {
                    $(".form-password").attr("type", "password");
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            <?php if (session()->getFlashdata('status')) { ?>
                swal({
                    title: "<?= session()->getFlashdata('status') ?>",
                    text: "<?= session()->getFlashdata('status_text') ?>",
                    icon: "<?= session()->getFlashdata('status_icon') ?>",
                });
            <?php } ?>
        });
    </script>
</body>

</html>