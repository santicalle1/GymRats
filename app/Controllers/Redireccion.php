<?php
namespace App\Controllers;

use App\Models\ContactModel;

namespace App\Controllers;

namespace App\Controllers;

class Redireccion extends BaseController {
    public function tienda($url) {
        $this->redirigirSiNoLogueado('tienda');
    }

    public function carrito($url) {
        $this->redirigirSiNoLogueado('carrito');
    }

    public function rutinas($url) {
        $this->redirigirSiNoLogueado('rutinas');
    }

    public function profesores($url) {
        $this->redirigirSiNoLogueado('profesores');
    }

    public function panel($url) {
        $session = session();
        $usuario = $session->get('usuario');
        $tipo = $session->get('tipo');

        if ($usuario) {
            echo $tipo;

            if ($tipo == 1) {
                // Es un administrador
                return redirect()->to(base_url('panel_admin'));
            }
            return redirect()->to(base_url('panel_cliente'));
        } else {
            $this->redirigirALogin();
        }
    }

    private function redirigirSiNoLogueado($destino) {
        $session = session();
        $usuario = $session->get('usuario');

        if ($usuario) {
            return redirect()->to(base_url($destino));
        } else {
            $this->redirigirALogin();
        }
    }

    private function redirigirALogin() {
        return redirect()->to(base_url('login'));
    }
}
