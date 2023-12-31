<?php

namespace App\Controllers;

use App\Models\CarritoModel;
use App\Models\ProductoModel;

class ProductoController extends BaseController
{
    public function agregar()
    {
        $model = new ProductoModel();
        
        if ($this->request->getMethod() === 'post') {
            $imagen = $this->request->getFile('imagen');
            $descuento = $this->request->getPost('descuento');
            $precioOriginal = $this->request->getPost('precio');
            
            if ($descuento) {
                $precioConDescuento = $precioOriginal * (1 - ($descuento / 100));
            } else {
                $precioConDescuento = $precioOriginal;
            }  
            if ($imagen && $imagen->isValid() && !$imagen->hasMoved()) {
                $newName = $imagen->getRandomName();
                $imagen->move(ROOTPATH . 'public/uploads', $newName);
                
                $data = [
                    'nombre' => $this->request->getPost('nombre'),
                    'precio' => $precioConDescuento,
                    'stock' => $this->request->getPost('stock'),
                    'imagen' => 'uploads/' . $newName,
                    'descripcion' => $this->request->getPost('descripcion'),
                    'categoria' => $this->request->getPost('categoria'),
                    'descuento' => $descuento
                ];
                
                $model->insert($data);
                
                // Redirigir a una vista específica según la categoría del producto
                switch ($data['categoria']) {
                    case 'oferta':
                        return redirect()->to('/tienda');
                    case 'suplementos':
                        return redirect()->to('/suplementos');
                    case 'gimnasio':
                        return redirect()->to('/objetosgym');
                    case 'merchandising':
                        return redirect()->to('/ropa');
                }
            } else {
                session()->setFlashdata('error', 'Hubo un error al subir la imagen.');
            }
        }
        
        return view('agregar_productos');
    }
   
}
