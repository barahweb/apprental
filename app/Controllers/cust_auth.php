<?php

namespace App\Controllers;

use DateTime;

class cust_auth extends BaseController
{
    protected $lib;
    public function __construct()
    {
        helper('form');
    }

    public function index()
    {
        $db = \Config\Database::connect();
        // $query = $db->query(
        //     "select * from motor join type using(id_type) where id_motor='$merk' and id_type='$type' and status='tersedia'"
        // )->getResultArray();
        $data = array(
            'title' => 'Yaka Transport',
        );
        return view('tampilanpelanggan/dashboard', $data);
    }

    public function login()
    {
        $data = array(
            'title' => 'Yaka Transport',
        );
        return view('tampilanpelanggan/login', $data);
    }
    public function pesanansaya()
    {
        $data = array(
            'title' => 'Yaka Transport',
        );
        return view('tampilanpelanggan/pesanansaya', $data);
    }
    public function pembayaranpesan($id_peminjaman)
    {
        $useremail =  session()->get('id_pelanggan');
        $db = \Config\Database::connect();
        $cektglawal = $db->query("select tgl_peminjaman from transaksi_peminjaman where id_pelanggan ='$useremail' and id_peminjaman='$id_peminjaman'")->getRow();
        $cektglkembali = $db->query("select tgl_kembali from transaksi_peminjaman where id_pelanggan ='$useremail' and id_peminjaman='$id_peminjaman'")->getRow();
        $cekharga = $db->query("select harga from motor join transaksi_peminjaman using(id_motor) where id_pelanggan ='$useremail' and id_peminjaman='$id_peminjaman'")->getRow();
        $tgl_peminjaman = strtotime($cektglawal->tgl_peminjaman);
        $tgl_kembali = strtotime($cektglkembali->tgl_kembali);
        $datediff = $tgl_kembali - $tgl_peminjaman;
        $tglakhir = (round($datediff / (60 * 60 * 24)));
        $jam = $datediff / 60 / 60;
        $setengahharga =  $cekharga->harga * 0.5;
        if ($tglakhir * $cekharga->harga == "0") {
            $jumlahhargapeminjaman = $setengahharga;
        } else {
            $jumlahhargapeminjaman = $tglakhir * $cekharga->harga;
        }
        $sql = $db->query("SELECT * from transaksi_peminjaman join motor using(id_motor) join type using(id_type) where id_pelanggan='$useremail' and id_peminjaman='$id_peminjaman';")->getResultArray();
        $data = array(
            'title' => 'Yaka Transport',
            'sql' => $sql,
            'hargapeminjaman' => $jumlahhargapeminjaman
        );
        return view('tampilanpelanggan/pembayaranpesan', $data);
    }

    public function updatepembayaran()
    {
        $id_peminjaman = $this->request->getVar('id_peminjaman');

        $harga_peminjaman1 = $this->request->getVar('harga');
        $harga_peminjaman = str_replace(".", "", $harga_peminjaman1);
        $buktipembayaran = $this->request->getFile('bukti_pembayaran');
        // dd($harga_peminjaman);
        // dd($buktipembayaran);
        $buktipembayaran->move('img');
        $bukti = $buktipembayaran->getName();
        // $jaminan = $this->request->getFile('jaminan');
        // $jaminan->move('img');
        // $jaminan1 = $jaminan->getName();
        $db = \Config\Database::connect();
        $query = $db->query(
            "UPDATE transaksi_peminjaman SET harga_peminjaman='$harga_peminjaman', bukti_pembayaran='$bukti' WHERE id_peminjaman='$id_peminjaman';"
        );
        session()->setFlashdata('status_text', 'Pesanan Anda Berhasil Dibayar!');
        return redirect()->to('/pesanancust')
            ->with('status_icon', 'success')
            ->with('status', 'Berhasil');
    }
    public function daftar()
    {
        $data = array(
            'title' => 'Yaka Transport',
        );
        return view('tampilanpelanggan/registration', $data);
    }
    public function listmotor()
    {
        $data = array(
            'title' => 'Yaka Transport',
        );
        return view('tampilanpelanggan/listmotor', $data);
    }


    public function logout()
    {
        session()->remove('id_pelanggan');
        session()->remove('nama');
        session()->remove('username');
        session()->destroy();
        session()->set(['login' => FALSE]);
        return redirect()->to(base_url('/logincust'));
    }

    public function hasilcarimotor()
    {
        $merk = $this->request->getVar('merk');
        $type = $this->request->getVar('type');
        $db = \Config\Database::connect();



        // dd($this->request);

        if ($type == 'Pilih Type' or $merk == 'Pilih Merk') {
        
            $query = $db->query(
                "select * from motor join type using(id_type) where merk='$merk' or id_type='$type' and status='tersedia'"
            )->getResultArray();

            $query2 = $db->query(
                "select count(id_motor) as motor from motor join type using(id_type) where merk='$merk' or id_type='$type' and status='tersedia'"
            )->getRow();
            
        } else {
            $query = $db->query(
                "select * from motor join type using(id_type) where merk='$merk' and id_type='$type' and status='tersedia'"
            )->getResultArray();

            $query2 = $db->query(
                "select count(id_motor) as motor from motor join type using(id_type) where merk='$merk' and id_type='$type' and status='tersedia'"
            )->getRow();
        }


        $data = [
            'data' => $query,
            'jumlah' => $query2,
            'merk' => $merk,
            'type' => $type
        ];
        // dd($query);
        return view('tampilanpelanggan/hasilcarimotor', $data);
    }

    public function detailmotor($id_motor)
    {
        // $id_motor = $this->request->getVar('id_motor');
        $db = \Config\Database::connect();
        $query = $db->query(
            "select * from motor join type using(id_type) where id_motor='$id_motor'"
        )->getResultArray();
        // dd($query);
        $data = [
            'data' => $query
        ];
        // dd($query);
        return view('tampilanpelanggan/detailmotor', $data);
    }
    public function formpesan($id_motor)
    {
        // $id_motor = $this->request->getVar('id_motor');
        $db = \Config\Database::connect();
        $cek = $db->query(
            "select * from motor join type using(id_type) where id_motor='$id_motor'"
        )->getRow();
        $cekuser =  session()->get('id_pelanggan');
        $cekdatapesan = $db->query(
            "SELECT * FROM transaksi_peminjaman WHERE id_pelanggan='$cekuser' AND status_peminjaman < 4"
        )->getResultArray();
        if($cek->status == 'Tidak Tersedia'){
            session()->setFlashdata('status_text', 'Motor Tidak Tersediaa!');
            return redirect()->back()
                ->with('status_icon', 'error')
                ->with('status', 'Gagal!');
        } else {
            if (count($cekdatapesan) > 0) {
                session()->setFlashdata('status_text', 'Anda Belum Menyelesaikan Transaksi Anda Sebelumnya!');
                return redirect()->back()
                    ->with('status_icon', 'error')
                    ->with('status', 'Gagal!');
            } else {
                $query = $db->query(
                    "select * from motor join type using(id_type) where id_motor='$id_motor'"
                )->getResultArray();
                date_default_timezone_set("Asia/Jakarta");
                $date = date("Y-m-d");
                $char = "RENT";
                function generateRandomString($length = 10)
                {
                    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    $charactersLength = strlen($characters);
                    $randomString = '';
                    for ($i = 0; $i < $length; $i++) {
                        $randomString .= $characters[rand(0, $charactersLength - 1)];
                    }
                    return $randomString;
                }
                $oi = generateRandomString(10);
                $kdpeminjaman = $char . "-" . $oi;
                $pelanggan = $db->query(
                    "SELECT * FROM pelanggan"
                )->getResultArray();
                $motor = $db->query(
                    "SELECT * FROM motor where status='Tersedia'"
                )->getResultArray();
            }
            $cekjamMotor = $db->query("SELECT * FROM transaksi_peminjaman JOIN motor USING(id_motor) WHERE STATUS='Tersedia' AND id_motor='$id_motor' AND tgl_peminjaman AND tgl_kembali >= CURDATE() AND status_peminjaman < 4")->getResultArray();
    
            // dd($query);
            $data = [
                'data' => $query,
                'kdpeminjaman' => $kdpeminjaman,
                'pelanggan' => $pelanggan,
                'motor' => $motor,
                'cekjamMotor' => $cekjamMotor
            ];
            // dd($data);
            return view('tampilanpelanggan/formpesan', $data);
        }
    }
    public function datadaftarcust()
    {
        
        $nama = $this->request->getVar('nama');
        $username = $this->request->getVar('username');
        $alamat = $this->request->getVar('alamat');
        $gender = $this->request->getVar('gender');
        $no_telepon = $this->request->getVar('no_telepon');
        $no_ktp = $this->request->getVar('no_ktp');
        $password = $this->request->getVar('password');
        $db = \Config\Database::connect();
        $query = $db->query(
            "INSERT INTO pelanggan VALUES ('', '$nama','$username','$alamat','$gender', '$no_telepon','$no_ktp','$password');"
        );
        session()->setFlashdata('status_text', 'Berhasil Daftar! Silahkan Login!');
        return redirect()->to(base_url('/logincust'))
            ->with('status_icon', 'success')
            ->with('status', 'Berhasil');
    }


    public function cekMotor(){
        $id_motor = $this->request->getVar('id_motorPesan');
        $mulai = $this->request->getVar('mulai');
        $selesai = $this->request->getVar('selesai');
        $db = \Config\Database::connect();
        $sql = $db->query("SELECT * FROM transaksi_peminjaman JOIN motor using(id_motor) WHERE tgl_peminjaman > '$mulai' AND tgl_kembali < '$selesai' AND id_motor = '$id_motor' AND  status_peminjaman < '4'
        UNION
        SELECT * FROM transaksi_peminjaman JOIN motor  using(id_motor) WHERE tgl_kembali>'$mulai' AND tgl_peminjaman < '$selesai' AND id_motor = '$id_motor'AND  status_peminjaman < '4'")->getRowArray();
        $pesan = $sql > 0 ? 'Motor sedang digunakan' : '';
        echo json_encode([
            'res' => $sql,
            'message' => $pesan
        ]);
    }

    public function checkout(){
        return view('tampilanpelanggan/checkout');
    }

    public function pesansekarang()
    {

        // dd($this->request->getVar());
        if ($this->request->getVar('checkSopir') == 'on') {
            $idSopir = $this->request->getVar('checkbox_name');
        }

        $db = \Config\Database::connect();

        $id_peminjaman = $this->request->getVar('id_peminjaman');
        $merk = $this->request->getVar('motor');
        $id_motor = $this->request->getVar('id_motorPesan');
        $tanggalpeminjaman = $this->request->getVar('tanggalpeminjamanpesan');
        $tanggalkembali = $this->request->getVar('tanggalkembalipesan');
        $harga = $this->request->getVar('harga');

        $datetime1 = new DateTime($tanggalpeminjaman);
        $datetime2 = new DateTime($tanggalkembali);
        $sekarang = new DateTime(date("Y-m-d H:i:s"));
        // dd($datetime1, $datetime2);
        $query = $db->query(
            "select * from motor join type using(id_type) where id_motor='$id_motor'"
        )->getResultArray();

        $cek = $db->query(
            "select * from motor join type using(id_type) where id_motor='$id_motor'"
        )->getRow();
        // dd($cek->status);
        if($cek->status == 'Tersedia'){
            if ($datetime2 > $datetime1) {
                $interval   = $datetime1->diff($datetime2);
                $interval2  = $sekarang->diff($datetime1);
                // dd($interval2);
                if ($interval2->h < 5) {
                    session()->setFlashdata('status_text', 'Minimal 6 jam dari sekarang untuk pemesanan');
                    return redirect()->back()
                        ->with('status_icon', 'error')
                        ->with('status', 'Gagal!');
                }

                if ($interval->days < 1) {
                    session()->setFlashdata('status_text', 'Minimal Sewa 1 Hari!');
                    return redirect()->back()
                        ->with('status_icon', 'error')
                        ->with('status', 'Gagal!');
                } else {
                    if ($this->request->getVar('checkSopir') == 'on') {
                        $cekHargaSopir = $db->query(
                                            "select harga_sewa from sopir where id_sopir = '$idSopir'"
                                        )->getRow();

                        $harga_total = ($harga * $interval->days) + ($cekHargaSopir->harga_sewa * $interval->days);

                    } else {
                        $harga_total = $harga * $interval->days;

                    }
                    $data = [

                        'kdpeminjaman'          => $id_peminjaman,
                        'data'                  => $query,
                        'id_motor'              => $id_motor,
                        'merk'                  => $merk,
                        'tanggalkembali'        => $tanggalkembali,
                        'tanggalpeminjaman'     => $tanggalpeminjaman,
                        'harga_total'           => $harga_total,
                        'id_sopir'              => $idSopir ?? NULL

                    ];
                    
                return view('tampilanpelanggan/checkout', $data);
                }
            } else {
                session()->setFlashdata('status_text', 'Tanggal Tidak Sesuai!');
                return redirect()->back()
                    ->with('status_icon', 'error')
                    ->with('status', 'Gagal!');
            }
        } else {
            session()->setFlashdata('status_text', 'Motor Tidak Tersedia!');
            return redirect()->back()
                ->with('status_icon', 'error')
                ->with('status', 'Gagal!');
        }
    }


    public function pesanselesai($id_peminjaman)
    {
        // $id_peminjaman = $this->request->getVar('id_peminjaman');
        $db = \Config\Database::connect();
        $query2 = $db->query(
            "UPDATE transaksi_peminjaman SET status_peminjaman='4' WHERE id_peminjaman='$id_peminjaman';"
        );
        session()->setFlashdata('status_text', 'Motor Sudah Dikembalikan! Transaksi Berhasil.');
        return redirect()->to(base_url('/pesanancust'))
            ->with('status_icon', 'success')
            ->with('status', 'Berhasil');
    }
    public function lupa()
    {
        return view('tampilanpelanggan/forgotpassword');
    }

    public function invoice($idTransaksi)
    {
        $db = \Config\Database::connect();
        $data['invoice'] = $db->query(
            "SELECT * FROM transaksi_peminjaman JOIN motor USING(id_motor) join pelanggan using(id_pelanggan)  WHERE id_peminjaman='$idTransaksi';"
        )->getRow();
        return view('tampilanpelanggan/invoice', $data);
    }

    public function formubah()
    {
        return view('tampilanpelanggan/ubahpasswordcust');
    }
    public function cek_username()
    {
        $user = $this->request->getVar('username');
        $db = \Config\Database::connect();
        $cek = $db->query(
            "select * from pelanggan where username='$user'"
        )->getResultArray();
        // dd($user);
        if ($cek) {
            session()->setFlashdata('username', $user);
            session()->setFlashdata('status_text', 'Username Terdaftar! Silahkan Ubah Password.');
            return redirect()->to('/formubah')
                ->with('status_icon', 'success')
                ->with('status', 'Berhasil');
        } else {
            session()->setFlashdata('status_text', 'Username Tidak Terdaftar!');
            return redirect()->to('/lupa_passwordcust')
                ->with('status_icon', 'error')
                ->with('status', 'Gagal!');
        }
    }

    public function ubahpass()
    {
        $user = $this->request->getVar('username');
        $pass1 = $this->request->getVar('password');
        $db = \Config\Database::connect();
        $update = $db->query("UPDATE pelanggan SET password='$pass1' WHERE username='$user'");
        if ($update) {
            session()->setFlashdata('status_text', 'Password berhasil di reset!');
            return redirect()->to(base_url('/logincust'))
                ->with('status_icon', 'success')
                ->with('status', 'Berhasil');
        } else {
            session()->setFlashdata('status_text', 'Password gagal di reset!');
            return redirect()->to(base_url('/'))
                ->with('status_icon', 'error')
                ->with('status', 'Gagal!');
        }
    }
    public function cek_login()
    {
        //jika valid
        $user = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        // $password = md5($password1);
        $random1 = $this->request->getPost('random1');
        $random2 = $this->request->getPost('random2');
        $hasiljawab = $this->request->getPost('jawaban');
        $total = $random1 + $random2;
        // echo $user . '-' . $password . '-' . $random1 . '-' . $random2 . '-' . $hasiljawab . '-' . $total;
        // die;
        //cek captcha
        if ($total != $hasiljawab) {
            session()->setFlashdata('status_text', 'Login gagal, Captcha Salah!');
            return redirect()->to(base_url('/logincust'))
                ->with('status_icon', 'error')
                ->with('status', 'Gagal!');
        } else {
            $db = \Config\Database::connect();
            // $update = $db->query("UPDATE pelanggan SET password='$pass1' WHERE username='$user'");
            $cek = $db->query("select * from pelanggan where username = '$user' and password='$password'")->getRowArray();
            if ($cek) {
                session()->set('log', true);
                session()->set('username', $cek['username']);
                session()->set('id_pelanggan', $cek['id_pelanggan']);
                session()->set('nama', $cek['nama']);
                session()->setFlashdata('status_text', 'Anda Berhasil Login!');
                return redirect()->to(base_url('/'))
                    ->with('status_icon', 'success')
                    ->with('status', 'Berhasil!');
            } else {
                session()->setFlashdata('status_text', 'Login gagal, Username Atau Password Salah!');
                return redirect()->to(base_url('/logincust'))
                    ->with('status_icon', 'error')
                    ->with('status', 'Gagal!');
            }
        }
    }
}
