<?php

// namespace App\Controllers;

// use App\Models\Usuarios;

// class Login extends BaseController
// {
//     public function index()
//     {
//         return view('login');
//     }

//     public function verificar()
//     {
//         $usuario = $this->request->getPost('usuario');
//         $contrasena = $this->request->getPost('contrasena');
    
//         $usuariosModel = new Usuarios();
//         $usuarioEncontrado = $usuariosModel->obtenerUsuarioPorNombre($usuario);
    
//         if ($usuarioEncontrado && password_verify($contrasena, $usuarioEncontrado['contrasena'])) {
//             // Iniciar sesión aquí si es necesario
//             $session = session();
//             $session->set('usuario', $usuarioEncontrado['usuario']);
//             $session->set('tipo', $usuarioEncontrado['tipo']);
//             $session->set('id', $usuarioEncontrado['id']);
    
//             $session = session();
//             $url_destino = $session->get('url_destino');

//         if ($url_destino) {
//             // Si hay una URL de destino guardada, redirigir al usuario allí
//             $session->remove('url_destino'); // Limpiar la URL de destino
//             return redirect()->to(base_url($url_destino));
//         } else {
//             // Si no hay URL de destino, redirigir a alguna página por defecto ('inicio' por ejemplo)
//             return redirect()->to(base_url('inicio'));
//         }
//     }
// }

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
            // Iniciar sesión aquí si es necesario
          
            session()->set('usuario', $usuarioEncontrado['usuario']);
            session()->set('tipo', $usuarioEncontrado['tipo']);
            session()->set('id', $usuarioEncontrado['id']);
    
            // Redirigir al usuario a la página deseada
            $pagina_destino = $this->request->getGet('pagina_destino'); // Obtén la página de destino de la URL
            if ($pagina_destino) {
                return redirect()->to(base_url($pagina_destino));
            } else {
                // Si no se especifica una página de destino, redirige a la página de inicio por defecto
                return redirect()->to(base_url('inicio'));
            }
        } else {
            return redirect()->to(base_url('login'))->with('mensaje', 'Credenciales incorrectas');
            // Credenciales incorrectas, mantener al usuario en la vista de login
        }
    }
    
}

