<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Login;
use App\Models\Member;
use CodeIgniter\HTTP\ResponseInterface;

class LoginController extends BaseController
{

    // buat menjalankan view login
    public function index()
    {
        
        if(session()->get('logged_in')){
            // kalo dia udah login, gaperlu kehalaman login lagi
            return redirect()->to("/");
        }

        // jalankan validation, nanti validation ini digunakan di view login buat validasi
        $data = [
            'validation' => \Config\Services::validation()
        ];

        return view('login', $data);

    }

    // login dengan method POST
    public function loginPost(){

        // membuat aturan untuk validasi
        $rules = [
            'user' => 'required',
            'pass' => 'required',
        ];

        // mengambil data yang dikirim method POST
        $user = $this->request->getVar('user');
        $pass = $this->request->getVar('pass');

        if(!$this->validate($rules)){

            // cek user dan pass apakah kosong atau null
            if($user == "" || $user == null || $pass == "" || $pass == null ){
                session()->setFlashdata('pesan', 'User ID dan Password masih kosong');
                session()->setFlashdata('alert_type', 'danger');
                return redirect()->to(base_url('/login'))->withInput();
            }

            $data['validation'] = $this->validator;

            return view('login', $data);
        } else {
            // jika lolos validasi atas
            $session = session();

            $memberModel = new Member(); // Login yg diambil dari Model Login

            // pengecekan email dan password (dimana password menggunakan md5)
            $isValid = $memberModel->select('member.*, login.user, login.pass')
                                ->join('login', 'member.id_member = login.id_member')
                                ->where('login.user', $user)
                                ->where('login.pass', md5($pass))
                                ->first();

            // jika login valid
            if($isValid){
                
                // buat data session di ci
                $sessionData = [
                    'logged_in' => TRUE,
                    'nama' => $isValid['nm_member'],
                    'user' => $isValid['user'],
                    'alamat' => $isValid['alamat_member'],
                    'telepon' => $isValid['telepon'],
                    'email' => $isValid['email'],
                    'gambar' => $isValid['gambar'],
                    'nik' => $isValid['NIK']
                ];

                $session->set($sessionData);
                return redirect()->to(base_url('/'));
            }else {
                // jika tidak valid loginnya
                $session->setFlashdata('pesan', 'Login gagal');
                session()->setFlashdata('alert_type', 'danger');
                return redirect()->to(base_url('/login'))->withInput();
            }


        }

    }

    // logout
    public function logout(){
        $session = session();
        // hapus semua session yang disimpan
        $session->destroy();
        return redirect()->to('/');

    }
}
