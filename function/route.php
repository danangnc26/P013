<?php
session_start();
ob_start();
error_reporting(E_ALL ^ E_DEPRECATED);
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'bootstrap.php';
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'lib.php';
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'ongkir.php';
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'../config/Config.php';

function route($page)
{
	$p = $_POST;
	$g = $_GET;

	$user = new Users();
	$kategori = new Kategori();
	$barang = new Barang();
	$beli = new Beli();
	$itembeli = new ItemCart();
	$konfirmasi = new KonfirmasiPembayaran();
	$retur = new Retur();
	$itemretur = new ItemRetur();
	
	switch ($page) {
		case 'login':
				include "view/login.php";
			break;
		case 'authenticate':
				$user->doLogin($p);
			break;
		case 'logout':
				$user->doLogout();
			break;
		case 'daftar':
				include "view/register.php";
			break;
		case 'save_daftar':
				$user->saveUser($p);
			break;

		// // // // ADMIN // // // // 
		case 'show_welcome':
				include "view/admin/show_welcome.php";
			break;

		#KATEGORI
		case 'index_kategori':
				$data = $kategori->index();
				include "view/admin/kategori/index.php";
			break;
		case 'create_kategori':
				include "view/admin/kategori/create.php";
			break;
		case 'save_kategori':
				$kategori->saveKategori($p);
			break;
		case 'edit_kategori':
				$data = $kategori->findKategori($g['id_kategori']);
				include "view/admin/kategori/edit.php";
			break;
		case 'update_kategori':
				$kategori->updateKategori($p);
			break;
		case 'delete_kategori':
				$kategori->deleteKategori($g['id_kategori']);
			break;

		#PRODUK
		case 'index_barang':
				$data = $barang->index();
				include "view/admin/barang/index.php";
			break;
		case 'create_barang':
				include "view/admin/barang/create.php";
			break;
		case 'save_barang':
				$barang->saveBarang($p);
			break;
		case 'edit_barang':
				$data = $barang->findBarang($g['kode_barang']);
				include "view/admin/barang/edit.php";
			break;
		case 'update_barang':
				$barang->updateBarang($p);
			break;
		case 'delete_barang':
				$barang->deleteBarang($g['kode_barang']);
			break;

		#PESANAN
		case 'index_pesanan':
				$data = $beli->daftarPembelian();
				include "view/admin/pesanan/index.php";
			break;
		case 'detail_pesanan':
				$data1 = $beli->detailBeli($g['kode_beli']);
				$data2 = $itembeli->barangBeli($g['kode_beli']);
				include "view/admin/pesanan/detail.php";
			break;
		case 'update_pesanan':
				$beli->updateStatus($p);
			break;
		case 'delete_pesanan':
				$beli->deletePesanan($g['kode_beli']);
			break;

		#CUSTOMER
		case 'index_customer':
				$data = $user->getCustomer();
				include "view/admin/customer/index.php";
			break;
		case 'delete_customer':
				$user->deleteUser($g['id_user']);
			break;

		case 'index_retur':
				$data = $retur->index();
				include "view/admin/retur/index.php";
			break;
		case 'detail_retur':
				$data1 = $retur->findRetur($g['kode_beli']);
				$data2 = $itemretur->findBarangRetur($g['id_retur']);
				include "view/admin/retur/detail.php";
			break;
		case 'konfirmasi_pengembalian_dana':
				$retur->konfirmasiPengembalianDana($g);
			break;
			
		// // // // ADMIN // // // // 

		case 'home':
				$data1 = $barang->getPublishedHome();
				include "view/visitor/home.php";
			break;
		case 'kategori':
				$id = (isset($g['id'])) ? $g['id'] : '';
				$data1 = $barang->getByCategory($id);
				include "view/visitor/bycategori.php";
			break;
		case 'detail_barang':
				$data1 = $barang->findBarang($g['kode_barang']);
				$data2 = $barang->randomBarang();
				include "view/visitor/detail_barang.php";
			break;
		case 'cart':
				$data = $itembeli->itemOnCart();
				include "view/visitor/cart.php";
			break;
		case 'add_to_cart':
				if(empty($_SESSION)){
					echo Lib::redirectjs(app_base.'login', 'Silahkan login terlebih dahulu');
				}else{
					if($_SESSION['level_user'] == 'admin'){
						Lib::back();
					}else{
						$itembeli->addItemToCart($p);
					}
				}
			break;
		case 'delete_item_from_cart':
				$itembeli->deleteItemFromCart($g);
			break;
		case 'checkout':
				$data1 = $user->getUser();
				include "view/visitor/checkout.php";
			break;
		case 'send_checkout':
				$beli->sendCheckout($p);
			break;
		case 'buy_confirm':
				$data = $beli->findDataPembelian($g['kode_beli']);
				include "view/visitor/konfirmasi_pembelian.php";
			break;
		case 'trans_history':
				$data = $beli->historiPembelian();
				include "view/visitor/histori_pembelian.php";
			break;
		case 'trans_detail':
				$data1 = $beli->detailBeli($g['kode_beli']);
				$data2 = $itembeli->barangBeli($g['kode_beli']);
				include "view/visitor/detail_pembelian.php";
			break;
		case 'save_konfirmasi':
				$konfirmasi->saveKonfirmasi($p);
			break;
		case 'cancel_transaksi':
				$d = ['kode_beli' => $g['kode_beli'], 'status' => '8'];
				$beli->updStatCustomer($d);
			break;
		case 'upd_stat_customer':
				if(isset($g['kode_beli']) && isset($g['status'])){
					$d = ['kode_beli' => $g['kode_beli'], 'status' => $g['status']];
				}
				$beli->updStatCustomer($d);
			break;
		case 'retur_barang':
				$data1 = $konfirmasi->findKonfirmasi($g['kode_beli']);
				$data2 = $itembeli->barangBeli($g['kode_beli']);
				include "view/visitor/retur.php";
			break;
		case 'send_retur':
		// var_dump($p);
			
			$retur->sendRetur($p);
			break;
		case 'tesongkir':
				// Ongkir::getProvList();
				Ongkir::getCityList();
			break;

		case 'ubah_password':
				include "view/component/ubah_password.php";
			break;
		case 'save_password':
				$user->updatePassword($p);
			break;
		
		case 'main' :
				default : 
				Lib::redirect('home');
			break;
	}
}

define("index", "index.php");
define("base_url", server_name()."/".Config::getConfig('rootdir')."/");
define("app_base", index."?page=");

function server_name()
{
	  $serverport = (isset($_SERVER['SERVER_PORT'])) ? ':'.$_SERVER['SERVER_PORT'] : '';
	  return sprintf(
	    "%s://%s".$serverport,
	    isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
	    $_SERVER['SERVER_NAME'],
	    $_SERVER['REQUEST_URI']
	  );
}