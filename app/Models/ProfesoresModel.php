<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfesoresModel extends Model
{
    protected $table = 'profesores';
    protected $primaryKey = 'id_profesor';
    protected $allowedFields = ['nombre','id', 'especialidad', 'fecha_de_contrato', 'titulos', 'horarios', 'telefono', 'coste', 'dificultad', 'imagen'];

    public function get_all_profesores() {
        return $this->db->get('profesores')->result();
    }

    public function get_profesor_by_id($id) {
        return $this->db->where('id', $id)->get('profesores')->row();
    }

    public function delete_profesor($id) {
        $this->db->where('id', $id)->delete('profesores');
    }
    public function obtenerMisProfesores($id)
    {
        return $this->where('id_profesor', $id)->find('id');
    }

    public function obtenerIdProfesor($profesor)
    {
        return $this->where('id', $profesor)->find();
    }

}