<?php

namespace App\Controllers;

use App\Models\ProductoModel;

class Tienda extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new ProductoModel();
    }

    public function index()
    {
        $productos = $this->model->getProductosPorCategoria('oferta');
        return view('tienda', ['productos' => $productos]);
    }

    public function detalles($id)
    {
        $producto = $this->model->find($id);

        if (!$producto) {
            return redirect()->to('tienda');
        }

        $productos = $this->model->findAll();
        return view('tienda', ['producto' => $producto, 'productos' => $productos]);
    }

    public function oferta()
    {
        $productos = $this->model->getProductosPorCategoria('oferta');
        return view('tienda', ['productos' => $productos]);
    }

    public function suplementos()
    {
        $productos = $this->model->getProductosPorCategoria('suplementos');
        return view('suplementos', ['productos' => $productos]);
    }

    public function objetosgym()
    {
        $productos = $this->model->getProductosPorCategoria('gimnasio');
        return view('objetosgym', ['productos' => $productos]);
    }

    public function merchandising()
    {
        $productos = $this->model->getProductosPorCategoria('merchandising');
        return view('ropa', ['productos' => $productos]);
    }

    public function agregarAlCarrito()
    {
        $idProducto = $this->request->getPost('id_producto');
        $cantidad = $this->request->getPost('cantidad');

        if ($cantidad <= 0) {
            return redirect()->back()->with('error', 'La cantidad debe ser mayor que cero.');
        }

        // Realiza la verificación de stock antes de intentar agregar al carrito
        $verificacionStock = $this->model->verificarStock($idProducto, $cantidad);

        if ($verificacionStock['success']) {
            // Verificación de stock exitosa, ahora agrega al carrito
            $this->model->agregarAlCarrito($idProducto, $cantidad);

            // Luego, resta la cantidad del stock en la tienda
            $this->model->restarStockTienda($idProducto, $cantidad);

            // Actualiza la cantidad en carrito en la base de datos (esto ya está en el modelo)
            $this->model->actualizarCantidadEnCarrito($idProducto, $cantidad);

            return redirect()->to('carrito')->with('success', 'Producto agregado al carrito.');
        } else {
            return redirect()->back()->with('error', $verificacionStock['message']);
        }
    }

    public function verificarStock($idProducto, $cantidad)
    {
        $nuevaCantidad = $this->model->actualizarCantidad($idProducto, $cantidad);

        if ($nuevaCantidad >= 0) {
            // Resta la cantidad del stock en la tienda
            $this->model->restarStockTienda($idProducto, $cantidad);

            return $this->response->setJSON(['success' => true]);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'No hay suficiente stock disponible.']);
        }
    }

}
