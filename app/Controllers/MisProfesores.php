<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class MisProfesores extends BaseController
{
    public function index()
    {
        // Aquí puedes obtener la información de "mis profesores" desde la base de datos
        // y pasarla a la vista
        $misProfesores = []; // Reemplaza esto con la lógica real para obtener la información

        return view('mis_profesores', ['misProfesores' => $misProfesores]);
    }
}
