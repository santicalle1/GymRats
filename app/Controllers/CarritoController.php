<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\CarritoModel;

class CarritoController extends BaseController
{
    public function index()
    {
        $userId = session()->get('id');
        if (!$userId) {
            return redirect()->to('/login')->with('error', 'Por favor, inicie sesión primero.');
        }
        $model = new CarritoModel();
        $productosCarrito = $model->obtenerProductosCarrito($userId);

        return view('carrito', ['productos' => $productosCarrito]);
    }
    
    public function agregarAlCarrito() 
    {
        $userId = session()->get('id');
        if (!$userId) {
            return redirect()->to('/login')->with('error', 'Por favor, inicie sesión primero.');
        }
    
        $id_producto = $this->request->getPost('id_producto');
        $cantidad = $this->request->getPost('cantidad');
    
        // Validamos la cantidad
        if (empty($cantidad)) {
            return redirect()->back()->with('error', 'La cantidad no puede estar vacía.');
        }
    
        $data = [
            'id' => $userId,
            'id_producto' => $id_producto,
            'cantidad' => $cantidad
        ];
    
        $model = new CarritoModel();
        $result = $model->agregarAlCarrito($data);
    
        if($result) {
            return redirect()->to('/carrito');
        } else {
            return redirect()->back()->with('error', 'No se pudo agregar el producto al carrito.');
        }
    }
    public function eliminarProducto() {
        $id = session()->get('id');
        if (!$id) {
            return redirect()->to('/login')->with('error', 'Por favor, inicie sesión primero.');
        }
    
        $id_producto = $this->request->getPost('id_producto');
    
        $model = new CarritoModel();
        $model->eliminarProductoDelCarrito($id, $id_producto);
    
        return redirect()->to('/carrito');
    }
    
    public function vaciarCarrito() {
        $id = session()->get('id');
        if (!$id) {
            return redirect()->to('/login')->with('error', 'Por favor, inicie sesión primero.');
        }
        
        $model = new CarritoModel();
        $model->vaciarProductosDelCarrito($id);
        
        return redirect()->to('/carrito');
    }
    
    

}