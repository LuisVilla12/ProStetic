<?php 

namespace Controllers;

use MVC\Router;
use Model\Usuario;
use Clases\Correo;

class LoginControler {
    public static function login( Router $router) {
        $errores = [];
        $inicio=false;
        $usuario= new Usuario;
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = new Usuario($_POST);
            $usuarioEncontrado=$usuario->findWhere('correo',$usuario->correo);
            if($usuarioEncontrado){
                // verifica la contraseña
                $resultado_verificacion=$usuarioEncontrado->comprobarPassword($usuario->contraseña);
                if($resultado_verificacion){
                    // Verifica que la cuenta este confirmada
                    $resultado=$usuarioEncontrado->cuentaConfirmada();
                    if($resultado){
                        if(!isset($_SESSION)) {
                            session_start();
                        };                            
                        $_SESSION['id']=$usuarioEncontrado->id;
                        $_SESSION['nombre']=$usuarioEncontrado->nombre . " ".$usuarioEncontrado->apellidoPat;
                        $_SESSION['correo']=$usuarioEncontrado->correo;
                        $_SESSION['login']=true;
                        $_SESSION['tipo']=$usuarioEncontrado->idTipoUsuario;
                        // redireccionar
                        if($usuarioEncontrado->idTipoUsuario==="2"){
                            header('Location: /admin');
                        }
                        else{                                
                            header('Location: /');
                        }   
                    }
                }
            }else{
                Usuario::setErrores('Correo no registrado');
            }
        }
        $errores=Usuario::getErrores();
        $router->render('auth/login', [
            'errores' => $errores,
            'inicio'=>$inicio,
            'usuario'=>$usuario
        ]); 
    }
    
    public static function crearCuenta(Router $router) {
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
                // verificar que cuenta no este registrada
                $resultado=$usuario->validaCoreoRegistrado();
                if($resultado->num_rows){
                    $errores=Usuario::getErrores();
                }else{
                    // Generar token
                    $usuario->generarToken();
                    $correo = new Correo($usuario->correo, $usuario->nombre,$usuario->token);
                    $correo->enviarConfirmacion();
                    // Funcion apara guardar
                    $usuario->guardar();
                    if($resultado){
                        header('Location: /mensaje');
                    }
                }
            }
        }
        $router->render('auth/crear-cuenta', [
            'usuario' => $usuario,
            'errores' => $errores,
            'inicio'=>$inicio
        ]);
    
    }
    public static function confirmarCuenta(Router $router){
        $inicio=false;
        $errores=[];
        $token=sanitizar($_GET['token']);
        $usuario=Usuario::findWhere('token',$token);
        if(empty($usuario)){
            Usuario::setErrores('Token no valido');
        }
        else{
            $usuario->confirmado=1;
            $usuario->guardar();
            header('Location:/login');
        }
        $errores=Usuario::getErrores();
        $router->render('auth/confirmar-cuenta',[
            'inicio'=>$inicio,
            'errores'=>$errores
        ]);
    }
    public static function mensaje(Router $router){
        $inicio=false;
        $router->render('auth/mensaje',[
            'inicio'=>$inicio
        ]);
    }
    public static function logout() {
        session_start();
        $_SESSION = [];
        header('Location: /');
    }
}