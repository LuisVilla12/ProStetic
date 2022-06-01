<?php 
namespace Model;

class ServicioTEMP extends ActiveRecord{
    protected static $tabla = 'servicios';
    protected static $columnasDB = ['id'];
    public $id;

    public function __construct($args=[]){
        $this->id=$args['id']??'';
    }
    // public static function horariosNoDisponibles($horario,$fecha) {
    //     $query= "SELECT cs.idServicio FROM  citas as c inner join citas_servicios as cs on cs.idCita=c.id inner join horarios as h on c.id_horario=h.id WHERE fecha= '" .$fecha . "'" . " AND ". $horario . " = " . "h.id";
    //     $resultado = self::consultarSQL($query);
    //     debuguear($resultado);
    //     return $resultado;
    // }
    public static function horariosNoDisponibles($horario,$fecha) {
        $query= "SELECT cs.idServicio as id FROM  citas as c inner join citas_servicios as cs on cs.idCita=c.id inner join horarios as h on c.id_horario=h.id WHERE fecha= '" .$fecha . "'" . " AND ". $horario . " = " . "h.id";
        debuguear($query);
        $resultado = self::consultarSQL($query);
        debuguear($resultado);
        debuguear($fecha);
        debuguear($horario);
        return $resultado;
    }

}
?>