<?php 
namespace Clases;
use PHPMailer\PHPMailer\PHPMailer;
class Correo {
    public $correo;
    public $nombre;
    public $token;

    public function __construct($correo,$nombre, $token){
        $this->correo=$correo;
        $this->nombre=$nombre;
        $this->token=$token;
    }
    public function enviarConfirmacion(){
        //Create an instance
        $mail = new PHPMailer();
        // Protocolo de envio de email
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '8b910b18ac7d53';
        $mail->Password = 'bc208b2dc03361';

         // Configurar el contenido del email
        $mail->setFrom($this->correo);//Quien envia el email
        $mail->addAddress('admin@admin.com', 'Administrador');     //Quien recibe el email
        $mail->Subject = 'Confirma tu cuenta'; //mensaje de asunto
        
          //Configuracion del HTML
        $mail->isHTML(true);                                 
        $mail->CharSet='UTF-8';

        // Contenido
        $contenido='<html>';
        $contenido.='<p>Hola ' .  $this->nombre. '!';
        $contenido.='<p>Gracias por registrarte a ProStetic</p>';
        $contenido.='<p>Para confirmar tu cuenta  da click en el siguiente enlace</p>'; 
        $contenido .= "<p>Presiona aquí: <a href='http://localhost:3000/confirmar-cuenta?token=" . $this->token . "'>Confirmar Cuenta</a>";        
        $contenido.='<p>Si tu no solicitaste esta cuenta,ignora este coreeo </p>'; 
        $contenido.='</html>';

        $mail->Body= $contenido;
        $mail->AltBody= 'Adios';    

        if($mail->send()){
            $mensaje="Mensaje enviado correctamente";
        }
        else{
            $mensaje="No enviado";
        }
    }
    public function recuperarContraseña(){
        //Create an instance
        $mail = new PHPMailer();
        // Protocolo de envio de email
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '8b910b18ac7d53';
        $mail->Password = 'bc208b2dc03361';

         // Configurar el contenido del email
        $mail->setFrom($this->correo);//Quien envia el email
        $mail->addAddress('admin@admin.com', 'Administrador');     //Quien recibe el email
        $mail->Subject = 'Recupera tu cuenta'; //mensaje de asunto
        
          //Configuracion del HTML
        $mail->isHTML(true);                                 
        $mail->CharSet='UTF-8';

        // Contenido
        $contenido='<html>';
        $contenido.='<p>Hola ' .  $this->nombre. '!';
        $contenido.='<p>Para recuperar tu contraseña';
        $contenido .= ", presiona aquí: <a href='http://localhost:3000/recuperar?token=" . $this->token . "'>Recuperar tu cuenta ahora</a></p>";        
        $contenido.='<p>Si tu no solicitaste el cambio de contraseña,ignora el mensaje</p>'; 
        $contenido.='</html>';

        $mail->Body= $contenido;
        $mail->AltBody= 'Adios';    

        if($mail->send()){
            $mensaje="Mensaje enviado correctamente";
        }
        else{
            $mensaje="No enviado";
        }
    }
}