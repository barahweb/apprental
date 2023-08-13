<?php

namespace App\Controllers;

use App\Models\msopir;
use Exception;
class c_sopir extends BaseController
{
	protected $model;

	protected $lib;
	protected $link;
	protected $judul;
	public function __construct()
	{
		
		$this->model = new msopir();
		$this->judul = 'Sopir';
		$this->lib = 'datamaster/sopir';
		$this->link = '/sopir';

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
		$data = [
			'judul' => $this->judul,
			'link' => $this->link,
		];
		return view($this->lib . '/add', $data);
	}

	public function simpan()
	{
		$data = [
			'nama_sopir' => $this->request->getVar('nama_sopir'),
			'status' => $this->request->getVar('status'),
			'alamat' => $this->request->getVar('alamat'),
			'gender' => $this->request->getVar('gender'),
			'no_telepon' => $this->request->getVar('no_telepon'),
			'no_ktp' => $this->request->getVar('no_ktp'),
		];
		// dd($data);
		$this->model->tambah($data);
		session()->setFlashdata('status_text', 'Data Berhasil Ditambahkan!');
		return redirect()->to($this->link)
			->with('status_icon', 'success')
			->with('status', 'Berhasil');
	}
	public function updatesopir($kode)
	{
		$nama_sopir = $this->request->getVar('nama_sopir');
		$gender = $this->request->getVar('gender');
		$alamat = $this->request->getVar('alamat');
		$status = $this->request->getVar('status');
		$no_telepon = $this->request->getVar('no_telepon');
		$no_ktp = $this->request->getVar('no_ktp');
		$db = \Config\Database::connect();
		$query = $db->query(
			"UPDATE sopir SET nama_sopir='$nama_sopir', alamat='$alamat', gender ='$gender', no_telepon='$no_telepon', status ='$status', no_ktp='$no_ktp' WHERE id_sopir='$kode';"
		);
		session()->setFlashdata('status_text', 'Data Berhasil Diubah!');

		return redirect()->to($this->link)
			->with('status_icon', 'success')
			->with('status', 'Berhasil');
	}
	public function keformedit($id_sopir)
	{
		$data = [
			'judul' => 'Ubah sopir',
			'sopir' => $this->model->go_ubahuser($id_sopir),
		];
		// dd($data);
		return view($this->lib . '/edit', $data);
	}
	public function hapussopir($id_sopir)
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
