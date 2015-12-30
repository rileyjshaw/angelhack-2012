


function getData() {
    set_value('city', document.getElementById('place').value);
}

function set_value(arg = '', value = '', type='') {
    xmlhttp = null;
    if(window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    }
    else { 
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.open('GET', "ajax.php?function=set&arg=" + arg + "&value=" + value, false);
    xmlhttp.send();
    xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState == 4) {
            alert(xmlhttp.responseText);
        }
    }
}

