<?php

namespace App\Controllers;

use CodeIgniter\Controller;

use App\Models\CompraModel;

class ProcesarCompra extends BaseController
{ 
public function index()
    {
        return view('procesarCompra');
    }
}