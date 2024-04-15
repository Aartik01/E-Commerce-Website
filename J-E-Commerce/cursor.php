<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            /* margin: 0;
            padding: 0; */
            /* box-sizing: border-box; */
            /* font-family: sans-serif; */
        }

        /* .main {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        } */

        /* .main h1 {
            color: #fff;
            font-size: 65px;
        } */

        .cursor {
            z-index: 999;
            position: fixed;
            background: #a8741a;
            width: 7px;
            height: 7px;
            border-radius: 50%;
            pointer-events: none;
            box-shadow: 0 0 10px #a8741a,
             0 0 10px #a8741a,
                0 0 10px #a8741a;
            /* animation: colors 5s infinite; */
            transform: translate(-50%, -50%);
            display: none;
        }

        @keyframes colors {
            0% {
                filter: hue-rotate(0deg);
            }

            100% {
                filter: hue-rotate(360deg);
            }
        }

        .cursor::before {
            content: '';
            position: absolute;
            /* background: #2696e8; */
            width: 50px;
            height: 50px;
            border: 3px solid #ae7c25;
            opacity: 0.2;
            transform: translate(-45%, -45%);
            border-radius: 50%;
        }
    </style>
</head>

<body>
    <div class="cursor"></div>
    <section class="main">
        <!-- <h1>qwertyuiop</h1> -->
    </section>
</body>
<script>
    const cursor = document.querySelector(".cursor");
    var timeout;

    document.addEventListener("mousemove", (e) => {
        let x = e.pageX;
        let y = e.pageY;

        cursor.style.top = y + "px";
        cursor.style.left = x + "px";
        cursor.style.display = "block";

        function mouseStopped() {
            cursor.style.display = "none";
        }
        clearTimeout(timeout);
        timeout = setTimeout(mouseStopped, 1000);
    });

    document.addEventListener("mouseout", () => {
        cursor.style.display = "none";
    });
</script>

</html>