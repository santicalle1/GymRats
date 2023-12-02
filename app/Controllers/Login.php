<?php
namespace App\Controllers;

use App\Models\Usuarios;

class Login extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function verificar()
    {
        $usuario = $this->request->getPost('usuario');
        $contrasena = $this->request->getPost('contrasena');

        $usuariosModel = new Usuarios();
        $usuarioEncontrado = $usuariosModel->obtenerUsuarioPorNombre($usuario);

        if ($usuarioEncontrado && password_verify($contrasena, $usuarioEncontrado['contrasena'])) {
            $session = session();
            $session->set('nombre', $usuarioEncontrado['nombre']);
            $session->set('usuario', $usuarioEncontrado['usuario']);
            $session->set('tipo', $usuarioEncontrado['tipo']);
            $session->set('id', $usuarioEncontrado['id']);
            $session->set('email', $usuarioEncontrado['email']);

            return redirect()->to(base_url('inicio'));
        } else {
            return redirect()->to(base_url('login'))->with('mensaje', 'Credenciales incorrectas');
        }
    }
}
