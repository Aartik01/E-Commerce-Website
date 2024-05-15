<?php
session_start();
include('../config.php');
if (!isset($_SESSION['admin_logged_in'])) {
    header('location:login.php');
    exit;
}
?>

<?php

$productid = $_GET['id'];

// $sql = "SELECT * FROM products WHERE product_id = '$productid' ";
// $result = mysqli_query($conn, $sql);

// $total = mysqli_num_rows($result);
// $row = mysqli_fetch_assoc($result);

if (isset($_POST['submit'])) {
    $productname = $_POST['productname'];
    $collection = $_POST['collection'];
    $details = $_POST['details'];
    $productcategory = $_POST['productcategory'];
    $price = $_POST['price'];
    $netprice = $_POST['netprice'];
    $productid = $_POST['hiddenID'];

    ########### UPDATE QUERY ###########

    if (isset($_FILES) & !empty($_FILES)) {
        $name = $_FILES['image']['name'];
        $size = $_FILES['image']['size'];
        $type = $_FILES['image']['type'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $max_size = 1000000;
        $extension = substr($name, strrpos($name, '.') + 1);
        if (isset($name) & !empty($name)) {
            if ($extension == "jpg" || $extension == "jpg" && $type == "image/jpg" && $size <= $max_size) {
                $location = "uploads/";
                $filePath = $location . $name;
                if (move_uploaded_file($tmp_name, $filePath)) {

                    $sql2 = "UPDATE products set name='$productname', collection='$collection', details='$details', image='$filePath', category='$productcategory', price='$price', net_price='$netprice' WHERE product_id='$productid' ";

                    $res = mysqli_query($conn, $sql2);

                    if ($res) {
                        $message = 'Saved Successfully with image.';
                    } else {
                        $fmsg = "Failed to creata Products.";
                        echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
                    }
                } else {
                    $fmsg = "Failed to Upload File.";
                }
            } else {
                $fmsg = "Only JPG files are allowed and should be less than 1mb.";
            }
        } else {
            $fmsg = "Please select a File.";
        }
    } else {

        $sql3 = "UPDATE products set name='$productname', collection='$collection', details='$details', category='$productcategory', price='$price', net_price='$netprice' WHERE product_id='$productid' ";
        $result = mysqli_query($conn, $sql3);

        if ($result) {
            // echo "data inserted into database";
            // echo "<script>alert('Record Inserted')</script>";die;

            ?>

            <meta http-equiv="refresh" content="1; URL=http://localhost/J-E-Commerce/admin/products.php" />
            <?php
        } else {
            echo "failed.mysqli_connect_error()";
        }
    }
}
?>

<style>
    .container form {
        background: #2d2d2d;
        width: 100%;
        padding: 20px 20px 20px;
        /* padding-left: 20px; */
    }
/* .content{
    background: #242424;
} */
    .content-blog {
        height: 740px;
    }

    .form-group {
        margin-top: 10px;
    }
</style>

<div class="home_black_version">
    <?php
    include('header.php');
    ?>

    <section id="content">
        <div class="content-blog">
            <div class="container">
                <?php
                $sql = "SELECT * FROM products WHERE product_id = '$productid' ";
                $result = mysqli_query($conn, $sql);
                
                $total = mysqli_num_rows($result);
                $row = mysqli_fetch_assoc($result);
                ?>
                <form action="#" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="hiddenID" value="<?php echo $productid ?> ">
                    <h3 style="font-family:poppins;">Edit Products</h3>
                    <div class="form-group">
                        <label for="Productname">Product Name</label>
                        <input type="text" class="form-control" value="<?php echo $row['name']; ?>" name="productname"
                            id="Productname" placeholder="Product Name">
                    </div>
                    <div class="form-group">
                        <label for="Collections">Collections</label>
                        <select name="collection" id="collection" class="form-control">
                            <option value="">Select Collections</option>
                            <option value="Featured">Featured</option>
                            <option value="New Arrival">New Arrival</option>
                            <option value="On Sale">On Sale</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Details">Details</label>
                        <textarea class="form-control" name="details" id="Details" rows="3"><?php echo $row['details']; ?></textarea>
                    </div>

                    <?php
                    if (isset($row['image']) && !empty($row['image'])) {
                        ?>
                        <img src="<?php echo $row['image']; ?>" alt="" height='150' width='150'
                            style="margin-top:20px;"><br>
                        <a href="deleteProductsImg.php?id=<?php echo $row['product_id']; ?>">Delete Images</a>
                        <?php
                    } else {
                        ?>

                        <div class="form-group">
                            <label for="Image">Image</label>
                            <input type="file" class="form-control" name="image" id="Image">
                            <p class="help-block">Only jpg/png are allowed.</p>
                        </div>
                        <?php
                    }


                    ?>

                    <div class="form-group">
                        <label for="Productcategory">Product Category</label>
                        <select name="productcategory" id="Productcategory" class="form-control">
                            <!-- <option value="">Select Category</option> -->

                            <?php
                            $sql2 = "SELECT  * FROM category";
                            $result2 = mysqli_query($conn, $sql2);

                            while ($row2 = mysqli_fetch_assoc($result2)) {

                                ?>
                                <option value="<?php echo $row2["cat_name"]; ?>" <?php
                                   if ($row2["cat_id"] == $row["cat_id"]) {
                                       echo 'selected';
                                   } else {
                                       echo '';
                                   }
                                   ?>>
                                    <?php echo $row2["cat_name"]; ?>
                                </option>

                                <?php
                            }

                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Price">Price</label>
                        <input type="text" class="form-control" value="<?php echo $row['price']; ?>" name="price"
                            id="Price">
                    </div>
                    <div class="form-group">
                        <label for="Price">Net Price</label>
                        <input type="text" class="form-control" name="netprice" id="Netprice">
                    </div>


                    <button type="submit" class="btn btn-warning" name="submit" style="margin-top:10px;">Submit</button>
            </div>
            </form>
        </div>
</div>
</section>

</div>