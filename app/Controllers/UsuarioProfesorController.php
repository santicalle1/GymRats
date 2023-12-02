<?php

namespace App\Controllers;

use App\Models\Rutina;
use App\Models\DescripcionRutina;
use CodeIgniter\Controller;

class UsuarioProfesorController extends Controller
{
    public function agregarRutina()
    {
        $rutinaModel = new Rutina();
        $descripcionRutinaModel = new DescripcionRutina();

        // Datos de la rutina
        $dataRutina = [
            'id_usuario' => $this->request->getPost('id_usuario'),
            'id_profesor' => $this->request->getPost('id_profesor'),
            'nombre_rutina' => $this->request->getPost('nombre_rutina'),
            'duracion' => $this->request->getPost('duracion'),
            'dificultad' => $this->request->getPost('dificultad'),
        ];

        // Insertar rutina y obtener el ID generado
        $idRutina = $rutinaModel->insert($dataRutina);

        // Datos de la descripción de la rutina
        $dataDescripcion = [
            'id_rutina' => $idRutina,
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
