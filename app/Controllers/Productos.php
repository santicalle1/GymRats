<?php

namespace App\Controllers;

use App\Models\ProductoModel;

class Productos extends BaseController
{
    public function index()
    {
        $model = new ProductoModel();
        $data['products'] = $model->findAll();
        return view('products_view', $data);
    }

    public function edit($id = null)
    {
        $model = new ProductoModel();
        $data['product'] = $model->find($id);
        return view('products_edit', $data);
    }

    public function delete($id = null)
    {
        $model = new ProductoModel();
        
        if ($id !== null && $model->find($id)) {
            $model->delete($id);
            session()->setFlashdata('success', 'Producto eliminado exitosamente');
        } else {
            session()->setFlashdata('error', 'No se pudo encontrar el producto');
        }
    
        return redirect()->to('/products_view');
    }
    
    public function update($id = null)
    {
        $model = new ProductoModel();

        // Obtener los datos del formulario
        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('descripcion'),
            'precio' => $this->request->getPost('precio'),
            'stock' => $this->request->getPost('stock'),
            'imagen' => $this->request->getPost('imagen'),
            'categoria' => $this->request->getPost('categoria'),
            'descuento' => $this->request->getPost('descuento')
        ];

        // Actualizar los datos en la base de datos
        $model->update($id, $data);

        // Redirige al usuario a products_view
        return redirect()->to('/products_view');
    }
}
