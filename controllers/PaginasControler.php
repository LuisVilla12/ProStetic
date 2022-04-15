<?php
namespace Controllers;

use MVC\Router;

class PaginasControler {
    public static function index(Router $router){
        // $proveedores=Proveedores::get(3);
        $router->render('paginas/index',[]);
    }
    public static function menu(Router $router){
        $router->render('paginas/admin',[]);
    }

    public static function nosotros(Router $router){
        $router->render('paginas/nosotros',[]);
    }
    public static function propiedades(Router $router){
        // $servicios=Servicios::all();
        $router->render('paginas/propiedades',[
            // 'servicios'=>$servicios,
        ]);
    }
    
    public static function propiedad(Router $router){
        // $id=validarORediredireccionar('/propiedades');
        // Obtener los datos de la propiedad
        // $servicio = Servicio::find($id);
        $router->render('paginas/propiedad', [
            // 'propiedad' => $propiedad,
        ]);
    }
}