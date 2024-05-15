<?php
session_start();
include('config.php');
// if(!isset($_SESSION['customer']) && empty($_SESSION['customer'])){
if (!isset($_SESSION['customer'])) {
    header('location:login.php');
    // exit();
}


$message = '';
$_POST['agree'] = 'false';
$ord_id = $_GET['id'];

if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $address = $_POST['address'];
    $address2 = $_POST['address2'];
    $postcode = $_POST['postcode'];
    $country = $_POST['country'];
    $payment = '';
    $agree = '';
    $cid = $_SESSION['customerid'];

    $sql1 = "SELECT * FROM orders WHERE id = '$ord_id'";
    $result1 = mysqli_query($conn, $sql1);
    // $row = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result1) == 1) {
        // update query
        $up_sql = "UPDATE orders SET firstname = '$fname', lastname = '$lname', email = '$email', phone = '$phone', city = '$city', state = '$state', address = '$address', address2 = '$address2', code = '$postcode', country = '$country' WHERE user_id = $cid and id = '$ord_id'";
        $Updated = mysqli_query($conn, $up_sql);
    }
    if ($Updated) {
        // Redirect to the confirmation page
        header("location:viewOrder.php?id=$ord_id");
        exit; // Ensure that no further code is executed after redirection
    }
    
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
</head>

<body>
    <div class="home_black_version">
        <!-- Header Starts  -->
        <?php include('header.php') ?>
        <!-- Header Ends  -->

        <div class="container text-white">

            <?php
            
            if (isset($_SESSION['cart'])) {
                $total = 0;
                $cart = $_SESSION['cart'];
                foreach ($cart as $key => $value) {
                   
                    $sql_cart = "SELECT * FROM products where product_id = $key";
                    $result_cart = mysqli_query($conn, $sql_cart);
                    $row_cart = mysqli_fetch_assoc($result_cart);
                    $total = $total + ($row_cart['net_price'] * $value['quantity']);
                }
            }
            ?>

            <section id="content">
                <div class="content-blog">
                    <div class="page_header text-center  py-5">
                        <h2 style="font-family:poppins;">Update Address</h2>
                    </div>
                    <form method="post">
                        <?php
                        echo $message;
                        ?>
                        <div class="container ">
                            <?php

                            $sql = "SELECT * FROM orders WHERE id = '$ord_id'";
                            $result = mysqli_query($conn, $sql);

                            $total = mysqli_num_rows($result);
                            $row = mysqli_fetch_assoc($result);
                            ?>

                            <div class="row">
                                <div class="offset-md-2 col-md-8">
                                    <div class="billing-details">
                                        <h3 class="uppercase" style="font-family:poppins;">Billing Details</h3>
                                        <div class="space30"></div>

                                        <label class="">Country </label>
                                        <select class="form-control" name="country" value="<?php if (isset($row['country'])) {
                                            echo $row['country'];
                                        } ?>">
                                            <option value="">Select Country</option>
                                            <option value="India">India</option>
                                            <option value="Afghanistan">Afghanistan</option>
                                            <option value="AW">Aruba</option>
                                            <option value="Australia">Australia</option>
                                            <option value="Bangladesh">Bangladesh</option>
                                        </select>
                                        <div class="clearfix space20"></div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>First Name </label>
                                                <input class="form-control" value="<?php if (isset($row['firstname'])) {
                                                    echo $row['firstname'];
                                                } ?>" name="fname" placeholder="" type="text">
                                            </div>
                                            <div class="col-md-6">
                                                <label>Last Name </label>
                                                <input class="form-control" value="<?php if (isset($row['lastname'])) {
                                                    echo $row['lastname'];
                                                } ?>" name="lname" placeholder="" type="text">
                                            </div>
                                        </div>
                                        <div class="clearfix space20"></div>

                                        <label>Address </label>
                                        <input class="form-control" value="<?php if (isset($row['address'])) {
                                            echo $row['address'];
                                        } ?>" name="address" placeholder="Street address" value="" type="text">
                                        <div class="clearfix space20"></div>
                                        <input class="form-control mt-2" value="<?php if (isset($row['address2'])) {
                                            echo $row['address2'];
                                        } ?>" name="address2" placeholder="Apartment, suite, unit etc. (optional)"
                                            type="text">
                                        <div class="clearfix space20"></div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Town / City </label>
                                                <input class="form-control" value="<?php if (isset($row['city'])) {
                                                    echo $row['city'];
                                                } ?>" name="city" placeholder="Town / City" value="" type="text">
                                            </div>
                                            <div class="col-md-4">
                                                <label>State</label>
                                                <input class="form-control" value="<?php if (isset($row['state'])) {
                                                    echo $row['state'];
                                                } ?>" name="state" value="" placeholder="State" type="text">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Postcode </label>
                                                <input class="form-control" value="<?php if (isset($row['code'])) {
                                                    echo $row['code'];
                                                } ?>" name="postcode" placeholder="Postcode / Zip" value=""
                                                    type="text">
                                            </div>
                                        </div>
                                        <div class="clearfix space20"></div>
                                        <label>Email Address </label>
                                        <input class="form-control" value="<?php if (isset($row['email'])) {
                                            echo $row['email'];
                                        } ?>" name="email" placeholder="" value="" type="text">
                                        <div class="clearfix space20"></div>
                                        <label>Phone </label>
                                        <input class="form-control" value="<?php if (isset($row['phone'])) {
                                            echo $row['phone'];
                                        } ?>" name="phone" id="billing_phone" placeholder="" value="" type="text">

                                    </div>
                                </div>

                            </div>

                        </div>
                </div>

                <div class="row">
                    <div class="col-md-12 text-center my-3">
                        <input class="border" type="submit" name="submit" value="Update Address" class="btn">
                    </div>
                </div>
        </div>
        </section>
    </div>
    </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

    <script src="main.js"></script>
</body>

</html>