$(document).ready(function () {
   // Get height header
   var height_nav = ($(".navbar").outerHeight())
   // alert(height_nav);
   $(".wp-content").css("margin-top", height_nav);

   $('.owl-carousel').owlCarousel({
      loop: false,
      margin: 30,
      navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
      dots: false,
      autoplay: false,
      autoplayTimeout: 5000,
      responsiveClass: false,
      responsive: {
         0: {
            items: 2,
            nav: false
         },
         767: {
            items: 3,
            nav: true
         },
         1169: {
            items: 5,
            // merge: true,
            // nav: true,
         },
      }
   })

   AOS.init();


   //fix header 

   $(window).scroll(function () {
      if ($(this).scrollTop() > 0) {
         $('.navbar').addClass('toggle-shadow');
      } else if ($(this).scrollTop() == 0) {
         $('.navbar').removeClass('toggle-shadow');
         $('.navbar-toggle').click(function (e) {
            e.preventDefault();
            $('.navbar').addClass('toggle-shadow');
         });
      }
   });


   // Back-top
   $(window).scroll(function () {
      if ($(this).scrollTop() >= 300) {
         $(".back-top").fadeIn();
      } else {
         $(".back-top").fadeOut();
      }
   });

   $(".back-top").click(function () {
      $('html, body').scrollTop({ scrollTop: 0 })
   });

   // My Account toggle
   $(".dropdown .nav-link").click(function () {
      $(this).next(".dropdown-menu").slideToggle('fast');
   });

   // Mini_cart toggle
   $(".cart-link.btn i").click(function () {
      $(".mini_cart").stop().slideToggle("fast");
      // return false;
   });

   // Dropdown Caterogy
   $(".btn.dropdown-toggle").click(function () {
      $(this).toggleClass("show");
      $(this).next(".dropdown-menu").slideToggle('fast');
   });
   //swiper

   var swiper = new Swiper(".mySwiper", {
      spaceBetween: 10,
      slidesPerView: 4,
      freeMode: true,
      watchSlidesProgress: true,
   });
   var swiper2 = new Swiper(".mySwiper2", {
      spaceBetween: 10,
      navigation: {
         nextEl: ".swiper-button-next",
         prevEl: ".swiper-button-prev",
      },
      thumbs: {
         swiper: swiper,
      },
   });
});

$(document).ready(function () {


   var readURL = function (input) {
      if (input.files && input.files[0]) {
         var reader = new FileReader();

         reader.onload = function (e) {
            $('.avatar').attr('src', e.target.result);
         }

         reader.readAsDataURL(input.files[0]);
      }
   }


   $(".file-upload").on('change', function () {
      readURL(this);
   });
});

//set timeout message
let msg = document.querySelector('#message');
if (msg) {
   setTimeout(() => {
      msg.classList.add("d-none")
   }, 3000)
}

