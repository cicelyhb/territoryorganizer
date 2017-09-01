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
        <title>Territory Organizer: Campaign Scheduler</title>
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
                        <h1>Schedule Campaigns</h1>
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
        var campaigns = [];
        showActivate();
        function showActivate(){         
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
            var html = '<br><table><thead><tr>' +
                                 '<th><input id="toprev" type="button" value="Back to manage checkouts" onclick="location.href=' + '\'' + 'assignTerritory.php' + '\''  + ';" style="padding: 8px 32px;"></th></tr>' +
                                   '<tr>' + 
                                   '<th bgcolor="#0B1F81"><font color="white">Campaign</font></th>' +                                 
                                   '<th bgcolor="#0B1F81"><font color="white">Start</font></th>' +
                                   '<th bgcolor="#0B1F81"><font color="white">End</font></th>' +    
                                   '<th bgcolor="#0B1F81"><font color="white">Response</font></th>' +                                   
                                   '</tr></thead><tbody>';                   
                if (this.readyState == 4 && this.status == 200) {
                     var userObj = JSON.parse(this.responseText);  

                       for (var i=0;i<userObj.length;i++){
                           //alert("startdate: " + userObj[i].Startdate + " enddate: " + userObj[i].Enddate); 
                           html +=      '<tr id="hiderow' + i + '">' +
                                        '<td align="center">' + userObj[i].Campaign + '</td>' +
                                        '<td align="center">' + userObj[i].Startdate + '</td>' +
                                        '<td id="enddate0' + i + '" align="center">' + userObj[i].Enddate + '</td>' +  
                                        '<td><input type="button" value="delete" onclick="deleteCampaign(' +  i + ',' + '\'' + userObj[i].CampaignGUID + '\'' + ')" style="width: 100px;padding: 8px 32px;"></td>' + 
                                        '<td><input type="hidden" id="startdate' +  i + '" value="' + userObj[i].Startdate + '"></td>' + 
                                        '<td><input type="hidden" id="enddate' +  i + '" value="' + userObj[i].Enddate + '"></td>' +                                          
                                        '<td><input type="hidden" id="campaigntype' +  i + '" value="' + userObj[i].CampaignType + '"></td>' + 
                                        '<td><input type="hidden" id="msgboard' +  i + '" value="' + userObj[i].MsgBoard + '"></td>' +                                        
                                        '<td><a href = "javascript:showMessageBoard(' + i + ')">edit campaign</a></td>' +
                                        '</tr>' + 
                                        '<tr>' + 
                                        '<td></td><td align="center" colspan="2"><div id="msgboardsection' + i + '" style="display:none">' + 
                                        '<b>Message Board</b>' +
                                        '<br><br><textarea id="msgboardinput' + i + '" rows="5" cols="45" maxlength="255">' + userObj[i].MsgBoard + '</textarea>' + 
                                        '<br><input type="button" value="save" onclick="editCampaign(' +  i + ',' + '\'' + userObj[i].CampaignGUID + '\'' + ')" style="width: 100px;padding: 8px 32px;"><input type="button" value="close" onclick="closeMsgBoard(' +  i + ')" style="width: 100px;padding: 8px 32px;">' + 
                                        '<br></div></td>' +                                       
                                        '</tr>';
 
                           rowcount+=1;
                       }  
                       
                       for(var i=0;i<50;i++){
                           html +=      '<tr id="showrow' + i + '">' +
                                        '<td id="campaign' + i + '" align="center"></td>' +
                                        '<td id="start' + i + '" align="center"></td>' +
                                        '<td id="end' + i + '" align="center"></td>' +  
                                        '<td id="deletebtn' + i + '"></td>' + 
                                        '</tr>';                                         
                       }
                      
                           html +=      '<tr id="showinput">' + 
                                        '<td align="center"><select id="campaigninput" style="width: 200px;"></select></td>' +
                                        '<td align="center"><input id="startdateinput" type="date" value=""></td>' +
                                        '<td align="center"><input id="enddateinput" type="date" value=""></td>' +  
                                        '<td><input type="button" value="add" onclick="addCampaign()" style="width: 100px;padding: 8px 32px;"></td>' + 
                                        '<td><input type="hidden" id="campaignguidinput" value=""></td>' +                                            
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
                                        '<td id="campaign' + i + '" align="center"></td>' +
                                        '<td id="start' + i + '" align="center"></td>' +
                                        '<td id="end' + i + '" align="center"></td>' +  
                                        '<td id="deletebtn' + i + '"></td>' + 
                                        '</tr>';                                         
                       }
                      
                           html +=      '<tr id="showinput">' + 
                                        '<td align="center"><select id="campaigninput" style="width: 200px;"></select></td>' +
                                        '<td align="center"><input id="startdateinput" type="date" value=""></td>' +
                                        '<td align="center"><input id="enddateinput" type="date" value=""></td>' +  
                                        '<td><input type="button" value="add" onclick="addCampaign()" style="width: 100px;padding: 8px 32px;"></td>' + 
                                        '<td><input type="hidden" id="campaignguidinput" value=""></td>' +                                            
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
                xmlhttp.open("GET", "getSchCampaigns.php?congregationnumber=" + congregationnumber, true);
                xmlhttp.send();                    
                                   
        }
        
        function addCampaign(){
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                     var addObj = JSON.parse(this.responseText);
                     if(addObj[0].Error==='1'){
                         document.getElementById('errormsg').innerHTML = '<h5>' + addObj[0].Message + '</h5>';
                         document.getElementById('errormsg').hidden = false;
                     }else{
                         var s = new Date(document.getElementById('startdateinput').value);
                         var e = new Date(document.getElementById('enddateinput').value);
                         
                         var startdate = s.getFullYear() + "-" + ZeroPadding(s.getMonth() + 1) + "-" + ZeroPadding(s.getDate()) + " " + ZeroPadding(s.getHours()) + ":" + ZeroPadding(s.getMinutes()) + ":" + ZeroPadding(s.getSeconds()) + "." + ZeroPadding(s.getMilliseconds());   
                         var enddate = e.getFullYear() + "-" + ZeroPadding(e.getMonth() + 1) + "-" + ZeroPadding(e.getDate()) + " " + ZeroPadding(e.getHours()) + ":" + ZeroPadding(e.getMinutes()) + ":" + ZeroPadding(e.getSeconds()) + "." + ZeroPadding(e.getMilliseconds());                          
                         
                         document.getElementById('errormsg').innerHTML = '';
                         document.getElementById('errormsg').hidden = true;                            
                         document.getElementById('showrow' + showrowid).hidden = false;
                         for(var i=0;i<campaigns.length;i++){
                             if(document.getElementById('campaigninput').value === campaigns[i].CampaignType){
                                document.getElementById('campaign' + showrowid).innerHTML = campaigns[i].CampaignDescription;
                             }
                         }                         
                         document.getElementById('start' + showrowid).innerHTML = startdate;
                         document.getElementById('end' + showrowid).innerHTML = enddate;
                         document.getElementById('deletebtn' + showrowid).innerHTML = '<input type="button" value="delete" onclick="deleteCampaign2(' +  showrowid + ',' + '\'' + addObj[0].GUID + '\'' + ')" style="width: 100px;padding: 8px 32px;">';
                         
                         document.getElementById('campaigninput').value='';
                         document.getElementById('startdateinput').value='';
                         document.getElementById('enddateinput').value='';
                         
                         rowcount+=1;  
                         showrowid+=1;
                     }
                };

            };
            var campaigntype = document.getElementById('campaigninput').value;
            var startdate = document.getElementById('startdateinput').value;
            var enddate = document.getElementById('enddateinput').value;
            xmlhttp.open("GET", "saveSchCampaigns.php?congregationnumber=" + congregationnumber + "&campaigntype=" + campaigntype + "&startdate=" + startdate + "&enddate=" + enddate, true);
            xmlhttp.send();   

        }
        
        function deleteCampaign(index,campaignguid){
         if(confirm("Are you sure to delete schedule?") === true){
            document.getElementById("hiderow" + index).style.display = 'none';
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                     var deleteObj = JSON.parse(this.responseText);   
                };
            };            
            
            xmlhttp.open("GET", "removeSchCampaigns.php?campaignguid=" + campaignguid, true);
            xmlhttp.send();  
        } 
        }
        
        function deleteCampaign2(index,campaignguid){
         if(confirm("Are you sure to delete schedule?") === true){
            document.getElementById("showrow" + index).style.display = 'none';            
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                     var deleteObj = JSON.parse(this.responseText);   
                };
            };            
            
            xmlhttp.open("GET", "removeSchCampaigns.php?campaignguid=" + campaignguid, true);
            xmlhttp.send();  
         }    
        }        
        
        function ZeroPadding(number){
            if (number.toString().length === 1) {return "0" + number.toString();}
            else {
                return number.toString();
            };
        }
        
        function showMessageBoard(index){
         var showhide=document.getElementById("msgboardsection" + index);  
         var e = new Date(document.getElementById("enddate" + index).value);
         var enddate = e.getFullYear() + "-" + ZeroPadding(e.getMonth() + 1) + "-" + ZeroPadding(e.getDate());          
         showhide.style.display='block';           
      
         document.getElementById("enddate0" + index).innerHTML='<input id="enddateinput' + index + '" type="date" value="' + enddate + '">';
        }
        
        function editCampaign(index,id){
            var msgboardinput = document.getElementById("msgboardinput" + index).value;
            var msgboard = document.getElementById("msgboard" + index).value; 
            
            var enddateinput = document.getElementById("enddateinput" + index).value;  
            var enddate = document.getElementById("enddate" + index).value; 
            
            var showhide=document.getElementById("msgboardsection" + index);
            
            if(msgboardinput!==msgboard){
                var xmlhttp1 = new XMLHttpRequest();
                xmlhttp1.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {   
                         showhide.style.display='none';  
                    };
                };                            
                xmlhttp1.open("GET", "saveCampaignMsgBoard.php?guid=" + id + "&congregationnumber=" + congregationnumber + "&messageboard=" + msgboardinput, true);
                xmlhttp1.send();                
            }
           
           if(enddateinput!==enddate){
                var e = new Date(document.getElementById("enddateinput" + index).value);
                var enddate_ = e.getFullYear() + "-" + ZeroPadding(e.getMonth() + 1) + "-" + ZeroPadding(e.getDate()) + " " + "00:00:00";        
           
                var xmlhttp2 = new XMLHttpRequest();
                xmlhttp2.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {   
                     showhide.style.display='none';  
                     document.getElementById("enddate0" + index).innerHTML = enddate_;                        
                     document.getElementById("enddate" +  index).value = enddate_;                          
                };
            };                            
            xmlhttp2.open("GET", "saveCampaignEndDate.php?guid=" + id + "&congregationnumber=" + congregationnumber + "&enddate=" + enddate_, true);
            xmlhttp2.send();                    
            }
            else{
            document.getElementById("enddate0" + index).innerHTML=document.getElementById("enddate" +  index).value;
            }
        }
        
        function closeMsgBoard(index){
            var showhide=document.getElementById("msgboardsection" + index);
            showhide.style.display='none';                       
            document.getElementById("enddate0" + index).innerHTML=document.getElementById("enddate" +  index).value;
        }        
        
        $(document).ready(function(){         
                var screen = Number($(window).width());
                var menuwidth = Math.round((200/screen)*100);                
                var territorynavigation = false;
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                         var campaignObj = JSON.parse(this.responseText);
                         if(campaignObj.length>0){
                            var option='<option value="">' + 'Select an option' + '</option>';
                            for (var i=0;i<campaignObj.length;i++){
                                  option += '<option value="' + campaignObj[i].CampaignType  + '">' + campaignObj[i].CampaignDescription + '</option>'; 
                                  campaigns.push({CampaignType:campaignObj[i].CampaignType,CampaignDescription:campaignObj[i].CampaignDescription});
                            }
                            $('#campaigninput').append(option);          
                         }
                    }
                };
                xmlhttp.open("GET", "getCampaign.php", true);
                xmlhttp.send();                              
  
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
