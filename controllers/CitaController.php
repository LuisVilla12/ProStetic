<?php 

namespace Controllers;

use MVC\Router;

class CitaController {
    public static function index(Router $router){
        $nombre=$_SESSION['nombre'];       
        $id=$_SESSION['id'];       
        $router->render('cita/index',[
            'nombre'=>$nombre,
            'id'=>$id
        ]);
    }

}