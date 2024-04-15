<?php
session_start();
include('config.php');

if (!isset($_SESSION['customerid'])) {
  header('location:login.php');
} else {
  if (isset($_GET['id'])) {
    if (isset($_GET['quantity'])) {
        $quantity = $_GET['quantity'];
    } else {
        $quantity = 1;
    }

  $cum_id = $_SESSION['customerid'];
  $pro_id = $_GET['id'];

  $sql_Check = "SELECT * FROM wishlist where product_id = '$pro_id' AND user_id = '$cum_id'";
  $result_check = mysqli_query($conn, $sql_Check);

  if (mysqli_num_rows($result_check) == 1) {
    // echo '<script> alert("product already exist in wishlist");</script>';
    // header('location:showWishlist.php');
    echo '<script>alert("product already added in wishlist"); 
                window.location.href="showWishlist.php";</script>';

  } else {

    $insertWishlist = "INSERT INTO wishlist (user_id, product_id, qty) VALUES ('$cum_id', '$pro_id', $quantity)";
    if (mysqli_query($conn, $insertWishlist)) {
      header('location:showWishlist.php');
      // echo 'insert';

    }

  }
}
}

?>