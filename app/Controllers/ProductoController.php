<?php

namespace App\Controllers;

use App\Models\CompraModel;
use App\Models\DetalleCompraModel;
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

    public function agregarAlCarrito($id_producto) {
        $modelProductos = new ProductoModel();
        $producto = $modelProductos->find($id_producto);

if (!$producto) {
    // Producto no encontrado
    return redirect()->back()->with('error', 'Producto no encontrado');
}

$session = \Config\Services::session();

if ($session->has('id')) {
    $idUsuario = $session->get('id');
} else {
    // Maneja la situación en que el ID del usuario no está definido
    // Por ejemplo, redirige al usuario a la página de inicio de sesión
    return redirect()->to(base_url('login'));
}

$detalleCompraModel = new DetalleCompraModel();

$id_compra = 1;  // Valor temporal
$id_metodo_pago = 1;  // Valor temporal
$cantidad = 1;  
$subtotal = $producto['precio'];  

$data = [
    'id_producto' => $id_producto,
    'id_compra' => $id_compra,
    'id' => $idUsuario,
    'id_metodo_pago' => $id_metodo_pago,
    'cantidad' => $cantidad,
    'subtotal' => $subtotal
];
$detalleCompraModel->insert($data);


        
    
        return redirect()->to(base_url('verCarrito'));
    }
    
    public function verCarrito() {
        $modelDetalleCompra = new DetalleCompraModel();
        $productosCarrito = $modelDetalleCompra->where('id', $_SESSION['id'])->findAll();
    
        echo view('carrito', ['productos' => $productosCarrito]);
    }
    
    public function realizarCompra() {
        $session = \Config\Services::session();
    
        if (!$session->has('id')) {
            // Si el usuario no está registrado, redirígelo a la página de inicio de sesión
            return redirect()->to(base_url('login'));
        }
    
        $idUsuario = $session->get('id');
        
        // Aquí puedes agregar lógica para calcular el total, por ejemplo, sumar todos los subtotales en el carrito.
        $total = 1;
    
        $compraModel = new CompraModel();
        $compraData = [
            'fecha' => date("Y-m-d H:i:s"),
            'total' => $total,
            'metodo_pago' => 'Ejemplo', // Ajusta esto según tu necesidad
            'id' => $idUsuario,
            'estado' => 1 // Ejemplo de estado
        ];
    
        $id_compra = $compraModel->insert($compraData);
    
        // Aquí podrías redirigir al usuario a una página de confirmación, o cualquier otro flujo que desees.
        return redirect()->to(base_url('confirmacionCompra'));
    }
    

   
}
