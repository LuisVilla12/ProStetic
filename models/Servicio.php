<?php 
namespace Model;

class Servicio extends ActiveRecord{
    protected static $tabla = 'servicios';
    protected static $columnasDB = ['id','nombre','precio_1','precio_2','duracion','url'];

    public $id;
    public $nombre;
    public $precio_1;
    public $precio_2;
    public $duracion;
    public $url;
    
    public function __construct($args=[]){
        $this->id=$args['id']??null;
        $this->nombre=$args['nombre']??'';
        $this->precio_1=$args['precio_1']??'';
        $this->precio_2=$args['precio_2']?? '';
        $this->duracion=$args['duracion']??'';
        $this->url=$args['url']??'';
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
    // public static function horariosNoDisponibles($horario,$fecha) {
    //     $query= "SELECT cs.idServicio FROM  citas as c inner join citas_servicios as cs on cs.idCita=c.id inner join horarios as h on c.id_horario=h.id WHERE fecha= '" .$fecha . "'" . " AND ". $horario . " = " . "h.id";
    //     $resultado = self::consultarSQL($query);
    //     debuguear($resultado);
    //     return $resultado;
    // }
}
?>