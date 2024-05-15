<?php
session_start();
include('config.php');
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
    
                                            <!-- Product Section Starts -->
        <section class="product_section p_section1 product_black_section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="product_area">
                            <div class="product_tab_button">
                                <!-- <ul class="nav" role="tablist">
                                    <li>
                                        <a href="#featured" class="active" data-toggle="tab" role="tab"
                                            aria-controls="featured" aria-selected="true">Featured</a>
                                    </li>
                                    <li>
                                        <a href="#arrivals" data-toggle="tab" role="tab" aria-controls="arrivals"
                                            aria-selected="false">New Arrivals</a>
                                    </li>
                                    <li>
                                        <a href="#onsale" data-toggle="tab" role="tab" aria-controls="onsale"
                                            aria-selected="false">On-Sale</a>
                                    </li>
                                </ul> -->
                            </div>
                            <div class="tab_content">
                                <div class="tab-pane fade show active" id="featured" role="tabpane1">
                                    <div class="product_container">
                                        <div class="custom-row product_column3">
                                                    <?php
                                                       // Check if the form is submitted
                                                        if ($_SERVER["REQUEST_METHOD"] == "GET") {
                                                            // Check if the search query is set and not empty
                                                            if (isset($_GET['query']) && !empty($_GET['query'])) {
                                                                // Get the search query from the form
                                                                $search_query = $_GET['query'];

                                                                // $search = $_POST['search'];
                                                        
                                                                $sql = "select * from products where category like '%$search_query%'";
                                                                $result = $conn->query($sql);

                                                                if ($result->num_rows > 0) {
                                                                while ($row = $result->fetch_assoc()) {
                                                    ?>
                                                                                        <div class="custom-col-5">
                                                                                            <div class="single_product">
                                                                                                <div class="product_thumb">
                                                                                                    <a href="#" class="primary_img"><img src="admin/<?php echo $row["image"]; ?>"
                                                                                                            alt="p"></a>
                                                                                                   
                                                                                                    <div class="quick_button">
                                                                                                        <a href="details.php?id=<?php echo $row["product_id"]; ?>">Quick View</a>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="product_content">
                                                                                                    <div class="tag_cate">
                                                                                                        <a href="#">Ring, Necklace,</a>
                                                                                                        <a href="#">Earrings</a>
                                                                                                    </div>
                                                                                                    <h3><a href="#"><?php echo $row["name"]; ?></a></h3>
                                                                                                    <div class="price_box">
                                                                                                        <span class="old_price">Rs. <?php echo $row["price"]; ?></span>
                                                                                                        <span class="current_price">Rs. <?php echo $row["net_price"]; ?></span>
                                                                                                    </div>
                                                                                                    <div class="product_hover">
                                                                                                        <div class="product_ratings">
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
                                                                                                        </div>
                                                                                                        <div class="product_desc">
                                                                                                            <p><?php echo $row["details"]; ?></p>
                                                                                                        </div>
                                                                                                        <div class="action_links">
                                                                                                            <ul>
                                                                                                                <li><a href="register.php" data-placement="top"
                                                                                                                        title="Add to wishlist"
                                                                                                                        data-toggle="tooltip"><span
                                                                                                                            class="ion-heart"></span></a></li>
                                                                                                                <li class="add_to_cart"><a href="add_to_cart.php?id=<?php echo $row["product_id"]; ?>" title="Add to Cart">Add to Cart</a></li>
                                                                                                                <li><a href="register.php" title="Compare"><i
                                                                                                                            class="ion-ios-settings-strong"></i></a>
                                                                                                                </li>
                                                                                                            </ul>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                    <?php
                                                       } }
                                                    ?>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                       
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
            
                                
                                                                    <?php
                                               
                                            } else {
                                                echo "0 records";
                                            }

                                            // Perform your search operation here (e.g., search in a database)
                                            // Replace this with your actual search logic
                                        
                                            // Display the search results
                                        
                                        } else {
                                            // If the search query is not set or empty, display an error message
                                            echo "<p>Please enter a search query.</p>";
                                        }
                                        // }
                                        ?>
                                        </section>


 <!-- Footer section Starts -->
 <?php include('footer.php'); ?>
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