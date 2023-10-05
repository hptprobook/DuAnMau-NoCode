$(document).ready(function () {
    $(".cart__orderBtn").click(function (e) {
        e.preventDefault();
        $(".addressContainer").addClass("active");
        $(".cartContainer").removeClass("active");
    });
});
