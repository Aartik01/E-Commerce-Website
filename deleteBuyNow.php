<?php
session_start();
include("config.php");

if(isset($_GET['id'])){
$id = $_GET['id'];
// unset($_SESSION['cart'][$id]);
$cum_id = $_SESSION['customerid']; 
$delCart = "DELETE FROM single_order WHERE pid = '$id' AND u_id = '$cum_id'"; 
$result = mysqli_query($conn, $delCart);

header('location:buyNowCart.php');

}
?>