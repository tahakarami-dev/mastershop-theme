jQuery(document).ready(function($) {
    $('.master-modal-open, .cloes-master-modal').click(function (e) { 
        e.preventDefault();

        $('.master-modal ').toggleClass('show'); 
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
    
});
