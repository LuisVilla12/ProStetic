<?php
namespace Model;
class AdminProveedor extends ActiveRecord{
    protected static $tabla ='Proveedores';
    protected static $columnasDB =['id','horaInicio','cliente','correo','telefono','servicio','precio_1'];
    public $id;
    public $horaInicio;
    public $cliente;
    public $correo;
    public $telefono;
    public $servicio;
    public $precio_1;
    public function __construct($args=[]){
        $this->id=$args['id']??null;
        $this->horaInicio=$args['horaInicio']??'';
        $this->cliente=$args['cliente']??'';
        $this->correo=$args['correo']??'';
        $this->telefono=$args['telefono']??'';
        $this->servicio=$args['servicio']??'';
        $this->precio_1=$args['precio_1']??'';
        
    }
}
?>  