<?php
session_start();
include('config.php');

if(!isset($_SESSION['customerid'])){   
header('location:index.php');
}else{
 $cum_id = $_GET['cum_id']; 
 $pro_id = $_GET['product_id'];

    $delWishlist = "DELETE FROM wishlist WHERE product_id = '$pro_id' AND user_id = '$cum_id'";   
	if(mysqli_query($conn, $delWishlist)){
        header('location:showWishlist.php');

    } 
}

?>