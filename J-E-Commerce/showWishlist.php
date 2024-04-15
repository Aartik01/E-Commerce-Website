<?php
session_start();
include('config.php');

if (!isset($_SESSION['customer'])) {
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
        <?php include('header.php') ?>
        <!-- Header Ends  -->
        <div class="container text-white">
            <h2 class='text-left text-white mt-2' style="font-family:poppins;">My Wishlist</h2>

            <section id="content">
                <div class="content-blog content-account">
                    <div class="container">
                        <div class="row">

                            <div class="col-md-12">
                                <br>

                                <?php
                                $cum_id = $_SESSION['customerid'];

                                $sql = "SELECT * FROM wishlist JOIN products on products.product_id=wishlist.product_id AND user_id = '$cum_id' ";
                                $result = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row
                                    ?>
                                    <table
                                        class="cart-table account-table table table-bordered bg-white text-dark text-center mb-0">
                                        <thead>
                                            <tr>
                                                <th>Product Name</th>
                                                <th>Product Images</th>
                                                <th>Price</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            while ($row = mysqli_fetch_assoc($result)) {

                                                ?>


                                                <tr>
                                                    <td>
                                                        <a href="details.php?id=<?php echo $row['product_id']; ?>">
                                                            <?php echo $row['name']; ?>
                                                        </a>

                                                    </td>
                                                    <td><img src="admin/<?php echo $row['image']; ?>" alt=""
                                                            style="height:70px; width:70px;">
                                                    </td>
                                                    <td>
                                                        <?php echo $row['net_price']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['placed_on']; ?>
                                                    </td>

                                                    <td>
                                                        <a href="deleteWishlist.php?product_id=<?php echo $row["product_id"] ?>&cum_id=<?php echo $_SESSION['customerid']; ?>"
                                                            class="text-warning">Delete</a>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                } else {
                                    echo "<h3 class='text-white text-center mb-5'>There is no products.....</h3>";
                                }
                                ?>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


        </div>



    </div>

    <!-- Footer section Starts -->
    <?php include('footer.php') ?>
    <!-- Footer section Ends -->

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

    <script src="main.js"></script>
</body>

</html>