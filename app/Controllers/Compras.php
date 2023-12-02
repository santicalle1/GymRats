<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\DireccionModel;
use App\Models\ComprasModel;
use App\Models\DetalleCompraModel;
use App\Models\CalleModel;
use App\Models\BarrioModel;
use App\Models\CiudadModel;
use App\Models\ProvinciaModel;
use App\Models\CarritoModel;
use App\Models\ProductoModel;

class Compras extends BaseController
{

    public function index()
    {
        return view('compras'); // Asegúrate de tener una vista llamada 'compras.php'
    }

    public function procesarCompra()
    {
        $direccionModel = new DireccionModel();
        $compraModel = new ComprasModel();
        $detallecompraModel = new DetalleCompraModel();
        $calleModel = new CalleModel();
        $barrioModel = new BarrioModel();
        $ciudadModel = new CiudadModel();
        $provinciaModel = new ProvinciaModel();
        $carritoModel = new CarritoModel();
        $productoModel = new ProductoModel();

        $provincia = $this->request->getPost('provincia');
        $ciudad = $this->request->getPost('ciudad');
        $nombre = $this->request->getPost('barrio');
        $calle = $this->request->getPost('calle');
        $numero_calle = $this->request->getPost('numero_calle');
        $codigo_postal = $this->request->getPost('codigo_postal');
        $descripcion_casa = $this->request->getPost('descripcion_casa');
        $total = $this->request->getPost('total');
        
    
    // Insertar provincia
    $id_provincia = $provinciaModel->insertProvincia($provincia);

    // Insertar ciudad
    $id_ciudad = $ciudadModel->insertCiudad($ciudad, $id_provincia, $codigo_postal);

    // Insertar barrio
    $id_barrio = $barrioModel->insertBarrio($id_ciudad, $nombre);

    // Insertar calle
    $id_calle = $calleModel->insertCalle($calle);
    
    $id= session()->get('id');
    // Insertar dirección y guardar la id en $id_direccion
    $id_envio = $direccionModel->insertDireccion($id, $id_ciudad, $id_calle, $numero_calle, $codigo_postal, $id_barrio, $descripcion_casa);

    // $cantidad = $carritoModel->select('cantidad')
    // ->where('id', $id)
    // ->first();

    // $id_producto = 1;
    // $precio_unitario = 1;


    $id_compra = $compraModel->insertCompra($total, $id, $id_envio, $id_calle, $id_ciudad, $numero_calle);

    $idCarritoProducto = $carritoModel->obteneridcarrito($id);

    foreach ($idCarritoProducto as $idCarritoProducto) {
      
        $idCarrito = $idCarritoProducto['id_carrito'];
        $id_producto = $idCarritoProducto['id_producto'];
        $cantidad = $idCarritoProducto['cantidad'];

        // Obtener información del producto directamente en el bucle
        $productoActualizado = $productoModel->find($id_producto);

        // Actualizar el stock del producto
    $nuevoStock = $productoActualizado['stock'] - $cantidad;
    $productoModel->update(['id_producto' => $id_producto], ['stock' => $nuevoStock]);

        // Obtener la cantidad del producto en el carrito
        $cantidad = $carritoModel->select('cantidad')
            ->where('id', $id)
            ->where('id_producto', $id_producto)
            ->first();

        $precio_unitario = $productoActualizado['precio'];

        // Insertar detalle de compra
        $id_detalle = $detallecompraModel->insertDetalle($id_producto, $id_compra, $id, $cantidad, $precio_unitario);              

        $id_carrito = $idCarritoProducto['id_carrito'];
        $carritoModel -> eliminarcarrito($id_carrito);

    }
    return view('inicio');

}
}
