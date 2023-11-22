<?php

namespace App\Models;

use CodeIgniter\Model;

class ComprasModel extends Model
{
    protected $table = 'compras';
    protected $primaryKey = 'id_compra';
    protected $allowedFields = ['fecha', 'total', 'id_metodo_pago', 'id', 'estado', 'id_envio', 'id_calle', 'id_ciudad', 'numero_calle'];


    public function insertCompra($total, $id, $id_envio, $id_calle, $id_ciudad, $numero_calle)
    {
        return $this->insert([
            'fecha' => date('Y-m-d H:i:s'),
            'total' => $total,
            'id_metodo_pago' => 1,
            'id' => $id,
            'estado' => 1,
            'id_envio' => $id_envio,
            'id_calle' => $id_calle,
            'id_ciudad' => $id_ciudad,
            'numero_calle' => $numero_calle
        ]);
    }
}
