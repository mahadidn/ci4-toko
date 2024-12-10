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

    // barang
    $routes->group('barang', function($routes){
        $routes->get('', 'Admin\Master\BarangController::index');
        $routes->post('create', 'Admin\Master\BarangController::create');
        $routes->get('edit/(:any)', 'Admin\Master\BarangController::edit/$1');
        $routes->post('update/(:any)', 'Admin\Master\BarangController::update/$1');
        $routes->post('restok', 'Admin\Master\BarangController::restok');
        $routes->get('delete/(:any)', 'Admin\Master\BarangController::delete/$1');
        $routes->get('detail/(:any)', 'Admin\Master\BarangController::detail/$1');
    });

    //kategori
    $routes->group('kategori', function($routes){
        $routes->get('', 'Admin\Master\KategoriController::index'); 
        $routes->get('create', 'Admin\Master\KategoriController::create'); 
        $routes->post('store', 'Admin\Master\KategoriController::store'); 
        $routes->get('edit/(:num)', 'Admin\Master\KategoriController::edit/$1'); 
        $routes->post('update/(:num)', 'Admin\Master\KategoriController::update/$1'); 
        $routes->get('delete/(:num)', 'Admin\Master\KategoriController::delete/$1');
    });

    // user
    $routes->group('user', function($routes){
         $routes->get('', 'Admin\Master\UserController::index');
         $routes->post('edit', 'Admin\Master\UserController::updateProfile');
         $routes->post('edit-image', 'Admin\Master\UserController::updateProfileImage');
         $routes->post('change-password', 'Admin\Master\UserController::changePassword');
    });


    // transaksi
    // jual
    $routes->group('jual', function($routes){
        $routes->get('', 'Admin\Transaksi\JualController::index');
        $routes->get('cari-barang', 'Admin\Transaksi\JualController::getBarang');
        $routes->get('tambah-barang', 'Admin\Transaksi\JualController::tambahBarang');
        $routes->get('hapus-barang', 'Admin\Transaksi\JualController::deleteBarang');
        $routes->post('edit-barang', 'Admin\Transaksi\JualController::editBarang');
        $routes->post('bayar', 'Admin\Transaksi\JualController::bayar');
        $routes->get('reset-keranjang', 'Admin\Transaksi\JualController::resetKeranjang');

    });
    // laporan
    $routes->group('laporan', function($routes){
        $routes->get('', 'Admin\Transaksi\LaporanController::index');
        $routes->post('cari', 'Admin\Transaksi\LaporanController::cari');

    });

    $routes->get('pengaturan', 'Admin\Setting\PengaturanController::index');
});
