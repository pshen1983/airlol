$("#trip_next").on("click", function() {
    $.post(
        "ajax/trip", 
        $($(this)[0].form).serialize(),
        function (data) {
            obj = JSON.parse(data);

            alert(obj.message);
            if (obj.status==0) {

            }
        }
    );
});