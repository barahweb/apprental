<?php

namespace App\Controllers;

class pengembalian extends BaseController
{
    protected $lib;
    protected $link;
    protected $judul;
    public function __construct()
    
    {
        $this->judul = 'Transaksi Pengembalian';
        $this->lib = 'transaksi/pengembalian2';
        $this->link = '/transaksi/pengembalian2';
    }
    public function index()
    {
        date_default_timezone_set('asia/jakarta');
        $tanggalawal = date('Y-m-d');
        $tanggalakhir = date('Y-m-d');
        $db = \Config\Database::connect();
        $query = $db->query(
            "SELECT * FROM transaksi_peminjaman JOIN motor USING(id_motor) join pelanggan using(id_pelanggan) where status_peminjaman= 4 and date(tgl_peminjaman) between '$tanggalawal' AND '$tanggalakhir'"
        )->getResultArray();
        $harga = $db->query("SELECT COALESCE(SUM(harga_peminjaman), 0) AS harga, COALESCE(SUM(denda), 0) AS denda FROM transaksi_peminjaman where status_peminjaman= 4 and date(tgl_peminjaman) between '$tanggalawal' AND '$tanggalakhir'")->getResultArray();
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
            "SELECT * FROM transaksi_peminjaman JOIN motor USING(id_motor) join pelanggan using(id_pelanggan) where status_peminjaman= 4 and date(tgl_peminjaman) between '$tanggalawal' AND '$tanggalakhir'"
        )->getResultArray();
        $harga = $db->query("SELECT COALESCE(SUM(harga_peminjaman), 0) AS harga, COALESCE(SUM(denda), 0) AS denda FROM transaksi_peminjaman where status_peminjaman= 4 and date(tgl_peminjaman) between '$tanggalawal' AND '$tanggalakhir'")->getResultArray();
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
