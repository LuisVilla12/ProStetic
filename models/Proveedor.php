<?php
namespace Model;
class Proveedor extends ActiveRecord{
    // Define la tabla
    protected static $tabla='proveedor';
    // Define los atributos en un arreglo
    protected static $atributos_DB=['id','nombre','telefono','correo','RFC','MetodoDePago','calle','colonia','numExt','numInt','CP','ciudad','estado'];

    public $id;
    public $nombre;
    public $telefono;
    public $correo;
    public $RFC;
    public $MetodoDePago;
    public $calle;
    public $colonia;
    public $numExt;
    public $numInt;
    public $CP;
    public $ciudad;
    public $estado;

    public function __construct($args = []){
        $this->id=$args['id']?? null;
        $this->nombre=$args['nombre']?? '';
        $this->telefono=$args['telefono']?? '';
        $this->correo=$args['correo']?? '';
        $this->RFC=$args['RFC']?? '';
        $this->MetodoDePago=$args['MetodoDePago']?? '';        
        $this->calle=$args['calle']?? '';        
        $this->colonia=$args['colonia']?? '';        
        $this->numExt=$args['numExt']?? '';        
        $this->numInt=$args['numInt']?? '';        
        $this->CP=$args['CP']?? '';        
        $this->ciudad=$args['ciudad']?? '';        
        $this->estado=$args['estado']?? '';        
    }

    public function validarErrores(){
        if (!$this->nombre) {
            self::$errores[] = 'Debe ingresar un nombre al proveedor';
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
        if (!$this->calle) {
            self::$errores[] = 'Debe ingresar una calle';
        }
        if (!$this->colonia) {
            self::$errores[] = 'Debe ingresar una colonia';
        }
        if (!$this->numExt) {
            self::$errores[] = 'Debe ingresar un numero exterior';
        }
        if (!$this->CP) {
            self::$errores[] = 'Debe ingresar un codigo postal';
        }
        if (!$this->ciudad) {
            self::$errores[] = 'Debe ingresar una ciudad';
        }
        if (!$this->estado) {
            self::$errores[] = 'Debe ingresar un estado';
        }
        return self::$errores;
    }
}
?>  