<?php 
session_start();
if(isset($_GET['logout']) && $_GET['logout'] == 1){
    echo "Inside";
    if(isset($_SESSION['admin_logged_in'])){
        unset($_SESSION['admin_logged_in']);
        unset($_SESSION['admin_email']);
        unset($_SESSION['admin_name']);
        header('location: login.php');
        exit; 
    }
}
header('location: login.php');
?>