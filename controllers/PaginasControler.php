<?php
namespace Controllers;

use MVC\Router;

class PaginasControler {
    public static function index(Router $router){
        $inicio=true;
        $router->render('paginas/index',[
            'inicio'=>$inicio
        ]);
    }
    public static function menu(Router $router){
        $inicio=false;
        $router->render('paginas/admin',[
            'inicio'=>$inicio
        ]);
    }
    public static function inicio(Router $router){
        $inicio=false;
        $router->render('agenda/inicio',[
            'inicio'=>$inicio
        ]);
    }
    public static function cita(Router $router){
        $inicio=false;
        $router->render('cita/cita',[
            'inicio'=>$inicio
        ]);
    }
}