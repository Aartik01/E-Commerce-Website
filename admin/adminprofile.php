<?php
session_start();
include('../config.php');
if (!isset($_SESSION['admin_logged_in'])) {
    header('location:login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style2.css">
    <style>
        body {
            background-image: url(../images/apro.jpg);
            background-size: cover;
            background-position: center;
        }

        .card-body {
            background: #d1cccb;
        }

        .profile-row {
            padding: 3% 3%;
            display: flex;
            justify-content: space-evenly;
        }

        .card-title {
            text-decoration: underline;
        }

        .info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 10px 0px;
        }

        .option-btn {
            background-color: #000000b0;
            color: white;
            min-width: 120px;
            padding: 10px;
            border: none;
        }
    </style>
</head>

<body>
    <div class="top-banner text-center">
        <!-- <img src="/pss/assets/pss-logo.png" alt=""> -->
        <h1>
            <?php echo $_SESSION['admin_name']; ?>
        </h1>
    </div>
    <div class="container-fluid">
        <div class="row profile-row">
            <!-- <div class="col-sm-3">
                <div class="card profile-card" style="width: 100%;">
                    <div class="card-body">
                        <img src='<?php echo "images\\" . $_SESSION['admin_image']; ?>' class="card-img-top" alt="...">
                        <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                    <!-- </div>
                </div>
            </div> -->
            <div class="col-sm-6">
                <div class="card info-outer">
                    <div class="card-body">
                        <h3 class="card-title text-center">Profile Information</h3><br>
                        <div class="info">
                            <h4>Name:</h4>
                            <h5>
                                <?php echo $_SESSION['admin_name']; ?>
                            </h5>
                        </div>
                        <div class="info">
                            <h4>Email:</h4>
                            <h5>
                                <?php echo $_SESSION['admin_email']; ?>
                            </h5>
                        </div>
                        <div class="info">
                            <a href="admineditProfile.php"><button class="option-btn">Edit Profile</button></a>
                            <a href="index.php"><button class="option-btn">Back</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>