<?php

namespace App\Controllers;

use CodeIgniter\Controller;

use App\Models\CompraModel;

class Compras extends BaseController
{ 
    protected $modelCompra; // Declarar la propiedad para el modelo

    public function __construct()
    {
        $this->modelCompra = new CompraModel(); // Instanciar el modelo en el constructor
    }
    public function index()
    {
        return view('compras');
    }
    // Controlador para procesar la compra
    public function procesarCompra() {
        // Obtener los datos del formulario
        $barrio = $this->request->getPost('barrio');
        $calle = $this->request->getPost('calle');
        $provincia = $this->request->getPost('provincia');
        $ciudad = $this->request->getPost('ciudad');
        $codigo_postal = $this->request->getPost('codigo_postal');
        $numero_de_calle = $this->request->getPost('numero_de_calle');
        $productos = $this->obtenerProductosCarrito(); 

    // Calcular el total
    $total = $this->modelCompra->calcularTotal($productos);

// Lógica para insertar en la base de datos
$this->modelCompra->insertarCompra($barrio, $calle, $productos, $total);

$data['total'] = $total; // donde $total es el valor total del carrito
return view('compras', $data);
    }
    

}