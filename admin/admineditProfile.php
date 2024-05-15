<?php 
session_start();
include('../config.php');
if(!isset($_SESSION['admin_logged_in'])){
    header('location:login.php');
    exit;
}

// session_start();
// include("config.php");

if (isset($_POST['uploadBtn'])) {

    $message = "";

    if (isset($_FILES['upload_field'])) {
        $fileTmpPath = $_FILES['upload_field']['tmp_name'];
        $fileName = $_FILES['upload_field']['name'];

        $uploadFileDir = __DIR__ . '\images\\';

        $dest_path = $uploadFileDir . $fileName;

        if (move_uploaded_file($fileTmpPath, $dest_path)) {

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "UPDATE admin_login SET admin_image='$fileName' WHERE admin_id=" . $_SESSION['admin_id'] . ";";

            if ($conn->query($sql) === TRUE) {
                $_SESSION['admin_image'] = $fileName;
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

if (isset($_POST['edit-btn'])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    // $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $id = $_SESSION['admin_id'];
    $stmt = $conn->prepare("UPDATE admin_login SET admin_name=?, admin_email=?, admin_password=? WHERE admin_id=? ;");
    if ($stmt === false) {
        trigger_error($conn->error, E_USER_ERROR);
        // return;
    }
    $stmt->bind_param("sssi", $name, $email, $password, $id);
    $status = $stmt->execute();
    if ($status === false) {
        trigger_error($stmt->error, E_USER_ERROR);
    }


    // printf("%d Row inserted.\n", $stmt->affected_rows);
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
    <link rel="stylesheet" href="style2.css">
    <style>
        body {
            background-image: url(../images/eapro.avif);
            background-size: cover;
            background-position: center;
        }

        .profile-row {
            padding: 3% 3%;
            display: flex;
            justify-content: space-evenly;
        }
        .option-btn {
            background-color: #000000b0;
            color: white;
            min-width: 120px;
            padding: 10px;
            border: none;
        }
        #uploadBtn {
    background-color: #000000b0;
    color: white;
        }
        .form-label{
            font-size: 20px;
        }
    </style>
</head>

<body>
    <div class="top-banner text-center">
        <h1>Edit Profile</h1>
    </div>
    <div class="container-fluid">
        <div class="row profile-row">
            <!-- <div class="col-sm-3">
                <div class="card profile-card" style="width: 100%;">
                    <div class="card-body">
                        <img src='<?php echo "images\\" . $_SESSION['admin_image']; ?>' class="card-img-top" alt="...">
                    </div>
                </div>
                <!-- Profile Photo Input -->
                <!-- <div class="outer">
                    <h6 class="mt-3" style="text-align:center;">Profile Image</h6>
                    <form id="photo-form" action="#" method="post" enctype="multipart/form-data">
                        <div class="form-element">
                            <input type="file" name="upload_field" id="upload_field" class="form-control mt-3 mb-3"
                                accept="image/png, image/jpeg">
                        </div>
                        <div class="form-element">
                            <input type="submit" value="Update Photo" name="uploadBtn" id="uploadBtn"
                                class="form-control">
                        </div>
                    </form>
                </div>

            </div> --> 
            <div class="col-sm-6">
                <div class="edit-form">
                    <h3>User Id :
                        <?php echo $_SESSION['admin_id']; ?>
                    </h3><br>
                    <form action="" name="edit-form" method="post">
                        <div class="form-element">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control mb-3" name="name"
                                placeholder="<?php echo $_SESSION['admin_name']; ?>" required>
                        </div>
                        <div class="form-element">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control mb-3" name="email"
                                placeholder="<?php echo $_SESSION['admin_email']; ?>" required>
                        </div>
                        <div class="form-element">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="pass" class="form-control" name="password"
                                placeholder="Enter a Password" required>
                        </div>
                        <!-- <div class="form-element">
                                <label for="confirm-password" class="form-label">Retype Password</label>
                                <input type="password" id="cnf-pass" class="form-control" name="confirm-password" placeholder="Retype Your Password" required>
                            </div> -->
                        <div class="form-element">
                            <p id="password-msg"></p>
                        </div>
                        <div class="form-element">
                            <button type="submit" name="edit-btn" class="option-btn">Update</button>
                            <a href="adminprofile.php" class="option-btn">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
        // function myFun(e) {
        //     if (message != "Passwords match.") {
        //         e.preventDefault();
        //         alert("Enter Required Details !");
        //     }
        // }
    </script>
</body>

</html>