<?php 
// Retornar una conexion
function conectarDB():mysqli{
    $db=new mysqli('localhost','root','qazqazqaz9','prostetic','3306');
    if(!$db){
        echo "ERROR";
        exit;
    }
    return $db;
}
?>