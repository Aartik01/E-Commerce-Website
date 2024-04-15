<?php
session_start();
include ('config.php');

if (!isset ($_SESSION['customer'])) {
    header('location:login.php');
    // exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="responsive.css">
    <style>
        body {
            /* background-image: url(images/2.avif); */
            background-size: cover;
            background-position: center;
        }

        .card-body {
            /* background: #d1cccb; */
        }

        .profile-row .col-sm-3 {
            /* padding-left: 4%; */
            /* display: flex; */
            /* justify-content: space-evenly; */
            /* font-size: 50rem; */
        }

        .card-title {
            text-decoration: underline;
        }

        .info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            /* margin: 10px 0px; */
        }

        .option-btn {
            background-color: #000000b0;
            color: white;
            min-width: 120px;
            padding: 10px;
            border: none;
        }

        .add {
            /* margin-top: -50px; */
            /* width: 84%; */
        }

        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .col-lg-9 {
            background: #3b4146;
        }

        .col-lg-3 {
            height: 100%;
        }

        .nav-pills .nav-link.active,
        .nav-pills .show>.nav-link {
            color: #fff;
            background-color: #a8741a;
        }

        /* .nav-pills li a.active {
            color: #a8741a;
            position: relative;
        }

        .nav-pills li a.active::before {
            position: absolute;
            content: "";
            width: 104%;
            height: 109%;
            border: 0px solid #a8741a;
            left: -2px;
            top: -2px;
            border-radius: 2px;
        } */
    </style>
</head>

<body>
    <div class="home_black_version">
        <!-- Header Starts  -->
        <?php include ('header.php') ?>
        <!-- Header Ends  -->


        <div class="container-fluid">
            <div class="row profile-row ">
                <!-- <div class="col-12 d-flex"> -->
                <div class="col-lg-3 col-sm-12">
                    <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark">
                        <a href="/"
                            class="d-flex flex-column align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                            <!-- <svg class="bi me-2" width="40" height="32">
                                    <use xlink:href="#bootstrap" />
                                </svg> -->
                            <!-- <a href="#"
                                    class="d-flex align-items-center text-white text-decoration-none"
                                    id="dropdownUser1" aria-expanded="false">
                                    <img src="https://github.com/mdo.png" alt="" width="32" height="32"
                                        class="rounded-circle me-2">
                                </a> -->
                            <span class="fs-5" style="color:#a0a0a0;">Hello,</span>
                            <div class="h6">
                                <?php echo $_SESSION['name']; ?>
                            </div>
                        </a>
                        <hr>
                        <ul class="nav nav-pills flex-column mb-auto">
                            <li class="nav-item">
                                <a href="#" class="nav-link active" aria-current="page" aria-selected="true">
                                    <svg class="bi me-2" width="16" height="16">
                                        <use xlink:href="#home" />
                                    </svg>
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="#" class="nav-link text-white" aria-selected="false">
                                    <svg class="bi me-2" width="16" height="16">
                                        <use xlink:href="#speedometer2" />
                                    </svg>
                                    Dashboard
                                </a>
                            </li>
                            <li>
                                <a href="#" class="nav-link text-white" aria-selected="false">
                                    <svg class="bi me-2" width="16" height="16">
                                        <use xlink:href="#table" />
                                    </svg>
                                    Orders
                                </a>
                            </li>
                            <li>
                                <a href="#" class="nav-link text-white" aria-selected="false">
                                    <svg class="bi me-2" width="16" height="16">
                                        <use xlink:href="#grid" />
                                    </svg>
                                    Products
                                </a>
                            </li>
                            <li>
                                <a href="#" class="nav-link text-white">
                                    <svg class="bi me-2" width="16" height="16">
                                        <use xlink:href="#people-circle" />
                                    </svg>
                                   Wishlist
                                </a>
                            </li>
                            <li>
                                <a href="#" class="nav-link text-white">
                                    <svg class="bi me-2" width="16" height="16">
                                        <use xlink:href="#people-circle" />
                                    </svg>
                                   Add to Cart
                                </a>
                            </li>
                        </ul>
                        <hr>
                        <div class="dropdown">
                            <a href="#" class="d-flex align-items-center text-white text-decoration-none"
                                id="dropdownUser1" aria-expanded="false">
                                <!-- <img src="https://github.com/mdo.png" alt="" width="32" height="32"
                                        class="rounded-circle me-2"> -->
                                <svg width="24" height="24" class="" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill="#2874F0" stroke-width="0.3" stroke="#2874F0"
                                        d="M13 3h-2v10h2V3zm4.83 2.17l-1.42 1.42C17.99 7.86 19 9.81 19 12c0 3.87-3.13 7-7 7s-7-3.13-7-7c0-2.19 1.01-4.14 2.58-5.42L6.17 5.17C4.23 6.82 3 9.26 3 12c0 4.97 4.03 9 9 9s9-4.03 9-9c0-2.74-1.23-5.18-3.17-6.83z">
                                    </path>
                                </svg>&nbsp;&nbsp;
                                <strong>Log Out</strong>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-sm-12">
                    <div class="top-banner text-center mt-3">
                        <!-- <img src="/pss/assets/pss-logo.png" alt=""> -->
                        <h2 class="text-white">
                            <!-- <?php echo $_SESSION['name']; ?> -->
                        </h2>
                    </div>
                    <div class="row profile-row my-5">
                        <div class="col-sm-3 ">
                            <div class="card profile-card rounded" style="width: 90%;">
                                <div class="card-body">
                                    <img src='<?php echo "images\\" . $_SESSION['profile_image']; ?>'
                                        class="card-img-top " alt="...">
                                    <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <div class="card info-outer">
                                <div class="card-body">
                                    <h3 class="card-title text-center" style="font-family: poppins;">Profile Information</h3><br>
                                    <div class="info">
                                        <h4 style="font-family: poppins;">Name:</h4>
                                        <h5  style="font-family: poppins;">
                                            <?php echo $_SESSION['name']; ?>
                                        </h5>
                                    </div>
                                    <div class="info">
                                        <h4 style="font-family: poppins;">Email:</h4>
                                        <h5 style="font-family: poppins;">
                                            <?php echo $_SESSION['customer']; ?>
                                        </h5>
                                    </div>
                                    <div class="info">
                                        <a href="editProfile.php"><button class="option-btn">Edit
                                                Profile</button></a>
                                        <a href="checkout.php"><button class="option-btn">Back</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- <div class="container add" id="main_add"> -->
                        <!-- <div class="row profile-row"> -->
                        <div class="col-12 col-sm-12 mt-5">
                            <div class="card" id="add">
                                <div class="card-body" style="background:#f0f0f0;">
                                    <h3 style="font-family:poppins;">My Addresses</h3>
                                    <?php
                                    $cum_id = $_SESSION['customerid'];
                                    $sql_add = "SELECT * FROM orders WHERE user_id = '$cum_id' ORDER BY id DESC LIMIT 1 ";
                                    $result_add = mysqli_query($conn, $sql_add);

                                    $total_add = mysqli_num_rows($result_add);
                                    $row_add = mysqli_fetch_assoc($result_add);

                                    echo $row_add['firstname'] . " " . $row_add['lastname'] . "<br>";
                                    // echo $row_add['email'] . "<br>";
                                    
                                    echo $row_add['address'] . " , " . $row_add['address2'] . "," . "<br>";
                                    // echo $row_add['address2'] . "<br>";
                                    // echo $row_add['code'] . "<br>";
                                    echo $row_add['city'] . " , " . $row_add['state'] . " , " . $row_add['country'] . "," . "<br>";
                                    // echo $row_add['state'] . "<br>";
                                    // echo $row_add['country'] . "<br>";
                                    echo $row_add['code'] . "<br>";
                                    echo $row_add['phone'] . "<br>";
                                    ?>
                                </div>
                            </div>
                        </div>
                        <!-- </div> -->
                        <!-- </div> -->
                    </div>
                </div>
                <!-- </div> -->
            </div>
        </div>


    </div>
</body>

</html>