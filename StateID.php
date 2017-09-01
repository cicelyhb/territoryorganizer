<?php

header("Content-Type: application/json;charset=utf-8");

$json_string = 'states_hash.json';
$jsondata = file_get_contents($json_string);
//$obj = json_decode($jsondata,true);
$obj =  explode(",",str_replace(" ","",str_replace("\n","",str_replace("}","",str_replace("{","",$jsondata)))));

//$obj =  str_replace(" ","",str_replace("\n","",str_replace("}","",str_replace("{","",$jsondata))));
//echo $obj;
$data = array();

foreach ($obj as $row){
     $rowchanged = str_replace('"','',$row);
     $state = explode(":",$rowchanged);

     $data[] = array("StateID" => $state[0], "State" => $state[1]);
}

$json = json_encode( $data );

if ($json === false) {
    // Avoid echo of empty string (which is invalid JSON), and
    // JSONify the error message instead:
    $json = json_encode(array("jsonError", json_last_error_msg()));
    if ($json === false) {
        // This should not happen, but we go all the way now:
        $json = '{"jsonError": "unknown"}';
    }
    // Set HTTP response status code to: 500 - Internal Server Error
    http_response_code(500);
}


echo $json;
