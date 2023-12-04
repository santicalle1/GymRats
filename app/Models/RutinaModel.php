<?php

namespace App\Models;

use CodeIgniter\Model;

class RutinaModel extends Model
{
    protected $table = 'rutinas';
    protected $primaryKey = 'id_rutina';
    protected $allowedFields = ['nombre_rutina','descripcion', 'duracion', 'dificultad', 'descargas', 'id', 'id_profesor', 'tipo_rutina'];

}
