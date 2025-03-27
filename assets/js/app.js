jQuery(document).ready(function($) {
    $('.master-modal-open, .cloes-master-modal').click(function (e) { 
        e.preventDefault();

        $('.master-modal ').toggleClass('show'); 
    });
    $('.master-share-open, .cloes-share-modal').click(function (e) { 
        e.preventDefault();

        $('.share-modal ').toggleClass('show'); 
    });

    $('.phone-nav-toggle').click(function (e) { 
        $('body').toggleClass('phone-nav-open');
    });
    
    $('.phone-overlay').click(function (e) { 
        $('body').removeClass('phone-nav-open');
    });
    
    $('.phone-nav ul.sub-menu').before(
        '<i class="fal fa-angle-left sub-menu-arrow"></i>'
    );
    
    $('.sub-menu-arrow').click(function (e) { 
        if ($(this).hasClass('fa-angle-left')) {
            $(this).next('ul.sub-menu').slideDown(500);
            $(this).removeClass('fa-angle-left').addClass('fa-angle-down');
        } else {
            $(this).next('ul.sub-menu').slideUp(500);
            $(this).removeClass('fa-angle-down').addClass('fa-angle-left');
        }
    });

    var sticky_side = $('.sticky-side');

    if (sticky_side.length) {
        var sideTop = sticky_side.offset().top;
    
        $(window).scroll(function () { 
            var current_scroll = $(window).scrollTop();
            var post_content_left = $('.post-content').offset().left + 950;
    
            if (current_scroll >= sideTop) {
                sticky_side.css({
                    position: "fixed",
                    top: "40px",
                    'inset-inline-start': post_content_left,
                    visibility: "visible",
                    opacity: "1",
                    transition: "opacity 0.3s ease-in-out"
                });
            } else {
                sticky_side.css({
                    position: "absolute",
                    top: sideTop + "px",
                    'inset-inline-start': "unset",
                    visibility: "hidden",
                    opacity: "0"
                });
            }
        });
    }

    // owl carousle 
    jQuery(document).ready(function ($) {
        var carousel = $('.owl-carousel');
    
        // دریافت مقادیر از data-attribute
        var slider_items = carousel.data('slider-items') || 3;
        var navigation = carousel.data('navigation') || false;
        var pagination = carousel.data('pagination') || false;
        var loop = carousel.data('loop') || false;
    
        carousel.owlCarousel({
            loop: loop,
            margin: 10,
            dots: pagination,
            nav: navigation,
            rtl: true,
            navText: [
                ' <i class="fal fa-angle-right"></i>',
                ' <i class="fal fa-angle-left"></i>'
            ],
            responsive: {
                0: { items: 1 },
                400: { items: 1 },
                600: { items: 2 },
                1000: { items: slider_items }
            }
        });
    });
    
    
    
    
});
