<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\RutinaModel;

class RutinasController extends Controller
{
    public function index()
    {
        return view('agregar_rutinas');
    }

    public function agregarRutina()
    {
        // Verifica si se ha enviado el formulario
        if ($this->request->getMethod() === 'post') {
            // Validaciones de formulario
            $validation = \Config\Services::validation();
            $validation->setRules([
                'nombre_rutina' => 'required',
                'descripcion' => 'required',
                'duracion' => 'required',
                'dificultad' => 'required',
            ]);
    
            // Si la validación falla, redirige de nuevo al formulario con los errores
            if (!$validation->withRequest($this->request)->run()) {
                return view('agregar_rutinas', ['validation' => $validation]);
            }
    
            // Obtiene los datos del formulario
            $nombreRutina = $this->request->getPost('nombre_rutina');
            $descripcion = $this->request->getPost('duracion');
            $duracion = $this->request->getPost('duracion');
            $dificultad = $this->request->getPost('dificultad');
            $tipoRutina = $this->request->getPost('tipo_rutina');
    
            // Determina si la rutina es gratuita o de pago
            $idProfesor = null;
            if ($tipoRutina == 1) {
                // Rutina de pago subida por un profesor
                // Asegúrate de obtener el ID del profesor de la sesión o de donde sea necesario
                $idProfesor = obtenerIdProfesor(); // Reemplaza con la lógica real para obtener el ID del profesor
            }
    
            // Guarda los datos en la base de datos usando el modelo correspondiente
            $rutinaModel = new \App\Models\RutinaModel();
            $rutinaModel->insert([
                'nombre_rutina' => $nombreRutina,
                'descripcion' => $descripcion,
                'duracion' => $duracion,
                'dificultad' => $dificultad,
                'id' => session()->get('id'),
                'tipo_rutina' => $tipoRutina,
                'id_profesor' => $idProfesor,
            ]);
    
            // Redirige a la página de rutinas después de agregar la rutina
            return redirect()->to('/rutinas');
        }
    
        // Muestra el formulario por defecto si no se ha enviado el formulario
        return view('agregar_rutinas');
    }
    public function indexx()
    {
        // Carga los datos de las rutinas desde la base de datos
        $rutinaModel = new \App\Models\RutinaModel();
        $data['rutinas'] = $rutinaModel->findAll();
    
        // Muestra la vista de rutinas con los datos
        return view('rutinas', $data);
    }

    public function descargarRutina($id)
    {
        // Obtiene los datos de la rutina desde la base de datos
        $rutinaModel = new \App\Models\RutinaModel();
        $rutina = $rutinaModel->find($id);
    
        // Verifica si la rutina existe
        if ($rutina) {
            // Incrementa el contador de descargas
            $rutinaModel->update($id, ['descargas' => $rutina['descargas'] + 1]);
    
            // Configura el nombre del archivo como el nombre de la rutina
            $fileName = str_replace(' ', '_', $rutina['nombre_rutina']) . '.txt';
    
            // Contenido del archivo
            $fileContent = "Nombre: " . $rutina['nombre_rutina'] . "\n";
            $fileContent .= "Descripcion: " . $rutina['descripcion'] . "\n";
            $fileContent .= "Duración: " . $rutina['duracion'] . "\n";
            $fileContent .= "Dificultad: " . $rutina['dificultad'];
    
            // Configura las cabeceras para la descarga
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . $fileName . '"');
    
            // Imprime el contenido del archivo
            echo $fileContent;
            exit();
        } else {
            // Manejo de error si la rutina no existe
            echo "Rutina no encontrada.";
        }
    }
}
