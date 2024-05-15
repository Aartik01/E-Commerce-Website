<?php
  include ('config.php');

  $msg ="";

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['submit'])){
      $name = $_POST["name"];
      $mobile = $_POST["mobile"];
      $email = $_POST["email"];
      $message = $_POST["message"];

      mysqli_query($conn,"insert into contact(name, mobile, email, message) value('$name', '$mobile', '$email', '$message')");

      $msg = "Thank You";

//Load Composer's autoloader
require 'PHPMailer\Exception.php';
require 'PHPMailer\PHPMailer.php';
require 'PHPMailer\SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'avantika0196@gmail.com';                     //SMTP username
    $mail->Password   = 'sgae ylli ocjc nrid';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('avantika0196@gmail.com', 'contact');
    $mail->addAddress('kashyapaarti007@gmail.com', 'Aaru');     //Add a recipient


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Testing';
    $mail->Body    = "Sender Name - $name <br/> Sender Mobile No. - $mobile <br/> Sender Email - $email <br/> <br/> Sender Message - $message";

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
?>