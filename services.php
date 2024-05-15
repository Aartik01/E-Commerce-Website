<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="responsive.css">

    <style>
        .banner_fullwidth {
            background: url(images/slider/8.avif);
            /* margin-bottom: 64px; */
            /* width: 100% !important; */
            height: 500px;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
        }
        .feature p{
            font-family: fenix;
            font-size: 17px;
        }
    </style>
</head>

<body>
    <div class="home_black_version">
        <!-- Header Starts  -->
        <?php include('header.php') ?>
        <!-- Header Ends  -->

        <!-- Slider Section Starts -->
        <section class="banner_fullwidth black_fullwidth">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                    </div>
                </div>
            </div>
        </section>
        <!-- Slider Section Ends -->
        <section class="banner_section banner_black" style="border-bottom: 0px solid #2d2d2d;">
            <div class="why-choose-section">
                <div class="container">
                    <div class="row my-5">
                        <div class="col-6 col-md-6 col-lg-3 mb-4">
                            <div class="feature">
                                <div class="icon">
                                    <i class="ion-model-s" style="font-size:40px; color:#fff;"></i>
                                    <!-- <img src="images/services/truck.svg" alt="Image" class="imf-fluid"> -->
                                </div>
                                <h3 style="color:#a0a0a0;  font-family: fenix; font-size: 25px;">Fast &amp; Free Shipping
                                </h3>
                                <p>Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam
                                    vulputate.</p>
                            </div>
                        </div>

                        <div class="col-6 col-md-6 col-lg-3 mb-4">
                            <div class="feature">
                                <div class="icon">
                                    <i class="ion-bag" style="font-size:40px; color:#fff;"></i>
                                    <!-- <img src="images/services/bag.svg" alt="Image" class="imf-fluid"> -->
                                </div>
                                <h3 style="color:#a0a0a0; font-family: fenix; font-size: 25px;">Easy to Shop</h3>
                                <p>Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam
                                    vulputate.</p>
                            </div>
                        </div>

                        <div class="col-6 col-md-6 col-lg-3 mb-4">
                            <div class="feature">
                                <div class="icon">
                                    <i class="ion-clock" style="font-size:40px; color:#fff;"></i>
                                    <!-- <img src="images/services/support.svg" alt="Image" class="imf-fluid"> -->
                                </div>
                                <h3 style="color:#a0a0a0; font-family: fenix; font-size: 25px;">24/7 Support</h3>
                                <p>Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam
                                    vulputate.</p>
                            </div>
                        </div>

                        <div class="col-6 col-md-6 col-lg-3 mb-4">
                            <div class="feature">
                                <div class="icon">
                                    <i class="ion-arrow-return-right" style="font-size:40px; color:#fff;"></i>
                                    <!-- <img src="images/services/return.svg" alt="Image" class="imf-fluid"> -->
                                </div>
                                <h3 style="color:#a0a0a0; font-family: fenix; font-size: 25px; ">Hassle Free Returns</h3>
                                <p>Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam
                                    vulputate.</p>
                            </div>
                        </div>

                        <div class="col-6 col-md-6 col-lg-3 mb-4">
                            <div class="feature">
                                <div class="icon">
                                    <i class="ion-model-s" style="font-size:40px; color:#fff;"></i>
                                    <!-- <img src="images/services/truck.svg" alt="Image" class="imf-fluid"> -->
                                </div>
                                <h3 style="color:#a0a0a0; font-family: fenix; font-size: 25px; ">Fast &amp; Free Shipping
                                </h3>
                                <p>Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam
                                    vulputate.</p>
                            </div>
                        </div>

                        <div class="col-6 col-md-6 col-lg-3 mb-4">
                            <div class="feature">
                                <div class="icon">
                                    <i class="ion-bag" style="font-size:40px; color:#fff;"></i>
                                    <!-- <img src="images/services/bag.svg" alt="Image" class="imf-fluid"> -->
                                </div>
                                <h3 style="color:#a0a0a0;  ">Easy to Shop</h3>
                                <p>Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam
                                    vulputate.</p>
                            </div>
                        </div>

                        <div class="col-6 col-md-6 col-lg-3 mb-4">
                            <div class="feature">
                                <div class="icon">
                                    <i class="ion-clock" style="font-size:40px; color:#fff;"></i>
                                    <!-- <img src="images/services/support.svg" alt="Image" class="imf-fluid"> -->
                                </div>
                                <h3 style="color:#a0a0a0; font-family: fenix; font-size: 25px; ">24/7 Support</h3>
                                <p>Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam
                                    vulputate.</p>
                            </div>
                        </div>

                        <div class="col-6 col-md-6 col-lg-3 mb-4">
                            <div class="feature">
                                <div class="icon">
                                    <i class="ion-arrow-return-right" style="font-size:40px; color:#fff;"></i>
                                    <!-- <img src="images/services/return.svg" alt="Image" class="imf-fluid"> -->
                                </div>
                                <h3 style="color:#a0a0a0; font-family: fenix; font-size: 25px;">Hassle Free Returns</h3>
                                <p class="font-family:inherit;">Donec vitae odio quis nisl dapibus malesuada. Nullam ac
                                    aliquet velit. Aliquam
                                    vulputate.</p>
                            </div>
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