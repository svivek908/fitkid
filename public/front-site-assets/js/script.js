(function($) {
    "use strict";
    /*=====================
     01. Slick slider
     ==========================*/

    $('.slide-1').not('.slick-initialized').slick({
        autoplay: false,
        autoplaySpeed: 2500,
    });

        $('.slide-6').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 6,
        slidesToScroll: 6,
        responsive: [
            {
                breakpoint: 1367,
                settings: {
                    slidesToShow: 5,
                    slidesToScroll: 5,
                    infinite: true
                }
            },
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4,
                    infinite: true
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            }

        ]
    });
    $('.hotdeal-right-slick').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        fade: true,
        asNavFor: '.hotdeal-right-nav'
    });
    if ($(window).width() > 768) {
        $('.hotdeal-right-nav').slick({
            vertical: true,
            verticalSwiping: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: '.hotdeal-right-slick',
            arrows: false,
            infinite: true,
            dots: false,
            centerMode: false,
            focusOnSelect: true
        });
    }else{
        $('.hotdeal-right-nav').slick({
            vertical: false,
            verticalSwiping: false,
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: '.hotdeal-right-slick',
            arrows: false,
            infinite: true,
            centerMode: false,
            dots: false,
            focusOnSelect: true,
            responsive: [
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    }


// mobile search //
    $('.search-overlay').hide();
    $('.close-mobile-search').on('click', function (){
        $('.search-overlay').fadeOut();
    })
    $('.mobile-search').on('click', function (){
        $('.search-overlay').show();
    })


    /*=====================
     03.footer js
     ==========================*/
    var contentwidth = jQuery(window).width();
    if ((contentwidth) < '767') {
        jQuery('.footer-title h5').append('<span class="according-menu"></span>');
        jQuery('.footer-title').on('click', function () {
            jQuery('.footer-title').removeClass('active');
            jQuery('.footer-contant').slideUp('normal');
            if (jQuery(this).next().is(':hidden') == true) {
                jQuery(this).addClass('active');
                jQuery(this).next().slideDown('normal');
            }
        });
        jQuery('.footer-contant').hide();
    } else {
        jQuery('.footer-contant').show();
    }


    /*=====================
     04. Image to background js
     ==========================*/
    $(".bg-top" ).parent().addClass('b-top');
    $(".bg-bottom" ).parent().addClass('b-bottom');
    $(".bg-center" ).parent().addClass('b-center');
    $(".bg_size_content").parent().addClass('b_size_content');
    $(".bg-img" ).parent().addClass('bg-size');

    jQuery('.bg-img').each(function() {

        var el = $(this),
            src = el.attr('src'),
            parent = el.parent();

        parent.css({
            'background-image': 'url(' + src + ')',
            'background-size': 'cover',
            'background-position': 'unset',
            'display' : 'block'
        });

        el.hide();
    });

    /*=====================
     05 toggle nav
     ==========================*/
    $('.toggle-nav').on('click', function () {
        $('.sm-horizontal').css("right","0px");
    });
    $(".mobile-back").on('click', function (){
        $('.sm-horizontal').css("right","-410px");
    });

    /*=====================
     06 navbar mobile nav
     ==========================*/
    $('.sm-nav-btn').on('click', function () {
        $('.nav-slide').css("left","0px");
    });
    $(".nav-sm-back").on('click', function (){
        $('.nav-slide').css("left","-410px");
    });

    $('.toggle-nav-desc').on('click', function () {
        $('.desc-horizontal').css("right","0px");
    });
    $(".desc-back").on('click', function (){
        $('.desc-horizontal').css("right","-410px");
    });

    $(function() {
        $('#main-menu').smartmenus({
            subMenusSubOffsetX: 1,
            subMenusSubOffsetY: -8
        });
        $('#sub-menu').smartmenus({
            subMenusSubOffsetX: 1,
            subMenusSubOffsetY: -8
        });
     

       });

    /*=====================
     10. Product page Quantity Counter
     ==========================*/
    $('.collection-wrapper .qty-box .quantity-right-plus').on('click', function () {
        var $qty = $('.qty-box .input-number');
        var currentVal = parseInt($qty.val(), 10);
        if (!isNaN(currentVal)) {
            $qty.val(currentVal + 1);
        }
    });
    $('.collection-wrapper .qty-box .quantity-left-minus').on('click', function () {
        var $qty = $('.qty-box .input-number');
        var currentVal = parseInt($qty.val(), 10);
        if (!isNaN(currentVal) && currentVal > 1) {
            $qty.val(currentVal - 1);
        }
    });

    /*=====================
     11. filter sidebar js
     ==========================*/
    $('.sidebar-popup').on('click', function(e) {
        $('.open-popup').toggleClass('open');
        $('.collection-filter').css("left","-15px");
    });

    // product-5
    $("#tab-1").css("display", "Block");
    $(".default").css("display", "Block");
    $(".tabs li a").on('click', function () {
        event.preventDefault();
        $('.tab_product_slider').slick('unslick');
        $('.slide-5').slick('unslick');
        $(this).parent().parent().find("li").removeClass("current");
        $(this).parent().addClass("current");
        var currunt_href = $(this).attr("href");
        $('#' + currunt_href).show();
        $(this).parent().parent().parent().parent().find(".tab-content").not('#' + currunt_href).css("display", "none");
        $('.slide-5').slick({
            dots: false,
            infinite: true,
            speed: 300,
            slidesToShow: 5,
            centerPadding: '15px',
            responsive: [
                {
                    breakpoint: 1470,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 4,
                        infinite: true
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true
                    }
                },
                {
                    breakpoint: 820,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        infinite: true
                    }
                },
                {
                    breakpoint: 420,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: true
                    }
                }
            ]
        });
    });

    // new tab
    $(".product-slide-6").slick({
        arrows: true,
        dots: false,
        infinite: false,
        speed: 300,
        slidesToShow: 6,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1700,
                settings: {
                    slidesToShow: 5,
                    slidesToScroll: 5,
                    infinite: true
                }
            },
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4,
                    infinite: true
                }
            },
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            }
        ]
    });
    /*=====================
     17. Tap on Top
     ==========================*/
    $(window).on('scroll', function() {
        if ($(this).scrollTop() > 600) {
            $('.tap-top').fadeIn();
        } else {
            $('.tap-top').fadeOut();
        }
    });
    $('.tap-top').on('click', function() {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });
})(jQuery);

function AddtoWishlist(id,url,_token)
{

            $.ajax({
              type:"POST",
              url:url,
              dataType: 'json',
               data: {
                 'id': id,
                 '_token':_token
                },
              success: function(response) 
              {
                if(response.result == true)
                {
                     toastr.success(response.message);
                }
                else
                {
                    toastr.error(response.message);
                }
              },
              error: function(response)
              {
                console.log(response);
              }       
            });

}

$(document).ready(function(){
    $("#loader").fadeOut("slow");
});


$(document).ready(function(){

  $('#stars li').on('click', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently selected
    var stars = $(this).parent().children('li.star');
    
    for (i = 0; i < stars.length; i++) {
      $(stars[i]).removeClass('star-selected');
    }
    
    for (i = 0; i < onStar; i++) {
      $(stars[i]).addClass('star-selected');
    }
    
  
    var ratingValue = parseInt($('#stars li.star-selected').last().data('value'), 10);
   
    
    
  $('.starCount').val(ratingValue);
  });
  
});


/* ---- For Sidebar JS Start ---- */
$('.sidebar-box span.opener').on("click", function(){
if ($(this).hasClass("plus")) {
  $(this).parent().find('.sidebar-contant').slideDown();
  $(this).removeClass('plus');
  $(this).addClass('minus');
}
else
{
  $(this).parent().find('.sidebar-contant').slideUp();
  $(this).removeClass('minus');
  $(this).addClass('plus');
}
return false;
});

 $('.account-sidebar').on('click', function(e) {
        $('.dashboard-left').css("left","0");
    });
$('.filter-back').on('click', function(e) {
    $('.dashboard-left').css("left","-365px");
});
$('.filter-main-btn').on('click', function(e) {
        $('.collection-filter').css("left","-15px");
    });
$('.filter-back').on('click', function(e) {
    $('.collection-filter').css("left","-365px");
    $('.sidebar-popup').trigger('click');
});
$('.collapse-block-title').on('click', function(e) {
        e.preventDefault;
        var speed = 300;
        var thisItem = $(this).parent(),
            nextLevel = $(this).next('.collection-collapse-block-content');
        if (thisItem.hasClass('open')){
            thisItem.removeClass('open');
            nextLevel.slideUp(speed);
        }
        else {
            thisItem.addClass('open');
            nextLevel.slideDown(speed);
        }
    });
$('.language-dropdown-open').slideUp();
    $('.language-dropdown-click').on('click', function (){
        $('.language-dropdown-open').slideToggle()
    });
 $('.lang').on('click', function (){
       var lang=$(this).text();
       
       if(lang == 'Arabic')
       {
         var cur_lang= 'ar';
         
       }
       if(lang == 'English')
       {
         var cur_lang = 'en';
        
       }
        $('#cur_lang').empty();
        $('#cur_lang').append(lang);
        $('.language-dropdown-open').slideToggle()
        var url=$('#set_for_lng_url').val();
         $.ajax({
              type:"GET",
              url:url,
              dataType: 'json',
               data: {
                 'lang': cur_lang,                 
                },
              success: function(response) 
              {
               if(response.result == true)
               {
                location.reload();
               }
              },
              error: function(response)
              {
                console.log(response);
              }       
            });
    });
