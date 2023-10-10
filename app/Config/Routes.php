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
$routes->get('profesores', 'Profesores::index');
$routes->get('redireccion/tienda', 'Redireccion::tienda');
$routes->get('redireccion/profesores', 'Redireccion::profesores');
$routes->get('redireccion/rutinas', 'Redireccion::rutinas');
$routes->get('redireccion/panel', 'Panel::panel_admin');
$routes->get('redireccion/panel', 'Panel::panel_cliente');
$routes->get('inicio/logout', 'Inicio::logout');
$routes->get('carrito', 'Carrito::index');
$routes->get('panel_admin', 'Panel::panel');
$routes->get('items_view', 'Items::index');
$routes->get('items_edit(:num)', 'Items::edit/$1');
$routes->post('items_edit(:num)', 'Items::update/$1'); // Agrega esto para manejar el envío del formulario de edición
$routes->post('items/delete/(:num)', 'Items::delete/$1');
$routes->get('/panel_cliente', 'ClientPanel::profile');
$routes->get('agregar_productos', 'ProductoController::agregar');
$routes->get('producto/agregar', 'ProductoController::agregar');
$routes->post('producto/agregar', 'ProductoController::agregar');



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
