<?php

namespace Config;

use CodeIgniter\Router\Router;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('cust_auth');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/logincust', 'cust_auth::login');
$routes->get('/daftarcust', 'cust_auth::daftar');
$routes->get('/lupa_passwordcust', 'cust_auth::lupa');
$routes->get('/listmobil', 'cust_auth::listmobil');
$routes->post('/hasilcarimobil', 'cust_auth::hasilcarimobil');
$routes->post('/datadaftarcust', 'cust_auth::datadaftarcust');
$routes->get('/detailmobil/(:segment)', 'cust_auth::detailmobil/$1');
$routes->get('/formpesan/(:segment)', 'cust_auth::formpesan/$1', ['filter' => 'logincust']);
$routes->post('/pesansekarang', 'cust_auth::pesansekarang');
$routes->get('/checkout', 'cust_auth::checkout');
$routes->post('/cekMobil', 'cust_auth::cekMobil');
$routes->post('/token', 'c_pelanggan::token');
$routes->post('/selesai', 'c_pelanggan::selesai');
$routes->post('/bayar', 'c_pelanggan::bayar');
$routes->post('/simpanGambar', 'c_pelanggan::simpanGambar');

$routes->post('/bayarpesanan', 'cust_auth::updatepembayaran');
$routes->get('/cekusernamecust', 'cust_auth::cek_username');
$routes->get('/formubah', 'cust_auth::formubah');
$routes->post('/ubah_passwordcust', 'cust_auth::ubahpass');
$routes->post('/cek_login', 'cust_auth::cek_login');
$routes->get('/logoutcust', 'cust_auth::logout');
$routes->get('/pesanancust', 'cust_auth::pesanansaya');
$routes->get('/pesanselesai/(:segment)', 'cust_auth::pesanselesai/$1');
$routes->get('/pembayaranpesan/(:segment)', 'cust_auth::pembayaranpesan/$1');
// $routes->get('/', 'cust_auth::index', ['filter' => 'logincust']);
$routes->group('', ['filter' => 'logincust'], function ($routes) {
	// $routes->get('/', 'cust_auth::index');
});
// ````````````````````````````````````````````````````````````````````
$routes->get('/login', 'peminjaman_auth::login');
$routes->get('/peminjaman_auth/cek_username', 'peminjaman_auth::cek_username');
$routes->get('/peminjaman_auth/ubahpass', 'peminjaman_auth::formubah');
$routes->get('/lupa_password', 'peminjaman_auth::lupa');
$routes->post('/create/akun', 'peminjaman_auth::create');
$routes->get('/register', 'peminjaman_auth::register');
$routes->post('/ubah_password', 'peminjaman_auth::ubahpass');
$routes->post('/cek-login', 'peminjaman_auth::cek_login');
$routes->get('/logout', 'peminjaman_auth::logout');

$routes->get('/home', 'peminjaman_auth::index', ['filter' => 'loginfilt']);
$routes->group('', ['filter' => 'loginfilt'], function ($routes) {

	$routes->get('/home', 'Home::index');
	$routes->get('/dasboard', 'Home::index');

	$routes->get('/pelanggan', 'c_pelanggan::index');
	$routes->get('/pelanggan/tambah', 'c_pelanggan::inputdata');
	$routes->post('/pelanggan/simpan', 'c_pelanggan::simpan');
	$routes->get('/ubah/(:segment)', 'c_pelanggan::keformedit/$1');
	$routes->post('/ubah_pelanggan/(:segment)', 'c_pelanggan::updatepelanggan/$1');
	$routes->get('/delete_pelanggan/(:segment)', 'c_pelanggan::hapuspelanggan/$1');

	
	$routes->get('/sopir', 'c_sopir::index');
	$routes->get('/cekSopir', 'c_jadwalsopir::cekSopir');
	$routes->get('/sopir/tambah', 'c_sopir::inputdata');
	$routes->post('/sopir/simpan', 'c_sopir::simpan');
	$routes->get('/ubah_sopir/(:segment)', 'c_sopir::keformedit/$1');
	$routes->post('/ubah_sopir/(:segment)', 'c_sopir::updatesopir/$1');
	$routes->get('/delete_sopir/(:segment)', 'c_sopir::hapussopir/$1');


	$routes->get('/jadwal_sopir', 'c_jadwalsopir::index');
	$routes->get('/jadwal_sopir/tambah', 'c_jadwalsopir::inputdata');
	$routes->post('/jadwal_sopir/simpan', 'c_jadwalsopir::simpan');
	$routes->get('/ubah_jadwal_sopir/(:segment)', 'c_jadwalsopir::keformedit/$1');
	$routes->post('/ubah_jadwal_sopir/(:segment)', 'c_jadwalsopir::updatejadwal_sopir/$1');
	$routes->get('/delete_jadwal_sopir/(:segment)', 'c_jadwalsopir::hapusjadwal_sopir/$1');



	$routes->get('/mobil', 'c_mobil::index');
	$routes->get('/mobil/tambah', 'c_mobil::inputdata');
	$routes->post('/mobil/simpan', 'c_mobil::simpan');
	$routes->get('/ubahmobil/(:segment)', 'c_mobil::keformedit/$1');
	$routes->post('/ubah_mobil/(:segment)', 'c_mobil::updatemobil/$1');
	$routes->get('/delete_mobil/(:segment)', 'c_mobil::hapusmobil/$1');


	$routes->get('/type', 'c_type::index');
	$routes->get('/type/tambah', 'c_type::inputdata');
	$routes->post('/type/simpan', 'c_type::simpan');
	$routes->get('/ubahtype/(:segment)', 'c_type::keformedit/$1');
	$routes->post('/ubah_type/(:segment)', 'c_type::updatetype/$1');
	$routes->get('/delete_type/(:segment)', 'c_type::hapustype/$1');



	$routes->post('/isiTable', 'c_peminjaman::isiTable');
	$routes->get('/peminjaman', 'c_peminjaman::index');
	$routes->get('/peminjaman/tambah', 'c_peminjaman::form_input');
	$routes->post('/peminjaman/simpan', 'c_peminjaman::simpan');
	$routes->get('/ubahpeminjaman/(:segment)', 'c_peminjaman::keformedit/$1');
	$routes->post('/ubah_peminjaman/(:segment)', 'c_peminjaman::updatepeminjaman/$1');
	$routes->post('/selesaipeminjaman/(:segment)', 'c_peminjaman::updatepeminjamanselesai/$1');
	$routes->post('/selesaipeminjamansetuju/(:segment)', 'c_peminjaman::updatepeminjamansetuju/$1');
	$routes->get('/pengembalian', 'c_peminjaman::index2');
	$routes->get('/laporanpeminjaman', 'laporanpeminjaman::index');
	$routes->post('/caritanggalpeminjaman', 'laporanpeminjaman::caritanggal');
	$routes->get('/laporanpengembalian', 'laporanpengembalian::index');
	$routes->post('/laporanpengembalian/caritanggal', 'laporanpengembalian::caritanggal');
});

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
