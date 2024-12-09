<?php
namespace App\Controllers\Admin\Master;

use App\Controllers\BaseController;
use App\Models\Kategori;

class KategoriController extends BaseController
{
    protected $kategoriModel;

    public function __construct()
    {
        $this->kategoriModel = new Kategori();
    }

    public function index()
    {
        // Ambil semua data kategori dari database
        $data['hasil'] = $this->kategoriModel->findAll();

        return view('admin/master/kategori/index', $data);
    }

    public function create()
    {
        return view('admin/master/kategori/create');
    }

    public function store()
    {
        // Validasi input
        if ($this->validate([
            'kategori' => 'required|max_length[255]',
        ])) {
            // Insert data ke database
            $this->kategoriModel->save([
                'nama_kategori' => $this->request->getPost('kategori'),
                'tgl_input' => date('Y-m-d H:i:s'),
            ]);
            return redirect()->to('/kategori')->with('success', 'Tambah Data Berhasil!');
        }

        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    public function edit($id)
    {
        $data['edit'] = $this->kategoriModel->find($id);

        return view('admin/master/kategori/edit', $data);
    }

    public function update($id)
    {
        // Validasi input
        if ($this->validate([
            'kategori' => 'required|max_length[255]',
        ])) {
            // Update data kategori
            $this->kategoriModel->update($id, [
                'nama_kategori' => $this->request->getPost('kategori'),
            ]);
            return redirect()->to('/kategori')->with('success-edit', 'Update Data Berhasil!');
        }

        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    public function delete($id)
    {
        // Hapus data kategori
        $this->kategoriModel->delete($id);
        return redirect()->to('/kategori')->with('remove', 'Hapus Data Berhasil!');
    }
}
