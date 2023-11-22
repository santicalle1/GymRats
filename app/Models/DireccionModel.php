<?php

namespace App\Models;

use CodeIgniter\Model;

class DireccionModel extends Model
{
    protected $table = 'direccion';
    protected $primaryKey = 'id_envio';
    protected $allowedFields = ['id', 'id_ciudad', 'id_calle', 'numero_calle', 'codigo_postal', 'id_barrio', 'descripcion_casa'];

    public function insertDireccion($id, $id_ciudad, $id_calle, $numero_calle, $codigo_postal, $id_barrio, $descripcion_casa)
    {
        return $this->insert([
            'id' => $id,
            'id_ciudad' => $id_ciudad,
            'id_calle' => $id_calle,
            'numero_calle' => $numero_calle,
            'codigo_postal' => $codigo_postal,
            'id_barrio' => $id_barrio,
            'descripcion_casa' => $descripcion_casa
        ]);
    }
}
