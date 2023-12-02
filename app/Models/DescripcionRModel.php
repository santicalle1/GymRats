<?php

namespace App\Models;
use CodeIgniter\Model;

class Rutina extends Model
{
    protected $table = 'rutinas';
    protected $primaryKey = 'id_rutina';
    protected $allowedFields = ['nombre_rutina', 'descripcion', 'duracion ', 'dificultad', 'descargas', 'id','id_profesor', 'tipo_rutina'];
}

class DescripcionRutina extends model{
    protected $table = 'detalle_rutina';
    protected $primaryKey = 'id_detalle_rutina';
    protected $allowedfields = ['id_rutina', 'ejercicios', 'repeticiones', 'series', 'peso'];
}

