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
    $routes->get('jual', 'Admin\Transaksi\JualController::index');
    $routes->get('laporan', 'Admin\Transaksi\LaporanController::index');
    $routes->get('pengaturan', 'Admin\Setting\PengaturanController::index');
});
