/**
 * Created by skogs on 19.03.2015.
 */
$(document).ready(function(){
    $('.menu-trigger').click(function(){
        $('.nav').slideToggle(400,function(){
            $(this).toggleClass('nav-expanded').css('display','');
        });
    });

    /*$('#login-dropdown-button').click(function() {
        $('#content-login').slideToggle(400,function(){
           $(this).toggleClass('login-expended').css('display','');
        });
    });*/
});

$(window).scroll(function() {
    if ($(window).scrollTop() > $('#header').height() + 20) {
        $('.right-col').addClass('right-col-stuck');
    } else {
        $('.right-col').removeClass('right-col-stuck');
    }

});

$(function() {
    var button = $('#login-dropdown-button');
    var box = $('#content-login');
    var form = $('#loginForm');

    button.click(function() {
        box.slideToggle();
        button.toggleClass('button-active');
    });
    $(this).mouseup(function(e){
        if (!button.is(e.target)
            && !box.is(e.target) // if the target of the click isn't the container...
            && box.has(e.target).length === 0) // ... nor a descendant of the container
        {
            button.toggleClass('button-active');
            box.hide();
        }
    });
    /*box.mouseup(function() {
        return false;
    });
    $(this).mouseup(function() {
        if(!($(box.target).parent('#loginButton').length > 0)) {
            button.removeClass('active');
            box.hide();
        }
    });*/
});



function GetContent(content)
{
    var xmlhttp=new XMLHttpRequest();

    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("section").innerHTML = xmlhttp.responseText;
            window.history.pushState("object or string", "Title", content);
        }
    };
    xmlhttp.open("POST", content, true);
    xmlhttp.send();
}
