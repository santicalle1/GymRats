<?php

namespace App\Models;

use CodeIgniter\Model;

protected $table = 'profesores';
    protected $primaryKey = 'id_profesor';
    protected $allowedFields = ['nombre','id', 'especialidad', 'fecha_de_contrato', 'titulos', 'horarios', 'telefono', 'coste', 'dificultad', 'imagen'];

class RutinaModel extends Model
{
    protected $table = 'rutinas';
    protected $primaryKey = 'id_rutina';
    protected $allowedFields = ['nombre_rutina','descripcion', 'duracion', 'dificultad', 'descargas', 'id', 'id_profesor', 'tipo_rutina'];


// En tu modelo RutinaModel.php
public function obtenerProfesorPorIdRutina($id_rutina, $id)
{
    $query = $this->db->table('rutinas')
        ->select('profesores.*')
        ->join('profesores', 'profesores.id_profesor = rutinas.id_profesor')
        ->where('rutinas.id_rutina', $id_rutina)
        ->where('rutinas.id', $id)
        ->get();

    if ($query->getNumRows() > 0) {
        return $query->getRowArray();
    } else {
        // Retorna algo para indicar que no se encontraron resultados, puedes adaptar según tus necesidades
        return null;
    }
}

}
