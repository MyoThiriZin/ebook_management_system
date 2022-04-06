$(document).ready(function () {
    $('.top-slider').slick({
        dots: false,
        infinite: true,
        arrow: true,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1280,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: false,
                    arrow: true,
                    speed: 300
                }
            },
            {
                breakpoint: 767.9,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: false,
                    arrow: true,
                    speed: 300
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: false,
                    arrow: true,
                    speed: 300
                }
            }
        ]
    });

    $('.popular-ebook-slider').slick({
        dots: false,
        infinite: true,
        arrow: true,
        speed: 300,
        slidesToShow: 5,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1280,
                settings: {
                    slidesToShow: 5,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: false,
                    arrow: true,
                    speed: 300
                }
            },
            {
                breakpoint: 767.9,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: false,
                    arrow: true,
                    speed: 300
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: false,
                    arrow: true,
                    speed: 300
                }
            }
        ]
    });
});