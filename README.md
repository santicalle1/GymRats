# CodeIgniter 4 Framework

## What is CodeIgniter?

CodeIgniter is a PHP full-stack web framework that is light, fast, flexible and secure.
More information can be found at the [official site](https://codeigniter.com).

This repository holds the distributable version of the framework.
It has been built from the
[development repository](https://github.com/codeigniter4/CodeIgniter4).

More information about the plans for version 4 can be found in [CodeIgniter 4](https://forum.codeigniter.com/forumdisplay.php?fid=28) on the forums.

The user guide corresponding to the latest version of the framework can be found
[here](https://codeigniter4.github.io/userguide/).

## Important Change with index.php

`index.php` is no longer in the root of the project! It has been moved inside the *public* folder,
for better security and separation of components.

This means that you should configure your web server to "point" to your project's *public* folder, and
not to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter *public/...*, as the rest of your logic and the
framework are exposed.

**Please** read the user guide for a better explanation of how CI4 works!

## Repository Management

We use GitHub issues, in our main repository, to track **BUGS** and to track approved **DEVELOPMENT** work packages.
We use our [forum](http://forum.codeigniter.com) to provide SUPPORT and to discuss
FEATURE REQUESTS.

This repository is a "distribution" one, built by our release preparation script.
Problems with it can be raised on our forum, or as issues in the main repository.

## Contributing

We welcome contributions from the community.

Please read the [*Contributing to CodeIgniter*](https://github.com/codeigniter4/CodeIgniter4/blob/develop/CONTRIBUTING.md) section in the development repository.

## Server Requirements

PHP version 7.4 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) if you plan to use MySQL
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library


## GymRats - Descripción Detallada

### Autenticación e Inicio de Sesión

- Página Principal:
  - Presenta la interfaz principal de la aplicación.

- Verificación de Inicio de Sesión:
  - Procesa el formulario de inicio de sesión y verifica las credenciales del usuario.

- Página de Inicio:
  - Muestra la página principal después de que el usuario ha iniciado sesión.

- Página de Registro:
  - Muestra el formulario para que los usuarios se registren en la aplicación.

- Proceso de Registro:
  - Maneja la lógica para procesar el formulario de registro y crear nuevos usuarios.

### Términos y Políticas

- Página de Términos:
  - Contiene información sobre los términos y condiciones de uso.

- Página de Política de Privacidad:
  - Brinda detalles sobre la política de privacidad de la aplicación.

### Tienda y Profesores

- Página Principal de la Tienda:
  - Ofrece una selección de productos en oferta para los usuarios.

- Página de Profesores:
  - Proporciona información y detalles sobre los profesores disponibles.

### Redirecciones

- Redirección a la Tienda:
  - Dirige al usuario a la página principal de la tienda.

- Redirección a Profesores:
  - Envia al usuario a la sección de información sobre los profesores.

- Redirección a Rutinas:
  - Lleva al usuario a la página de rutinas específicas.

- Redirección al Panel de Administrador:
  - Envía al administrador al panel de control de administrador.

- Redirección al Panel del Cliente:
  - Lleva al cliente al panel de control personalizado.

### Compras y Profesores

- Página de Compras:
  - Muestra el historial de compras del usuario.

- Procesamiento de Compra:
  - Gestiona la compra de un producto asociado a un profesor específico.

### Vista de "Mis Profesores"

- Vista de "Mis Profesores":
  - Muestra la lista de profesores seguidos por el usuario.

### Carrito y Sesión

- Cierre de Sesión:
  - Permite al usuario cerrar la sesión actual.

- Página del Carrito:
  - Muestra los productos seleccionados por el usuario para su compra.

- Agregar al Carrito:
  - Procesa la solicitud para agregar productos al carrito de compras.

- Eliminar Producto del Carrito:
  - Gestiona la eliminación de un producto específico del carrito.

- Vaciar Carrito:
  - Permite al usuario eliminar todos los productos del carrito.

- Actualizar Cantidad en el Carrito:
  - Maneja las actualizaciones de cantidad para los productos en el carrito.

- Confirmar Carrito:
  - Procesa la compra y redirige al usuario a la página de compras.

### Panel de Administrador

- Panel de Administrador:
  - Proporciona una interfaz para que los administradores gestionen la aplicación.

- Vista de Elementos:
  - Muestra una lista de elementos en el panel de administrador.

- Edición de Elementos:
  - Permite a los administradores editar detalles específicos de los elementos.

- Actualización de Elementos:
  - Procesa las actualizaciones realizadas en los elementos del panel de administrador.

- Eliminación de Elementos:
  - Maneja la eliminación de elementos desde el panel de administrador.

### Panel del Cliente

- Perfil del Cliente:
  - Muestra información y opciones de perfil para el usuario.

- Agregar Productos:
  - Permite a los usuarios agregar nuevos productos al sistema.

- Agregar Producto (Duplicado):
  - Otra ruta que facilita la adición de productos.

- Proceso de Agregar Producto:
  - Gestiona la lógica para agregar un nuevo producto a la base de datos.

### Tienda y Categorías

- Detalles de Producto:
  - Muestra información detallada sobre un producto específico.

- Ofertas:
  - Presenta productos destacados en oferta.

- Suplementos:
  - Muestra la categoría de productos relacionados con suplementos.

- Objetos de Gimnasio:
  - Ofrece productos relacionados con el equipamiento para gimnasios.

- Ropa:
  - Muestra la categoría de productos de ropa.

- Verificación de Stock:
  - Se utiliza para verificar la disponibilidad de stock antes de agregar productos al carrito.

### Contacto y Mensajes

- Página de Contacto:
  - Proporciona un formulario para que los usuarios se pongan en contacto.

- Envío de Formulario de Contacto:
  - Procesa la información enviada a través del formulario de contacto.

### Otros

- Vista de Productos:
  - Proporciona una vista general de todos los productos.

- Edición de Productos:
  - Permite la edición de información relacionada con los productos.

- Eliminación de Productos:
  - Gestiona la eliminación de productos desde la vista general.

### Profesores y Usuarios

- Agregar Profesor:
  - Proporciona un formulario para que los administradores añadan nuevos profesores al sistema.

- Proceso de Agregar Profesor:
  - Gestiona la lógica para agregar un nuevo profesor a la base de datos.

- Modificar Profesor:
  - (Sin implementar) Planeado para futuras actualizaciones.

- Actualizar Profesor:
  - Procesa las actualizaciones realizadas en la información de un profesor.

- Eliminar Profesor:
  - Maneja la eliminación de un profesor del sistema.

- Editar Profesor:
  - (Sin implementar) Planeado para futuras actualizaciones.

### Vista de Productos por Categoría

- Vista de Productos por Categoría:
  - Muestra productos filtrados según la categoría seleccionada.

### Compras y Procesamiento

- Página de Compras:
  - Presenta un resumen de las compras realizadas por el usuario.

- Procesar Compra:
  - Inicia el proceso de compra, conectando al usuario con el profesor correspondiente.

### Mis Profesores

- Vista de "Mis Profesores":
  - Muestra una lista de los profesores vinculados a la cuenta del usuario.

### Otros

- Página Principal:
  - La página principal de la aplicación.

- Registro:
  - Página de registro para nuevos usuarios.

- Proceso de Registro:
  - Gestiona la creación de nuevas cuentas de usuario.

- Términos y Política:
  - Proporciona información sobre los términos y la política de privacidad.


### Rutas de Redirección

- Redirección a Tienda:
  - Ruta para redirigir a los usuarios a la sección de tienda.

- Redirección a Profesores:
  - Ruta para redirigir a los usuarios a la sección de profesores.

- Redirección a Rutinas:
  - Ruta para redirigir a los usuarios a la sección de rutinas.

- Redirección a Panel de Administrador:
  - Ruta para redirigir a los administradores al panel de administración.

- Redirección a Panel de Cliente:
  - Ruta para redirigir a los clientes al panel principal.

### Carrito y Sesión

- Cierre de Sesión:
  - Permite a los usuarios cerrar sesión en la aplicación.

- Página del Carrito:
  - Muestra los productos agregados al carrito de compras.

- Agregar al Carrito:
  - Maneja la lógica para agregar productos al carrito y actualizar el stock.

- Eliminar Producto del Carrito:
  - Elimina un producto específico del carrito de compras.

- Vaciar Carrito:
  - Elimina todos los productos del carrito de compras.

- Actualizar Cantidad en Carrito:
  - Actualiza la cantidad de un producto en el carrito.

- Confirmar Carrito:
  - Procesa la confirmación de compra y redirige a la página de compras.

### Panel de Administrador

- Panel de Administrador:
  - Página principal del panel de administrador.

- Vista de Elementos:
  - Muestra una lista de elementos para su gestión.

- Edición de Elementos:
  - Permite a los administradores editar la información de elementos específicos.

- Actualización de Elementos:
  - Procesa las actualizaciones realizadas en la información de un elemento.

- Eliminación de Elementos:
  - Maneja la eliminación de elementos del sistema.