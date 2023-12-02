<?php

// namespace Config;

// // Create a new instance of our RouteCollection class.
// $routes = Services::routes();

// /*
//  * --------------------------------------------------------------------
//  * Router Setup
//  * --------------------------------------------------------------------
//  */
// $routes->setDefaultNamespace('App\Controllers');
// $routes->setDefaultController('Inicio');
// $routes->setDefaultMethod('index');
// $routes->setTranslateURIDashes(false);
// $routes->set404Override();
// // The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// // where controller filters or CSRF protection are bypassed.
// // If you don't want to define all routes, please use the Auto Routing (Improved).
// // Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(true);

// /*
//  * --------------------------------------------------------------------
//  * Route Definitions
//  * --------------------------------------------------------------------
//  */

// // We get a performance increase by specifying the default
// // route since we don't have to scan directories.
// $routes->get('/', 'Inicio::index'); // Cambia 'Inicio::index' al controlador y método correctos
// $routes->post('inicio', 'Login::verificar'); // Ruta de verificación de inicio de sesión
// $routes->get('inicio', 'Inicio::index'); // Ruta de inicio
// $routes->get('register', 'Register::index'); // Ruta para la página de registro
// $routes->post('register/do_register', 'Register::do_register'); // Ruta para el proceso de registro
// $routes->get('terminos', 'Terminos::index');
// $routes->get('politica', 'Politica::index');
// $routes->get('tienda', 'Tienda::index');
// $routes->get('profesores', 'ProfesoresController::index');
// $routes->get('redireccion/tienda(:any)', 'Redireccion::tienda');
// $routes->get('redireccion/carrito(:any)', 'Redireccion::carrito');
// $routes->get('redireccion/profesores(:any)', 'Redireccion::profesores');
// $routes->get('redireccion/rutinas(:any)', 'Redireccion::rutinas');
// $routes->get('redireccion/panel(:any)', 'Panel::panel_admin');
// $routes->get('redireccion/panel(:any)', 'Panel::panel_cliente');
// $routes->get('inicio/logout', 'Inicio::logout');
// $routes->get('carrito', 'CarritoController::index');
// $routes->get('panel_admin', 'Panel::panel');
// $routes->get('items_view', 'Items::index');
// $routes->get('items_edit(:num)', 'Items::edit/$1');
// $routes->post('items_edit(:num)', 'Items::update/$1'); // Agrega esto para manejar el envío del formulario de edición
// $routes->post('items/delete/(:num)', 'Items::delete/$1');
// $routes->get('/panel_cliente', 'ClientPanel::profile');
// $routes->get('agregar_productos', 'ProductoController::agregar');
// $routes->get('producto/agregar', 'ProductoController::agregar');
// $routes->post('producto/agregar', 'ProductoController::agregar');
// $routes->get('tienda/detalles/(:num)', 'Tienda::detalles/$1');
// $routes->get('tienda', 'Tienda::oferta');
// $routes->get('suplementos', 'Tienda::suplementos');
// $routes->get('objetosgym', 'Tienda::objetosgym');
// $routes->get('ropa', 'Tienda::merchandising');
// $routes->get('/contacto', 'Contact::index');
// $routes->post('/contacto/enviar', 'Contact::enviar');
// $routes->get('products_view', 'Productos::index'); // Muestra la lista de productos.
// $routes->get('products/edit/(:num)', 'Productos::edit/$1'); // Muestra el formulario de edición para un producto en particular.
// $routes->post('products/delete/(:num)', 'Productos::delete/$1'); // Elimina un producto específico.
// $routes->get('/agregar_profesor', 'ProfesoresController::addForm'); // Muestra el formulario para agregar profesor
// $routes->post('/profesores/create', 'ProfesoresController::create'); // Procesa el formulario y crea un profesor
// $routes->get('modificar_profesor', 'Profesores::modificar_profesor');
// $routes->post('update_profesor/(:num)', 'Profesores::update_profesor/$1');
// $routes->get('delete_profesor/(:num)', 'Profesores::delete_profesor/$1');
// $routes->get('editar_profesor/(:num)', 'Profesores::edit/$1');
// $routes->match(['get', 'post'], 'actualizar_profesor/(:num)', 'Profesores::update_profesor/$1');
// $routes->get('/tienda/(:segment)', 'ProductoController::verProductos/$1'); // Vista de productos por categoría
// $routes->get('/carrito', 'ProductoController::carrito'); // Vista del carrito
// $routes->post('/agregarAlCarrito', 'CarritoController::agregarAlCarrito');  // <- Asegúrate de que esto esté así
// $routes->post('/eliminarProducto', 'CarritoController::eliminarProducto');
// $routes->post('/vaciarCarrito', 'CarritoController::vaciarCarrito');
// $routes->get('mensajes', 'Mensajes::index');
// $routes->get('mensajes/eliminar/(:num)', 'Mensajes::eliminar/$1');
// $routes->get('compras', 'Compras::index');










// /*
//  * --------------------------------------------------------------------
//  * Additional Routing
//  * --------------------------------------------------------------------
//  *
//  * There will often be times that you need additional routing and you
//  * need it to be able to override any defaults in this file. Environment
//  * based routes is one such time. require() additional route files here
//  * to make that happen.
//  *
//  * You will have access to the $routes object within that file without
//  * needing to reload it.
//  */
// if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
//     require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
// }
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

// Rutas relacionadas con la autenticación y la página de inicio
$routes->get('/', 'Inicio::index'); // Página principal
$routes->post('inicio', 'Login::verificar'); // Verificación de inicio de sesión
$routes->get('inicio', 'Inicio::index'); // Página de inicio
$routes->get('register', 'Register::index'); // Página de registro
$routes->post('register/do_register', 'Register::do_register'); // Proceso de registro

// Rutas para términos y políticas
$routes->get('terminos', 'Terminos::index'); // Página de términos
$routes->get('politica', 'Politica::index'); // Página de política de privacidad

// Rutas relacionadas con la tienda y profesores
$routes->get('tienda', 'Tienda::index'); // Página principal de la tienda
$routes->get('profesores', 'ProfesoresController::index'); // Página de profesores

// Rutas de redirección
$routes->get('redireccion/tienda', 'Redireccion::tienda'); // Redirección a la tienda
$routes->get('redireccion/profesores', 'Redireccion::profesores'); // Redirección a profesores
$routes->get('redireccion/rutinas', 'Redireccion::rutinas'); // Redirección a rutinas
$routes->get('redireccion/panel', 'Panel::panel_admin'); // Redirección al panel de administrador
$routes->get('redireccion/panel', 'Panel::panel_cliente'); // Redirección al panel del cliente

// Rutas relacionadas con el carrito y la sesión
$routes->get('inicio/logout', 'Inicio::logout'); // Cierre de sesión
$routes->get('carrito', 'CarritoController::index'); // Página del carrito
$routes->post('/agregarAlCarrito', 'CarritoController::agregarAlCarrito'); // Agregar producto al carrito
$routes->post('/eliminarProducto', 'CarritoController::eliminarProducto'); // Eliminar producto del carrito
$routes->post('/vaciarCarrito', 'CarritoController::vaciarCarrito'); // Vaciar el carrito
$routes->post('updateCantidad/(:num)', 'CarritoController::updateCantidad/$1'); // Actualiza la cantidad en el carrito
$routes->post('/compras','CarritoController::confirmarCarrito'); // Confirma la compra y redirige a compras
$routes->post('procesarCompra', 'Compras::procesarCompra'); // Procesa los datos del formulario de compras

// Rutas relacionadas con el panel de administrador
$routes->get('panel_admin', 'Panel::panel'); // Panel de administrador
$routes->get('items_view', 'Items::index'); // Vista de elementos
$routes->get('items_edit(:num)', 'Items::edit/$1'); // Edición de elementos
$routes->post('items_edit(:num)', 'Items::update/$1'); // Actualización de elementos
$routes->post('items/delete/(:num)', 'Items::delete/$1'); // Eliminación de elementos
$routes->get('agregar_productos', 'ProductoController::agregar'); // Agregar productos
$routes->get('producto/agregar', 'ProductoController::agregar'); // Agregar producto (duplicado)
$routes->post('producto/agregar', 'ProductoController::agregar'); // Proceso de agregar producto
$routes->get('agregar_rutinas', 'RutinasController::index'); // Vista de Rutinas
$routes->get('/rutinas', 'RutinasController::indexx'); // Carga las rutinas de agregar_rutinas a la vista rutinas
$routes->get('modificar_rutinas', 'Rutinas::indexx'); // Vista de Rutinas

// Rutas relacionadas con el panel del cliente
$routes->get('/panel_cliente', 'ClientPanel::profile'); // Perfil del cliente

// Rutas relacionadas con la tienda y categorías
$routes->get('tienda/detalles/(:num)', 'Tienda::detalles/$1'); // Detalles de producto
$routes->get('tienda', 'Tienda::oferta'); // Ofertas
$routes->get('suplementos', 'Tienda::suplementos'); // Suplementos
$routes->get('objetosgym', 'Tienda::objetosgym'); // Objetos de gimnasio
$routes->get('ropa', 'Tienda::merchandising'); // Ropa
$routes->get('verificarStock/(:num)/(:num)', 'Tienda::verificarStock/$1/$2'); // Verificación de stock

// Rutas de contacto y mensajes
$routes->get('/contacto', 'Contact::index'); // Página de contacto
$routes->post('/contacto/enviar', 'Contact::enviar'); // Envío de formulario de contacto

// Rutas relacionadas con productos (sin implementar)
$routes->get('products_view', 'Productos::index'); // Vista de productos
$routes->get('products/edit/(:num)', 'Productos::edit/$1'); // Edición de productos
$routes->post('products/delete/(:num)', 'Productos::delete/$1'); // Eliminación de productos

// Rutas relacionadas con profesores
$routes->get('/agregar_profesor', 'ProfesoresController::addForm'); // Formulario para agregar profesor
$routes->post('/profesores/create', 'ProfesoresController::create'); // Proceso de agregar profesor
$routes->get('modificar_profesor', 'Profesores::modificar_profesor'); // Modificar profesor (sin implementar)
$routes->post('update_profesor/(:num)', 'Profesores::update_profesor/$1'); // Actualizar profesor
$routes->get('delete_profesor/(:num)', 'Profesores::delete_profesor/$1'); // Eliminar profesor
$routes->get('editar_profesor/(:num)', 'Profesores::edit/$1'); // Editar profesor (sin implementar)
$routes->match(['get', 'post'], 'actualizar_profesor/(:num)', 'Profesores::update_profesor/$1'); // Actualizar profesor

// Rutas relacionadas con la vista de productos por categoría
$routes->get('/tienda/(:segment)', 'ProductoController::verProductos/$1'); // Vista de productos por categoría

// Rutas relacionadas con compras y profesores
$routes->get('/compras', 'Compras::index'); // Página de compras
$routes->get('/compras/procesar/{id_profesor}', 'Compras::procesarCompra/$1'); // Procesar compra

// Rutas relacionadas con la vista de "Mis Profesores"
$routes->get('/mis_profesores', 'MisProfesores::index'); // Vista de "Mis Profesores"



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
