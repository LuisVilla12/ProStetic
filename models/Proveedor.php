<?php
namespace Model;
class Proveedor extends ActiveRecord{
    // Define la tabla
    protected static $tabla='proveedor';
    // Define los atributos en un arreglo
    protected static $atributos_DB=['id','nombre','direccion','telefono','correo','RFC','MetodoDePago'];

    public $id;
    public $nombre;
    public $direccion;
    public $telefono;
    public $correo;
    public $RFC;
    public $MetodoDePago;

    public function __construct($args = []){
        $this->id=$args['id']?? null;
        $this->nombre=$args['nombre']?? '';
        $this->direccion=$args['direccion']?? '';
        $this->telefono=$args['telefono']?? '';
        $this->correo=$args['correo']?? '';
        $this->RFC=$args['RFC']?? '';
        $this->MetodoDePago=$args['MetodoDePago']?? '';        
    }

    public function validarErrores(){
        if (!$this->nombre) {
            self::$errores[] = 'Debe ingresar un nombre al proveedor';
        }
        if (!$this->direccion) {
            self::$errores[] = 'Debe ingresar una dirección';
        }
        if (!$this->telefono) {
            self::$errores[] = 'Debe ingresar un n° de telefono';
        }
        if (!$this->correo) {
            self::$errores[] = 'Debe ingresar un correo electronico';
        }
        if (!$this->RFC) {
            self::$errores[] = 'Debe ingresar el RFC';
        }
        return self::$errores;
    }
}
?>  