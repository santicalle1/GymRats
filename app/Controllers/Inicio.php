<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Inicio extends BaseController
{
    public function index()
    {
        return view('inicio');
    }
    public function sesion()
{
    $session = session();


    $session->set(['_ci_vars' => ['time' => time(), 'ttl' => 15]]);

    $data['usuario'] = $session->get('usuario');

    return view('inicio', $data);
}
    
    public function logout()
    {

        $session = session();
    

        $session->destroy();
        return redirect()->to(base_url('inicio'));
    }
    
}