<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Compras extends BaseController
{ 
    public function index()
    {
        return view('compras');
    }


    public function procesarCompra($id_profesor) {
        // Verifica si el usuario ha iniciado sesión
        $id = session()->get('id');
        
        if (!$id) {
            return redirect()->to('/login')->with('error', 'Por favor, inicie sesión primero.');
        }
    
        // Aquí deberías agregar lógica para eliminar al profesor del conjunto general y agregarlo al conjunto de "mis profesores"
    
        // Redirige a la vista de mis profesores con el ID del profesor procesado
        return redirect()->to('/mis_profesores')->with('id_profesor', $id_profesor);
    }




    
}