<?php 
namespace Model;
class Horarios extends ActiveRecord{    
    protected static $tabla = 'horarios';
    protected static $columnasDB=['id','horaInicio','horaFin'];

    public $id;
    public $horaInicio;
    public $horaFin;
    public function __construct($args = []){
        $this->id=$args['id']?? null;
        $this->horaInicio=$args['horaInicio']?? '';
        $this->horaFin=$args['horaFin']?? '';              
    }
}    
?>  