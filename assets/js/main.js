(function ($) {
    'use strict';

    var $window = $(window);

    // :: Sticky Active Code
    $window.on("scroll", function(){
        if
        ($(document).scrollTop() > 86){
            $("#banner").addClass("shrink");
        }
        else
        {
            $("#banner").removeClass("shrink");
        }
    });


    // :: Carousel Active Code
    if ($.fn.owlCarousel) {

        $(".client_slides").owlCarousel({
            responsive: {
                0: {
                    items: 1
                },
                991: {
                    items: 2
                },
                767:{
                    items: 1
                }
            },
            loop: true,
            autoplay: true,
            smartSpeed: 700,
            dots: true
        });

        var dot = $('.client_slides .owl-dot');
        dot.each(function () {
            var index = $(this).index() + 1;
            if (index < 10) {
                $(this).html('0').append(index);
            } else {
                $(this).html(index);
            }
        });
    }

    // :: Magnific-popup Video Active Code
    if ($.fn.magnificPopup) {
        $('#videobtn').magnificPopup({
            type: 'iframe'
        });
        $('.open-popup-link').magnificPopup({
            type:'inline',
            midClick: true
        });
        $('.open-signup-link').magnificPopup({
            type:'inline',
            midClick: true
        });
        $('.gallery_img').magnificPopup({
            type: 'image',
            gallery: {
                enabled: true
            },
            removalDelay: 300,
            mainClass: 'mfp-fade',
            preloader: true
        });
    }

    // :: Preloader Active Code
    $window.on('load', function () {
        $('#preloader').fadeOut('1000', function () {
            $(this).remove();
        });
    });


    // :: ScrollUp Active Code
    if ($.fn.scrollUp) {
        $.scrollUp({
            scrollSpeed: 1500,
            scrollText: 'Scroll Top'
        });
    }

    // :: onePageNav Active Code
    if ($.fn.onePageNav) {
        $('#nav').onePageNav({
            currentClass: 'active',
            scrollSpeed: 1500,
            easing: 'easeOutQuad'
        });
    }

    // :: CounterUp Active Code
    if ($.fn.counterUp) {
        $('.counter').counterUp({
            delay: 10,
            time: 2000
        });
    }



    // :: Wow Active Code
    if ($window.width() > 767) {
        new WOW().init();
    }

    // :: Accordian Active Code
    (function () {
        var dd = $('dd');
        dd.filter(':nth-child(n+3)').hide();
        $('dl').on('click', 'dt', function () {
            $(this).next().slideDown(500).siblings('dd').slideUp(500);
        })
    })();

    // :: niceScroll Active Code
    if ($.fn.niceScroll) {
        $('.timelineBody').niceScroll();
    }


    $('.simple_timer').syotimer({
        year: $('.simple_timer').data('year'),
        month: $('.simple_timer').data('month'),
        day: $('.simple_timer').data('day'),
        hour: $('.simple_timer').data('hour'),
        minute: $('.simple_timer').data('minute')
    })

    document.addEventListener('DOMContentLoaded', function () {
        // Select the header menu container
        const headerMenu = document.querySelector('#banner');

        if (headerMenu) {
            const dropdowns = headerMenu.querySelectorAll('.dropdown');

            dropdowns.forEach(dropdown => {
                const toggleButton = dropdown.querySelector('.dropdown-toggle');
                const submenu = dropdown.querySelector('.dropdown-menu');

                if (toggleButton && submenu) {
                    // Add click event listener to the toggle button
                    toggleButton.addEventListener('click', function (e) {
                        e.preventDefault(); // Prevent default behavior of the link
                        // Toggle 'show' class on the submenu
                        submenu.classList.toggle('show');
                    });

                    // Close the dropdown if clicked outside
                    document.addEventListener('click', function (event) {
                        if (!dropdown.contains(event.target)) {
                            submenu.classList.remove('show');
                        }
                    });
                }
            });
        }

        $('body').on('focus', '.contact_form input, .contact_form textarea', function () {
            $(this).closest('.group').addClass('active');
        });

        $('body').on('blur', '.contact_form input, .contact_form textarea', function () {
            if ($(this).val() === '') {
                $(this).closest('.group').removeClass('active');
            }
            else {
                $(this).closest('.group').addClass('active');
            }
        });

    });

    document.addEventListener('wpcf7mailsent', function(event) {
        // Check the form ID if needed
        $(event.target).find('.group').removeClass('active');
    }, false);

})(jQuery);
