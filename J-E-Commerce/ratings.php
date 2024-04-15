<?php

session_start();
include ('config.php');

$mytime = getdate(date("U"));
$date = "$mytime[weekday], $mytime[month] $mytime[mday], $mytime[year]";

$sql = $conn->query("SELECT id FROM ratings");
$numR = $sql->num_rows;

$sql = $conn->query("SELECT SUM(rating_number) AS total FROM ratings");
$data = $sql->fetch_array();
$total = $data["total"];

$avg = "";


if ($numR != 0) {
    if (is_nan(round(($total / $numR), 1))) {
        $avg = 0;
    } else {
        $avg = round(($total / $numR), 1);
    }
} else {
    $avg = 0;
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <title>Reviews</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        :root {
            --primary-color: #f7bf17;
            --linear: #ef5350;
            --white: #fff;
            --r-color: #d63031;
            --light-b: #686de0;

            --yellow: #FFBD13;
            --blue: #4383FF;
            --blue-d-1: #3278FF;
            --light: #F5F5F5;
            --grey: #AAA;
            /* --white: #FFF; */
            --shadow: 8px 8px 30px rgba(0, 0, 0, .05);
        }

        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            background: var(--light);
            /* display: flex;
            justify-content: center;
            align-items: center; */
            /* min-height: 100vh; */
            /* padding: 1rem; */
        }

        .rating-review {
            height: 100%;
            width: 85%;
            margin: 80px auto;
            background: var(--white);
        }

        .rating-review table {
            width: 100%;
            margin: 0;
            font-family: "roboto", sans-serif;
            border-collapse: collapse;
            border-spacing: 0;
            color: #8f8f8f;
            margin-bottom: .625rem;

        }

        .rating-review table,
        .rating-review td {
            font-size: .8125rem;
            text-align: center;
        }

        .rating-review td {
            padding: 1rem;
            width: 33.3%;
        }

        .tri {
            border-bottom: 1px solid #e2e2e2;
            padding: 12px;
        }

        .rnb h3 {
            color: var(--primary-color);
            font-size: 2.4rem;
            font-family: "roboto", sans-serif;
        }

        .tri .pdt-rate {
            height: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .rating-stars {
            position: relative;
            vertical-align: baseline;
            color: #b9b9b9;
            line-height: 10px;
            float: left;
        }

        .grey-stars {
            height: 100%;
        }

        .filled-stars {
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            overflow: hidden;
            color: var(--primary-color);
        }

        .filled-stars::before,
        .grey-stars::before {
            content: "\2605 \2605 \2605 \2605 \2605";
            font-size: 19px;
            line-height: 18px;
            letter-spacing: 0;
        }

        .tri .filled-stars::before,
        .tri .grey-stars::before {
            font-size: 20px;
            line-height: 23px;
        }

        .rnrn {
            width: 100%;
            font-family: "lato";
            font-weight: 700;
            font-size: 1rem;
        }

        .rpb {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .rnpb {
            display: flex;
            width: 100%;
        }

        .rnpb label:first-child {
            margin-right: 5px;
            margin-top: -2px;
        }

        .rnpb label:last-child {
            margin-right: 3px;
            margin-top: -2px;
        }

        .rnpb label i {
            color: var(--primary-color);
        }

        .ropb {
            height: 10px;
            width: 75%;
            background-color: #f1f1f1;
            position: relative;
            margin-bottom: 10px;
        }

        .ripb {
            height: 100%;
            background-color: var(--primary-color);
            border: 1px solid #a0a0a0;
        }

        .rrb p {
            font-size: 1rem;
            font-weight: 500;
            font-family: "raleway";
            margin-bottom: 10px;
        }

        .rrb button {
            width: 220px;
            height: 40px;
            background: var(--light-b);
            color: var(--white);
            border: 0;
            outline: none;
            font-size: 1.2rem;
            font-family: "roboto", sans-serif;
            box-shadow: 0px 2px 2px var(--light-b);
            cursor: pointer;
        }

        .rrb button:hover {
            opacity: .9;
        }

        .review-bg {
            position: fixed;
            background: rgba(0, 0, 0, .8);
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 100;
        }

        .review-modal {
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 101;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .rmp {
            width: 400px;
            height: auto;
            background: var(--white);
            border-radius: 10px;
            animation: scaleUp .7s linear;
            transition: all .7s ease-in-out;
            z-index: 201;
        }

        @keyframes scaleUp {
            0% {
                /* opacity: 0; */
                transform: scale(0.2);
            }

            25% {
                /* opacity: 1; */
                transform: scale(0.8);
            }

            50% {
                /* opacity: 1; */
                transform: scale(1.2);
            }

            75% {
                /* opacity: 1; */
                transform: scale(0.8);
            }

            100% {
                /* opacity: 1; */
                transform: scale(1);
            }
        }

        .rpc {
            text-align: right;
            padding: 6px 15px;
            font-size: 1.5rem;
            color: var(--linear);
        }

        .rpc span {
            cursor: pointer;
        }

        .rps {
            padding: 20px;
        }

        .rps h3 {
            font-size: 1.5rem;
            font-weight: 600;
            /* margin-bottom: 1rem; */
            font-family: 'Poppins', sans-serif;
        }

        .rps i {
            font-size: 1.6rem;
            cursor: pointer;
        }

        .rptf textarea,
        .rptf input {
            width: 80%;
            outline: none;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 7px;
            resize: none;
            min-height: 80px;
            margin-bottom: 10px;
            font-family: "roboto", sans-serif;
            font-size: .9rem;
            font-weight: 100;
            color: #777;
        }

        .rptf input {
            min-height: 10px !important;
        }

        .rate-error {
            font-size: 12px;
            color: var(--r-color);
            font-family: 'roboto', sans-serif;
            margin-bottom: 5px;
            font-weight: 500;
        }

        .rpsb button {
            color: var(--white);
            background: var(--light-b);
            border: 0;
            outline: none;
            width: 80%;
            height: 40px;
            margin-bottom: 20px;
            border-radius: 3px;
            font-family: 'roboto', sans-serif;
            cursor: pointer;
        }

        .bri {
            overflow: hidden;
            height: 100%;
        }

        .uscm-secs {
            padding: 10px;
            display: flex;
            width: 100%;
            height: 100%;
            border-bottom: 1psx solid #f1f1f1;
        }

        .us-img {
            width: 13%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .us-img p {
            background: var(--light-b);
            width: 45px;
            height: 45px;
            border-radius: 50%;
            text-align: center;
            line-height: 45px;
            color: var(--white);
            font-size: 1.1rem;
            font-family: "roboto", sans-serif;
            font-weight: 100;
        }

        .uscms {
            display: flex;
            flex-direction: column;
            width: 87%;
        }

        .bri .filled-stars::before,
        .bri .grey-stars::before {
            font-size: 24px;
        }

        .us-cmt p {
            font-size: .9rem;
            padding: 10px 10px 10px 0;
            color: #333;
            font-weight: 500;
            font-family: raleway;
        }

        .us-nm p {
            font-size: .8rem;
            font-weight: 500;
            color: #888;
            font-family: "roboto", sans-serif;
        }
    </style>

</head>

<body>
    <div class="container">
        <div class="rating-review">
            <div class="tri table-flex">
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <div class="rnb rv1">
                                    <h3>
                                        <?php echo $avg; ?>/5.0
                                    </h3>
                                </div>
                                <div class="pdt-rate">
                                    <dic class="pro-rating">
                                        <div class="clearfix rating mart8">
                                            <div class="rating-stars">
                                                <div class="grey-stars"></div>
                                                <div class="filled-stars" style="width:<?php echo $avg * 20; ?>%;">
                                                </div>
                                            </div>
                                        </div>
                                    </dic>
                                </div>
                                <div class="rnrn">
                                    <p class="rars">
                                        <?php if ($numR == 0) {
                                            echo "No";
                                        } else {
                                            echo "$numR";
                                        } ?> Reviews
                                    </p>
                                </div>
                            </td>

                            <td>
                                <div class="rpb">
                                    <div class="rnpb">
                                        <label>5 <i class="ion-star"></i></label>
                                        <div class="ropb">
                                            <div class="ripb" style="width:20%;"></div>
                                        </div>
                                        <div class="label">(1)</div>
                                    </div>
                                    <div class="rnpb">
                                        <label>4 <i class="ion-star"></i></label>
                                        <div class="ropb">
                                            <div class="ripb" style="width:50%;"></div>
                                        </div>
                                        <div class="label">(2)</div>
                                    </div>
                                    <div class="rnpb">
                                        <label>3 <i class="ion-star"></i></label>
                                        <div class="ropb">
                                            <div class="ripb" style="width:80%;"></div>
                                        </div>
                                        <div class="label">(15)</div>
                                    </div>
                                    <div class="rnpb">
                                        <label>2 <i class="ion-star"></i></label>
                                        <div class="ropb">
                                            <div class="ripb" style="width:30%;"></div>
                                        </div>
                                        <div class="label">(11)</div>
                                    </div>
                                    <div class="rnpb">
                                        <label>1 <i class="ion-star"></i></label>
                                        <div class="ropb">
                                            <div class="ripb" style="width:40%;"></div>
                                        </div>
                                        <div class="label">(13)</div>
                                    </div>
                                </div>
                            </td>

                            <td>
                                <div class="rrb">
                                    <p>Please review our products.</p>
                                    <button class="rbtn opmd" data-bs-toggle="modal" data-bs-target="#mainmodal">Add
                                        Reviews</button>
                                </div>
                            </td>

                        </tr>
                    </tbody>
                </table>
                <div class="review-modal modal fade" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true" style="dispaly:none;" id="mainmodal">
                    <div class="review-bg"></div>
                    <div class="rmp">
                        <div class="rpc">
                            <span class="btn-close" data-bs-dismiss="modal"><i class="ion-android-close"></i></span>
                        </div>
                        <div class="" align="center">
                            <h3>Ratings & Reviews</h3>
                        </div>
                        <div class="rps" name="starRate" align="center">
                            <i class="ion-star" data-index="0" style="display:none;"></i>
                            <i class="ion-star" data-index="1"></i>
                            <i class="ion-star" data-index="2"></i>
                            <i class="ion-star" data-index="3"></i>
                            <i class="ion-star" data-index="4"></i>
                            <i class="ion-star" data-index="5"></i>
                        </div>
                        <input type="hidden" value="" name="starRateV" class="starRateV">
                        <input type="hidden" name="date" value="<?php echo $date; ?>" class="rateDate">
                        <div class="rptf" align="center">
                            <input class="rateName" name="name" type="text" value="">
                        </div>
                        <div class="rptf" align="center">
                            <textarea class="rateMsg" name="rateMsg" id="rate-filed" cols="30" rows="10"></textarea>
                        </div>
                        <div class="rate-error" align="center"></div>
                        <div class="rpsb" align="center">
                            <button class="rpbtn" type="submit" name="starRate">Post Review</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bri">
                <div class="uscm">
                    <?php
                    $sqlp = "SELECT * FROM ratings";
                    $result = $conn->query($sqlp);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = $result->fetch_assoc()) {

                            ?>
                            <div class="uscm-secs">
                                <div class="us-img">
                                    <p>
                                        <?= substr($row['user_name'], 0, 1); ?>
                                    </p>
                                </div>
                                <div class="uscms">
                                    <div class="us-rate">
                                        <div class="pdt-rate">
                                            <dic class="pro-rating">
                                                <div class="clearfix rating mart8">
                                                    <div class="rating-stars">
                                                        <div class="grey-stars"></div>
                                                        <div class="filled-stars"
                                                            style="width:<?= $row['rating_number'] * 20; ?>%;"></div>
                                                    </div>
                                                </div>
                                            </dic>
                                        </div>
                                    </div>
                                    <div class="us-cmt">
                                        <p>
                                            <?= $row['comments']; ?>
                                        </p>
                                    </div>
                                    <div class="us-nm">
                                        <p><i>By <span class="cmnm">
                                                    <?= $row['user_name']; ?>
                                                </span> on <span class="cmdt">
                                                    <?= $row['date']; ?>
                                                </span></i>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <?php

                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        var ratedIndex = -1;

        function resetColors() {
            $(".rps i").css("color", "#e2e2e2");
        }

        function setStars(max) {
            for (var i = 0; i <= max; i++) {
                $(".rps  i:eq(" + i + ")").css("color", "#f7bf17");
            }
        }

        $(document).ready(function () {

            $(".rpc i, .review-bg").click(function () {
                $(".review-modal").fadeOut();
            })

            $(".opmd").click(function () {
                $(".review-modal").fadeIn();
            })


            resetColors();

            $(".rps i").mouseover(function () {
                resetColors();
                var currentIndex = parseInt($(this).data("index"));
                setStars(currentIndex);
            })

            $(".rps i").on("click", function () {
                ratedIndex = parseInt($(this).data("index"));
                // alert(ratedIndex);
                localStorage.setItem("rating", ratedIndex);
                $(".starRateV").val(parseInt(localStorage.getItem("rating")));
            })

            $(".rps i").mouseleave(function () {
                resetColors();
                if (ratedIndex != -1) {
                    setStars(ratedIndex);
                }
            })

            if (localStorage.getItem("rating") != null) {
                setStars(parseInt(localStorage.getItem("rating")));
                $(".starRateV").val(parseInt(localStorage.getItem("rating")));
            }

            $(".rpbtn").click(function () {
                // alert("workig");
                if ($("#rate-filed").val() == '') {
                    $(".rate-error").html("Please fill in the text box!")
                }
                else if ($(".rateName").val() == '') {
                    $(".rate-error").html("Please enter your name!");
                }
                else if (localStorage.getItem("rating") == null) {
                    $(".rate-error").html("Please select a star to rate!");
                }
                else {
                    $(".rate-error").html("");

                    var $form = $(this).closest(".rmp");
                    var starRate = $form.find(".starRateV").val();
                    var rateMsg = $form.find(".rateMsg").val();
                    var date = $form.find(".rateDate").val();
                    var name = $form.find(".rateName").val();
                    //  alert(starRate+","+rateMsg+","+date+","+name);

                    $.ajax({
                        method: "POST",
                        url: "try1.php",
                        data: {
                            starRate: starRate,
                            rateMsg: rateMsg,
                            date: date,
                            name: name,
                        },
                        success: function (result) {
                            // alert("success");
                            window.location.reload();
                            // window.location.href = "try1.php";
                        },
                    });
                }

            });

        });
    </script>

</body>

</html>