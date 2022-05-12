<?php 
namespace Model;

class Servicio extends ActiveRecord{
    protected static $tabla = 'servicios';
    protected static $atributos_DB = ['id','nombre','precio_1','precio_2','duracion'];
    public $id;
    public $nombre;
    public $precio_1;
    public $precio_2;
    public $duracion;
    
    public function __construct($args=[]){
        $this->id=$args['id']??null;
        $this->nombre=$args['nombre']??'';
        $this->precio=$args['precio_1']??'';
        $this->precio=$args['precio_2']??'';
        $this->precio=$args['duracion']??'';
    }
}
?>