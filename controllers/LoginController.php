<?php 

namespace Controllers;

use MVC\Router;
use Model\Admin;
use Model\Usuario;
use PHPMailer\PHPMailer\PHPMailer;

class LoginController {
    public static function login( Router $router) {

        $errores = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth = new Admin($_POST);
            $errores = $auth->validar();

        
            if(empty($errores)) {

                $resultado = $auth->existeUsuario();
     
                
                if( !$resultado ) {
                    $errores = Admin::getAlertas();
                } else {

                    $auth->comprobarPassword($resultado);

                    if($auth->autenticado) {
                       $auth->autenticar();
                    } else {
                        $errores =Admin::getAlertas();
                    }
                }
            }
        }

        $router->render('auth/login', [
            'errores' => $errores
        ]); 
    }

    public static function logout() {
        session_start();
        $_SESSION = [];
        header('Location: /');
    }

    public static function olvide(Router $router){

        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
                
            $auth = new Usuario($_POST);
            $alertas = $auth->validarEmail();
            
            if(empty($alertas)){
                $usuario = Usuario::where('email', $auth->email);

                if($usuario){
                    //Genrar un token
                    $usuario->crearToken();
                    $usuario->guardar();


                    $mail = new PHPMailer();
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Port = 587;
                    $mail->Username = 'viverodiaz22@gmail.com';
                    $mail->Password = 'mydhvgowneclhezu';
                
                    $mail->setFrom($usuario->email);
                    $mail->addAddress($usuario->email, 'Vivero Diaz');
                    $mail->Subject = 'Cambio de password';
           
                    // Set HTML
                    $mail->isHTML(TRUE);
                    $mail->CharSet = 'UTF-8';
           
                    $contenido = '<html>';
                    $contenido .= "<p><strong>Hola " . $usuario->email .  "</strong> Has solicitado reestablecer tu password, sigue el siguiente enlace para hacerlo.</p>";
                    $contenido .= "<p>Presiona aquí: <a href='http://localhost:3000/recuperar?token=" . $usuario->token . "'>Reestablecer Password</a>";        
                    $contenido .= "<p>Si tu no solicitaste este cambio, puedes ignorar el mensaje</p>";
                    $contenido .= '</html>';
                    $mail->Body = $contenido;
           
                    //Enviar el mail
                    $mail->send();

                    Usuario::setAlerta('exito', 'Revisa tu email');
                    
                }else{
                    Usuario::setAlerta('error', 'El usuario no existe');
                    
                }
            }
        }
        $alertas = Usuario::getAlertas();
        $router->render('auth/olvide', [
            'alertas' => $alertas
        ]);
    }

    public static function recuperar(Router $router){
        $alertas = [];
        $error = false;

        $token = s($_GET['token']);
        
        //Buscar usuario por token
        $usuario = Usuario::where('token', $token);

        if(empty($usuario)){
            Usuario::setAlerta('error', 'Token no valido');
            $error = true;
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $password = new Usuario($_POST);
            $alertas = $password->validarPassword();

            if(empty($alertas)) {
                $usuario->password = null;

                $usuario->password = $password->password;
                $usuario->token = null;

                $resultado = $usuario->guardar();
                
                if($resultado){
                    header('Location: /');
                }
            }
        }

        $router->render('auth/recuperar-password', [
            'alertas' => $alertas,
            'error' => $error
        ]);
    }
}