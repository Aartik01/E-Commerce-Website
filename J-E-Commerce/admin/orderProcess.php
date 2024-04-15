<?php
// session_start();
include('../config.php');


// $orderId=$_GET['id'];

if (!isset($_SESSION['admin_logged_in'])) {
    // header('location:login.php');
    // exit;
}

if (isset($_POST['submit'])) {
    $order_id = $_POST['order_id'];
    $reason = $_POST['reason'];
    $status = $_POST['status'];

    $insertCancel = "INSERT INTO order_tracking (order_id, status, reasons) VALUES ('$order_id', '$status', '$reason')";


    if (mysqli_query($conn, $insertCancel)) {
        $up_sql = "UPDATE orders SET order_status = '$status' WHERE id =  $order_id ";
        $Updated = mysqli_query($conn, $up_sql);
        header('location:orders.php');
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
            $total = 0;
            ?>
            <section id="content">
                <div class="content-blog">
                    <div class="page_header text-center  py-3">
                        <h2 style="font-family:poppins;">Process Order</h2>
                    </div>
                    <form method="post">
                        <div class="container ">
                            <div class="row">
                                <div class="offset-md-2 col-md-8">
                                    <div class="billing-details">
                                        <table
                                            class="cart-table account-table table table-bordered bg-white text-dark text-center">
                                            <thead>
                                                <tr>
                                                    <th>Product Id</th>
                                                    <th>Price</th>
                                                    <th>Order Status</th>
                                                    <th>Payment Status</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                // $cum_id = $_SESSION['customerid'];
                                                
                                                // if (isset($_GET['id'])) {
                                                //     $ord_id = $_GET['id'];
                                                // }

                                                // $sql = "SELECT * FROM orders WHERE id = '$ord_id'";
                                                $orderId=$_GET['id'];

                                                $sql = "SELECT o.*,oi.*,p.* FROM orders o,order_items oi,payment p WHERE  oi.order_id='$orderId' AND  p.order_id='$orderId' AND o.id='$orderId'";
                                                $result = mysqli_query($conn, $sql);
                                                // $order_id;
                                                if (mysqli_num_rows($result) > 0) {
                                                    // output data of each row
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        // $order_id = $row['order_id'];
                                                        ?> 

                                                        <tr>
                                                            <td>
                                                                <?php
                                                                // $sql_proID = "SELECT * FROM order_items WHERE order_id = $ord_id";
                                                                // $result_proID = mysqli_query($conn, $sql_proID);
                                                                // $row_proID = mysqli_fetch_assoc($result_proID);
                                                                // $prod_id = $row_proID['product_id'];

                                                                // $sql_ProName = "SELECT * FROM products WHERE product_id = '$prod_id'";
                                                                // $result_ProName = mysqli_query($conn, $sql_ProName);
                                                                // $row_ProName = mysqli_fetch_assoc($result_ProName);
                                                                // echo $row_ProName['name'];
                                                                echo $row['product_id'];
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $row['amount']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $row['order_status']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $row['payment_status']; ?>
                                                            </td>

                                                        </tr>

                                                        <?php
                                                    }
                                                } else {
                                                    echo "<tr><td colspan='4'>No results found</td></tr>";
                                                }
                                                ?>


                                            </tbody>

                                        </table>
                                        <div class="space30"></div>
                                        <div class="form-group">
                                            <label for="sel1">Change Status:</label>
                                            <select class="form-control" name="status">
                                                <option value='Order Placed'>Ordered</option>
                                                <option value='In Progress'>In Progress</option>
                                                <option value='Dispatched'>Dispatched</option>
                                                <option value='Delivered'>Delivered</option>
                                                <option value='cancelled'>Cancelled</option>
                                            </select>
                                        </div>

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
                    <div class="col-md-12 text-center m-3 pb-5">
                        <input type="hidden" name="order_id" value="<?php echo $orderId; ?>">
                        <input class="border " type="submit" name="submit" value="Change Status" class="btn">
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