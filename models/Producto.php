<?php
namespace Model;
class Producto extends ActiveRecord{
    // Define la tabla
    protected static $tabla='producto';
    // Define los atributos en un arreglo
    protected static $atributos_DB=['id','marca','nombre','descripcion','precioCompra','precioVenta','idProveedor','cantidad'];

    public $id;
    public $marca;
    public $nombre;
    public $descripcion;
    public $precioCompra;
    public $precioVenta;
    public $idProveedor;
    public $cantidad;
    

    public function __construct($args = []){
        $this->id=$args['id']?? null;
        $this->nombre=$args['nombre']?? '';
        $this->marca=$args['marca']?? '';
        $this->descripcion=$args['descripcion']?? '';
        $this->precioCompra=$args['precioCompra']?? '';
        $this->precioVenta=$args['precioVenta']?? '';
        $this->idProveedor=$args['idProveedor']?? '';
    }

    public function validarErrores(){
        if (!$this->nombre) {
            self::$errores[] = 'Debe ingresar un nombre del producto';
        }
        if (!$this->marca) {
            self::$errores[] = 'Debe ingresar un n° de marca';
        }
        if (!$this->descripcion) {
            self::$errores[] = 'Debe ingresar un descripcion electronico';
        }
        if (!$this->precioVenta) {
            self::$errores[] = 'Debe ingresar el precio de venta';
        }
        if (!$this->precioCompra) {
            self::$errores[] = 'Debe ingresar el precio de compra';
        }
        if (!$this->idProveedor) {
            self::$errores[] = 'Debe seleccionar un proveedor del producto';
        }
        if (!$this->idProveedor) {
            self::$errores[] = 'Debe ingresar una cantidad';
        }
        return self::$errores;
    }
}
?>  