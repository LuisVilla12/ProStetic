<?php

namespace Controllers;

use MVC\Router;
use Model\Proveedor;

class ProveedorControler{
    public static function index(Router $router)    {
        $proveedores = Proveedor::allProveedores();
        $registro = $_GET['registro'] ?? null;
        $inicio=false;
        // Manda datos a la vista
        $router->render('proveedores/admin', [
            'proveedores' => $proveedores,
            'registro' => $registro,
            'inicio'=>$inicio
        ]);
    }

    public static function crear(Router $router){       
        $proveedor = new Proveedor();
        $alertas = Proveedor::getAlertas();
        $inicio=false;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Instancia en el objeto
            $proveedor = new Proveedor($_POST['proveedor']);
            // Funcion para validar alertas
            $alertas = $proveedor->validarErrores();
            // Si el arreglo de alertas esta vacio
            if (empty($alertas)) {
                // Funcion apara guardar
                $resultado= $proveedor->guardar();
                // debuguear($resultado);
                // exit;
                if($resultado['resultado']){
                    header('Location:/proveedores/admin');
                }
                // echo json_encode($resultado);                
            }
        }
        $router->render('proveedores/crear', [
            'proveedor' => $proveedor,
            'alertas' => $alertas,
            'inicio'=>$inicio
        ]);
    }
    public static function actualizar(Router $router){
        $id=validarORediredireccionar('/');
        $proveedor=Proveedor::find($id);
        $alertas = Proveedor::getAlertas();
        $inicio=false;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $args=$_POST['proveedor'];
            $proveedor->sincronizar($args);
         // Crea arreglo de alertas
            $alertas = $proveedor->validarErrores();
             // Si el arreglo de alertas esta vacio
            if (empty($alertas)) {
                $resultado=$proveedor->guardar();
                if($resultado){
                    header('Location:/proveedores/admin');
                }
            }
        }
        $router->render('proveedores/actualizar', [
            'proveedor' => $proveedor,
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
                    if($tipo==='proveedor'){
                        $proveedor=Proveedor::find($id);
                        $resultado=$proveedor->cambiarStatus();    
                        if($resultado){
                            header('Location:/proveedores/admin');
                        }
                    }
                }
            }
        }
    }
}
