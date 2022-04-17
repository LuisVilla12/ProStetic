<?php

namespace Controllers;

use MVC\Router;
use Model\Usuario;

class UsuariosControler{
    public static function index(Router $router)    {
        $usuarios = Usuario::all();
        $registro = $_GET['registro'] ?? null;
        $inicio=false;
        // Manda datos a la vista
        $router->render('usuarios/admin', [
            'usuarios' => $usuarios,
            'registro' => $registro,
            'inicio'=>$inicio
        ]);
    }

    public static function crear(Router $router){       
        $usuario = new Usuario();
        $errores = Usuario::getErrores();
        $inicio=false;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $contraseña=$_POST['usuario']['contraseña'];
            $confirmar_contraseña=$_POST['usuario']['confirmar_contraseña'];

            $usuario = new Usuario($_POST['usuario']);
            $usuario->contraseña=password_hash($usuario->contraseña,PASSWORD_BCRYPT);
            // Funcion para validar errores
            $errores = $usuario->validarErrores();

            if(!($contraseña===$confirmar_contraseña)){
                $errores[]='Contraseñas no coinciden';
            }
            // Si el arreglo de errores esta vacio
            if (empty($errores)) {
                // Funcion apara guardar
                $usuario->guardar();
            }
        }
        $router->render('usuarios/crear', [
            'usuario' => $usuario,
            'errores' => $errores,
            'inicio'=>$inicio
        ]);
    }
    public static function actualizar(Router $router){
        $id=validarORediredireccionar('/');
        $usuario=Usuario::find($id);
        $errores = Usuario::getErrores();
        $inicio=false;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $args=$_POST['usuario'];
            $usuario->sincronizar($args);
         // Crea arreglo de errores
            $errores = $usuario->validarErrores();
             // Si el arreglo de errores esta vacio
            if (empty($errores)) {
                $usuario->guardar();
            }
        }
        $router->render('usuarios/actualizar', [
            'usuario' => $usuario,
            'errores' => $errores,
            'inicio'=>$inicio
        ]);
    }
    public static function eliminar(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $tipo = $_POST['tipo'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
            if ($id) {
                if(validarTipoDeContenido($tipo)){
                    if($tipo==='usuario'){
                        $usuarios=Usuario::find($id);
                        $usuarios->eliminar('usuarios');    
                    }
                }
            }
        }
    }
}
