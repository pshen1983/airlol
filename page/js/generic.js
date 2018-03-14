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
});

function ovalSelect(evt, elementName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("oval_content");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("oval_option");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" oval_select", "");
    }
    document.getElementById(elementName).style.display = "block";
    evt.currentTarget.className += " oval_select";
}