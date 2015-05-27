/**
 * Created by skogs on 19.03.2015.
 */
$(document).ready(function () {
    $('.menu-trigger').click(function () {
        $('.nav').slideToggle(400, function () {
            $(this).toggleClass('nav-expanded').css('display', '');
        });
    });

});

$(window).scroll(function () {
    if ($(window).scrollTop() > $('#header').height() + 20) {
        $('.right-col').addClass('right-col-stuck');
    } else {
        $('.right-col').removeClass('right-col-stuck');
    }

});

$(function () {
    var button = $('#login-dropdown-button');
    var box = $('#content-login');

    button.click(function () {
        box.css('position','absolute');
        box.slideToggle();
        button.addClass('button-active');
    });
    $(this).mouseup(function (e) {
        if (!button.is(e.target)
            && !box.is(e.target)
            && box.has(e.target).length === 0)
        {
            button.removeClass('button-active');
            box.hide();
        }
    });
});

/* AJAX page fetching */
function GetContent(content) {
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("section").innerHTML = xmlhttp.responseText;
            window.history.pushState("object or string", "Title", content);
        }
    };
    xmlhttp.open("POST", content, true);
    xmlhttp.send();
}
