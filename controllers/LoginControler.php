<?php 

namespace Controllers;

use MVC\Router;
use Model\Usuario;

class LoginController {
    public static function login( Router $router) {
        $errores = [];
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth = new Admin($_POST);
            $errores = $auth->validarErrores();
        
            if(empty($errores)) {
                $resultado = $auth->existeUsuario();
                if( !$resultado ) {
                    $errores = Admin::getErrores();
                } else {
                    $resultadoAutenticar=$auth->comprobarContraseña($resultado);
                    if($resultadoAutenticar) {
                       $auth->autenticar();
                    } else {
                        $errores =Admin::getErrores();
                    }
                }
            }
        }

        $router->render('auth/login', [
            'errores' => $errores
        ]); 
    }

    public static function logout() {
        session_start();
        $_SESSION = [];
        header('Location: /');
    }
}