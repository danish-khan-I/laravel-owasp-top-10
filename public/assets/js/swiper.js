$(document).ready(function () {
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 2,
        spaceBetween: 30,
        loop:true, 
        autoplay: {
          delay: 3000,
          disableOnInteraction: false,
        },
        navigation: {
          nextEl: '.arrow-left',
          prevEl: '.arrow-right'
        },
        pagination: {
          el: ".swiper-pagination",
          clickable: true
        },
        breakpoints: {
          320: {
            slidesPerView: 1,
            spaceBetween: 10
          },
          767:{
            slidesPerView: 1,
            spaceBetween: 20,
          },
          1199: {
            slidesPerView: 2,
            spaceBetween: 30
          },
        }
      });

      // swiper.on('slideChange', function () {
      //   console.log('abc');
      //   $('.item1').addClass("image-switch")

        // if($('.item1').hasClass("image-switch")){
        //   $('.image-switch').attr('src','assets/img/home/img-switch/img-switch-1.jpg');
        // }else if($('item2').hasClass("image-switch")){
        //         $('image-switch').attr('src','assets/img/home/img-switch/img-switch-2.jpg');  
        //       }
    // });

    var swiper = new Swiper(".mySwiper2", {
      slidesPerView: 3,
      spaceBetween: 0,
      loop:true, 
      autoplay: {
        delay: 3000,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true
      },
      breakpoints: {
        320: {
          slidesPerView: 1,
          spaceBetween: 0
        },
        767:{
          slidesPerView: 2,
          spaceBetween: 0,
        },
        1199: {
          slidesPerView: 3,
          spaceBetween: 0
        },
      }
    });
    var swiper = new Swiper(".mySwiper3", {
      slidesPerView: 3,
      spaceBetween: 20,
      loop:true, 
      navigation: {
        nextEl: '.arrow-left-project',
        prevEl: '.arrow-right-project',
        clickable:true
      },
      breakpoints: {
        320: {
          slidesPerView: 1,
          spaceBetween: 10
        },
        767:{
          slidesPerView: 2,
          spaceBetween: 20,
        },
        1199: {
          slidesPerView: 3,
          spaceBetween: 30
        },
      }
    });
  });

  



