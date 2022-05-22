<?php 
namespace Controllers;

use Model\Servicio;
use MVC\Router;
class ServiciosController{

    public static function index(Router $router){
        estaAutenticado();
        $inicio=false;        
        $servicios= Servicio::all();
        $router->render('servicios/admin', [
            'inicio'=>$inicio,
            'servicios'=>$servicios
        ]); 
    }
    public static function crear(Router $router){
        $alertas = Servicio::getAlertas();
        $inicio=false;    
        $servicio= new Servicio();
        if($_SERVER['REQUEST_METHOD'] === 'POST') {                        
            $servicio = new Servicio($_POST['servicio']);
            $alertas=$servicio->validar();            
            if(empty($alertas)){
                $resultado=$servicio->guardar();     
                if($resultado['resultado']){
                    header('Location: /servicios/admin');
                }                           
            }            
        }
        $router->render('servicios/crear', [
            'inicio'=>$inicio,
            'alertas'=>$alertas,
            'servicio'=>$servicio
        ]); 
    }

    public static function actualizar(Router $router){
        $id=is_numeric($_GET['id']);
        if($id){
            $servicio= Servicio::find($_GET['id']);
        }else{
            header('Location: /servicios/admin');
        }
        $inicio=false;        
        $alertas = Servicio::getAlertas();        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $args=$_POST['servicio'];
            $servicio->sincronizar($args);   
            // Crea arreglo de errores
            $alertas = $servicio->validar();
             // Si el arreglo de errores esta vacio
            if (empty($alertas)) {
                $resultado=$servicio->guardar();
                if($resultado){
                    header('Location:/servicios/admin');
                }
            }
        }
        $router->render('servicios/actualizar', [
            'inicio'=>$inicio,
            'alertas'=>$alertas,
            'servicio'=>$servicio
        ]); 
    }
    public static function eliminar(Router $router){
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $servicio= Servicio::find($_POST['id']);
            $resultado=$servicio->eliminar();
            if($resultado){
                header('Location:/servicios/admin');
            }
            // debuguear($servicio);
        }
        // $router->render('servicios/crear', []); 
    }
}