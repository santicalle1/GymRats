<?php

namespace App\Controllers;
use App\Models\Usuarios;
use App\Models\ProfesoresModel;
use App\Models\UserModel;
class Panel extends BaseController
{

    public function panel()
    {
        session();
        $tipo = session()->get('tipo');
        if ($tipo == 0) {
            $id_profesor = session()->get('id_profesor');
            $id_usuario = session()->get('id_usuario');
            // Obtén los detalles del profesor comprado
   $profesorModel = new ProfesoresModel();
   $data['profesor'] = $profesorModel->find($id_profesor);
         // Obtén los datos del usuario (reemplaza esto con la lógica real según tu implementación)
    $userModel = new UserModel();
    $data['userData'] = $userModel->find($id_usuario);
    
    $session = session();
    $session->set('id_profesor', $id_profesor);

    // Redirige a la vista de panel_cliente con los detalles necesarios
    return view('panel_cliente', $data);
   // Guardar todos los detalles del profesor en la sesión
   $session = session();
   $session->set('profesor_comprado', $data['profesor']);

   // Redirige a la vista de panel_cliente con los detalles necesarios
   return view('panel_cliente', $data);
            return view('panel_cliente');
        } elseif ($tipo == 1) {
            return view('panel_admin');
        } else {
            return view('panel_profesores');
        }
    }
}
