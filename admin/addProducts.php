<?php
session_start();
include('../config.php');
if (!isset($_SESSION['admin_logged_in'])) {
    header('location:login.php');
    exit;
}
?>

<?php
if (isset($_POST['submit'])) {
    $productname = $_POST['productname'];
    $collection = $_POST['collection'];
    $catid = $_POST['cat_id'];
    $details = $_POST['details'];
    $productcategory = $_POST['productcategory'];
    $price = $_POST['price'];
    $netprice = $_POST['netprice'];


    if (isset($_FILES) & !empty($_FILES)) {
        $name = $_FILES['image']['name'];
        $size = $_FILES['image']['size'];
        $type = $_FILES['image']['type'];
        $tmp_name = $_FILES['image']['tmp_name'];

        $max_size = 1000000;
        $extension = substr($name, strrpos($name, '.') + 1);

        if (isset($name) & !empty($name)) {
            // if ($extension == "jpg" || $extension == "jpg" && $type == "image/jpg" && $size <= $max_size) {
                $location = "uploads/";

                if (move_uploaded_file($tmp_name, $location . $name)) {
                    $sql2 = "INSERT INTO products (name, collection, cat_id, details,  image, category,net_price, price ) VALUES ('$productname', '$collection', $catid,  '$details', '$location$name', '$productcategory',$netprice, $price)";
                    $res = mysqli_query($conn, $sql2);
                    if ($res) {
                        $message = 'Saved Successfully with image.';
                        echo "<script>
                            setTimeout(()=>{
                                window.location.href='products.php';
                            },2000);
                            </script>";

                    } else {
                        $fmsg = "Failed to creata Products.";
                        echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
                    }
                } else {
                    $fmsg = "Failed to Upload File.";
                }
            // } else {
            //     $fmsg = "Only JPG files are allowed and should be less than 1mb.";
            // }
        } else {
            $fmsg = "Please select a File.";
        }
    } else {
        $sql = "INSERT INTO products (name, collection, cat_id, details,  image, category, net_price, price) VALUES ('$productname', $collection, $catid,  '$details', '$productcategory', $netprice, $price)";
        if (mysqli_query($conn, $sql)) {
            $message = 'Saved Successfully';
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
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

    .content-blog {
        /* height: 840px; */
        padding-bottom: 10px;
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
                if (isset($message)) {

                    ?>
                    <div class="alert alert-success">
                        <?php echo "$message"; ?>
                    </div>
                    <?php
                }
                ?>
                <form action="addProducts.php" method="post" enctype="multipart/form-data">
                    <h3 style="font-family:poppins; color:white;">Add Products</h3>
                    <div class="form-group">
                        <label for="Productname">Product Name</label>
                        <input type="text" class="form-control" name="productname" id="Productname"
                            placeholder="Product Name">
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
                        <label for="Catid">Category Id</label>
                        <input type="text" class="form-control" name="cat_id" id="Catid">
                    </div>
                    <div class="form-group">
                        <label for="Details">Details</label>
                        <textarea class="form-control" name="details" id="Details" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="Image">Image</label>
                        <input type="file" class="form-control" name="image" id="Image">
                        <!-- <input type="file" class="form-control" name="image1" id="Image" style="margin-top:10px;">
                        <input type="file" class="form-control" name="image2" id="Image" style="margin-top:10px;"> -->
                        <p class="help-block">Only jpg/png are allowed.</p>
                    </div>
                    <div class="form-group">
                        <label for="Productcategory">Product Category</label>
                        <select name="productcategory" id="Productcategory" class="form-control">
                            <option value="">Select Category</option>

                            <?php
                            $sql = "SELECT  * FROM category";
                            $result = mysqli_query($conn, $sql);

                            while ($row = mysqli_fetch_assoc($result)) {

                                ?>
                                <option value="<?php echo $row["cat_name"]; ?>">
                                    <?php echo $row["cat_name"]; ?>
                                </option>

                                <?php
                            }

                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Price">Price</label>
                        <input type="text" class="form-control" name="price" id="Price">
                    </div>
                    <div class="form-group">
                        <label for="Price">Net Price</label>
                        <input type="text" class="form-control" name="netprice" id="Netprice">
                    </div>


                    <button type="submit" name="submit" class="btn btn-warning" style="margin-top:10px;">Submit</button>
            </div>
            </form>
        </div>
</div>
</section>

</div>