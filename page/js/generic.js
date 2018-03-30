$(function() {
    $("#package_btn").on("click", function(){
        $("#package_div").css({"border-color": '#ffca59'});
        document.getElementById('travelling_btn').style.backgroundColor="";
        document.getElementById('package_btn').style.backgroundColor="#ffca59";
        document.getElementById('oval_top').style.backgroundColor="#ffca59";
        $("#f_select").val("package");

        $(".elem_t").hide();
        $(".elem_p").show();
    });
    $("#travelling_btn").on("click", function(){
        $("#package_div").css({"border-color": '#11859e'});
        document.getElementById('package_btn').style.backgroundColor="";
        document.getElementById('travelling_btn').style.backgroundColor="#11859e";
        document.getElementById('oval_top').style.backgroundColor="#11859e";
        $("#f_select").val("trip");

        $(".elem_p").hide();
        $(".elem_t").show();
    });
    $("#p_search_f").submit( function(){
        let selection = $("#f_select").val();
        let depart = $("#depart_value").val();
        let arrive = $("#arrive_value").val();
        let date = $("#package_date").val();

        let valid = depart && arrive && date;

        if (!valid) {
            event.preventDefault();
        } else {
            $("#p_search_f").attr("action", "/search");
        }
    });

    $(".depart_li").on("click", function() {
        $("#depart").hide();
        $("#depart_input").text($(this).text());
        $("#depart_input").css('color', 'black');
        $("#depart_value").val($(this).attr('id'));
    });
    $(".arrive_li").on("click", function() {
        $("#arrive").hide();
        $("#arrive_input").text($(this).text());
        $("#arrive_input").css('color', 'black');
        $("#arrive_value").val($(this).attr('id'));
    });

    $("#depart_input").on("click", function(){
        $("#depart").show();
        $("#arrive").hide();
        event.stopPropagation();
    });
    $("#arrive_input").on("click", function(){
        $("#depart").hide();
        $("#arrive").show();
        event.stopPropagation();
    });
    $("#depart").on("click", function() {event.stopPropagation();});
    $("#arrive").on("click", function() {event.stopPropagation();});
    $("body").click(function() {
        $("#depart").hide();
        $("#arrive").hide();
    });

    $( "#package_date" ).datepicker({ dateFormat: 'yy-mm-dd' });
});