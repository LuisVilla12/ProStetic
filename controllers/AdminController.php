<?php 
namespace Controllers;

use Model\AdminCita;
use MVC\Router;

class AdminController{
    public static function index(Router $router){
        $fecha=$_GET['fecha']??date('Y-m-d');
        // debuguear($fecha);
        $fechas =explode('-',$fecha);
        if(!checkdate($fechas[1],$fechas[2],$fechas[0])){
            header('Location:/404');
        }
        
        
        // Consultar base de datos
        $consulta = "SELECT citas.id, horarios.horaInicio as horaInicio, CONCAT( usuario.nombre, ' ', usuario.apellidoPat) as cliente, ";
        $consulta .= "usuario.correo, usuario.telefono, servicios.nombre as servicio, servicios.precio_1 FROM citas";
        $consulta .= " LEFT OUTER JOIN usuario ON citas.idUsuario=usuario.id";
        $consulta .= " LEFT OUTER JOIN citas_servicios  ON citas_servicios.idCita=citas.id";
        $consulta .= " LEFT OUTER JOIN horarios ON horarios.id=citas.id_horario ";        
        $consulta .= " LEFT OUTER JOIN servicios  ON servicios.id=citas_servicios.idServicio ";        
        $consulta .= " WHERE fecha = '${fecha}' and citas.asistio=0 and citas.cancelar=0 order by horarios.horaInicio ASC";
        
        $resultadoCitas=AdminCita::SQL($consulta);
        
        // debuguear($resultadoCitas);
        $inicio=false;
        $router->render('/agenda/inicio',[
            'citas'=>$resultadoCitas,
            'fecha'=>$fecha,
            'inicio'=>$inicio
        ]);
    }
    public static function miscitas(Router $router){
        $id=($_SESSION['id']);
        // Consultar base de datos
        $consulta = "SELECT citas.id,citas.fecha, horarios.horaInicio as horaInicio, CONCAT( usuario.nombre, ' ', usuario.apellidoPat) as cliente, ";
        $consulta .= "usuario.correo, usuario.telefono, servicios.nombre as servicio, servicios.precio_1 FROM citas";
        $consulta .= " LEFT OUTER JOIN usuario ON citas.idUsuario=usuario.id";
        $consulta .= " LEFT OUTER JOIN citas_servicios  ON citas_servicios.idCita=citas.id";
        $consulta .= " LEFT OUTER JOIN horarios ON horarios.id=citas.id_horario ";        
        $consulta .= " LEFT OUTER JOIN servicios  ON servicios.id=citas_servicios.idServicio ";        
        $consulta .= " WHERE usuario.id = '${id}' and citas.asistio=0 and citas.cancelar=0 order by horarios.horaInicio ASC";
                
        $resultadoCitas=AdminCita::SQL($consulta);
                
        $inicio=false;        
        $router->render('/agenda/mis_citas',[
            'citas'=>$resultadoCitas,
            'inicio'=>$inicio,            
        ]);
    }    
}