<?php

namespace App\Models;

use CodeIgniter\Model;

class RutinaModel extends Model
{
    protected $table = 'rutinas';
    protected $primaryKey = 'id_rutina';
    protected $allowedFields = ['nombre_rutina','descripcion', 'duracion', 'dificultad', 'descargas', 'id', 'id_profesor', 'tipo_rutina'];

    public function obteneridprofe($id_usuario)
    {
        $query = $this->select('rutinas.id_profesor')
            ->join('clientes', 'clientes.id = rutinas.id')
            ->where('clientes.id', $id_usuario)
            ->get();
    
        // Obtener directamente el valor de id_profesor si existe
        $result = $query->getRow();
        $id_profesor = $result ? $result->id_profesor : null;
    
        return $id_profesor;
    }

}