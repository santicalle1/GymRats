<?php 
namespace App\Models;

use CodeIgniter\Model;

class CiudadModel extends Model{
    protected $table      = 'ciudad';
    // Uncomment below if you want add primary key
     protected $primaryKey = 'id_ciudad';
     protected $allowedFields = ['ciudad', 'id_provincia', 'codigo_postal'];

     public function insertCiudad($ciudad, $id_provincia, $codigo_postal)
{
    return $this->insert(['ciudad' => $ciudad, 'id_provincia' => $id_provincia, 'codigo_postal' => $codigo_postal]);
}
}