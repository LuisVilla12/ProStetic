<?php 
require_once __DIR__ . '/../includes/app.php';
use MVC\Router;
use Controllers\ProveedorControler;
use Controllers\PaginasControler;
use Controllers\UsuariosControler;
use Controllers\EmpleadoControler;
use Controllers\ProductoControler;
use Controllers\LoginControler;
use Controllers\APIController;


$router = new Router();
$router->get('/proveedores/admin',[ProveedorControler::class,'index']);
$router->get('/proveedores/crear',[ProveedorControler::class,'crear']);
$router->post('/proveedores/crear',[ProveedorControler::class,'crear']);
$router->get('/proveedores/actualizar',[ProveedorControler::class,'actualizar']);
$router->post('/proveedores/actualizar',[ProveedorControler::class,'actualizar']);
$router->post('/proveedores/eliminar',[ProveedorControler::class,'eliminar']);

// usuarios
$router->get('/usuarios/admin',[UsuariosControler::class,'index']);
$router->get('/usuarios/crear',[UsuariosControler::class,'crear']);
$router->post('/usuarios/crear',[UsuariosControler::class,'crear']);
$router->get('/usuarios/actualizar',[UsuariosControler::class,'actualizar']);
$router->post('/usuarios/actualizar',[UsuariosControler::class,'actualizar']);
$router->post('/usuarios/eliminar',[UsuariosControler::class,'eliminar']);
// Empleados
$router->get('/empleados/admin',[EmpleadoControler::class,'index']);
$router->get('/empleados/crear',[EmpleadoControler::class,'crear']);
$router->post('/empleados/crear',[EmpleadoControler::class,'crear']);
// $router->get('/usuarios/actualizar',[EmpleadoControler::class,'actualizar']);
// $router->post('/usuarios/actualizar',[EmpleadoControler::class,'actualizar']);
// $router->post('/usuarios/eliminar',[EmpleadoControler::class,'eliminar']);

// Productos
$router->get('/inventario/admin',[ProductoControler::class,'index']);
$router->get('/inventario/crear',[ProductoControler::class,'crear']);
$router->post('/inventario/crear',[ProductoControler::class,'crear']);
$router->get('/inventario/actualizar',[ProductoControler::class,'actualizar']);
$router->post('/inventario/actualizar',[ProductoControler::class,'actualizar']);
$router->post('/inventario/eliminar',[ProductoControler::class,'eliminar']);

// Publica
$router->get('/',[PaginasControler::class,'index']);
$router->get('/admin',[PaginasControler::class,'menu']);
// Agenda
$router->get('/agenda/inicio',[PaginasControler::class,'inicio']);

// Autenticar
$router->get('/login',[LoginControler::class,'login']);
$router->post('/login',[LoginControler::class,'login']);
$router->get('/logout',[LoginControler::class,'logout']);

// Crear cuenta
$router->get('/crear-cuenta',[LoginControler::class,'crearCuenta']);
$router->post('/crear-cuenta',[LoginControler::class,'crearCuenta']);
// Mensaje de confirmacion
$router->get('/mensaje',[LoginControler::class,'mensaje']);
// Confirmar cuenta
$router->get('/confirmar-cuenta',[LoginControler::class,'confirmarCuenta']);
$router->post('/confirmar-cuenta',[LoginControler::class,'confirmarCuenta']);

// Agendar cita
$router->get('/cita',[PaginasControler::class,'cita']);
// API
$router->get('/api/servicios',[APIController::class,'index']);
$router->post('/api/citas',[APIController::class,'guardar']);
$router->comprobarRutas();


