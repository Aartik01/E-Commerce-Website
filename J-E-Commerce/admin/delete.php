<?php
include("../config.php");

$Id = $_GET['id'];

$query = "DELETE FROM  orders WHERE Id ='$Id' ";
$data = mysqli_query($conn,$query);

if($data)
{
    echo "<script>alert('record Delete')</script>";
    ?>

        <meta http-equiv="refresh" content="1; URL=http://localhost/J-E-Commerce/admin/dashboard.php" />

    <?php
}
else{
    echo "<script>alert('failed to Delete')</script>";
}
?>