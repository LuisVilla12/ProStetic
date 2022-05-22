<?php
namespace Model;

use Model\ActiveRecord;

class CitaServicio extends ActiveRecord{
    protected static $tabla = 'citas_servicios';
    protected static $columnasDB = ['id','idCita','idServicio'];
    public $id;
    public $idCita;
    public $idServicio;

    public function __construct($args=[]){
        $this->id=$args['id']?? null;
        $this->idCita=$args['idCita']?? '';
        $this->idServicio=$args['idServicio']?? '';
    }
}