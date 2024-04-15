
<?php
session_start();
include('config.php');

if (isset($_GET['id'])) {
    $productid = $_GET['id'];

    $sql = "SELECT * FROM products WHERE product_id = '$productid'";
    $result = mysqli_query($conn, $sql);

    $total = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);

    $productname = $row['name'];
    $catid = $row['cat_id'];
    $details = $row['details'];
    $price = $row['price'];
    $netprice = $row['net_price'];
    $image = $row['image'];

}
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
<style>
    #action ul li a {
    /* line-height: 37px;
    height: 35px;
    width: 35px; */
    background: #a8741a;
    color: #ffffff;
    /* display: block;
    text-align: center; */
}
</style>
</head>

<body>
    <div class="home_black_version">
        <!-- Header Starts  -->
        <?php include('header.php') ?>
        <!-- Header Ends  -->
        <section class="banner_section banner_black" style="border-bottom: 0px solid #2d2d2d; padding-bottom:100px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-sm-12" style="padding-top:20px;">
                        <img src="admin/<?php echo $image; ?>" alt=""
                            style=" height:auto; max-width:60%; margin-left: 15%;">
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-12">
                        <div class="modal_right">
                            <div class="modal_title mb-10">
                                <h2 style="padding-top:20px; text-align: justify;">
                                    <?php echo $productname; ?>
                                </h2>
                            </div>
                            <div class="modal_price mb-10">
                                <span class="old_price">Rs.
                                    <?php echo $price; ?>
                                </span>
                                <span class="new_price">Rs.
                                    <?php echo $netprice; ?>
                                </span>

                            </div>

                            <div class="modal_add_to_cart mb-15" style="border:none;">

                                <form action="add_to_cart.php">
                                    <input type="hidden" name="id" value="<?php echo $productid; ?>">
                                    <input class="text-white" type="number" min="1" max="100" step="1" value="1"
                                        name="quantity">
                                    <button type="submit">Add to Cart</button>

                                    <div class="action_links">
                                        <ul>
                                            <li class="add_to_cart"><a href="buyNow.php?id=<?php echo $productid; ?>"
                                                    title="Buy Now">Buy Now</a></li>

                                            <li><a href="wishlist.php?id=<?php echo $_GET['id']; ?>"
                                                    data-placement="top" class="mt-3" title="Add to wishlist"
                                                    data-toggle="tooltip"><span class="ion-heart"></span></a></li>
                                        </ul>
                                    </div>


                                </form>

                            </div>
                            <div class="modal_category mb-10" style="margin-top:-25px; font-size:15px; color:#fff;">

                                <?php
                                $sql2 = "SELECT  * FROM category WHERE cat_id = $catid";
                                $result2 = mysqli_query($conn, $sql2);

                                $row2 = mysqli_fetch_assoc($result2)

                                    ?>

                                Categories - <a href="index.php?id=<?php echo $catid; ?>">
                                    <?php echo $row2['cat_name']; ?>
                                </a>
                            </div>
                            <div class="modal_description mb-15" style="border:none; ">
                                <p style="padding-top:20px;">
                                    <?php echo $details; ?>
                                </p>
                            </div>

                            <div class="action_links" id="action">
                                <ul>
                                    <li class="add_to_cart"><a href="rating.php?id=<?php echo $productid; ?>"
                                            title="">Rate this product</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section class="product_section p_section1 product_black_section" style="margin-top:-120px;">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="product_area">
                            <div class="tab_content">
                                <div class="tab-pane fade show active" id="featured" role="tabpane1">
                                    <div class="product_container">
                                        <div class="head" style="color:#fff; font-size:20px; margin-bottom:20px;">
                                            Related Products
                                        </div>
                                        <div class="custom-row product_column3">
                                            <?php

                                            // $sql_related = "SELECT * FROM products WHERE product_id != $productid order by rand()";
                                            $sql_related = "SELECT * FROM products order by rand()";


                                            $result_related = mysqli_query($conn, $sql_related);
                                            while ($row_related = mysqli_fetch_assoc($result_related)) {

                                                ?>

                                                <div class="custom-col-5">
                                                    <div class="single_product">
                                                        <div class="product_thumb">
                                                            <a href="#" class="primary_img"><img
                                                                    src="admin/<?php echo $row_related['image']; ?>"
                                                                    alt="p"></a>

                                                            <div class="quick_button">
                                                                <a
                                                                    href="details.php?id=<?php echo $row_related["product_id"]; ?>">Buy
                                                                    Now</a>
                                                            </div>
                                                        </div>
                                                        <div class="product_content">
                                                            <div class="tag_cate">
                                                                <a>Ring, Necklace,</a>
                                                                <a>Earrings</a>
                                                            </div>
                                                            <h3><a
                                                                    href="details.php?id=<?php echo $row_related["product_id"]; ?>">
                                                                    <?php echo $row_related['name']; ?>
                                                                </a></h3>
                                                            <div class="price_box">
                                                                <span class="old_price">Rs.
                                                                    <?php echo $row_related['price']; ?>
                                                                </span>
                                                                <span class="current_price">Rs.
                                                                    <?php echo $row_related['net_price']; ?>
                                                                </span>
                                                            </div>
                                                            <div class="product_hover">
                                                                <!-- <div class="product_ratings">
                                                                    <ul>
                                                                        <li><a href="#"><i
                                                                                    class="ion-ios-star-outline"></i></a>
                                                                        </li>
                                                                        <li><a href="#"><i
                                                                                    class="ion-ios-star-outline"></i></a>
                                                                        </li>
                                                                        <li><a href="#"><i
                                                                                    class="ion-ios-star-outline"></i></a>
                                                                        </li>
                                                                        <li><a href="#"><i
                                                                                    class="ion-ios-star-outline"></i></a>
                                                                        </li>
                                                                        <li><a href="#"><i
                                                                                    class="ion-ios-star-outline"></i></a>
                                                                        </li>
                                                                    </ul>
                                                                </div> -->
                                                                <div class="product_desc">
                                                                    <p>
                                                                        <?php echo $row_related['details']; ?>
                                                                    </p>
                                                                </div>
                                                                <div class="action_links">
                                                                    <ul>
                                                                        <li><a href="wishlist.php?id=<?php echo $row_related['product_id']; ?>"
                                                                                data-placement="top" title="Add to wishlist"
                                                                                data-toggle="tooltip"><span
                                                                                    class="ion-heart"></span></a></li>
                                                                        <li class="add_to_cart"><a
                                                                                href="add_to_cart.php?id=<?php echo $row_related["product_id"]; ?>"
                                                                                title="Add to Cart">Add to Cart</a></li>
                                                                        <li><a href="details.php?id=<?php echo $row_related["product_id"]; ?>"
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