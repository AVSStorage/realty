$(function(){

//        $('.slider__content').slick({
//         slidesToShow: 4,
//         slidesToScroll: 4,
//         speed: 1000,
//         nextArrow: '<button type="button" class="slick-btn slick-next"></button>',
//         prevArrow: '<button type="button" class="slick-btn slick-prev"></button>'
// 	});

    $('.slick-next').on('click', function(){
  $('.slider__content').slickNext();
});
$('.slick-prev').on('click', function(){
  $('.slider__content').slickPrev();
});



});

$(function(){

//            $('.slider__choice').on('init', function(event, slick){
//     event subscriber goes here
//
//            $('.preloader').removeClass('active');
// });
//
//        $('.slider__choice').slick({
//        	slidesToShow: 1,
//         slidesToScroll: 1,
//         speed: 1000,
//         nextArrow: '<button type="button" class="choice__btn  choice--next"></button>',
//         prevArrow: '<button type="button" class="choice__btn  choice--prev"></button>'
// 	});
//


});


$(function(){



    $('a.photo').click(function(e){


        $(window).trigger('resize');
    });


    $('.animat__slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        initialSlide: 0,
        speed: 1000,
        asNavFor: '.animat__photos',
        nextArrow: '<button type="button" class="choice__btn  choice--next"></button>',
        prevArrow: '<button type="button" class="choice__btn  choice--prev"></button>'
    });

    $('.animat__photos').slick({
        slidesToShow: 6,
        slidesToScroll: 1,
        speed: 1000,
        infinite: false,
        asNavFor: '.animat__slider',
        focusOnSelect: true,
        nextArrow: '<button type="button" class="choice__btn  choice--next"></button>',
        prevArrow: '<button type="button" class="choice__btn  choice--prev"></button>'
    });

    //
    // $('div[data-slide]').click(function(e) {
    //     e.preventDefault();
    //     var slideno = $(this).data('slide');
    //     console.log(slideno);
    //
    //     $('.animat__photos').slick('slickGoTo', slideno + 1)
    // });




  //
  //          $('.animat__slider').slick({
  //       slidesToShow: 1,
  //       slidesToScroll: 1,
  //       speed: 1000,
  //              asNavFor: '.animat__photos',
  //       nextArrow: '<button type="button" class="choice__btn  choice--next"></button>',
  //       prevArrow: '<button type="button" class="choice__btn  choice--prev"></button>'
  // });
  //
  //   $('.animat__photos').slick({
  //       slidesToShow: 6,
  //       slidesToScroll: 1,
  //       speed: 1000,
  //       asNavFor: '.animat__slider',
  //       focusOnSelect: true,
  //       nextArrow: '<button type="button" class="choice__btn  choice--next"></button>',
  //       prevArrow: '<button type="button" class="choice__btn  choice--prev"></button>'
  //   });


    //$(window).on('resize orientationChange', function(event) {  $('.animat__slider').slick('reinit');});



});





$(function(){

 $('.slider__main').on('init', function(event, slick){
    // event subscriber goes here

           $('.preloader').removeClass('active');
});

$('.slider__main-2').on('init', function(event, slick){
    // event subscriber goes here

           $('.preloader').removeClass('active');
});

       $('.slider__main').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        speed: 1000,
        asNavFor: '.slider__main-2',
        nextArrow: '<button type="button" class="choice__btn  choice--next"></button>',
        prevArrow: '<button type="button" class="choice__btn  choice--prev"></button>'
  });

       $('.slider__main-2').slick({
        slidesToShow: 8,
        slidesToScroll: 1,
        speed: 1000,
        asNavFor: '.slider__main',
           infinite:false,
        focusOnSelect: true,
        nextArrow: '<button type="button" class="choice__btn  choice--next"></button>',
        prevArrow: '<button type="button" class="choice__btn  choice--prev"></button>'
  });



});


$(function(){

       $('.slider__calendar').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        speed: 1000,
        nextArrow: '<button type="button" class="slick-btn slick-next"></button>',
        prevArrow: '<button type="button" class="slick-btn slick-prev"></button>'
  });

});

  /* Smooth Scroll */

   $("[data-scroll]").on("click", function(event) {
    event.preventDefault();

    let elementID = $(this).data('scroll');
    let elementOffset = $(elementID).offset().top;

    $("html, body").animate({
      scrollTop: elementOffset - 60
    }, 1000);
  });




