


function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");

    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");



    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" text-primary active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " text-primary active";
}



function TabJob(evt, tabname) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tab-content tab-pane");

    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks-job");



    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" text-primary active", "");
    }
    document.getElementById(tabname).style.display = "block";
    evt.currentTarget.className += " text-primary active";
}








