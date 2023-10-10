<?php
namespace App\Models;

use CodeIgniter\Model;

class ItemModel extends Model
{
    protected $table = 'clientes';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre', 'email', 'contrasena', 'usuario', 'direccion', 'codigo_postal', 'telefono', 'tipo'];

    // Recuperar todos los registros de la tabla clientes
    public function getAllItems()
    {
        return $this->findAll();
    }
    public function fetchNonAdminUsers() {
        return $this->where('tipo !=', 1)->findAll();
    }
    
    
}
