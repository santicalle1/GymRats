<?php

namespace App\Controllers;

use App\Models\ContactModel;
use CodeIgniter\Controller;

class Mensajes extends Controller
{
    public function index()
    {
        // Cargar todos los mensajes desde la base de datos
        $model = new ContactModel();
        $data['mensajes'] = $model->findAll();

        return view('mensajes', $data);
    }

    public function guardarMensaje()
    {
        $model = new ContactModel();

        $data = [
            'email' => $this->request->getPost('email'),
            'motivo' => $this->request->getPost('subject'),
            'mensaje' => $this->request->getPost('message')
        ];

        if ($model->insert($data)) {
            session()->setFlashdata('success', '¡El mensaje se ha enviado exitosamente!');
        }

        return redirect()->to(base_url('inicio'));
    }

    public function eliminar($id)
    {
        // Eliminar un mensaje en la base de datos por su ID
        $model = new ContactModel();
        $model->delete($id);

        // Redirigir de nuevo a la página de mensajes
        return redirect()->to(base_url('mensajes'));
    }
}
