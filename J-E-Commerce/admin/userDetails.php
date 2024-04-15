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
                            <th>Sr. No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Image</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $sql = "SELECT * FROM signup";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $row["u_id"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $row["name"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $row["email"]; ?>
                                    </td>
                                    <td>
                                        <img src="../images//<?php echo $row["profile_image"]; ?>" width="50px" height="50px">
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