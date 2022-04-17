<?php
namespace Model;
class Usuario extends ActiveRecord{
    // Define la tabla
    protected static $tabla='usuario';
    // Define los atributos en un arreglo
    protected static $atributos_DB=['id','idTipoUsuario','nombre','apellidoPat','apellidoMat','telefono','correo','contraseña'];

    public $id;
    public $idTipoUsuario;
    public $nombre;
    public $apellidoPat;
    public $apellidoMat;
    public $telefono;
    public $correo;
    public $contraseña;

    public function __construct($args = []){
        $this->id=$args['id']?? null;
        $this->idTipoUsuario=$args['idTipoUsuario']?? 1;
        $this->nombre=$args['nombre']?? '';
        $this->apellidoPat=$args['apellidoPat']?? '';        
        $this->apellidoMat=$args['apellidoMat']?? '';        
        $this->telefono=$args['telefono']?? '';
        $this->correo=$args['correo']?? '';
        $this->contraseña=$args['contraseña']?? '';        
    }

    public function validarErrores(){        
        if (!$this->nombre) {
            self::$errores[] = 'Debe ingresar su nombre';
        }
        if (!$this->apellidoPat) {
            self::$errores[] = 'Debe ingresar su apellido Paterno';
        }
        if (!$this->apellidoMat) {
            self::$errores[] = 'Debe ingresar su apellido Materno';
        }
        if (!$this->telefono) {
            self::$errores[] = 'Debe ingresar un n° de telefono';
        }
        if (!$this->correo) {
            self::$errores[] = 'Debe ingresar un correo electronico';
        }
        if (!$this->contraseña) {
            self::$errores[] = 'Debe ingresar una contraseña';
        }
        return self::$errores;
    }

    
}
?>  