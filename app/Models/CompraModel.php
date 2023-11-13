<?php

namespace App\Models;

use CodeIgniter\Model;

class CompraModel extends Model
{
    protected $table = 'compras';
    protected $primaryKey = 'id_compra';
    protected $allowedFields = ['fecha', 'total', 'id_metodo_pago', 'id', 'estado', 'id_envio', 'id_calle', 'id_ciudad', 'numero_calle'];

    public function insertarCompra($barrio, $calle, $productos /* otros parámetros */) {
        $fecha = date('Y-m-d H:i:s');
        $total = $this->calcularTotal($productos); // Necesitas implementar esta función

        $id_metodo_pago = 1; // Asigna un valor adecuado
        $id = 1; // Asigna un valor adecuado
        $id_envio = 1; // Asigna un valor adecuado
        $id_calle = 1; // Asigna un valor adecuado
        $id_ciudad = 1; // Asigna un valor adecuado
        $numero_calle = '123'; // Asigna un valor adecuado
        
        // Resto de tu código...
        
        $dataCompra = [
            'fecha' => $fecha,
            'total' => $total,
            'id_metodo_pago' => $id_metodo_pago,
            'id' => $id,
            'estado' => 1,
            'id_envio' => $id_envio,
            'id_calle' => $id_calle,
            'id_ciudad' => $id_ciudad,
            'numero_calle' => $numero_calle,
        ];
        

        // Insertar en la tabla 'compras'
        $this->insert($dataCompra);
        $idCompra = $this->getInsertID(); // Obtener el ID de la compra recién insertada

        // Datos para la tabla 'detalledecompra'
        $detalleCompraData = [];
        foreach ($productos as $producto) {
            $detalleCompraData[] = [
                'id_producto' => $producto['id_producto'],
                'id_compra' => $idCompra,
                'id' => $producto['id'],
                'cantidad' => $producto['cantidad'],
                'precio_unitario' => $producto['precio'], // Puedes ajustar según descuentos, etc.
            ];
        }

        // Insertar en la tabla 'detalledecompra'
        $this->db->table('detalledecompra')->insertBatch($detalleCompraData);
    }

    // Función para calcular el total
    public function calcularTotal($productos) {
        $total = 0;
        foreach ($productos as $producto) {
            $total += $producto['cantidad'] * $producto['precio'];
        }
        return $total;
    }
}
