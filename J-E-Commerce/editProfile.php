<?php
session_start();
include ("config.php");

if (isset ($_POST['uploadBtn'])) {

    $message = "";

    if (isset ($_FILES['upload_field'])) {
        $fileTmpPath = $_FILES['upload_field']['tmp_name'];
        $fileName = $_FILES['upload_field']['name'];

        $uploadFileDir = __DIR__ . '\images\\';

        $dest_path = $uploadFileDir . $fileName;

        if (move_uploaded_file($fileTmpPath, $dest_path)) {

            if ($conn->connect_error) {
                die ("Connection failed: " . $conn->connect_error);
            }

            $sql = "UPDATE signup SET profile_image='$fileName' WHERE u_id=" . $_SESSION['customerid'] . ";";

            if ($conn->query($sql) === TRUE) {
                $_SESSION['profile_image'] = $fileName;
                ?>
                <script>
                    alert("Profile Image Updated !");
                </script>
                <?php
                // echo "Profile Image : " . $_SESSION['profile_image'];
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();

            // $message = 'File Uploaded Successfully.';
        } else if ($fileName == "") {
            $message = "No Image Selected!";
            echo "<script>alert('$message');</script>";
        } else {
            $message = 'An error occurred while uploading the file.';
            echo "<script>alert('$message');</script>";
        }
    }
}

if (isset ($_POST['edit-btn'])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    // $password = $_POST["password"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $id = $_SESSION['customerid'];
    $stmt = $conn->prepare("UPDATE signup SET name=?, email=?, password=? WHERE u_id=? ");
    if ($stmt === false) {
        trigger_error($conn->error, E_USER_ERROR);
        // return;
    }
    $stmt->bind_param("sssi", $name, $email, $password, $id);
    $status = $stmt->execute();
    if ($status === false) {
        trigger_error($stmt->error, E_USER_ERROR);
    }

    $stmt->close();
    $conn->close();
    session_destroy();
    // echo "<script>alert('Updated. Login To Continue!');</script>";
    echo "<script type='text/javascript'>
            alert('Profile Updated! Please Login to Continue.');
            window.location='login.php';
            </script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="responsive.css">
    <style>
        #uploadBtn {
            background-color: #000000b0;
            color: white;
        }

        .form-label {
            font-size: 20px;
        }

        .card {
            background-image: url(images/pe.avif);
            background-size: cover;
            background-position: center;
        }

        .card-body {
            /* background: #d1cccb; */
        }

        .profile-row .col-sm-3 {
            /* padding-left: 4%; */
            /* display: flex; */
            /* justify-content: space-evenly; */
            /* font-size: 50rem; */
        }

        .card-title {
            text-decoration: underline;
        }

        .info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            /* margin: 10px 0px; */
        }

        .option-btn {
            background-color: #000000b0;
            color: white;
            min-width: 120px;
            padding: 10px;
            border: none;
        }

        .add {
            /* margin-top: -50px; */
            /* width: 84%; */
        }

        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .col-lg-9 {
            background: #3b4146;
        }

        .col-lg-3 {
            height: 100%;
        }

        .pnavbar li {
            color: #fff;
            height: 40px;
        }



        /* .nav-pills li a.active {
            color: #a8741a;
            position: relative;
        }

        .nav-pills li a.active::before {
            position: absolute;
            content: "";
            width: 104%;
            height: 109%;
            border: 0px solid #a8741a;
            left: -2px;
            top: -2px;
            border-radius: 2px;
        } */

        @media only screen and (min-width:360px) and (max-width:768px) {
            .col-lg-9 {
                margin-top: 30px;
            }

            .edit-form {
                margin-left: -80px;
            }
        }
    </style>
</head>

<body>
    <!-- <div class="top-banner text-center">
        <h1>Edit Profile</h1>
    </div> -->

    <div class="home_black_version">
        <!-- Header Starts  -->
        <?php include ('header.php') ?>
        <!-- Header Ends  -->
        <div class="container-fluid">
            <div class="row profile-row">

                <div class="col-lg-3 col-sm-12">
                    <div class="d-flex flex-column p-3 text-white bg-dark">
                        <!-- <a href="/"
                            class="d-flex flex-column align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none"> -->
                        <!-- <svg class="bi me-2" width="40" height="32">
                                    <use xlink:href="#bootstrap" />
                                </svg> -->
                        <!-- <a href="#"
                                    class="d-flex align-items-center text-white text-decoration-none"
                                    id="dropdownUser1" aria-expanded="false">
                                    <img src="https://github.com/mdo.png" alt="" width="32" height="32"
                                        class="rounded-circle me-2">
                                </a> -->
                        <span class="fs-5" style="color:#a0a0a0;">Hello,</span>
                        <div class="h6">
                            <?php echo $_SESSION['name']; ?>
                        </div>
                        </a>
                        <hr>
                        <ul class="pnavbar d-flex flex-column">
                        <li class="dashboard my-3 d-flex align-items-center rounded">
                                <a href="profile.php" class="pnav-link text-white" aria-selected="false">
                                    <svg class="bi me-2" width="16" height="16">
                                        <use xlink:href="#speedometer2" />
                                    </svg>
                                    Dashboard
                                </a>
                            </li>
                            <li class="home mb-3 d-flex align-items-center rounded">
                                <a href="index.php" class="pnav-link text-white" aria-current="page" aria-selected="true">
                                    <svg class="bi me-2" width="16" height="16">
                                        <use xlink:href="#home" />
                                    </svg>
                                    Home
                                </a>
                            </li>

                            <!-- <li class="orders mb-3 d-flex align-items-center rounded">
                                <a href="myaccount.php" class="pnav-link text-white" aria-selected="false">
                                    <svg class="bi me-2" width="16" height="16">
                                        <use xlink:href="#table" />
                                    </svg>
                                    Orders
                                </a>
                            </li>
                            <li class="products mb-3 d-flex align-items-center rounded">
                                <a href="collection1.php" class="pnav-link text-white" aria-selected="false">
                                    <svg class="bi me-2" width="16" height="16">
                                        <use xlink:href="#grid" />
                                    </svg>
                                    Products
                                </a>
                            </li>
                            <li class="wishlist mb-3 d-flex align-items-center rounded">
                                <a href="showWishlist.php" class="pnav-link text-white">
                                    <svg class="bi me-2" width="16" height="16">
                                        <use xlink:href="#people-circle" />
                                    </svg>
                                    Wishlist
                                </a>
                            </li>
                            <li class="addtocart mb-3 d-flex align-items-center rounded">
                                <a href="cart.php" class="pnav-link text-white">
                                    <svg class="bi me-2" width="16" height="16">
                                        <use xlink:href="#people-circle" />
                                    </svg>
                                    Add to Cart
                                </a>
                            </li> -->
                        </ul>
                        <hr>
                        <div class="dropdown">
                            <a href="logout.php" class="d-flex align-items-center text-white text-decoration-none"
                                id="dropdownUser1" aria-expanded="false">
                                <!-- <img src="https://github.com/mdo.png" alt="" width="32" height="32"
                                        class="rounded-circle me-2"> -->
                                <svg width="24" height="24" class="" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill="#2874F0" stroke-width="0.3" stroke="#2874F0"
                                        d="M13 3h-2v10h2V3zm4.83 2.17l-1.42 1.42C17.99 7.86 19 9.81 19 12c0 3.87-3.13 7-7 7s-7-3.13-7-7c0-2.19 1.01-4.14 2.58-5.42L6.17 5.17C4.23 6.82 3 9.26 3 12c0 4.97 4.03 9 9 9s9-4.03 9-9c0-2.74-1.23-5.18-3.17-6.83z">
                                    </path>
                                </svg>&nbsp;&nbsp;
                                <strong>Log Out</strong>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-sm-12">
                    <div class="row profile-row m-5">
                        <h3 class="text-center text-white" style="font-family:poppins">User Id :
                            <?php echo $_SESSION['customerid']; ?>
                        </h3><br>
                        <div class="col-sm-3 mt-5">
                            <div class="card profile-card" style="width: 100%;">
                                <div class="card-body">
                                    <img src='<?php echo "images\\" . $_SESSION['profile_image']; ?>'
                                        class="card-img-top" alt="...">
                                </div>
                            </div>
                            <!-- Profile Photo Input -->
                            <div class="outer">
                                <h6 class="mt-3 text-white text-center" style="font-family:poppins">Profile Image</h6>
                                <form id="photo-form" action="#" method="post" enctype="multipart/form-data">
                                    <div class="form-element">
                                        <input type="file" name="upload_field" id="upload_field"
                                            class="form-control mt-3 mb-3" accept="image/png, image/jpeg">
                                    </div>
                                    <div class="form-element">
                                        <input type="submit" value="Update Photo" name="uploadBtn" id="uploadBtn"
                                            class="form-control">
                                    </div>
                                </form>
                            </div>

                        </div>
                        <div class="col-sm-7 mx-5 mt-5">
                            <div class="edit-form">
                                <!-- <h3 class="text-center text-white" style="font-family:poppins">User Id :
                                <?php echo $_SESSION['customerid']; ?>
                            </h3><br> -->
                                <form action="#" name="edit-form" method="post">
                                    <div class="form-element">
                                        <label for="name" class="form-label text-white">Name</label>
                                        <input type="text" class="form-control mb-3" name="name"
                                            placeholder="<?php echo $_SESSION['name']; ?>" required>
                                    </div>
                                    <div class="form-element">
                                        <label for="email" class="form-label text-white">Email</label>
                                        <input type="email" class="form-control mb-3" name="email"
                                            placeholder="<?php echo $_SESSION['customer']; ?>" required>
                                    </div>
                                    <div class="form-element">
                                        <label for="password" class="form-label text-white">Password</label>
                                        <input type="password" id="pass" class="form-control" name="password"
                                            placeholder="Enter a Password" required>
                                    </div>
                                    <div class="form-element">
                                        <p id="password-msg"></p>
                                    </div>
                                    <div class="form-element">
                                        <button type="submit" name="edit-btn" class="option-btn mt-4">Update</button>
                                        <a href="profile.php" class="option-btn">Back</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script>

        $(".dashboard").css({ 'backgroundColor': '#a8741a', 'border': '2px solid #baa279' });
        $(".dashboard").click(function () {
            $(".dashboard").css({ 'backgroundColor': '#a8741a', 'border': '2px solid #baa279' });
            $(".home").css({ 'backgroundColor': 'transparent', 'border': 'none' });
            $(".orders").css({ 'backgroundColor': 'transparent', 'border': 'none' });
            $(".wishlist").css({ 'backgroundColor': 'transparent', 'border': 'none' });
            $(".products").css({ 'backgroundColor': 'transparent', 'border': 'none' });
            $(".addtocart").css({ 'backgroundColor': 'transparent', 'border': 'none' });



        })
        $(".wishlist").click(function () {
            $(".dashboard").css({ 'backgroundColor': 'transparent', 'border': 'none' });
            $(".home").css({ 'backgroundColor': 'transparent', 'border': 'none' });
            $(".orders").css({ 'backgroundColor': 'transparent', 'border': 'none' });
            $(".wishlist").css({ 'backgroundColor': '#a8741a', 'border': '2px solid #baa279' });
            $(".products").css({ 'backgroundColor': 'transparent', 'border': 'none' });
            $(".addtocart").css({ 'backgroundColor': 'transparent', 'border': 'none' });


        })
        $(".products").click(function () {
            $(".dashboard").css({ 'backgroundColor': 'transparent', 'border': 'none' });
            $(".home").css({ 'backgroundColor': 'transparent', 'border': 'none' });
            $(".orders").css({ 'backgroundColor': 'transparent', 'border': 'none' });
            $(".wishlist").css({ 'backgroundColor': 'transparent', 'border': 'none' });
            $(".products").css({ 'backgroundColor': '#a8741a', 'border': '2px solid #baa279' });
            $(".addtocart").css({ 'backgroundColor': 'transparent', 'border': 'none' });


        })
        $(".addtocart").click(function () {
            $(".dashboard").css({ 'backgroundColor': 'transparent', 'border': 'none' });
            $(".home").css({ 'backgroundColor': 'transparent', 'border': 'none' });
            $(".orders").css({ 'backgroundColor': 'transparent', 'border': 'none' });
            $(".wishlist").css({ 'backgroundColor': 'transparent', 'border': 'none' });
            $(".products").css({ 'backgroundColor': 'transparent', 'border': 'none' });
            $(".addtocart").css({ 'backgroundColor': '#a8741a', 'border': '2px solid #baa279' });


        })
        $(".orders").click(function () {
            $(".dashboard").css({ 'backgroundColor': 'transparent', 'border': 'none' });
            $(".home").css({ 'backgroundColor': 'transparent', 'border': 'none' });
            $(".orders").css({ 'backgroundColor': '#a8741a', 'border': '2px solid #baa279' });
            $(".wishlist").css({ 'backgroundColor': 'transparent', 'border': 'none' });
            $(".products").css({ 'backgroundColor': 'transparent', 'border': 'none' });
            $(".addtocart").css({ 'backgroundColor': 'transparent', 'border': 'none' });


        })
        $(".home").click(function () {
            $(".dashboard").css({ 'backgroundColor': 'transparent', 'border': 'none' });
            $(".home").css({ 'backgroundColor': '#a8741a', 'border': '2px solid #baa279' });
            $(".orders").css({ 'backgroundColor': 'transparent', 'border': 'none' });
            $(".wishlist").css({ 'backgroundColor': 'transparent', 'border': 'none' });
            $(".products").css({ 'backgroundColor': 'transparent', 'border': 'none' });
            $(".addtocart").css({ 'backgroundColor': 'transparent', 'border': 'none' });


        })

    </script>

    <script>
        // alert("Hello");
        var confirmPasswordElement = document.getElementById("cnf-pass");

        confirmPasswordElement.addEventListener("input", matchPassword);
        var message;
        function matchPassword() {
            var passwordElement = document.getElementById("pass");
            var passwordMsgElement = document.getElementById("password-msg");

            var x = passwordElement.value;
            var y = confirmPasswordElement.value;

            message = (x === y) ? "Passwords match." : "Passwords don't match.";

            passwordMsgElement.innerHTML = message;
        }
    </script>

</body>

</html>