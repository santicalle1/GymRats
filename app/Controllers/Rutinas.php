<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\RutinaModel;

class Rutinas extends BaseController
{
    public function index()
    {
        return view('rutinas');
    }

    public function indexx()
    {
        // Cargar los datos de las rutinas desde la base de datos
        $rutinaModel = new RutinaModel();
        $data['rutinas'] = $rutinaModel->findAll();

        // Pasar los datos a la vista
        return view('modificar_rutinas', $data);
    }

    // Función para eliminar rutina
    public function eliminar($id)
    {
        // Lógica para eliminar la rutina con el ID proporcionado
        $rutinaModel = new RutinaModel();
        $rutinaModel->delete($id);

        // Redirigir a la página de modificar rutinas después de eliminar
        return redirect()->to('/rutinas/indexx');
    }

    // Función para editar rutina (mostrar formulario de edición)
    public function editar($id)
    {
        // Lógica para obtener los datos de la rutina con el ID proporcionado
        $rutinaModel = new RutinaModel();
        $data['rutina'] = $rutinaModel->find($id);

        // Mostrar vista de edición con los datos de la rutina
        return view('editar_rutina', $data);
    }

    // Función para procesar el formulario de edición
    public function procesarEdicion()
    {
        // Lógica para procesar el formulario de edición
        $request = service('request');
        $id_rutina = $request->getPost('id_rutina');
        
        // Obtén los datos actualizados del formulario
        $data = [
            'tipo_rutina' => $request->getPost('tipo_rutina'),
            'nombre_rutina' => $request->getPost('nombre_rutina'),
            'descripcion' => $request->getPost('descripcion'),
            'duracion' => $request->getPost('duracion'),
            'dificultad' => $request->getPost('dificultad'),
            // Agrega los demás campos del formulario con valores actualizados
            // ...
        ];

        // Actualiza la rutina en la base de datos
        $rutinaModel = new RutinaModel();
        $rutinaModel->update($id_rutina, $data);

        // Redirigir a la página de modificar rutinas después de editar
        return redirect()->to('/rutinas/indexx');
    }
}
