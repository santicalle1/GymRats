<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Profesores extends BaseController
{
    public function index()
    {
        return view('profesores');
    }
}