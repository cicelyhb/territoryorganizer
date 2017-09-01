<?php

ob_start();
session_start();
date_default_timezone_set('Etc/UTC');
include("db_ConnectionInfo.php");
include 'PHPMailerAutoload.php';

// Gets data from URL parameters
$name = $_GET['name'];
$username_ = $_GET['username'];
$email = $_GET['email'];
$roletype = $_GET['roletype'];

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
$tsql = "call activateaccount('$username_','$roletype')";


$result = mysqli_query($conn,$tsql);

if (!$result) {
  die('Invalid query: ' . mysqli_error($conn));         
}

while( $row = mysqli_fetch_array( $result, MYSQLI_NUM))
{
  $data[] = array("Error" => $row[0],"Message" => $row[1]);
}

//close connections
$conn->next_result(); 
mysqli_stmt_free_result($result);
mysqli_close($conn);

//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';
//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;
//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "cecebrown2013@gmail.com";
//Password to use for SMTP authentication
$mail->Password = "luv2work";
//Set who the message is to be sent from
$mail->setFrom('cecebrown2013@gmail.com', 'Cicely Brown');
//Set an alternative reply-to address
$mail->addReplyTo('cecebrown2013@gmail.com', 'Cicely Brown');
//Set who the message is to be sent to
$mail->addAddress($email, $name);
//Set the subject line
$mail->Subject = 'Congragulations!';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
$mail->msgHTML('<p>Hi '.$name.',</p><p>Your account has been activated.<br>You can now login to your account.</p><p>Thank you.</p>');
//Replace the plain text body with one created manually
$mail->AltBody = 'Hi '.$name.',\r\nYour account has been activated.\nYou can now login to your account.\nThank you.';
$mail->WordWrap = 50;
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');
//send the message, check for errors
if($mail->send()){}



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




