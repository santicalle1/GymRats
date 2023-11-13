<?php

namespace App\Controllers;

use App\Models\Panel_Cliente;

class Clientpanel extends BaseController
{
    public function profile()
    {
        $model = new Panel_Cliente();
        
        // Obtener el ID del usuario de la sesión
        $session = session();
        $id = $session->get('id');
        // // Si no hay un ID de usuario en la sesión, redirigir al login
        // if (!$id) {
        //     return redirect()->to('/login');
        // }

        // Buscar los datos del usuario en la base de datos
        $userData = $model->getUserData($id);

        // Verificar si hay datos para el usuario
        if (!$userData) {
            return "No se encontraron datos del usuario";  // Aquí puedes redirigir o mostrar un mensaje según lo que desees.
        }

        // Pasar los datos a la vista
        $data['userData'] = $userData;
        return view('panel_cliente', $data);
    }
}

