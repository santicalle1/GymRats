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
                
                return redirect()->to('panel_admin');
            } else {
                session()->setFlashdata('error', 'Hubo un error al subir la imagen.');
            }
        }
        
        return view('agregar_productos');
    }
}
