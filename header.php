<?php

include('config.php');
?>

<header class="header_area header_black">
    <!-- Header Top Starts  -->
    <div class="header_top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="social_icone">
                        <ul>
                            <li><a href="https://www.facebook.com/Meta"><i
                                        class="ion-social-facebook"></i></a></li>
                            <li><a href="https://twitter.com/Meta"><i
                                        class="ion-social-twitter"></i></a></li>
                            <li><a href="https://www.instagram.com/meta/"><i
                                        class="ion-social-instagram"></i></a></li>
                            <!-- <li><a href="https://www.linkedin.com/company/meta"><i
                                        class="ion-social-linkedin"></i></a></li> -->
                            <li><a href="https://www.youtube.com/"><i
                                        class="ion-social-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="top_right text-right">
                        <ul>
                            <!-- <li class="language">
                                <a href="#">English<i class="ion-chevron-down"></i></a>
                                <ul class="dropdown_language">
                                    <li><a href="#">Hindi</a></li>
                                    <li><a href="#">French</a></li>
                                    <li><a href="#">Germany</a></li>
                                </ul>
                            </li>
                            <li class="Currency">
                                <a href="#">INR<i class="ion-chevron-down"></i></a>
                                <ul class="dropdown_currency">
                                    <li><a href="#">GBP - British Pound</a></li>
                                    <li><a href="#">USD - Dollar</a></li>
                                    <li><a href="#">EUR - Euro</a></li>
                                </ul>
                            </li> -->

                            <?php
                            if (isset($_SESSION['customerid']) && ($_SESSION['customerid'] != '')) {
                                ?>
                                <li class="nav-item profile-image">
                                    <a href="#">
                                        <!-- <img src="<?php echo "images\\" . $_SESSION['profile_image']; ?>" width="30"
                                            height="30" alt=""> -->
                                        <?php
                                        $sql = "SELECT * FROM signup";
                                        $result = mysqli_query($conn, $sql);
                                        $row = mysqli_fetch_assoc($result);
                                        ?>
                                        <h4 style="font-family:fonix; color:#a8741a;">
                                            <?php echo $_SESSION['name']; ?>
                                        </h4>
                                        <ul class="dropdown_links">
                                            <li><a href="profile.php">My Profile</a></li>
                                            <li><a href="showWishlist.php">Wishlist</a></li>
                                            <li><a href="cart.php">Cart</a></li>
                                            <li><a href="logout.php">Logout</a></li>
                                        </ul>
                                    </a>
                                </li>
                                <?php
                            } else {
                                ?>
                                <li class="top_links">
                                    <a href="register.php">Register</a>
                                </li>
                                <li class="top_links active">
                                    <a href="login.php">Login</a>
                                </li>
                                <?php
                            }
                            ?>

                            <li class="top_links">
                                <a href="contact.php" id="m">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header Top Ends -->

    <!-- Header Middle Starts -->

    <!-- <?php
    // include('minicart.php');
    ?> -->

    <div class="header_middel">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="home_contact">
                        <div class="contact_icone">
                            <img src="images/icon/phone.png" alt="phone">
                        </div>
                        <div class="contact_box">
                            <p>Inquiry / Helpline : <a href="tel: 1234567894">9263476187</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-3 col-6">
                    <div class="logo">
                        <a href="index.php">
                            <h1><span>vk</span>shiyana</h1>
                        </a>
                    </div>
                </div>

                <div class="col-lg-5 col-md-7 col-6">
                    <div class="middel_right">
                        <div class="search_btn">
                            <a href="#"><i class="ion-ios-search-strong"></i></a>
                            <div class="dropdown_search">
                                <form method="get" action="search.php">
                                    <input type="text" name="query" placeholder="Search Product ...." required>
                                    <!-- <button type="submit" value="search"><i class="ion-ios-search-strong"></i></button> -->

                                    <!-- <button type="submit" value="search"></button> -->

                                </form>
                            </div>
                        </div>
                        <?php
                        if (isset($_SESSION['customerid'])) {
                            $u_id = $_SESSION['customerid'];

                            // Query to get the count of items in the cart for the current user
                            $sql1 = "SELECT COUNT(qty) AS total_items FROM wishlist WHERE user_id = '$u_id'";
                            $result1 = mysqli_query($conn, $sql1);

                            // Fetch the result
                            $row1 = mysqli_fetch_assoc($result1);
                            $count1 = $row1['total_items'];
                        } else {
                            // If the user is not logged in, set the count to 0
                            $count1 = 0;
                        }


                        ?>

                        <div class="wishlist_btn" style="margin-left: 25px;">
                            <a href="showWishlist.php"><i class="ion-heart w-25" ></i></a>
                            <span class="wishlist_quantity"> <?php echo $count1; ?></span>
                           
                        </div>
                        <?php
                        if (isset($_SESSION['customerid'])) {
                            $u_id = $_SESSION['customerid'];

                            // Query to get the count of items in the cart for the current user
                            $sql = "SELECT COUNT(qty) AS total_items FROM cart WHERE u_id = '$u_id'";
                            $result = mysqli_query($conn, $sql);

                            // Fetch the result
                            $row = mysqli_fetch_assoc($result);
                            $count = $row['total_items'];
                        } else {
                            // If the user is not logged in, set the count to 0
                            $count = 0;
                        }


                        ?>
                        <div class="cart_link">
                           
                            <a href="#"><i class="ion-android-cart"></i><i class="ion-chevron-down"></i></a>
                            <span class="cart_quantity">
                                <?php echo $count; ?>
                            </span>

                            <!-- Mini Cart -->
                            <div class="mini_cart">
                                <div class="cart_close">
                                    <div class="cart_text">
                                        <h3>cart</h3>
                                        <?php echo $count; ?>
                                    </div>
                                    <div class="mini_cart_close">
                                        <a href="javascript:void(0)"><i class="ion-android-close"></i></a>
                                    </div>
                                </div>
                                <?php
                                $total = 0;
                                if (isset($_SESSION['customerid'])) {
                                    $u_id = $_SESSION['customerid'];
                                
                                    $sql = "SELECT c.*,p.* FROM cart c , products p WHERE c.pid = p.product_id AND c.u_id = '$u_id'";
                                    // $sql = "SELECT c.*,p.* FROM cart c , products p WHERE c.pid = p.product_id";
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        // output data of each row
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                            <div class="cart_item">
                                                <div class="cart_img">
                                                    <a href="#"><img src="admin/<?php echo $row['image']; ?>" alt=""></a>
                                                </div>
                                                <div class="cart_info">
                                                    <a href="details.php?id=<?php echo $row['product_id']; ?>">
                                                        <?php echo $row['name']; ?>
                                                    </a>
                                                    <span class="quantity">
                                                        Qty:-
                                                        <?php echo $row['qty']; ?>
                                                    </span>
                                                    <span class="price_cart">
                                                        <?php echo $row['net_price']; ?>
                                                    </span>
                                                </div>
                                                <div class="cart_remove">
                                                    <a href="deleteCart.php?id=<?php echo $row['pid']; ?>"><i
                                                            class="ion-android-close"></i></a>
                                                </div>
                                            </div>
                                            <?php
                                            $total = $total + ($row['net_price'] * $row['qty']);
                                        }
                                    }
                                }
                                ?>
                                
                                <div class="cart_total">
                                    <span>Subtotal : </span>
                                    <span>Rs.
                                        <?php echo $total; ?>
                                    </span>
                                </div>
                                <div class="mini_cart_footer">
                                    <div class="cart_button view_cart">
                                        <a href="cart.php">View Cart</a>
                                    </div>
                                    <div class="cart_button checkout">
                                        <a href="checkout.php" class="active">Checkout</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Mini Cart Ends-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Header Middle Ends -->

    <!-- Header Bottom Starts -->
    <div class="header_bottom sticky-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="main_menu_inner">
                        <div class="logo_sticky">
                            <a href="#"><img src="images/logo.png" alt="logo"></a>
                        </div>
                        <div class="main_menu">
                            <nav>
                                <ul>
                                    <li class="active"><a href="index.php">Home</a>
                                    </li>

                                    <li><a href="collection1.php">Products</a></li>
                                    <li><a href="#">Category <i class="ion-chevron-down"></i></a>
                                        <ul class="sub_menu">
                                            <!-- <li><a href="#">Women</a> -->
                                            <li>
                                                <ul>
                                                    <?php
                                                    $sql = "SELECT  * FROM category";
                                                    $result = mysqli_query($conn, $sql);

                                                    while ($row = mysqli_fetch_assoc($result)) {

                                                        ?>
                                                        <li><a href="collection1.php?id=<?php echo $row["cat_id"]; ?>"
                                                                onclick="myFun(this.id)">
                                                                <?php echo $row["cat_name"]; ?>
                                                            </a></li>

                                                        <?php
                                                    }

                                                    ?>
                                                </ul>
                                            </li>
                                            <!-- <li><a href="#">Men</a>
                                                <ul>
                                                    <li><a href="collection.php #mring">Ring</a></li>
                                                    <li><a href="collection.php #mpendant">Pendant</a></li>
                                                    <li><a href="collection.php #mbracelet">Bracelet</a></li>
                                                    <li><a href="collection.php #mchain">Chain</a></li>
                                                    <li><a href="collection.php #mgemstone">Gemstone</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Other</a>
                                                <ul>
                                                    <li><a href="collection.php #oplatinum">Platinium</a></li>
                                                    <li><a href="collection.php #osliver">Silver</a></li>
                                                    <li><a href="collection.php #ocoins">Coins</a></li>
                                                    <li><a href="collection.php #ogift">Gift Card</a></li>
                                                </ul>
                                            </li> -->

                                        </ul>

                                    </li>
                                    <li><a href="myaccount.php">Orders</a></li>
                                    <li><a href="about.php">About Us</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header Bottom Ends -->
</header>