<?php 
// __DIR__ coloca como ubicacion actual
define('TEMPLATES__URL',__DIR__ . '/templates');
define('FUNCIONES__URL',__DIR__ . 'funciones.php');
// define('CARPETA_IMAGENES', $_SERVER['DOCUMENT_ROOT'] . '/imagenes/');

function incluirTemplate(string $nombre){
    include TEMPLATES__URL . "/${nombre}.php";
}

function validarInicioSesion ()  {
    session_start();
    // ver valores de la superglobal login
    if(!$_SESSION['login']){
        header('Location:/');
    }
}

function debuguear($variable){
    echo '<pre>';
    var_dump($variable);
    echo '</pre>';
}
// Sanitizar
function sanitizar($string):string{
$sanitizar=htmlspecialchars($string);
return $sanitizar;
}

function validarTipoDeContenido($tipo){
    $tipos=['proveedor','producto','usuario'];
    // Retorna si hay un elemento en el arreglo
    return in_array($tipo,$tipos) ;
}
function MostrarMensaje($codigo){
    $mensaje='';
    switch ($codigo){
        case 1:
            $mensaje='Creado correctamente';
            break;  
        case 2:
            $mensaje='Actualizado correctamente';
            break;
        case 3:
            $mensaje='Eliminado correctamente';
            break;    
        case 4:
            $mensaje='Bienvenido';
            break;            
        default:
            $mensaje=false;
            break;            
    }
    return $mensaje;
}
function validarORediredireccionar($url){
    // Obtener el valor del id del metodo GET
    $id = $_GET['id'] ?? null;
    // Validar que sea un entero
    $id = filter_var($id, FILTER_VALIDATE_INT);
    if (!$id) {
        header('Location: ${url}');
    }
    return $id;
}
function esUltimo($actual,$proximo){
    if($actual !==$proximo){
        return true;
    }
    return false;
}
// Autenticar
function estaAutenticado(){
    if(!isset($_SESSION['login'])){
        header('Location: /');
    }
}
// Autenticar
function inicioSesion(){
    if(!isset($_SESSION['id'])){
        header('Location: /login');
    }
}

function getAge ($fecha){
    //Creamos objeto fecha desde los valores recibidos
    // $nacio = DateTime::createFromFormat('Y-m-d', $fecha);
    //Calculamos usando diff y la fecha actual
    // $fecha=$fecha0);
    $nacimiento = new DateTime($fecha);
    $ahora = new DateTime(date("Y-m-d"));
    // $fechaActual=date("Y-m-d");
    // $days_last = date_diff($fecha, $fechaActual);
    $diferencia = $ahora->diff($nacimiento);
    $anos=$diferencia->format("%y");
    if($anos>=18){
        return true;  
    }else{
        return false;
    }
}
