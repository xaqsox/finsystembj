<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes = Services::routes();

// Default route settings
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Auth');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true); // Optional: true if you want CI4 to find controllers automatically

/*
|--------------------------------------------------------------------------
| Route Definitions
|--------------------------------------------------------------------------
*/


/* <=====================================================> */
/* <=============== Rute Inti Aplikasi  =================> */
/* <=====================================================> */
$routes->get('/', 'Auth::index');                        
$routes->get('auth', 'Auth::index');
$routes->post('auth/doLogin', 'Auth::doLogin');
$routes->get('auth/logout', 'Auth::logout');
$routes->get('auth/register', 'Auth::register');
$routes->post('auth/store', 'Auth::store');
/* <=====================================================> */
/* <=====================================================> */
// <-----------------------------------------------------> //
/* <=====================================================> */
/* <=============== CRUD : Data Master  =================> */
/* <=====================================================> */
/* <=====================================================> */
$routes->get('jenispelanggan', 'JenisPelanggan::index');
$routes->get('jenispelanggan/create', 'JenisPelanggan::create');
$routes->post('jenispelanggan/store', 'JenisPelanggan::store');
$routes->get('jenispelanggan/edit/(:num)', 'JenisPelanggan::edit/$1');
$routes->post('jenispelanggan/update/(:num)', 'JenisPelanggan::update/$1');
$routes->get('jenispelanggan/delete/(:num)', 'JenisPelanggan::delete/$1');
/* <=====================================================> */
// <------------------ Jenis Pelanggan ------------------> //
/* <=====================================================> */
$routes->get('jeniskendaraan', 'JenisKendaraan::index');
$routes->get('jeniskendaraan/create', 'JenisKendaraan::create');
$routes->post('jeniskendaraan/store', 'JenisKendaraan::store');
$routes->get('jeniskendaraan/edit/(:num)', 'JenisKendaraan::edit/$1');
$routes->post('jeniskendaraan/update/(:num)', 'JenisKendaraan::update/$1');
$routes->get('jeniskendaraan/delete/(:num)', 'JenisKendaraan::delete/$1');
/* <=====================================================> */
// <------------------ Jenis Kendaraan ------------------> //
/* <=====================================================> */
$routes->get('pelanggan', 'Pelanggan::index');
$routes->get('pelanggan/create', 'Pelanggan::create');
$routes->post('pelanggan/store', 'Pelanggan::store');
$routes->get('pelanggan/edit/(:num)', 'Pelanggan::edit/$1');
$routes->post('pelanggan/update/(:num)', 'Pelanggan::update/$1');
$routes->get('pelanggan/delete/(:num)', 'Pelanggan::delete/$1');
/* <=====================================================> */
// <--------------------- Pelanggan ---------------------> //
/* <=====================================================> */
$routes->get('kurir', 'Kurir::index');
$routes->get('kurir/create', 'Kurir::create');
$routes->post('kurir/store', 'Kurir::store');
$routes->get('kurir/edit/(:num)', 'Kurir::edit/$1');
$routes->post('kurir/update/(:num)', 'Kurir::update/$1');
$routes->get('kurir/delete/(:num)', 'Kurir::delete/$1');
/* <=====================================================> */
// <---------------------- Kurir ------------------------> //
/* <=====================================================> */
$routes->get('jenis4ir3inum', 'JenisAirMinum::index');
$routes->get('jenis4ir3inum/create', 'JenisAirMinum::create');
$routes->post('jenis4ir3inum/store', 'JenisAirMinum::store');
$routes->get('jenis4ir3inum/edit/(:num)', 'JenisAirMinum::edit/$1');
$routes->post('jenis4ir3inum/update/(:num)', 'JenisAirMinum::update/$1');
$routes->get('jenis4ir3inum/delete/(:num)', 'JenisAirMinum::delete/$1');
/* <=====================================================> */
// <------------------ Jenis Air Minum ------------------> //
/* <=====================================================> */
$routes->get('airminum', 'AirMinum::index');
$routes->get('airminum/create', 'AirMinum::create');
$routes->post('airminum/store', 'AirMinum::store');
$routes->get('airminum/edit/(:num)', 'AirMinum::edit/$1');
$routes->post('airminum/update/(:num)', 'AirMinum::update/$1');
$routes->get('airminum/delete/(:num)', 'AirMinum::delete/$1');
/* <=====================================================> */
// <------------------ Air Minum ------------------------> //
/* <=====================================================> */
$routes->get('dashboard', 'Dashboard::index', ['filter' => 'role:owner,admin,pelanggan,kurir']);
// <-----------------------------------------------------> //
/* <=====================================================> */
/* <=========== Routes : Based On Roles =================> */
/* <=====================================================> */
/* <=====================================================> */
$routes->get('manage-role', 'User::role', ['filter' => 'role:owner']);
$routes->get('jenispelanggan', 'JenisPelanggan::index', ['filter' => 'role:admin,owner']);
$routes->get('jeniskendaraan', 'JenisKendaraan::index', ['filter' => 'role:admin,owner']);
$routes->get('pemesanan', 'Pemesanan::index', ['filter' => 'role:pelanggan']);
$routes->get('pengiriman', 'Pengiriman::index', ['filter' => 'role:kurir']);
$routes->get('tracking', 'Tracking::index', ['filter' => 'role:pelanggan,kurir']);



/* <==============================================================> */
/* <=========== Utility Routes : Track/Order/ect =================> */
/* <==============================================================> */
$routes->get('pemesanan', 'Pemesanan::index', ['filter' => 'role:pelanggan']);
$routes->get('pemesanan/create', 'Pemesanan::create', ['filter' => 'role:pelanggan']);
$routes->post('pemesanan/store', 'Pemesanan::store', ['filter' => 'role:pelanggan']);
$routes->get('pemesanan/riwayat', 'Pemesanan::riwayat', ['filter' => 'role:pelanggan']);
/* <==============================================================> */
$routes->get('tracking', 'Tracking::index', ['filter' => 'role:pelanggan']);
$routes->get('tracking/detail/(:num)', 'Tracking::detail/$1', ['filter' => 'role:pelanggan']);
/* <==============================================================> */
$routes->get('adminorder', 'PemesananAdmin::index', ['filter' => 'role:admin,owner']);
$routes->get('adminorder/ubah-status/(:num)', 'PemesananAdmin::ubahStatus/$1', ['filter' => 'role:admin,owner']);
/* <==============================================================> */
// Grup untuk Admin & Owner
$routes->group('p3ngiriman', ['filter' => 'role:admin,owner'], function($routes) {
    $routes->get('/', 'Pengiriman::index');
    $routes->get('otomatis/(:num)', 'Pengiriman::prosesOtomatis/$1'); // proses otomatis
    $routes->post('manual', 'Pengiriman::prosesManual'); // proses manual
});

// Khusus Pelanggan
$routes->get('p3ngiriman/pelanggan', 'Pengiriman::pelanggan', ['filter' => 'role:pelanggan']);

$routes->group('sendkurir', ['filter' => 'role:kurir'], function($routes) {
    $routes->get('/', 'PengirimanKurir::index');
    $routes->post('update/(:num)', 'PengirimanKurir::updateStatus/$1');
});

$routes->get('trackorder', 'TrackingPesanan::index');
$routes->get('trackorder/detail/(:num)', 'TrackingPesanan::detail/$1');
$routes->post('trackorder/selesai/(:num)', 'TrackingPesanan::selesai/$1');


// Laporan Pemesanan
$routes->get('laporan', 'Laporan::index');
$routes->get('laporan/cetak_pdf', 'Laporan::cetak_pdf');

// Laporan Pengiriman
$routes->get('laporan/pengiriman', 'LaporanPengiriman::index'); 
$routes->get('laporan/pdfkirim', 'LaporanPengiriman::pdf');

$routes->get('/profile', 'Profile::index');
$routes->post('/profile/update', 'Profile::update');

$routes->get('/airminum/validasistok', 'AirMinum::validasiStok');
$routes->post('/airminum/validasistok', 'AirMinum::simpanValidasiStok');
$routes->post('airminum/validasiStokStore', 'AirMinum::validasiStokStore');


// Profil Kurir
$routes->get('/profilekurir/edit', 'ProfileKurir::edit');
$routes->post('/profilekurir/update', 'ProfileKurir::update');

$routes->get('/chatbot', 'Chatbot::index');
$routes->post('/chatbot/ask', 'Chatbot::ask');
$routes->get('/faq', 'Faq::index');
$routes->get('/faq/create', 'Faq::create');
$routes->post('/faq/store', 'Faq::store');
$routes->get('/faq/edit/(:num)', 'Faq::edit/$1');
$routes->post('/faq/update/(:num)', 'Faq::update/$1');
$routes->get('/faq/delete/(:num)', 'Faq::delete/$1');

// ==================== ULASAN ====================
$routes->get('/ulasan/admin', 'Ulasan::index');
$routes->get('/ulasan/pelanggan', 'Ulasan::pelanggan');
$routes->post('/ulasan/store', 'Ulasan::store');









/* <==============================================================> */
/* <==============================================================> */



// Tambahkan route lain di bawah sini...

/*
|--------------------------------------------------------------------------
| Environment-Specific Routes
|--------------------------------------------------------------------------
|
| You can load additional route files here that are specific to the
| environment the application is running in.
|
*/
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
