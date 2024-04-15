<?php
session_start();
include('../config.php');

if(isset($_SESSION['admin_logged_in'])){
    header('Location:index.php');
    exit;
}

if (isset($_POST['submit'])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = $conn->prepare("select * from admin_login where admin_email = ? and admin_password = ? lIMIT 1");

    $sql->bind_param('ss', $email, $password);

    if($sql->execute()){
        $sql->bind_result($admin_id, $admin_name, $admin_email, $admin_password);
        $sql->store_result();
        
        if($sql->num_rows() == 1){
            $sql->fetch();
            $_SESSION['admin_id'] = $admin_id;
            $_SESSION['admin_name'] = $admin_name;
            $_SESSION['admin_email'] = $admin_email;
            $_SESSION['admin_logged_in'] = true;
            
            // $_SESSION['image'] = $row['image'];
            // echo("Session_admin_id:".$_SESSION['admin_id']);

            header('Location:index.php?login_success=logged in successfully');
        }
        else{
            header('Location:login.php?error=could not verify your account');
        }
    }
    else{
        header('Location:login.php? error=something went wrong');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogIn</title>
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css">
    <!-- <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"> -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"> -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">

    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../style2.css">
    <link rel="stylesheet" href="../responsive.css">


    <style>
        .form_area {
            /* margin-top: 50px; */
        }

        .form-box {
            width: 100%;
            /* max-width: 450px; */
            /* position: absolute; */
            top: 58%;
            left: 50%;
            /* transform: translate(-50%, -50%); */
            background: #2d2d2d;
            padding: 60px 60px 74px;
            text-align: center;
            border-radius: 3px;
            margin-top: 85px;
            height: 406px;
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
            height: 406px;
            margin-bottom: 30px;
            margin-top: 85px;
        }
        @media only screen and (min-width:360px) and (max-width:768px) {
            .form_area .row img {
                height: 300px;
            }

            .form-box {
                margin-bottom: 50px;
            }
        }
    </style>
</head>

<body>
    <header class="header_area header_black">
        <div class="home_black_version" style="height:593px;">
            <section class="form_area">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <img src="../images/log/3.webp" alt="">
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-box">
                                <h1 id="title">Admin Log In</h1>
                                <form name="forml" action="" onsubmit="return invalid()" method="post">
                                    <div class="input-group">

                                        <div class="input-field">
                                            <i class="ion-ios-email" aria-hidden="true"></i>
                                            <input type="email" name="email" placeholder="Email">
                                        </div>

                                        <div class="input-field">
                                            <i class="ion-unlocked" aria-hidden="true"></i>
                                            <input type="password" name="password" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="btn-field">
                                        <button type="submit" id="signupBtn" name="submit">Log In</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
            </section>
    </header>
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>-->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script> -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

    <script src="../main.js"></script>
</body>

</html>