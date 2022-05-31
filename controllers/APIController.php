<?php
namespace Controllers;

use Model\Servicio;
use Model\CitaServicio;
use Model\Cita;

class APIController{
    public static function index(){
        $servicios = Servicio::all();        
        echo json_encode($servicios);
    }
    public static function guardar(){                
        $cita= new Cita($_POST);        
        $resultado = $cita->guardar();        
        $idServicios=explode(",",$_POST['servicios']);

         // itera sonbre el arreglo de servicios
        foreach ($idServicios as $idServicio){
            $args=[
                'idCita'=>$resultado['id'],
                'idServicio'=>$idServicio
            ];
            $citaServicio= new CitaServicio($args);
            $resultado2=$citaServicio->guardar();
            // debuguear($resultado2);
            // exit;
        }
        $respuesta=[
            'resultado'=>$resultado   
        ];
        echo json_encode($respuesta);       
    }
    public static function asistio(){        
        $id=$_GET['id'] ?? '';        
        $cita= Cita::find($id);
        $resultado=$cita->asistir($id);
        $respuesta=[
            'resultado'=>$resultado   
        ];
        echo json_encode($respuesta);
        // if($resultado){
        //     header('Location:' . $_SERVER['HTTP_REFERER']);
        // }
    }
    public static function pagar(){        
        $id=$_GET['id'] ?? '';        
        $cita= Cita::find($id);
        $resultado=$cita->pagar($id);
        if($resultado){
            header('Location:' . $_SERVER['HTTP_REFERER']);
        }
    }    
    public static function eliminar(){        
        if($_SERVER['REQUEST_METHOD']==='POST'){
            $id=$_POST['id'];
            $cita= Cita::find($id);
            $resultado=$cita->cancelar($id);
            // debuguear($resultado);
            $respuesta=[
                'resultado'=>$resultado   
            ];
            echo json_encode($respuesta);
            // if($resultado){
            //     header('Location:' . $_SERVER['HTTP_REFERER']);
            // }
        }

    }
}