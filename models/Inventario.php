<?php
namespace Model;
class Inventario extends ActiveRecord{
    // Define la tabla
    protected static $tabla='producto';
    // Define los atributos en un arreglo
    protected static $columnasDB=['id','nombre','nombreProveedor','precioVenta','cantidad'];
    public $id;
    public $nombre;
    public $nombreProveedor;
    public $precioVenta;
    public $cantidad;
    public function __construct($args = []){
        $this->id=$args['id']?? null;
        $this->nombre=$args['nombre']?? '';
        $this->nombreProveedor=$args['nombreProveedor']?? '';
        $this->precioVenta=$args['precioVenta']?? '';
        $this->cantidad=$args['cantidad']?? '';
    }
    public static function allProductos() {        
        $query="SELECT p.id,p.nombre as nombre,v.nombre as nombreProveedor,p.cantidad,p.precioVenta from producto as p INNER join proveedor as v on p.idProveedor=v.id";
        $resultado = self::consultarSQL($query);
        return $resultado;
    }
}