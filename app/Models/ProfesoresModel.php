<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfesoresModel extends Model
{
    protected $table = 'profesores';
    protected $primaryKey = 'id_profesor';
    protected $allowedFields = ['nombre', 'especialidad', 'fecha_de_contrato', 'titulos', 'horarios', 'telefono', 'mail', 'salario', 'coste', 'dificultad', 'imagen'];

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
        // Aquí implementa la lógica para obtener la lista de profesores comprados por el usuario
        // Puedes hacer una consulta a la base de datos u obtener los datos de donde los almacenes
        
        return $this->where('id_profesor', $id)->find();
    }
}