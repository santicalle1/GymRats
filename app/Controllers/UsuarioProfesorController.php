<?php

namespace App\Controllers;

use App\Models\Rutina;
use App\Models\DescripcionRutina;
use CodeIgniter\Controller;

class UsuarioProfesorController extends Controller
{
    public function agregarRutina()
    {
        $descripcionRutinaModel = new DescripcionRutina();
            $dataDescripcion = [
            'id_rutina' => $this->request->getPost('id_rutina'),
            'ejercicios' => $this->request->getPost('ejercicio'),
            'repeticiones' => $this->request->getPost('repeticiones'),
            'series' => $this->request->getPost('series'),
            'peso' => $this->request->getPost('peso'),
        ];

        // Insertar la descripción de la rutina
        $descripcionRutinaModel->insert($dataDescripcion);

        return redirect()->to('/panel_profesores')->with('success', 'La rutina ha sido agregada exitosamente.');
    }
}
