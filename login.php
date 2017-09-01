
      <div class = "container form-signin">        
        <?php
        
        include "Encryptions.php";
        include "MyClassLibrary.php";
        include "db_ConnectionInfo.php";
        
            $error = '';
      if($_SERVER["REQUEST_METHOD"] == "POST") {
          // username and password sent from form             
//            if (isset($_POST['login']) && !empty($_POST['username']) 
//               && !empty($_POST['password'])) {
				
//               if ($_POST['username'] == 'testuser1' && 
//                  $_POST['password'] == 'Psalm83:18') {
//                  $_SESSION['valid'] = true;
//                  $_SESSION['timeout'] = time();
//                  $_SESSION['username'] = 'testuser1';
          
          $myusername = $_POST['username'];
          $mypassword = $_POST['password'];
          
          $myLogin = new Login($host,$username,$password,$database,$port,$socket);
          
          $myLogin->login_username($myusername);
          
          if ($myLogin->IsUser()){
              $decrypt = new Decryptions();
              $decrypt->DecryptPassword($myLogin->password(), $myLogin->passwordkey());
              
              if ($decrypt->Password()== $mypassword){
                  $myLogin->login_successful();
                  
                  $_SESSION['valid'] = true;
                  $_SESSION['timeout'] = time();
                  $_SESSION['username'] = strtolower ($myusername); 
                  $_SESSION['congregationnumber'] = $myLogin->congregation();
                  $_SESSION['role'] = $myLogin->role();
                  
                  header("location: welcome.php");
                  
              }else{
                  $error = "Your password is invalid";
              }
              
          } else{
                  $error = "Your username is invalid";
          }
                  

          }
         ?>
      </div> <!-- /container -->
         <div class = "container">
         <script src="scripts/menu.js"></script>
         <form class = "form-signin" role = "form" 
            action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); 
            ?>" method = "post">
             
             <table>

                 <th>
                         <h1><font color ="#818181">Sign in</font></h1>
                  </th>
             </table>
             <table>
<!--                 <tr><td><font color="white">Username</font><td></tr>-->
                 <tr><td><font color ="#818181">Username</font><td></tr>                 
                 <tr><td><input type = "text"  name = "username" style="width: 300px;" required autofocus></td></tr>
                
<!--                 <tr><td><font color="white">Password</font><td></tr>-->
                 <tr><td><font color ="#818181">Password</font><td></tr>                 
                 <tr><td><input type = "password" name = "password" style="width: 300px;" required></td></tr>                       

                <tr>
                    <td align="left">
                    <input type = "submit" name = "login" value = "Login" style="width: 300px;padding: 8px 32px;">
                    </td>                
                </tr>
                <tr><td align="left">
                        <p class="menu"><?php echo $error ?></p>
                </td></tr>             
             </table>
         </form>
			

         
      </div>
     
