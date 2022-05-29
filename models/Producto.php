<?php
namespace Model;
class Producto extends ActiveRecord{
    // Define la tabla
    protected static $tabla='producto';
    // Define los atributos en un arreglo
    protected static $columnasDB=['id','marca','nombre','descripcion','precioCompra','precioVenta','idProveedor','cantidad'];

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
        $this->cantidad=$args['cantidad']?? '';
    }

    public function validarErrores(){
        if (!$this->nombre|| strlen($this->nombre)<5) {
            self::$alertas['error'][] = 'Debe ingresar un nombre del producto';
        }
        if (!$this->idProveedor) {
            self::$alertas['error'][] = 'Debe seleccionar un proveedor del producto';
        }
        if (!$this->marca|| strlen($this->marca)<5) {
            self::$alertas['error'][] = 'Debe ingresar un n° de marca';
        }
        if (!$this->precioVenta|| strlen($this->marca)<1) {
            self::$alertas['error'][] = 'Debe ingresar el precio de venta';
        }
        if (!$this->precioCompra|| strlen($this->marca)<1) {
            self::$alertas['error'][] = 'Debe ingresar el precio de compra';
        }
        if (!$this->cantidad) {
            self::$alertas['error'][] = 'Debe ingresar una cantidad';
        }
        return self::$alertas;
    }    
    public function eliminarProducto() {
        // UPDATE agenda SET telefono='662142223' , email='albesanch@mimail.com' WHERE nombre='Alberto Sanchez'
        $total = $this->cantidad-1;
        $query="UPDATE ". static::$tabla ." SET cantidad = ". $total  ." WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
        $resultado = self::$db->query($query);
        return $resultado;
    }
}
?>  