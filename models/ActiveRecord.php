<?php
namespace Model;
class ActiveRecord{
    // Conexion de la base de datos
    protected static $db;
    // Permite identificar los atributos a iterar para sanitizar
    protected static $atributos_DB=[];
    // arrays de errores
    public static $errores=[];
    // Saber que tabla es
    protected static $tabla='';

    public function guardar(){
        if(!is_null($this->id)){
            //actualizando
            $this->actualizar();
        }
        else{
            $this->crear();
        }
    }
    public function actualizar(){
        // sanitizar datos
        $atributos=$this->sanitizarDatos();
        $valores=[];
        foreach($atributos as $key=>$value):
            $valores[]="{$key}='{$value}'";
        endforeach;
        $enlistarTodo= join(', ',$valores);
        $query="UPDATE " . static::$tabla . " set ";
        // convierte a string
        $query .="$enlistarTodo";
        $query .="WHERE id=" . self::$db->escape_string($this->id);
        // Insertarlo a la base de datos
        $resultado=self::$db->query($query);
        if ($resultado) {
            // Redireccionar el usuario
            header('Location:/?registro=2');
        }
    }
    public function crear(){
        // sanitizar datos
        $atributos=$this->sanitizarDatos();
        // Concatena todas las keys del array consta de dos parametros el "separador", y la funcion;
        $enlistarKeys=join(", ",array_keys($atributos));
        $enlistarValues=join("','",array_values($atributos));
        //consulta a la base de datos contatena el query con +=
        $query = "INSERT INTO " . static::$tabla . "($enlistarKeys) VALUES";
        $query .= "('";
        $query .= "$enlistarValues')";
        // debuguear($query);
        $resultado=self::$db->query($query);
        if ($resultado) {
            // Redireccionar el usuario
            header('Location:/?registro=1');
        }
    }
    // Identifica y une los atributos de la base de datos
    public function iterarDatos() :array{
        $atributos=[];
        foreach(static::$atributos_DB as $atributo):
            // el id se lo va a brincar
            if($atributo==='id') continue;
            $atributos[$atributo]=$this->$atributo;
        endforeach;
        return $atributos;
    }
    public function sanitizarDatos() :array{
        $atributos=$this->iterarDatos();
        $sanitizar=[];
        // Obtiene ambos valores tanto llave como valor
        foreach($atributos as $key=>$value):
            // Sanitiza ambos resultados
            $sanitizar[$key]=self::$db->escape_string($value);
        endforeach;
        return $sanitizar;        
    }
    
    public static function setDB($database){
        // Accede al valor de la variable estatica
        self::$db=$database;
    }
    public static function  getErrores(){
        return static::$errores;
    }

    // public function setImagen($imagen) {
    //     //Elimina la imagen previa
    //     if(isset($this->id)){
    //         $this->eliminarImagen();
    //     }
    //     // Asignar al atributo de la imagen el nombre de la imagen
    //     if($imagen){
    //         $this->imagen=$imagen;
    //     }
    // }
    
    // Lista todas las propiedades
    public static function all(){
        // Query
        // self es sobre la misma tabla
        $query = "SELECT * FROM " .  static::$tabla;
        $resultado=self::consultarSQL($query);
        return $resultado;
    }
    public static function get($limite){
        // Query
        // self es sobre la misma tabla
        $query = "SELECT * FROM " .  static::$tabla . " LIMIT " . $limite;
        $resultado=self::consultarSQL($query);
        return $resultado;
    }
    
    // Busca registro por id
    public static function find($id){
        //consulta
        $query = "SELECT * FROM " . static::$tabla . " WHERE id=${id}";
        //resultado
        $resultado=self::consultarSQL($query);        
        // Retorna el primer elemento de un arreglo
        return array_shift($resultado);
        // debuguear($resultado); 
    }

    public static function consultarSQL($query){
        // Consulta base de datos
        $resultado=self::$db->query($query);
        // Iterarar base de datos
        $array=[];
        while($registro = $resultado->fetch_assoc()):
            $array[]=static::crearObjeto($registro);
        endwhile;
        // Liberar la memoria 
        $resultado->free();
        // Retornar los valores
        return $array;
    }
    protected static function crearObjeto($registro){
        // Crear una instancia en la clase actual
        $objeto = new static;    
        foreach ($registro as $key => $value):
            // Verifica si la propiedade existe
            if(property_exists($objeto,$key)):
                $objeto->$key=$value;
            endif;
        endforeach;
        return $objeto;
    }

    public  function sincronizar($args=[]){
        // Iterea sobre el arreglo de args
        foreach($args as $key=>$value){
            // This tiene la referencia del objeto actual
            if(property_exists($this,$key) && !is_null($value)){
                // asigna al objeto los valores dependiendo la key
                $this->$key=$value;
            }
        }
    }
    public function eliminar(){
        // Eliminar el registro con ese ID
        $query = "DELETE FROM " .  static::$tabla .  " WHERE ";
        $query .= "id=" . self::$db->escape_string($this->id);
        $resultado =self::$db->query($query);
        if ($resultado) {
            // $this->eliminarImagen();
            header('Location:/?registro=3');
        }else{
            header('Location:/?registro=9');
        }
    }
    // Eliminar imagen
    // public function eliminarImagen(){
    //     // Comprobar si existe archivo
    //     $existeArchivo=file_exists(CARPETA_IMAGENES . $this->imagen);
    //     // Elimina el archivo
    //     if($existeArchivo){
    //         unlink(CARPETA_IMAGENES . $this->imagen);
    //     }
    // }
    public function validarErrores(){
        static::$errores=[];
        return static::$errores;
    }

}