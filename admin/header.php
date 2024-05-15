<?php
// session_start();
include('../config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogIn</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">

    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../style2.css">
    <link rel="stylesheet" href="../responsive.css">

</head>

<body>
    <header class="header_area header_black">
        <div class="home_black_version">
            <!-- Header Middle Starts -->
            <div class="header_middel">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-5">
                            <div class="home_contact">
                                <div class="contact_icone">
                                    <!-- <img src="images/icon/phone.png" alt="phone"> -->
                                </div>
                                <div class="contact_box">
                                    <!-- <p>Inquiry / Helpline : <a href="tel: 1234567894">9263476187</a></p> -->
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-3 col-6">
                            <div class="logo">
                                <!-- <a href="index.php"><img src="images/logo/logo.png" alt="logo"></a> -->
                                <a href="index.php">
                                    <h1><span>vk</span>shiyana</h1>
                                </a>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <!-- Header Middle Ends -->

            <!-- Header Bottom Starts -->
            <div class="header_bottom sticky-header">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <div class="main_menu_inner">
                                <!-- <div class="logo_sticky">
                            <a href="#"><img src="images/logo.png" alt="logo"></a>
                        </div> -->
                                <div class="main_menu">
                                    <nav>
                                        <ul>
                                            <li class="active"><a href="#">Category <i class="ion-chevron-down"></i></a>
                                                <ul class="sub_menu">
                                                    <li><a href="categories.php">View Categories</a></li>
                                                    <li><a href="addCategories.php">Add Categories</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Products <i class="ion-chevron-down"></i></a>
                                                <ul class="sub_menu">
                                                    <li><a href="products.php">View Products</a></li>
                                                    <li><a href="addProducts.php">Add Products</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Orders <i class="ion-chevron-down"></i></a>
                                                <ul class="sub_menu">
                                                    <li><a href="orders.php">View Orders</a></li>
                                                    <li><a href="addOrders.php">Add Orders</a></li>
                                                </ul>
                                            </li>
                                            <!-- <li><a href="#">My Account</a>
                                                <ul class="sub_menu">
                                                    <li><a href="editProfile.php">Edit Profile</a></li>
                                                    <li><a href="logout.php?logout=1">Logout</a></li>
                                                </ul>
                                            </li> -->
                                            <?php
                                            if (isset($_SESSION['admin_id']) && isset($_SESSION['admin_name']) && ($_SESSION['admin_id'] != '')) {
                                                ?>
                                                <li><a href="#">
                                                        <?php
                                                        $sql = "SELECT * FROM admin_login";
                                                        $result = mysqli_query($conn, $sql);
                                                        $row = mysqli_fetch_assoc($result);
                                                        ?>
                                                        <h4 style="font-family:fonix; color:#a8741a;">
                                                            <?php echo $_SESSION['admin_name']; ?>
                                                        </h4>

                                                        <ul class="sub_menu">
                                                            <li><a href="adminprofile.php">Profile</a></li>
                                                            <li><a href="logout.php?logout=1">Logout</a></li>
                                                        </ul>
                                                    </a>
                                                </li>
                                                <?php
                                            } else {
                                                ?>
                                                <li><a href="login.php">Log In</a>
                                                </li>
                                                <?php
                                            }
                                            ?>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Header Bottom Ends -->
        </div>
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