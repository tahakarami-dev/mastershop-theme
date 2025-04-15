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
    
    $(".master-single-product .slick-carousel").each(function () {
        let e = $(this);
    
        e.slick({
            arrows: !!e.data("nav"),
            dots: !!e.data("dots"),
            autoplay: !!e.data("autoplay"),
            slidesToShow: e.data("columns"),
            slidesToScroll: 1,
            rtl: true,
            asNavFor: e.data("asnavfor") ? e.data("asnavfor") : "",
            draggable: true,
            infinite: true,
            cssEase: "linear",
            prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
            nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>'
        });
    });


      // add to cart btns
  $(document).on("click", ".plus, .minus", function () {
    var input = $(this).closest(".quantity").find(".qty"),
      value = parseFloat(input.val()),
      max = parseFloat(input.attr("max")),
      min = parseFloat(input.attr("min")),
      step = input.attr("step");
    (value && "" !== value && "NaN" !== value) || (value = 0),
      ("" === max || "NaN" === max) && (max = ""),
      ("" === min || "NaN" === min) && (min = 0),
      ("any" === step ||
        "" === step ||
        void 0 === step ||
        "NaN" === parseFloat(step)) &&
        (step = 1),
      $(this).is(".plus")
        ? input.val(
            max && (max == value || value > max)
              ? max
              : value + parseFloat(step)
          )
        : min && (min == value || min > value)
        ? input.val(min)
        : value > 0 && input.val(value - parseFloat(step)),
      input.trigger("change");
  });

  $('.custom-auth-tab').on('click', function() {
    const tabId = $(this).data('tab');
    
    // حذف کلاس active از همه تب‌ها و فرم‌ها
    $('.custom-auth-tab').removeClass('active');
    $('.custom-auth-form').removeClass('active');
    
    // افزودن کلاس active به تب و فرم انتخاب شده
    $(this).addClass('active');
    $('#custom-' + tabId + '-form').addClass('active');
});

if ($('#custom-register-form').find('.woocommerce-error').length) {
    $('.custom-auth-tab[data-tab="register"]').click();
}

    // ajax search

    let searchTimer;

    $('.header-search-input').on('keyup', function () {
        clearTimeout(searchTimer);
        let input = $(this).val();
    
        if (input.length >= 2) {
            searchTimer = setTimeout(function () {
                $.ajax({
                    type: "post",
                    url:  MASTER_DATA.ajax_url,
                    data: {
                        action: 'master_action_ajax',
                        keyword: input
                    },
                    dataType: "html",
                    success: function (data) {
                        $('.search-result-holder').html(data).show();
                    }
                });
            }, 300); 
        } else {
            $('.search-result-holder').hide(); 
        }
    });

   
    
});
