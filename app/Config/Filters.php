<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     */
    public array $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'Sessionadmin'       => App\Filters\Sessionadmin::class,
        'Sessionuser'       => App\Filters\Sessionuser::class,
        'Sessionprofesores'    => App\Filters\Sessionprofesores::class,
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     */
    public array $globals = [
        'before' => [
            // 'honeypot',
            // 'csrf',
            // 'invalidchars',
        ],
        'after' => [
            'toolbar',
            // 'honeypot',
            // 'secureheaders',
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['foo', 'bar']
     *
     * If you use this, you should disable auto-routing because auto-routing
     * permits any HTTP method to access a controller. Accessing the controller
     * with a method you don't expect could bypass the filter.
     */
    public array $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     */
    public array $filters = [
//         "Sessionadmin" => [
//             "before" => [
//                 '/','inicio','register','register/do_register','terminos','politica','tienda','profesores',"redireccion/tienda",'redireccion/profesores',"redireccion/rutinas","redireccion/panel","redireccion/panel","redireccion/panel",'inicio/logout','carrito','/agregarAlCarrito','/eliminarProducto','/vaciarCarrito','updateCantidad/(:num)','/confirmarCarrito','panel_admin','items_view','items_edit(:num)','items/delete/(:num)','/panel_cliente','agregar_productos','producto/agregar','tienda/detalles/(:num)','tienda','suplementos','objetosgym','ropa','/contacto','/contacto/enviar','products_view','products/edit/(:num)','products/delete/(:num)','/agregar_profesor','/profesores/create','modificar_profesor','update_profesor/(:num)','delete_profesor/(:num)','editar_profesor/(:num)','/tienda/(:segment)','/compras','/compras/procesar/{id_profesor}',
];
//         ],
//         "Sessionuser" => [
//             "before" => [
//                 '/'
//             ]
//         ]
//     ];
}