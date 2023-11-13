<?php 

namespace App\Controllers;

use App\Models\ProductoModel;
use App\Models\ProfesoresModel;
use CodeIgniter\Controller;

class ProfesoresController extends Controller {

    public function addForm() {
        return view('profesores_view');
    }

    public function create() {
        $model = new ProfesoresModel();

        // Procesando la imagen
        $file = $this->request->getFile('imagen');
        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(ROOTPATH . 'public/uploads', $newName);
            $imagenPath = 'uploads/' . $newName;
        } else {
            $imagenPath = ''; // o puedes poner una ruta predeterminada
        }

        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'especialidad' => $this->request->getPost('especialidad'),
            'fecha_de_contrato' => $this->request->getPost('fecha_de_contrato'),
            'titulos' => $this->request->getPost('titulos'),
            'horarios' => $this->request->getPost('horarios'),
            'telefono' => $this->request->getPost('telefono'),
            'mail' => $this->request->getPost('mail'),
            'salario' => $this->request->getPost('salario'),
            'coste' => $this->request->getPost('coste'),
            'dificultad' => $this->request->getPost('dificultad'),
            'imagen' => $imagenPath
        ];

        $model->insert($data);

        return redirect()->to(base_url('/profesores')); 
    }

    public function index() {
        $model = new ProfesoresModel();
        $data['profesores'] = $model->findAll();
        return view('profesores', $data);
    }
    public function procesarCompra($id_profesor) {
        // Verifica si el usuario ha iniciado sesión
        $id = session()->get('id');
        
        if (!$id) {
            return redirect()->to('/login')->with('error', 'Por favor, inicie sesión primero.');
        }
    
        // Aquí deberías agregar lógica para eliminar al profesor del conjunto general y agregarlo al conjunto de "mis profesores"
        // ...
    
        // Redirige a la vista de mis profesores con un mensaje de éxito y el ID del profesor comprado
        return redirect()->to('/mis_profesores')->with('success', 'Compra exitosa')->with('id_profesor', $id_profesor);
    }
    

    
}

