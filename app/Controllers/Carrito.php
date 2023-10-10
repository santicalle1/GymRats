<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Carrito extends BaseController
{
    public function index()
    {
        return view('carrito');
    }
}