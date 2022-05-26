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
        $universe_array = createBlankUniverseHtml(7,5);
        ajaxResponse($universe_array);
        break;
    default:
        erl("Action is not recognized!");
        break;
}

// creates a two-dimensional array
function createBlankUniverseHtml($width, $height){
    $universe = [];
    for($i = 0; $i < $height; $i++){
        $universe[] = [];
        for($x = 0; $x < $width; $x++){
           $universe[$i][] = 0;
        }
    }
    return $universe;
}

function checkCellState($x,$y){
    $alive = 0;


}

