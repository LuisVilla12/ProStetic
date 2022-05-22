<?php 

namespace Controllers;

use MVC\Router;

class CitaController {    
    public static function index(Router $router){
        $nombre=$_SESSION['nombre'];       
        $id=$_SESSION['id'];       
        // $horarios=Horarios::all();
        
        $router->render('cita/cita',[
            'nombre'=>$nombre,
            'id'=>$id
            // 'horarios'=>$horarios
        ]);
    }
}