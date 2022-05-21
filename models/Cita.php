<?php 
namespace Model;
class Cita extends ActiveRecord{
    protected static $tabla = 'citas';
    protected static $columnasDB = ['id','idUsuario','fecha','hora','asistio'];
    public $id;
    public $idUsuario;
    public $fecha;
    public $hora;
    public $asistio;

    public function __construct($args=[]){
        $this->id=$args['id']??null;
        $this->idUsuario=$args['idUsuario']??'';
        $this->fecha=$args['fecha']??'';
        $this->hora=$args['hora']??'';
        $this->asistio=$args['asistio']??0;
    }
    // Consultar base de datos
    public function asistio($id) {
        
    }
}
?>