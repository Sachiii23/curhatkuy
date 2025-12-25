(function ($) {
    "use strict";
    
    // Dropdown on mouse hover
    $(document).ready(function () {
        function toggleNavbarMethod() {
            if ($(window).width() > 992) {
                $('.navbar .dropdown').on('mouseover', function () {
                    $('.dropdown-toggle', this).trigger('click');
                }).on('mouseout', function () {
                    $('.dropdown-toggle', this).trigger('click').blur();
                });
            } else {
                $('.navbar .dropdown').off('mouseover').off('mouseout');
            }
        }
        toggleNavbarMethod();
        $(window).resize(toggleNavbarMethod);
    });

    // Animation for emotion cards with hover description
    $(document).ready(function () {
        const descriptions = {
            kecemasan: {
                title: "Kecemasan: Lebih dari Sekadar Gugup Biasa",
                text: "Kecemasan adalah perasaan khawatir atau takut yang intens dan menetap. Meskipun rasa cemas sesekali adalah normal, terutama dalam situasi yang penuh tekanan, kecemasan yang berlebihan dan berkepanjangan dapat mengganggu kehidupan sehari-hari."
            },
            stres: {
                title: "Stres: Tekanan yang Mengganggu Keseimbangan",
                text: "Stres adalah respons tubuh terhadap tekanan atau tuntutan. Terlalu banyak stres dapat menyebabkan masalah fisik dan mental seperti kelelahan, sulit tidur, dan gangguan suasana hati."
            },
            trauma: {
                title: "Trauma: Luka Emosional yang Membekas",
                text: "Trauma adalah respons emosional terhadap peristiwa yang sangat menegangkan atau menyakitkan, yang dapat mempengaruhi kesejahteraan psikologis dalam jangka panjang."
            }
            // Tambahkan deskripsi lain jika kamu menambahkan emosi baru
        };
    
        $('.emotion-card').hover(function () {
            const emotion = $(this).data('emotion');
            const desc = descriptions[emotion];
    
            if (desc) {
                $('#emotion-title').text(desc.title);
                $('#emotion-text').text(desc.text);
                $('#emotion-description').stop(true, true).slideDown(300);
            }
        }, function () {
            $('#emotion-description').stop(true, true).slideUp(200);
        });
    });
    

    // Date and time picker
    $('.date').datetimepicker({
        format: 'L'
    });
    $('.time').datetimepicker({
        format: 'LT'
    });
    
    
    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


    // Price carousel
    $(".price-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        margin: 45,
        dots: false,
        loop: true,
        nav : true,
        navText : [
            '<i class="bi bi-arrow-left"></i>',
            '<i class="bi bi-arrow-right"></i>'
        ],
        responsive: {
            0:{
                items:1
            },
            992:{
                items:2
            },
            1200:{
                items:3
            }
        }
    });


    // Team carousel
    $(".team-carousel, .related-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        margin: 45,
        dots: false,
        loop: true,
        nav : true,
        navText : [
            '<i class="bi bi-arrow-left"></i>',
            '<i class="bi bi-arrow-right"></i>'
        ],
        responsive: {
            0:{
                items:1
            },
            992:{
                items:2
            }
        }
    });


    // Testimonials carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        items: 1,
        dots: true,
        loop: true,
    });
    
})(jQuery);

