<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'clientes';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre', 'email', 'contrasena', 'usuario', 'direccion', 'codigo_postal', 'telefono', 'tipo', 'id_ciudad', 'id_calle', 'numero_calle', 'id_barrio', 'id_profesor'];

    public function crear($data)
    {
        return $this->insert($data);
    }
    public function obtenerUsuario($data)
    {
        $Usuario = $this->db->table('clientes');
        $Usuario->where($data);
        return $Usuario->get()->getRow();
    }
}
