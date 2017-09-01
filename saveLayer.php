<?php

ob_start();
session_start();

include("db_ConnectionInfo.php");

// Gets data from URL parameters
$congregationNumber = $_GET['congregationnumber'];
$territorynumber = $_GET['territorynumber'];
$layer = $_GET['layer'];
$layerjson = $_GET['layerjson'];
$latlng = $_GET['latlng'];
$compass = $_GET['compass'];
$propertyjson = $_GET['propertyjson'];
$initialdate= $_GET['initialdate'];
$user= $_GET['user'];
//echo 'alert("congregation: '.$CongregationNumber.'");';

//create object that will store query results
$data = array();

//Opens a connection to a MySQL
$conn = mysqli_connect($host,$username,$password,$database,$port,$socket);

if( mysqli_connect_errno() ) {
     echo "Connection could not be established.<br />";
     die( mysqli_connect_error());
}

//Build query
if ($layer == 'polygon'){
    $tsql = "call createEditPolygon('$congregationNumber','$territorynumber','$layerjson','$propertyjson','$initialdate','$user')";
}
if ($layer == 'rectangle'){
    $tsql = "call createEditBoundary('$congregationNumber','$territorynumber','$latlng','$layerjson','$propertyjson','$initialdate','$user')";
}
if ($layer == 'compass'){
    $tsql = "call createEditCompass('$congregationNumber','$territorynumber','$compass','$propertyjson','$initialdate','$user')";
}
if ($layer == 'properties'){
    $tsql = "call createEditProperties('$congregationNumber','$territorynumber','$propertyjson','$initialdate','$user')";
}

$result = mysqli_query($conn,$tsql);

if (!$result) {
  die('Invalid query: ' . mysqli_error($conn));         
}

while( $row = mysqli_fetch_array( $result, MYSQLI_NUM))
{
  $data[] = array("Error" => $row[0], "Message" => $row[1]);
}

//close connections
$conn->next_result(); 
mysqli_stmt_free_result($result);
mysqli_close($conn);


//create and send json object that stores results
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


