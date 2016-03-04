$(function() {

    $("#header_signin").on("click", function() {
        $.post(
            "ajax/user/signin", 
            $("#header_login_form").serialize(),
            function( data ) {
                obj = JSON.parse(data);

                alert(obj.message);
                if (obj.status==0) {
                    $('#header_login').modal('hide');

                }
            });
    });

});