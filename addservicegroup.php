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
        <title>Territory Organizer: Add Service Group</title>
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
               echo '<button id="donatefunds" class="donate">Donate</button>',PHP_EOL; 
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
                        <h1>Add Service Group</h1>
                        <div id="showSchedule"></div>
                        <div id="rowcount" style="display:none;"></div>                           
                    </center>
        <script type="text/javascript">  
        <?php 
            echo 'var congregationnumber = "'.$congregationnumber.'";',PHP_EOL;  
            echo 'var territorynumber = "'. $_GET['territory'].'";',PHP_EOL;           
        ?>            
        var rowcount = 0;
        var showrowid = 0;
        showActivate();
        function showActivate(){         
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
            var html = '<br><table><thead><tr>' +
                                 '<th><input id="toprev" type="button" value="Back to manage checkouts" onclick="location.href=' + '\'' + 'assignTerritory.php' + '\''  + ';" style="padding: 8px 32px;"></th></tr>' +
                                   '<tr>' + 
                                   '<th bgcolor="#0B1F81"><font color="white">Service Group</font></th>' +                                  
                                   '<th bgcolor="#0B1F81"><font color="white">Response</font></th>' +                                   
                                   '</tr></thead><tbody>';                   
                if (this.readyState == 4 && this.status == 200) {
                     var userObj = JSON.parse(this.responseText);  

                       for (var i=0;i<userObj.length;i++){
                           //alert("startdate: " + userObj[i].Startdate + " enddate: " + userObj[i].Enddate); 
                           html +=      '<tr id="hiderow' + i + '">' +
                                        '<td align="center">' + userObj[i].GroupName + '</td>' +
                                        '<td><input type="button" value="delete" onclick="deleteGroup(' +  i + ',' + '\'' + userObj[i].GroupGUID + '\'' + ')" style="width: 100px;padding: 8px 32px;"></td>' +                                         
                                        '</tr>';
 
                           rowcount+=1;
                       }  
                       
                       for(var i=0;i<50;i++){
                           html +=      '<tr id="showrow' + i + '">' +
                                        '<td id="group' + i + '" align="center"></td>' + 
                                        '<td id="deletebtn' + i + '"></td>' + 
                                        '</tr>';                                         
                       }
                      
                           html +=      '<tr id="showinput">' + 
                                        '<td align="center"><input type="text" id="groupinput" value=""></td>' + 
                                        '<td><input type="button" value="add" onclick="addGroup()" style="width: 100px;padding: 8px 32px;"></td>' +                                        
                                        '</tr>' +
                                        '<tr id="error">' +
                                        '<td colspan="3"><div id="errormsg"></div></td>' +                                     
                                        '</tr>';

                                        
                        html +='</tbody></table>';           
                        document.getElementById('showSchedule').innerHTML = html;
                        document.getElementById('rowcount').innerHTML = rowcount;
                        
                        for(var i=0;i<50;i++){
                            document.getElementById('showrow' + i).hidden = true;
                        };  
                        
                        document.getElementById("error").hidden = true;                         
                }else{
                       for(var i=0;i<50;i++){
                           html +=      '<tr id="showrow' + i + '">' +
                                        '<td id="group' + i + '" align="center"></td>' + 
                                        '<td id="deletebtn' + i + '"></td>' + 
                                        '</tr>';                                         
                       }
                      
                           html +=      '<tr id="showinput">' + 
                                        '<td align="center"><input type="text" id="groupinput" value=""></td>' + 
                                        '<td><input type="button" value="add" onclick="addGroup()" style="width: 100px;padding: 8px 32px;"></td>' +                                        
                                        '</tr>' +
                                        '<tr id="error">' +
                                        '<td colspan="3"><div id="errormsg"></div></td>' +                                     
                                        '</tr>';

                                        
                        html +='</tbody></table>';           
                        document.getElementById('showSchedule').innerHTML = html;
                        document.getElementById('rowcount').innerHTML = rowcount;
                        
                        for(var i=0;i<50;i++){
                            document.getElementById('showrow' + i).hidden = true;
                        };  
                        
                        document.getElementById("error").hidden = true; 
                }
             }
                xmlhttp.open("GET", "getTerritoryGroup.php?congregationnumber=" + congregationnumber, true);
                xmlhttp.send();                    
                                   
        }
        
        function addGroup(){
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                     var addObj = JSON.parse(this.responseText);
                     if(addObj[0].Error==='1'){
                         document.getElementById('errormsg').innerHTML = '<h5>' + addObj[0].Message + '</h5>';
                         document.getElementById('errormsg').hidden = false;
                     }else{
                         document.getElementById('errormsg').innerHTML = '';
                         document.getElementById('errormsg').hidden = true;                            
                         document.getElementById('showrow' + showrowid).hidden = false;

                         document.getElementById('group' + showrowid).innerHTML = document.getElementById('groupinput').value;
                         document.getElementById('deletebtn' + showrowid).innerHTML = '<input type="button" value="delete" onclick="deleteGroup2(' +  showrowid + ',' + '\'' + addObj[0].GUID + '\'' + ')" style="width: 100px;padding: 8px 32px;">';
                         
                         document.getElementById('groupinput').value='';
                         
                         rowcount+=1;  
                         showrowid+=1;
                     }
                };

            };
            var group = document.getElementById('groupinput').value;
            xmlhttp.open("GET", "saveTerritoryGroup.php?congregationnumber=" + congregationnumber + "&groupname=" + group, true);
            xmlhttp.send();   

        }
        
        function deleteGroup(index,groupguid){
         if(confirm("Are you sure to delete service group?") === true){
            document.getElementById("hiderow" + index).style.display = 'none';
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                     var deleteObj = JSON.parse(this.responseText);   
                };
            };            
            
            xmlhttp.open("GET", "removeTerritoryGroup.php?groupguid=" + groupguid, true);
            xmlhttp.send();  
        } 
        }
        
        function deleteGroup2(index,groupguid){
         if(confirm("Are you sure to delete service group?") === true){
            document.getElementById("showrow" + index).style.display = 'none';            
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                     var deleteObj = JSON.parse(this.responseText);   
                };
            };            
            
            xmlhttp.open("GET", "removeTerritoryGroup.php?groupguid=" + groupguid, true);
            xmlhttp.send();  
         }    
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

