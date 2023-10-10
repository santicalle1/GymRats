<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Tienda extends BaseController
{
    public function index()
    {
        return view('tienda');
    }
}

