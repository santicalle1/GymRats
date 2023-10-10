<?php
namespace App\Controllers;

use App\Models\Usuarios;

class Panel extends BaseController{ 

public function panel()
{
    $session = session();

    if ($session->get('tipo')) {
        return view('panel_admin');
    } else {
        return view('panel_cliente');
    }
}
}
