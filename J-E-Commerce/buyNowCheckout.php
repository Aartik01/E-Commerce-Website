<?php
session_start();
include ('config.php');
// if(!isset($_SESSION['customer']) && empty($_SESSION['customer'])){
if (!isset ($_SESSION['customer'])) {
    header('location:login.php');
    // exit();
}

if (!isset ($_SESSION['customerid'])) {
    echo '<script>window.location.href = "login.php";</script>';
    // header('location:login.php');
    // exit();
}


$total = 0;

if (isset ($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
    foreach ($cart as $key => $value) {
        $sql_cart = "SELECT * FROM products where product_id = $key";
        $result_cart = mysqli_query($conn, $sql_cart);
        $row_cart = mysqli_fetch_assoc($result_cart);
    }

}

$message = '';
$_POST['agree'] = 'false';

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
        <?php include ('header.php') ?>
        <!-- Header Ends  -->

        <div class="container text-white">

            <?php

            if (isset ($_SESSION['cart'])) {
                $total = 0;
                foreach ($cart as $key => $value) {
                    // echo $key ." : ". $value['quantity'] . "<br>";
            
                    $sql_cart = "SELECT * FROM products where product_id = $key";
                    $result_cart = mysqli_query($conn, $sql_cart);
                    $row_cart = mysqli_fetch_assoc($result_cart);
                }
            }
            ?>

            <section id="content">
                <div class="content-blog">
                    <div class="page_header text-center  py-5">
                        <h2 style="font-family:poppins;">Shop - Checkout</h2>
                        <!-- <p>Get the best kit for smooth shave</p> -->
                    </div>
                    <form method="post">
                        <?php
                        echo $message;
                        ?>
                        <div class="container ">
                            <div class="row">
                                <div class="offset-md-2 col-md-8">
                                    <div class="billing-details">
                                        <h3 class="uppercase" style="font-family:poppins;">Billing Details</h3>
                                        <div class="space30"></div>

                                        <label class="">Country </label>
                                        <select class="form-control" id="country" name="country" value="<?php if (isset ($row['country'])) {
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
                                                <input class="form-control" id="fname" value="<?php if (isset ($row['fname'])) {
                                                    echo $row['firstname'];
                                                } ?>" name="fname" placeholder="" value="" type="text" required
                                                    onkeydown="return /[a-z A-Z]/i.test(event.key)">
                                            </div>
                                            <div class="col-md-6">
                                                <label>Last Name </label>
                                                <input class="form-control" id="lname" value="<?php if (isset ($row['lname'])) {
                                                    echo $row['lastname'];
                                                } ?>" name="lname" placeholder="" value="" type="text" required
                                                    onkeydown="return /[a-z A-Z]/i.test(event.key)">
                                            </div>
                                        </div>
                                        <div class="clearfix space20"></div>

                                        <label>Address </label>
                                        <input class="form-control" id="address" value="<?php if (isset ($row['address'])) {
                                            echo $row['address'];
                                        } ?>" name="address" placeholder="Street address" value="" type="text"
                                            required>
                                        <div class="clearfix space20"></div>

                                        <input class="form-control mt-2" id="address2" value="<?php if (isset ($row['address2'])) {
                                            echo $row['address2'];
                                        } ?>" name="address2" placeholder="Apartment, suite, unit etc. (optional)"
                                            value="" type="text">
                                        <div class="clearfix space20"></div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Town / City </label>
                                                <input class="form-control" id="city" value="<?php if (isset ($row['city'])) {
                                                    echo $row['city'];
                                                } ?>" name="city" placeholder="Town / City" value="" type="text"
                                                    required onkeydown="return /[a-z A-Z]/i.test(event.key)">
                                            </div>
                                            <div class="col-md-4">
                                                <label>State</label>
                                                <input class="form-control" id="state" value="<?php if (isset ($row['state'])) {
                                                    echo $row['state'];
                                                } ?>" name="state" value="" placeholder="State" type="text" required
                                                    onkeydown="return /[a-z A-Z]/i.test(event.key)">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Postcode </label>
                                                <input class="form-control" id="postcode" value="<?php if (isset ($row['code'])) {
                                                    echo $row['code'];
                                                } ?>" name="postcode" placeholder="Postcode / Zip" value="" type="text"
                                                    required onkeypress="if(this.value.length==6) return false;">
                                            </div>
                                        </div>
                                        <div class="clearfix space20"></div>
                                        <label>Email Address </label>
                                        <input class="form-control" id="email" value="<?php if (isset ($row['email'])) {
                                            echo $row['email'];
                                        } ?>" name="email" placeholder="" value="" type="text" required>
                                        <div class="clearfix space20"></div>

                                        <label>Phone </label>
                                        <input class="form-control" id="phone" value="<?php if (isset ($row['phone'])) {
                                            echo $row['phone'];
                                        } ?>" name="phone" placeholder="" onkeypress="return validateNumber(event)"
                                            maxlength="10" type="text" required>
                                    </div>
                                </div>

                            </div>

                            <div class="space30"></div>
                            <h4 class="heading" style="font-family:poppins;">Your order</h4>

                            <table class="table table-bordered extra-padding bg-white text-dark">
                                <tbody>
                                    <tr>
                                        <th>Cart Subtotal</th>
                                        <?php
                                        $total = 0;
                                        $u_id = $_SESSION['customerid'];

                                        $sql = "SELECT s.*,p.* FROM single_order s , products p WHERE s.pid = p.product_id AND s.u_id = '$u_id'";
                                        $result = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            // output data of each row
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $total = $total + ($row['net_price'] * $row['qty']);

                                            }
                                        }

                                        ?>
                                        <td><span class="amount">
                                                <?php echo $total; ?>
                                            </span></td>
                                    </tr>
                                    <tr>
                                        <th>Shipping and Handling</th>
                                        <td>
                                            Free Shipping
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Order Total</th>
                                        <td><strong><span class="amount" id="amount">
                                                    <?php echo $total; ?>
                                                </span></strong> </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="clearfix space30"></div>
                            <!-- <h4 class="heading" style="font-family:poppins;">Payment Method</h4> -->
                            <div class="clearfix space20"></div>

                            <input name="agree" value="true" id="checkboxG2" class="mr-2 css-checkbox "
                                type="checkbox"><span>I've read and accept the <a href="#" class="text-warning">terms
                                    &amp;
                                    conditions</a></span>
                        </div>

                        <div class="row">
                            <div class="col-md-12 text-center ">
                                <form>
                                    <input class="border mb-3" type="button" name="submit" value="Pay Now"
                                        onclick="pay_now()">
                                </form>
                            </div>
                        </div>

                        <script>
                            function pay_now() {
                                var name = jQuery('#fname').val();
                                var amount = jQuery('#amount').html();
                                var agree = jQuery('#checkboxG2').val();
                                var lname = jQuery('#lname').val();
                                var email = jQuery('#email').val();
                                var phone = jQuery('#phone').val();
                                var city = jQuery('#city').val();
                                var state = jQuery('#state').val();
                                var address = jQuery('#address').val();
                                var address2 = jQuery('#address2').val();
                                var postcode = jQuery('#postcode').val();
                                var country = jQuery('#country').val();

                                if (!/^\d{6}$/.test(postcode)) {
                                    alert("Please enter a valid 6-digit pin code");
                                    return;
                                }
                                //  alert(username);
                                if (name == "" || lname == "" || email == "" || phone == "" || postcode == "" || address == "" || city == "" || state == "") {
                                    alert("Please fill all the required fields");
                                } else {
                                    var options = {
                                        "key": "rzp_test_L59AkrXLMEkkdc",
                                        "amount": amount * 100,
                                        "currency": "INR",
                                        "name": "Aashiyana",
                                        "description": "Test Transaction",
                                        "image": "https://image.freepik.com/free-vector/logo-sample-text_355-558.jpg",
                                        "handler": function (response) {
                                            jQuery.ajax({
                                                type: 'post',
                                                url: 'paymentProcess.php',
                                                data: {
                                                    payment_id: response.razorpay_payment_id,
                                                    name: name,
                                                    amount: amount,
                                                    lname: lname,
                                                    agree: agree,
                                                    email: email,
                                                    phone: phone,
                                                    city: city,
                                                    state: state,
                                                    address: address,
                                                    address2: address2,
                                                    postcode: postcode,
                                                    country: country,
                                                    scope: "single_order",
                                                    // payment : payment,
                                                },

                                                success: function (result) {
                                                    window.location.href = "myaccount.php";
                                                },
                                            });
                                        },
                                    }
                                    var rzp1 = new Razorpay(options);
                                    rzp1.open();
                                    // }
                                    // });

                                }
                            }
                        </script>

                </div>
            </section>
        </div>
        </form>
        <!-- Footer section Starts -->
        <?php include ('footer.php') ?>
        <!-- Footer section Ends -->

    </div>

    <script>
        function validateNumber(e) {
            const pattern = /^[0-9]$/;

            return pattern.test(e.key)
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

    <script src="main.js"></script>
</body>

</html>