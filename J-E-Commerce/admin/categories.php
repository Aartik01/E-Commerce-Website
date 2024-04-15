<?php
session_start();
include('../config.php');
if (!isset($_SESSION['admin_logged_in'])) {
    header('location:login.php');
    exit;
}
?>

<div class="home_black_version">
    <?php
    include('header.php');
    ?>
    <style>
        .content-blog {
            /* height: 740px; */
        }

        .content-blog th {
            color: #ffffff;
            font-family: serif;
            font-weight: 400;
            font-size: 18px;
            /* padding-top: 20px; */
            background: #2d2d2d;
            border-style: none;
        }

        .table>:not(caption)>*>* {
            color: #fff;
        }
    </style>
    <section id="content">
        <div class="content-blog">
            <div class="container">
                <table class="table table-stiped">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <?php
                    $sql = "SELECT  * FROM category";
                    $result = mysqli_query($conn, $sql);
                    
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {

                            ?>
                            <tbody>
                                <tr>
                                    <td>
                                        <?php echo $row['cat_name'] ?>
                                    </td>
                                    <td><a href="editCategories.php?id=<?php echo $row['cat_id'] ?>"
                                            style="color:#a8741a; margin-right:25px; font-size:22px;"><i class="ion-edit"></i></a>
                                        <a href="deleteCategories.php?id=<?php echo $row['cat_id'] ?>"
                                            style="color:#a8741a; font-size:25px;"><i class="ion-trash-a"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                            <?php

                        }
                    } else {
                        echo "0 results";
                    }
                    ?>
                    </tbody>
                </table>
            </div>

        </div>
    </section>

</div>