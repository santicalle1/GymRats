<?php
namespace App\Controllers;

use App\Models\ContactModel;

class Redireccion extends BaseController
{
    public function tienda()
    {
        $session = session();
        $usuario = $session->get('usuario');

        if ($usuario) {
            // Si el usuario está logueado, redirigir a la vista de tienda
            return redirect()->to(base_url('tienda'));
        } else {
            // Si no está logueado, redirigir a la página de inicio de sesión
            return redirect()->to(base_url('login'));
        }
    }
    public function carrito()
    {
        $session = session();
        $usuario = $session->get('usuario');

        if ($usuario) {
            // Si el usuario está logueado, redirigir a la vista de tienda
            return redirect()->to(base_url('carrito'));
        } else {
            // Si no está logueado, redirigir a la página de inicio de sesión
            return redirect()->to(base_url('login'));
        }
    }
    public function rutinas()
    {
        $session = session();
        $usuario = $session->get('usuario');

        if ($usuario) {
            // Si el usuario está logueado, redirigir a la vista de rutinas
            return redirect()->to(base_url('rutinas'));
        } else {
            // Si no está logueado, redirigir a la página de inicio de sesión
            return redirect()->to(base_url('login'));
        }
    }

    

    public function profesores()
    {
        $session = session();
        $usuario = $session->get('usuario');

        if ($usuario) {
            // Si el usuario está logueado, redirigir a la vista de profesores
            return redirect()->to(base_url('profesores'));
        } else {
            // Si no está logueado, redirigir a la página de inicio de sesión
            return redirect()->to(base_url('login'));
        }
    }
    
    public function panel()
    {
        $session = session();
        $usuario = $session->get('usuario');
        $tipo = $session->get('tipo');
        $id = $session->get('id');

        
        if ($usuario) {
            // Si el usuario está logueado
            echo $tipo;
            
            if($tipo == 1) {
                // Es un administrador
                return redirect()->to(base_url('panel_admin'));

            } elseif ($tipo == 0) {
                // Es un cliente
                return redirect()->to(base_url('panel_cliente'));
            }
            return redirect()->to(base_url('panel_profesores'));
            
        } else {
            // Si no está logueado, redirigir a la página de inicio de sesión
            return redirect()->to(base_url('login'));
        }
        
        
    }
}
//namespace App\Controllers;

//use App\Models\ContactModel;

//namespace App\Controllers;

//namespace App\Controllers;

//class Redireccion extends BaseController {
//    public function tienda($url) {
//    $this->redirigirSiNoLogueado('tienda');
//    }

//     public function carrito($url) {
//         $this->redirigirSiNoLogueado('carrito');
//     }

//     public function rutinas($url) {
//         $this->redirigirSiNoLogueado('rutinas');
//     }

//     public function profesores($url) {
//         $this->redirigirSiNoLogueado('profesores');
//     }

//     public function panel($url) {
//         $session = session();
//         $usuario = $session->get('usuario');
//         $tipo = $session->get('tipo');

//         if ($usuario) {
//             echo $tipo;

//             if ($tipo == 1) {
//                 // Es un administrador
//                 return redirect()->to(base_url('panel_admin'));
//             }
//             return redirect()->to(base_url('panel_cliente'));
//         } else {
//             $this->redirigirALogin();
//         }
//     }

//     private function redirigirSiNoLogueado($destino) {
//         $session = session();
//         $usuario = $session->get('usuario');

//         if ($usuario) {
//             return redirect()->to(base_url($destino));
//         } else {
//             $this->redirigirALogin();
//         }
//     }

//     private function redirigirALogin() {
//         return redirect()->to(base_url('login'));
//     }
// }
