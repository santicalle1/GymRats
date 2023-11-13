<?php

namespace App\Models;

use CodeIgniter\Model;

class Panel_Cliente extends Model
{
    protected $table = 'clientes';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre', 'email', 'contrasena', 'usuario', 'direccion', 'codigo_postal', 'telefono', 'tipo'];

    public function getUserData($id)
    {
        return $this->where('id', $id)->first();
    }
}

