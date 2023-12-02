<?php

namespace App\Models;

use CodeIgniter\Model;

class Usuarios extends Model
{
    protected $table = 'clientes';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre', 'email', 'contrasena', 'usuario', 'direccion', 'codigo_postal', 'telefono', 'tipo'];

    public function obtenerUsuarioPorNombre($usuario)
    {
        return $this->where('usuario', $usuario)->first();
    }
    public function insert($data = null, bool $returnID = true)
    {
        if (isset($data['contrasena'])) {
            $data['contrasena'] = password_hash($data['contrasena'], PASSWORD_DEFAULT);
        }

        return parent::insert($data, $returnID);
    }
    public function esAdmin($usuario)
    {
        $result = $this->select('tipo')->where('usuario', $usuario)->first();
        return isset($result['tipo']) && $result['tipo'] == 1;
    }

    public function esProfesor($usuario)
    {
        $result = $this->select('tipo')->where('usuario', $usuario)->first();
        return isset($result['tipo']) && $result['tipo'] == 2;
    }

}
