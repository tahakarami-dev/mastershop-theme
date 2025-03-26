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
    
    
    
});
