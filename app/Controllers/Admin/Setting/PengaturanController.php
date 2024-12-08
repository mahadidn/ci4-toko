<?php

namespace App\Controllers\Admin\Setting;

use App\Controllers\BaseController;

class PengaturanController extends BaseController
{
    public function index()
    {
        return view('setting/pengaturan');
    }
}
