<?php 
namespace Model;
class Cita extends ActiveRecord{
    protected static $tabla = 'citas';
    protected static $columnasDB = ['id','idUsuario','fecha','hora','asistio','cancelar'];
    public $id;
    public $idUsuario;
    public $fecha;
    public $hora;
    public $asistio;
    public $cancelar;

    public function __construct($args=[]){
        $this->id=$args['id']??null;
        $this->idUsuario=$args['idUsuario']??'';
        $this->fecha=$args['fecha']??'';
        $this->hora=$args['hora']??'';
        $this->asistio=$args['asistio']??0;
        $this->cancelar=$args['cancelar']??0;
    }
    // Consultar base de datos
    public  static function asistir($id) {
        $query = "UPDATE " .  static::$tabla .  " SET asistio=1  WHERE id=" .$id;        
        $resultado = self::$db->query($query);  
        return $resultado;              
    }
    public static function cancelar($id) {
        $query = "UPDATE " .  static::$tabla . " SET cancelar=1  WHERE id=" . $id;        
        $resultado = self::$db->query($query);        
        return $resultado;
    }
}
?>