<?php
namespace App\Models;

use CodeIgniter\Model;

class ProfesorCompradoModel extends Model
{
    protected $table = 'profesor_comprado'; // Aquí se especifica la tabla
    protected $primaryKey = 'id_profesor_comprado';

    protected $allowedFields = ['id', 'id_profesor', 'coste', 'fecha'];

    // Obtener el costo del profesor por su ID
    public function obtenerCostoPorIdProfesor($id_profesor)
    {
        $query = $this->select('coste')->where('id_profesor', $id_profesor)->first();

        return $query ? $query['coste'] : null;
    }

    // Puedes agregar más configuraciones según tus necesidades
}
?>