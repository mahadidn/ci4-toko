<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Login routes
$routes->get('login', 'LoginController::index');
$routes->post('login', 'LoginController::loginPost');
$routes->get('logout', 'LoginController::logout');

// Group routes with 'isLogin' filter
$routes->group('/', ['filter' => 'isLogin'], function ($routes) {
    $routes->get('', 'Admin\Dashboard::index');
    $routes->get('barang', 'Admin\Master\BarangController::index');
    $routes->post('barang/create', 'Admin\Master\BarangController::create');
    $routes->get('barang/edit/(:any)', 'Admin\Master\BarangController::edit/$1');
    $routes->post('barang/update/(:any)', 'Admin\Master\BarangController::update/$1');
    $routes->post('barang/restok', 'Admin\Master\BarangController::restok');
    $routes->get('barang/delete/(:any)', 'Admin\Master\BarangController::delete/$1');
    $routes->get('barang/detail/(:any)', 'Admin\Master\BarangController::detail/$1');
    // Routes for kategori
    $routes->get('kategori', 'Admin\Master\KategoriController::index'); // Menampilkan data kategori
    $routes->get('kategori/create', 'Admin\Master\KategoriController::create'); // Form tambah kategori
    $routes->post('kategori/store', 'Admin\Master\KategoriController::store'); // Menyimpan kategori
    $routes->get('kategori/edit/(:num)', 'Admin\Master\KategoriController::edit/$1'); // Form edit kategori
    $routes->post('kategori/update/(:num)', 'Admin\Master\KategoriController::update/$1'); // Menyimpan perubahan kategori
    $routes->get('kategori/delete/(:num)', 'Admin\Master\KategoriController::delete/$1'); // Hapus kategori
    
    
    $routes->get('user', 'Admin\Master\UserController::index');

    // transaksi
    // jual
    $routes->group('jual', function($routes){
        $routes->get('', 'Admin\Transaksi\JualController::index');
        $routes->get('cari-barang', 'Admin\Transaksi\JualController::getBarang');
        $routes->get('tambah-barang', 'Admin\Transaksi\JualController::tambahBarang');
        $routes->get('hapus-barang', 'Admin\Transaksi\JualController::deleteBarang');
        $routes->post('edit-barang', 'Admin\Transaksi\JualController::editBarang');
        $routes->post('bayar', 'Admin\Transaksi\JualController::bayar');

    });
    // laporan
    $routes->group('laporan', function($routes){
        $routes->get('', 'Admin\Transaksi\LaporanController::index');
        $routes->post('cari', 'Admin\Transaksi\LaporanController::cari');

    });

    $routes->get('pengaturan', 'Admin\Setting\PengaturanController::index');
});
