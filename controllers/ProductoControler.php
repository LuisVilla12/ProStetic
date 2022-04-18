<?php

namespace Controllers;

use MVC\Router;
use Model\Producto;
use Model\Proveedor;

class ProductoControler{
    public static function index(Router $router)    {
        $productos = Producto::all();
        $registro = $_GET['registro'] ?? null;
        $inicio=false;
        // Manda datos a la vista
        $router->render('inventario/admin', [
            'productos' => $productos,
            'registro' => $registro,
            'inicio'=>$inicio
        ]);
    }

    public static function crear(Router $router){       
        $producto = new Producto();
        $proveedores = Proveedor::all();
        $errores = Producto::getErrores();
        $inicio=false;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Instancia en el objeto
            $producto = new Producto($_POST['producto']);
            // Funcion para validar errores
            $errores = $producto->validarErrores();
            // Si el arreglo de errores esta vacio
            if (empty($errores)) {
                // Funcion apara guardar
                $producto->guardar();
            }
        }
        $router->render('inventario/crear', [
            'producto' => $producto,
            'proveedores' => $proveedores,
            'errores' => $errores,
            'inicio'=>$inicio
        ]);
    }
    public static function actualizar(Router $router){
        $id=validarORediredireccionar('/');
        $producto=Producto::find($id);
        $proveedores = Proveedor::all();
        $errores = Producto::getErrores();
        $inicio=false;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $args=$_POST['producto'];
            $producto->sincronizar($args);
         // Crea arreglo de errores
            $errores = $producto->validarErrores();
             // Si el arreglo de errores esta vacio
            if (empty($errores)) {
                $producto->guardar();
            }
        }
        $router->render('inventario/actualizar', [
            'producto' => $producto,
            'proveedores' => $proveedores,
            'errores' => $errores,            
            'inicio'=>$inicio
        ]);
    }
    public static function eliminar(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $tipo = $_POST['tipo'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
            if ($id) {
                if(validarTipoDeContenido($tipo)){
                    if($tipo==='producto'){
                        $producto=Producto::find($id);
                        $producto->eliminar('productos');    
                    }
                }
            }
        }
    }
}
