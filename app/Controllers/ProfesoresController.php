<?php

namespace App\Controllers;

use App\Models\ProductoModel;
use App\Models\ProfesoresModel;
use App\Models\UserModel;
use App\Models\ProfesorCompradoModel;
use App\Models\RutinaModel;
use App\Models\SolicitudModel;
use App\Models\DescripcionRutina;
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

        $session = session();
        $session->set('id_profesor', $id_profesor);

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

        if (!$data['profesor']) {
            // Manejar el caso donde el profesor no fue encontrado
            return redirect()->to(base_url('/inicio'))->with('mensaje', 'Profesor no encontrado');
        }

        // Guardar los detalles del profesor en una cookie
        $this->response->setCookie('profesor_comprado', json_encode($data['profesor']), 3600); // La cookie expirará en una hora

        $coste = $data['profesor']['coste'];

        $session = session();
        $id_usuario = $session->get('id');

        // Obtener los detalles del profesor comprado
        $profesorModel = new ProfesoresModel();
        $data['profesor'] = $profesorModel->find($id_profesor);

        // Guardar todos los detalles del profesor en la sesión
        $session->set('profesor_comprado', $data['profesor']);

        // Nuevo código para insertar en la tabla rutinas
        $rutinaModel = new RutinaModel();
        $datosRutina = [
            'id_usuario' => $id_usuario,
            'id_profesor' => $id_profesor,
            'tipo_rutina' => 1,
            // ... otros campos de la rutina ...
        ];

        // Obtén los detalles del profesor comprado
        $profesorModel = new ProfesoresModel();
        $data['profesor'] = $profesorModel->find($id_profesor);

        // Guardar todos los detalles del profesor en la sesión
        $session = session();
        $session->set('profesor_comprado', $data['profesor']);

        // Redirige a la vista de panel_cliente con los detalles necesarios
        return view('panel_cliente', $data);
    }

    public function panelCliente()
    {
        // Obtener los detalles del profesor desde la cookie
        $profesorCookie = $this->request->getCookie('profesor_comprado');

        if (!$profesorCookie) {
            // Si no hay detalles del profesor en la cookie, redirige o maneja la situación de otra manera
            return redirect()->to(base_url('/inicio'))->with('mensaje', 'No se encontró información del profesor en la cookie');
        }

        $profesor = json_decode($profesorCookie, true);

        // Obtener los datos del usuario (reemplaza esto con la lógica real según tu implementación)
        $userModel = new UserModel();
        $id_usuario = $userModel->find(session()->get('id'));

        $data['userData'] = $id_usuario;
        $data['profesor'] = $profesor;

        return view('panel_cliente', $data);
    }

    public function eliminarProfesor($id_profesor)
    {
        // Obtén el ID del usuario desde la sesión o de donde sea necesario
        $id_usuario = session()->get('id');
    
        // Obtén el id_rutina de la tabla rutina
        $rutinaModel = new RutinaModel();
        $rutina = $rutinaModel->where(['id' => $id_usuario, 'id_profesor' => $id_profesor])->first();
    
        if ($rutina) {
            $id_rutina = $rutina['id_rutina'];
    
            // Aquí deberías realizar la lógica para eliminar el detalle de la rutina
            $detalleModel = new DescripcionRutina();
            $detalleModel->where('id_rutina', $id_rutina)->delete();
    
            // Luego, elimina el registro en la tabla rutina
            $result = $rutinaModel->where(['id' => $id_usuario, 'id_profesor' => $id_profesor])->delete();
    
            $session = session();
            $session->remove('id_profesor');
    
            // Responde con JSON (puedes ajustar según tus necesidades)
            return $this->response->setJSON(['success' => $result]); // Devuelve el resultado de la eliminación
        }
    
        // Retorna un mensaje indicando que no se encontró la rutina
        return $this->response->setJSON(['error' => 'No se encontró la rutina correspondiente al profesor']);
    }
    

    public function salirDelPanel()
    {
        return redirect()->to(base_url('/inicio'));
    }
    public function solicitarRutina($idProfesor)
    {

        // Aquí puedes agregar la lógica para manejar la solicitud de rutina
        // Guardar la solicitud en la base de datos, enviar una notificación al profesor, etc.

        // Por ejemplo, puedes almacenar la solicitud en la base de datos
        $solicitudModel = new SolicitudModel();
        $data = [
            'id_profesor' => $idProfesor,
            'id' => session()->get('id'),
            // Otros datos de la solicitud que puedas necesitar
        ];
        $solicitudModel->insert($data);

        // Puedes devolver una respuesta JSON si lo necesitas
        return redirect()->to('inicio');
    }

    public function manejarSolicitudRutina($idProfesor, $idUsuario)
    {
        // Lógica para manejar la solicitud de rutina (guardar en la base de datos, etc.)
        $db = \Config\Database::connect();

        // Guarda la solicitud en la base de datos
        $db->table('solicitudes')->insert([
            'id_profesor' => $idProfesor,
            'id_usuario' => $idUsuario,
            'estado' => 'pendiente', // Puedes usar estados como 'pendiente', 'aceptada', 'rechazada', etc.
        ]);

        return $this->response->setJSON(['success' => true]);
    }



}
