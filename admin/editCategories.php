<?php
session_start();
include('../config.php');
if (!isset($_SESSION['admin_logged_in'])) {
    header('location:login.php');
    exit;
}

$catid = $_GET['id'];

if (isset($_POST['submit'])) {
    $catName = $_POST['catName'];

    $sql = "UPDATE category set cat_name='$catName' WHERE cat_id='$catid' ";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        // echo "data inserted into database";

        ?>

        <meta http-equiv="refresh" content="1; URL=http://localhost/J-E-Commerce/admin/categories.php" />
        <?php
    } else {
        echo "failed.mysqli_connect_error()";
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
        height: 740px;
    }
</style>


<div class="home_black_version">
    <?php
    include('header.php');
    ?>

    <section id="content bg-white">
        <div class="content-blog">
            <div class="container">
                <?php
                $sql = "SELECT * FROM category WHERE cat_id = '$catid' ";
                $result = mysqli_query($conn, $sql);
                $total = mysqli_num_rows($result);
                $row = mysqli_fetch_assoc($result);
                ?>
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="Categoryname">Category Name</label>
                        <input type="text" class="form-control" value="<?php echo $row['cat_name']; ?>" name="catName"
                            id="Categoryname" placeholder="Category Name">
                    </div>

                    <button type="submit" class="btn btn-warning mt-3" name="submit">Submit</button>
                </form>
            </div>

        </div>
    </section>

</div>