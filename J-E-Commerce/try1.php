<?php
session_start();
include ('config.php');



$_POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
$_POSTI = filter_var_array($_POST, FILTER_SANITIZE_NUMBER_INT);

$starRate = mysqli_real_escape_string($conn, $_POSTI['starRate']);
$rateMsg = mysqli_real_escape_string($conn, $_POST['rateMsg']);
$name = mysqli_real_escape_string($conn, $_POST['name']);

$sql = $conn->prepare("SELECT * FROM ratings WHERE user_name = ? ");
$sql->bind_param("s", $name);
$sql->execute();
$res = $sql->get_result();
$rst = $res->fetch_assoc();
$val = $rst["user_name"];

if (!$val) {
    $stmt = $conn->prepare("INSERT INTO ratings (user_name, rating_number, comments) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $starRate, $rateMsg);
    $stmt->execute();
    echo "inserted successfully";
} else {
    $stmt = $conn->prepare("UPDATE ratings SET user_name = ?, rating_number = ?,comments = ? WHERE user_name = ?");
    $stmt->bind_param("ssss", $name, $starRate, $rateMsg, $name);
    $stmt->execute();
    echo "Updated successfully";
}

?>