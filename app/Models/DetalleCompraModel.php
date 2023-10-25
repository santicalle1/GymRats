<?php
namespace App\Models;

use CodeIgniter\Model;

class DetalleCompraModel extends Model
{
    protected $table = 'detalledecompra';
    protected $primaryKey = 'id_detalle';
    protected $allowedFields = ['id_producto', 'id_compra', 'id', 'id_metodo_pago', 'cantidad', 'subtotal'];
}