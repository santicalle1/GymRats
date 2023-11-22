<?php

namespace App\Controllers;
use App\Models\ProductoModel;

class Tienda extends BaseController
{
    protected $model;

    public function __construct() {
        $this->model = new ProductoModel();
    }

    public function index()
{
    $productos = $this->model->getProductosPorCategoria('oferta');  // Obtener solamente los productos en oferta
    return view('tienda', ['productos' => $productos]);
}


    public function detalles($id)
    {
        // Obtiene los datos del producto usando el ID proporcionado
        $producto = $this->model->find($id);
    
        // Si el producto no existe, redirige o muestra un error
        if (!$producto) {
            return redirect()->to('tienda');  // Si no se encuentra el producto, redirige de nuevo a la lista de productos.
        }
    
        $productos = $this->model->findAll();  // Obtener todos los productos
        
        // Pasa los datos del producto a una vista de detalles
        return view('tienda', ['producto' => $producto, 'productos' => $productos]);
    }
    public function oferta() {
        $productos = $this->model->getProductosPorCategoria('oferta');  
        return view('tienda', ['productos' => $productos]);
    }

    public function suplementos() {
        $productos = $this->model->getProductosPorCategoria('suplementos');  
        return view('suplementos', ['productos' => $productos]);
    }
    
    public function objetosgym() {
        $productos = $this->model->getProductosPorCategoria('gimnasio');  
        return view('objetosgym', ['productos' => $productos]);
    }
    
    public function merchandising() {
        $productos = $this->model->getProductosPorCategoria('merchandising');
        return view('ropa', ['productos' => $productos]);
    }
    
}





