// PLUGINS OUT THE BOX
// 1: SLICK SLIDER
// 2: HEADROOM
// 3: MATCH HEIGHT

jQuery(document).ready(function ($) {


// PLUGINS ------------------------------------------------------------

    // HEADROOM
    $("[headroom]").headroom({
        offset: 200,
        tolerance: {
            up: 10,
            down: 0
        },
    });


    // MATCH HEIGHT
    $('.js-match-height').matchHeight();
    $('.js-match-height-alt').matchHeight();


    // SLICK
    $('.js-hero-slider').slick({
        arrows: true,
        dots: false,
        prevArrow: '<span class="slick-prev prev fal fa-chevron-left"></span>',
        nextArrow: '<span class="slick-next next fal fa-chevron-right"></span>',
        mobileFirst: true,
        slidesToShow: 1,
        cssEase: 'cubic-bezier(0.645, 0.045, 0.355, 1)'
    });

    $('.js-testimonial-carousel').slick({
        centerMode: true,
        initialSlide: 1,
        centerPadding: '20%',
        arrows: false,
        infinite: false,
        dots: true,
        responsive: [
            {
                breakpoint: 560,
                settings: {
                    centerPadding: '40px',
                    arrows: false,
                    centerMode: true,
                    slidesToShow: 1
                }
            }
        ]
    });


// BESPOKE ------------------------------------------------------------

    // MENU TRIGGER
    var hamburger = document.querySelector(".hamburger");
    var mobileMenu = document.querySelector("html");
    hamburger.addEventListener("click", function (e) {
        e.preventDefault();
        hamburger.classList.toggle("is-active");
        mobileMenu.classList.toggle("menu-open");
    });


    // MOBILE HEADER MENU TRIGGERS
    var mobile_menu = document.querySelector('[data-element="mobile-menu"]');
    if (mobile_menu) {
        // Add child elements to menu items with children.
        var mobile_menu_has_children = document.querySelectorAll(
            '[data-element="mobile-menu"] .menu-item-has-children'
        );
        for (var i = 0; i < mobile_menu_has_children.length; i++) {
            var element = mobile_menu_has_children[i];
            var button = document.createElement("div");
            button.classList.add("menu-item-child-trigger");
            element.appendChild(button);
        }
        // Add the eventListener for child trigger.
        var mobile_menu_children_triggers = document.querySelectorAll(
            '[data-element="mobile-menu"] .menu-item-child-trigger'
        );
        for (var i = 0; i < mobile_menu_children_triggers.length; i++) {
            var element = mobile_menu_children_triggers[i];
            element.addEventListener("click", function (element) {
                element.target.parentNode.classList.toggle("menu-item-child-active");
            });
        }
    }

    $('.js-menu-trigger').click(function (e) {
        e.preventDefault();
        $('html').toggleClass('menu-open');
    });

    $('.overlay, .js-menu-close').click(function (e) {
        e.preventDefault();

        if ($('html').hasClass('menu-open')) {
            $('html').removeClass('menu-open');
        }
    });


    // PREVENT HASH LINKS FROM JUMPING TO TOP OF PAGE
    $('a[href*="#"]').on('click', function (e) {
        e.preventDefault();
    });


    // SMOOTH SCROLL
    $('a[href*=#]:not([href=#]):not([data-toggle])').click(function () {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top
                }, 750);
                return false;
            }
        }
    });


    // TABS
    $('[data-section]').on('click', function (e) {
        e.preventDefault();
        var $wrapper = $(this).parents('[data-tabs="wrapper"]');
        var target = $(this).attr('data-section');
        $(this).siblings().removeClass('tab-active');
        $(this).addClass('tab-active');
        $wrapper.find('[data-tabs="content"]').children('section').addClass('hide');
        $wrapper.find('[data-tabs="content"]').find('section[id=' + target + ']').removeClass('hide').trigger('resize');
        if ($(window).width() < 768) {
            var hh = $('header').outerHeight();
            $('html,body').animate({
                scrollTop: $wrapper.offset().top - hh
            }, 750);
        }
    });


    // ACCORDIONS
    $('[data-toggle="collapse"]').on('click', function (e) {
        e.preventDefault();
        var current = $(this).attr('href');
        var parent = $(this).data('parent');
        var openIcon = $(this).data('icon-open');
        var closedIcon = $(this).data('icon-closed');
        if ($(e.target).is('.active')) {
            $(parent).find('[data-toggle="collapse"]').removeClass('active');
            $(parent).find('.collapse').slideUp(300).removeClass('open');
            if ($(this).attr('data-icon-open')) {
                $(parent).find('i').removeClass(openIcon).addClass(closedIcon);
            }
        } else {
            $(parent).find('[data-toggle="collapse"]').removeClass('active');
            $(parent).find('.collapse').slideUp(300).removeClass('open');
            $(this).addClass('active');
            $(parent).find(current).slideDown(300).addClass('open');
            if ($(this).attr('data-icon-open')) {
                $(parent).find('i').removeClass(openIcon).addClass(closedIcon);
                $(this).find('i').removeClass(closedIcon).addClass(openIcon);
            }
        }
    });
    function resizeCollapse() {
        $('[data-toggle="collapse"]').each(function () {
            if ($(this).is(':hidden')) {
                $(this).removeClass('active');
                $(this).next().removeAttr('style').removeClass('open');
            }
        });
    }
    $(window).on('resize', function () {
        resizeCollapse();
    });


    // WORDPRESS - REMOVE P TAG FROM AROUND IMAGES WHEN USED IN A WYSIWYG
    $('p > img').unwrap();


});
