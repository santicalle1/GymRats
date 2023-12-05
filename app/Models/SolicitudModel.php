<?php
namespace App\Models;

use CodeIgniter\Model;

class SolicitudModel extends Model
{
    protected $table = 'solicitud';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id_solicitud';
    protected $allowedFields = ['id', 'id_profesor'];
}