<?php
namespace MVC;
class Router {
    public $rutasGET=[];
    public $rutasPOST=[];

    public function get($url,$funcion){
        $this->rutasGET[$url]=$funcion;  
    }
    public function post($url,$funcion){
        $this->rutasPOST[$url]=$funcion;  
    }
    public function comprobarRutas(){
        session_start();
        // Verifica si inicio sesion
        $auth=$_SESSION['login']?? false;
        // $rutasProtegidas=['/admin'];

        // Localiza la ruta
        $urlActual= $_SERVER['PATH_INFO']?? '/';
        // Identifica que metodo es
        $metodo=$_SERVER['REQUEST_METHOD'];
        
        if($metodo==='GET'){
            // Extrae el valor de la ruta actual
            $funcion=$this->rutasGET[$urlActual] ?? null;
        }else{
            $funcion=$this->rutasPOST[$urlActual] ?? null;
        }
        // Proteger las rutas
        // if(in_array($urlActual,$rutasProtegidas)){
        //     // si no inicio sesión lo redirige
        //     if(!$auth){
        //         header('Location:/');
        //     }
        // }
        
        // Si existe una funcion asociada a esa ruta        
        if($funcion){
            // Manda a llamar una funcion
            call_user_func($funcion,$this);
        }
        else{
            echo "Pagina no encontrada";
        }            
    }
    public function render($vista,$datos=[]){
        foreach($datos as $key=> $value){
            $$key=$value;
        }
        // Inicia almacenamiento en memoria
        ob_start();
        include __DIR__ . "/views/$vista.php";
        // Limpia la memoria
        $contenido=ob_get_clean();
        include __DIR__ . "/views/layout.php";
    }
}