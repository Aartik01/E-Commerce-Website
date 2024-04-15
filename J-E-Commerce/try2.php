<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <title>Document</title>
    <style>
        .section-title .nav {
            justify-content: center;
            font-weight: 600;
            font-size: 20px;
            box-sizing: border-box;
            font-family: 'Montserrat', sans-serif;
        }

        .section-title .nav li {
            margin-right: 2rem;
        }

        .offer-tab-link {
            text-align: center;
        }

        .offer-tab-link h3 {
            font-size: 44px;
            line-height: 1.2;
            font-weight: 400;
            color: #212112;
            margin: 0;
        }

        .offer-tab-link ul {
            list-style: none;
            padding: 0;
            margin: 0;
            border: 0;
            justify-content: center;
        }

        .offer-tab-link ul li a.active {
            color: #c73750;
            border-color: #c73750;
        }

        .offer-tab-link ul li a {
            display: block;
            color: #000;
            font-size: 18px;
            padding: 10px 20px;
            border-bottom: 4px solid #000;
            font-weight: 500;
        }

        .offer-tabs.tab-content {
            padding: 10px 0;
        }

        .tab-content>.active {
            display: block;
        }

        .fade {
            transition: opacity .15s linear;
        }

        .offer-tabs.tab-content img {
            max-width: 100%;
            display: block;
            object-fit: cover;
        }

        .offer-tabs.tab-content img {
            vertical-align: middle;
            border-style: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="offer-tab-link ">
            <h3 style="color: #000;">BIG ADVANTAGE</h3>
            <ul class="nav nav-tabs">
                <li><a class="active" href="#Reach" data-toggle="tab">Big Reach</a></li>
                <li><a href="#Infrastructure" data-toggle="tab" class="">Big Infrastructure</a></li>
                <li><a href="#Amenities" data-toggle="tab" class="">Big Amenities</a></li>
                <li><a href="#Aesthetics" data-toggle="tab" class="">Big Aesthetics</a></li>

                <li><a href="#Sustainability" data-toggle="tab" class="">Big Sustainability</a></li>
            </ul>
        </div>
    </div>
    <div class="offer-tabs tab-content">
        <div class="offerslide tab-pane fade active show" id="Reach">

            <div class="container ">

                <div class="row ">
                    <!--<div class="container ">  <h4 class="title mb-4" style="text-align:center; padding-top:20px;">  Welcome to Greater Noida West! The most preferred location of Delhi NCR.</h4></div>-->
                    <div class="col-md-4  ">

                        <img src="assets/images/1.jpg" width="100%" height="auto">
                        <h4 class="title2" style="text-align: center; padding-top: 5px;font-weight: 700;">Airport </h4>

                    </div>

                    <div class="col-md-4 ">

                        <img src="assets/images/2.jpg" width="100%" height="auto">
                        <h4 class="title2" style="text-align: center; padding-top: 5px;font-weight: 700;">Metro </h4>

                    </div>

                    <div class="col-md-4 ">

                        <img src="assets/images/3.jpg" width="100%" height="auto">
                        <h4 class="title2" style="text-align: center; padding-top: 5px;font-weight: 700;">Road </h4>


                    </div>
                </div>

            </div>


        </div>
        <div class="offerslide tab-pane fade" id="Infrastructure">

            <div class="container ">

                <div class="row ">

                    <div class="col-md-4 ">
                        <a href="big-infrastructure.html">

                            <img src="assets/images/4.jpg" width="100%" height="auto"></a>
                        <p style="text-align: center; padding-top: 10px; font-weight: 700;">Fastest &amp; Largest
                            developing Residential Centre </p>
                    </div>



                    <div class="col-md-4">
                        <a href="big-infrastructure.html">

                            <img src="assets/images/5.jpg" width="100%" height="auto"></a>

                        <p style="text-align: center; padding-top: 10px; font-weight: 700;">Largest Tech Zone </p>
                    </div>




                    <div class="col-md-4">
                        <a href="big-infrastructure.html">

                            <img src="assets/images/6.jpg" width="100%" height="auto"></a>
                        <p style="text-align: center; padding-top: 10px; font-weight: 700;">Nearby Employment Hubs -
                            Noida, Noida Expressway &amp; Greater Noida </p>
                    </div>


                </div>

            </div>

        </div>
        <div class="offerslide tab-pane fade" id="Amenities">


            <div class="container ">

                <div class="row ">

                    <div class="col-md-4 ">
                        <a href="big-amenities.html">

                            <img src="assets/images/7.jpg" width="100%" height="auto"></a>
                        <p style="text-align: center; padding-top: 10px; font-weight: 700;">5 Star 2 level underground
                            parking for 5000+ cars. </p>
                    </div>



                    <div class="col-md-4">
                        <a href="big-amenities.html">

                            <img src="assets/images/8.jpg" width="100%" height="auto"></a>

                        <p style="text-align: center; padding-top: 10px; font-weight: 700;">8 Acre green landscape </p>
                    </div>




                    <div class="col-md-4">
                        <a href="big-amenities.html">

                            <img src="assets/images/9.jpg" width="100%" height="auto"></a>
                        <p style="text-align: center; padding-top: 10px; font-weight: 700;">Multi utility spaces for
                            leisure, fun &amp; shopping </p>
                    </div>


                </div>
                <!-- <div class="button_readmore" style="margin: auto; text-align: center;"><a href="big-amenities.html">View More</a></div> -->
            </div>

        </div>

        <div class="offerslide tab-pane fade" id="Aesthetics">


            <div class="container ">

                <div class="row ">
                    <div class="col-md-4">
                        <a href="big-aesthetics.html">

                            <img src="assets/images/10.jpg" width="100%" height="auto"></a>

                        <p style="text-align: center; padding-top: 10px; font-weight: 700;">Wide walkways landscaped for
                            an International shopping experience </p>
                    </div>

                    <div class="col-md-4 ">
                        <a href="big-aesthetics.html">

                            <img src="assets/images/11.jpg" width="100%" height="auto"></a>
                        <p style="text-align: center; padding-top: 10px; font-weight: 700;">Water Bodies facing Retail
                            &amp; F&amp;B </p>
                    </div>



                    <div class="col-md-4">
                        <a href="big-aesthetics.html">

                            <img src="assets/images/12.jpg" width="100%" height="auto"></a>
                        <p style="text-align: center; padding-top: 10px; font-weight: 700;">Dedicated &amp; pleasing
                            eco-system for large office spaces with expansive views of water bodies. </p>
                    </div>


                </div>

            </div>

        </div>

        <div class="offerslide tab-pane fade" id="Sustainability">


            <div class="container ">

                <div class="row ">
                    <div class="col-md-4">
                        <a href="big-sustainability.html">

                            <img src="assets/images/13.jpg" width="100%" height="auto"></a>

                        <p style="text-align: center; padding-top: 10px; font-weight: 700;">Golden Grande is Gold rated
                            IGBC certified and incorporates Green Footprints with sustainable designs improving energy
                            and water efficiency </p>
                    </div>

                    <div class="col-md-4">
                        <a href="big-sustainability.html">

                            <img src="assets/images/14.jpg" width="100%" height="auto"></a>
                        <p style="text-align: center; padding-top: 10px; font-weight: 700;">Solar energy panels &amp;
                            water conservation plants help in optimising natural resources and reducing the Carbon
                            Footprint which benefits all project inhabitants. </p>
                    </div>



                    <div class="col-md-4">
                        <a href="big-sustainability.html">

                            <img src="assets/images/15.jpg" width="100%" height="auto"></a>
                        <p style="text-align: center; padding-top: 10px; font-weight: 700;">
                            Climatically sealed structures in offices &amp; retail help in optimising energy consumption
                        </p>
                    </div>


                </div>

            </div>

        </div>
    </div>

    <script>
        tabLinks.forEach(tabLink => {
            tabLink.addEventListener('click', function (event) {
                event.preventDefault(); // Prevent the default link behavior

                // Remove 'active' class from all tab links
                tabLinks.forEach(link => {
                    link.classList.remove('active');
                });

                // Add 'active' class to the clicked tab link
                this.classList.add('active');

                // Check if the clicked tab link has a dropdown menu
                const dropdownMenu = this.querySelector('.dropdown-menu');
                if (dropdownMenu) {
                    // Toggle dropdown menu visibility
                    dropdownMenu.classList.toggle('show');
                }

                // Get the corresponding tab content id
                const tabContentId = this.getAttribute('href');

                // Remove 'active' class from all tab contents
                const tabContents = document.querySelectorAll('.offer-tabs .tab-pane');
                tabContents.forEach(tabContent => {
                    tabContent.classList.remove('active', 'show');
                });

                // Add 'active' class to the corresponding tab content
                const activeTabContent = document.querySelector(tabContentId);
                activeTabContent.classList.add('active', 'show');
            });
        });

    </script>
</body>

</html>