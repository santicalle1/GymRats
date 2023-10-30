<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Inicio');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Inicio::index'); // Cambia 'Inicio::index' al controlador y método correctos
$routes->post('inicio', 'Login::verificar'); // Ruta de verificación de inicio de sesión
$routes->get('inicio', 'Inicio::index'); // Ruta de inicio
$routes->get('register', 'Register::index'); // Ruta para la página de registro
$routes->post('register/do_register', 'Register::do_register'); // Ruta para el proceso de registro
$routes->get('terminos', 'Terminos::index');
$routes->get('politica', 'Politica::index');
$routes->get('tienda', 'Tienda::index');
$routes->get('profesores', 'ProfesoresController::index');
$routes->get('redireccion/tienda', 'Redireccion::tienda');
$routes->get('redireccion/profesores', 'Redireccion::profesores');
$routes->get('redireccion/rutinas', 'Redireccion::rutinas');
$routes->get('redireccion/panel', 'Panel::panel_admin');
$routes->get('redireccion/panel', 'Panel::panel_cliente');
$routes->get('inicio/logout', 'Inicio::logout');
$routes->get('carrito', 'CarritoController::index');
$routes->get('panel_admin', 'Panel::panel');
$routes->get('items_view', 'Items::index');
$routes->get('items_edit(:num)', 'Items::edit/$1');
$routes->post('items_edit(:num)', 'Items::update/$1'); // Agrega esto para manejar el envío del formulario de edición
$routes->post('items/delete/(:num)', 'Items::delete/$1');
$routes->get('/panel_cliente', 'ClientPanel::profile');
$routes->get('agregar_productos', 'ProductoController::agregar');
$routes->get('producto/agregar', 'ProductoController::agregar');
$routes->post('producto/agregar', 'ProductoController::agregar');
$routes->get('tienda/detalles/(:num)', 'Tienda::detalles/$1');
$routes->get('tienda', 'Tienda::oferta');
$routes->get('suplementos', 'Tienda::suplementos');
$routes->get('objetosgym', 'Tienda::objetosgym');
$routes->get('ropa', 'Tienda::merchandising');
$routes->get('/contacto', 'Contact::index');
$routes->post('/contacto/enviar', 'Contact::enviar');
$routes->get('products_view', 'Productos::index'); // Muestra la lista de productos.
$routes->get('products/edit/(:num)', 'Productos::edit/$1'); // Muestra el formulario de edición para un producto en particular.
$routes->post('products/delete/(:num)', 'Productos::delete/$1'); // Elimina un producto específico.
$routes->get('/agregar_profesor', 'ProfesoresController::addForm'); // Muestra el formulario para agregar profesor
$routes->post('/profesores/create', 'ProfesoresController::create'); // Procesa el formulario y crea un profesor
$routes->get('modificar_profesor', 'Profesores::modificar_profesor');
$routes->post('update_profesor/(:num)', 'Profesores::update_profesor/$1');
$routes->get('delete_profesor/(:num)', 'Profesores::delete_profesor/$1');
$routes->get('editar_profesor/(:num)', 'Profesores::edit/$1');
$routes->match(['get', 'post'], 'actualizar_profesor/(:num)', 'Profesores::update_profesor/$1');
$routes->get('/tienda/(:segment)', 'ProductoController::verProductos/$1'); // Vista de productos por categoría
$routes->get('/carrito', 'ProductoController::carrito'); // Vista del carrito
$routes->post('/agregarAlCarrito', 'CarritoController::agregarAlCarrito');  // <- Asegúrate de que esto esté así
$routes->post('/eliminarProducto', 'CarritoController::eliminarProducto');

$routes->post('/vaciarCarrito', 'CarritoController::vaciarCarrito');










// $routes->get('productos/agregar', 'Productos::agregar');
//$routes->get('clientes', 'Clientes::listado');  // Asumiendo que tienes un método listado en un controlador de Clientes



/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
