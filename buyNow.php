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

    $id = $_GET['id'];
    $u_id = $_SESSION['customerid'];
    $sql = "SELECT * FROM products WHERE product_id = $id";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch the row as an associative array
        $row = mysqli_fetch_assoc($result);

        $name = $row['name'];

        $sqlAllReady = "SELECT * FROM single_order WHERE pid = $id AND u_id = $u_id";
        $existingCartItem = mysqli_query($conn, $sqlAllReady);

        if ($existingCartItem && mysqli_num_rows($existingCartItem) > 0) {
            $sqlUpdate = "UPDATE single_order SET qty = qty + $quantity WHERE pid = $id AND u_id = $u_id";
            $resultUpdate = mysqli_query($conn, $sqlUpdate);
            echo '<script>alert("Product Updated")</script>';
        } else {

            $sqlIn = "INSERT INTO single_order (pid,name,qty,u_id) VALUES (' $id ', '$name', '$quantity','$u_id')";
            $result1 = mysqli_query($conn, $sqlIn);
        }
        $_SESSION['cart'][$id] = array('quantity' => $quantity);
        // header('location:buyCart.php');
        echo '<script>window.location.href="buyNowCart.php";</script>';
    }
}
}
?>