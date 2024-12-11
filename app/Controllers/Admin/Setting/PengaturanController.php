<?php

namespace App\Controllers\Admin\Setting;

use App\Controllers\BaseController;
use App\Models\Toko;

class PengaturanController extends BaseController
{
    public function index()
    {

        $toko = new Toko();

        $data = [
            "toko" => $toko->first()
        ];

        return view('admin/pengaturan/index', $data);
    }

    public function updateToko(){

        
        $namaToko = $this->request->getVar('namatoko');
        $alamat = $this->request->getVar('alamat');
        $kontak = $this->request->getVar('kontak');
        $pemilik = $this->request->getVar('pemilik');
        
        $idMember = session()->get('id_member');


        $tokoModel = new Toko();
        // $toko = $tokoModel->where('id_member', $idMember)->first();
        // dd($toko);
        $data = [
            "nama_toko" => $namaToko,
            "alamat_toko" => $alamat,
            "tlp" => $kontak,
            "nama_pemilik" => $pemilik
        ];
        $tokoModel->set($data)->where('id_member', $idMember)->update();

        return redirect()->to(base_url('/pengaturan'))->with('berhasil', "Data berhasil diubah");

    }
}
