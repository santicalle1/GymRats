<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Compras extends BaseController
{ 
    public function index()
    {
        return view('compras');
    }
}