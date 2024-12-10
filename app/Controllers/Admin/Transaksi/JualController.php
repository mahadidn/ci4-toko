<?php

namespace App\Controllers\Admin\Transaksi;

use App\Controllers\BaseController;
use App\Models\Barang;
use App\Models\DetailNota;
use App\Models\Nota;
use App\Models\Penjualan;
use App\Models\Toko;

class JualController extends BaseController
{
   
        public function index()
    {
       
        $penjualanModel = new Penjualan();
        $penjualan = $penjualanModel->select('penjualan.*, barang.id_barang, barang.nama_barang, member.id_member, member.nm_member')
                    ->join('barang', 'barang.id_barang = penjualan.id_barang', 'left')
                    ->join('member', 'member.id_member = penjualan.id_member', 'left')
                    ->orderBy('penjualan.id_penjualan')
                    ->findAll();

        // Total pembayaran dummy
        $total_bayar = array_sum(array_column($penjualan, 'total'));

        // Pass the data to the view
        return view('admin/transaksi/jual/index', [
            'penjualan' => $penjualan,
            'total_bayar' => $total_bayar,
        ]);
    }

    public function getBarang(){

        $cari = $this->request->getGet('q');

        $barang = new Barang();
        $barang = $barang->select('barang.*, kategori.id_kategori, kategori.nama_kategori')
                        ->join('kategori', 'barang.id_kategori = kategori.id_kategori')
                        ->like('barang.id_barang', $cari)
                        ->orLike('barang.nama_barang', $cari)
                        ->orLike('barang.merk', $cari)
                        ->findAll();

        return $this->response->setJSON($barang);

    }

    public function tambahBarang(){

        $idBarang = $this->request->getGet('id_barang');
        $idKasir = $this->request->getGet('id_kasir');
        $jumlah = '0';
        $total = '0';

        $penjualan = new Penjualan();
        $penjualan->insert([
            "id_barang" => $idBarang,
            "id_member" => $idKasir,
            "jumlah" => $jumlah,
            "total" => $total
        ]);

        return redirect()->to(base_url("/jual"));

    }

    public function deleteBarang(){
        // Ambil input dari query string
        $id_barang = $this->request->getGet('brg');
        $jumlah    = $this->request->getGet('jml');
        $id_penjualan = $this->request->getGet('id');


        // Inisialisasi model
        $barangModel = new Barang();
        $penjualanModel = new Penjualan();

        // Cek data barang berdasarkan id_barang
        $barang = $barangModel->where('id_barang', $id_barang)->first();

        if (!$barang) {
            return redirect()->to(base_url('/jual'));
        }

        // Update stok barang
        $stok_baru = $jumlah + $barang['stok'];
        $barangModel->update($id_barang, ['stok' => $stok_baru]);

        // Hapus data penjualan berdasarkan id_penjualan
        $penjualanModel->delete($id_penjualan);

        // kembali ke halaman
        return redirect()->to(base_url('/jual'));
    }
      
   

    public function editBarang(){
        // Ambil input dari request POST
        $id = $this->request->getPost('id');
        $id_barang = $this->request->getPost('id_barang');
        $jumlah = $this->request->getPost('jumlah');

        // Inisialisasi model
        $barangModel = new Barang();
        $penjualanModel = new Penjualan();

        // Cek data barang berdasarkan id_barang
        $barang = $barangModel->find($id_barang);

        if (!$barang) {
            return redirect()->back()->with('error', 'Barang tidak ditemukan.');
        }

        // Cek apakah stok cukup
        if ($barang['stok'] >= $jumlah) {
            // Hitung total harga
            $harga_jual = $barang['harga_jual'];
            $total = $harga_jual * $jumlah;

            // Update data penjualan
            $penjualanModel->update($id, [
                'jumlah' => $jumlah,
                'total' => $total
            ]);

            return redirect()->to(base_url('/jual'))->with('success', 'Keranjang berhasil diperbarui.');
        } else {
            return redirect()->to(base_url('/jual'))->with('error', 'Jumlah barang melebihi stok tersedia.');
        }
    }


    public function bayar()
    {
        $penjualanModel = new Penjualan();
        $notaModel = new Nota();
        $detailNotaModel = new DetailNota();

        // Hitung total pembayaran
        $totalBelanja = $penjualanModel->selectSum('total')->first()['total'];

        // Ambil input POST
        $bayar = $this->request->getPost('bayar');
        $id_barang = $this->request->getPost('id_barang');
        $id_member = $this->request->getPost('id_member');
        $jumlah = $this->request->getPost('jumlah');
        $total = $this->request->getPost('total1');
        $totalSemua = $this->request->getPost('total');
        $periode = $this->request->getPost('periode');
        $tgl_input = $this->request->getPost('tanggal');
        $tgl = date('Y-m-d');

        if (!empty($bayar)) {
            $kembalian = $bayar - $totalBelanja;

            if ($bayar >= $totalBelanja) {
                // Generate ID Nota
                $lastNota = $notaModel->selectMax('id_nota', 'last')
                    ->where('tanggal_input', $tgl_input)
                    ->first();

                $lastNoTransaksi = $lastNota['last'] ?? 'TAA' . $tgl . '0000';
                $lastNoUrut = (int)substr($lastNoTransaksi, 13, 4);
                $nextNoUrut = $lastNoUrut + 1;
                $nextNoTransaksi = 'TAA' . $tgl . sprintf('%04s', $nextNoUrut);

                // Insert data ke tabel nota
                $notaModel->insert([
                    'id_nota' => $nextNoTransaksi,
                    'id_member' => $id_member[0],
                    'tanggal_input' => $tgl_input,
                    'periode' => $periode,
                    "total" => $totalSemua
                ]);

                // Insert data ke tabel detail_nota
                $jumlahDipilih = count($id_barang);
                for ($x = 0; $x < $jumlahDipilih; $x++) {
                    $detailNotaModel->insert([
                        'id_barang' => $id_barang[$x],
                        'id_nota' => $nextNoTransaksi,
                        'jumlah' => $jumlah[$x],
                        'total' => $total[$x]
                    ]);
                }

                if(!is_null($this->request->getPost('cetak'))){
                    // =====print======
                    $toko = new Toko();

                    $toko = $toko->select('toko.id_toko, toko.nama_toko, toko.alamat_toko, toko.nama_pemilik, member.nm_member, telepon')
                        ->join("member", "member.id_member = toko.id_member")
                        ->first();
                    $penjualan = $penjualanModel->select('penjualan.*, barang.id_barang, barang.nama_barang')
                        ->join('barang', 'barang.id_barang = penjualan.id_barang', 'left')
                        ->findAll();
                    
                    $data = [
                        "toko" => $toko,
                        "no_transaksi" => $nextNoTransaksi,
                        "penjualan" => $penjualan,
                        "bayar" => $bayar,
                        "jumlah" => $totalBelanja,
                        "kembalian" => $kembalian
                    ];

                    $sendData = [
                        "data" => $data
                    ];

                    $penjualanModel->truncate();

                    return view('admin/transaksi/jual/print', $sendData);
                    // ========print========
                }

                // hapus penjualan buat ngereset mesin kasirnya
                $penjualanModel->truncate();

                return redirect()->to(base_url('/jual'))->with('successBelanja', 'Belanjaan berhasil dibayar.');
            } else {
                return redirect()->to(base_url('/jual'))->with('errorUangKurang', 'Uang kurang! Kekurangan: Rp.' . $kembalian);
            }
        }

        return redirect()->back()->with('error', 'Pembayaran gagal.');
    }

    public function cetakPdf($data){

        $sendData = [
            "data" => $data
        ];

        return view('admin/transaksi/jual/print', $sendData);



    }

    public function resetKeranjang(){

        $penjualan = new Penjualan();

        $penjualan->truncate();

        return redirect()->to(base_url('/jual'));

    }

}
