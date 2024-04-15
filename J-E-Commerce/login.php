<?php
session_start();
include('config.php');

if (isset($_SESSION['customer']) && $_SESSION['customer'] != '') {
    header('location:index.php');
}

if (isset($_POST['submit'])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "select * from signup where email = '$email'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        if ($row['is_verified'] == 1) {
            if (password_verify($password, $row["password"])) {
                $_SESSION['customer'] = $email;
                $_SESSION['customerid'] = $row['u_id'];
                $_SESSION['profile_image'] = $row['profile_image'];
                $_SESSION['name'] = $row['name'];
                header('Location:index.php');
                // echo '<script>alert("Welcome ' . $_SESSION['name'] . '"); 
                // window.location.href="index.php";</script>';

            } else {
                // echo '<script> alert("Incorrect password");</script>';
                header('location:login.php?message=1');
            }
        } else {
            echo '<script> alert("Email not verified
            Please verified your email on mail");</script>';
        }
    } else {
        echo '<script> alert("Invalid email");</script>';
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
            background-image: url(images/lback.jpg);
            height: 500px;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;

        }

        .form-box {
            /* width: 100%; */
            max-width: 450px;
            /* position: absolute; */
            top: 58%;
            left: 50%;
            /* transform: translate(-50%, -50%); */
            /* background: #191919; */
            padding: 50px 60px 50px;
            text-align: center;
            border-radius: 3px;
            margin-top: 50px;
            /* background: rgba(0,0,0,0.5); */
            background: #191919;
            backdrop-filter: blur(20px);
            border: 1px solid rgb(255, 255, 255, 0.1);
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
            height: 393px;
            margin-bottom: 30px;
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
    <div class="home_black_version">
        <!-- Header Starts  -->
        <?php include('header.php') ?>
        <!-- Header Ends  -->

        <section class="form_area">
            <div class="container">
                <div class="row">
                    <!-- <div class="col-sm-12 col-md-6">
                        <img src="images/log/3.webp" alt="">
                        <img src="images/log/sign.jpg" alt="" >
                    </div> -->
                    <div class="col-sm-12 col-md-12">
                        <div class="form-box">
                            <h1 id="title">Log In</h1>
                            <?php
                            if (isset($_REQUEST['message'])) {
                                if ($_GET['message'] == '1') {

                                    ?>
                                    <div class="alert alert-Danger">Invalid Credential</div>
                                    <?php
                                }
                            }
                            ?>
                            <form name="forml" action="#" onsubmit="return invalid()" method="post">
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
                            <p style="margin-top:10px;">New Customer ? <a href="register.php">Create your account</a>
                            </p>
                        </div>
                    </div>
                </div>
        </section>

        <!-- Footer section Starts -->
        <?php include('footer.php') ?>
        <!-- Footer section Ends -->

    </div>
    <script>
        function invalid() {
            var email = document.forml.email.value;
            var password = document.forml.password.value;
            if (email.length == "" && password.length == "") {
                alert("Email & password field is empty");
                return false;
            }
            else {
                if (email.length == "") {
                    alert("Email field is empty!!!");
                    return false;
                }
                if (password.length == "") {
                    alert("Password field is empty!!!");
                    return false;
                }
            }
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

    <script src="main.js"></script>
</body>

</html>