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
                            <th>Customer Name</th>
                            <th>Order Id</th>
                            <th>Product Id</th>
                            <th>Quantity</th>
                            <th>Product Price</th>
                            <th>Total Price</th>
                            <th>Order Status </th>
                            <th>Payment Status</th>
                            <th>Placed on</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                    
                        // $sql = "SELECT orders.total_price, orders.order_status, orders.payment_method, orders.placed_on, orders.id, user_data.firstname, user_data.lastname FROM orders JOIN user_data ON orders.user_id=user_data.user_id ORDER BY `orders`.`id` DESC";
                        
                        // $sql = "SELECT orders.total_price, orders.order_status, orders.payment_method, orders.placed_on, orders.id, user_data.firstname, user_data.lastname FROM orders JOIN user_data ON orders.user_id=user_data.user_id ORDER BY `orders`.`id` DESC";
                        // $u_id = $_SESSION['customerid'];

                        // $sql = "SELECT o.*,oi.*,p.* FROM orders o,order_items oi,payment p WHERE o.id = oi.order_id AND oi.order_id = p.order_id AND o.user_id = '$u_id'";
                        $sql = "SELECT o.*,oi.*,p.* FROM orders o,order_items oi,payment p WHERE o.id = oi.order_id AND oi.order_id = p.order_id";

                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $status = $row["order_status"];
                                
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $row["firstname"]." ".$row["lastname"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $row["order_id"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $row["product_id"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $row["quantity"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $row["product_price"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $row["product_price"]; ?>
                                    </td>
                                    <td>
                                        <?php //echo $row["order_status"]; ?>
                                        <?php 
                                                // Ordered, On Delivery, Delivered, Cancelled

                                                if($status=="Order Placed")
                                                {
                                                    echo "<label style='color: white;'>$status</label>";
                                                }
                                                elseif($status=="Dispatched")
                                                {
                                                    echo "<label style='color: blue;'>$status</label>";
                                                }
                                                elseif($status=="In Progress")
                                                {
                                                    echo "<label style='color: orange;'>$status</label>";
                                                }
                                                elseif($status=="Delivered")
                                                {
                                                    echo "<label style='color: green;'><b>$status</b></label>";
                                                }
                                                elseif($status=="cancelled")
                                                {
                                                    echo "<label style='color: red; weight:100;'>$status</label>";
                                                }
                                            ?>
                                    </td>
                                    <td>
                                        <?php echo $row["payment_status"]; ?>
                                    </td>
                                    <td>
                                        <!-- <?php echo date('M j g:i A', strtotime($row["placed_on"]));?> -->
                                        <?php echo $row["placed_on"]; ?>
                                    </td>

                                    <td><a href="orderProcess.php?id=<?php echo $row['order_id']; ?>"
                                            style="color:#a8741a; margin-right:25px;">Change Status</a>
                                    </td>
                                </tr>

                                <?php
                            }
                        } else {
                            echo "<tr><td colspan='4'>No results found</td></tr>";
                        }
                        ?>

                    </tbody>
                </table>
            </div>

        </div>
    </section>
</div>
