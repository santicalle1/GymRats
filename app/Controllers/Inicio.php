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
            $data['usuario'] = $session->get('usuario');
            return view('inicio', $data);
        }
        public function logout()
    {
        // Cerrar sesión
        $session = session();
        $session->destroy();

        // Redirigir al usuario a la página de inicio
        return redirect()->to(base_url('inicio'));
    }
        
}
