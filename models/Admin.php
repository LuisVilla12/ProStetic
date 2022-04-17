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
}

