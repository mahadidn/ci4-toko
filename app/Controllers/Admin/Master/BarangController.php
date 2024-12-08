<?php

namespace App\Controllers\Admin\Master;

use App\Controllers\BaseController;

class BarangController extends BaseController
{
    public function index()
    {
        return view('admin/master/barang/index');
    }
}
