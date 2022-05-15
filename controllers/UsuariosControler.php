<?php

namespace Controllers;

use MVC\Router;
use Model\Usuario;

class UsuariosControler{
    public static function index(Router $router)    {
        $usuarios = Usuario::allClientes();
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
        $alertas = Usuario::getAlertas();
        $inicio=false;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $usuario = new Usuario($_POST['usuario']);
            $alertas = $usuario->validarErrores();

            $contraseña=$_POST['usuario']['contraseña'];
            $confirmar_contraseña=$_POST['usuario']['confirmar_contraseña'];
            if(!$contraseña===""){
                $alertas['error'][]='Debe ingresar una contraseña';    
            }        
            if(!($contraseña===$confirmar_contraseña)){
                $alertas['error'][]='Contraseñas no coinciden';
            }                     
            // Si el arreglo de errores esta vacio
            if (empty($alertas)) {
                $usuario->contraseña=password_hash($usuario->contraseña,PASSWORD_BCRYPT);
                $usuario->confirmado=1;
                // Funcion apara guardar
                $resultado=$usuario->guardar();
                if($resultado){
                    header('Location: /usuarios/admin');
                }
            }
        }
        $router->render('usuarios/crear', [
            'usuario' => $usuario,
            'alertas' => $alertas,
            'inicio'=>$inicio
        ]);
    }
    public static function actualizar(Router $router){
        $id=validarORediredireccionar('/usuarios/admin');
        $usuario=Usuario::find($id);
        $contraseña=$usuario->contraseña;
        debuguear($contraseña);
        $alertas = Usuario::getAlertas();
        $inicio=false;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $args=$_POST['usuario'];
            $usuario->sincronizar($args);            
            // si el usuario no ingresa una contraseña nueva se le asigna nuevamente la anterior
            if(!$usuario->contraseña){
                $usuario->contraseña=$contraseña;
            }else{
                // en caso contrario hashea la nueva
                $usuario->contraseña=password_hash($usuario->contraseña,PASSWORD_BCRYPT);
            }            
            // Crea arreglo de errores            
            $alertas = $usuario->validarErrores();  
             // Si el arreglo de errores esta vacio
            if (empty($alertas)) {                                
                // Funcion apara guardar
                $resultado=$usuario->guardar();
                if($resultado){
                    header('Location: /usuarios/admin');
                }
            }
        }
        $router->render('usuarios/actualizar', [
            'usuario' => $usuario,
            'alertas' => $alertas,
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
                        $resultado=$usuarios->eliminar('eliminar');    
                        if($resultado){
                            header('Location: /usuarios/admin');
                        }   
                    }
                }
            }
        }
    }
}
