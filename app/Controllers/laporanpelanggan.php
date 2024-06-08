<?php

namespace App\Controllers;

class laporanpelanggan extends BaseController
{
    protected $lib;
    protected $link;
    protected $judul;
    public function __construct()
    {
        $this->judul = 'Laporan pelanggan';
        $this->lib = 'laporan/pelanggan';
        $this->link = '/laporan/pelanggan';
    }
    public function index()
    {
        date_default_timezone_set('asia/jakarta');
        // $tanggalawal = date('Y-m-d');
        // $tanggalakhir = date('Y-m-d');
        $db = \Config\Database::connect();
        $query = $db->query(
            "SELECT * from pelanggan"
        )->getResultArray();
        $data = [
            'judul' => $this->judul,
            'link' => $this->link,
            'data' => $query,
            // 'tanggalawal' => $tanggalawal,
            // 'tanggalakhir' => $tanggalakhir,
        ];
        return view($this->lib, $data);
    }
    // public function caritanggal()
    // {
    //     $tanggalawal = $this->request->getVar('tanggalawal');
    //     $tanggalakhir = $this->request->getVar('tanggalakhir');
    //     $db = \Config\Database::connect();
    //     $query = $db->query(
    //         "SELECT * FROM transaksi_pelanggan JOIN motor USING(id_motor) join pelanggan using(id_pelanggan) where harga_pelanggan != '' and date(tgl_pelanggan) between '$tanggalawal' AND '$tanggalakhir'"
    //     )->getResultArray();
    //     $harga = $db->query("SELECT COALESCE(SUM(harga_pelanggan), 0) as harga from transaksi_pelanggan WHERE harga_pelanggan != '' and date(tgl_pelanggan) between '$tanggalawal' AND '$tanggalakhir'")->getResultArray();
    //     $data = [
    //         'judul' => $this->judul,
    //         'link' => $this->link,
    //         'data' => $query,
    //         'tanggalawal' => $tanggalawal,
    //         'tanggalakhir' => $tanggalakhir,
    //         'harga' => $harga
    //     ];
    //     // dd($query);
    //     return view($this->lib, $data);
    // }
}
