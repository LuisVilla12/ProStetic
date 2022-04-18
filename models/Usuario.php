<?php
namespace Model;
class Usuario extends ActiveRecord{
    // Define la tabla
    protected static $tabla='usuario';
    // Define los atributos en un arreglo
    protected static $atributos_DB=['id','idTipoUsuario','nombre','apellidoPat','apellidoMat','telefono','correo','contraseña'];

    public $id;
    public $idTipoUsuario;
    public $nombre;
    public $apellidoPat;
    public $apellidoMat;
    public $telefono;
    public $correo;
    public $contraseña;

    public function __construct($args = []){
        $this->id=$args['id']?? null;
        $this->idTipoUsuario=$args['idTipoUsuario']?? 1;
        $this->nombre=$args['nombre']?? '';
        $this->apellidoPat=$args['apellidoPat']?? '';        
        $this->apellidoMat=$args['apellidoMat']?? '';        
        $this->telefono=$args['telefono']?? '';
        $this->correo=$args['correo']?? '';
        $this->contraseña=$args['contraseña']?? '';        
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

    public function comprobarPassword($resultado) {
        $usuario = $resultado->fetch_object();

        $this->autenticado = password_verify( $this->contraseña, $usuario->contraseña );

        if(!$this->autenticado) {
            self::$errores[] = 'El Password es Incorrecto';
            return;
        }
    }
    public function extraerNombre() {
        // Revisar si el usuario existe.
        $query = "SELECT nombre FROM " . self::$tabla . " WHERE correo = '" . $this->correo . "' LIMIT 1";
        $resultado = self::$db->query($query);
        $usuario = $resultado->fetch_object();
        return $usuario;
    }
    public function autenticar() {
         // El usuario esta autenticado
        session_start();

         // Llenar el arreglo de la sesión
        $_SESSION['correo'] = $this->correo;
        // $_SESSION['idTipoUsuario'] = $this->idTipoUsuario;
        // $_SESSION['nombre'] = UextraerNombre();
        $_SESSION['login'] = true;
        header('Location: /admin');
    }


}
?>  