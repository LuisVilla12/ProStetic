<?php

namespace Controllers;

use Model\Domicilio;
use MVC\Router;
use Model\Usuario;

class EmpleadoControler{
    public static function index(Router $router)    {
        $usuarios = Usuario::allEmpleados();
        $registro = $_GET['registro'] ?? null;
        $inicio=false;
        // Manda datos a la vista
        $router->render('empleados/admin', [
            'usuarios' => $usuarios,
            'registro' => $registro,
            'inicio'=>$inicio
        ]);
    }

    public static function crear(Router $router){       
        $usuario = new Usuario();
        $domicilio = new Domicilio();
        $alertas = Usuario::getAlertas();        
        $inicio=false;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $usuario = new Usuario($_POST['usuario']);
            $domicilio = new Domicilio($_POST['domicilio']);
            $alertas = $usuario->validarErrores();            
            $contraseña=$_POST['usuario']['contraseña'];
            $confirmar_contraseña=$_POST['usuario']['confirmar_contraseña'];
            $calle=$_POST['domicilio']['calle'];
            $colonia=$_POST['domicilio']['colonia'];
            $CP=$_POST['domicilio']['CP'];            
            if(!$contraseña===""){
                $alertas['error'][]='Debe ingresar una contraseña';    
            }        
            if(!($contraseña===$confirmar_contraseña)){
                $alertas['error'][]='Contraseñas no coinciden';
            }
            if($calle===""){
                $alertas['error'][]='Debe ingresar una calle';
            } 
            if($colonia===""){
                $alertas['error'][]='Debe ingresar una colonia';
            }            
            if($CP===""){
                $alertas['error'][]='Debe ingresar una CP';
            }                                   
            // Si el arreglo de errores esta vacio
            if (empty($alertas)) {
                $usuario->contraseña=password_hash($usuario->contraseña,PASSWORD_BCRYPT);
                $usuario->confirmado=1;
                $usuario->idTipoUsuario=2;
                // Funcion apara guardar
                $resultado=$usuario->guardar();
                $domicilio->id_usuario=$resultado['id'];
                $resultado2=$domicilio->guardar();
                // debuguear($resultado);
                // debuguear($resultado2);                
                if($resultado&&$resultado2){                    
                    header('Location: /empleados/admin');                
                }
            }
        }
        $router->render('empleados/crear', [
            'usuario' => $usuario,
            'domicilio'=>$domicilio,
            'alertas' =>  $alertas,
            'inicio'=>$inicio
        ]);
    }
    public static function actualizar(Router $router){
        $id=validarORediredireccionar('/');
        $usuario=Usuario::find($id);        
        debuguear($usuario->contraseña);
        $domicilio=Domicilio::find($id);        
        $alertas = Usuario::getAlertas();                
        $inicio=false;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $args=$_POST['usuario'];
            $args=$_POST['domicilio'];
            $contraseña=$_POST['usuario']['contraseña'];
            $usuario->sincronizar($args);
            $domicilio->sincronizar($args);            
            // debuguear($domicilio);
            // debuguear($contraseña);            
            // debuguear($usuario);
            // si el usuario no ingresa una contraseña nueva se le asigna nuevamente la anterior
            if(!$contraseña){
                $contraseña=$usuario->contraseña;
                // debuguear($usuario->contraseña);
                $usuario->contraseña=$contraseña; 
                // debuguear($usuario->contraseña);               
                echo 'VIEJA';
            }else{
                // en caso contrario hashea la nueva
                $usuario->contraseña=password_hash($usuario->contraseña,PASSWORD_BCRYPT);
                echo 'NUEVA';
            }                   
            debuguear($usuario);            
            // Crea arreglo de errores
            $alertas = $usuario->validarErrores();
            // valida
            if($domicilio->calle===""){
                $alertas['error'][]='Debe ingresar una calle';
            } 
            if($domicilio->colonia===""){
                $alertas['error'][]='Debe ingresar una colonia';
            }            
            if($domicilio->CP===""){
                $alertas['error'][]='Debe ingresar una CP';
            }
            // debuguear($alertas);
             // Si el arreglo de errores esta vacio
            if (empty( $alertas)) {
                $resultado=$usuario->guardar();
                $resultado2=$domicilio->guardar();
                // debuguear($resultado);
                // debuguear($resultado2);                                
                if($resultado&&$resultado2){                    
                    header('Location: /empleados/admin');                
                }
            }
        }
        $router->render('empleados/actualizar', [
            'usuario' => $usuario,
            'domicilio'=>$domicilio,
            'alertas' =>  $alertas,
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
                        $resultado=$usuarios->eliminar();                                                    
                        if($resultado){
                            header('Location: /empleados/admin');                                            
                        }
                    }
                }
            }
        }
    }
}
