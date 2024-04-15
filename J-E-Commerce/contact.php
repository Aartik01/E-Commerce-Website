<?php
session_start();
include ('mail.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>contact</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css">
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">

  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="style2.css">
  <link rel="stylesheet" href="responsive.css">
  <style>
    .text-box h1 {
      text-align: center;
      margin-top: 30px;
      color: #fff;
      font-family: 'Poppins 2', serif;
    }

    .text-box::before {
      content: "";
      height: 2px;
      background: #fff;
      position: absolute;
      left: 0;
      right: 910px;
      left: 615px;
      top: 50%;
    }

    .text-box::after {
      content: "";
      height: 2px;
      background: #fff;
      position: absolute;
      left: 0;
      right: 615px;
      left: 910px;
      top: 50%;
    }

    .con-header {
      /* height: 350px !important; */
      width: 100%;
      background-position: center;
      background-size: cover;
      position: relative;
    }

    .container1 {
      border-radius: 5px;
      background-color: #2d2d2d;
      padding: 20px;
      margin: 30px 60px 30px 60px;
      align-items: center;

    }

    .row1 {
      margin-top: 5%;
      display: flex;
      justify-content: space-between;
    }

    .loc {
      margin: 70px;
      margin-top: 30px;
      margin-bottom: 30px;
      border-radius: 5px;
      height: 450px;
      width: 90%;
      align-items: center;
    }

    .loc iframe {
      width: 100%;
      height: 100%;
    }

    .map {
      /* background: red; */
      margin-top: 30px;
      margin-bottom: 25px;
      border-radius: 5px;
      margin-left: 70px;
      /* height: 100%; */
    }

    .divide {
      background: #2d2d2d;
      height: 25%;
      margin-top: 0px;
      margin-bottom: 80px;
    }

    .map .divide h4 {
      padding-top: 40px;
      margin-left: 50px;
      color: #fff;
      font-size: 20px;
      font-family: sans-serif;
    }

    .map .divide p {
      color: white;
      margin-left: 60px;
      margin-bottom: 70px;
      font-size: 17px;
      font-family: sans-serif;
    }

    form {
      max-width: 900px;
      margin: 0 auto;
      padding: 10px;
      /* border: 1px solid #ccc; */
      /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); */
    }

    label,
    input,
    textarea {
      display: block;
      margin-bottom: 10px;
      width: 100%;
      color: #fff;
    }

    input,
    select {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      margin-top: 6px;
      margin-bottom: 16px;
      resize: vertical;
      color: black;
    }
    textarea{
      color: black;
    }


    button[type=submit] {
      background-color: #a8741a;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      margin-top: 10px;
      width: auto;
      margin-left: 45%;
    }

    button[type=submit]:hover {
      background-color: #846632;
    }

    .container1 p {
      margin-left: 325px;
      color: red;
    }
  </style>
  <style>
    @media only screen and (min-width:360px) and (max-width:768px) {
      .loc {
        margin-left: 10px;
        width: 95%;
        height: 200px;
        margin-top: 20px;
        margin-bottom: 20px;
      }

      .row1 {
        display: flex;
        flex-direction: column;
      }

      .map {
        margin-top: 10px;
        margin-left: 10px;
        margin-right: 10px;
        height: 400px;
        margin-bottom: 0px;
      }

      .divide {
        margin-bottom: 0px;
      }

      .map .divide h4 {
        margin-top: -1px;
        margin-left: 15px;
        /* font-size: 17px; */
        /* text-align: center; */
        padding-top: 15px;
      }

      .map .divide p {
        margin-left: 40px;
        margin-bottom: 30px;
        font-size: 13px;
        padding-bottom: 15px;
      }

      .container1 {
        margin-left: 10px;
        margin-right: 10px;
        margin-bottom: 0px;
      }

      .row5 {
        display: flex;
        flex-direction: column;
      }

      .services-image {
        width: 100% !important;
        height: 250px;
        margin-bottom: 30px;
        margin-top: 20px;
      }

      .des-col h1 {
        font-size: 19px;
      }

      .des {
        margin: 10px;
        margin-top: 30px;
        padding-top: 2px;
      }

      .des-col p {
        margin-top: 15px;
        width: 296px;
        font-size: 13px;
        margin-left: -50px;
      }

      .des-col p b {
        font-size: 14px;
      }

      .row6 {
        display: flex;
        flex-direction: column;
      }

      .row6 h4 {
        text-align: left;
      }

      .row6 h6 {
        text-align: left;
        margin-left: 0px;
      }

      .row6 p {
        text-align: left;
        margin-left: 30px;
      }

      .row6 ul {
        text-align: left;
        margin-left: 0px;
      }

      #l {
        margin-left: 30px;
      }

      button[type=submit] {
        margin-left: 38%;
      }
    }

    @media only screen and (min-width:769px) and (max-width:1180px) {
      .text-box::before {
        content: "";
        height: 2px;
        background: #fff;
        position: absolute;
        left: 0;
        right: 525px;
        left: 250px;
        top: 50%;
      }

      .text-box::after {
        content: "";
        height: 2px;
        background: #fff;
        position: absolute;
        left: 0;
        right: 250px;
        left: 525px;
        top: 50%;
      }
    }
  </style>
</head>

<body>
  <div class="home_black_version">
    <?php
    include ('header.php');
    ?>
    <section class="con-header">
      <div class="text-box">
        <h1>Contact Us</h1>
      </div>
    </section>

    <section class="contact-us">
      <div class="row1">
        <div class="map col">
          <div class="divide">
            <h4><i class="ion-ios-location" aria-hidden="true"></i>
              Location:</h4>
            <p>Aashiyana place.Noida,U.P</p>
          </div>

          <div class="divide">
            <h4><i class="ion-ios-email" aria-hidden="true"></i> Email:</h4>
            <p>aashiyanajewellery@gmail.com</p>
          </div>

          <div class="divide">
            <h4><i class="ion-android-call" aria-hidden="true"></i> Call:</h4>
            <p>+91-9263476187</p>
          </div>

        </div>

        <div class="container1 col">
          <form id="contactForm" action="#" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter Your Name..." required onkeydown="return /[a-z A-Z]/i.test(event.key)"></br>

            <label for="mobile">Mobile Number:</label>
            <input type="tel" id="mobile" name="mobile" placeholder="Enter Your No.." required
              onkeypress="return validateNumber(event)" maxlength="10"></br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter Your Email..." required></br>

            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="4" placeholder="Enter Your Messages..." required
            onkeydown="return /[a-z A-Z]/i.test(event.key)" style="padding-left: 10px;"></textarea>

            <button type="submit" value="Submit" name="submit">Submit</button>
            <span style="color:red;">
              <?php echo $msg ?>
            </span>
          </form>
        </div>
      </div>
      <div class="loc">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3501.979680608154!2d77.37646777395881!3d28.630371084181633!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x604c3c4160741f7b%3A0x5be6bb2f97663c66!2sPSS%20Techno%20Service%20Digital%20Marketing!5e0!3m2!1sen!2sin!4v1697524431935!5m2!1sen!2sin"
          width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </section>

    <!-- Footer Starts -->

    <?php
    include ('footer.php');
    ?>

    <!-- Footer Ends -->
  </div>
  <script>
    var show = document.getElementById("navLinks");

    function showMenu() {
      show.style.right = "0";
    }
    function hideMenu() {
      show.style.right = "-150px";
    }
  </script>

  <script>
    function validateNumber(e) {
      const pattern = /^[0-9]$/;

      return pattern.test(e.key)
    }
  </script>

  <script>
    function allLetter(inputtxt) {
      var letters = /^[A-Za-z]+$/;
      if (inputtxt.value.match(letters)) {
        alert('Your name have accepted : you can try another');
        return true;
      }
      else {
        alert("Please input alphabet characters only");
        return false;
      }
    }

  </script>

  <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

  <script src="main.js"></script>

</body>

</html>