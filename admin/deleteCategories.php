<?php
include("../config.php");

 $catid = $_GET['id'];

$sql = "DELETE FROM  category WHERE cat_id ='$catid'";
$result = mysqli_query($conn, $sql);

if($result)
{
    echo "<script>alert('Record Delete')</script>";
    ?>

        <meta http-equiv="refresh" content="1; URL=http://localhost/J-E-Commerce/admin/categories.php" />

    <?php
}
else{
    echo "<script>alert('Failed to Delete')</script>"; 
}
?>