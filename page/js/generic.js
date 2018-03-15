$(function() {
    $("#package_btn").on("click", function(){
        document.getElementById('travelling_div').style.display='none';
        document.getElementById('package_div').style.display='block';
        document.getElementById('travelling_btn').style.backgroundColor="";
        document.getElementById('package_btn').style.backgroundColor="#ffca59";
        document.getElementById('oval_top').style.backgroundColor="#ffca59";
    });
    $("#travelling_btn").on("click", function(){
        document.getElementById('travelling_div').style.display='block';
        document.getElementById('package_div').style.display='none';
        document.getElementById('package_btn').style.backgroundColor="";
        document.getElementById('travelling_btn').style.backgroundColor="#11859e";
        document.getElementById('oval_top').style.backgroundColor="#11859e";
    });
    $("#p_search_f").submit( function(){
        event.preventDefault();
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

    $( "#package_date" ).datepicker();
});
