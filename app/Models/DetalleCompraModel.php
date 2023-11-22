<?php

namespace App\Models;

use CodeIgniter\Model;

class DetalleCompraModel extends Model
{
    protected $table = 'detalledecompra';
    protected $primaryKey = 'id_detalle';
    protected $allowedFields = ['id_producto', 'id_compra', 'id', 'cantidad', 'precio_unitario'];

    public function insertDetalle($id_producto, $id_compra, $id, $cantidad, $precio_unitario)
    {
        return $this->insert([
            'id_producto' => $id_producto,
            'id_compra' => $id_compra,
            'id' => $id,
            'cantidad' => $cantidad,
            'precio_unitario' => $precio_unitario
        ]);
    }
}
