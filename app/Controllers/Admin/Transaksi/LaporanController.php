<?php

namespace App\Controllers\Admin\Transaksi;

use App\Controllers\BaseController;
use App\Models\Nota;
use App\Models\Penjualan;

class LaporanController extends BaseController
{
    public function index()
    {
        // Data dummy untuk periode bulan dan tahun
        $bulan = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        $tahun = range(2017, date('Y'));

        $notaModel = new Nota();

        $laporan = $notaModel
            ->select('nota.id_nota, nota.tanggal_input, nota.periode, member.nm_member, detail_nota.id_barang, barang.nama_barang, barang.merk, detail_nota.jumlah, detail_nota.total')
            ->join('detail_nota', 'nota.id_nota = detail_nota.id_nota')
            ->join('barang', 'detail_nota.id_barang = barang.id_barang')
            ->join('member', 'nota.id_member = member.id_member')
            ->orderBy('nota.tanggal_input', 'DESC')
            ->get()
            ->getResultArray();

        // Kirim data ke view
        return view('admin/transaksi/laporan/index', [
            'bulan' => $bulan,
            'tahun' => $tahun,
            'laporan' => $laporan
        ]);
    }

    // pencarian barang yang belum selesai
    public function cari(){

        // karna belum selesai sementara redirect dulu
        return redirect()->to(base_url('/laporan'));

        $tahun = $this->request->getPost('thn');

        $bulan = $this->request->getPost('bln');

        // dd($bulan);

        $notaModel = new Nota();

        $laporan = $notaModel->select('nota.id_nota, nota.tanggal_input, nota.periode, member.nm_member, detail_nota.id_barang, barang.nama_barang, barang.merk, detail_nota.jumlah, detail_nota.total')
            ->join('detail_nota', 'nota.id_nota = detail_nota.id_nota')
            ->join('barang', 'detail_nota.id_barang = barang.id_barang')
            ->join('member', 'nota.id_member = member.id_member')
            ->where('MONTH(nota.tanggal_input)', $bulan)
            ->where('YEAR(nota.tanggal_input)', $tahun)
            ->orderBy('nota.tanggal_input', 'DESC')
            ->get()
            ->getResultArray();

    }
   
}
