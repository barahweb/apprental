<?php

namespace App\Controllers;

class c_peminjaman extends BaseController
{
    protected $model;

    //komponen
    protected $judul;
    protected $lib;
    protected $link;

    public function __construct()
    {
        $this->judul = 'Peminjaman';
        $this->link = '/peminjaman';
        $this->lib = '/transaksi/peminjaman';
    }

    public function index()
    {
        $db = \Config\Database::connect();
        $query = $db->query(
            "SELECT * FROM transaksi_peminjaman JOIN motor USING(id_motor) join pelanggan using(id_pelanggan) where status_peminjaman < '3'"
        )->getResultArray();
        $data = [
            'judul' => $this->judul,
            'link' => $this->link,
            'data' => $query
        ];
        return view($this->lib . '/view', $data);
    }

    public function index2()
    {
        $db = \Config\Database::connect();
        $query = $db->query(
            "SELECT * FROM transaksi_peminjaman JOIN motor USING(id_motor) join pelanggan using(id_pelanggan) where status_peminjaman='3'"
        )->getResultArray();
        $data = [
            'judul' => $this->judul,
            'link' => $this->link,
            'data' => $query
        ];
        return view('transaksi/pengembalian/view', $data);
    }
    public function form_input()
    {
        $db = \Config\Database::connect();
        date_default_timezone_set("Asia/Jakarta");
        $date = date("Y-m-d");
        $char = "RENT";
        function generateRandomString($length = 10)
        {
            // KODE ID PEMINJAMAN
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
        $data = [
            'judul' => $this->judul,
            'link' => $this->link,
            'kdpeminjaman' => $kdpeminjaman,
            'pelanggan' => $pelanggan,
            'motor' => $motor
        ];
        // dd($kdpeminjaman);
        return view($this->lib . '/add', $data);
    }
    public function simpan()
    {
        // dd($this->request->getVar());
        $id_customerservice = $this->request->getVar('id_customerservice');
        $id_peminjaman = $this->request->getVar('id_peminjaman');
        $nama = $this->request->getVar('nama');
        $motor = $this->request->getVar('motor');
        $tanggalpeminjaman = $this->request->getVar('tanggalpeminjaman');
        $tanggalkembali = $this->request->getVar('tanggalkembali');
        $status_peminjaman = $this->request->getVar('status_peminjaman');
        $harga = $this->request->getVar('harga');
        $harga1 = str_replace(".", "", $harga);
        $db = \Config\Database::connect();
        $sql = $db->query("SELECT * FROM transaksi_peminjaman JOIN motor using(id_motor) WHERE tgl_peminjaman > '$tanggalpeminjaman' AND tgl_kembali < '$tanggalkembali' AND id_motor = '$motor' AND  status_peminjaman < '4'
        UNION
        SELECT * FROM transaksi_peminjaman JOIN motor  using(id_motor) WHERE tgl_kembali>'$tanggalpeminjaman' AND tgl_peminjaman < '$tanggalkembali' AND id_motor = '$motor'AND  status_peminjaman < '4'")->getRowArray();
        if($sql > 0) {
            session()->setFlashdata('status_text', 'Motor Sedang Digunakan!');
            return redirect()->back()
            ->with('status_icon', 'error')
            ->with('status', 'Gagal');
        } elseif ($tanggalpeminjaman > $tanggalkembali) {
            session()->setFlashdata('status_text', 'Tanggal Tidak Sesuai!');
            return redirect()->back()
            ->with('status_icon', 'error')
            ->with('status', 'Gagal!');
        } else {
            // $jaminan = $this->request->getFile('jaminan');
            // $jaminan->move('img');
            // $jaminan1 = $jaminan->getName();
            $db->query(
                "INSERT INTO transaksi_peminjaman VALUES ('$id_peminjaman', '$nama','$id_customerservice','$motor','$tanggalpeminjaman', '$tanggalkembali','','$status_peminjaman','','', '$harga1','');"
            );
            session()->setFlashdata('status_text', 'Data Berhasil Ditambahkan!');
            return redirect()->to($this->link)
                ->with('status_icon', 'success')
                ->with('status', 'Berhasil');
        }
    }

    public function keformedit($id_peminjaman)
    {
        $db = \Config\Database::connect();
        $query = $db->query(
            "SELECT * FROM transaksi_peminjaman JOIN motor USING(id_motor) join pelanggan using(id_pelanggan) where id_peminjaman = '$id_peminjaman'"
        )->getResultArray();
        $pelanggan = $db->query(
            "SELECT id_pelanggan FROM pelanggan join transaksi_peminjaman using(id_pelanggan) where id_peminjaman = '$id_peminjaman'"
        )->getRow();
        $motor = $db->query(
            "SELECT id_motor FROM motor join transaksi_peminjaman using(id_motor) where id_peminjaman = '$id_peminjaman'"
        )->getRow();
        $jam = $db->query(
            "SELECT NOW() AS jam"
        )->getRow();
        $data = [
            'judul' => $this->judul,
            'link' => $this->link,
            'peminjaman' => $query,
            'pelanggan' => $pelanggan,
            'motor' => $motor,
            'jam' => $jam
        ];
        // dd($query);
        return view($this->lib . '/update', $data);
    }

    public function updatepeminjaman($id_peminjaman)
    {
        $customerservice = session()->get('id_customerservice');
        $tanggalpengembalian = $this->request->getVar('tanggalpengembalian');
        $status_pengembalian = $this->request->getVar('status_pengembalian');
        $motor = $this->request->getVar('id_motor');
        $denda = $this->request->getVar('denda');
        $denda1 = str_replace(".", "", $denda);
        // dd($motor);
        $db = \Config\Database::connect();
        $query = $db->query(
            "UPDATE transaksi_peminjaman SET id_customerservice ='$customerservice', status_peminjaman='4',tgl_pengembalian ='$tanggalpengembalian', status_pengembalian='$status_pengembalian', denda='$denda1' WHERE id_peminjaman='$id_peminjaman';"
        );

        // $selectSopir = $db->query(
        //     "SELECT * FROM transaksi_peminjaman WHERE id_peminjaman='$id_peminjaman';"
        //     )->getRow();


        // if ($selectSopir->id_sopir != NULL) {
        //     $query2 = $db->query(
        //         "UPDATE sopir SET ketersediaan = NULL WHERE id_sopir='$selectSopir->id_sopir';"
        //     );
        // }


        session()->setFlashdata('status_text', 'Transaksi Berhasil Diubah!');
        return redirect()->to('pengembalian')
            ->with('status_icon', 'success')
            ->with('status', 'Berhasil');
    }
    public function updatepeminjamanselesai($id_peminjaman)
    {
        $id_motor = $this->request->getVar('id_motor');
        $db = \Config\Database::connect();
        $query = $db->query(
            "UPDATE transaksi_peminjaman SET status_peminjaman='3' WHERE id_peminjaman='$id_peminjaman';"
        );
        session()->setFlashdata('status_text', 'Status peminjaman Berhasil Diubah!');
        return redirect()->to($this->link)
            ->with('status_icon', 'success')
            ->with('status', 'Berhasil');
    }

    public function isiTable()
    {
        // return view('/tampilan/loadtable');
        $selected = $_POST["value"];
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * from transaksi_peminjaman where id_motor = '$selected' and status_peminjaman < 4");
        $row   = $query->getResultArray();
        echo json_encode($row);
    }

    public function hapus($kd_pemesanan, $kd_kamar)
    {
        // batal pemesanan
        date_default_timezone_set('Asia/Jakarta');
        $where = ['kd_pemesanan' => $kd_pemesanan];
        $this->model->hapus($where);
        $where2 = ['kd_kamar' => $kd_kamar];
        $stts = [
            'status' => 'Kosong'
        ];
        $this->model->updatestatus($stts, $where2);
        return redirect()->to($this->link);
    }


}
