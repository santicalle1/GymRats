<?php
namespace App\Controllers;

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

            } 
            return redirect()->to(base_url('panel_cliente'));

        } else {
            // Si no está logueado, redirigir a la página de inicio de sesión
            return redirect()->to(base_url('login'));
        }
        
        
    }
}