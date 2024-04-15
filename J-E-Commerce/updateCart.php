<?php
session_start();
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pid = $_POST['pid'];
    $qty = $_POST['qty'];
    // $_SESSION['o_quantity']=1;
    // Perform validation on $pid and $qty if necessary

    // Update the quantity in the cart table
    $sql = "UPDATE cart SET qty = $qty WHERE pid = $pid AND u_id = '{$_SESSION['customerid']}'";
    if (mysqli_query($conn, $sql)) {
        // echo "Quantity updated successfully.";
        // $_SESSION['o_quantity'] = $qty;
        header('location:cart.php');
    } else {
        echo "Error updating quantity: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request.";
}
?>
