$(document).ready(function () {
    $(".navbar--category").click(function () {
        $(".category-fixed").toggleClass("active");
    });

    $(".category-fixed").click(function () {
        $(".category-fixed").removeClass("active");
    });

    $(".cart__list--quantity .plus").on("click", function () {
        console.log("hihi");
        var currentValue = parseInt(
            $(this).siblings(".cart__list--quantity .quantity").val()
        );

        $(this)
            .siblings(".cart__list--quantity .quantity")
            .val(currentValue + 1);
    });

    $(".cart__list--quantity .subtract").on("click", function () {
        var currentValue = parseInt(
            $(this).siblings(".cart__list--quantity .quantity").val()
        );

        if (currentValue > 1) {
            $(this)
                .siblings(".cart__list--quantity .quantity")
                .val(currentValue - 1);
        }
    });
});
