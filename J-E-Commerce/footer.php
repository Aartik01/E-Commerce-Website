<?php
// session_start();
include('config.php');
?>

<footer class="footer_widgets footer_black">
    <div class="container">
        <div class="footer_top">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="widgets_container contact_us">
                        <h3><span>vk</span>shiyana</h3>

                        <div class="footer_contact">
                            <p><i class="ion-ios-location mr-1 h5"></i><span>vk</span>shiyana
                                place.Noida,U.P</p>
                            <p><i class="ion-android-call mr-1 h5"></i><a
                                    href="tel:(+91)9263476187">(+91)9263476187</a></p>
                            <p><i class="ion-ios-email mr-1 h5"></i>aashiyanajewellery@gmail.com</p>
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
                </div>
                <div class="col-lg-2 col-md-6 col-sm-12 col-12">
                    <div class="widgets_container widget_menu">
                        <h3>Infomation</h3>
                        <div class="footer_menu">
                            <ul>
                                <li><a href="about.php">About Us</a></li>
                                <!-- <li><a href="index.php #blog">Blog</a></li> -->
                                <li><a href="services.php">Services</a></li>
                                <li><a href="collection1.php">Products</a></li>
                                <li><a href="contact.php">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <?php
                if (isset($_SESSION['customerid']) && ($_SESSION['customerid'] != '')) {
                    ?>
                    <div class="col-lg-2 col-md-6 col-sm-6 col-6">
                        <div class="widgets_container widget_menu ">
                            <h3 style="width:144%;">My Account</h3>
                            <div class="footer_menu">
                                <?php
                                $sql = "SELECT * FROM signup";
                                $result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_assoc($result);
                                ?>
                                <ul>
                                    <li><a href="profile.php">My Profile</a></li>
                                    <li><a href="showWishlist.php">Wishlist</a></li>
                                    <li><a href="cart.php">Cart</a></li>
                                    <li><a href="services.php">Help</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php
                } else {
                    ?>

                    <div class="col-lg-2 col-md-6 col-sm-5 col-6">
                        <div class="widgets_container widget_menu">
                            <h3 style="width:125%;">Useful Links</h3>
                            <div class="footer_menu">
                                <ul>
                                    <li><a href="login.php">Log In</a></li>
                                    <li><a href="register.php">Register</a></li>
                                    <li><a href="services.php">Help</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="widgets_container product_widget">
                        <h3 style="width:125%;">Top Rated Products</h3>
                        <div class="simple_product">
                            <div class="simple_product_items">
                                <div class="simple_product_thumb">
                                    <a><img src="images/product/16.jpg" alt=""></a>
                                </div>
                                <div class="simple_product_content">
                                    <div class="tag_cate">
                                        <a>Men</a>
                                        <a>Bracelet</a>
                                    </div>
                                    <div class="product_name">
                                        <h3><a href="collection1.php?id=2; ?>">Bracelet</a></h3>

                                    </div>
                                    <div class="product_price">
                                        <span class="old_price">Rs. 45612.54</span>
                                        <span class="current_price">Rs. 41612.54</span>
                                    </div>
                                </div>
                            </div>
                            <div class="simple_product_items">
                                <div class="simple_product_thumb">
                                    <a><img src="images/product/35.jpg" alt=""></a>
                                </div>
                                <div class="simple_product_content">
                                    <div class="tag_cate">
                                        <a>Women</a>
                                        <a>Rings</a>
                                    </div>
                                    <div class="product_name">
                                        <h3><a href="collection1.php?id=1; ?>">Ring</a></h3>
                                    </div>
                                    <div class="product_price">
                                        <span class="old_price">Rs. 75612.54</span>
                                        <span class="current_price">Rs. 71612.54</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</footer>