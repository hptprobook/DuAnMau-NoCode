import Swiper from "swiper/bundle";
import "swiper/css/bundle";

$(document).ready(function () {
    $("#NAM").click( function() {
        $("#KHUVUCMIENNAM").css("display","block");
        
        if($("#KHUVUCMIENNAM").css("display","block"))
        $("#KHUVUCMIENBAC").css("display","none");
    });
    $("#BAC").click( function() {
        $("#KHUVUCMIENBAC").css("display","block");
        $("#KHUVUCMIENNAM").css("display","none");
    });
});
$(document).ready(function () {
    const showRoomSwiper1 = new Swiper(".showroom__swiper", {
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
});