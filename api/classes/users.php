<?php
require_once './../../api/classes/connection.php';

// PHPMailer biblioteca de códigos para enviar los correos electrónicos 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';



class User extends Connection{

    public function __construct()
    {
        parent::__construct();
    }

    public function addUser($doc , $idTipDoc, $name, $lastName, $surname, $lastSurname, $dateBirth, $mobile,$email, $idArea, $idTypeUser):bool
    {
        $sql = "INSERT INTO user(document, id_type_doc, name, last_name, surname, last_surname, date_birth, mobile, email, id_area, id_type_user )values(?,?,?,?,?,?,?,?,?,?,?)";
        $query = mysqli_prepare($this->connection, $sql);
        $ok = mysqli_stmt_bind_param($query, 'iisssssssii', $doc, $idTipDoc, $name, $lastName, $surname, $lastSurname, $dateBirth,$mobile, $email, $idArea, $idTypeUser);
        $ok = mysqli_stmt_execute($query);

        
        $mail = new PHPMailer(true);
        $mail->SMTPOptions = array(
            'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            )
            );
        try {
            //Server settings
            $mail->SMTPDebug = 0;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through - permite el transporte del correo electrónico por Internet
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'danisalazar1478@gmail.com';                     //SMTP username
            $mail->Password   = 'batman1234567';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above - TCP Protocolo para que lleguen todos los segmentos correctamente

            //Recipients
            $mail->setFrom('danisalazar1478@gmail.com', 'Codigo QR');
            $mail->addAddress($email, 'prueba');     //Add a recipient

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Asunto Importante';
            $mail->Body    = '<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
                <link rel="stylesheet" href="barcode.php">
                <style>

                .border{
                    width: 90%;
                    height: 70%;
                    margin: 10px;
                    padding: 20px 30px;
                    background-color: #F8F8F8;
                }
                .content{
                    padding: 50px;
                    background-color: #004B93;
                }

                .logo{
                    width: 380px;
                    height: 200px;
                    margin: 0px 200px;
                }

                h1, h2, h3, p{
                    font-family: "Poppins", sans-serif;
                    text-align: center;
                    color: rgb(255, 255, 255);
                }
                p{
                    font-size: 19px;
                }
                .codigo{
                    margin: 30px 317px;
                    width: 150px;
                }

                .info p{
                    font-family: "Poppins", sans-serif;
                    color: rgb(36, 36, 36);
                    font-size: 12px;
                }

                </style>
            </head>
            <body>
                <div class="border">
                    <div class="content">
                        <img class ="logo" src="https://i.ibb.co/RpWjzwV/dc5b5700-4557-4db2-baa5-3ae60b402da2.png" alt="Logo-uniminuto">

                        <div class="mensaje">
                            <h1>¡Enbuenahora '.$name.'!</h1>
                            <p>Tus datos fueron registrados correctamente en nuestro sistema.</p><br>
                            <p>Con el siguiente código QR podrás ver tus datos desde el scanner de nuestra plataforma.</p>

                            <img  class="codigo" src="https://qrcode.tec-it.com/API/QRCode?data='.$doc.'" />
                            <p>Para descargar tu código QR ubica el cursor del mouse en la imagen y dale clic al icono <img src="https://i.ibb.co/94LHWt2/descarga.jpg" width= "28"></p>

                        </div><br>
                    </div>
                    <div class="info">
                        <p>Este email esta dirigido a '.$name.' '.$lastName.' '.$surname.' '.$lastSurname.'   con fines educativos para el desarrollo de la prueba practica propuesta por el ingeniero Germán Montes.</p>
                    </div>
                </div>
            </body>
            </html>';

            $mail->send();
            echo 'El mensaje de envio correctamente';
        } catch (Exception $e) {
            echo "Error Presentado: {$mail->ErrorInfo}";
        }

        return ( $ok ) 
        ? true
        : false;
    }
}
