<?php

namespace App\Controllers;

use App\Models\mpelanggan;
use Exception;
class c_pelanggan extends BaseController
{
	protected $model;

	protected $lib;
	protected $link;
	protected $judul;
	public function __construct()
	{
		
		$this->model = new mpelanggan();
		$this->judul = 'Pelanggan';
		$this->lib = 'datamaster/pelanggan';
		$this->link = '/pelanggan';

		$this->db = \Config\Database::connect();
		$this->builder = $this->db->table('transaksi_peminjaman');
		\Midtrans\Config::$serverKey = 'SB-Mid-server-oHkPnA9a17TlNUEgoymEqZAH';
		// Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
		\Midtrans\Config::$isProduction = false;
		// Set sanitization on (default)
		\Midtrans\Config::$isSanitized = true;
		// Set 3DS transaction for credit card to true
		\Midtrans\Config::$is3ds = true;
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
			'nama' => $this->request->getVar('nama'),
			'username' => $this->request->getVar('username'),
			'alamat' => $this->request->getVar('alamat'),
			'gender' => $this->request->getVar('gender'),
			'no_telepon' => $this->request->getVar('no_telepon'),
			'no_ktp' => $this->request->getVar('no_ktp'),
			'password' => $this->request->getVar('password'),
		];
		// dd($data);
		$this->model->tambah($data);
		session()->setFlashdata('status_text', 'Data Berhasil Ditambahkan!');
		return redirect()->to($this->link)
			->with('status_icon', 'success')
			->with('status', 'Berhasil');
	}
	public function updatepelanggan($kode)
	{
		$nama_pelanggan = $this->request->getVar('nama');
		$gender = $this->request->getVar('gender');
		$alamat = $this->request->getVar('alamat');
		$username = $this->request->getVar('username');
		$no_telepon = $this->request->getVar('no_telepon');
		$no_ktp = $this->request->getVar('no_ktp');
		$password = $this->request->getVar('password');
		$db = \Config\Database::connect();
		$query = $db->query(
			"UPDATE pelanggan SET nama='$nama_pelanggan', alamat='$alamat', gender ='$gender', no_telepon='$no_telepon', username ='$username', no_ktp='$no_ktp', password='$password' WHERE id_pelanggan='$kode';"
		);
		session()->setFlashdata('status_text', 'Data Berhasil Diubah!');

		return redirect()->to($this->link)
			->with('status_icon', 'success')
			->with('status', 'Berhasil');
	}
	public function keformedit($id_pelanggan)
	{
		$data = [
			'judul' => 'Ubah Pelanggan',
			'pelanggan' => $this->model->go_ubahuser($id_pelanggan),
		];
		return view($this->lib . '/edit', $data);
		// dd($data);
	}
	public function hapuspelanggan($id_pelanggan)
	{
		try {
			$success = $this->model->hapus_user($id_pelanggan);
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

	public function token()
	{
		$db = \Config\Database::connect();
		$hargaMT     =  $_POST['hargaMT'];
		$motor     =  $_POST['motor'];
		$id_peminjaman     =  $_POST['id_peminjaman'];
		$id_pelanggan     =  $_POST['id_pelanggan'];
		$getCust = $db->query("SELECT * FROM pelanggan where id_pelanggan = '$id_pelanggan'")->getResultArray();
		foreach ($getCust as $row) {
			$namaCust = $row['nama'];
			$alamatCust = $row['alamat'];
			$hpCust = $row['no_telepon'];
			$ktpCust = $row['no_ktp'];
		}
		// var_dump($_POST);
		$item_details[] = [
			"id" => $id_peminjaman,
			"price" => (float)$hargaMT,
			"quantity" => 1,
			"name" => "Pembayaran Sewa " .  $motor
		];

		$transaction_details = array(
			'order_id' => $id_peminjaman,
			'gross_amount' => (float)$hargaMT, // no decimal allowed for creditcard
		);

		// Optional
		$billing_address = array(
			'first_name'    => "$namaCust",
			'country_code'  => 'IDN'
		);

		// Optional
		$shipping_address = array(
			'first_name'    => "$namaCust",
			'country_code'  => 'IDN'
		);

		// Optional
		$customer_details = array(
			'first_name'    => "$namaCust",
			// 'email'         => "$email",
			'billing_address'  => $billing_address,
			'shipping_address' => $shipping_address
		);

		// Optional, remove this to display all available payment methods
        $enable_payments = array('indomaret', 'alfamart', 'permata_va','bca_va','bni_va','other_va');

		// Fill transaction details
		$transaction = array(
			'enabled_payments' => $enable_payments,
			'transaction_details' => $transaction_details,
			'customer_details' => $customer_details,
			'item_details' => $item_details,
		);
		
		$snapToken = \Midtrans\Snap::getSnapToken($transaction);
		echo json_encode(["token" => $snapToken]);
	}

	// public function simpanGambar(){
	// 	$jaminan = $this->request->getFile('jaminan');
	// 	dd($jaminan);
	// }

	public function selesai()
	{
		// echo json_encode([
		// 	'hasil' => $this->request->getVar()
		// ]);
		$harga_total 	= $this->request->getVar('hargaMT');
		$id_motor 		= $this->request->getVar('id_motor');
		$mulai 			= $this->request->getVar('tanggalpeminjaman');
		$selesai 		= $this->request->getVar('tanggalkembali');
		$order_id 		= $this->request->getVar('order_id');
		$id_pelanggan	= $this->request->getVar('id_pelanggan');
		$id_sopir 		= $this->request->getVar('id_sopir') ?? NULL;
		$pdf 			= $this->request->getVar('pdf');
		$db 			= \Config\Database::connect();

        $sql = $db->query("SELECT * FROM transaksi_peminjaman JOIN motor using(id_motor) WHERE tgl_peminjaman > '$mulai' AND tgl_kembali < '$selesai' AND id_motor = '$id_motor' AND status_peminjaman < '4'
        UNION
        SELECT * FROM transaksi_peminjaman JOIN motor  using(id_motor) WHERE tgl_kembali>'$mulai' AND tgl_peminjaman < '$selesai' AND id_motor = '$id_motor'AND status_peminjaman < '4'")->getRowArray();

		if($sql > 0) {
			echo json_encode([
				'hasil' => 0,
			]);

		} else {

			if ($id_sopir != NULL) {
				$cekHargaSopir = $db->query(
					"select harga_sewa from sopir where id_sopir = '$id_sopir'"
				)->getRow();

				$db->query("UPDATE sopir SET ketersediaan = 'booked' where id_sopir = '$id_sopir'");

				
				$data = [
					'id_peminjaman' 	=> $order_id,
					'id_motor' 			=> $id_motor,
					'id_pelanggan' 		=> $id_pelanggan,
					'tgl_peminjaman' 	=> $mulai,
					'tgl_kembali' 		=> $selesai,
					'harga_peminjaman' 	=> $harga_total,
					'status_peminjaman' => '1',
					'pdf' 				=> $pdf,
					'id_sopir' 			=> $id_sopir,
					'harga_sopir' 		=> $cekHargaSopir->harga_sewa,
				];
				
			} else {
				
				$data = [
					'id_peminjaman' 	=> $order_id,
					'id_motor' 			=> $id_motor,
					'id_pelanggan' 		=> $id_pelanggan,
					'tgl_peminjaman' 	=> $mulai,
					'tgl_kembali' 		=> $selesai,
					'harga_peminjaman' 	=> $harga_total,
					'status_peminjaman' => '1',
					'pdf' 				=> $pdf,
				];
				
			}

			$simpan = $db->table('transaksi_peminjaman')->insert($data);
			if ($simpan) {
				echo json_encode([
					"hasil" => 1
				]);
			}



		}
	}

	public function bayar(){
		$result = json_decode(file_get_contents('php://input'), true);
        $invoice = $result['order_id'];
		$status_code = $result['status_code'];
		$db = \Config\Database::connect();
		if($status_code == '200'){
			$db->query("UPDATE transaksi_peminjaman SET status_peminjaman = '2' where id_peminjaman = '$invoice'");
		}
	}
}
