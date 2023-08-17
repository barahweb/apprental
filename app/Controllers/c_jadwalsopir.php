<?php

namespace App\Controllers;

use App\Models\mjadwalsopir;
use Exception;
class c_jadwalsopir extends BaseController
{
	protected $model;

	protected $lib;
	protected $link;
	protected $judul;
	public function __construct()
	{
		
		$this->model = new mjadwalsopir();
		$this->judul = 'Jadwal Sopir';
		$this->lib = 'datamaster/jadwalsopir';
		$this->link = '/jadwal_sopir';

	}

	public function index()
	{
		$db 			= \Config\Database::connect();
		$getAllJadwal 	= $db->query(
			"SELECT sopir.nama_sopir, jadwal_sopir.* from sopir join jadwal_sopir on sopir.id_sopir = jadwal_sopir.id_sopir GROUP BY id_sopir"
		)->getResultArray();
		$data = [
			'judul' => $this->judul,
			'link' => $this->link,
			'data' => $getAllJadwal
		];

		// dd($getAllJadwal);
		return view($this->lib . '/view', $data);
	}

	public function cekSopir()
	{
		$db 			= \Config\Database::connect();
		$getAllSopir 	= $db->query(
								"SELECT * FROM sopir where status = 'aktif' and ketersediaan IS NULL"
							)->getResultArray();

		echo json_encode([
            'res' => 200,
            'data' => $getAllSopir
        ]);
	}


	public function inputdata()
	{
		$db 			= \Config\Database::connect();
		$data = [
			'judul' => $this->judul,
			'link' 	=> $this->link,
			'sopir'	=> $db->query("SELECT id_sopir,nama_sopir from sopir")->getResultArray()
		];
		return view($this->lib . '/add', $data);
	}

	public function simpan()
	{
		$data = [
			'id_sopir' 		=> $this->request->getVar('sopir'),
			'hari' 			=> $this->request->getVar('hari'),
			'jam_mulai' 	=> $this->request->getVar('jamMulai'),
			'jam_akhir' 	=> $this->request->getVar('jamAkhir'),
		];

		$this->model->tambah($data);
		session()->setFlashdata('status_text', 'Data Berhasil Ditambahkan!');
		return redirect()->to($this->link)
			->with('status_icon', 'success')
			->with('status', 'Berhasil');
	}
	public function updatejadwal_sopir($kode)
	{

		$nama_sopir 	= $this->request->getVar('sopir');
		$hari			= $this->request->getVar('hari');
		$jamMulai 		= $this->request->getVar('jamMulai');
		$jamAkhir 		= $this->request->getVar('jamAkhir');
		$db 			= \Config\Database::connect();
		$query = $db->query(
			"UPDATE jadwal_sopir SET hari='$hari', jam_mulai ='$jamMulai', jam_akhir='$jamAkhir' WHERE id_jadwal='$kode';"
		);

		session()->setFlashdata('status_text', 'Data Berhasil Diubah!');

		return redirect()->to($this->link)
			->with('status_icon', 'success')
			->with('status', 'Berhasil');
	}
	public function keformedit($id_jadwal)
	{
		$db 			= \Config\Database::connect();
		$data = [
			'judul' => 'Ubah sopir',
			'sopir' =>  $db->query(
					"SELECT sopir.nama_sopir, jadwal_sopir.* from sopir join jadwal_sopir on sopir.id_sopir = jadwal_sopir.id_sopir where id_jadwal = $id_jadwal"
				)->getRowArray(),
		];
		// dd($data);
		return view($this->lib . '/edit', $data);
	}
	public function hapusjadwal_sopir($id_sopir)
	{

		try {
			$success = $this->model->hapus_user($id_sopir);
			if (!$success) {
				session()->setFlashdata('status_text', 'Data Tidak Dapat Dihapus!');
				return redirect()->to($this->link)
					->with('status_icon', 'error')
					->with('status', 'Gagal!');
			} else {
				session()->setFlashdata('status_text', 'Data Berhasil Dihapus!');
				return redirect()->to($this->link)
					->with('status_icon', 'success')
					->with('status', 'Berhasil!');
			}
		} catch (Exception $e) {
			session()->setFlashdata('status_text', 'Data Tidak Dapat Dihapus!');
			return redirect()->to($this->link)
				->with('status_icon', 'error')
				->with('status', 'Gagal!');
		}
	}

}
