<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class PaginasController {
    public static function index( Router $router ) {

        $propiedades = Propiedad::get(3);

        $router->render('paginas/index', [
            'inicio' => true,
            'propiedades' => $propiedades
        ]);
    }

    public static function nosotros( Router $router ) {
        $router->render('paginas/nosotros', [

        ]);
    }

    public static function galeria(Router $router){
        $router->render('paginas/galeria', [

        ]);
    }

    public static function propiedades( Router $router ) {

        $propiedades = Propiedad::all();

        $router->render('paginas/propiedades', [
            'propiedades' => $propiedades
        ]);
    }

    public static function propiedad(Router $router) {
        $id = validarORedireccionar('/propiedades');

        // Obtener los datos de la propiedad
        $propiedad = Propiedad::find($id);

        $router->render('paginas/propiedad', [
            'propiedad' => $propiedad
        ]);
    }

    public static function blog( Router $router ) {

        $router->render('paginas/blog');
    }

    public static function entrada( Router $router ) {
        $router->render('paginas/entrada');
    }

    public static function entrada2( Router $router ) {
        $router->render('paginas/entrada2');
    }

    public static function entrada3( Router $router ) {
        $router->render('paginas/entrada3');
    }

    public static function entrada4( Router $router ) {
        $router->render('paginas/entrada4');
    }

    public static function misionyvision( Router $router){
        $router->render('paginas/misionyvision');
    }


    public static function contacto( Router $router ) {
        $mensaje = null;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

        
            try{
                $emailTo = $_POST["correo"];
                $subject = $_POST["asunto"];
                $bodyEmail = $_POST["mensaje"];

                $fromemail = "viverodiaz22@gmail.com";
                $fromname = "noreply@contacto.com";
                $host = "smtp.gmail.com";
                $port = 587;
                $SMTPAuth = true;
                $SMTPSecure = "tls";
                $password = "vivero20222022";

                $mail = new PHPMailer(true);

                $mail->isSMTP();
                $mail->Host = $host;
                $mail->Port = $port;
                $mail->SMTPAuth = $SMTPAuth;
                $mail->SMTPSecure = $SMTPSecure;
                $mail->Username = $fromemail;
                $mail->Password = $password;

                $mail->setFrom($fromemail, $fromname);
                $mail->addAddress($fromemail);

                //asunto
                $mail->isHTML(true);
                $mail->Subject = $subject;
                //cuerpo email
                $msj = "De: $emailTo <br>";
                $msj .= "Asunto: $subject <br> <br>";
                $msj .= $bodyEmail;
                $mail->Body = $msj;

                if($mail->send()){
                    $mensaje = "Correo enviado correctamente, en breve le respoderemos";
                }else{
                    $mensaje = "no se ha enviado...";
                }
            


            }catch (Exception $e){

            }
        }
        $router->render('paginas/contacto', [
            'mensaje' => $mensaje
        ]);
    }
}