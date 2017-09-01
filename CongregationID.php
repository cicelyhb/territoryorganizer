<?php
header("Content-Type: application/json;charset=utf-8");
include("db_ConnectionInfo.php");



$zipcode = $_GET['zipcode'];

$conn=mysqli_connect($host,$username,$password,$database,$port,$socket);

$sql="call searchcongregations('$zipcode')";
$stmt = mysqli_query($conn,$sql);

if (!$stmt ) {
  die('Invalid query: '); 

} 

$data = array();
while( $row = mysqli_fetch_array( $stmt, MYSQLI_NUM))
{

        $data[] = array("CongregationID" => $row[0], "Congregation" => $row[1] );
        // will encode to JSON object 
    
}
mysqli_close($conn);
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

