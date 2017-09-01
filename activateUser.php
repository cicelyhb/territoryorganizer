<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
   ob_start();
   session_start();
   if(empty($_SESSION['username']) || empty($_SESSION['congregationnumber']) || empty($_SESSION['role']) || $_SESSION['role'] == 'POW' || $_SESSION['role'] == 'VW'){
       header('Location:index.php');
   } 
   
    if(auto_logout("timeout"))
    {
        session_unset();
        session_destroy();
        header('Location:index.php');          
        exit;
    }
    
    function auto_logout($field)
    {
        $t = time();
        $t0 = $_SESSION[$field];
        $diff = $t - $t0;
        if ($diff > 1500 || !isset($t0))
        {          
            return true;
        }
        else
        {
            $_SESSION[$field] = time();
        }
    }    
?>
<html lang = "en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Activate</title>
        <link rel="stylesheet" type="text/css" href="myStyle.css">   
        <style>
            .menuleft{

               width:5%; 

            }            
            .menucenter{

               width:80%; 
               font-size: 20px;

            }
            .menuright{

               width:5%; 

            }    
            @media only screen and (max-width: 763px) {
            .menuleft{

               width:5%; 

            }
            .menucenter{

               width:85%; 
               font-size: 20px;

            }  
            .menuright{

               width:5%; 
               font-size: 8px;

            }                
            }            
        </style>        
    </head>
    <link rel="shortcut icon" href="icons/TO_smalllogo.png" type="image/png" />    
    <body>
        <div id="banner" class="top">
        <script src="scripts/menu.js"></script>       
            <?php 
               $congregationnumber = $_SESSION['congregationnumber'];
               echo '<table class="menutable">',PHP_EOL;
               echo '<tr>',PHP_EOL;
               echo '<td align="position" class="menuleft">',PHP_EOL;    
               echo '<div id="mobilemenu" style="display:none;">',PHP_EOL;
               echo '<button id="mobilemenudisplay" class="dropbtn"><a href="#" class="gradient-menu"></a></button>',PHP_EOL;
               echo '</div>',PHP_EOL;
               echo '<div id="desktopmenu" style="display:block;">',PHP_EOL;  
               echo '<button id="desktopmenudisplay" class="dropbtn">Information</button>',PHP_EOL;                       
               echo '</div>',PHP_EOL;  
               echo '</td>',PHP_EOL;                  
             
               echo '<td id="myname" align="center" class="menucenter"><a href = "welcome.php" class="menutitle">Territory Organizer</a></td>',PHP_EOL;
//               echo '<td align="right" class="menuright">',PHP_EOL; 
               echo '<td align="right" class="menuright">',PHP_EOL; 
               echo '<div class="tooltip"><img src="icons/myprofile2.png"><span class="tooltiptext">My Profile</span></div>',PHP_EOL;                  
               echo '</td>',PHP_EOL;                   
               echo '<td class="menuright">',PHP_EOL;  
              // echo '<form name="_xclick" action="https://www.paypal.com/fk/cgi-bin/webscr" method="post">',PHP_EOL; 
//               echo '<form name="" method="post">',PHP_EOL;                
//               echo '<input type="hidden" name="cmd" value="_xclick">',PHP_EOL;  
//               echo '<input type="hidden" name="business" value="me@mybiz.com">',PHP_EOL;  
//               echo '<input type="hidden" name="item_name" value="Team In Training">',PHP_EOL;  
//               echo '<input type="hidden" name="currency_code" value="USD">',PHP_EOL;  
//               echo '<input type="hidden" name="amount" value="2.50">',PHP_EOL;  
//               echo '<input type="image" src="http://www.paypal.com/en_US/i/btn/x-click-butcc-donate.gif" border="0" name="submit" alt="Make payments with PayPal - it'.$sngquote.'s fast, free and secure!">',PHP_EOL;  
//               echo '</form>',PHP_EOL;
               echo '<button id="donatefunds" class="donate" onclick="location.href='.$sngquote.'donation.php'.$sngquote.';">Donate</button>',PHP_EOL; 
               echo '</td>',PHP_EOL;               
              // echo '<td align="right" class="menuright"><a href = "logout.php" class="button">Sign Out</a></td>',PHP_EOL;
               echo '<td align="right" class="menuright">',PHP_EOL; 
               echo '<div id="signout"><input type="button" value="Sign Out" onclick="location.href='.$sngquote.'logout.php'.$sngquote.';"></div>',PHP_EOL;                
               echo '</td>',PHP_EOL;             
               echo '</tr>',PHP_EOL;
               echo '</table>',PHP_EOL;
            ?>
        </div> 
        
        <div id="mobilemenucontrol" class="sideleftnav">
        <script src="scripts/menu.js"></script> 
<!--        <a href="#" class="closebtn" >&times;</a>-->
        <?php
        echo '<table>',PHP_EOL;        
        if($_SESSION['role'] == 'ADM' ){
        echo '<tr><td><a href = "createterritory.php" class="button" style="width: 90%;color: white;font-size: 12px;">Create Territory</a></td></tr>',PHP_EOL;        
        echo '<tr><td><a href = "activateUser.php" class="button" style="width: 90%;color: white;font-size: 12px;">Activate Users</a></td></tr>',PHP_EOL;  
        echo '<tr><td><a href = "#" class="button" style="width: 90%;color: white;font-size: 12px;">Change User Role</a></td></tr>',PHP_EOL;        
        echo '<tr><td><a href = "assignTerritory.php" class="button" style="width: 90%;color: white;font-size: 12px;">Manage Checkouts</a></td></tr>',PHP_EOL;    
        echo '<tr><td><a href = "#" class="button" style="width: 90%;color: white;font-size: 12px;">Reports</a></td></tr>',PHP_EOL; 
        echo '<tr><td><a href = "#" class="button" style="width: 90%;color: white;font-size: 12px;">Dashboards</a></td></tr>',PHP_EOL;         
        }   
        echo '<tr><td><a href = "#" class="button" style="width: 90%;color: white;font-size: 12px;">Profile</a></td></tr>',PHP_EOL;        
        echo '<tr><td><a href = "#" class="button" style="width: 90%;color: white;font-size: 12px;">Contact Us</a></td></tr>',PHP_EOL;        
        echo '</table>',PHP_EOL;  
        ?>   
        </div>         
        
        
        <div id="menucontrol" class="sideleftnav">
        <script src="scripts/menu.js"></script> 
        <?php
        echo '<table>',PHP_EOL;         
        if($_SESSION['role'] == 'ADM' ){
        echo '<tr><td><a href = "createterritory.php" class="button" style="width: 90%;color: white;font-size: 12px;">Create Territory</a></td></tr>',PHP_EOL;        
        echo '<tr><td><a href = "activateUser.php" class="button" style="width: 90%;color: white;font-size: 12px;">Activate Users</a></td></tr>',PHP_EOL;  
        echo '<tr><td><a href = "#" class="button" style="width: 90%;color: white;font-size: 12px;">Change User Role</a></td></tr>',PHP_EOL;        
        echo '<tr><td><a href = "assignTerritory.php" class="button" style="width: 90%;color: white;font-size: 12px;">Manage Checkouts</a></td></tr>',PHP_EOL;    
        echo '<tr><td><a href = "#" class="button" style="width: 90%;color: white;font-size: 12px;">Reports</a></td></tr>',PHP_EOL; 
        echo '<tr><td><a href = "#" class="button" style="width: 90%;color: white;font-size: 12px;">Dashboards</a></td></tr>',PHP_EOL;         
        }     
        echo '<tr><td><a href = "#" class="button" style="width: 90%;color: white;font-size: 12px;">Profile</a></td></tr>',PHP_EOL;         
        echo '<tr><td><a href = "#" class="button" style="width: 90%;color: white;font-size: 12px;">Contact Us</a></td></tr>',PHP_EOL;        
        echo '</table>',PHP_EOL;  
        ?>   
        </div>            
        
        <div id="main1" class="staticmain">
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1Fdvd0EPg3knllyj9gBhZ8tFoxuWQOTU" type="text/javascript"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>            
        <script src="scripts/myscripts.js"></script>
                    <center>
                        <h1>Activate Users</h1>
                        <div id="showActivation"></div>
                        <div id="rowcount" style="display:none;"></div>                        
                        <table><tr><td><input id="submitUser" type="button" value="Submit"  style="padding: 8px 32px;"></td></tr></table>
                    </center>
        <script type="text/javascript">  
        <?php 
            echo 'var congregationNumber = "'.$congregationnumber.'";';
        ?>            
        var rowcount = 0;
        showActivate();
        function showActivate(){
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                     var userObj = JSON.parse(this.responseText);            
                        var html = '<br><table><thead><tr>' + 
                                               '<th bgcolor="#0B1F81"><font color="white">Name</font></th>' +
                                               '<th bgcolor="#0B1F81"><font color="white">Username</font></th>' +
                                               '<th bgcolor="#0B1F81"><font color="white">Email</font></th>' +                                   
                                               '<th bgcolor="#0B1F81"><font color="white">Role</font></th>' +
                                               '<th bgcolor="#0B1F81"><font color="white">Activate</font></th>' + 
                                               '</tr></thead><tbody>';

                       for (var i=0;i<userObj.length;i++){
                           html +=      '<tr id="rid' + i + '">' +
                                        '<td align="center" id="name' + i + '">' + userObj[i].Name + '</td>' + 
                                        '<td align="center"><font id="username' + i + '" color="blue">' + userObj[i].Username + '</font></td>' + 
                                        '<td align="center" id="email' + i + '">' + userObj[i].Email + '</td>' +                             
                                        '<td align="center"><select id="role' + i + '" style="width: 200px;"></select></td>' +
                                        '<td align="center"><input type="checkbox" id="activate' + i + '" " style="width: 50px;" value="yes"></td>' +
                                        '<td><input type="hidden" id="userid' +  i + '" value="' + userObj[i].Username + '"></td></tr>';  
                           rowcount+=1;
                       }  
           
                        html +='</tbody></table>';           
                        document.getElementById('showActivation').innerHTML = html;
                        document.getElementById('rowcount').innerHTML = rowcount;
                };
             }
                xmlhttp.open("GET", "getNonActiveUser.php?congregationnumber=" + congregationNumber, true);
                xmlhttp.send();                    
                                   
        }
        
        
        
        $(document).ready(function(){

            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                     var roleObj = JSON.parse(this.responseText);
                     if(roleObj.length>0){
//                        var option='<option value="">' + 'Select an option' + '</option>';
                        var option;
                        for (var i=0;i<roleObj.length;i++){
                            if(roleObj[i].DefaultRole==="true"){
                                  option += '<option value="' + roleObj[i].RoleType  + '" selected>' + roleObj[i].RoleDescription + '</option>'; 
                            }
                            else{
                                  option += '<option value="' + roleObj[i].RoleType  + '">' + roleObj[i].RoleDescription + '</option>'; 
                            }
                        }
                        var rows = Number(document.getElementById('rowcount').innerHTML);
                        for (i = 0; i < rows; i++){
                            $('#role' + i).append(option);
                        }
                     }
                }
            };
            xmlhttp.open("GET", "getRole.php", true);
            xmlhttp.send();  
            
            $("#submitUser").click(function(){
                var rows = Number(document.getElementById('rowcount').innerHTML);

                    for (i = 0; i < rows; i++){
                        if(document.getElementById('activate' + i).checked === true){
                            document.getElementById('rid' + i).hidden = true;
                            var xmlhttp = new XMLHttpRequest();
                            xmlhttp.onreadystatechange = function() {
                                if (this.readyState == 4 && this.status == 200) {
                                     var userObj = JSON.parse(this.responseText);

                                };

                            };
                            
                            var name = document.getElementById('name' + i).innerHTML;
                            var username = document.getElementById('userid' + i).value;
                            var email = document.getElementById('email' + i).innerHTML;
                            var role = document.getElementById('role' + i).value;
                            xmlhttp.open("GET", "saveActiveUser.php?name=" + name + "&username=" + username + "&email=" + email + "&roletype=" + role , true);
                            xmlhttp.send();   
                       }        
                    }            
            });  
            
                var screen = Number($(window).width());
                var menuwidth = Math.round((200/screen)*100);                
                var territorynavigation = false;
                if(screen<768){
//                    document.getElementById("msg").style.display = 'none';
                    document.getElementById("donatefunds").innerHTML = "$";
                    document.getElementById("myname").innerHTML = '<a href = "welcome.php" class="menutitle"><img src = "icons/TO_logo.png"></a>';
                    document.getElementById("mobilemenu").style.display = 'block';
                    document.getElementById("desktopmenu").style.display = 'none';
                };
                
                if(screen>768 && screen<=1024){
//                    document.getElementById("msg").style.display = 'none'; 
                    document.getElementById("myname").innerHTML = '<a href = "welcome.php" class="menutitle"><img src = "icons/TO_largelogo1.png"></a>';                     
                }
                
                $("#mobilemenudisplay").hover(function (){   
                   document.getElementById("mobilemenucontrol").style.width = menuwidth.toString() + "%";
                   document.getElementById("mobilemenucontrol").style.display = 'block';                 
                });     
                
                $("#desktopmenudisplay").hover(function (){   
                   document.getElementById("menucontrol").style.width = menuwidth.toString() + "%";
                   document.getElementById("menucontrol").style.display = 'block';
                });                  
                
                              
                
                $(".staticmain").hover(function (){ 
                    if(screen<=1024){                    
                    document.getElementById("menucontrol").style.width = "0"; 
                    document.getElementById("mobilemenucontrol").style.width = "0";                                          
                    }else{   
                    document.getElementById("menucontrol").style.width = "0"; 
                    document.getElementById("mobilemenucontrol").style.width = "0";                                           
                    }
                });            
            
        });
        
        </script>
        </div>        
    </body>
</html>
