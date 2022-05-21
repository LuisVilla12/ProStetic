<?php
namespace Model;
class AdminCita extends ActiveRecord{
    protected static $tabla ='citas_servicios';
    protected static $columnasDB =['id','hora','cliente','correo','telefono','servicio','precio_1'];
    public $id;
    public $hora;
    public $cliente;
    public $correo;
    public $telefono;
    public $servicio;
    public $precio_1;
    public function __construct($args=[]){
        $this->id=$args['id']??null;
        $this->hora=$args['hora']??'';
        $this->cliente=$args['cliente']??'';
        $this->correo=$args['correo']??'';
        $this->telefono=$args['telefono']??'';
        $this->servicio=$args['servicio']??'';
        $this->precio_1=$args['precio_1']??'';
        
    }
}
?> 