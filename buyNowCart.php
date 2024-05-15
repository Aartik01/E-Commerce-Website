<?php
session_start();
include('config.php');

// $cart = $_SESSION['cart'];
$u_id = $_SESSION['customerid'];
// $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
// print_r($cart);

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

<style>
    .content-blog th,
    td {
        color: #ffffff;
        font-family: serif;
        font-weight: 400;
        font-size: 18px;
        /* padding-top: 20px; */
        background: #2d2d2d;
        border-style: none;
        text-align: center;
    }
</style>

<body>
    <div class="home_black_version">
        <!-- Header Starts  -->
        <?php include('header.php') ?>
        <!-- Header Ends  -->

        <section id="content">
            <div class="content-blog">
                <div class="container">
                    <table class="table table-stiped">
                        <!-- <thead> -->
                        <tr>

                            <th>Image</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                        <!-- </thead> -->
                        <?php
                        $total = 0;
                        $sql = "SELECT s.*,p.* FROM single_order s , products p WHERE s.pid = p.product_id AND s.u_id = '$u_id' ";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            while ($row = mysqli_fetch_assoc($result)) {

                                ?>
                                <tr>
                                    <td><img src="admin/<?php echo $row['image']; ?>" alt="" style="height:100px; width:100px;">
                                    </td>

                                    <td> <a href="details.php?id=<?php echo $row['product_id']; ?>">
                                            <?php echo $row['name']; ?>
                                        </a></td>
                                    <td>
                                        <!-- Form to update quantity -->
                                        <form action="updateBuyNow.php" method="POST">
                                            <input type="hidden" name="pid" value="<?php echo $row['pid']; ?>">
                                            <input class="text-dark text-center" type="number" name="qty" value="<?php echo $row['qty']; ?>" min="1" max="100">
                                            <button class="" type="submit" style="color:#a8741a;">Update</button>
                                        </form>
                                    </td>
                                    <td>
                                        <?php echo $row['net_price']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['net_price'] * $row['qty']; ?>
                                    </td>
                                    <td><button><a href="deleteBuyNow.php?id=<?php echo $row['pid']; ?>"
                                                style="color:#a8741a;">Remove</a></button></td>
                                </tr>
                                <?php

                                $total = $total + ($row['net_price'] * $row['qty']);
                            }

                        }

                        // }
                        ?>
                    </table>

                    <div class="text-right">
                        <button class="mb-2"><a href="buyNowCheckout.php" class="btn"
                                style="color:#a8741a;">Checkout</a></button>
                    </div>
                </div>
            </div>
        </section>

        <section id="content text-white">
            <div class="content-blog">
                <div class="container pb-4">
                    <div class="card ">
                        <div class="card-header">
                            Total
                        </div>
                        <div class="card-body ">
                            Total Amount: Rs.
                            <?php echo $total; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

    <script src="main.js"></script>
</body>

</html>