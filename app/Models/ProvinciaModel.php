<?php 
namespace App\Models;

use CodeIgniter\Model;

class ProvinciaModel extends Model{
    protected $table      = 'provincia';
    // Uncomment below if you want add primary key
     protected $primaryKey = 'id_provincia';
     protected $allowedFields = ['provincia'];

     public function insertProvincia($provincia)
     {
        return $this->insert(['provincia' => $provincia]);
     }
}