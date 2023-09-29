$(document).ready(function () {
    $("#NAM").click( function() {
        $("#KHUVUCMIENNAM").css("display","block");
        $("#KHUVUCMIENBAC").css("display","none");
    });
    $("#BAC").click( function() {
        $("#KHUVUCMIENBAC").css("display","block");
        $("#KHUVUCMIENNAM").css("display","none");
    });
});
