<?php 
require_once __DIR__ . '/../includes/app.php';
use MVC\Router;
use Controllers\ProveedorControler;
use Controllers\PaginasControler;
use Controllers\UsuariosControler;
use Controllers\LoginControler;

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


// Publica
$router->get('/',[PaginasControler::class,'index']);
$router->get('/admin',[PaginasControler::class,'menu']);

// Autenticar
$router->get('/login',[LoginControler::class,'login']);
// $router->post('/login',[LoginControler::class,'login']);
// $router->get('/logout',[LoginControler::class,'logout']);

$router->comprobarRutas();

