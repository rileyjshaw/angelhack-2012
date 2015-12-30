<script>


function getData() {
    alert("good");
}

function set_priority(priority = '', value = '') {
    if(window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    }
    else { 
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.open('get', "ajax.php?function=set&var=" + value + "&priority=" + priority, true);
    xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readystate == 4) {
            alert(xmlhttp.responseText);
        }
    }
}

</script>