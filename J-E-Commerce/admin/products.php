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
        /* .content-blog {
            height: 840px;
        } */

        .content {
            background: #242424;
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
                            <th>Collections</th>
                            <th>Category Id</th>
                            <th>Details </th>
                            <th>Image</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Net_price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $sql = "SELECT * FROM products";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $row["name"]; ?>
                                    </td>
                                    <td>
                                    <?php echo $row["collection"] ;?>
                                    </td>
                                    <td>
                                        <?php echo $row["cat_id"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $row["details"]; ?>
                                    </td>
                                    <td>
                                        <?php if (isset($row["image"])) {
                                            echo 'yes';
                                        } else {
                                            echo 'no';
                                        }
                                        ["image"] ?>
                                    </td>
                                    <td>
                                        <?php echo $row["category"] ?>
                                    </td>
                                    <td>
                                        <?php echo $row["price"] ?>
                                    </td>
                                    <td>
                                        <?php echo $row["net_price"] ?>
                                    </td>
                                    <td><a href="editProducts.php?id=<?php echo $row["product_id"] ?>"
                                            style="color:#a8741a; margin-right:9px; font-size:20px;"><i class="ion-edit"></i></a>
                                        <a href="deleteProducts.php?id=<?php echo $row["product_id"] ?>"
                                            style="color:#a8741a; font-size:22px;"><i class="ion-trash-a"></i></a>
                                    </td>
                                </tr>

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