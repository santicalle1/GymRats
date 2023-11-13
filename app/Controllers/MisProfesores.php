<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProfesoresModel;

class MisProfesores extends BaseController
{
    public function index()
    {
        // Obtén el ID del profesor comprado de la sesión
        $id_profesor_comprado = session()->get('id_profesor');
    
        // Carga el modelo de profesores
        $profesoresModel = new ProfesoresModel();
    
        // Aquí deberías obtener la lista de profesores comprados por el usuario
        $misProfesores = $profesoresModel->obtenerMisProfesores($id_profesor_comprado); // Reemplaza $id_profesor_comprado con la lógica real
    
        // Muestra la lista de profesores comprados
        return view('mis_profesores', ['misProfesores' => $misProfesores]);
    }
    

}

