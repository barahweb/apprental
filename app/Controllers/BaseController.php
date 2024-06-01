<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */

class BaseController extends Controller
{
	/**
	 * Instance of the main Request object.
	 *
	 * @var IncomingRequest|CLIRequest
	 */
	protected $request;

	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = [];

	/**
	 * Constructor.
	 *
	 * @param RequestInterface  $request
	 * @param ResponseInterface $response
	 * @param LoggerInterface   $logger
	 */
	public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);
		$this->session = \Config\Services::session();
		session();
		date_default_timezone_set('asia/jakarta');
		$db = \Config\Database::connect();
		$query = $db->query(
			"SELECT *,TIMESTAMPDIFF(HOUR, tgl_peminjaman, NOW()) as tgl FROM transaksi_peminjaman WHERE status_peminjaman = 1"
		)->getResultArray();
		// dd($query);
		foreach ($query as $tgl) {
			$tglakhir = $tgl['tgl'];
			$id_motor = $tgl['id_motor'];
			$id_peminjaman = $tgl['id_peminjaman'];
			// dd($id_peminjaman);
			if ($tglakhir > '2') {
				$query3 = $db->query(
					"UPDATE transaksi_peminjaman SET status_peminjaman = '5' WHERE id_peminjaman = '$id_peminjaman'"
				);
				// $query2 = $db->query(
				// 	"UPDATE motor JOIN transaksi_peminjaman USING(id_motor) SET STATUS ='Tersedia' WHERE id_motor = '$id_motor'"
				// );
			}
		}
		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.: $this->session = \Config\Services::session();
	}
}
