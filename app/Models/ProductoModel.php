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
}

