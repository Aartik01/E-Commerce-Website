<?php
session_start();
include('../config.php');

if (!isset($_SESSION['admin_logged_in'])) {
    header('location:login.php');
    exit;
}


if (isset($_POST['submit'])) {
    $catName = $_POST['catName'];
    $sql = "INSERT INTO category (cat_name) VALUES ('$catName')";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully.";
        header('location:categories.php');
    } else {
        echo "Error:" . $sql . "<br/>" . mysqli_error($conn);
    }
}
?>

<style>
    .container form {
        background: #2d2d2d;
        width: 100%;
        padding: 20px 20px 20px;
        /* padding-left: 20px; */
    }

    .content-blog {
        height: 420px;
    }
</style>


<div class="home_black_version">
    <?php
    include('header.php');
    ?>

    <section id="content bg-white">
        <div class="content-blog">
            <div class="container">
                <form action="addCategories.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="Categoryname">Product Name</label>
                        <input type="text" class="form-control" name="catName" id="Categoryname"
                            placeholder="Category Name">
                    </div>

                    <button type="submit" class="btn btn-warning" name="submit" style="margin-top:10px;">Submit</button>
                </form>
            </div>

        </div>
</section>

</div>