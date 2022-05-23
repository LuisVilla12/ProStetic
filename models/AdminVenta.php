<?php
namespace Model;
class AdminVenta extends ActiveRecord{
    protected static $tabla ='citas_servicios';
    protected static $columnasDB =['id','horaInicio','cliente','correo','telefono','servicio','precio_1'];
    public $id;
    // public $fecha;
    public $horaInicio;
    public $cliente;
    public $servicio;
    public $precio_1;
    public function __construct($args=[]){
        $this->id=$args['id']??null;
        // $this->fecha=$args['fecha']??'';
        $this->horaInicio=$args['horaInicio']??'';
        $this->cliente=$args['cliente']??'';        
        $this->servicio=$args['servicio']??'';
        $this->precio_1=$args['precio_1']??'';
        
    }
}
?>  