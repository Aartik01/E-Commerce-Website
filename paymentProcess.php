<?php
session_start();
include ('config.php');

$fname = $_POST['name'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$city = $_POST['city'];
$state = $_POST['state'];
$address = $_POST['address'];
$address2 = $_POST['address2'];
$postcode = $_POST['postcode'];
$country = $_POST['country'];
$amount = $_POST['amount'];
$agree = $_POST['agree'];
$scope = $_POST['scope'];

$cid = $_SESSION['customerid'];

$sql = "SELECT * FROM user_data WHERE user_id = '$cid'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// if (mysqli_num_rows($result) == 1) {
//     // update query
//     $up_sql = "UPDATE user_data SET firstname = '$fname', lastname = '$lname', email = '$email', phone = '$phone', city = '$city', state = '$state', address = '$address', address2 = '$address2', code = '$postcode', country = '$country' WHERE user_id = $cid ";
//     $Updated = mysqli_query($conn, $up_sql);
//     if ($Updated) {
if (isset ($_SESSION['cart'])) {
    $total = 0;
    $cart = $_SESSION['cart'];

    foreach ($cart as $key => $value) {
        $sql_cart = "SELECT * FROM products where product_id = $key";
        $result_cart = mysqli_query($conn, $sql_cart);
        $row_cart = mysqli_fetch_assoc($result_cart);
    }

}

// $insertOrder = "INSERT INTO orders (user_id,payment_method,total_price,order_status) VALUES ('$cid', '$payment', '$total', 'Order Placed')";
$insertOrder = "INSERT INTO orders (user_id,total_price,order_status,firstname,lastname,email,phone,city,state,address,address2,code,country) VALUES ('$cid', '$amount','Order Placed','$fname', '$lname', '$email', '$phone', '$city', '$state', '$address', '$address2', '$postcode', '$country')";
$orderInserted = mysqli_query($conn, $insertOrder);
// }
$order_id = mysqli_insert_id($conn);

if ($scope == "cart") {
    $sql5 = "SELECT c.*,p.* FROM cart c , products p WHERE c.pid = p.product_id AND c.u_id = '$cid'";
    $result5 = mysqli_query($conn, $sql5);

    while ($Row = $result5->fetch_assoc()) {
        $qty = $Row['qty'];
        $prodId = $Row['pid'];
        $product_price = $Row['net_price'];

        $total = ($product_price * $qty);
        $insertordersItems = "INSERT INTO order_items (order_id,product_id,quantity,product_price) VALUES ('$order_id', '$prodId', '$qty', '$total')";
        $orderItemsInserted = mysqli_query($conn, $insertordersItems);
    }
} else if ($scope == "single_order") {
    $sql6 = "SELECT s.*,p.* FROM single_order s , products p WHERE s.pid = p.product_id AND s.u_id = '$cid'";
    $result6 = mysqli_query($conn, $sql6);

    while ($Row1 = $result6->fetch_assoc()) {
        $qty1 = $Row1['qty'];
        $prodId1 = $Row1['pid'];
        $product_price1 = $Row1['net_price'];

        $total1 = ($product_price1 * $qty1);
        $insertsingleordersItems = "INSERT INTO order_items (order_id,product_id,quantity,product_price) VALUES ('$order_id', '$prodId1', '$qty1', '$total1')";
        $singleorderItemsInserted = mysqli_query($conn, $insertsingleordersItems);
    }
}


if (isset ($_POST['amount']) && isset ($_POST['name'])) {
    $amount = $_POST['amount'];
    $name = $_POST['name'];
    $lname = $_POST['lname'];
    $payment_status = "pending";
    $added_on = date('Y-m-d h:i:s');
    mysqli_query($conn, "insert into payment(order_id,fname,lname,amount,payment_status,added_on) values('$order_id','$name','$lname','$amount','$payment_status','$added_on')");
    $_SESSION['OID'] = mysqli_insert_id($conn);
}


if (isset ($_POST['payment_id']) && isset ($_SESSION['OID'])) {
    $payment_id = $_POST['payment_id'];
    mysqli_query($conn, "update payment set payment_status='complete',payment_id='$payment_id' where id='" . $_SESSION['OID'] . "'");

    $u_id = $_SESSION['customerid'];
}

if ($scope == "cart") {
    $sql1 = "DELETE FROM cart WHERE u_id = $u_id ";
    $result1 = mysqli_query($conn, $sql1);
} else if ($scope == "single_order") {
    $sql11 = "DELETE FROM single_order WHERE u_id = $u_id ";
    $result11 = mysqli_query($conn, $sql11);
}
?>