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
    $routes->get('kategori', 'Admin\Master\KategoriController::index');
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
