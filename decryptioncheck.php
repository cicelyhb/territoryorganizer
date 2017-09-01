<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
   ob_start();
   session_start();
?>
<html lang = "en">
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="main.css">        
    </head>
    <body> 
    
<!--      <h2>Enter Username and Password</h2> -->
<!--     <h2>Access your account</h2>-->
      <div class = "container form-signin">        
        <?php
        include("Encryptions.php");
            
            
            if (isset($_POST['create']) && !empty($_POST['password']) && !empty($_POST['passwordkey'])) {
	       $password=$_POST['password'];
               $passwordkey=$_POST['passwordkey'];

               $decrypt=new Decryptions();
               $decrypt->DecryptPassword($password, $passwordkey);
               

                  $msg_01 = 'Encrypted password: '.$password;
                  $msg_11 = 'Password Key: '.$passwordkey;
                  $msg_02 = 'Decrypted password: '.$decrypt->Password();
                  $msg_12 = 'Password Key: '.$decrypt->PasswordKey();
             
            }
         ?>
      </div> <!-- /container -->
         <div class = "container">
      
         <form class = "form-signin" role = "form" 
            action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); 
            ?>" method = "post">

             <table>
                 <tr>
                 <th<h2>Enter password</h2></th>
                 </tr>
                 <tr>
                 <h1>
                     <?php 
                     echo $msg_01;   
                     ?>
                 </h1>
                </tr>
                 <tr>
                 <h1>
                     <?php 
                     echo $msg_11;   
                     ?>
                 </h1>
                </tr>                
                 <tr>
                 <h1>
                     <?php  
                     echo $msg_02; 
                     ?>
                 </h1>
                </tr>  
                 <tr>
                 <h1>
                     <?php  
                     echo $msg_12; 
                     ?>
                 </h1>
                </tr>                 
                <tr><td>
                    <input type = "text" class = "form-control"
                           name = "password" placeholder = "password" required></br>
                    <input type = "text" class = "form-control"
                           name = "passwordkey" placeholder = "passwordkey" required></br>                    
                </td></tr>
                <tr><td align="left">
                    <input type = "submit" name = "create" value = "Create">
                    
                </td></tr>
             </table>
         </form>
			
<!--         Click here to clean <a href = "logout.php" tite = "Logout">Session.-->
         
      </div>
     
    </body>
</html>



