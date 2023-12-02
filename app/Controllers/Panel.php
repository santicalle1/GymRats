<?php

namespace App\Controllers;
use App\Models\Usuarios;

class Panel extends BaseController
{

    public function panel()
    {
        session();
        $tipo = session()->get('tipo');
        if ($tipo == 0) {
            return view('panel_cliente');
        } elseif ($tipo == 1) {
            return view('panel_admin');
        } else {
            return view('panel_profesores');
        }
    }
}
