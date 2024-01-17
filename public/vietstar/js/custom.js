


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


function showModal_Success(title, message, targetUrl) {
    console.log(123123);
    // Set the title
    $('#customModal-success #customModalLabel').text(title);

    // Set the message
    $('#customModal-success .modal-body p').text(message);

    // Set the target URL
    $('#customModal-success #modalLink').attr('href', targetUrl);

    // Show the modal
    $('#customModal-success').modal('show');
}


function showModal_Fail(title, message, targetUrl) {
    // Set the title
    $('#customModal-fail #customModalLabel').text(title);

    // Set the message
    $('#customModal-fail .modal-body p').text(message);

    // Set the target URL
    $('#customModal-fail #modalLink').attr('href', targetUrl);

    // Show the modal
    $('#customModal-fail').modal('show');
}


function showSpinner() {
    document.getElementById('spinner-wrapper').style.display = 'flex';
}


function hideSpinner() {
    document.getElementById('spinner-wrapper').style.display = 'none';
}







