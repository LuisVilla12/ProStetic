<?php 
namespace Model;

class Servicio extends ActiveRecord{
    protected static $tabla = 'servicios';
    protected static $columnasDB = ['id','nombre','precio_1','precio_2','duracion'];

    public $id;
    public $nombre;
    public $precio_1;
    public $precio_2;
    public $duracion;
    
    public function __construct($args=[]){
        $this->id=$args['id']??null;
        $this->nombre=$args['nombre']??'';
        $this->precio_1=$args['precio_1']??'';
        $this->precio_2=$args['precio_2']?? '';
        $this->duracion=$args['duracion']??'';
    }
    public function validar(){
        if (!$this->nombre) {
            self::$alertas['error'][] = 'Debe ingresar un nombre del servicio';
        }
        if (!$this->precio_1) {
            self::$alertas['error'][] = 'Debe ingresar un precio del servicio';
        }
        if (!$this->duracion) {
            self::$alertas['error'][] = 'Debe ingresar una duración del servicio';
        }
        return self::$alertas;
    }
}
?>