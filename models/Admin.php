<?php
namespace Model;
class Admin extends ActiveRecord{
    protected static $tabla="usuario";
    protected static $atributos_DB=['idusuarios','correo','contraseña','usuario'];
    public $idusuarios;
    public $correo;
    public $contraseña;
    public $usuario;
    public function __construct($args = []){
        $this->idusuarios=$args['idusuarios']?? null;
        $this->correo=$args['correo']?? '';
        $this->contraseña=$args['contraseña']?? '';
        $this->usuario=$args['usuario']?? '';
    }
    public function validarErrores(){
        if (!$this->correo) {
            self::$errores[] = 'Debe ingresar un correo';
        }
        if (!$this->contraseña) {
            self::$errores[] = 'Debe ingresar una contraseña';
        }
        return self::$errores;
    }
   // PRUEBA
   public function existeUsuario(){
    // Revisar si usuario existe
    $query="SELECT * FROM " . self::$tabla . " WHERE correo = '" . $this->correo ."' LIMIT 1";
    $resultado =self::$db->query($query);
    if(!$resultado->num_rows){
        self::$errores[]='el usuario no existe';
    }
    return $resultado;
}
public function comprobarContraseña($resultado){
    $usuario=$resultado->fetch_object();
    $autenticado=password_verify($this->contraseña,$usuario->contraseña);
    if(!$autenticado){
        self::$errores[]='contraseña Erronea';
    }
    return $autenticado;    
}
public function autenticar(){
    // inicia session
    session_start();
    // llenar el arreglo
    $_SESSION['correo']=$this->correo;
    // $_SESSION['usuario']=$this->usuario;
    $_SESSION['login']= true;
    header('Location:/admin');
}
}

