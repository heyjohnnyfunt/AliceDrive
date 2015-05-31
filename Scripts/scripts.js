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
        box.css('position', 'absolute');
        box.slideToggle();
        button.addClass('button-active');
    });
    $(this).mouseup(function (e) {
        if (!button.is(e.target)
            && !box.is(e.target)
            && box.has(e.target).length === 0) {
            button.removeClass('button-active');
            box.hide();
        }
    });
});


function CheckRegForm(form) {
    if (form.username.value == "") {
        alert("Error: Username cannot be blank!");
        form.username.focus();
        return false;
    }
    //form.email.value.indexOf('@') == -1
    var validChars = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    if(!validChars.test(form.email.value) || form.email.value == "") {
        alert('Error: мыло то забыл написать!');
        form.email.focus();
        return false;
    }

    validChars = /^\w+$/;
    if (!validChars.test(form.username.value)) {
        alert("Error: Username must contain only letters, numbers and underscores!");
        form.username.focus();
        return false;
    }

    if(form.password.value == ""){
        alert("Error: пароль не может быть пустым. Это же пароль!");
        form.password.focus();
        return false;
    }
    if (form.password.value == form.confPassword.value) {
        if (form.password.value == form.username.value) {
            alert("Error: Password must be different from Username!");
            form.password.focus();
            return false;
        }
        validChars = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;///[0-9]/;
        /*if(form.password.value.length < 6) {
         alert("Error: Password must contain at least six characters!");
         form.password.focus();
         return false;
         }
         validChars = /[a-z]/;
         if(!validChars.test(form.password.value)) {
         alert("Error: password must contain at least one lowercase letter (a-z)!");
         form.password.focus();
         return false;
         }
         validChars = /[A-Z]/;
         if(!validChars.test(form.password.value)) {
         alert("Error: password must contain at least one uppercase letter (A-Z)!");
         form.password.focus();
         return false;
         }*/
        if (!validChars.test(form.password.value)) {
            alert("Error: password must contain at least:\n one number (0-9);\n one lowercase letter (a-z);\n" +
            " one uppercase letter (A-Z)!");
            form.password.focus();
            return false;
        }
    } else {
        alert("Error: проверьте подтверждение пароля!");
        form.confPassword.focus();
        return false;
    }


    // Create a new element input, this will be our hashed password field.
    var p = document.createElement("input");

    // Add the new element to our form.
    form.appendChild(p);
    p.name = "p";
    p.type = "hidden";
    p.value = hex_sha512(form.password.value);

    // Make sure the plaintext password doesn't get sent.
    form.password.value = "";
    form.confPassword.value = "";

    // Finally submit the form.
    form.submit();

    return true;
}

//Hash password to send to server
function formhash(form)
{
    // Create a new element input, this will be our hashed password field.
    var p = document.createElement("input");

    // Add the new element to our form.
    form.appendChild(p);
    p.name = "p";
    p.type = "hidden";
    p.value = hex_sha512(form.password.value);

    // Make sure the plaintext password doesn't get sent.
    form.password.value = "";

    // Finally submit the form.
    form.submit();

    return true;
}

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
