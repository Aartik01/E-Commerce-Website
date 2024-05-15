<?php
include("../config.php");

if (isset($_GET['id']) & !empty($_GET['id'])) {
    $id = $_GET['id'];
   
    $sql = "SELECT image FROM products WHERE product_id ='$id' ";
    $res = mysqli_query($conn, $sql);
    $r = mysqli_fetch_assoc($res);

    if (!empty($r['image'])) {
        if (unlink($r['image'])) {
            $delsql = "UPDATE products SET image = '' WHERE product_id = $id";
            if (mysqli_query($conn, $delsql)) {
                header("location:editProducts.php?id={$id}");
            } else {
                $delsql = "UPDATE products SET image='' WHERE product_id = $id";
                if (mysqli_query($conn, $delsql)) {
                    header("location:editProducts.php?id={$id}");
                }
            }
        }
    }
}
?>