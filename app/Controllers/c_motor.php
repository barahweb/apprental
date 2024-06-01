<?php

namespace App\Controllers;

use App\Models\mmotor;
use Exception;

class c_motor extends BaseController
{
	protected $model;

	protected $lib;
	protected $link;
	protected $judul;
	public function __construct()
	{
		$this->model = new mmotor();
		$this->judul = 'Motor';
		$this->lib = 'datamaster/motor';
		$this->link = '/motor';
	}
	public function index()
	{
		$data = [
			'judul' => $this->judul,
			'link' => $this->link,
			'data' => $this->model->tampil()
		];
		return view($this->lib . '/view', $data);
	}
	public function inputdata()
	{
		$db = \Config\Database::connect();
		$type = $db->query("SELECT * FROM type")->getResultArray();
		$data = [
			'judul' => $this->judul,
			'link' => $this->link,
			'type' => $type
		];
		return view($this->lib . '/add', $data);
	}

	public function simpan()
	{
		// dd($this->request->getVar('nama_type'));
		$harga2 = $this->request->getVar('harga');
		$gambar2 = $this->request->getFile('gambar');
		// dd($gambar2);
		$gambar2->move('img');
		$gambar = $gambar2->getName();
		$data = [
			'id_customerservice' => $this->request->getVar('id_customerservice'),
			'id_type' => $this->request->getVar('nama_type'),
			'merk' => $this->request->getVar('merk'),
			'warna' => $this->request->getVar('warna'),
			'no_plat' => $this->request->getVar('no_plat'),
			'tahun' => $this->request->getVar('tahun'),

			'status' => $this->request->getVar('status'),
			'harga' => str_replace(".", "", $harga2),
			'gambar' => $gambar,
		];
		// dd($data);
		$this->model->tambah($data);
		session()->setFlashdata('status_text', 'Data Berhasil Ditambahkan!');
		return redirect()->to($this->link)
			->with('status_icon', 'success')
			->with('status', 'Berhasil');
	}
	public function updatemotor($kode)
	{
		$gambar2 = $this->request->getFile('gambar');

		if ($gambar2->getError() == 4) {
			$gambar = $this->request->getVar('gambarlama');
		} else {
			$gambar = $gambar2->getName();
			$gambar2->move('img');
			if($this->request->getVar('gambarlama')){
				unlink('img/' . $this->request->getVar('gambarlama'));
			}
		}
		$merk = $this->request->getVar('merk');
		$warna = $this->request->getVar('warna');
		$no_plat = $this->request->getVar('no_plat');

		$tahun = $this->request->getVar('tahun');

		$status = $this->request->getVar('status');
		$harga1 = $this->request->getVar('harga');
		$harga = str_replace(".", "", $harga1);
		$gambar = $gambar;
		$db = \Config\Database::connect();
		$query = $db->query(
			"UPDATE motor SET merk='$merk', warna='$warna', no_plat ='$no_plat',  tahun ='$tahun', status='$status', harga='$harga', gambar='$gambar' WHERE id_motor='$kode';"
		);
		session()->setFlashdata('status_text', 'Data Berhasil Diubah!');
		return redirect()->to($this->link)
			->with('status_icon', 'success')
			->with('status', 'Berhasil');
	}
	public function keformedit($id_motor)
	{
		$data = [
			'judul' => 'Ubah Motor',
			'motor' => $this->model->go_ubahmotor($id_motor),
		];
		return view($this->lib . '/edit', $data);
		// dd($data);
	}
	public function hapusmotor($id_motor)
	{
		$db = \Config\Database::connect();
		$query = $db->query(
			"SELECT gambar from motor where id_motor = '$id_motor'"
		);
		$row   = $query->getRow();
		try {
			$success = $this->model->hapus_user($id_motor);
			if (!$success) {
				session()->setFlashdata('status_text', 'Data Tidak Dapat Dihapus!');
				return redirect()->to($this->link)
					->with('status_icon', 'error')
					->with('status', 'Gagal!');
			} else {
				unlink('img/' . $row->gambar);
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
