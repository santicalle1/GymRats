<?php

namespace App\Controllers;

use App\Models\ItemModel;

class Items extends BaseController
{
    public function index()
    {
        $model = new ItemModel();
        $data['items'] = $model->findAll(); // Cambiado de 'clientes' a 'items'
        $data['items'] = $model->fetchNonAdminUsers();
        return view('items_view', $data);
    }

    public function edit($id = null)
    {
        $model = new ItemModel();
        $data['item'] = $model->find($id);
        return view('items_edit', $data);
    }

    public function delete($id = null)
    {
        $model = new ItemModel();
        
        if($id !== null && $model->find($id)) {  // Verificar si el usuario existe antes de intentar eliminar
            $model->delete($id);
            session()->setFlashdata('success', 'Usuario eliminado exitosamente');  // Puedes agregar mensajes flash para mostrar notificaciones.
        } else {
            session()->setFlashdata('error', 'No se pudo encontrar el usuario');  // Mensaje en caso de error.
        }
    
        return redirect()->to('/items_view');  // Redirige de vuelta al listado principal.
    }
    
    public function update($id = null)
{
    $model = new ItemModel();

    // Obtener los datos del formulario
    $data = [
        'nombre' => $this->request->getPost('nombre'),
        'email' => $this->request->getPost('email'),
        'contrasena' => $this->request->getPost('contrasena'),
        'usuario' => $this->request->getPost('usuario'),
        'direccion' => $this->request->getPost('direccion'),
        'codigo_postal' => $this->request->getPost('codigo_postal'),
        'telefono' => $this->request->getPost('telefono'),
        'tipo' => $this->request->getPost('tipo')
    ];

    // Actualizar los datos en la base de datos
    $model->update($id, $data);

    // Redirige al usuario a items_view
    return redirect()->to('/items_view');
}


}
