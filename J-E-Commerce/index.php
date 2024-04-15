<?php
session_start();
include('config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aashiana Jewellery</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="responsive.css">

</head>

<body>
    <div class="home_black_version">
        <!-- Header Starts  -->
        <?php include('header.php') ?>
        <!-- Header Ends  -->

        <!-- Slider Section Starts -->
        <div class="slider_area slider_black owl-carousel">
            <div class="single_slider" data-bgimg="images/slider/1.png">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <div class="slider_content">
                                <p>exclusive offer -20% off this week</p>
                                <h1>Necklace</h1>
                                <span>22 carat gold necklace for wedding</span>
                                <p class="slider_price">starting at <span>Rs. 65,000</span></p>
                                <a href="collection1.php?id=3" class="button">Shop Now</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="single_slider" data-bgimg="images/slider/2.jpg">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <div class="slider_content">
                                <p>exclusive offer -20% off this week</p>
                                <h1>Earings and Pendant</h1>
                                <span>Complete bridal set with white pearls</span>
                                <p class="slider_price">starting at <span>Rs. 95,000</span></p>
                                <a href="collection1.php?id=4" class="button">Shop Now</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="single_slider" data-bgimg="images/slider/3.jpg">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <div class="slider_content">
                                <p>exclusive offer -20% off this week</p>
                                <h1>Wedding Rings</h1>
                                <span>Aashiyana Special wedding rings for couples.</span>
                                <p class="slider_price">starting at <span>Rs. 5,000</span></p>
                                <a href="collection1.php?id=1" class="button">Shop Now</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Slider Section Ends -->

        <!-- Banner Section Starts -->
        <section class="banner_section banner_black" id="banner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="single_banner">
                            <div class="banner_thumb">
                                <a href="#"><img src="images/banner/bg1.jpg" alt="b1"></a>
                                <div class="banner_content">
                                    <p>New Design</p>
                                    <h2>Small design</h2>
                                    <span>Sale 20% </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single_banner">
                            <div class="banner_thumb">
                                <a href="#"><img src="images/banner/bg2.jpg" alt="b2"></a>
                                <div class="banner_content">
                                    <p>Bestselling Rings</p>
                                    <h2>White gold rings</h2>
                                    <span>Sale 10% </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single_banner">
                            <div class="banner_thumb">
                                <a href="#"><img src="images/banner/bg3.jpg" alt="b3"></a>
                                <div class="banner_content">
                                    <p>Featured Rings</p>
                                    <h2>Platinium rings</h2>
                                    <span>Sale 30% </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Banner Section Ends -->

        <!-- Product Section Starts -->
        <section class="product_section p_section1 product_black_section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="product_area">
                            <div class="product_tab_button">
                                <ul class="nav" role="tablist">
                                    <li>
                                        <a href="#featured" class="active" data-toggle="tab" role="tab"
                                            aria-controls="featured" aria-selected="true">Featured</a>
                                    </li>
                                    <li>
                                        <a href="#arrivals" data-toggle="tab" role="tab" aria-controls="arrivals"
                                            aria-selected="false">New Arrivals</a>
                                    </li>
                                    <li>
                                        <a href="#onsale" data-toggle="tab" role="tab" aria-controls="onsale"
                                            aria-selected="false">On-Sale</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab_content">
                                <div class="tab-pane fade show active" id="featured" role="tabpane1">
                                    <div class="product_container">
                                        <div class="custom-row product_column3">
                                            <?php

                                            $sql = "SELECT * FROM products WHERE collection = 'Featured' ";

                                            if (isset($_GET['id'])) {
                                                $catID = $_GET['id'];
                                                $sql .= " WHERE cat_id = '$catID' ";
                                            }

                                            $result = mysqli_query($conn, $sql);
                                            while ($row = mysqli_fetch_assoc($result)) {

                                                ?>
                                                <div class="custom-col-5">
                                                    <div class="single_product">
                                                        <div class="product_thumb">
                                                            <a class="primary_img"><img
                                                                    src="admin/<?php echo $row["image"]; ?>" alt="p"></a>

                                                            <div class="quick_button">
                                                                <a href="details.php?id=<?php echo $row["product_id"]; ?>">Buy
                                                                    Now</a>
                                                            </div>
                                                        </div>
                                                        <div class="product_content text-white">
                                                            <div class="tag_cate">
                                                                <a>Ring, Necklace,</a>
                                                                <a>Earrings</a>
                                                            </div>
                                                            <h3><a href="details.php?id=<?php echo $row["product_id"]; ?>">
                                                                    <?php echo $row["name"]; ?>
                                                                </a></h3>
                                                            <div class="price_box">
                                                                <span class="old_price">Rs.
                                                                    <?php echo $row["price"]; ?>
                                                                </span>
                                                                <span class="current_price">Rs.
                                                                    <?php echo $row["net_price"]; ?>
                                                                </span>
                                                            </div>
                                                            <div class="product_hover">
                                                                <div class="product_ratings">
                                                                    <ul>
                                                                       <?php 
                                                                       $sql = $conn->query("SELECT id FROM ratings");
                                                                       $numR = $sql->num_rows;
                                                                       
                                                                       $sql = $conn->query("SELECT SUM(rating_number) AS total FROM ratings");
                                                                       $data = $sql->fetch_array();
                                                                       $total = $data["total"];
                                                                       
                                                                       $avg = "";
                                                                       
                                                                       
                                                                       if ($numR != 0) {
                                                                           if (is_nan(round(($total / $numR), 1))) {
                                                                               $avg = 0;
                                                                           } else {
                                                                               $avg = round(($total / $numR), 1);
                                                                           }
                                                                       } else {
                                                                           $avg = 0;
                                                                       }
                                                                       ?>
                                                                        <li><a><?php echo $avg;?></a>
                                                                        </li>
                                                                         <li><a><i
                                                                                    class="ion-star"></i></a>
                                                                        </li>
                                                                        <!--<li><a><i
                                                                                    class="ion-star"></i></a>
                                                                        </li>
                                                                        <li><a><i
                                                                                    class="ion-ios-star-outline"></i></a>
                                                                        </li>
                                                                        <li><a><i
                                                                                    class="ion-ios-star-outline"></i></a>
                                                                        </li> -->
                                                                    </ul>
                                                                </div>
                                                                <div class="product_desc">
                                                                    <p>
                                                                        <?php echo $row["details"]; ?>
                                                                    </p>
                                                                </div>
                                                                <div class="action_links">
                                                                    <ul>
                                                                        <li><a href="wishlist.php?id=<?php echo $row['product_id']; ?>"
                                                                                data-placement="top" title="Add to wishlist"
                                                                                data-toggle="tooltip"><span
                                                                                    class="ion-heart"></span></a></li>
                                                                        <li class="add_to_cart"><a
                                                                                href="add_to_cart.php?id=<?php echo $row["product_id"]; ?>"
                                                                                title="Add to Cart">Add to Cart</a></li>
                                                                        <li><a href="details.php?id=<?php echo $row["product_id"]; ?>"
                                                                                title="View"><i class="ion-eye h5"></i></a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                            ?>

                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="arrivals" role="tabpane1">
                                    <div class="product_container">
                                        <div class="custom-row product_column3">
                                            <?php

                                            $sql = "SELECT * FROM products WHERE collection = 'New Arrival'";

                                            if (isset($_GET['id'])) {
                                                $catID = $_GET['id'];
                                                $sql .= " WHERE cat_id = '$catID' ";
                                            }

                                            $result = mysqli_query($conn, $sql);
                                            while ($row = mysqli_fetch_assoc($result)) {

                                                ?>
                                                <div class="custom-col-5">
                                                    <div class="single_product">
                                                        <div class="product_thumb">
                                                            <a class="primary_img"><img
                                                                    src="admin/<?php echo $row["image"]; ?>" alt="p"></a>

                                                            <div class="quick_button">
                                                                <a href="details.php?id=<?php echo $row["product_id"]; ?>">Buy
                                                                    Now</a>
                                                            </div>
                                                        </div>
                                                        <div class="product_content text-white">
                                                            <div class="tag_cate">
                                                                <a>Ring, Necklace,</a>
                                                                <a>Earrings</a>
                                                            </div>
                                                            <h3><a>
                                                                    <?php echo $row["name"]; ?>
                                                                </a></h3>
                                                            <div class="price_box">
                                                                <span class="old_price">Rs.
                                                                    <?php echo $row["price"]; ?>
                                                                </span>
                                                                <span class="current_price">Rs.
                                                                    <?php echo $row["net_price"]; ?>
                                                                </span>
                                                            </div>
                                                            <div class="product_hover">
                                                                <!-- <div class="product_ratings">
                                                                    <ul>
                                                                        <li><a><i
                                                                                    class="ion-ios-star-outline"></i></a>
                                                                        </li>
                                                                        <li><a><i
                                                                                    class="ion-ios-star-outline"></i></a>
                                                                        </li>
                                                                        <li><a><i
                                                                                    class="ion-ios-star-outline"></i></a>
                                                                        </li>
                                                                        <li><a><i
                                                                                    class="ion-ios-star-outline"></i></a>
                                                                        </li>
                                                                        <li><a><i
                                                                                    class="ion-ios-star-outline"></i></a>
                                                                        </li>
                                                                    </ul>
                                                                </div> -->
                                                                <div class="product_desc">
                                                                    <p>
                                                                        <?php echo $row["details"]; ?>
                                                                    </p>
                                                                </div>
                                                                <div class="action_links">
                                                                    <ul>
                                                                        <li><a href="wishlist.php?id=<?php echo $row['product_id']; ?>"
                                                                                data-placement="top" title="Add to wishlist"
                                                                                data-toggle="tooltip"><span
                                                                                    class="ion-heart"></span></a></li>
                                                                        <li class="add_to_cart"><a
                                                                                href="add_to_cart.php?id=<?php echo $row["product_id"]; ?>"
                                                                                title="Add to Cart">Add to Cart</a></li>
                                                                        <li><a href="details.php?id=<?php echo $row["product_id"]; ?>"
                                                                                title="View"><i class="ion-eye h5"></i></a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                            ?>

                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="onsale" role="tabpane1">
                                    <div class="product_container">
                                        <div class="custom-row product_column3">
                                            <?php

                                            $sql = "SELECT * FROM products WHERE collection = 'On Sale'";

                                            if (isset($_GET['id'])) {
                                                $catID = $_GET['id'];
                                                $sql .= " WHERE cat_id = '$catID' ";
                                            }

                                            $result = mysqli_query($conn, $sql);
                                            while ($row = mysqli_fetch_assoc($result)) {

                                                ?>
                                                <div class="custom-col-5">
                                                    <div class="single_product">
                                                        <div class="product_thumb">
                                                            <a class="primary_img"><img
                                                                    src="admin/<?php echo $row["image"]; ?>" alt="p"></a>

                                                            <div class="quick_button">
                                                                <a href="details.php?id=<?php echo $row["product_id"]; ?>">Buy
                                                                    Now</a>
                                                            </div>
                                                        </div>
                                                        <div class="product_content text-white">
                                                            <div class="tag_cate">
                                                                <a>Ring, Necklace,</a>
                                                                <a>Earrings</a>
                                                            </div>
                                                            <h3><a>
                                                                    <?php echo $row["name"]; ?>
                                                                </a></h3>
                                                            <div class="price_box">
                                                                <span class="old_price">Rs.
                                                                    <?php echo $row["price"]; ?>
                                                                </span>
                                                                <span class="current_price">Rs.
                                                                    <?php echo $row["net_price"]; ?>
                                                                </span>
                                                            </div>
                                                            <div class="product_hover">
                                                                <!-- <div class="product_ratings">
                                                                    <ul>
                                                                        <li><a><i
                                                                                    class="ion-ios-star-outline"></i></a>
                                                                        </li>
                                                                        <li><a><i
                                                                                    class="ion-ios-star-outline"></i></a>
                                                                        </li>
                                                                        <li><a><i
                                                                                    class="ion-ios-star-outline"></i></a>
                                                                        </li>
                                                                        <li><a><i
                                                                                    class="ion-ios-star-outline"></i></a>
                                                                        </li>
                                                                        <li><a><i
                                                                                    class="ion-ios-star-outline"></i></a>
                                                                        </li>
                                                                    </ul>
                                                                </div> -->
                                                                <div class="product_desc">
                                                                    <p>
                                                                        <?php echo $row["details"]; ?>
                                                                    </p>
                                                                </div>
                                                                <div class="action_links">
                                                                    <ul>
                                                                        <li><a href="wishlist.php?id=<?php echo $row['product_id']; ?>"
                                                                                data-placement="top" title="Add to wishlist"
                                                                                data-toggle="tooltip"><span
                                                                                    class="ion-heart"></span></a></li>
                                                                        <li class="add_to_cart"><a
                                                                                href="add_to_cart.php?id=<?php echo $row["product_id"]; ?>"
                                                                                title="Add to Cart">Add to Cart</a></li>
                                                                        <li><a href="details.php?id=<?php echo $row["product_id"]; ?>"
                                                                                title="View"><i class="ion-eye h5"></i></a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                            ?>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Product Section Ends -->

        <!-- Banner full width Starts -->
        <section class="banner_fullwidth black_fullwidth">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="banner_text">
                            <p>Sale Off 20% On All Products</p>
                            <h2>New Trending Collection</h2>
                            <span>Best Design makes you more special.</span>
                            <a href="collection1.php">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Banner full width Ends -->

        <!-- Product section Starts -->
        <section class="product_section p_section1 product_black_section bottom" id="bestselling">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section_title">
                            <h2>Bestselling Products</h2>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="product-area">
                            <div class="product_container bottom">
                                <div class="custom-row product_row1">
                                    <div class="custom-col-5">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img"><img src="images/product/61.jpg" alt="p3"></a>
                                                <a class="secondary_img"><img src="images/product/82.jpg" alt="p5"></a>
                                                <div class="quick_button">
                                                    <a href="#" data-toggle="modal" data-target="#modal_box"
                                                        data-placement="top" data-original-title="">Buy Now</a>
                                                </div>
                                            </div>
                                            <div class="product_content text-white">
                                                <div class="tag_cate">
                                                    <a>Ring, Necklace,</a>
                                                    <a>Earrings</a>
                                                </div>
                                                <h3><a>Necklace Set</a></h3>
                                                <div class="price_box">
                                                    <span class="old_price">Rs. 45,654</span>
                                                    <span class="current_price">Rs. 44,654</span>
                                                </div>
                                                <div class="product_hover">
                                                    <!-- <div class="product_ratings">
                                                        <ul>
                                                            <li><a><i class="ion-star"></i></a>
                                                            </li>
                                                            <li><a><i class="ion-star"></i></a>
                                                            </li>
                                                            <li><a><i class="ion-ios-star-half"></i></a>
                                                            </li>
                                                            <li><a><i class="ion-ios-star-outline"></i></a>
                                                            </li>
                                                            <li><a><i class="ion-ios-star-outline"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div> -->
                                                    <div class="product_desc">
                                                        <p>Coordinated jewelry ensemble comprising necklace, earrings,
                                                            and sometimes a pendant. Offers elegance, versatility, and
                                                            complements attire for various occasions with style.</p>
                                                    </div>
                                                    <div class="action_links">
                                                        <ul>
                                                            <li><a href="#" data-placement="top" title="Add to wishlist"
                                                                    data-toggle="tooltip"><span
                                                                        class="ion-heart"></span></a></li>
                                                            <li class="add_to_cart"><a href="#" title="Add to Cart">Add
                                                                    to Cart</a></li>
                                                            <li><a href="#" title="View"><i class="ion-eye h5"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="custom-col-5">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img"><img src="images/product/43.jpg" alt="p3"></a>
                                                <a class="secondary_img"><img src="images/product/33.jpg" alt="p5"></a>
                                                <div class="quick_button">
                                                    <a href="#" data-toggle="modal" data-target="#modal_box"
                                                        data-placement="top" data-original-title="">Buy Now</a>
                                                </div>
                                            </div>
                                            <div class="product_content text-white">
                                                <div class="tag_cate">
                                                    <a>Ring, Necklace,</a>
                                                    <a>Earrings</a>
                                                </div>
                                                <h3><a>Necklace</a></h3>
                                                <div class="price_box">
                                                    <span class="old_price">Rs. 42,654</span>
                                                    <span class="current_price">Rs. 40,654</span>
                                                </div>
                                                <div class="product_hover">
                                                    <!-- <div class="product_ratings">
                                                        <ul>
                                                            <li><a><i class="ion-star"></i></a>
                                                            </li>
                                                            <li><a><i class="ion-star"></i></a>
                                                            </li>
                                                            <li><a><i class="ion-star"></i></a>
                                                            </li>
                                                            <li><a><i class="ion-ios-star-half"></i></a>
                                                            </li>
                                                            <li><a><i class="ion-ios-star-outline"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div> -->
                                                    <div class="product_desc">
                                                        <p>An adornment worn around the neck, crafted in diverse styles
                                                            and materials, symbolizing elegance, culture, fashion,
                                                            tradition, and personal expression with grace.</p>
                                                    </div>
                                                    <div class="action_links">
                                                        <ul>
                                                            <li><a href="#" data-placement="top" title="Add to wishlist"
                                                                    data-toggle="tooltip"><span
                                                                        class="ion-heart"></span></a></li>
                                                            <li class="add_to_cart"><a href="#" title="Add to Cart">Add
                                                                    to Cart</a></li>
                                                            <li><a href="#" title="View"><i class="ion-eye h5"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="custom-col-5">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img"><img src="images/product/1.jpg" alt="p3"></a>
                                                <a class="secondary_img"><img src="images/product/26.jpg" alt="p5"></a>
                                                <div class="quick_button">
                                                    <a href="#" data-toggle="modal" data-target="#modal_box"
                                                        data-placement="top" data-original-title="">Buy Now</a>
                                                </div>
                                            </div>
                                            <div class="product_content text-white">
                                                <div class="tag_cate">
                                                    <a>Ring, Necklace,</a>
                                                    <a>Earrings</a>
                                                </div>
                                                <h3><a>Earrings</a></h3>
                                                <div class="price_box">
                                                    <span class="old_price">Rs. 38,654</span>
                                                    <span class="current_price">Rs. 36,654</span>
                                                </div>
                                                <div class="product_hover">
                                                    <!-- <div class="product_ratings">
                                                        <ul>
                                                            <li><a><i class="ion-star"></i></a>
                                                            </li>
                                                            <li><a><i class="ion-star"></i></a>
                                                            </li>
                                                            <li><a><i class="ion-ios-star-half"></i></a>
                                                            </li>
                                                            <li><a><i class="ion-ios-star-outline"></i></a>
                                                            </li>
                                                            <li><a><i class="ion-ios-star-outline"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div> -->
                                                    <div class="product_desc">
                                                        <p>Ornamental accessories worn on the ears, available in various
                                                            styles and materials. They accentuate facial features and
                                                            add elegance to attire.</p>
                                                    </div>
                                                    <div class="action_links">
                                                        <ul>
                                                            <li><a href="#" data-placement="top" title="Add to wishlist"
                                                                    data-toggle="tooltip"><span
                                                                        class="ion-heart"></span></a></li>
                                                            <li class="add_to_cart"><a href="#" title="Add to Cart">Add
                                                                    to Cart</a></li>
                                                            <li><a href="#" title="View"><i class="ion-eye h5"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="custom-col-5">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img"><img src="images/product/67.jpg" alt="p3"></a>
                                                <a class="secondary_img"><img src="images/product/17.jpg" alt="p5"></a>
                                                <div class="quick_button">
                                                    <a href="#" data-toggle="modal" data-target="#modal_box"
                                                        data-placement="top" data-original-title="">Buy Now</a>
                                                </div>
                                            </div>
                                            <div class="product_content text-white">
                                                <div class="tag_cate">
                                                    <a>Ring, Necklace,</a>
                                                    <a>Earrings</a>
                                                </div>
                                                <h3><a>Bracelet</a></h3>
                                                <div class="price_box">
                                                    <span class="old_price">Rs. 24,654</span>
                                                    <span class="current_price">Rs. 20,654</span>
                                                </div>
                                                <div class="product_hover">
                                                    <!-- <div class="product_ratings">
                                                        <ul>
                                                            <li><a><i class="ion-star"></i></a>
                                                            </li>
                                                            <li><a><i class="ion-star"></i></a>
                                                            </li>
                                                            <li><a><i class="ion-star"></i></a>
                                                            </li>
                                                            <li><a><i class="ion-ios-star-half"></i></a>
                                                            </li>
                                                            <li><a><i class="ion-ios-star-outline"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div> -->
                                                    <div class="product_desc">
                                                        <p>Wrist adornment, crafted in diverse styles and materials.
                                                            Symbolizing fashion, tradition, and personal expression,
                                                            bracelets complement attire and accentuate individual style.
                                                        </p>
                                                    </div>
                                                    <div class="action_links">
                                                        <ul>
                                                            <li><a href="#" data-placement="top" title="Add to wishlist"
                                                                    data-toggle="tooltip"><span
                                                                        class="ion-heart"></span></a></li>
                                                            <li class="add_to_cart"><a href="#" title="Add to Cart">Add
                                                                    to Cart</a></li>
                                                            <li><a href="#" title="View"><i class="ion-eye h5"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="custom-col-5">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img"><img src="images/product/68.jpg" alt="p3"></a>
                                                <a class="secondary_img"><img src="images/product/73.jpg" alt="p5"></a>
                                                <div class="quick_button">
                                                    <a href="#" data-toggle="modal" data-target="#modal_box"
                                                        data-placement="top" data-original-title="">Buy Now</a>
                                                </div>
                                            </div>
                                            <div class="product_content text-white">
                                                <div class="tag_cate">
                                                    <a>Ring, Necklace,</a>
                                                    <a>Earrings</a>
                                                </div>
                                                <h3><a>Nose Pin</a></h3>
                                                <div class="price_box">
                                                    <span class="old_price">Rs. 5,654</span>
                                                    <span class="current_price">Rs. 4,654</span>
                                                </div>
                                                <div class="product_hover">
                                                    <!-- <div class="product_ratings">
                                                        <ul>
                                                            <li><a><i class="ion-star"></i></a>
                                                            </li>
                                                            <li><a><i class="ion-star"></i></a>
                                                            </li>
                                                            <li><a><i class="ion-ios-star-half"></i></a>
                                                            </li>
                                                            <li><a><i class="ion-ios-star-outline"></i></a>
                                                            </li>
                                                            <li><a><i class="ion-ios-star-outline"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div> -->
                                                    <div class="product_desc">
                                                        <p>Small ornament worn on the nose, available in various designs
                                                            and materials. It adds elegance and cultural significance to
                                                            personal style.</p>
                                                    </div>
                                                    <div class="action_links">
                                                        <ul>
                                                            <li><a href="#" data-placement="top" title="Add to wishlist"
                                                                    data-toggle="tooltip"><span
                                                                        class="ion-heart"></span></a></li>
                                                            <li class="add_to_cart"><a href="#" title="Add to Cart">Add
                                                                    to Cart</a></li>
                                                            <li><a href="#" title="View"><i class="ion-eye h5"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="custom-col-5">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img"><img src="images/product/84.jpg" alt="p3"></a>
                                                <a class="secondary_img"><img src="images/product/64.jpg" alt="p5"></a>
                                                <div class="quick_button">
                                                    <a href="#" data-toggle="modal" data-target="#modal_box"
                                                        data-placement="top" data-original-title="">Buy Now</a>
                                                </div>
                                            </div>
                                            <div class="product_content text-white">
                                                <div class="tag_cate">
                                                    <a>Ring, Necklace,</a>
                                                    <a>Earrings</a>
                                                </div>
                                                <h3><a>Gemstone</a></h3>
                                                <div class="price_box">
                                                    <span class="old_price">Rs. 5,654</span>
                                                    <span class="current_price">Rs. 3,654</span>
                                                </div>
                                                <div class="product_hover">
                                                    <!-- <div class="product_ratings">
                                                        <ul>
                                                            <li><a><i class="ion-star"></i></a>
                                                            </li>
                                                            <li><a><i class="ion-ios-star-half"></i></a>
                                                            </li>
                                                            <li><a><i class="ion-ios-star-outline"></i></a>
                                                            </li>
                                                            <li><a><i class="ion-ios-star-outline"></i></a>
                                                            </li>
                                                            <li><a><i class="ion-ios-star-outline"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div> -->
                                                    <div class="product_desc">
                                                        <p>Precious or semi-precious mineral cut and polished for
                                                            adornment. It comes in various colors and types, symbolizing
                                                            beauty, rarity, and elegance in jewelry.</p>
                                                    </div>
                                                    <div class="action_links">
                                                        <ul>
                                                            <li><a href="#" data-placement="top" title="Add to wishlist"
                                                                    data-toggle="tooltip"><span
                                                                        class="ion-heart"></span></a></li>
                                                            <li class="add_to_cart"><a href="#" title="Add to Cart">Add
                                                                    to Cart</a></li>
                                                            <li><a href="#" title="View"><i class="ion-eye h5"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="custom-col-5">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img"><img src="images/product/80.jpg" alt="p3"></a>
                                                <a class="secondary_img"><img src="images/product/85.jpg" alt="p5"></a>
                                                <div class="quick_button">
                                                    <a href="#" data-toggle="modal" data-target="#modal_box"
                                                        data-placement="top" data-original-title="">Buy Now</a>
                                                </div>
                                            </div>
                                            <div class="product_content text-white">
                                                <div class="tag_cate">
                                                    <a>Ring, Necklace,</a>
                                                    <a>Earrings</a>
                                                </div>
                                                <h3><a>Couple Rings</a></h3>
                                                <div class="price_box">
                                                    <span class="old_price">Rs. 15,654</span>
                                                    <span class="current_price">Rs. 14,654</span>
                                                </div>
                                                <div class="product_hover">
                                                    <!-- <div class="product_ratings">
                                                        <ul>
                                                            <li><a><i class="ion-star"></i></a>
                                                            </li>
                                                            <li><a><i class="ion-star"></i></a>
                                                            </li>
                                                            <li><a><i class="ion-ios-star-half"></i></a>
                                                            </li>
                                                            <li><a><i class="ion-ios-star-outline"></i></a>
                                                            </li>
                                                            <li><a><i class="ion-ios-star-outline"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div> -->
                                                    <div class="product_desc">
                                                        <p>Matching bands symbolizing love and commitment between
                                                            partners. They signify unity, devotion, and shared promises,
                                                            representing a lasting bond and relationship.</p>
                                                    </div>
                                                    <div class="action_links">
                                                        <ul>
                                                            <li><a href="#" data-placement="top" title="Add to wishlist"
                                                                    data-toggle="tooltip"><span
                                                                        class="ion-heart"></span></a></li>
                                                            <li class="add_to_cart"><a href="#" title="Add to Cart">Add
                                                                    to Cart</a></li>
                                                            <li><a href="#" title="View"><i class="ion-eye h5"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="custom-col-5">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img"><img src="images/product/81.jpg" alt="p3"></a>
                                                <a class="secondary_img"><img src="images/product/60.jpg" alt="p5"></a>
                                                <div class="quick_button">
                                                    <a href="#" data-toggle="modal" data-target="#modal_box"
                                                        data-placement="top" data-original-title="">Buy Now</a>
                                                </div>
                                            </div>
                                            <div class="product_content text-white">
                                                <div class="tag_cate">
                                                    <a>Ring, Necklace,</a>
                                                    <a>Earrings</a>
                                                </div>
                                                <h3><a>Weeding Set</a></h3>
                                                <div class="price_box">
                                                    <span class="old_price">Rs. 50,600</span>
                                                    <span class="current_price">Rs. 48,650</span>
                                                </div>
                                                <div class="product_hover">
                                                    <!-- <div class="product_ratings">
                                                        <ul>
                                                            <li><a><i class="ion-star"></i></a>
                                                            </li>
                                                            <li><a><i class="ion-star"></i></a>
                                                            </li>
                                                            <li><a><i class="ion-star"></i></a>
                                                            </li>
                                                            <li><a><i class="ion-ios-star-half"></i></a>
                                                            </li>
                                                            <li><a><i class="ion-ios-star-outline"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div> -->
                                                    <div class="product_desc">
                                                        <p>Coordinated ensemble including rings, necklace, earrings, and
                                                            sometimes bracelets. Symbolizes unity, commitment, and
                                                            elegance, enhancing the bridal attire with timeless grace
                                                            and significance.</p>
                                                    </div>
                                                    <div class="action_links">
                                                        <ul>
                                                            <li><a href="#" data-placement="top" title="Add to wishlist"
                                                                    data-toggle="tooltip"><span
                                                                        class="ion-heart"></span></a></li>
                                                            <li class="add_to_cart"><a href="#" title="Add to Cart">Add
                                                                    to Cart</a></li>
                                                            <li><a href="#" title="View"><i class="ion-eye h5"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="custom-col-5">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img"><img src="images/product/50.jpg" alt="p3"></a>
                                                <a class="secondary_img"><img src="images/product/38.jpg" alt="p5"></a>
                                                <div class="quick_button">
                                                    <a href="#" data-toggle="modal" data-target="#modal_box"
                                                        data-placement="top" data-original-title="">Buy Now</a>
                                                </div>
                                            </div>
                                            <div class="product_content text-white">
                                                <div class="tag_cate">
                                                    <a>Ring, Necklace,</a>
                                                    <a>Earrings</a>
                                                </div>
                                                <h3><a>Rings</a></h3>
                                                <div class="price_box">
                                                    <span class="old_price">Rs. 10,654</span>
                                                    <span class="current_price">Rs. 12,654</span>
                                                </div>
                                                <div class="product_hover">
                                                    <!-- <div class="product_ratings">
                                                        <ul>
                                                            <li><a><i class="ion-star"></i></a>
                                                            </li>
                                                            <li><a><i class="ion-star"></i></a>
                                                            </li>
                                                            <li><a><i class="ion-star"></i></a>
                                                            </li>
                                                            <li><a><i class="ion-star"></i></a>
                                                            </li>
                                                            <li><a><i class="ion-ios-star-half"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div> -->
                                                    <div class="product_desc">
                                                        <p>Circular bands worn on fingers, symbolizing love, commitment,
                                                            or fashion. They come in various metals and designs,
                                                            signifying bonds and personal style.</p>
                                                    </div>
                                                    <div class="action_links">
                                                        <ul>
                                                            <li><a href="#" data-placement="top" title="Add to wishlist"
                                                                    data-toggle="tooltip"><span
                                                                        class="ion-heart"></span></a></li>
                                                            <li class="add_to_cart"><a href="#" title="Add to Cart">Add
                                                                    to Cart</a></li>
                                                            <li><a href="#" title="View"><i class="ion-eye h5"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Product section Ends -->

        <!-- Blogs section Starts -->
        <section class="blog_section blog_black" id="blog">
            <div class="container">
                <div class="row">
                    <div class="colo-12">
                        <div class="section_title">
                            <h2><span>vk</span>shiyana Updates</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="blog_wrapper blog_column3 owl-carousel">
                        <div class="col-lg-4">
                            <div class="single_blog">
                                <div class="blog_thumb">
                                    <a><img src="images/blog/1.jpg" alt="blog"></a>
                                </div>
                                <div class="blog_content text-white">
                                    <h3><a>Earrings for Navratri</a></h3>
                                    <div class="author_name">
                                        <p>
                                            <span>By</span>

                                            <span class="themes"><span>vk</span>shiyana</span>
                                            <span class="post_by">18 December 2023</span>
                                        </p>
                                    </div>
                                    <div class="post_desc">
                                        <p>Vibrant designs reflecting the festival's joy. From traditional jhumkas to
                                            contemporary studs, earrings that resonate with colors, dances, and
                                            celebrations of Navratri it a cherished emblem profound love.</p>
                                    </div>
                                    <!-- <div class="read_more">
                                        <a href="#">Continue Reading...</a>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="single_blog">
                                <div class="blog_thumb">
                                    <a><img src="images/blog/2.jpg" alt="blog"></a>
                                </div>
                                <div class="blog_content text-white">
                                    <h3><a>Pendant for engagement</a></h3>
                                    <div class="author_name">
                                        <p>
                                            <span>By</span>

                                            <span class="themes"><span>vk</span>shiyana</span>
                                            <span class="post_by">28 February 2023</span>
                                        </p>
                                    </div>
                                    <div class="post_desc">
                                        <p>Symbolizing eternal love and commitment, our collection showcases exquisite
                                            designs. From timeless solitaires to intricate diamond clusters, each
                                            pendant radiates elegance, making it a cherished emblem profound love.</p>
                                    </div>
                                    <!-- <div class="read_more">
                                        <a href="#">Continue Reading...</a>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="single_blog">
                                <div class="blog_thumb">
                                    <a><img src="images/blog/3.jpg" alt="blog"></a>
                                </div>
                                <div class="blog_content text-white">
                                    <h3><a>Engagement Couple Rings</a></h3>
                                    <div class="author_name">
                                        <p>
                                            <span>By</span>
                                            <span class="themes"><span>vk</span>shiyana</span>
                                            <span class="post_by">18 March 2021</span>
                                        </p>
                                    </div>
                                    <div class="post_desc">
                                        <p>Celebrating the journey of love, our collection offers matching pairs
                                            radiating unity and commitment. Crafted with precision and adorned with
                                            exquisite gems, these rings symbolize eternal devotion.</p>
                                    </div>
                                    <!-- <div class="read_more">
                                        <a href="#">Continue Reading...</a>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="single_blog">
                                <div class="blog_thumb">
                                    <a><img src="images/blog/4.jpg" alt="blog"></a>
                                </div>
                                <div class="blog_content text-white">
                                    <h3><a>Earrings for Party</a></h3>
                                    <div class="author_name">
                                        <p>
                                            <span>By</span>
                                            <span class="themes"><span>vk</span>shiyana</span>
                                            <span class="post_by">08 June 2020</span>
                                        </p>
                                    </div>
                                    <div class="post_desc">
                                        <p>Amplify your style with our curated collection, designed to dazzle. From
                                            shimmering chandeliers to sleek studs, each pair elevates your ensemble,
                                            ensuring you shine brightest at every soirée and celebration.</p>
                                    </div>
                                    <!-- <div class="read_more">
                                        <a href="#">Continue Reading...</a>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Blogs section Ends -->

        <!-- Instagram section Starts -->
        <div class="instagram">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                        <div class="instagram_item set-bg" data-bgimg="images/insta/1.jpg">
                            <div class="instagram_text">
                                <i class="ion-social-instagram"></i>
                                <a href="https://www.instagram.com/meta/">@ <span>vk</span>shiyana</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                        <div class="instagram_item set-bg" data-bgimg="images/insta/2.jpg">
                            <div class="instagram_text">
                                <i class="ion-social-instagram"></i>
                                <a href="https://www.instagram.com/meta/">@ <span>vk</span>shiyana</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                        <div class="instagram_item set-bg" data-bgimg="images/insta/3.jpg">
                            <div class="instagram_text">
                                <i class="ion-social-instagram"></i>
                                <a href="https://www.instagram.com/meta/">@ <span>vk</span>shiyana</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                        <div class="instagram_item set-bg" data-bgimg="images/insta/4.jpg">
                            <div class="instagram_text">
                                <i class="ion-social-instagram"></i>
                                <a href="https://www.instagram.com/meta/">@ <span>vk</span>shiyana</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                        <div class="instagram_item set-bg" data-bgimg="images/insta/5.jpg">
                            <div class="instagram_text">
                                <i class="ion-social-instagram"></i>
                                <a href="https://www.instagram.com/meta/">@ <span>vk</span>shiyana</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                        <div class="instagram_item set-bg" data-bgimg="images/insta/6.jpg">
                            <div class="instagram_text">
                                <i class="ion-social-instagram"></i>
                                <a href="https://www.instagram.com/meta/">@ <span>vk</span>shiyana</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Instagram section Ends -->

        <!-- Subscribe section Starts -->
        <div class="newsletter_area newsletter_black">
            <div class="container">
                <div class="row mt-5">
                    <div class="col-12">
                        <div class="newsletter_content">
                            <h2>Subscribe for <span>vk</span>shiyana Magazines</h2>
                            <p>Get Email of all the updates about our latest and special offers</p>
                            <div class="subscribe_form">
                                <form class="footer-newsletter" action="subMail.php" method="post">
                                    <input type="email" placeholder="Email address..." autocapitalize="off"
                                        autocomplete="off" name="email">
                                    <button type="submit" name="subscribe">Subscribe</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Subscribe section Ends -->

        <!-- Banner area Starts -->
        <section class="banner_section banner_section_five">
            <div class="container-fluid p-0">
                <div class="row no-gutters">
                    <div class="col-lg-6 col-md-12">
                        <div class="port-box">
                            <div class="text-overlay">
                                <h1>New Arrivals 2023</h1>
                                <p>Crown for wife</p>
                            </div>
                            <img src="images/banner/1.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="port-box">
                            <div class="text-overlay">
                                <h1>Featured Products 2023</h1>
                                <p>Pendant for Valentine</p>
                            </div>
                            <img src="images/banner/2.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Banner area Ends -->

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