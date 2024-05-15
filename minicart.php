<?php
// session_start();
include('config.php');
?>

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
                            <form action="#">
                                <input type="text" placeholder="Search Product ....">
                                <button type="submit"><i class="ion-ios-search-strong"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="wishlist_btn">
                        <a href="showWishlist.php"><i class="ion-heart"></i></a>
                    </div>
                    <?php
                    $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
                    // $cart = $_SESSION['cart'];
                    $count = count($cart);
                    ?>
                    <div class="cart_link">
                        <a href="#"><i class="ion-android-cart"></i><i class="ion-chevron-down"></i></a>
                        <span class="cart_quantity">
                            <?php echo $count?>
                        </span>

                        <!-- Mini Cart -->
                        <div class="mini_cart">
                            <div class="cart_close">
                                <div class="cart_text">
                                    <h3>cart</h3>
                                    <?php echo $count?>
                                </div>
                                <div class="mini_cart_close">
                                    <a href="javascript:void(0)"><i class="ion-android-close"></i></a>
                                </div>
                            </div>
                            <?php
                            $total = 0;
                            foreach ($cart as $key => $value) {
                            
                            
                                $sql = "SELECT * FROM products WHERE product_id = $key";
                                $result = mysqli_query($conn, $sql);
                                
                                $row = mysqli_fetch_assoc($result);
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
                                            <?php echo $value['quantity']; ?>
                                        </span>
                                        <span class="price_cart">
                                            <?php echo $row['net_price']; ?>
                                        </span>
                                    </div>
                                    <div class="cart_remove">
                                        <a href="deleteCart.php?id=<?php echo $key; ?>"><i class="ion-android-close"></i></a>
                                    </div>
                                </div>
                                <?php
                                $total = $total + ($row['net_price'] * $value['quantity']);
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