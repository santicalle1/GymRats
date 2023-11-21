<?php

namespace App\Controllers;

use App\Models\ProductoModel;
use App\Models\ProfesoresModel;
use App\Models\ProfesorCompradoModel;
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

    public function index()
    {
        $model = new ProfesoresModel();
        $data['profesores'] = $model->findAll();
        return view('profesores', $data);
    }
    public function procesarCompra($id_profesor)
    {
        // Lógica para procesar la compra

        // Obtén los detalles del profesor
        $model = new ProfesoresModel();
        $data['profesor'] = $model->find($id_profesor);

        // Asegúrate de que el profesor fue encontrado antes de intentar acceder al costo
        if ($data['profesor']) {
            $coste = $data['profesor']['coste'];

            // Puedes hacer algo con el costo aquí si es necesario
        } else {
            // Manejar el caso donde el profesor no fue encontrado
        }

        // Obtén el ID del usuario desde la sesión
        $session = session();
        $id_usuario = $session->get('id');

        // Realiza la inserción en la tabla profesor_comprado
        $profesorCompradoModel = new ProfesorCompradoModel();
        $datosCompra = [
            'id' => $id_usuario,
            'id_profesor' => $id_profesor,
            'coste' => $coste,

            // Otros campos relacionados con la compra si es necesario
        ];

        $profesorCompradoModel->insert($datosCompra);

        // Puedes realizar otras acciones relacionadas con la compra aquí

        // Carga la vista panel_cliente con los datos del profesor
        return view('panel_cliente', $data);
    }
}