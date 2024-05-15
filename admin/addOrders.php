<?php 
session_start();
include('../config.php');
if(!isset($_SESSION['admin_logged_in'])){
    header('location:login.php');
    exit;
}
?>


<div class="home_black_version">
    <?php
    include('header.php');
    ?>
</div>
