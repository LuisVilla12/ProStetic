<?php 

namespace Controllers;

use MVC\Router;
use Model\Usuario;

class LoginControler {
    public static function login( Router $router) {
        $errores = [];
        $inicio=false;
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth = new Usuario($_POST);
            $resultado = $auth->existeUsuario();
            if( !$resultado ) {
                $errores = Usuario::getErrores();
            } else {
                $auth->comprobarPassword($resultado);
                if($auth->autenticado) {
                    $auth->autenticar();
                    
                } else {
                    $errores =Usuario::getErrores();
                }
            }
        }

        $router->render('auth/login', [
            'errores' => $errores,
            'inicio'=>$inicio
        ]); 
    }

    public static function logout() {
        session_start();
        $_SESSION = [];
        header('Location: /');
    }
}