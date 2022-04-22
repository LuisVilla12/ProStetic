<?php
namespace Model;
class Usuario extends ActiveRecord{
    // Define la tabla
    protected static $tabla='usuario';
    // Define los atributos en un arreglo
    protected static $atributos_DB=['id','idTipoUsuario','nombre','apellidoPat','apellidoMat','telefono','correo','contraseña','token','confirmado'];

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
    }

    public function validarErrores(){        
        if (!$this->nombre) {
            self::$errores[] = 'Debe ingresar su nombre';
        }
        if (!$this->apellidoPat) {
            self::$errores[] = 'Debe ingresar su apellido Paterno';
        }
        if (!$this->apellidoMat) {
            self::$errores[] = 'Debe ingresar su apellido Materno';
        }
        if (!$this->telefono) {
            self::$errores[] = 'Debe ingresar un n° de telefono';
        }
        if (!$this->correo) {
            self::$errores[] = 'Debe ingresar un correo electronico';
        }
        if (!$this->contraseña) {
            self::$errores[] = 'Debe ingresar una contraseña';
        }
        
        return self::$errores;
    }
    
    public function existeUsuario() {
        // Revisar si el usuario existe.
        $query = "SELECT * FROM " . self::$tabla . " WHERE correo = '" . $this->correo . "' LIMIT 1";
        $resultado = self::$db->query($query);
        if(!$resultado->num_rows) {
            self::$errores[] = 'El Usuario No Existe';
            return;
        }
        return $resultado;
    }
    public function validaCoreoRegistrado(){
        $query="SELECT * FROM " . self::$tabla . " WHERE correo = '" .$this->correo . "' LIMIT 1";
        $resultado = self::$db->query($query);
        if($resultado->num_rows){
            self::$errores[]='El correo ya ha sido registrado';
        }
        return $resultado;
    }

    public function comprobarPassword($contraseña){
        $verifica= password_verify($contraseña,$this->contraseña);
        if(!$verifica){
            self::$errores[]='La contraseña es incorrecta';
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
            self::$errores[]='Usuario no esta autenticado';
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
}
?>  