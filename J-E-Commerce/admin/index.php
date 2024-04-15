<?php
session_start();
include('../config.php');
if (!isset($_SESSION['admin_logged_in'])) {
    header('location:login.php');
    exit;
}
?>

<style>
    .col-4 {
        /* width: 360px; */
        /* background-color: #a8741a; */
        /* margin: 1%;
        padding: 2%; */
        float: left;
        width: 18% !important;
        margin: 3%;
        padding: 1%;
    }

    .wrapper h1 {
        /* color: #fff; */
        font-family: fenix;
    }
</style>

<div class="home_black_version">
    <?php
    include('header.php');
    ?>

    <!-- Main Content Section Starts -->
    <section class="product_section p_section1 product_black_section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product_area">
                        <div class="product_tab_button">
                            <div class="main-content">
                                <div class="wrapper pt-3">
                                    <h1 style="color:#fff;">Administrator Dashboard</h1>
                                    <!-- <br><br> -->
                                    <?php
                                    // if (isset($_SESSION['login'])) {
                                    //     echo $_SESSION['login'];
                                    //     unset($_SESSION['login']);
                                    // }
                                    ?>
                                    <!-- <br><br> -->

                                    <div class="col-4 text-center bg-light">

                                        <?php
                                        //Sql Query 
                                        $sql = "SELECT * FROM category";
                                        //Execute Query
                                        $res = mysqli_query($conn, $sql);
                                        //Count Rows
                                        $count = mysqli_num_rows($res);
                                        ?>

                                        <h1>
                                            <?php echo $count; ?>
                                        </h1>
                                        <br />
                                        <a href="categories.php">Category</a>
                                    </div>

                                    <div class="col-4 text-center bg-light">

                                        <?php
                                        //Sql Query 
                                        $sql2 = "SELECT * FROM products";
                                        //Execute Query
                                        $res2 = mysqli_query($conn, $sql2);
                                        //Count Rows
                                        $count2 = mysqli_num_rows($res2);
                                        ?>

                                        <h1>
                                            <?php echo $count2; ?>
                                        </h1>
                                        <br />
                                        <a href="products.php">Products</a>
                                    </div>

                                    <div class="col-4 text-center bg-light">

                                        <?php
                                        //Sql Query 
                                        $sql12 = "SELECT * FROM admin_login";
                                        //Execute Query
                                        $res12 = mysqli_query($conn, $sql12);
                                        //Count Rows
                                        $count12 = mysqli_num_rows($res12);
                                        ?>

                                        <h1>
                                            <?php echo $count12; ?>
                                        </h1>
                                        <br />
                                        System Administrator
                                    </div>

                                    <div class="col-4 text-center bg-light">

                                        <?php
                                        //Sql Query 
                                        $sql4 = "SELECT * FROM signup";
                                        //Execute Query
                                        $res4 = mysqli_query($conn, $sql4);
                                        //Count Rows
                                        $count4 = mysqli_num_rows($res4);
                                        ?>

                                        <h1>
                                            <?php echo $count4; ?>
                                        </h1>
                                        <br />
                                        <a href="userDetails.php">Users</a>
                                    </div>

                                    <div class="col-4 text-center bg-light">

                                        <?php
                                        //Sql Query 
                                        $sql3 = "SELECT * FROM orders";
                                        //Execute Query
                                        $res3 = mysqli_query($conn, $sql3);
                                        //Count Rows
                                        $count3 = mysqli_num_rows($res3);
                                        ?>

                                        <h1>
                                            <?php echo $count3; ?>
                                        </h1>
                                        <br />
                                        <a href="orders.php">Total Orders</a>
                                    </div>


                                    <div class="col-4 text-center bg-light">

                                        <?php
                                        //Sql Query 
                                        $sql5 = "SELECT * FROM order_tracking where status='Delivered'";
                                        //Execute Query
                                        $res5 = mysqli_query($conn, $sql5);
                                        //Count Rows
                                        $count5 = mysqli_num_rows($res5);
                                        ?>

                                        <h1>
                                            <?php echo $count5; ?>
                                        </h1>
                                        <br />
                                        Delivered
                                    </div>

                                    <div class="col-4 text-center bg-light">

                                        <?php
                                        //Sql Query 
                                        $sql7 = "SELECT * FROM order_tracking WHERE status = 'Dispatched'";
                                        //Execute Query
                                        $res7 = mysqli_query($conn, $sql7);
                                        //Count Rows
                                        $count7 = mysqli_num_rows($res7);
                                        ?>

                                        <h1>
                                            <?php echo $count7; ?>
                                        </h1>
                                        <br />
                                        Dispatched
                                    </div>

                                    <div class="col-4 text-center bg-light">

                                        <?php
                                        //Sql Query 
                                        $sql8 = "SELECT * FROM order_tracking WHERE status = 'Order Placed'";
                                        //Execute Query
                                        $res8 = mysqli_query($conn, $sql8);
                                        //Count Rows
                                        $count8 = mysqli_num_rows($res8);
                                        ?>

                                        <h1>
                                            <?php echo $count8; ?>
                                        </h1>
                                        <br />
                                        Ordered
                                    </div>

                                    <div class="col-4 text-center bg-light">

                                        <?php
                                        //Sql Query 
                                        $sql10 = "SELECT * FROM order_tracking WHERE status = 'Cancelled'";
                                        //Execute Query
                                        $res10 = mysqli_query($conn, $sql10);
                                        //Count Rows
                                        $count10 = mysqli_num_rows($res10);
                                        ?>

                                        <h1>
                                            <?php echo $count10; ?>
                                        </h1>
                                        <br />
                                        Cancelled
                                    </div>
                                    <div class="col-4 text-center bg-light">

                                        <?php
                                        //Sql Query 
                                        $sql11 = "SELECT * FROM order_tracking WHERE status = 'In Progress'";
                                        //Execute Query
                                        $res11 = mysqli_query($conn, $sql11);
                                        //Count Rows
                                        $count11 = mysqli_num_rows($res11);
                                        ?>

                                        <h1>
                                            <?php echo $count11; ?>
                                        </h1>
                                        <br />
                                        Progress
                                    </div>


                                    <div class="clearfix"></div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Main Content Setion Ends -->
</div>