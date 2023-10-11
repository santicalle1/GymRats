<?php

namespace App\Controllers;

use App\Models\ProductoModel;

class ProductoController extends BaseController
{
    public function agregar()
{
    $model = new ProductoModel();
    
    if ($this->request->getMethod() === 'post') {
        $imagen = $this->request->getFile('imagen');
        
        if ($imagen && $imagen->isValid() && !$imagen->hasMoved()) {
            $newName = $imagen->getRandomName();
            $imagen->move(ROOTPATH . 'public/uploads', $newName);
            
            $data = [
                'nombre' => $this->request->getPost('nombre'),
                'precio' => $this->request->getPost('precio'),
                'stock' => $this->request->getPost('stock'),
                'imagen' => 'uploads/' . $newName,
                'descripcion' => $this->request->getPost('descripcion'),
                'categoria' => $this->request->getPost('categoria')
            ];
            
            $model->insert($data);
            
            // Redirige al método que mostrará los detalles del producto
            return redirect()->to('/Tienda/detalles/' . $model->insertID());
        } else {
            session()->setFlashdata('error', 'Hubo un error al subir la imagen.');
        }
    }
    
    return view('agregar_productos');
}

// Función para mostrar los detalles del producto
public function detalles($id)
{
    $model = new ProductoModel();
    
    // Obtiene los datos del producto usando el ID proporcionado
    $producto = $model->find($id);

    // Si el producto no existe, redirige o muestra un error
    if (!$producto) {
        return redirect()->to('agregar_productos'); // o puedes mostrar un error.
    }

    // Pasa los datos del producto a la vista
    return view('tienda', ['productos' => $producto]);
}

}


