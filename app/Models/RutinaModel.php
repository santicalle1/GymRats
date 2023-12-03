<?php

namespace App\Models;

use CodeIgniter\Model;

class RutinaModel extends Model
{
    protected $table = 'rutinas';
    protected $primaryKey = 'id_rutina';
    protected $allowedFields = ['nombre_rutina', 'descripcion', 'duracion', 'dificultad', 'descargas', 'id', 'id_profesor', 'tipo_rutina'];

    public function obtenerProfesorPorIdRutina($id_rutina)
    {
        $query = $this->db->table('rutinas')
            ->select('profesores.*')
            ->join('profesores', 'profesores.id_profesor = rutinas.id_profesor')
            ->where('rutinas.id_rutina', $id_rutina)
            ->get();

        if ($query->getNumRows() > 0) {
            return $query->getRowArray();
        } else {
            // Retorna algo para indicar que no se encontraron resultados, puedes adaptar según tus necesidades
            return null;
        }
    }
    public function obtenerIdRutinaPorIdProfesor($id_profesor)
    {
        $query = $this->select('id_rutina')
            ->where('id_profesor', $id_profesor)
            ->get();

        return $query->getResultArray();
    }
}


