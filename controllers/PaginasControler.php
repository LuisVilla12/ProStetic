<?php
namespace Controllers;

use MVC\Router;
use Model\Horarios;
use Model\Servicio;

class PaginasControler {
    public static function index(Router $router){
        $inicio=true;
        $servicios=Servicio::allLimit();
        $router->render('paginas/index',[
            'inicio'=>$inicio,
            'servicios'=>$servicios
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
        inicioSesion();
        $horarios=Horarios::all();
        $router->render('cita/cita',[
            'inicio'=>$inicio,
            'horarios'=>$horarios
        ]);
    }    
}