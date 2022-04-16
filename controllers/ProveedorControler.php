<?php

namespace Controllers;

use MVC\Router;
use Model\Proveedor;

class ProveedorControler{
    public static function index(Router $router)    {
        $proveedores = Proveedor::all();
        $registro = $_GET['registro'] ?? null;
        // Manda datos a la vista
        $router->render('proveedores/admin', [
            'proveedores' => $proveedores,
            'registro' => $registro
        ]);
    }

    public static function crear(Router $router){       
        $proveedor = new Proveedor();
        $errores = Proveedor::getErrores();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Instancia en el objeto
            $proveedor = new Proveedor($_POST['proveedor']);
            // Funcion para validar errores
            $errores = $proveedor->validarErrores();
            // Si el arreglo de errores esta vacio
            if (empty($errores)) {
                // Funcion apara guardar
                $proveedor->guardar();
            }
        }
        $router->render('proveedores/crear', [
            'proveedor' => $proveedor,
            'errores' => $errores
        ]);
    }
    public static function actualizar(Router $router){
        $id=validarORediredireccionar('/');
        $proveedor=Proveedor::find($id);
        $errores = Proveedor::getErrores();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $args=$_POST['proveedor'];
            $proveedor->sincronizar($args);
         // Crea arreglo de errores
            $errores = $proveedor->validarErrores();
             // Si el arreglo de errores esta vacio
            if (empty($errores)) {
                $proveedor->guardar();
            }
        }
        $router->render('proveedores/actualizar', [
            'proveedor' => $proveedor,
            'errores' => $errores   
        ]);
    }
    public static function eliminar(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $tipo = $_POST['tipo'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
            if ($id) {
                if(validarTipoDeContenido($tipo)){
                    if($tipo==='proveedor'){
                        $proveedor=Proveedor::find($id);
                        $proveedor->eliminar('proveedores');    
                    }
                }
            }
        }
    }
}
