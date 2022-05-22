<?php
namespace Controllers;

use MVC\Router;
use Model\Horarios;

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
        $horarios=Horarios::all();
        $router->render('cita/cita',[
            'inicio'=>$inicio,
            'horarios'=>$horarios
        ]);
    }
}