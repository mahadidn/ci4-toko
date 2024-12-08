<?php

namespace App\Controllers\Admin\Transaksi;

use App\Controllers\BaseController;

class LaporanController extends BaseController
{
    public function index()
    {
        // Data dummy untuk periode bulan dan tahun
        $bulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
        $tahun = range(2017, date('Y'));
        
        // Data dummy untuk laporan penjualan
        $laporan = [
            ['id_barang' => 'B001', 'id_nota' => 'N001', 'nama_barang' => 'Barang A', 'nama_kategori' => 'Kategori A', 'jumlah' => 5, 'total' => 50000, 'nm_member' => 'Kasir 1', 'tanggal_input' => '2024-12-01'],
            ['id_barang' => 'B002', 'id_nota' => 'N002', 'nama_barang' => 'Barang B', 'nama_kategori' => 'Kategori B', 'jumlah' => 3, 'total' => 30000, 'nm_member' => 'Kasir 2', 'tanggal_input' => '2024-12-02'],
            // Tambahkan data dummy lainnya sesuai kebutuhan
        ];

        // Kirim data ke view
        return view('admin/transaksi/laporan/index', [
            'bulan' => $bulan,
            'tahun' => $tahun,
            'laporan' => $laporan
        ]);
    }
   
}
