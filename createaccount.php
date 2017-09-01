<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
   ob_start();
   session_start();
//   if(empty($_SESSION['username'])){
//       header('index.php');
//   }   
?>
<html lang = "en">
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="main.css">        
    </head>
    <body>         
        <script src="scripts/menu.js"></script>  
             
        <?php
        date_default_timezone_set('Etc/UTC');
        
        include "Encryptions.php";
        include "MyClassLibrary.php";
        include "db_ConnectionInfo.php";
        include 'PHPMailerAutoload.php';
            
        $send_email = false;
        $newaccount = new Login($host,$username,$password,$database,$port,$socket);
        
//echo $_POST['create'].': '.isset($_POST['create']),PHP_EOL;
//echo 'Congregation: '.$_POST['congregation'],PHP_EOL; 
//echo '<br>',PHP_EOL; 
//echo 'Firstname: '.$_POST['firstname'],PHP_EOL; 
//echo '<br>',PHP_EOL; 
//echo 'Lastname: '.$_POST['lastname'],PHP_EOL; 
//echo '<br>',PHP_EOL; 
//echo 'Address: '.$_POST['address'],PHP_EOL; 
//echo '<br>',PHP_EOL; 
//echo 'City: '.$_POST['city'],PHP_EOL; 
//echo '<br>',PHP_EOL; 
//echo 'State: '.$_POST['state'],PHP_EOL;
//echo '<br>',PHP_EOL; 
//echo 'Zipcode: '.$_POST['zipcode'],PHP_EOL;
//echo '<br>',PHP_EOL; 
//echo 'Email: '.$_POST['email'],PHP_EOL;
//echo '<br>',PHP_EOL; 
//echo 'Username: '.$_POST['username'],PHP_EOL;
//echo '<br>',PHP_EOL;
//echo 'Password: '.'password',PHP_EOL;
//echo '<br>',PHP_EOL;
//echo 'Congregation: '.$_POST['congregationID'],PHP_EOL;
//echo '<br>',PHP_EOL;
//echo 'Congregation Name: '.$_POST['congregationname'],PHP_EOL;
//echo '<br>',PHP_EOL;
//echo 'Language: '.$_POST['language'],PHP_EOL;
//echo '<br>',PHP_EOL;
//echo 'Address: '.$_POST['congregationaddress'],PHP_EOL;
//echo '<br>',PHP_EOL;
//echo 'Unit: '.$_POST['congregationunit'],PHP_EOL;
//echo '<br>',PHP_EOL;
//echo 'City: '.$_POST['congregationcity'],PHP_EOL;
//echo '<br>',PHP_EOL;
//echo 'State: '.$_POST['congregationstate'],PHP_EOL;
//echo '<br>',PHP_EOL;
//echo 'Zipcode: '.$_POST['congregationzipcode'],PHP_EOL;
//echo '<br>',PHP_EOL;
//echo 'FormattedAddress: '.$_POST['formattedaddress'],PHP_EOL;
//echo '<br>',PHP_EOL;
//echo 'Latitude: '.$_POST['latitude'],PHP_EOL;
//echo '<br>',PHP_EOL;
//echo 'Longitude: '.$_POST['longitude'],PHP_EOL;

            if (!empty($_POST['username']) && !empty($_POST['password'])) {
                
                    $firstname= $_POST['firstname'];
                    $lastname= $_POST['lastname'];
                    $middleinit = $_POST['middleinit'];
                    $suffixname = $_POST['suffix'];
                    $address = $_POST['address'];
                    $apartment = $_POST['apartment'];
                    $city = $_POST['city'];
                    $state = $_POST['state'];
                    $zipcode = $_POST['zipcode'];
                    $congregation = $_POST['congregation'];
                    $email = $_POST['email'];
                    $p_username= $_POST['username'];
                    $p_password=$_POST['password'];

                    $language=$_POST['language'];
                    $congregationnumber = $_POST['congregationID'];
                    $congregationname=$_POST['congregationname'];
                    $cPhoneNumber=$_POST['phone'];
                    $cunit=$_POST['congregationunit'];
                    $ccity =$_POST['congregationcity'];
                    $cstate=$_POST['congregationstate'];
                    $czip=$_POST['congregationzipcode'];
                    $formattedaddress=$_POST['formattedaddress'];
                    $latitude=$_POST['latitude'];
                    $longitude=$_POST['longitude'];
                    

                    
                    $encrypt=new Encryptions();        
                    $encrypt->EncryptPassword($p_password);
                    $epassword=$encrypt->Password();
                    $passwordkey=$encrypt->PasswordKey();

                    
                    //echo "<h1>instance successful</h1>";
//                    $newaccount->createaccount('John',
//                                'Doe',
//                                '',
//                                '',
//                                '4133 Redditt Rd.',
//                                '',
//                                'Orlando',
//                                'FL',
//                                '32822',
//                                '',
//                                'testdemo4!',
//                                'cecebrown2000@yahoo.com',
//                                'k700DF35XJ7tUUbt25mgZ6kkhi68mo76UZwt48bs6t77xn39akUk0tbt25mgNUNt9W43ND6UN69W45NDZ00U7W81PNNUU09W23NE70Zk9W43ND',
//                                'ZtU670Nk',
//                                '12345',
//                                'Demo',
//                                '',
//                                '',
//                                'Orlando',
//                                'FL',
//                                '32822',
//                                '4133 Redditt Rd, Orlando, FL 32822, USA',
//                                '28.4831620',
//                                '-81.2966469',
//                                '7FD97709-FD96-49DE-A6BB-23DDE04ED3B5');
                    $newaccount->createaccount($firstname, $lastname, $middleinit,$suffixname,$address, $apartment, $city, $state, $zipcode, $congregation, $p_username, $email, $epassword,$passwordkey,$congregationnumber,$congregationname,$cPhoneNumber,$cunit,$ccity,$cstate,$czip,$formattedaddress,$latitude,$longitude,$language);                                               
                    //echo "<h1>create account successful</h1>";
                    $confirmationnumber=$newaccount->confirmationnumber();
                    //echo "<h1>return confirmation successful</h1>";
                    $econfirmationnumber=$encrypt->EncryptConfirmation($confirmationnumber, $passwordkey);
                    //echo "<h1>encrypt confirmation successful</h1>";
                    $newaccount->emailconfirmation($econfirmationnumber);
                    //echo "<h1>email confirmation successful</h1>";

                    $name = $firstname.' '.$lastname;
                    
                    
                    $send_email = true;
               
            }              
              // SendEmailConfirmation.php?econfirmationnumber=ZUkZ9W23NEtUt69W27NIZtUU9W27NI6Uk09W23NE&toEmail=cecebrown2013@gmail.com&toName=JohnDoe
             if($send_email)  {
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
                    $mail->Subject = 'New account confirmation';
                    //Read an HTML message body from an external file, convert referenced images to embedded,
                    //convert HTML into a basic plain-text alternative body
                    //$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
                    $mail->msgHTML('<p>Hi '.$name.',</p><p>Thank you for creating account.<br>Click this link will confirm your account with Territory Manager: http://localhost/PhpDbProject/confirmationreceipt.php?confirm='.$econfirmationnumber.'</p><p>Thank you.</p>');
                    //Replace the plain text body with one created manually
                    $mail->AltBody = 'Hi '.$name.',\r\nThank you for creating account.\nClick this link will confirm your account with Territory Manager: http://localhost/PhpDbProject/confirmationreceipt.php?confirm='.$econfirmationnumber;
                    $mail->WordWrap = 50;
                    //Attach an image file
                    //$mail->addAttachment('images/phpmailer_mini.png');
                    //send the message, check for errors
                    if (!$mail->send()) {
                        echo "Mailer Error: " . $mail->ErrorInfo;
                    } else {
                        echo "<h1>Message sent to your inbox.</h1> <p>Please check your email to verifiy account!</p>";

//                        $emails=$newaccount->admin_emails();
//                        $accounts=$newaccount->activationlist();
//                        foreach($emails as $email){
//                           //Set who the message is to be sent to
//                           $mail->addAddress($email["Email"], $email["Name"]);
//                           //Set the subject line
//                           $mail->Subject = 'New account activation';
//                           //Read an HTML message body from an external file, convert referenced images to embedded,
//                           //convert HTML into a basic plain-text alternative body
//                           //$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
//                           $mail->msgHTML('<p>Hi '.$name.',</p><p>Thank you for creating account.<br>Click this link will confirm your account with Territory Manager: http://localhost/PhpDbProject/confirmationreceipt.php?confirm='.$econfirmationnumber.'</p><p>Thank you.</p>');
//                           //Replace the plain text body with one created manually
//                           $mail->AltBody = 'Hi '.$name.',\r\nThank you for creating account.\nClick this link will confirm your account with Territory Manager: http://localhost/PhpDbProject/confirmationreceipt.php?confirm='.$econfirmationnumber;
//                           $mail->WordWrap = 50;                     
//                           $mail->send();
//                        }
                    }
                    
                      //echo "<h1>close create account successful</h1>";
            }
            
            $newaccount->close();
         ?>
       
        
    </body>
</html>

