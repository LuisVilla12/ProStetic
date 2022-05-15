<?php
namespace Model;
class Domicilio extends ActiveRecord{
// Define la tabla
protected static $tabla='domicilios';
// Define los atributos en un arreglo
protected static $columnasDB=['id','id_usuario','calle','colonia','CP'];
    public $id;
    public $id_usuario;
    public $calle;
    public $colonia;
    public $CP;
    public function __construct($args = []){
        $this->id=$args['id']?? null;
        $this->id_usuario=$args['id_usuario']?? '';
        $this->calle=$args['calle']?? '';
        $this->colonia=$args['colonia']?? '';        
        $this->CP=$args['CP']?? '';        
    }
    // Busca un registro por su id
    public static function find($id) {
        $query = "SELECT * FROM " . static::$tabla  ." WHERE id_usuario = ${id}";
        $resultado = self::consultarSQL($query);
        return array_shift( $resultado ) ;
    }
}