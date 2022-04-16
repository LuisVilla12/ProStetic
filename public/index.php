<?php 
require_once __DIR__ . '/../includes/app.php';
use MVC\Router;
use Controllers\ProveedorControler;
use Controllers\PaginasControler;

$router = new Router();
$router->get('/proveedores/admin',[ProveedorControler::class,'index']);
$router->get('/proveedores/crear',[ProveedorControler::class,'crear']);
$router->post('/proveedores/crear',[ProveedorControler::class,'crear']);
$router->get('/proveedores/actualizar',[ProveedorControler::class,'actualizar']);
$router->post('/proveedores/actualizar',[ProveedorControler::class,'actualizar']);
$router->post('/proveedores/eliminar',[ProveedorControler::class,'eliminar']);

// Publica
$router->get('/',[PaginasControler::class,'index']);
$router->get('/admin',[PaginasControler::class,'menu']);

$router->comprobarRutas();

