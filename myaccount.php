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
            <h2 class='text-center text-white mt-2' style="font-family:poppins;">My Account</h2>

            <section id="content">
                <div class="content-blog content-account">
                    <div class="container">
                        <div class="row">

                            <div class="col-md-12 mb-5">
                                <?php
                                $cum_id = $_SESSION['customerid'];

                                // $sql = "SELECT o.*, SUM(p.net_price * c.qty) AS total_price FROM orders o INNER JOIN cart c ON o.cart_id = c.id INNER JOIN products p ON c.pid = p.product_id WHERE o.user_id = '$cum_id' GROUP BY o.id";
                                
                                $sql = "SELECT * FROM orders WHERE user_id = '$cum_id'";
                                $result = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($result) > 0) {
                                    ?>
                                    <h3 style="font-family:poppins;" id="mo">Recent Orders</h3>
                                    <br>
                                    <table
                                        class="cart-table account-table table table-bordered bg-white text-dark text-center">
                                        <thead>
                                            <tr>
                                                <th>Order Id</th>
                                                <th>Total</th>
                                                <!-- <th>Qty</th> -->
                                                <th>Status</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            // output data of each row
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo '';
                                                ?>


                                                <tr>
                                                    <td>
                                                        <?php echo $row['id']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['total_price']; ?>
                                                    </td>
                                                    <!-- <td>
                                                        <?php echo $row['quantity']; ?>
                                                    </td> -->
                                                    <td>
                                                        <?php echo $row['order_status']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['placed_on']; ?>
                                                    </td>

                                                    <td>
                                                        <a href="viewOrder.php?id=<?php echo $row["id"] ?>"
                                                            class="text-warning">View</a> |
                                                        <?php if ($row['order_status'] != 'cancelled') { ?>
                                                            <a href="cancelOrder.php?id=<?php echo $row["id"] ?>"
                                                                class="text-warning">Cancel</a>
                                                            <?php
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                                <?php
                                            }

                                            ?>


                                        </tbody>
                                    </table>



                                    <div class="ma-address">
                                        <h3 style="font-family:poppins;">My Addresses</h3>
                                        <p>The following addresses will be used on the checkout page by default.</p>

                                        <div class="row  bg-white text-dark px-5 py-3 mb-3">
                                            <div class="col-md-6">

                                                <h4 style="font-family:poppins;">Billing Address</h4>
                                                <?php
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
                                    <?php
                                } else {
                                    // echo "<tr><td colspan='4'>Not Yet Orders...</td></tr>";
                                    echo "<h3 class='text-white text-left my-3'>Not Yet Orders...</h3>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


        </div>

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
</body>

</html>