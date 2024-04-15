<?php
session_start();
include ('config.php');

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
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        :root {
            --primary-color: #f7bf17;
            --linear: #ef5350;
            --white: #fff;
            --r-color: #d63031;
            --light-b: #686de0;

            --yellow: #FFBD13;
            --blue: #4383FF;
            --blue-d-1: #3278FF;
            --light: #F5F5F5;
            --grey: #AAA;
            /* --white: #FFF; */
            --shadow: 8px 8px 30px rgba(0, 0, 0, .05);
        }

        /* * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        } */

        .rating-review{
            /* background: var(----grey); */
            /* display: flex;
            justify-content: center;
            align-items: center; */
            /* min-height: 100vh; */
            /* padding: 1rem; */
        }

        .rating-review {
            height: 100%;
            width: 97%;
            margin:auto;
            background:#2f3032;;
            margin-bottom: 165px;
        }

        .rating-review table {
            width: 100%;
            margin: 0;
            font-family: "roboto", sans-serif;
            border-collapse: collapse;
            border-spacing: 0;
            color: #8f8f8f;
            margin-bottom: .625rem;

        }

        .rating-review table,
        .rating-review td {
            font-size: .8125rem;
            text-align: center;
        }

        .rating-review td {
            padding: 1rem;
            width: 33.3%;
        }

        .tri {
            border-bottom: 1px solid #e2e2e2;
            padding: 12px;
        }

        .rnb h3 {
            color: var(--primary-color);
            font-size: 2.4rem;
            font-family: "roboto", sans-serif;
        }

        .tri .pdt-rate {
            height: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .rating-stars {
            position: relative;
            vertical-align: baseline;
            color: #b9b9b9;
            line-height: 10px;
            float: left;
        }

        .grey-stars {
            height: 100%;
        }

        .filled-stars {
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            overflow: hidden;
            color: var(--primary-color);
        }

        .filled-stars::before,
        .grey-stars::before {
            content: "\2605 \2605 \2605 \2605 \2605";
            font-size: 19px;
            line-height: 18px;
            letter-spacing: 0;
        }

        .tri .filled-stars::before,
        .tri .grey-stars::before {
            font-size: 20px;
            line-height: 23px;
        }

        .rnrn {
            width: 100%;
            font-family: "lato";
            font-weight: 700;
            font-size: 1rem;
        }

        .rpb {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .rnpb {
            display: flex;
            width: 100%;
        }

        .rnpb label:first-child {
            margin-right: 5px;
            margin-top: -6px;
        }

        .rnpb label:last-child {
            margin-right: 3px;
            margin-top: -6px;
        }

        .rnpb label i {
            color: var(--primary-color);
            margin-top: -6px;
        }
        .rnpb .label{
            margin-top: -6px;
        }


        .ropb {
            height: 10px;
            width: 75%;
            background-color: #f1f1f1;
            position: relative;
            margin-bottom: 10px;
        }

        .ripb {
            height: 100%;
            background-color: var(--primary-color);
            border: 1px solid #a0a0a0;
        }

        .rrb p {
            font-size: 1rem;
            font-weight: 500;
            font-family: "raleway";
            margin-bottom: 10px;
        }

        .rrb button {
            width: 220px;
            height: 40px;
            background: var(--light-b);
            color: var(--white);
            border: 0;
            outline: none;
            font-size: 1.2rem;
            font-family: "roboto", sans-serif;
            box-shadow: 0px 2px 2px var(--light-b);
            cursor: pointer;
        }

        .rrb button:hover {
            opacity: .9;
        }

        .review-bg {
            position: fixed;
            background: rgba(0, 0, 0, .8);
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 100;
        }

        .review-modal {
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 101;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .rmp {
            width: 400px;
            height: auto;
            background: var(--white);
            border-radius: 10px;
            animation: scaleUp .7s linear;
            transition: all .7s ease-in-out;
            z-index: 201;
        }

        @keyframes scaleUp {
            0% {
                /* opacity: 0; */
                transform: scale(0.2);
            }

            25% {
                /* opacity: 1; */
                transform: scale(0.8);
            }

            50% {
                /* opacity: 1; */
                transform: scale(1.2);
            }

            75% {
                /* opacity: 1; */
                transform: scale(0.8);
            }

            100% {
                /* opacity: 1; */
                transform: scale(1);
            }
        }

        .rpc {
            text-align: right;
            padding: 6px 15px;
            font-size: 1.5rem;
            color: var(--linear);
        }

        .rpc span {
            cursor: pointer;
        }

        .rps {
            padding: 20px;
        }

        .rps h3 {
            font-size: 1.5rem;
            font-weight: 600;
            /* margin-bottom: 1rem; */
            font-family: 'Poppins', sans-serif;
        }

        .rps i {
            font-size: 1.6rem;
            cursor: pointer;
        }

        .rptf textarea,
        .rptf input {
            width: 80%;
            outline: none;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 7px;
            resize: none;
            min-height: 80px;
            margin-bottom: 10px;
            font-family: "roboto", sans-serif;
            font-size: .9rem;
            font-weight: 100;
            color: #777;
        }

        .rptf input {
            min-height: 10px !important;
        }

        .rate-error {
            font-size: 12px;
            color: var(--r-color);
            font-family: 'roboto', sans-serif;
            margin-bottom: 5px;
            font-weight: 500;
        }

        .rpsb button {
            color: var(--white);
            background: var(--light-b);
            border: 0;
            outline: none;
            width: 80%;
            height: 40px;
            margin-bottom: 20px;
            border-radius: 3px;
            font-family: 'roboto', sans-serif;
            cursor: pointer;
        }

        .bri {
            overflow: hidden;
            height: 100%;
        }

        .uscm-secs {
            padding: 10px;
            display: flex;
            width: 100%;
            height: 100%;
            border-bottom: 1psx solid #f1f1f1;
        }

        .us-img {
            width: 13%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .us-img p {
            background: var(--light-b);
            width: 45px;
            height: 45px;
            border-radius: 50%;
            text-align: center;
            line-height: 45px;
            color: var(--white);
            font-size: 1.1rem;
            font-family: "roboto", sans-serif;
            font-weight: 100;
        }

        .uscms {
            display: flex;
            flex-direction: column;
            width: 87%;
        }

        .bri .filled-stars::before,
        .bri .grey-stars::before {
            font-size: 24px;
        }

        .us-cmt p {
            font-size: .9rem;
            padding: 10px 10px 10px 0;
            color: white;
            font-weight: 500;
            font-family: raleway;
        }

        .us-nm p {
            font-size: .8rem;
            font-weight: 500;
            color: #888;
            font-family: "roboto", sans-serif;
        }
    </style>
</head>

<body>
    <div class="home_black_version">
        <!-- Header Starts  -->
        <?php include ('header.php') ?>
        <!-- Header Ends  -->
        <section class="banner_section banner_black" style="border-bottom: 0px solid #2d2d2d; ">
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

                            <!-- <div class="action_links" id="action">
                                <ul>
                                    <li class="add_to_cart"><a href="ratings.php?id=<?php echo $productid; ?>"
                                            title="">Rate this product</a></li>
                                </ul>
                            </div> -->
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <?php
        $mytime = getdate(date("U"));
        $date = "$mytime[weekday], $mytime[month] $mytime[mday], $mytime[year]";
        
        $sqlR = $conn->query("SELECT id FROM ratings");
        $numR = $sqlR->num_rows;
        
        $sqlR = $conn->query("SELECT SUM(rating_number) AS total FROM ratings");
        $dataR = $sqlR->fetch_array();
        $totalR = $dataR["total"];
        
        $avgR = "";
        
        
        if ($numR != 0) {
            if (is_nan(round(($totalR / $numR), 1))) {
                $avgR = 0;
            } else {
                $avgR = round(($totalR / $numR), 1);
            }
        } else {
            $avgR = 0;
        }
        
        ?>
        <section class="text-light rev" style="margin-bottom:-140px;">
            <div class="container">
                <div class="rating-review">
                    <div class="tri table-flex">
                        <table>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="rnb rv1">
                                            <h3>
                                                <?php echo $avgR; ?>/5.0
                                            </h3>
                                        </div>
                                        <div class="pdt-rate">
                                            <dic class="pro-rating">
                                                <div class="clearfix rating mart8">
                                                    <div class="rating-stars">
                                                        <div class="grey-stars"></div>
                                                        <div class="filled-stars"
                                                            style="width:<?php echo $avgR * 20; ?>%;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </dic>
                                        </div>
                                        <div class="rnrn">
                                            <p class="rars">
                                                <?php if ($numR == 0) {
                                                    echo "No";
                                                } else {
                                                    echo "$numR";
                                                } ?> Reviews
                                            </p>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="rpb">
                                            <div class="rnpb mb-2">
                                                <label>5 <i class="ion-star"></i></label>
                                                <div class="ropb">
                                                    <div class="ripb" style="width:20%;"></div>
                                                </div>
                                                <div class="label">(1)</div>
                                            </div>
                                            <div class="rnpb mb-2">
                                                <label>4 <i class="ion-star"></i></label>
                                                <div class="ropb">
                                                    <div class="ripb" style="width:50%;"></div>
                                                </div>
                                                <div class="label">(2)</div>
                                            </div>
                                            <div class="rnpb mb-2">
                                                <label>3 <i class="ion-star"></i></label>
                                                <div class="ropb">
                                                    <div class="ripb" style="width:80%;"></div>
                                                </div>
                                                <div class="label">(15)</div>
                                            </div>
                                            <div class="rnpb mb-2">
                                                <label>2 <i class="ion-star"></i></label>
                                                <div class="ropb">
                                                    <div class="ripb" style="width:30%;"></div>
                                                </div>
                                                <div class="label">(11)</div>
                                            </div>
                                            <div class="rnpb mb-2">
                                                <label>1 <i class="ion-star"></i></label>
                                                <div class="ropb">
                                                    <div class="ripb" style="width:40%;"></div>
                                                </div>
                                                <div class="label">(13)</div>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="rrb">
                                            <p>Please review our products.</p>
                                            <button class="rbtn opmd" >Add
                                                Reviews</button>
                                        </div>
                                    </td>

                                </tr>
                            </tbody>
                        </table>
                        <div class="review-modal modal fade" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true" style="dispaly:none;" id="mainmodal">
                            <div class="review-bg"></div>
                            <div class="rmp">
                                <div class="rpc">
                                    <span class="btn-close" data-bs-dismiss="modal"><i
                                            class="ion-android-close"></i></span>
                                </div>
                                <div class="" align="center">
                                    <h3>Ratings & Reviews</h3>
                                </div>
                                <div class="rps" name="starRate" align="center">
                                    <i class="ion-star" data-index="0" style="display:none;"></i>
                                    <i class="ion-star" data-index="1"></i>
                                    <i class="ion-star" data-index="2"></i>
                                    <i class="ion-star" data-index="3"></i>
                                    <i class="ion-star" data-index="4"></i>
                                    <i class="ion-star" data-index="5"></i>
                                </div>
                                <input type="hidden" value="" name="starRateV" class="starRateV">
                                <input type="hidden" name="date" value="<?php echo $date; ?>" class="rateDate">
                                <div class="rptf" align="center">
                                    <input class="rateName" name="name" type="text" value="">
                                </div>
                                <div class="rptf" align="center">
                                    <textarea class="rateMsg" name="rateMsg" id="rate-filed" cols="30"
                                        rows="10"></textarea>
                                </div>
                                <div class="rate-error" align="center"></div>
                                <div class="rpsb" align="center">
                                    <button class="rpbtn" type="submit" name="starRate">Post Review</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bri">
                        <div class="uscm">
                            <?php
                            $sqlp = "SELECT * FROM ratings";
                            $resultp = $conn->query($sqlp);

                            if (mysqli_num_rows($resultp) > 0) {
                                while ($rowp = $resultp->fetch_assoc()) {

                                    ?>
                                    <div class="uscm-secs">
                                        <div class="us-img">
                                            <p>
                                                <?= substr($rowp['user_name'], 0, 1); ?>
                                            </p>
                                        </div>
                                        <div class="uscms">
                                            <div class="us-rate">
                                                <div class="pdt-rate">
                                                    <dic class="pro-rating">
                                                        <div class="clearfix rating mart8">
                                                            <div class="rating-stars">
                                                                <div class="grey-stars"></div>
                                                                <div class="filled-stars"
                                                                    style="width:<?= $rowp['rating_number'] * 20; ?>%;"></div>
                                                            </div>
                                                        </div>
                                                    </dic>
                                                </div>
                                            </div>
                                            <div class="us-cmt">
                                                <p>
                                                    <?= $rowp['comments']; ?>
                                                </p>
                                            </div>
                                            <div class="us-nm">
                                                <p><i>By <span class="cmnm">
                                                            <?= $rowp['user_name']; ?>
                                                        </span> on <span class="cmdt">
                                                            <?= $rowp['date']; ?>
                                                        </span></i>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <?php

                                }
                            }
                            ?>
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
        <?php include ('footer.php') ?>
        <!-- Footer section Ends -->



    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

    <script src="main.js"></script>
    <script>
        var ratedIndex = -1;

        function resetColors() {
            $(".rps i").css("color", "#e2e2e2");
        }

        function setStars(max) {
            for (var i = 0; i <= max; i++) {
                $(".rps  i:eq(" + i + ")").css("color", "#f7bf17");
            }
        }

        $(document).ready(function () {

            $(".rpc i, .review-bg").click(function () {
                $(".review-modal").fadeOut();
            });

            $(".opmd").click(function () {
                $(".review-modal").fadeIn();
            });


            resetColors();

            $(".rps i").mouseover(function () {
                resetColors();
                var currentIndex = parseInt($(this).data("index"));
                setStars(currentIndex);
            })

            $(".rps i").on("click", function () {
                ratedIndex = parseInt($(this).data("index"));
                // alert(ratedIndex);
                localStorage.setItem("rating", ratedIndex);
                $(".starRateV").val(parseInt(localStorage.getItem("rating")));
            })

            $(".rps i").mouseleave(function () {
                resetColors();
                if (ratedIndex != -1) {
                    setStars(ratedIndex);
                }
            })

            if (localStorage.getItem("rating") != null) {
                setStars(parseInt(localStorage.getItem("rating")));
                $(".starRateV").val(parseInt(localStorage.getItem("rating")));
            }

            $(".rpbtn").click(function () {
               // alert("workig");
                if ($("#rate-filed").val() == '') {
                    $(".rate-error").html("Please fill in the text box!")
                }
                else if ($(".rateName").val() == '') {
                    $(".rate-error").html("Please enter your name!");
                }
                else if (localStorage.getItem("rating") == null) {
                    $(".rate-error").html("Please select a star to rate!");
                }
                else {
                    $(".rate-error").html("");

                    var $form = $(this).closest(".rmp");
                    var starRate = $form.find(".starRateV").val();
                    var rateMsg = $form.find(".rateMsg").val();
                    var date = $form.find(".rateDate").val();
                    var name = $form.find(".rateName").val();
                  //  alert(starRate+","+rateMsg+","+date+","+name);

                    $.ajax({
                        method: "POST",
                        url: "try1.php",
                        data: {
                            starRate: starRate,
                            rateMsg: rateMsg,
                            date: date,
                            name: name,
                        },
                        success: function (result) {
                            // alert("success");
                           window.location.reload();
                        // window.location.href = "try1.php";
                        },
                    });
                }

            });

        });
    </script>
     
</body>

</html>