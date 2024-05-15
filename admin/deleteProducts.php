<?php
include("../config.php");

 $productid = $_GET['id'];

$sql = "DELETE FROM  products WHERE product_id ='$productid'";
$result = mysqli_query($conn, $sql);

if($result)
{
    echo "<script>alert('Record Delete')</script>";
    ?>

        <meta http-equiv="refresh" content="1; URL=http://localhost/J-E-Commerce/admin/products.php" />

    <?php
}
else{
    echo "<script>alert('Failed to Delete')</script>"; 
}
?>