<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/phpmailer/phpmailer/src/Exception.php';
require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';

if (isset($_GET['nombre'], $_GET['email'], $_GET['mensaje'])){
    $nombre = htmlspecialchars($_GET['nombre']);
    $email = filter_var($_GET['email'], FILTER_SANITIZE_EMAIL);
    $mensaje = htmlspecialchars($_GET['mensaje']);

    //Validar el correo electronico
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo"correo electronico no valido.";
        exit;
    }

    //Destinatario del correo 
    $destinatario ="silviadanielagonzalez0631@gmail.com";

    //Asunto del correo
    $asunto = "Hola mundo, como estas? todo bien? $nombre";

    //Cuerpo del correo
    $cuerpo = "
    <html>
    <head>
    <title> Nuevo mensaje para este correo :) </title>
    </head>
    <body>
    <p><strong>Nombre:</strong>$nombre</p>
    <p><strong>Correo Electronico:</strong>$email</p>
    <p><strong>Mensaje:</strong></p>
    <p>$mensaje</p>
    </body>
    </html>
    ";

    //configurar PHPMailer
    $mail = new PHPMailer(true);
    try{
        // Configuracion del servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';//servidor smtp
        $mail->SMTPAuth =true;
        $mail->Username = 'silviadanielagonzalez0631@gmail.com'; //correo nosotros
        $mail ->Password = 'dinoamigosBTS69...';//contraseña
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail ->Port =587;

        //configuracion del correo
        $mail->setFrom($email, $nombre);
        $mail->addAddress($destinatario);
        $mail ->addReplyTo($email, $nombre);

        //Contenido del correo
        $mail->isHTML(true);
        $mail->Subject =$asunto;
        $mail ->Body  =$cuerpo;

        //enviar el correo 
        $mail->send();
        echo "El mensaje se ha enviado correctamente.";
    }catch(Exception $e){
        echo "Hubo un error al enviar el mensaje. Mailer Error: ($mail->ErrorInfo)";
    }
}else{
    echo"Faltan datos en la solicitud."; 
}
?>