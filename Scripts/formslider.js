$(document).ready(function () {
    /*$("form").submit(function (e) {
        e.preventDefault();
    });*/

    var login = $("#content-login-page");
    var reg = $("#content-reg");

    /* display the register page */
    $("#showReg").on("click", function (e) {
        e.preventDefault();
        var newheight = reg.height();

        $(reg).animate({
            height:'toggle'
        });
        $(login).animate({
            height:'toggle'
        });

        $.data(this, "realHeight", $(this).height());

        $("#section").animate({
            "height": newheight + 42 + "px"
        }, 550, function() {});
    });

    /* display the login page */
    $("#showLogin").on("click", function(e) {
        e.preventDefault();
        var newheight = login.height();

        $(reg).animate({
            height:'toggle'
        });
        $(login).animate({
            height:'toggle'
        });
        $("#section").animate({
            "height": newheight + "px"
        }, 550, function() {});
    });
});