<?php

namespace App\Controllers;

use App\Models\mtype;
use Exception;

class c_type extends BaseController
{
	protected $model;

	protected $lib;
	protected $link;
	protected $judul;
	public function __construct()
	{
		$this->model = new mtype();
		$this->judul = 'Type';
		$this->lib = 'datamaster/type';
		$this->link = '/type';
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
			'nama_type' => $this->request->getVar('nama_type'),
		];
		// dd($data);
		$this->model->tambah($data);
		session()->setFlashdata('status_text', 'Data Berhasil Ditambahkan!');
		return redirect()->to($this->link)
			->with('status_icon', 'success')
			->with('status', 'Berhasil');
	}
	public function updatetype($kode)
	{
		$nama_type = $this->request->getVar('nama_type');
		$db = \Config\Database::connect();
		$query = $db->query(
			"UPDATE type SET nama_type='$nama_type' WHERE id_type='$kode';"
		);
		session()->setFlashdata('status_text', 'Data Berhasil Diubah!');
		return redirect()->to($this->link)
			->with('status_icon', 'success')
			->with('status', 'Berhasil');
	}
	public function keformedit($id_type)
	{
		$data = [
			'judul' => 'Ubah type',
			'type' => $this->model->go_ubahuser($id_type),
		];
		return view($this->lib . '/edit', $data);
		// dd($data);
	}
	public function hapustype($id_type)
	{
		try {
			$success = $this->model->hapus_user($id_type);
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
