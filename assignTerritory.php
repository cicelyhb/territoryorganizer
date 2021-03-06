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
        <title>Manage Checkouts</title>
        <link rel="stylesheet" type="text/css" href="myStyle.css">        
    </head>
    <link rel="shortcut icon" href="icons/TO_smalllogo.png" type="image/png" /> 
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
        echo '<tr><td><a href = "#" class="button" style="width: 90%;color: white;font-size: 12px;">Reports</a></td></tr>',PHP_EOL; 
        echo '<tr><td><a href = "#" class="button" style="width: 90%;color: white;font-size: 12px;">Dashboards</a></td></tr>',PHP_EOL;         
        }         
        echo '<tr><td><a href = "#" class="button" style="width: 90%;color: white;font-size: 12px;">Contact Us</a></td></tr>',PHP_EOL;      
        echo '<tr><td><div id="signout2" style="display:none;"><a href = "logout.php" class="button" style="width: 90%;color: white;font-size: 12px;">Sign Out</a></div></td></tr>',PHP_EOL;         
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
        echo '<tr><td><a href = "#" class="button" style="width: 90%;color: white;font-size: 12px;">Reports</a></td></tr>',PHP_EOL; 
        echo '<tr><td><a href = "#" class="button" style="width: 90%;color: white;font-size: 12px;">Dashboards</a></td></tr>',PHP_EOL;         
        }            
        echo '<tr><td><a href = "#" class="button" style="width: 90%;color: white;font-size: 12px;">Contact Us</a></td></tr>',PHP_EOL;        
        echo '</table>',PHP_EOL;  
        ?>   
        </div>            
        
        <div id="main1" class="staticmain">
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1Fdvd0EPg3knllyj9gBhZ8tFoxuWQOTU" type="text/javascript"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>            
        <script src="scripts/myscripts.js"></script>
                    <center>
                        <h1>Manage Checkouts</h1>
                        <div id="showActivation"></div>
                        <div id="rowcount" style="display:none;"></div>  
                        <div id="footer">
                            <table>
                                <tr>
                                    <td><a href = "scheduleCampaign.php" >Schedule Campaigns</a></td>
                                    <td><a href = "addservicegroup.php" >Add Service Group</a></td>
                                </tr>
                            </table>
                        </div> 
                    </center>
        <script type="text/javascript">  
        <?php 
            echo 'var congregationNumber = "'.$congregationnumber.'";',PHP_EOL;
            echo 'var username = "'.$_SESSION['username'].'";',PHP_EOL;            
        ?>            
        var rowcount = 0;
        showActivate();
        function showActivate(){
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                     var myJSONResult = JSON.parse(this.responseText);            
                        var html = '<br><table><thead><tr>' + 
                                               '<th bgcolor="#0B1F81"><font color="white">Territory</font></th>' +
                                               '<th bgcolor="#0B1F81"><font color="white">Requestor</font></th>' +
                                               '<th bgcolor="#0B1F81"><font color="white">Service Group</font></th>' +                                               
                                               '<th bgcolor="#0B1F81"><font color="white">Request Date</font></th>' +   
                                               '<th bgcolor="#0B1F81"><font color="white">Response</font></th>' +                                                 
                                               '</tr></thead><tbody>';

                       for (var i=0;i<myJSONResult.length;i++){
                           html +=      '<tr id="rid' + i + '">' +
                                        '<td align="center">' + myJSONResult[i].TerritoryNumber + '</td>' + 
                                        '<td align="center">' + myJSONResult[i].Firstname + ' ' + myJSONResult[i].Lastname + '</td>' + 
                                        '<td align="center">' + myJSONResult[i].GroupName + '</td>' +                             
                                        '<td align="center">' + myJSONResult[i].RequestDate + '</td>' +
                                        '<td align="center"><input id="chkout' + i + '" type="button" value="Checkout" onclick="assignTerritory(' + i + ')" style="padding: 8px 32px;"></td>' +
                                        '<td><input type="hidden" id="chkinguid' +  i + '" value="' + myJSONResult[i].CheckInGUID + '"></td>' +
                                        '<td><input type="hidden" id="territorynumber' +  i + '" value="' + myJSONResult[i].TerritoryNumber + '"></td></tr>' + 
                                        '<tr><td></td><td><div id="msgsection1' + i + '" style="display:none;"><h5>Message:</h5></td><td><div id="msgsection2' + i + '" style="display:none;"></td></div></tr>' ;                                                                         
                           rowcount+=1;
                       }  
           
                        html +='</tbody></table>';           
                        document.getElementById('showActivation').innerHTML = html;
                        document.getElementById('rowcount').innerHTML = rowcount;
                };
             }
                xmlhttp.open("GET", "getCheckoutRequests.php?congregationnumber=" + congregationNumber, true);
                xmlhttp.send();                    
                                   
        }
        
        function assignTerritory(index){
            var d = new Date();
            var datestring = d.getFullYear() + "-" + ZeroPadding(d.getMonth() + 1) + "-" + ZeroPadding(d.getDate()) + " " + ZeroPadding(d.getHours()) + ":" + ZeroPadding(d.getMinutes()) + ":" + ZeroPadding(d.getSeconds()) + "." + ZeroPadding(d.getMilliseconds());                     
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                     var myJSONResult = JSON.parse(this.responseText);
                     for (var i=0;i<myJSONResult.length;i++){
                        if (myJSONResult[i].Error === '0'){
                            document.getElementById("chkout" + index).disabled = true;
                            document.getElementById("msgsection2" + index).innerHTML = '<h5>' + myJSONResult[i].Message + '</h5>'
                            document.getElementById("msgsection1" + index).style.display = 'block';
                            document.getElementById("msgsection2" + index).style.display = 'block';
                        }
                     }
                };
             }

                xmlhttp.open("GET", "saveAssignTerritory.php?congregationnumber=" + congregationNumber +
                                                             "&territorynumber=" + document.getElementById("territorynumber" + index).value + 
                                                             "&checkinguid=" + document.getElementById("chkinguid" + index).value + 
                                                             "&responseusername=" + username +
                                                             "&responsedate=" + datestring, true);
                xmlhttp.send();                      
        
        }
        
        function ZeroPadding(number){
            if (number.toString().length === 1) {return "0" + number.toString();}
            else {
                return number.toString();
            };
        } 
        
        $(document).ready(function(){
                var screen = Number($(window).width());
                var menuwidth = Math.round((200/screen)*100);                
                var territorynavigation = false;
                if(screen<768){
//                    document.getElementById("msg").style.display = 'none';
                    document.getElementById("donatefunds").innerHTML = "$";
                    document.getElementById("myname").innerHTML = '<a href = "welcome.php" class="menutitle"><img src = "icons/TO_logo.png"></a>';
                    document.getElementById("mobilemenu").style.display = 'block';
                    document.getElementById("desktopmenu").style.display = 'none';
                    document.getElementById("signout").innerHTML = '';
                    document.getElementById("signout2").style.display = 'block';                    
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
