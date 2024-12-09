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
    $routes->get('barang/edit/(:any)', 'Admin\Master\BarangController::edit/$1'); // Edit Barang
    $routes->post('barang/update/(:any)', 'Admin\Master\BarangController::update/$1'); // Update Barang
    $routes->get('barang/delete/(:any)', 'Admin\Master\BarangController::delete/$1');
    // Routes for kategori
    $routes->get('kategori', 'Admin\Master\KategoriController::index'); // Menampilkan data kategori
    $routes->get('kategori/create', 'Admin\Master\KategoriController::create'); // Form tambah kategori
    $routes->post('kategori/store', 'Admin\Master\KategoriController::store'); // Menyimpan kategori
    $routes->get('kategori/edit/(:num)', 'Admin\Master\KategoriController::edit/$1'); // Form edit kategori
    $routes->post('kategori/update/(:num)', 'Admin\Master\KategoriController::update/$1'); // Menyimpan perubahan kategori
    $routes->get('kategori/delete/(:num)', 'Admin\Master\KategoriController::delete/$1'); // Hapus kategori
    $routes->get('user', 'Admin\Master\UserController::index');
    $routes->get('jual', 'Admin\Transaksi\JualController::index');
    $routes->get('laporan', 'Admin\Transaksi\LaporanController::index');
    $routes->get('pengaturan', 'Admin\Setting\PengaturanController::index');
});
