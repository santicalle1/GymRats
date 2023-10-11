<?php

namespace App\Controllers;
use App\Models\ProductoModel;

class Tienda extends BaseController
{
    public function index()
    {
        $model = new ProductoModel();
        $productos = $model->findAll();  // Obtener todos los productos

        return view('tienda', ['productos' => $productos]);
    }

    public function detalles($id)
    {
        $model = new ProductoModel();
        
        // Obtiene los datos del producto usando el ID proporcionado
        $producto = $model->find($id);
    
        // Si el producto no existe, redirige o muestra un error
        if (!$producto) {
            return redirect()->to('tienda');  // Si no se encuentra el producto, redirige de nuevo a la lista de productos.
        }
    
        $productos = $model->findAll();  // Obtener todos los productos
        
        // Pasa los datos del producto a una vista de detalles (suponiendo que tengas una vista separada para detalles)
        return view('tienda', ['producto' => $producto, 'productos' => $productos]);
    }
    
}



