<?php

namespace App\Models;
use CodeIgniter\Model;

class ProductoModel extends Model
{
    protected $table = 'producto';
    protected $primaryKey = 'id_producto';
    protected $allowedFields = ['nombre', 'precio', 'stock', 'imagen', 'descripcion', 'categoria', 'descuento'];

    public function getProductosPorCategoria($categoria) {
        return $this->where('categoria', $categoria)->findAll();
    }

// En tu modelo CarritoModel.php

public function restarStock($idProducto, $cantidad)
{
    // Obtén el stock actual del producto desde la base de datos
    $stockActual = $this->select('stock')->where('id_producto', $idProducto)->get()->getRow()->stock;

    // Calcula el nuevo stock
    $nuevoStock = $stockActual - $cantidad;

    // Actualiza el stock en la base de datos
    $this->where('id_producto', $idProducto)->update(['stock' => $nuevoStock]);

    return true;
}

public function actualizarCantidadEnCarrito($idProducto, $cantidad)
{
    // Obtén la cantidad en carrito actual del producto desde la base de datos
    $cantidadEnCarritoActual = $this->select('cantidad_en_carrito')->where('id_producto', $idProducto)->get()->getRow()->cantidad_en_carrito;

    // Calcula la nueva cantidad en carrito
    $nuevaCantidadEnCarrito = $cantidadEnCarritoActual - $cantidad;

    // Actualiza la cantidad en carrito en la base de datos
    $this->where('id_producto', $idProducto)->update(['cantidad_en_carrito' => $nuevaCantidadEnCarrito]);

    return true;
}

}

