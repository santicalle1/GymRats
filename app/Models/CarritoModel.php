<?php namespace App\Models;

use CodeIgniter\Model;

class CarritoModel extends Model
{
    protected $table      = 'carrito';
    protected $primaryKey = 'id_carrito';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id', 'id_producto', 'cantidad', 'fecha_agregado'];

    protected $useTimestamps = true;  // Cambiado a true
    
    protected $createdField  = 'fecha_agregado';
    protected $updatedField  = ''; 
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [
        'id'          => 'required|integer',
        'id_producto' => 'required|integer',
        'cantidad'    => 'required|integer'
    ];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function agregarAlCarrito($data)
    {
        // Antes de insertar, es buena idea validar los datos
        if (!$this->validate($data)) {
            throw new \Exception("Error de validación: " . implode(", ", $this->errors()));
        }
        
        return $this->insert($data);
    }
    
    public function obtenerProductosCarrito($id)
    {
        return $this->db->table($this->table)
                ->join('producto', 'carrito.id_producto = producto.id_producto')
                ->where('carrito.id', $id)
                ->get()
                ->getResultArray();
    }

    public function eliminarProductoDelCarrito($id, $id_producto) {
        return $this->where('id', $id)->where('id_producto', $id_producto)->delete();
    }

    public function vaciarProductosDelCarrito($id) {
        return $this->where('id', $id)->delete();
    }

    public function updateCarrito($id_carrito, $data)
    {
        return $this->update(['id_carrito' => $id_carrito], $data);
    }
    
}
