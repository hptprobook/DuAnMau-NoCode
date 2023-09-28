import Swiper from "swiper/bundle";
import "swiper/css/bundle";

window.onload = function () {
    const swiper1 = new Swiper(".home__swiper", {
        loop: true,
        spaceBetween: 30,
        centeredSlides: true,
        autoplay: {
            delay: 4000,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });

    const swiper2 = new Swiper(".home__pc--productSwiper", {
        loop: true,
        slidesPerView: 5,
        spaceBetween: 10,
        centeredSlides: true,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });

    var productSliderThumb = new Swiper(".detail__slider--thumb", {
        loop: true,
        spaceBetween: 10,
        slidesPerView: 5,
        freeMode: true,
        watchSlidesProgress: true,
    });

    var productSliderMain = new Swiper(".detail__slider--main", {
        loop: true,
        spaceBetween: 10,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        thumbs: {
            swiper: productSliderThumb,
        },
    });
};
