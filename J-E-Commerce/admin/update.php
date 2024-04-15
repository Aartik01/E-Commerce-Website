<?php include("../config.php");

$Id = $_GET['id'];

$query = "SELECT * FROM orders WHERE Id= '$Id' ";
$data = mysqli_query($conn,$query);

$total = mysqli_num_rows($data);
$result = mysqli_fetch_assoc($data);

?>

            <!--start---HTML------>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="updatestyle.css">
</head>
<body>
    <div class="container">
        <form action="#" method="POST">
        <div class="title">
            Update Details
        </div>
        <div class="form">

            <div class="input-fields">
                <label for="" >First Name</label>
                <input type="text" class="input" name="fname" value="<?php echo $result['fname']; ?>" required>
            </div>

             <div class="input-fields">
                <label for="">Last Name</label>
                <input type="text" class="input" name="lname" value="<?php echo $result['lname']; ?>" required>
            </div>

             <div class="input-fields">
                <label for="">Email</label>
                <input type="email" class="input" name ="email" value="<?php echo $result['email']; ?>" required>
            </div>

             <div class="input-fields">
                <label for="">Phone Number</label>
                <input type="tel" class="input" name="phone" value="<?php echo $result['phone']; ?>" required onkeypress="return validateNumber(event)"
                        maxlength="10">
            </div>

            <div class="input-fields">
                <label for="">Applied Position</label>
                <select type="text" class="input" name="position" value="<?php echo $result['position']; ?>" required>
                        <option value="Select">Select</option>
                        <option value="MCA">MCA</option>
                        <option value="BCA">BCA</option>
                        <option value="BBA">BBA</option>
                        <option value="MBA">MBA</option>
                        <option value="B.tech">B.tech</option>
                        <option value="MPharma">MPharma</option>
                        <option value="BPharma">BPharma</option>
                </select>
            </div>

            <div class="input-fields">
                <label for="">Possible Started Date</label>
                <input type="date" class="input" name="started" value="<?php echo $result['started']; ?>" required>
            </div>

            <div class="input-fields">
                <label for="">Upload Document</label>
                <input type="file" class="input" name="document" id="file" accept=".pdf,.doc,.docx,.txt" value="<?php echo $result['document']; ?>" >
            </div>

            <div class="input-fields">
                <input type="Submit" value="update" class="btn" name="update">
            </div>

        </div>
        </form>
    </div>
    
    <script>
        function validateNumber(e) {
            const pattern = /^[0-9]$/;

            return pattern.test(e.key)
        }
    </script>

</body>
</html> -->

<?php

 if(isset($_POST['update'])) 
{
    // $Id = $_POSTt["Id"];
    $User_Id = $_POST["user_id"];
    $Name = $_POST["name"];
    $Number = $_POST["number"];
    $Email = $_POST["email"];
    $Method = $_POST["method"];
    $Address = $_POST["address"];
    $Products = $_POST["total_products"];
    $Price = $_POST["total_price"];
    $Placed = $_POST["placed_on"]; 
    $Status = $_POST["payment_status"];

    $query = "UPDATE orders set user_id='$User_Id', name='$Name', number='$Number', email='$Email', method='$Method', address='$Address', total_products='$Products', total_price='$Price', placed_on='$Placed', payment_status='$Status' WHERE Id='$Id' ";
    
   $data = mysqli_query($conn,$query);

   if($data)
   {
    echo "data inserted into database";
    
    ?>

            <meta http-equiv="refresh" content="1; URL=http://localhost/J-E-Commerce/admin/dashboard.php" />
    <?php
   }


   else{
    echo "failed.mysqli_connect_error()";
   }
    }

?>