$(function() {
    $("#singinup").on("click", function(){
        document.getElementById('mask').style.display='block';
    });

    $("#sub_login").on("click", function() {
        let email = $("#l_email").val();
        if (!validateEmailFormat(email)) {
            return;
        }

        let passwd = $("#l_passwd").val();
        if (!validatePasswdFormat(passwd)) {
            return;
        }

        let requestData = new Object();
        requestData.email = email;
        requestData.password = passwd;

        if ($('#l_remember').is(":checked")) {
            requestData.remember = 1;
        }

        $.post("ajax/account/signin/email", JSON.stringify(requestData), function (data) {
            obj = JSON.parse(data);
            if (obj.status==0) {
                location.reload();
            }
        }).fail(function(jqXHR, textStatus, errorThrown){
            if(jqXHR.status == 404) {
            };
        });
    });

    $("#sub_signup").on("click", function() {
        let name = $("#s_name").val();
        if (!name.trim()) {
            return;
        }

        let email = $("#s_email").val();
        if (!validateEmailFormat(email)) {
            return;
        }

        let passwd = $("#s_passwd").val();
        if (!validatePasswdFormat(passwd)) {
            return;
        }

        let passwd1 = $("#s_passwd1").val();
        if (!validatePasswdFormat(passwd1)) {
            return;
        }
        if (passwd!=passwd1) {
            return;
        }

        if (!$('#s_agree').is(":checked")) {
            return;
        }

        let requestData = new Object();
        requestData.name = name;
        requestData.email = email;
        requestData.passwd = passwd;
        requestData.passwd1 = passwd1;

        $.post("ajax/account/signup/email", JSON.stringify(requestData), function (data) {
            obj = JSON.parse(data);
            alert(data);
        }).fail(function(jqXHR, textStatus, errorThrown){
            if(jqXHR.status == 400) {
            };
        });
    });

    $("#sub_forget").on("click", function() {
        $.post("ajax/user/signin", $("#header_login_form").serialize(), function (data) {
            obj = JSON.parse(data);

            alert(obj.message);
            if (obj.status==0) {
                $('#header_login').modal('hide');

            }
        });
    });

    $("#logout").on("click", function() {
        $.post("ajax/account/signout", function (data) {
            obj = JSON.parse(data);
            if (obj.status==0) {
                location.reload();
            }
        });
    });

    $("#signin_a").on("click", function() {
        $("#signin_div").show();
        $("#signup_div").hide();
    });

    $("#signup_a").on("click", function() {
        $("#signin_div").hide();
        $("#signup_div").show();
    });

    $("#clost_btn").on("click", function() {
        $("#mask").hide();
    });

    $("#lang_us").on("click", function() {
        document.cookie = "locale=en-us;domain=.cairyme.com;path=/";
        location.reload();
    });

    $("#lang_cn").on("click", function() {
        document.cookie = "locale=zh-cn;domain=.cairyme.com;path=/";
        location.reload();
    });

    $("#lang_tw").on("click", function() {
        document.cookie = "locale=zh-tw;domain=.cairyme.com;path=/";
        location.reload();
    });
});

function validateEmailFormat(email) {
    return true;
}

function validatePasswdFormat(passwd) {
    return true;
}

function getParam(name) {
    return (location.search.split(name + '=')[1] || '').split('&')[0];
}

var modal = document.getElementById('mask');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}