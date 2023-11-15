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
    
        $model = new CarritoModel();

        // Verificamos si el producto ya está en el carrito del usuario
        $productoEnCarrito = $model->where('id', $userId)
                                   ->where('id_producto', $id_producto)
                                   ->first();
    
        if ($productoEnCarrito) {
            // Producto ya en el carrito, puedes mostrar un mensaje de error o realizar otra acción
            return redirect()->back()->with('error', 'Este producto ya está en tu carrito.');
        }

        $data = [
            'id' => $userId,
            'id_producto' => $id_producto,
            'cantidad' => $cantidad
        ];
    
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
    
    public function updateCantidad($idCarrito)
    {
        $data = []; // Aquí debes realizar la lógica para actualizar la cantidad en la base de datos
        // Supongamos que ya has actualizado la cantidad y ahora quieres devolver la nueva información del producto
        return $this->response->setJSON(['success' => true, 'data' => $data]);
    }

    public function confirmarCarrito(){
        $Total= $this->request->getPost('TOTAL');
        //echo($Total);
        return view ('/compras',['TOTAL' => $Total]);

    }

}