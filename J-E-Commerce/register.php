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
        $mail->Subject = 'Email verified';
        $mail->Body = "Signup Successful 
            Click the link below to verify the email address <a  href='http://localhost/j-e-commerce/verify.php?email=$email'>Verify</a>";

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

if (isset($_POST['submit'])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $is_verified = $_POST["is_verified"];

    $sql = "select * from signup where name = '$name'";
    $result = mysqli_query($conn, $sql);
    $count_name = mysqli_num_rows($result);

    $sql = "select * from signup where email = '$email'";
    $result = mysqli_query($conn, $sql);
    $count_email = mysqli_num_rows($result);

    if (isset($_FILES) & !empty($_FILES)) {
        $profile_image = $_FILES['image']['name'];
        $size = $_FILES['image']['size'];
        $type = $_FILES['image']['type'];
        $tmp_name = $_FILES['image']['tmp_name'];

        $max_size = 1000000;
        $extension = substr($profile_image, strrpos($profile_image, '.') + 1);

        if (isset($profile_image) & !empty($profile_image)) {
            if ($extension == "jpg" || $extension == "jpg" && $type == "image/jpg" && $size <= $max_size) {
                $location = "images/";

                if (move_uploaded_file($tmp_name, $location . $profile_image)) {
                    if ($count_name == 0 & $count_email == 0) {
                        if ($password) {
                            $hash = password_hash($password, PASSWORD_DEFAULT);
                            $sql2 = "INSERT INTO signup(name, email, password, is_verified,profile_image) VALUES('$name', '$email', '$hash', 0,'$profile_image')";
                            $res = mysqli_query($conn, $sql2) && sendMail($_POST['email']);
                            if ($count_email) {
                                $_SESSION['customer'] = $email;
                                $_SESSION['customerid'] = mysqli_insert_id($conn);
                                // header('location:checkout.php');
                                header('location:message.php');
                            } else {
                                header('location:login.php?message=2');
                            }
                        } else {
                            echo '<script> alert("Password do not match!!!");</script>';
                        }
                    }
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            } else {
                echo "Only JPG, JPEG, PNG, and GIF files are allowed and should be less than 1MB.";
            }
        }
    } else {
        if ($count_name == 0 & $count_email == 0) {
            if ($password) {
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO signup(name, email, password, is_verified) VALUES('$name', '$email', '$hash', 0)";
                $result = mysqli_query($conn, $sql) && sendMail($_POST['email']);
                if ($count_email) {
                    $_SESSION['customer'] = $email;
                    $_SESSION['customerid'] = mysqli_insert_id($conn);
                    // header('location:checkout.php');
                    header('location:message.php');
                } else {
                    header('location:login.php?message=2');
                }
            } else {
                echo '<script> alert("Password do not match!!!");</script>';
            }
        } else {
            if ($count_name > 0) {
                echo '<script> alert("Username already exists!!!");</script>';
            }
            if ($count_email > 0) {
                echo '<script> alert("Email already exists!!!");</script>';
            }
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="responsive.css">
    <style>
        .form_area {
            /* margin-top: 50px; */
            background-image: url(images/breg.avif);
            /* height: 500px; */
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
        }

        .form-box {
            /* width: 100%; */
            /* max-width: 450px; */
            /* position: absolute; */
            /* top: 58%;
            left: 50%; */
            /* transform: translate(-50%, -50%); */
            /* background: #2d2d2d; */
            padding: 50px 60px 50px;
            text-align: center;
            border-radius: 3px;
            margin-left: 100px;
            margin-right: 100px;
        }

        .form-box h1 {
            font-size: 30px;
            margin-bottom: 40px;
            color: #fff;
            position: relative;
            font-family: "Poppins 2", serif;
        }

        .form-box h1::after {
            content: '';
            width: 30px;
            height: 4px;
            border-radius: 3px;
            background: #fff;
            position: absolute;
            bottom: -12px;
            left: 50%;
            transform: translate(-50%);
        }

        .input-field {
            width: 100%;
            background: #eaeaea;
            margin: 15px 0;
            border-radius: 3px;
            display: flex;
            align-items: center;
            max-height: 45px;
            transition: max-height 0.5s;
            overflow: hidden;
        }

        input {
            width: 100%;
            background: transparent;
            border: 0;
            outline: 0;
            padding: 18px 15px;

        }

        .input-field i {
            margin-left: 15px;
            color: #999;
        }

        form p {
            text-align: left;
            font-size: 13px;
        }

        form p a {
            text-decoration: none;
            color: #3c00a0;
        }

        .btn-field {
            width: 100%;
            display: flex;
            justify-content: space-between;
        }

        .btn-field button {
            background: #a8741a;
            color: #fff;
            height: 40px;
            border-radius: 15px;
            border: 0;
            outline: 0;
            cursor: pointer;
            transition: 1s;
            width: 100%;
        }

        .input-group {
            height: auto;
        }

        .btn-field button.disable {
            background: #eaeaea;
            color: #555;
        }

        .form-box p a:hover {
            color: #a8741a;
        }

        .form_area .row img {
            height: 468px;
            margin-bottom: 30px;
        }

        @media only screen and (min-width:360px) and (max-width:768px) {
            .form_area .row img {
                height: 300px;
            }

            .form-box {
                margin-bottom: 50px;
                margin-left: -30px;
                margin-right: -30px;
                margin-top: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="home_black_version">
        <!-- Header Starts  -->
        <?php include('header.php') ?>
        <!-- Header Ends  -->

        <section class="form_area">
            <div class="container">
                <div class="row justify-content-center">
                    <!-- <div class="col-sm-12 col-md-6">
                        <img src="images/log/sign.jpg" alt="">
                    </div> -->
                    <div class="col-lg-8 col-sm-12 col-md-12">
                        <div class="form-box">
                            <h1 id="title">Sign Up</h1>
                            <?php
                            if (isset($_REQUEST['message'])) {
                                if ($_GET['message'] == '2') {

                                    ?>
                                    <div class="alert alert-danger">Error Creating Account</div>
                                    <?php
                                }
                            }
                            ?>
                            <form id="forms" method="post" enctype="multipart/form-data">
                                <div class="input-group">
                                    <div class="input-field" id="nameField">
                                        <i class="ion-android-person" aria-hidden="true"></i>
                                        <input type="text" name="name" placeholder="Name" required>
                                    </div>

                                    <div class="input-field">
                                        <i class="ion-ios-email" aria-hidden="true"></i>
                                        <input type="email" name="email" placeholder="Email" required>
                                    </div>

                                    <div class="input-field">
                                        <i class="ion-locked" aria-hidden="true"></i>
                                        <input type="password" name="password" placeholder="Password" maxlength="10" required>
                                    </div>
                                    <div class="input-field">
                                        <i class="ion-images" aria-hidden="true"></i>
                                        <input type="file" name="image" required>
                                    </div>
                                </div>
                                <div class="btn-field">
                                    <button type="submit" id="signupBtn" name="submit">Sign Up</button>
                                </div>

                            </form>
                            <p style="margin-top:10px;">Already have an account ? <a href="login.php">Login here</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer section Starts -->
        <?php include('footer.php') ?>
        <!-- Footer section Ends -->

    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

    <script src="main.js"></script>
</body>

</html>