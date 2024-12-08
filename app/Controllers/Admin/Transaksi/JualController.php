<?php

namespace App\Controllers\Admin\Transaksi;

use App\Controllers\BaseController;

class JualController extends BaseController
{
   
        public function index()
    {
        // Dummy data for penjualan
        $penjualan = [
            ['id_penjualan' => 1, 'nama_barang' => 'Barang A', 'jumlah' => 2, 'total' => 10000, 'nm_member' => 'Kasir 1', 'id_barang' => 101],
            ['id_penjualan' => 2, 'nama_barang' => 'Barang B', 'jumlah' => 1, 'total' => 5000, 'nm_member' => 'Kasir 1', 'id_barang' => 102],
            ['id_penjualan' => 3, 'nama_barang' => 'Barang C', 'jumlah' => 3, 'total' => 15000, 'nm_member' => 'Kasir 2', 'id_barang' => 103],
        ];

        // Total pembayaran dummy
        $total_bayar = array_sum(array_column($penjualan, 'total'));

        // Pass the data to the view
        return view('admin/transaksi/jual/index', [
            'penjualan' => $penjualan,
            'total_bayar' => $total_bayar,
        ]);
    }
      
   
}
