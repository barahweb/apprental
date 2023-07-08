<?php

namespace App\Controllers;

class laporanpeminjaman extends BaseController
{
    protected $lib;
    protected $link;
    protected $judul;
    public function __construct()
    {
        $this->judul = 'Laporan Peminjaman';
        $this->lib = 'laporan/peminjaman';
        $this->link = '/laporan/peminjaman';
    }
    public function index()
    {
        date_default_timezone_set('asia/jakarta');
        $tanggalawal = date('Y-m-d');
        $tanggalakhir = date('Y-m-d');
        $db = \Config\Database::connect();
        $query = $db->query(
            "SELECT * FROM transaksi_peminjaman JOIN mobil USING(id_mobil) JOIN pelanggan USING(id_pelanggan) WHERE harga_peminjaman != '' and date(tgl_peminjaman) between '$tanggalawal' AND '$tanggalakhir'"
        )->getResultArray();
        $harga = $db->query("SELECT COALESCE(SUM(harga_peminjaman), 0) as harga from transaksi_peminjaman WHERE harga_peminjaman != '' and date(tgl_peminjaman) between '$tanggalawal' AND '$tanggalakhir'")->getResultArray();
        $data = [
            'judul' => $this->judul,
            'link' => $this->link,
            'data' => $query,
            'tanggalawal' => $tanggalawal,
            'tanggalakhir' => $tanggalakhir,
            'harga' => $harga
        ];
        return view($this->lib, $data);
    }
    public function caritanggal()
    {
        $tanggalawal = $this->request->getVar('tanggalawal');
        $tanggalakhir = $this->request->getVar('tanggalakhir');
        $db = \Config\Database::connect();
        $query = $db->query(
            "SELECT * FROM transaksi_peminjaman JOIN mobil USING(id_mobil) join pelanggan using(id_pelanggan) where harga_peminjaman != '' and date(tgl_peminjaman) between '$tanggalawal' AND '$tanggalakhir'"
        )->getResultArray();
        $harga = $db->query("SELECT COALESCE(SUM(harga_peminjaman), 0) as harga from transaksi_peminjaman WHERE harga_peminjaman != '' and date(tgl_peminjaman) between '$tanggalawal' AND '$tanggalakhir'")->getResultArray();
        $data = [
            'judul' => $this->judul,
            'link' => $this->link,
            'data' => $query,
            'tanggalawal' => $tanggalawal,
            'tanggalakhir' => $tanggalakhir,
            'harga' => $harga
        ];
        // dd($query);
        return view($this->lib, $data);
    }
}
