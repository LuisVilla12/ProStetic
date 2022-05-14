<?php
namespace Model;

class Proveedor extends ActiveRecord{
    // Define la tabla
    protected static $tabla='proveedor';
    // Define los atributos en un arreglo
    protected static $columnasDB=['id','nombre','telefono','correo','RFC','MetodoDePago','calle','colonia','numExt','numInt','CP','ciudad','estado','estadoProveedor'];

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
    public $estadoProveedor;

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
        $this->estadoProveedor=$args['estadoProveedor']?? 1;        
    }

    public function validarErrores(){
        if (!$this->nombre || strlen($this->nombre)<5) {
            self::$alertas['error'][] = 'Debes ingresar un nombre al proveedor';
        }
        if (!$this->RFC|| strlen($this->RFC)<5) {
            self::$alertas['error'][] = 'Debes ingresar un RFC valido';
        }
        if (!$this->calle|| strlen($this->calle)<3) {
            self::$alertas['error'][] = 'Debes ingresar una calle';
        }
        if (!$this->colonia|| strlen($this->colonia)<5) {
            self::$alertas['error'][] = 'Debes ingresar una colonia';
        }
        if (!$this->numExt) {
            self::$alertas['error'][] = 'Debe ingresar un numero exterior';
        }
        if (!$this->CP || strlen($this->CP)<4) {
            self::$alertas['error'][] = 'Debe ingresar un codigo postal';
        }
        if (!$this->ciudad|| strlen($this->ciudad)<4) {
            self::$alertas['error'][] = 'Debe ingresar una ciudad';
        }
        if (!$this->estado || strlen($this->estado)<4) {
            self::$alertas['error'][] = 'Debe ingresar un estado';
        }
        if (!$this->telefono|| strlen($this->telefono)<9||strlen($this->telefono)>11) {
            self::$alertas['error'][] = 'Debe ingresar un n° de telefono valido';
        }
        if (!$this->correo|| strlen($this->correo)<6) {
            self::$alertas['error'][] = 'Debe ingresar un correo electronico';
        }                                
        if (!$this->MetodoDePago) {
            self::$alertas['error'][] = 'Debe seleccionar un metodo de pago';
        }                                
        return self::$alertas;
    }
    public static function allProveedores() {
        $query = "SELECT * FROM " . static::$tabla . " WHERE estadoProveedor = ". 1;
        $resultado = self::consultarSQL($query);
        return $resultado;
    }
    public function cambiarStatus() {
        // UPDATE agenda SET telefono='662142223' , email='albesanch@mimail.com' WHERE nombre='Alberto Sanchez'
        $query="UPDATE ". static::$tabla ." SET estadoProveedor = ". 0  ." WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
        $resultado = self::$db->query($query);
        return $resultado;
    }
}
?>  