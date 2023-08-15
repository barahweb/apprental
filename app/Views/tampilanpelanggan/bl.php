<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Yaka Transport</title>
    <!--Bootstrap -->

    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/style.css" type="text/css">
    <!-- <link rel="stylesheet" href="<?= base_url() ?>/assets/css/owl.carousel.css" type="text/css"> -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/owl.transitions.css" type="text/css">
    <link href="<?= base_url() ?>/assets/css/slick.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/css/bootstrap-slider.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" id="switcher-css" type="text/css" href="<?= base_url() ?>/assets/switcher/css/switcher.css" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="<?= base_url() ?>/assets/switcher/css/red.css" title="red" media="all" data-default-color="true" />
    <link rel="alternate stylesheet" type="text/css" href="<?= base_url() ?>/assets/switcher/css/orange.css" title="orange" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="<?= base_url() ?>/assets/switcher/css/blue.css" title="blue" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="<?= base_url() ?>/assets/switcher/css/pink.css" title="pink" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="<?= base_url() ?>/assets/switcher/css/green.css" title="green" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="<?= base_url() ?>/assets/switcher/css/purple.css" title="purple" media="all" />
    <link rel="shortcut icon" href="<?= base_url() ?>/img/Logo.jpg" />
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="<?= base_url(); ?>/template/vendor/jquery/my.js"></script>

</head>

<body>
    <!--Header-->
    <?php echo view('tampilanpelanggan/header')  ?>
    <!-- /Header -->
    <?= $this->renderSection('content'); ?>
    <!--Footer -->
    <?php echo view('tampilanpelanggan/footer')  ?>
    <!-- /Footer-->

    <!--Back to top-->
    <div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
    <!--/Back to top-->


    <script src="<?= base_url() ?>/assets/js/jquery.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/interface.js"></script>
    <script src="<?= base_url() ?>/assets/switcher/js/switcher.js"></script>
    <script src="<?= base_url() ?>/assets/js/bootstrap-slider.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/slick.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/owl.carousel.min.js"></script>
    <script src="https://cdn.jsdelivr.net/momentjs/2.14.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-yz9zED_t2WrYdSO5"></script>
    <style>
        .colored-toast.swal2-icon-success {
            background-color: #a5dc86 !important;
        }

        .colored-toast.swal2-icon-error {
            background-color: #f27474 !important;
        }

        .colored-toast.swal2-icon-warning {
            background-color: #f8bb86 !important;
        }

        .colored-toast.swal2-icon-info {
            background-color: #3fc3ee !important;
        }

        .colored-toast.swal2-icon-question {
            background-color: #87adbd !important;
        }

        .colored-toast .swal2-title {
            color: white;
        }

        .colored-toast .swal2-close {
            color: white;
        }

        .colored-toast .swal2-html-container {
            color: white;
        }

        .swal2-popup {
            font-size: 1.6rem !important;
        }
    </style>
    <script>
        $(document).ready(function() {
            <?php if (session()->getFlashdata('status')) { ?>

                Swal.fire({
                    toast: true,
                    position: 'top-right',
                    iconColor: 'white',
                    customClass: {
                        popup: 'colored-toast'
                    },
                    title: "<?= session()->getFlashdata('status') ?>",
                    text: "<?= session()->getFlashdata('status_text') ?>",
                    icon: "<?= session()->getFlashdata('status_icon') ?>",
                    timer: 1500,
                    timerProgressBar: true,
                    showConfirmButton: false,
                })
            <?php } ?>
        });
    </script>
    <script>
        $(document).on('click', '.btn-pengembalian', function(e) {
            e.preventDefault();
            const href = $(this).attr('href');
            swal({
                title: "Apakah Anda Yakin?",
                text: "Anda Akan Menyelesaikan Transaksi Ini!",
                icon: "warning",
                buttons: true,
                success: true,
            }).then((result) => {
                if (result) {
                    document.location.href = href;
                }
            });
        })
    </script>
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
        $(function() {
            $("#bukti_pembayaran").change(function() {
                // alert("tes");
                filePreview(this);
            });
        })

        function filePreview(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {

                    $("#input_bukti").attr("src", e.target.result)
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <!-- <script>
        function preview() {
            const gambar = document.querySelector('#jaminan');
            const gambarpreview = document.querySelector('#input_jaminan');
            const filegambar = new FileReader();
            filegambar.readAsDataURL(gambar.files[0]);
            filegambar.onload = function(e) {
                gambarpreview.src = e.target.result;
            }
        }
    </script> -->
    <style>
        input[type=file] {
            width: 90px;
            color: transparent;

        }

        #input_container {
            position: relative;
            padding: 0;
            margin: 0;
        }

        #gambar {
            height: 20px;
            margin: 0;
            padding-left: 30px;
        }

        #bukti_pembayaran {
            height: 20px;
            margin: 0;
            padding-left: 30px;
        }

        /* #jaminan {
            height: 20px;
            margin: 0;
            padding-left: 30px;
        } */

        #input_img {
            position: absolute;
            bottom: 8px;
            left: 10px;
            width: 10px;
            height: 10px;
        }

        #input_bukti {
            position: absolute;
            bottom: 8px;
            left: 10px;
            width: 10px;
            height: 10px;
        }

        /* #input_jaminan {
            position: absolute;
            bottom: 8px;
            left: 10px;
            width: 10px;
            height: 10px;
        } */

        ;
    </style>
    <script>
        $(function() {
            $('#datetimepicker1').datetimepicker({
                minDate: new Date(),
                format: 'YYYY-MM-DD HH:mm:ss'
            });
        });
    </script>
    <script>
        $(function() {
            $('#datetimepicker2').datetimepicker({
                minDate: new Date(),
                format: 'YYYY-MM-DD HH:mm:ss'
            });
            
        });
    </script>
    <script type="text/javascript">
        function transaksi(ars, result) {
            const id_pelanggan = ars[1]
            const id_mobil = ars[2]
            let harga_total = ars[5]
            const tanggal_mulai = ars[3]
            const tanggal_selesai = ars[4]
            // const order_id = result.order_id
            $("#pdf").val(result.pdf_url)
            $("#order_id").val(result.order_id)
            let form = document.getElementById("payment-form");
            let formData = new FormData(form);
            $.ajax({
                url: "/selesai",
                data: formData,
                method: "post",
                dataType: "json",
                cache: false,
                contentType: false,
                processData: false,
                success: res => {
                    console.log(res)
                    if (res.hasil) {
                        // console.log(formData)
                        swal.fire({
                            title: "Berhasil!",
                            text: "Mobil Berhasil dipesan!",
                            icon: "success",
                            button: "Ok",
                        }).then(function() {
                            window.location.href = "/pesanancust";
                        });
                    } else {
                        swal.fire({
                            title: "Gagal!",
                            text: "Mobil tidak dapat dipesan!",
                            icon: "error",
                            button: "Ok",
                        }).then(function() {
                            window.location.href = "/formpesan/" + id_mobil;
                        });
                    }
                }
            })
        }
        $('#pay-button').click(function(event) {
            event.preventDefault();
            let id_peminjaman = document.getElementById("id_peminjamanCO").value
            let id_pelanggan = document.getElementById("id_pelangganCO").value
            let id_mobil = document.getElementById("id_mobilCO").value
            let mobil = document.getElementById("mobilCO").value
            let hargaMT = document.getElementById("hargaMT").value
            let tanggalpeminjaman1 = document.getElementById("tanggalpeminjaman").value
            let tanggalpeminjaman = tanggalpeminjaman1.replace("T", " ")
            let tanggalkembali1 = document.getElementById("tanggalkembali").value
            let tanggalkembali = tanggalkembali1.replace("T", " ")
            // let jaminan2 = document.getElementById("jaminan").value;
            // console.log(jaminan)
            let form = document.getElementById("payment-form");
            console.log(form)
            const ars = [
                id_peminjaman,
                id_pelanggan,
                id_mobil,
                tanggalpeminjaman,
                tanggalkembali,
                hargaMT,
                mobil,
            ]
            $.ajax({
                type: 'POST',
                url: '/token',
                // cache: false,
                data: {
                    ars,
                    id_peminjaman,
                    id_pelanggan,
                    id_mobil,
                    tanggalpeminjaman,
                    tanggalkembali,
                    hargaMT,
                    mobil,
                },
                dataType: "json",
                success: function(data) {
                    //location = data;
                    console.log(data)
                    console.log('token = ' + data);
                    // console.log(nama_gedung);
                    var resultType = document.getElementById('result-type');
                    var resultData = document.getElementById('result-data');

                    function changeResult(type, data) {
                        $("#result-type").val(type);
                        $("#result-data").val(JSON.stringify(data));
                        //resultType.innerHTML = type;
                        //resultData.innerHTML = JSON.stringify(data);
                    }
                    snap.pay(data.token, {
                        onSuccess: function(result) {
                            // changeResult('success', result);
                            console.log(result.status_message);
                            transaksi(ars, result)
                        },
                        onPending: function(result) {
                            // changeResult('pending', result);
                            console.log(result.status_message);
                            transaksi(ars, result)
                        },
                        onError: function(result) {
                            // changeResult('error', result);
                            console.log(result.status_message);
                            // $("#payment-form").submit();
                        }
                    });
                }
            });
        });
    </script>
    <script>
        $("#buttonsubmit").click(function(e) {
            e.preventDefault();
            let mulai1 = $("#tanggalpeminjamanpesan").val()
            let mulai = mulai1.replace("T", " ")
            let selesai1 = $("#tanggalkembalipesan").val()
            let selesai = selesai1.replace("T", " ")
            let id_mobilPesan = $("#id_mobilPesan").val()
            console.log(mulai, selesai, id_mobilPesan)
            $.ajax({
                method: "post",
                data: {
                    mulai,
                    selesai,
                    id_mobilPesan
                },
                dataType: "json",
                url: "/cekMobil",
                success: res => {
                    console.log(res)
                    if (res.res) {
                        swal.fire({
                            icon: 'warning',
                            title: res.message,
                            showConfirmButton: true,
                            time: 1000
                        })
                    } else {
                        $('#formpesan').submit();
                    }
                }
            })
        })
    </script>

    <script>
        $("#checkSopir").on("change", function() {
            if(this.checked) {
                // console.log('knta')
                $.ajax({
                    method: "get",
                    dataType: "json",
                    url: "/cekSopir",
                    success: res => {
                        // console.log(res)
                        showDataSopir(res)
                    }
                })
            } else {
                // console.log('sss')
                $("#showDataSopir").html('')
            }
        })

        function showDataSopir(res) {
            let data = ``;
            
            $.each(res.data, function(k, v){
                var number_string = v.harga_sewa.toString(),
                                        sisa = number_string.length % 3,
                                        rupiah = number_string.substr(0, sisa),
                                        ribuan = number_string.substr(sisa)
                                        .match(/\d{3}/g);
                                    if (ribuan) {
                                        separator = sisa ? '.' : '';
                                        rupiah += separator + ribuan.join('.');
                                    }


                data += `   <td style="text-align: center;">${v.nama_sopir}</td>
                            <td style="text-align: center;">Rp ${rupiah.toLocaleString('id-ID')}</td>`
            })

            $("#showDataSopir").append(
                            `<table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" style="text-align: center;">Nama Sopir</th>
                                        <th scope="col" style="text-align: center;">Biaya Sopir Perhari</th>
                                    </tr>
                                </thead>
                                <tbody>` + data + 
                                `</tbody>
                            </table>`
                        )
        }
    </script>
    
</body>

</html>