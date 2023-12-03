<?php

namespace App\Controllers;

use App\Models\ProductoModel;
use App\Models\ProfesoresModel;
use App\Models\UserModel;
use App\Models\ProfesorCompradoModel;
use App\Models\RutinaModel;
use CodeIgniter\Controller;

class ProfesoresController extends Controller
{

    public function addForm()
    {
        return view('profesores_view');
    }

    public function create()
    {
        $model = new ProfesoresModel();
        $userModel = new UserModel();

        $imagen = $this->request->getFile('imagen');
        if ($imagen && !$imagen->hasMoved() && $imagen->isValid()) {
            $newName = $imagen->getRandomName();
            $imagen->move(ROOTPATH . 'public/uploads', $newName);
            $imagenPath = 'uploads/' . $newName;
        } else {
            $imagenPath = null;
        }

        $contrasena = $this->request->getPost('contrasena');

        $dataUsuario = [
            'nombre' => $this->request->getPost('nombre'),
            'email' => $this->request->getPost('email'),
            'contrasena' => password_hash($contrasena, PASSWORD_BCRYPT),
            'usuario' => $this->request->getPost('usuario'),
            'codigo_postal' => $this->request->getPost('codigo_postal'),
            'telefono' => $this->request->getPost('telefono'),
            'tipo' => 2,
        ];

        // Insertar el usuario y obtener su ID
        $resultUsuario = $userModel->insert($dataUsuario);
        $idUsuario = $userModel->insertID(); // Obtener el ID del usuario recién insertado

        // Verificar si la inserción del usuario fue exitosa
        if (!$resultUsuario) {
            return redirect()->to(base_url('/profesores'))->with('mensaje', 'Error al crear el usuario');
        }

        $dataProfesor = [
            'nombre' => $this->request->getPost('nombre'),
            'id' => $idUsuario,
            'especialidad' => $this->request->getPost('especialidad'),
            'fecha_de_contrato' => $this->request->getPost('fecha_de_contrato'),
            'titulos' => $this->request->getPost('titulos'),
            'horarios' => $this->request->getPost('horarios'),
            'coste' => $this->request->getPost('coste'),
            'dificultad' => $this->request->getPost('dificultad'),
            'imagen' => $imagenPath,
        ];


        // Insertar el profesor
        $profesorId = $model->insert($dataProfesor); {

            // Verificar si la inserción del profesor fue exitosa
            if ($profesorId) {
                return redirect()->to(base_url('/profesores'))->with('mensaje', 'Profesor y usuario creados correctamente');
            } else {
                return redirect()->to(base_url('/profesores'))->with('mensaje', 'Error al crear el profesor');
            }
        }
    }
    public function unprofe($id_profesor)
    {
        // Obtén el ID del usuario desde la sesión o de donde sea necesario
        $id_usuario = session()->get('id');
    
        // Registra la información en la tabla de rutinas
        $rutinaModel = new RutinaModel();
        $dataRutina = [
            'id' => $id_usuario,
            'id_profesor' => $id_profesor,
            'tipo_rutina' => 1
        ];
        $rutinaModel->insert($dataRutina);
    
        // Obtén los detalles del profesor comprado
        $model = new ProfesoresModel();
        $data['profesor'] = $model->find($id_profesor);
    
        // Obtén los datos del usuario (reemplaza esto con la lógica real según tu implementación)
        $userModel = new UserModel();
        $data['userData'] = $userModel->find($id_usuario);
    
        // Redirige a la vista de panel_cliente con los detalles necesarios
        return view('panel_cliente', $data);
    }
    


    public function index()
    {
        $model = new ProfesoresModel();
        $data['profesores'] = $model->findAll();
        return view('profesores', $data);
    }

    public function procesarCompra($id_profesor)
    {
        $model = new ProfesoresModel();
        $data['profesor'] = $model->find($id_profesor);

        if ($data['profesor']) {
            $coste = $data['profesor']['coste'];
        } else {
            // Manejar el caso donde el profesor no fue encontrado
        }

        $session = session();
        $id_usuario = $session->get('id');

        $profesorCompradoModel = new ProfesorCompradoModel();
        $datosCompra = [
            'id_usuario' => $id_usuario,
            'id_profesor' => $id_profesor,
            'coste' => $coste,
        ];

        $profesorCompradoModel->insert($datosCompra);

        return view('panel_cliente', $data);
    }
    public function eliminarProfesor($id_profesor)
{
    // Obtén el ID del usuario desde la sesión o de donde sea necesario
    $id_usuario = session()->get('id');

    // Aquí deberías realizar la lógica para eliminar al profesor de la base de datos
    $model = new RutinaModel();

    // Ajusta la condición de eliminación para que coincida con tu estructura de la tabla
    $result = $model->where(['id' => $id_usuario, 'id_profesor' => $id_profesor])->delete();

    // Limpiar la sesión del profesor
    $session = session();
    $session->remove('id_profesor');

    // Responde con JSON (puedes ajustar según tus necesidades)
    return $this->response->setJSON(['success' => $result]); // Devuelve el resultado de la eliminación
}

public function salirDelPanel()
{
    return redirect()->to(base_url('/inicio'));
}




}
