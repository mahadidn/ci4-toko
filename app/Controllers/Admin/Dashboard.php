<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Barang;
use App\Models\DetailNota;
use App\Models\Kategori;
use CodeIgniter\HTTP\ResponseInterface;

class Dashboard extends BaseController
{
    public function index()
    {
        $barang = new Barang();
        $kategori = new Kategori();
        $detailNotaModel = new DetailNota();

        $barangKurangDari3 = $barang->where('stok >=', 3)->findAll();
        $totalBarang = count($barang->findAll());
        $totalKategori = count($kategori->findAll());
        $detailNota = $detailNotaModel->selectSum('jumlah', 'stok')->get()->getRow();
        $detailNota = $detailNota->stok;
        $jumlahBarang = $barang->selectSum('stok', 'jml')->get()->getRow();
        $jumlahBarang = $jumlahBarang->jml;

        $data = [
            "barangKurangDari3" => $barangKurangDari3,
            "totalBarang" => $totalBarang,
            "totalKategori" => $totalKategori,
            "jual" => $detailNota,
            "jumlahBarang" => $jumlahBarang,
        ];
        return view('admin/dashboard', $data);

    }
}
