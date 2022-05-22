<?php
namespace Model;
class Usuario extends ActiveRecord{
    // Define la tabla
    protected static $tabla='usuario';
    // Define los atributos en un arreglo
    protected static $columnasDB=['id','idTipoUsuario','nombre','apellidoPat','apellidoMat','telefono','correo','contraseña','token','confirmado'];

    public $id;
    public $idTipoUsuario;
    public $nombre;
    public $apellidoPat;
    public $apellidoMat;
    public $telefono;
    public $correo;
    public $contraseña;    
    public $token;
    public $confirmado;
    // public $estatus;
    
    public function __construct($args = []){
        $this->id=$args['id']?? null;
        $this->idTipoUsuario=$args['idTipoUsuario']?? 1;
        $this->nombre=$args['nombre']?? '';
        $this->apellidoPat=$args['apellidoPat']?? '';        
        $this->apellidoMat=$args['apellidoMat']?? '';        
        $this->telefono=$args['telefono']?? '';
        $this->correo=$args['correo']?? '';
        $this->contraseña=$args['contraseña']?? '';        
        $this->token=$args['token']?? '';        
        $this->confirmado=$args['confirmado']?? 0; 
        // $this->estatus=$args['estatus']?? 1; 
        // Direccion       
        // $this->calle=$args['calle']?? '';        
        // $this->colonia=$args['colonia']?? '';        
        // $this->CP=$args['CP']?? '';        
        // $this->cargo=$args['cargo']?? '';        
    }

    public function validarErrores(){        
        if (!$this->contraseña) {
            self:: $alertas['error'][] = 'Debe ingresar una contraseña';
        }        
        if (!$this->nombre|| strlen($this->nombre)<2) {
            self:: $alertas['error'][] = 'Debe ingresar su nombre';
        }        
        if (!$this->apellidoPat|| strlen($this->apellidoPat)<3) {
            self:: $alertas['error'][] = 'Debe ingresar su apellido paterno';
        }
        if (!$this->apellidoMat|| strlen($this->apellidoMat)<3) {
            self:: $alertas['error'][] = 'Debe ingresar su apellido materno';
        }
        if (!$this->correo|| strlen($this->correo)<7) {
            self:: $alertas['error'][] = 'Debe ingresar un correo electrónico';
        }
        if (!$this->telefono|| strlen($this->telefono)<4) {
            self:: $alertas['error'][] = 'Debe ingresar un n° de teléfono';
        }        
        return self::$alertas;
    }
    
    public function existeUsuario() {
        // Revisar si el usuario existe.
        $query = "SELECT * FROM " . self::$tabla . " WHERE correo = '" . $this->correo . "' LIMIT 1";
        $resultado = self::$db->query($query);
        if(!$resultado->num_rows) {
            self:: $alertas['error'][] = 'El Usuario No Existe';
            return;
        }
        return $resultado;
    }
    public function validaCoreoRegistrado(){
        $query="SELECT * FROM " . self::$tabla . " WHERE correo = '" .$this->correo . "' LIMIT 1";
        $resultado = self::$db->query($query);
        if($resultado->num_rows){
            self:: $alertas['error'][]='El correo ya ha sido registrado';
        }
        return $resultado;
    }

    public function comprobarPassword($contraseña){
        $verifica= password_verify($contraseña,$this->contraseña);
        if(!$verifica){
            self:: $alertas['error'][]='La contraseña es incorrecta';
        }else{
            return true;
        }
    }
    public function extraerNombre() {
        // Revisar si el usuario existe.
        $query = "SELECT nombre FROM " . self::$tabla . " WHERE correo = '" . $this->correo . "' LIMIT 1";
        $resultado = self::$db->query($query);
        $usuario = $resultado->fetch_object();
        return $usuario;
    }

    public function generarToken(){
        // Genera un id unico
        $this->token=uniqid();
    }

    public function cuentaConfirmada(){
        if($this ->confirmado === '0'){
            self:: $alertas['error'][]='Usuario no esta autenticado';
        }else{
            return true;
        }
    }
    public static function allEmpleados(){
        // Query
        $query = "SELECT * FROM " .  static::$tabla . " WHERE idTipoUsuario = 2";
        $resultado=self::consultarSQL($query);
        return $resultado;
    }
    public static function allClientes(){
        // Query
        $query = "SELECT * FROM " .  static::$tabla . " WHERE idTipoUsuario = 1";
        $resultado=self::consultarSQL($query);
        return $resultado;
    }
    public static function eliminarEmpleados(){
        // Query
        $query = "SELECT * FROM " .  static::$tabla . " WHERE idTipoUsuario = 1";
        $resultado=self::consultarSQL($query);
        return $resultado;
    }
}
?>  