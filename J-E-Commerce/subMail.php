<?php
use FTP\Connection;

session_start();
include('config.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($email)
{
    //Load Composer's autoloader
    require 'PHPMailer\Exception.php';
    require 'PHPMailer\PHPMailer.php';
    require 'PHPMailer\SMTP.php';

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth = true;                                   //Enable SMTP authentication
        $mail->Username = 'avantika0196@gmail.com';                     //SMTP username
        $mail->Password = 'sgae ylli ocjc nrid';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('avantika0196@gmail.com', 'Aarti');
        $mail->addAddress($email);     //Add a recipient


        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Thanks for subscribing us.';
        $mail->Body = "Thanks for subscribing us - Aashiyana Jewellary.";

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

if (isset($_POST['subscribe'])) {
    $email = $_POST["email"];

    $sql = "select * from sub where email = '$email'";
    $result = mysqli_query($conn, $sql);
    $count_email = mysqli_num_rows($result);

    $sql1 = "INSERT INTO sub (email) VALUES ('$email')";
    $result1 = mysqli_query($conn, $sql1) && sendMail($_POST['email']);

    header('location:index.php');
}