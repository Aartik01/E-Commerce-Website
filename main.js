(function ($) {
    "use strict";
  
    new WOW().init();

    // navbar cart
    $(".cart_link > a").on("click", function () {
        $(".mini_cart").addClass("active");
      });
    
    $(".mini_cart_close > a").on("click", function () {
        $(".mini_cart").removeClass("active");
      });


var cart =[];

function addtocart(a){
  cart.push({...categories[a]});
  displaycart();
}
function displaycart(a){
  let j=0;
  if(cart.length==0){
    document.getElementById('cartItem').innerHTML = "Your cart is Empty";
  }
  else{
    document.getElementById('cartItem').innerHTML = cart.map((items)=>
    {
      var{pro}= items;
      return(custom-row);
    }).join('');
  }
}

      // Sticky navbar
    $(window).on("scroll", function () {
      var scroll = $(window).scrollTop();
      if (scroll< 100) {
        $(".sticky-header").removeClass("sticky");
      }
      else{
        $(".sticky-header").addClass("sticky");
      }
    });   

    // background images
    function dataBackgroundImages(){
      $("[data-bgimg]").each(function(){
        var bgImgUrl = $(this).data("bgimg");
        $(this).css({
          "background-image" : "url(" + bgImgUrl + " )",
        });
      });
    }

    $(window).on("load", function (){
      dataBackgroundImages();
    });

    //for carousel slider
    $(".slider_area").owlCarousel({
      animateOut : "fadeOut",
      autoplay : true,
      loop : true,
      nav : false,
      autoplayTimeout : 6000,
      items : 1,
      dots : true,
    }); 

//product column activation responsive
$(".product_column3").slick({
  centerMode: true,
  centerPadding: "0",
  slidesToShow: 5,
  arrows: true,
  rows: 2,
  prevArrow: '<button class="pre_arrow"><i class="ion-chevron-left"></i></button>',
  nextArrow: '<button class="next_arrow"><i class="ion-chevron-right"></i></button>',
  responsive: [
    {
    breakpoint: 400,
    settings: {
      slidesToShow: 1,
      slidesToScroll: 1,
    },
  },
  {
    breakpoint: 768,
    settings: {
      slidesToShow: 2,
      slidesToScroll: 2,
    },
  },
  {
    breakpoint: 992,
    settings: {
      slidesToShow: 3,
      slidesToScroll: 3,
    },
  },
  {
    breakpoint: 1200,
    settings: {
      slidesToShow: 4,
      slidesToScroll: 4,
    },
  },
],
});

//for tooltip
$('[data-toggle="tooltip"]').tooltip();

//tiiltip active
$(".action_links ul li a, .quick_button a").tooltip({
  animated : "fade",
  placement : "top",
  container : "body",
});

//product row activation responsive
$(".product_row1").slick({
  centerMode : true,
  centerPadding : "0",
  slidesToShow : 5,
  arrows : true,
  prevArrow : '<button class="pre_arrow"><i class="ion-chevron-left"></i></button>',
  nextArrow : '<button class="next_arrow"><i class="ion-chevron-right"></i></button>',
  responsive : [
    {
    breakpoint : 400,
    settings : {
      slidesToShow : 1,
      slidesToScroll : 1,
    },
  },
  {
    breakpoint : 768,
    settings : {
      slidesToShow : 2,
      slidesToScroll : 2,
    },
  },
  {
    breakpoint : 992,
    settings : {
      slidesToShow : 3,
      slidesToScroll : 3,
    },
  },
  {
    breakpoint : 1200,
    settings : {
      slidesToShow : 4,
      slidesToScroll : 4,
    },
  },
],
});

//blog section
$(".blog_column3").owlCarousel({
  autoplay: true,
  loop: true,
  nav: true,
  autoplayTimeout: 5000,
  items: 3,
  dots: false,
  margin: 30,
  navText: [
    '<i class="ion-chevron-left"></i>',
    '<i class="ion-chevron-right"></i>',
  ],
  responsiveClass: true,
  responsive: {
    0: {
      items: 1,
    },
    768: {
      items: 2,                           
    },
    992: {
      items: 3,
    },
  },
});

//navactive responsive
$(".product_navactive").owlCarousel({
autoplay : false,
loop : true,
nav : true,
items : 4,
dots : false,
navText: [
  '<i class="ion-chevron-left arrow-left"></i>',
  '<i class="ion-chevron-right arrow-right"></i>',
],
responsiveClass: true,
responsive: {
  0: {
    items: 1,
  },
  250: {
    items: 2,
  },
  480: {
    items: 3,
  },
  768: {
    items: 4,
  },
},
});

$(".modal").on("show.bs.modal", function(e){
$(".product_navactive").resize();
});

$(".product_navactive a").on("click", function(e){
e.preventDefault();
var $href = $(this).attr("href");
$(".product_navactive a").removeClass("active");
$(this).addClass("active");
$(".product-details-large .tab-pane").removeClass("active show");
$(".product-details-large" + $href).addClass("active show");
});



// bottom header

$(document).ready(function(){
  highlightActiveMenuitem();

  $(".main_menu_inner .main_menu a").click(function() {
  
    $(".main_menu").find(".active").removeClass("active");
    $(this).parent().addClass("active");
  });
  function highlightActiveMenuitem(){
    
    var currentUrl=window.location.pathname;
    console.log(window.location.pathname);
    $(".main_menu_inner .main_menu a").each(function () {
      var menuitemUrl = $(this).attr("href");
      if(currentUrl.includes(menuitemUrl)){
        $(this).parent().addClass("active");
        $(this).css("color","#a8741a");
        // $(this).css("background-color","lightpink");
      }
    });
  }
});
})(jQuery);




