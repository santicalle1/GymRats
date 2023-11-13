<?php

namespace App\Models;

use CodeIgniter\Model;

class ContactModel extends Model
{
    protected $table = 'contacto'; // Nombre de la tabla en la base de datos
    protected $primaryKey = 'id_contacto'; // Clave primaria

    protected $allowedFields = ['email', 'motivo', 'mensaje']; // Campos permitidos para inserción

    protected $useTimestamps = false; // Habilita campos de fecha de creación y actualización

    protected $createdField = 'created_at'; // Nombre del campo de fecha de creación
    protected $updatedField = 'updated_at'; // Nombre del campo de fecha de actualización
}
