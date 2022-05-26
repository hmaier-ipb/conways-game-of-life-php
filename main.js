function $(id){return document.getElementById(id);}
function $$(class_name) {return document.getElementsByClassName(class_name);}
function cl(text){console.log(text)}

let ajaxObj;
let params;
let action;
let json_response;

let universe = $("universe")


function init(){
    action = "load-universe";
    send_info("action="+action);
}

//-----------------------------------------------------------------------
// instantiating Ajax and sourcing different page handlers
//-----------------------------------------------------------------------
function getAjaxObject() {
    //creating an ajax object
    if (window.ActiveXObject)
        return new ActiveXObject("Microsoft.XMLHTTP");
    else if (window.XMLHttpRequest)
        return new XMLHttpRequest();
    else {
        return null;
    }
}
function send_info(parameters) {
    //sending parameters (data) to url (index.php)
    ajaxObj = getAjaxObject();
    if (ajaxObj !== null) {
        ajaxObj.open("POST", "index.php", true);
        ajaxObj.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        ajaxObj.onreadystatechange = setOutput;
        ajaxObj.send(parameters);
    }
    else {
        console.log("Something went wrong when sending data to PHP...");
        return false;
    }
}

function setOutput() {
    //receiving output form php as json
    if (ajaxObj.readyState !== 4) {
        return;
    }
    if (ajaxObj.status !== 200) {
        return;
    }
    try {
        json_response = JSON.parse(ajaxObj.responseText);
    } catch (e) {
        console.log("Ungültige Daten. Kein JSON String!");
        console.log(ajaxObj.responseText);
        return false;
    }
    switch (action) {
        case "load-universe":
            universe.innerHTML = json_response[0];
            break;
        default:
            console.log("Site is not existent...");
            break;
    }
}

