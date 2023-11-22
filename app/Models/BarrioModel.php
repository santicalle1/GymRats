<?php 
namespace App\Models;

use CodeIgniter\Model;

class BarrioModel extends Model{
    protected $table      = 'barrio';
    // Uncomment below if you want add primary key
     protected $primaryKey = 'id_barrio';
     protected $allowedFields = ['nombre', 'id_ciudad'];

     public function insertBarrio($id_ciudad, $nombre)
     {
        return $this->insert(['id_ciudad' => $id_ciudad, 'nombre' => $nombre]);
     }
}