<?php

ob_start();
session_start();

include("db_ConnectionInfo.php");

// Gets data from URL parameters
$congregationnumber = $_GET['congregationnumber'];
$territorynumber = $_GET['territorynumber'];
$addressguid = $_GET['addressguid'];
$placeid = $_GET['placeid'];
$latitude = $_GET['latitude'];
$longitude = $_GET['longitude']; 
$formattedAddress = $_GET['formattedAddress'];
$formattedxyAddress = $_GET['formattedxyAddress']; 
$street = $_GET['street'];
$streetsuffix = $_GET['streetsuffix'];
$bmulti = $_GET['bmulti'];
$bunit = $_GET['bunit'];
$bphone = $_GET['bphone'];
$resident = $_GET['resident'];
$phone = $_GET['phone'];
$building = $_GET['building'];
$unit = $_GET['unit'];
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

    $tsql = "call updateterritoryaddress('$congregationnumber',
                                      '$territorynumber',
                                      '$addressguid',    
                                      '$placeid',
                                      '$latitude',
                                      '$longitude', 
                                      '$formattedAddress',
                                      '$formattedxyAddress',
                                      '$street',
                                      '$streetsuffix',
                                      '$bmulti',
                                      '$bunit',    
                                      '$bphone',
                                      '$resident',
                                      '$phone',
                                      '$building',
                                      '$unit')";


$result = mysqli_query($conn,$tsql);

if (!$result) {
  die('Invalid query: ' . mysqli_error($conn));         
}

while( $row = mysqli_fetch_array( $result, MYSQLI_NUM))
{
  $data[] = array("Error" => $row[0], "Message" => $row[1], "GUID" => $row[2]);
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



