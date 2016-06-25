$(function() {

    $("#header_signin").on("click", function() {
        $.post(
            "ajax/user/signin", 
            $("#header_login_form").serialize(),
            function (data) {
                obj = JSON.parse(data);

                alert(obj.message);
                if (obj.status==0) {
                    $('#header_login').modal('hide');

                }
            }
        );
    });

    $(".msg_send_btn").on("click", function() {
        $.post(
            "ajax/message",
            $($(this)[0].form).serialize(),
            function (data) {
                obj = JSON.parse(data);

                alert(obj.message);
                if (obj.status==0) {
                    // load the message in section

                }
            }
        );
    });

    $("#lang_us").on("click", function() {
        document.cookie = "locale=en-us;domain=.airlol.com;path=/";
        location.reload();
    });

    $("#lang_cn").on("click", function() {
        document.cookie = "locale=zh-cn;domain=.airlol.com;path=/";
        location.reload();
    });

    $("#lang_tw").on("click", function() {
        document.cookie = "locale=zh-tw;domain=.airlol.com;path=/";
        location.reload();
    });
});