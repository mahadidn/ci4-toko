<?php
namespace App\Controllers\Admin\Master;

use App\Controllers\BaseController;
use App\Models\Barang;
use App\Models\Kategori;

class BarangController extends BaseController
{
    protected $barangModel;
    protected $kategoriModel;

    public function __construct()
    {
        $this->barangModel = new Barang();
        $this->kategoriModel = new Kategori();
    }

    public function index()
    {
        try {
            // Ambil data barang dengan join kategori
            $barangData = $this->barangModel
                ->select('barang.*, kategori.nama_kategori')
                ->join('kategori', 'kategori.id_kategori = barang.id_kategori')
                ->findAll();

            // Ambil semua kategori
            $kategoriData = $this->kategoriModel->findAll();

            // Tampilkan ke view
            return view('admin/master/barang/index', [
                'title' => 'Manajemen Barang',
                'barang' => $barangData,
                'kategori' => $kategoriData
            ]);

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memuat data: ' . $e->getMessage());
        }
    }

    public function create()
    {
        // Aturan validasi
        $validationRules = [
            'id' => 'required|is_unique[barang.id_barang]',
            'kategori' => 'required|numeric',
            'nama' => 'required|max_length[255]',
            'merk' => 'required|max_length[255]',
            'beli' => 'required|numeric|greater_than[0]',
            'jual' => 'required|numeric|greater_than[0]',
            'satuan' => 'required',
            'stok' => 'required|numeric|greater_than_equal_to[0]',
            'tgl' => 'required|valid_date'
        ];

        // Validasi input
        if (!$this->validate($validationRules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        // Ambil data dari form
        $barangData = [
            'id_barang' => $this->request->getPost('id'),
            'id_kategori' => $this->request->getPost('kategori'),
            'nama_barang' => $this->request->getPost('nama'),
            'merk' => $this->request->getPost('merk'),
            'harga_beli' => $this->request->getPost('beli'),
            'harga_jual' => $this->request->getPost('jual'),
            'satuan_barang' => $this->request->getPost('satuan'),
            'stok' => $this->request->getPost('stok'),
            'tgl_input' => $this->request->getPost('tgl'),
            'id_member' => session()->get('id_member') ?? 1
        ];

        try {
            // Simpan data
            if ($this->barangModel->save($barangData)) {
                return redirect()->to('/barang')->with('success', 'Data Barang berhasil ditambahkan');
            } else {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Gagal menyimpan data barang');
            }
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $barang = $this->barangModel
            ->select('barang.*, kategori.nama_kategori')
            ->join('kategori', 'kategori.id_kategori = barang.id_kategori', 'left')
            ->find($id);
    
        if (!$barang) {
            return redirect()->to('/barang')->with('error', 'Data Barang tidak ditemukan');
        }
    
        // Ambil data kategori untuk dropdown
        $kategori = $this->kategoriModel->findAll();
        return view('admin/master/barang/edit', compact('barang', 'kategori'));
    }
    
    public function update($id)
    {
        // Aturan validasi
        $validationRules = [
            'id' => 'required',
            'kategori' => 'required|numeric',
            'nama' => 'required|max_length[255]',
            'merk' => 'required|max_length[255]',
            'beli' => 'required|numeric|greater_than[0]',
            'jual' => 'required|numeric|greater_than[0]',
            'satuan' => 'required',
            'stok' => 'required|numeric|greater_than_equal_to[0]',
        
        ];
    
        // Validasi input
        if (!$this->validate($validationRules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }
    
        // Ambil data dari form
        $barangData = [
            'id_barang' => $this->request->getPost('id'),
            'id_kategori' => $this->request->getPost('kategori'),
            'nama_barang' => $this->request->getPost('nama'),
            'merk' => $this->request->getPost('merk'),
            'harga_beli' => $this->request->getPost('beli'),
            'harga_jual' => $this->request->getPost('jual'),
            'satuan_barang' => $this->request->getPost('satuan'),
            'stok' => $this->request->getPost('stok'),
            'id_member' => session()->get('id_member') ?? 1,
        ];
    
        try {
            // Update data
            if ($this->barangModel->update($id, $barangData)) {
                return redirect()->to('/barang')->with('success', 'Data Barang berhasil diupdate');
            } else {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Gagal memperbarui data barang');
            }
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
    
    public function restok()
{
    // Validasi input
    $validationRules = [
        'id' => 'required',
        'restok' => 'required|numeric|greater_than[0]'
    ];

    if (!$this->validate($validationRules)) {
        // Tangkap detail kesalahan validasi
        $errors = $this->validator->getErrors();
        
        // Redirect kembali dengan pesan kesalahan spesifik
        return redirect()->back()
            ->withInput()
            ->with('errors', $errors);
    }

    $id = $this->request->getPost('id');
    $restokAmount = $this->request->getPost('restok');

    try {
        // Ambil data barang saat ini
        $barang = $this->barangModel->find($id);

        if (!$barang) {
            return redirect()->back()->with('error', 'Barang tidak ditemukan');
        }

        // Update stok
        $newStok = $barang['stok'] + $restokAmount;
        
        $updateData = [
            'stok' => $newStok
        ];

        if ($this->barangModel->update($id, $updateData)) {
            return redirect()->to('/barang')->with('success', "Berhasil menambah stok sebanyak $restokAmount");
        } else {
            return redirect()->back()->with('error', 'Gagal update stok');
        }
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    }
}
    public function detail($id)
{
    try {
        // Ambil data barang dengan join kategori
        $barang = $this->barangModel
            ->select('barang.*, kategori.nama_kategori')
            ->join('kategori', 'kategori.id_kategori = barang.id_kategori')
            ->find($id);

        if (!$barang) {
            return redirect()->to('/barang')->with('error', 'Data Barang tidak ditemukan');
        }

        return view('admin/master/barang/details', compact('barang'));
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    }
}


    public function delete($id)
    {
        try {

            $barang = $this->barangModel->where('id_barang', $id)->first();
            $barang = $barang['nama_barang'];
            
            if ($this->barangModel->delete($id)) {
                return redirect()->to('/barang')->with('success', "Data Barang $barang berhasil dihapus");
            } else {
                return redirect()->back()->with('error', 'Gagal menghapus data barang');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
