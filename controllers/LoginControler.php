<?php 
namespace Controllers;

use MVC\Router;
use Model\Admin;

class LoginControler{
    public static function login(Router $router){
        $errores=[];
        $inicio=false;
        if($_SERVER['REQUEST_METHOD']==='POST'){
            $auth = new Admin($_POST);
            $errores= $auth->validarErrores();
            if(empty($errores)){
                // verificar si usuario existe
                $resultado=$auth->existeUsuario();
                if(!$resultado){
                    // sino existe el usuario marca el error
                    $errores=Admin::getErrores();
                }else{                    
                    $resultadoAutenticar=$auth->comprobarContraseña($resultado);
                    if($resultadoAutenticar){
                        $auth->autenticar();
                    }
                    else{
                        $errores=Admin::getErrores();
                    }
                }
            }
        }
        $router->render('auth/login',[
            'errores'=>$errores,
            'inicio'=>$inicio
        ]);

    }
    public static function logout(){
        session_start();
        $_SESSION=[];
        header('Location:/');
    }
}