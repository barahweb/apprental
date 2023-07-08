<?php echo view('tampilan/t_head')  ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php echo view('tampilan/t_navbar') ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php echo view('tampilan/t_header')  ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <?= $this->renderSection('content'); ?>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <?php echo view('tampilan/t_footer')  ?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Apakah Anda Yakin Ingin Logout?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-primary" href="/logout">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url() ?>/template/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>/template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Select2 -->
    <script src="<?= base_url() ?>/template/vendor/select2/js/select2.full.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="<?= base_url() ?>/template/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="<?= base_url() ?>/template/js/sb-admin-2.min.js"></script>
    <script src="<?= base_url() ?>/template/js/demo/datatables-demo.js"></script>

    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('#example').dataTable( {
                "footerCallback": function ( row, data, start, end, display ) {
                    var api = this.api(), data;
                    // console.log(api);
                    // Remove the formatting to get integer data for summation
                    var intVal = function ( i ) {
                        return typeof i === 'string' ?
                            i.replace(/[\Rp .]/g, '')*1 :
                            typeof i === 'number' ?
                                i : 0;
                    };
                        
                    // Total over this page
                    data = api.column( 6, { page: 'current'} ).data();
                    pageTotal = data.length ?
                        data.reduce( function (a, b) {
                                return intVal(a) + intVal(b);
                        } ) :
                        0;
                    // console.log();
                    // $( api.column( 3 ).footer() ).html(
                    //     'Total '
                    // )
                    $( api.column( 6 ).footer() ).html(
                        'Rp '+pageTotal.toLocaleString('id-ID') +''
                    )
                    // Update footer
                }
            });
            $('#example2').dataTable( {
                "footerCallback": function ( row, data, start, end, display ) {
                    var api = this.api(), data;
                    // console.log(api);
                    // Remove the formatting to get integer data for summation
                    var intVal = function ( i ) {
                        return typeof i === 'string' ?
                            i.replace(/[\Rp .]/g, '')*1 :
                            typeof i === 'number' ?
                                i : 0;
                    };
                    var intVal2 = function ( i ) {
                        return typeof i === 'string' ?
                            i.replace(/[\Rp .]/g, '')*1 :
                            typeof i === 'number' ?
                                i : 0;
                    };
                    // Total over this page
                    data = api.column( 6, { page: 'current'} ).data();
                    pageTotal = data.length ?
                        data.reduce( function (a, b) {
                                return intVal(a) + intVal(b);
                        }) : 0;
                    data2 = api.column( 7, { page: 'current'} ).data();
                    total = data2.length ?
                        data2.reduce( function (a, b) {
                                return intVal2(a) + intVal2(b);
                        } ) :
                        0;
                        // console.log(total);
                    $( api.column( 6 ).footer() ).html( 
                        'Rp '+ pageTotal.toLocaleString('id-ID') 
                    );
                    $( api.column( 7 ).footer() ).html(
                        'Rp '+ total.toLocaleString('id-ID') 
                    );
                    // Update footer
                   
                }
            });
        });
    </script>

    <script>
        $("#mobilInput").change(function() {
            var value = $(this).val();
            const months = [
                'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember'
            ]
            $.ajax({
                url: '/isiTable',
                type: 'POST',
                data: {
                    value: value,
                },
                dataType: 'json',
                success: res => {
                    // console.log(res)
                    $('.isiTable').empty();
                    if (res.length > 0) {
                        let el;
                        $.each(res, function(k, e) {
                            const pinjam = new Date(e.tgl_peminjaman);
                            let bulan = months[pinjam.getMonth()];
                            let tahun = pinjam.getFullYear();
                            let hari = pinjam.getDate()

                            let kembali = new Date(e.tgl_kembali)
                            let bulan_kembali = months[kembali.getMonth()];
                            let tahun_kembali = kembali.getFullYear();
                            let hari_kembali = kembali.getDate()

                            let split_pinjam = e.tgl_peminjaman.split(" ")
                            let split_kembali = e.tgl_kembali.split(" ")
                            // console.log(split_pinjam);
                            $('.isiTable').append(`<tr>
                            <td class="text-center">${hari} ${bulan} ${tahun} ${split_pinjam[1]}</td>
                            <td class="text-center">${hari_kembali} ${bulan_kembali} ${tahun_kembali} ${split_kembali[1]}</td></tr>`)
                        });
                        // console.log(el)
                        $('.CSTable').attr('id', 'dataTable');
                        $('.CSTable').DataTable({
                            "info": false,
                            "destroy": true,
                        });
                    } else {
                        $('.isiTable').append(`<tr>
                        <td colspan="2" style="text-align: center">Tidak ada data peminjaman</td>
                    </tr>`)
                    }
                }
            })
        })
    </script>
    <script>
        $(document).ready(function() {
            <?php if (session()->getFlashdata('status')) { ?>
                swal.fire({
                    title: "<?= session()->getFlashdata('status') ?>",
                    text: "<?= session()->getFlashdata('status_text') ?>",
                    icon: "<?= session()->getFlashdata('status_icon') ?>",
                });
            <?php } ?>
        });
    </script>
    <script>
        $(function() {
            $("#gambar").change(function() {
                // alert("tes");
                filePrevieww(this);
            });
        })

        function filePrevieww(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {

                    $("#input_img").attr("src", e.target.result)
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
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
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2').select2({
                theme: 'bootstrap4'
            })

        })
    </script>

</body>


</html>