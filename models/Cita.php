<?php 
namespace Model;
class Cita extends ActiveRecord{
    protected static $tabla = 'citas';
    protected static $columnasDB = ['id','idUsuario','fecha','id_horario','asistio','cancelar'];
    public $id;
    public $idUsuario;
    public $fecha;
    // public $hora;
    public $id_horario;
    public $asistio;
    public $cancelar;

    public function __construct($args=[]){
        $this->id=$args['id']??null;
        $this->idUsuario=$args['idUsuario']??'';
        $this->fecha=$args['fecha']??'';
        $this->id_horario=$args['id_horario']??1;
        $this->asistio=$args['asistio']??0;
        $this->cancelar=$args['cancelar']??0;
    }
    // Consultar base de datos
    public  static function asistir($id) {
        $query = "UPDATE " .  static::$tabla .  " SET asistio=1  WHERE id=" .$id;        
        $resultado = self::$db->query($query);  
        return $resultado;              
    }
    public  static function pagar($id) {
        $query = "UPDATE " .  static::$tabla .  " SET pagado=1  WHERE id=" .$id;        
        $resultado = self::$db->query($query);  
        return $resultado;              
    }
    public static function cancelar($id) {
        $query = "UPDATE " .  static::$tabla . " SET cancelar=1  WHERE id=" . $id;        
        $resultado = self::$db->query($query);        
        return $resultado;
    }


    // PRUEBAS HORARIO
    public function existeCitaEnEseDia($fecha){
        $query="SELECT * FROM " . self::$tabla . " WHERE fecha = '" . $fecha ."'";
        $resultado = self::$db->query($query);
        if($resultado->num_rows){
            return true;
        }else{
            return false;
        }
    }    

    public function existeCitaEnEseHorario($fecha,$horario){
        // $query="SELECT * FROM " . $horarios . " WHERE fecha = '" . $fecha ."'";
        $query= "SELECT * FROM  citas as c inner join horarios as h on c.id_horario=h.id WHERE fecha= '" .$fecha . "'" . " AND ". $horario . " = " . "h.id";
        // echo debuguear($query);
        // exit;
        $resultado = self::$db->query($query);
        // debuguear ($resultado);
        if($resultado->num_rows==0){
            // debuguear ('hola');
            return true;
        }else{
            // debuguear ('adios');
            return false;
        }
    }    
    public static function horariosNoDisponibles($horario,$fecha) {
        $query= "SELECT cs.idServicio FROM  citas as c inner join citas_servicios as cs on cs.idCita=c.id inner join horarios as h on c.id_horario=h.id WHERE fecha= '" .$fecha . "'" . " AND ". $horario . " = " . "h.id";
        // debuguear($query);
        $resultado = self::consultarSQL($query);
        debuguear($resultado);
        return $resultado;
    }

    public static function horariosNoDisponibles2($fecha,$horario) {
        $query= "SELECT c.id,h.horaInicio,h.horaFin FROM  citas as c inner join horarios as h on c.id_horario=h.id WHERE fecha= '" .$fecha . "'" . " AND ". $horario . " = " . "h.id";
        // $query = "SELECT * FROM " . static::$tabla;
        $resultado = self::consultarSQL($query);
        debuguear($resultado);
        exit;
        return $resultado;
        
    }
}
?>