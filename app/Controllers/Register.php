<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Register extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function do_register()
    {
        $userModel = new UserModel();

        $nombre = $this->request->getPost('nombre');
        $email = $this->request->getPost('email');
        $contrasena = $this->request->getPost('contrasena');
        $usuario = $this->request->getPost('usuario');
        $direccion = $this->request->getPost('direccion');
        $codigopostal = $this->request->getPost('codigo_postal');
        $telefono = $this->request->getPost('telefono');
        $tipo = $this->request->getPost('tipo');

        // Validar que el tipo sea un valor permitido (0 o 2)
        if (!in_array($tipo, ['0', '2'])) {
            return redirect()->to(base_url('/register'))->with('mensaje', 'Valor de tipo no permitido.');
        }

        $existingUser = $userModel->where('usuario', $usuario)->first();

        if ($existingUser) {
            return redirect()->to(base_url('/register'))->with('mensaje', 'El nombre de usuario ya está en uso.');
        } else {
            $contrasena = password_hash($contrasena, PASSWORD_BCRYPT);

            $data = [
                'nombre' => $nombre,
                'email' => $email,
                'contrasena' => $contrasena,
                'usuario' => $usuario,
                'direccion' => $direccion,
                'codigo_postal' => $codigopostal,
                'telefono' => $telefono,
                'tipo' => $tipo,
            ];

            $result = $userModel->insert($data);

            if ($result) {
                return redirect()->to(base_url('/login'))->with('mensaje', 'Usuario registrado correctamente');
            } else {
                return redirect()->to(base_url('/register'))->with('mensaje', 'Error al registrar el usuario');
            }
        }
    }
}
