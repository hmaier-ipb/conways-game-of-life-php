<?php
// alias for echoing to error_log
function erl($error){
    error_log(json_encode($error));
}

// alias for echoing to JAVASCRIPT
function ajaxResponse($response = []){
    echo json_encode($response);
}


if(isset($_POST["action"])) switch ($_POST["action"]){
    case "load-universe":
        $universe_array = $universe->createBlankUniverse();
        $cell_amount = $universe->createHtmlUniverse();
        ajaxResponse($universe_array);
        break;
    default:
        erl("Action is not recognized!");
        break;
}

