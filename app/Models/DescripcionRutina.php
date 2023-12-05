<?php

namespace App\Models;

use CodeIgniter\Model;

class DescripcionRutina extends Model
{
    protected $table = 'detalle_rutina';
    protected $primaryKey = 'id_detalle_rutina';
    protected $allowedFields = ['id_rutina', 'ejercicios', 'repeticiones', 'series', 'peso'];
}
