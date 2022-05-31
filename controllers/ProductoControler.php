<?php

namespace Controllers;

use MVC\Router;
use Model\Producto;
use Model\Inventario;
use Model\Proveedor;

class ProductoControler{
    public static function index(Router $router)    {
        $productos = Inventario::allProductos();
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
        $proveedores = Proveedor::allProveedores();
        $alertas = Proveedor::getAlertas();
        $inicio=false;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Instancia en el objeto
            $producto = new Producto($_POST['producto']);
            // debuguear($producto);
            // Funcion para validar errores
            $alertas = $producto->validarErrores();
            // Si el arreglo de errores esta vacio
            if (empty($alertas)) {
                // Funcion apara guardar
                $resultado=$producto->guardar();
                // debuguear($resultado);
                // exit;
                if($resultado['resultado']){
                    header('Location:/inventario/admin');
                }
            }
        }
        $router->render('inventario/crear', [
            'producto' => $producto,
            'proveedores' => $proveedores,
            'alertas' => $alertas,
            'inicio'=>$inicio
        ]);
    }
    public static function actualizar(Router $router){
        $id=validarORediredireccionar('/');
        $producto=Producto::find($id);
        $proveedores = Proveedor::all();
        $alertas = Producto::getAlertas();
        $inicio=false;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $args=$_POST['producto'];
            $producto->sincronizar($args);
         // Crea arreglo de errores
            $alertas = $producto->validarErrores();
             // Si el arreglo de errores esta vacio
            if (empty($alertas)) {
                $resultado=$producto->guardar();
                if($resultado){
                    header('Location:/inventario/admin');
                }
            }
        }
        $router->render('inventario/actualizar', [
            'producto' => $producto,
            'proveedores' => $proveedores,
            'alertas' => $alertas,            
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
                        $resultado=$producto->eliminarProducto();    
                        
                        $respuesta=[
                            'resultado'=>$resultado   
                        ];
                        echo json_encode($respuesta);       
                        // if($resultado){
                        //     header('Location:/inventario/admin');
                        // }
                    }
                }
            }
        }
    }
}
