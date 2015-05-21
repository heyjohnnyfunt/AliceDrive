/**
 * Created by skogs on 19.03.2015.
 */
$(document).ready(function(){
    $('.menu-trigger').click(function(){
        $('.nav').slideToggle(400,function(){
            $(this).toggleClass('nav-expanded').css('display','');
        });
    });

    $('.button').click(function() {
        $('.loginForm').slideToggle(400,function(){
           $(this).toggleClass('login-expended').css('display','');
        });
    });
});

$(window).scroll(function() {
    if ($(window).scrollTop() > $('#header').height() + 20) {
        $('.right-col').addClass('right-col-stuck');
    } else {
        $('.right-col').removeClass('right-col-stuck');
    }

});