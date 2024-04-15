<?php
session_start();
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
<style>
    .banner_fullwidth{
        /* background: url(images/slider/6.avif); */
        /* background-repeat: no-repeat; */
        background-size: cover;
        background-position: center;
    }
    .banner_fullwidth .banner_text:hover {
  transform: none;
}

.banner_text {
  text-align: left;
  margin-top: -160px;
}

</style>
</head>

<body>
    <div class="home_black_version">
        <!-- Header Starts  -->
        <?php include('header.php') ?>
        <!-- Header Ends  -->
             
            <!-- Banner full width Starts -->
        <section id="banner-img" class="banner_fullwidth black_fullwidth">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="banner_text">
                        <h2 id="banner_text"></h2>                            
                        <p>Sale Off 20% All Products</p>
                            <h2>New Trending Collection</h2>
                            <span>Best Design makes you more special.</span>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
        <!-- Banner full width Ends -->

            <!-- Product Section Starts -->
            <section class="product_section p_section1 product_black_section">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="product_area">
                                <div class="product_tab_button">
                                    </ul>
                                </div>
                                <div class="tab_content">
                                    <div class="tab-pane fade show active" id="ring" role="tabpane1">
                                        <div class="product_container">
                                            <div class="custom-row product_column3">
                                            <?php

                                                $sql = "SELECT * FROM products";

                                                if (isset($_GET['id'])) {
                                                    $catID = $_GET['id'];
                                                    $sql .= " WHERE cat_id = '$catID' ";
                                                }
                                                
                                                $result = mysqli_query($conn, $sql);
                                                while ($row = mysqli_fetch_assoc($result)) {

                                             ?>
                <div class="custom-col-5">
                    <div class="single_product">
                        <div class="product_thumb">
                            <a href="#" class="primary_img"><img src="admin/<?php echo $row["image"]; ?>"
                                    alt="p"></a>
                            <div class="quick_button">
                                <a href="details.php?id=<?php echo $row["product_id"]; ?>">Buy Now</a>
                            </div>
                        </div>
                        <div class="product_content">
                            <div class="tag_cate">
                                <a href="#">Ring, Necklace,</a>
                                <a href="#">Earrings</a>
                            </div>
                            <h3><a href="details.php?id=<?php echo $row["product_id"]; ?>"><?php echo $row["name"]; ?></a></h3>
                            <div class="price_box">
                                <span class="old_price">Rs. <?php echo $row["price"]; ?></span>
                                <span class="current_price">Rs. <?php echo $row["net_price"]; ?></span>
                            </div>
                            <div class="product_hover">
                                <!-- <div class="product_ratings">
                                    <ul>
                                        <li><a href="#"><i
                                                    class="ion-ios-star-outline"></i></a>
                                        </li>
                                        <li><a href="#"><i
                                                    class="ion-ios-star-outline"></i></a>
                                        </li>
                                        <li><a href="#"><i
                                                    class="ion-ios-star-outline"></i></a>
                                        </li>
                                        <li><a href="#"><i
                                                    class="ion-ios-star-outline"></i></a>
                                        </li>
                                        <li><a href="#"><i
                                                    class="ion-ios-star-outline"></i></a>
                                        </li>
                                    </ul>
                                </div> -->
                                <div class="product_desc">
                                    <p><?php echo $row["details"]; ?></p>
                                </div>
                                <div class="action_links">
                                    <ul>
                                        <li><a href="wishlist.php?id=<?php echo $row['product_id']; ?>" data-placement="top"
                                                title="Add to wishlist"
                                                data-toggle="tooltip"><span
                                                    class="ion-heart"></span></a></li>
                                        <li class="add_to_cart"><a href="add_to_cart.php?id=<?php echo $row["product_id"]; ?>" title="Add to Cart">Add to Cart</a></li>
                                        <li><a href="details.php?id=<?php echo $row["product_id"]; ?>"
                                                                                title="View"><i class="ion-eye h5"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<?php
}
?>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Product Section Ends -->

        

            <!-- Subscribe section Starts -->
            <div class="newsletter_area newsletter_black">
                <div class="container">
                    <div class="row mt-5">
                        <div class="col-12">
                            <div class="newsletter_content">
                                <h2>Subscribe for <span>vk</span>shiyana Magazines</h2>
                                <p>Get Email of all the updates about our latest and special offers</p>
                                <div class="subscribe_form">
                                    <form class="footer-newsletter">
                                        <input type="email" placeholder="Email address..." autocapitalize="off"
                                            autocomplete="off">
                                        <button>Subscribe</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Subscribe section Ends -->

            <!-- Footer section Starts -->
            <?php include('footer.php') ?>
            <!-- Footer section Ends -->


    </div>
    <div style="display: none;" class="hidden" id="<?php echo $catID?>">Hidden Div</div>
    <script>
            var img = document.getElementById("banner-img");
            var text = document.getElementById("banner_text");
            let id = document.getElementsByClassName("hidden")[0].id;
            if(id==1){
                // alert("inside")
                img.style.backgroundImage = "url('Images/slider/6.avif')";
                text.innerHTML = "Rings";    
                
            }else if(id==2){
                img.style.backgroundImage = "url('Images/collection/27.jpg')";
                text.innerHTML = "Bangles";
            }
            else if(id==3){
                img.style.backgroundImage = "url('Images/collection/30.jpg')";
                text.innerHTML = "Necklace";
            }
            else if(id==4){
                img.style.backgroundImage = "url('Images/collection/40.jpg')";
                text.innerHTML = "Pendent";
            }
            else if(id==5){
                img.style.backgroundImage = "url('Images/collection/36.jpg')";
                text.innerHTML = "Chain";
            }
            else if(id==6){
                img.style.backgroundImage = "url('Images/collection/33.webp')";
                text.innerHTML = "Bracelet";
            }
            else if(id==7){
                img.style.backgroundImage = "url('Images/collection/34.webp')";
                text.innerHTML = "Coins";
            }
            else{
                img.style.backgroundImage = "url(Images/slider/7.avif)";
                text.innerHTML = "";
            }




    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

    <script src="main.js"></script>

</body>

</html>