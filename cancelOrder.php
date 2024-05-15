<?php
session_start();
include('config.php');

if (!isset($_SESSION['customer'])) {
    header('location:login.php');
}

if (!isset($_SESSION['customerid'])) {
    echo '<script>window.location.href = "login.php";</script>';
}

$message = '';
$_POST['agree'] = 'false';

if (isset($_POST['submit'])) {
    $order_id = $_POST['order_id'];
    $reason = $_POST['reason'];
    $status = 'cancelled';

    // $sql = "SELECT * FROM user_data WHERE user_id = $cid";
    // $result = mysqli_query($conn, $sql);
    // $row = mysqli_fetch_assoc($result);


    $insertCancel = "INSERT INTO order_tracking (order_id,status,reasons) VALUES ('$order_id', '$status','$reason')";

    if (mysqli_query($conn, $insertCancel)) {
        $up_sql = "UPDATE orders SET order_status = 'cancelled' WHERE id =  $order_id ";
        $Updated = mysqli_query($conn, $up_sql);
        header('location:myaccount.php');
    }
    // update query
    // $up_sql = "UPDATE user_data SET firstname = '$fname', lastname = '$lname', email = '$email', phone = '$phone', city = '$city', state = '$state', address = '$address', address2 = '$address2', code = '$postcode', country = '$country' WHERE user_id = $cid ";
    // $Updated = mysqli_query($conn, $up_sql);

}

$cid = $_SESSION['customerid'];
// $sql = "SELECT * FROM user_data WHERE user_id = $cid";
// $result = mysqli_query($conn, $sql);
// $row = mysqli_fetch_assoc($result);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aashiana Jewellery</title>

    <!-- <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"> -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"> -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"> -->
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
            // echo "<pre>";
// print_r($_SESSION['cart']);
// echo "</pre>";
            $cart = $_SESSION['cart'];
            if (isset($_SESSION['cart'])) {
                $total = 0;

                foreach ($cart as $key => $value) {
                    // echo $key ." : ". $value['quantity'] . "<br>";
            
                    $sql_cart = "SELECT * FROM products where product_id = $key";
                    $result_cart = mysqli_query($conn, $sql_cart);
                    $row_cart = mysqli_fetch_assoc($result_cart);
                    $total = $total + ($row_cart['net_price'] * $value['quantity']);
                }
            }
            ?>

            <section id="content">
                <div class="content-blog">
                    <div class="page_header text-center  py-3">
                        <h2 style="font-family:poppins;">Cancel Order</h2>
                    </div>
                    <form method="post">
                        <?php
                        echo $message;
                        ?>
                        <div class="container ">
                            <div class="row">
                                <div class="offset-md-2 col-md-8">
                                    <div class="billing-details">
                                        <table
                                            class="cart-table account-table table table-bordered bg-white text-dark text-center">
                                            <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <th>Quantity</th>
                                                    <th>Price</th>
                                                    <th>Total Price</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $cum_id = $_SESSION['customerid'];

                                                if (isset($_GET['id'])) {
                                                    $ord_id = $_GET['id'];
                                                }

                                                $sql_orders = "SELECT * FROM orders WHERE id = ' $ord_id' and user_id = ' $cum_id'";
                                                $result_orders = mysqli_query($conn, $sql_orders);

                                                $row_orders = mysqli_fetch_assoc($result_orders);

                                                $sql = "SELECT * FROM order_items WHERE order_id = ' $ord_id'";
                                                $result = mysqli_query($conn, $sql);

                                                if (mysqli_num_rows($result) > 0) {
                                                    // output data of each row
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        $prodID = $row['product_id'];
                                                        ?>

                                                        <tr>
                                                            <td>

                                                                <?php
                                                                $sql_product = "SELECT * FROM products WHERE product_id = '$prodID' ";
                                                                $result_product = mysqli_query($conn, $sql_product);

                                                                $total_product = mysqli_num_rows($result_product);
                                                                $row_product = mysqli_fetch_assoc($result_product);

                                                                ?>
                                                                <a
                                                                    href="details.php?id=<?php echo $row_product['product_id']; ?>">
                                                                    <?php echo $row_product['name']; ?>
                                                                </a>

                                                            </td>
                                                            <td>
                                                                <?php echo $row['quantity']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $row_product['net_price']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $row['quantity'] * $row_product['net_price']; ?>
                                                            </td>

                                                        </tr>

                                                        <?php
                                                    }
                                                } else {
                                                    echo "0 result";
                                                }
                                                ?>


                                            </tbody>
                                            <tfooer>
                                                <tr>

                                                    <th></th>
                                                    <th></th>
                                                    <th>Total Price</th>
                                                    <th>
                                                        <?php echo $row_orders['total_price']; ?>
                                                    </th>
                                                </tr>
                                                <tr>

                                                    <th></th>
                                                    <th></th>
                                                    <th>Order Status</th>
                                                    <th>
                                                        <?php echo $row_orders['order_status']; ?>
                                                    </th>
                                                </tr>
                                                <tr>

                                                    <th></th>
                                                    <th></th>
                                                    <th>Date</th>
                                                    <th>
                                                        <?php echo $row_orders['placed_on']; ?>
                                                    </th>
                                                </tr>
                                            </tfooer>
                                        </table>
                                        <div class="space30"></div>

                                        <div class="clearfix space20"></div>
                                        <label>Reasons </label>

                                        <textarea class="form-control" name="reason" id="" cols="30"
                                            rows="10"></textarea>



                                    </div>
                                </div>

                            </div>

                        </div>
                </div>

                <div class="row">
                    <div class="col-md-12 text-center m-3">
                        <input type="hidden" name="order_id" value="<?php echo $_GET['id']; ?>">
                        <input class="border " type="submit" name="submit" value="Cancel Order" class="btn">
                    </div>
                </div>
        </div>
        </section>
    </div>
    </form>
    </div>

    <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>-->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script> -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

    <script src="main.js"></script>
</body>

</html>