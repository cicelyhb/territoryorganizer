<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
   ob_start();
   session_start();
   if(empty($_SESSION['username']) || empty($_SESSION['congregationnumber'])){
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
        <title>Territory Organizer:Welcome</title>
        <link rel="stylesheet" type="text/css" href="myStyle.css">
        <style> 
            #search{
                    padding: 7px;
                    border: 1px solid #4CAF50;
                    height: 30px;
                    width: 600px;
                    font-size: 16px;
                    background-image: url("icons/magnifyglass1.png");
                    background-size: 30px 30px;
                    background-repeat: no-repeat;
                    background-position: right;                    
            }
            #searchSelect{
                    padding: 7px;
                    border: 1px solid #4CAF50;
                    width: 614px;
/*                    overflow-x: hidden;
                    overflow-y: hidden;*/
            }   
            
            @media only screen and (max-width: 763px) {
            #search{
                    padding: 7px;
                    border: 1px solid #4CAF50;
                    height: 30px;
                    width: 300px;
                    font-size: 16px;
                    background-image: url("icons/magnifyglass1.png");
                    background-size: 30px 30px;
                    background-repeat: no-repeat;
                    background-position: right;                    
            }
            #searchSelect{
                    padding: 7px;
                    border: 1px solid #4CAF50;
                    width: 314px;
/*                    overflow-x: hidden;
                    overflow-y: hidden;*/
            }   
          
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

        </style>
    </head>
    <link rel="shortcut icon" href="icons/TO_smalllogo.png" type="image/png" />    
    <body>
        <div class="top">
        <script src="scripts/menu.js"></script>
            <?php 
               $sngquote = "'";
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
//               echo '<td align="position" class="menuleft">',PHP_EOL;    
//               echo '<marquee id="scrollingcampaign" behavior="scroll" direction="left"></marquee>',PHP_EOL;    
//               echo '</td>',PHP_EOL;                
               echo '<td id="myname" align="center" class="menucenter"><a href = "welcome.php" class="menutitle">Territory Organizer</a></td>',PHP_EOL;
//               echo '<td align="right" class="menuright">',PHP_EOL; 
//               echo '<td class="menumsgscroll">',PHP_EOL;                
//               echo '<div id="msg" style="display:block;">',PHP_EOL;    
//               echo '<marquee id="scrollingcampaign" behavior="scroll" direction="left"></marquee>',PHP_EOL;                
////               echo '<font color = "white">'.$_SESSION['username'].'</font>',PHP_EOL;               
//               echo '</div>',PHP_EOL;  
//               echo '</td>',PHP_EOL; 
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
        <div id="myleft2" class="left">
        <script src="scripts/menu.js"></script> 
        <?php  
             include("db_ConnectionInfo.php");
             include("MyClassLibrary.php");
             $congregationnumber = $_SESSION['congregationnumber'];
             $terrlist = new territorylist($host,$username,$password,$database,$port,$socket);
             $terrlist->InitialMap($congregationnumber);  
             $lat=$terrlist->Latitude();
             $lng=$terrlist->Longitude();
             $terrlist->NavigationList($congregationnumber,'icons/available.png','icons/checkout.png');
             $terrlist->close();
        ?>             
        </div>
        
        <div id="mobilemenucontrol" class="sideleftnav">
        <script src="scripts/menu.js"></script> 
<!--        <a href="#" class="closebtn" >&times;</a>-->
        <?php
        echo '<table>',PHP_EOL;
        echo '<tr><td><a id="mobileselectterritory" href = "#" class="button" style="width: 90%;color: white;font-size: 12px;">Select Territory</a></td></tr>',PHP_EOL;          
        if($_SESSION['role'] == 'ADM' ){
        echo '<tr><td><a href = "createterritory.php" class="button" style="width: 90%;color: white;font-size: 12px;">Create Territory</a></td></tr>',PHP_EOL;        
        echo '<tr><td><a href = "activateUser.php" class="button" style="width: 90%;color: white;font-size: 12px;">Activate Users</a></td></tr>',PHP_EOL;  
        echo '<tr><td><a href = "#" class="button" style="width: 90%;color: white;font-size: 12px;">Change User Role</a></td></tr>',PHP_EOL;        
        echo '<tr><td><a href = "assignTerritory.php" class="button" style="width: 90%;color: white;font-size: 12px;">Manage Checkouts</a></td></tr>',PHP_EOL;    
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
        <div id="menucontrolclose" style="display:none;">
            <table class="closebuttontable">
                <tr><td align="right" class="closebuttonright"><a href="#">&times;</a></td></tr>
            </table>
        </div>
        <?php
        echo '<table>',PHP_EOL;
        echo '<tr><td><a id="selectterritory" href = "#" class="button" style="width: 90%;color: white;font-size: 12px;">Select Territory</a></td></tr>',PHP_EOL;          
        if($_SESSION['role'] == 'ADM' ){
        echo '<tr><td><a href = "createterritory.php" class="button" style="width: 90%;color: white;font-size: 12px;">Create Territory</a></td></tr>',PHP_EOL;        
        echo '<tr><td><a href = "activateUser.php" class="button" style="width: 90%;color: white;font-size: 12px;">Activate Users</a></td></tr>',PHP_EOL;  
        echo '<tr><td><a href = "#" class="button" style="width: 90%;color: white;font-size: 12px;">Change User Role</a></td></tr>',PHP_EOL;        
        echo '<tr><td><a href = "assignTerritory.php" class="button" style="width: 90%;color: white;font-size: 12px;">Manage Checkouts</a></td></tr>',PHP_EOL;    
        echo '<tr><td><a href = "#" class="button" style="width: 90%;color: white;font-size: 12px;">Reports</a></td></tr>',PHP_EOL; 
        echo '<tr><td><a href = "#" class="button" style="width: 90%;color: white;font-size: 12px;">Dashboards</a></td></tr>',PHP_EOL;         
        }            
        echo '<tr><td><a href = "#" class="button" style="width: 90%;color: white;font-size: 12px;">Contact Us</a></td></tr>',PHP_EOL;        
        echo '</table>',PHP_EOL;  
        ?>   
        </div>             
        
        <div id="banner">
            <table class="menutable">
                <tr> 
               <td align="center" class="menucenter">               
               <div id="msg" style="display:block;">    
               <marquee id="scrollingcampaign" behavior="scroll" direction="left"></marquee>                            
               </div> 
               </td> 
                </tr>
            </table>
           
        </div>        
        
        <div id="main1" class="main">
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1Fdvd0EPg3knllyj9gBhZ8tFoxuWQOTU" type="text/javascript"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!--        <div id="map" style="width:1400px; height:750px;"></div>-->
        <div id="map" style="width:100%; height:850px; padding:0px"></div>
        <div id="mysearch" style="display:block"></div> 
        <script src="scripts/myscripts.js"></script>
        <script type="text/javascript">
            
            
            <?php
                echo 'var congregationNumber = "'.$congregationnumber.'";',PHP_EOL;
                echo 'var username = "'.$_SESSION['username'].'";',PHP_EOL;
                echo 'var map;',PHP_EOL;
                echo "initialMap($lat,$lng);",PHP_EOL;
            ?>            
            var marker = [];    
            var territorygroups = [];    
            var addressObj = [];
            var StreetSearchObj = [];
            var addressMarker;
            
            var icons = {
                            NW: {
                            label: 'Not Worked',
                            icon: 'icons/House_NW_small.png'
                            },
                            NH: {
                            label: 'Not Home',
                            icon: 'icons/House_NH_small.png'
                          },
                            HH: {
                            label: 'Home',
                            icon: 'icons/House_HH_small.png'
                          },
                            NTR: {
                            label: 'No Trespassing',
                            icon: 'icons/House_NTR_small.png'
                          },   
                            Phone_NW: {
                            label: 'Not Worked (Landline)',
                            icon: 'icons/Phone_NW_small.png'
                          },    
                            Phone_NH: {
                            label: 'Not Home (Landline)',
                            icon: 'icons/Phone_NH_small.png'
                          },  
                            Phone_HH: {
                            label: 'Home (Landline)',
                            icon: 'icons/Phone_HH_small.png'
                          },  
                            Phone_NTR: {
                            label: 'No Trespassing (Landline)',
                            icon: 'icons/Phone_NTR_small.png'
                          }, 
                            DNC: {
                            label: 'Do Not Call',
                            icon: 'icons/DNC_small.png'
                          }                          
                        };            
                      
            showTerritories();            
            addressSearch();
            
            function addressSearch(){
                var search = document.getElementById('mysearch');
                var div = document.createElement('div');
                div.innerHTML = '<form>' + 
                                '<table>' + 
                                '<tr>' + 
                                '<td>' +
                                '<input type = "text" id = "search" value = "" placeholder="Street">' +                                 
                                '<br>' +  
                                '<select id="searchSelect">' + 
//                                '<option  disabled selected>Select Your Country:</option>' + 
//                                '<option>USA</option>' + 
//                                '<option>Germany</option>' + 
//                                '<option>France</option>' + 
                                '</select>' +                                                            
                                '</td>' +
                                '</tr>' +
                                '</table>' +
                                '</form>';
                search.appendChild(div);
                
                var myDropDown=document.getElementById("searchSelect");
//                var length = myDropDown.options.length;
//                //open dropdown
//                myDropDown.size = length;
                //close dropdown
//                myDropDown.size = 0;
                myDropDown.style.display='none';
                
                map.controls[google.maps.ControlPosition.TOP_LEFT].push(search);
            }   
            
            function initialMap(latitude,longitude){
                var screen = Number($(window).width());
                var view = false;
                
                if(screen<768){
                    view = false;
                }else{
                    view = true;
                }
                
                map = new google.maps.Map(document.getElementById('map'), {
                  zoom: 14,
                  mapTypeControl: view,
                 // center: {lat: 41.879, lng: -87.624}  // Center the map on Chicago, USA.
                  center: {lat: latitude, lng: longitude}          
               });
           } 
           
           function showTerritories(){
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        var myJSONResult = JSON.parse(this.responseText);
                        for(i=0;i<myJSONResult.length;i++){
                            var territory = myJSONResult[i].TerritoryNumber;
                            var polygon_ = JSON.parse(myJSONResult[i].Polygon);
                            var center_ =  myJSONResult[i].Center;
                            var isCheckedOut = myJSONResult[i].CheckOut === '1'? true:false;
                            var latlng_ = center_.toString().split(',');
                            var lat = Number(latlng_[0].toString().trim());
                            var lng = Number(latlng_[1].toString().trim());
                            var requestusername = myJSONResult[i].RequestUsername;
                            var requestdate = myJSONResult[i].RequestDate;
                            var responsedate = myJSONResult[i].ResponseDate;
                            var requestname = myJSONResult[i].Firstname + ' ' + myJSONResult[i].Lastname;
                            var groupname = myJSONResult[i].GroupName;
                            var groupsection;
                            var pinImage;
                            
                            if (polygon_){  
                                
                               var html;
                               
                               if(isCheckedOut===true){
                                   if (groupname!==''){
                                       groupsection = '<tr><td>service group:</td><td>' + groupname + '</td></tr>'; 
                                   }else{
                                       groupsection = '';
                                   }
                                   pinImage = new google.maps.MarkerImage("http://www.googlemapsmarkers.com/v1/" + territory + "/E2211D/FFFFFF/E2211D/");
                                   html = '<table><td><img src="icons/checkout2.png"/></td><td><div class="tooltip"><h5>' + requestusername + '</h5><span class="tooltiptext">' + requestname + '</span></div></td></table>' +
                                          '<table>' + groupsection +                                          
                                          '<tr><td>request date:</td><td>' + requestdate + '</td></tr>' + 
                                          '<tr><td>assign date:</td><td>' + responsedate + '</td></tr>' + 
                                          '<tr><td><a href = "territorymap.php?territory=' + territory + '" style="padding: 0px 0px 0px 0px;">' + territory + '</a></td></tr>' +
                                          '</table>'
                               }else{
                                   pinImage = new google.maps.MarkerImage("http://www.googlemapsmarkers.com/v1/" + territory + "/5EAC3F/FFFFFF/5EAC3F/");
                                   html ='<table><tr><td>Would you like to submit a request for checkout on territory ' + territory + '?</td></tr></table>' +
                                         '<table><tr><form action=""><td><input type="radio" name="checkout" id = "checkout_yes" value="yes" style="width: 30px;">Yes</td>' +
                                         '<td><input type="radio" name="checkout" id = "checkout_no" value="no"  style="width: 30px;" checked>No</td></form></tr></table>' +
                                         '<div id="displaycheckout" style="display:block;">' +
                                         
                                         '<table><tr><td>Will this territory be issued to service group?</td></tr></table>' +
                                         '<table><tr><form action=""><td><input type="radio" name="selectgroup" id = "group_yes" value="yes" style="width: 30px;" onclick="showGroups()">Yes</td>' +
                                         '<td><input type="radio" name="selectgroup" id = "group_no" value="no"  style="width: 30px;" onclick="hideGroups()" checked>No</td></form></tr></table>' +  
                                         '<div id="displaygrouplist" style="display:none;"><table><tr><td><select name = "grplist" id = "grplist" style="width: 150px;"></select></td></tr></table></div>' +
                                         
                                         '<div id="checkout"><table><tr><td><input type="button" value="Request Checkout" onclick="submitCheckoutRequest(' + '\'' + territory + '\'' + ')" style="padding: 8px 32px;"></td>' +
                                         '<td><a href = "territorymap.php?territory=' + territory + '" style="padding: 0px 0px 0px 0px;">' + territory + '</a></td>' +
                                         '</tr></table></div>' +
                                         '</div>';                                    
                                   
                               }
                          //"submitCheckoutRequest(' + '\'' + territory + '\'' + ')"
                              
                               var polygon = new google.maps.Polygon({
                                      paths: polygon_,
                                      strokeColor: '#072f72',
                                      strokeOpacity: 0.8,
                                      strokeWeight: 2,
                                      fillColor: '#072f72',
                                      fillOpacity: 0.05,
                                      editable: false
                                });

                                polygon.setMap(map);
                                
                                
                               // Add a new marker at the new plotted point on the polyline.
                                var myinfowindow = new google.maps.InfoWindow({ content: html });                                                                 
                                marker.push(new google.maps.Marker({
                                  position: {lat:lat,lng:lng},
                                  label: {fontSize: "8px"},
                                  draggable: false,
                                  icon: pinImage,
                                  infowindow: myinfowindow
                                }));

                                marker[i].setMap(map);     
                                
                                google.maps.event.addListener(marker[i], "click", function () {this.infowindow.open(map, this);}); 

                            }
                        }                        
                    }
                };
                xmlhttp.open("GET", "getTerritory.php?congregationnumber=" + congregationNumber, true);
                xmlhttp.send(); 
           }
           
           function showCheckoutRequest(){
            var showhide = document.getElementById('displaycheckout');
            showhide.style.display = 'block';
           }
           
           function hideCheckoutRequest(){
            var showhide = document.getElementById('displaycheckout');
            showhide.style.display = 'none';               
           }              
           
           function showGroups(){
            var showhide = document.getElementById('displaygrouplist');
            showhide.style.display = 'block';  
            var option='<option value="">' + 'Select group' + '</option>';
            for(var i=0;i<territorygroups.length;i++){                
               option += '<option value="' + territorygroups[i].Guid  + '">' + territorygroups[i].Group + '</option>';                                  
            }
            $('#grplist').append(option);
            
           }
           
           function hideGroups(){
            var showhide = document.getElementById('displaygrouplist');
            showhide.style.display = 'none';               
           }    
           
           function showGroupID(id){
            var showhide = document.getElementById('displaygrouplist' + id);
            showhide.style.display = 'block';  
            var option='<option value="">' + 'Select group' + '</option>';
            for(var i=0;i<territorygroups.length;i++){                
               option += '<option value="' + territorygroups[i].Guid  + '">' + territorygroups[i].Group + '</option>';                                  
            }
            $('#grplist' + id).append(option);
            
           }
           
           function hideGroupID(id){
            var showhide = document.getElementById('displaygrouplist' + id);
            showhide.style.display = 'none';               
           }            
           
           function submitCheckoutRequest(territory){
               var d = new Date();
               var datestring = d.getFullYear() + "-" + ZeroPadding(d.getMonth() + 1) + "-" + ZeroPadding(d.getDate()) + " " + ZeroPadding(d.getHours()) + ":" + ZeroPadding(d.getMinutes()) + ":" + ZeroPadding(d.getSeconds()) + "." + ZeroPadding(d.getMilliseconds());             
               var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status ===200) {
                        var myJSONResult = JSON.parse(this.responseText);
//                        document.getElementById("rtmessage").innerHTML = myJSONResult[0].Message;
                    }
                };

                                                     
                xmlhttp.open("GET", "saveRequestTerritory.php?congregationnumber=" + congregationNumber + 
                                                             '&territorynumber=' + territory +
                                                             '&requestusername=' + username +
                                                             '&groupguid=' + document.getElementById("grplist").value + 
                                                             '&requestdate=' + datestring, true);
                xmlhttp.send();                 
           }
           
           function submitCheckoutRequestID(id){
               var d = new Date();
               var datestring = d.getFullYear() + "-" + ZeroPadding(d.getMonth() + 1) + "-" + ZeroPadding(d.getDate()) + " " + ZeroPadding(d.getHours()) + ":" + ZeroPadding(d.getMinutes()) + ":" + ZeroPadding(d.getSeconds()) + "." + ZeroPadding(d.getMilliseconds());             
               var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status ===200) {
                        var myJSONResult = JSON.parse(this.responseText);
//                        document.getElementById("rtmessage").innerHTML = myJSONResult[0].Message;
                    }
                };

                                                     
                xmlhttp.open("GET", "saveRequestTerritory.php?congregationnumber=" + congregationNumber + 
                                                             '&territorynumber=' + id +
                                                             '&requestusername=' + username +
                                                             '&groupguid=' + document.getElementById('grplist' + id).value + 
                                                             '&requestdate=' + datestring, true);
                xmlhttp.send();                 
           }
           
           
           function submitCheckin(territory){
           }  
           
           function getTerritoryGroups(){
               var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        var myJSONResult = JSON.parse(this.responseText);
                        for(i=0;i<myJSONResult.length;i++){
                            territorygroups.push({Guid:myJSONResult[i].GroupGUID, Group:myJSONResult[i].GroupName});
                        }
                    }
                };
                xmlhttp.open("GET", "getTerritoryGroup.php?congregationnumber=" + congregationNumber, true);
                xmlhttp.send();                             
           }
           
        function showRequestID(id){
            var showhide = document.getElementById('displayrequest' + id);
            if(showhide.style.display === 'none'){
            showhide.style.display = 'block';    
            }else{
                showhide.style.display = 'none'; 
            }
        }
           
        function ZeroPadding(number){
            if (number.toString().length === 1) {return "0" + number.toString();}
            else {
                return number.toString();
            };
        }   
        
        function Search(str){
            var option;
            for(i=0;i<StreetSearchObj.length;i++){
                var searchStr = StreetSearchObj[i].FormattedAddress.toLowerCase();
                var pos = searchStr.search(str.toLowerCase());
                if (pos>0){
                    option += '<option value="' + StreetSearchObj[i].RID + '">' + StreetSearchObj[i].FormattedAddress + '</option>'; 
                    addressObj.push({RID:StreetSearchObj[i].RID,
                                     FormattedAddress:StreetSearchObj[i].FormattedAddress,
                                     Lat:StreetSearchObj[i].Lat,
                                     Lng:StreetSearchObj[i].Lng,
                                     Territory:StreetSearchObj[i].Territory,
                                     Type:StreetSearchObj[i].Type,
                                     Phone:StreetSearchObj[i].Phone,
                                     Touched:StreetSearchObj[i].Touched});    
                }
            }
            $('#searchSelect').append(option);
               var myDropDown=document.getElementById("searchSelect");
               //open dropdown
               myDropDown.size = 5;
                                                
        }
        
        
        function LoadSearch(){
            var xmlhttp = new XMLHttpRequest();
             xmlhttp.onreadystatechange = function() {
                 if (this.readyState == 4 && this.status == 200) {
                     var myJSONResult = JSON.parse(this.responseText);
                     for(i=0;i<myJSONResult.length;i++){
                             StreetSearchObj.push({RID:myJSONResult[i].RID,
                                                   FormattedAddress:myJSONResult[i].FormattedAddress,
                                                   Lat:myJSONResult[i].Latitude,
                                                   Lng:myJSONResult[i].Longitude,
                                                   Territory:myJSONResult[i].TerritoryNumber,
                                                   Type:myJSONResult[i].Type,
                                                   Phone:myJSONResult[i].Phone,
                                                   Touched:myJSONResult[i].Touched});                        
                     }

                 }
             };
             xmlhttp.open("GET", "getStreetSearch.php?congregationnumber=" + congregationNumber, true);
             xmlhttp.send();             
        }
        
        function getCurrentCampaign(){
           
            var xmlhttp = new XMLHttpRequest();
             xmlhttp.onreadystatechange = function() {
                 if (this.readyState == 4 && this.status == 200) {
                     var myJSONResult = JSON.parse(this.responseText);
                     for(i=0;i<myJSONResult.length;i++){
//                        var d = new Date(); 
//                        var datestring = d.getFullYear() + "-" + ZeroPadding(d.getMonth() + 1) + "-" + ZeroPadding(d.getDate()) + " " + ZeroPadding(d.getHours()) + ":" + ZeroPadding(d.getMinutes()) + ":" + ZeroPadding(d.getSeconds()) + "." + ZeroPadding(d.getMilliseconds());            
//                        var currdate = new Date(datestring);                         
//                        var enddate = new Date(myJSONResult[i].Enddate);
//                        
//                        var date_diff_indays = function(date1, date2) {
//                            dt1 = new Date(date1);
//                            dt2 = new Date(date2);
//                            return Math.floor((Date.UTC(dt2.getFullYear(), dt2.getMonth(), dt2.getDate()) - Date.UTC(dt1.getFullYear(), dt1.getMonth(), dt1.getDate()) ) /(1000 * 60 * 60 * 24));
//                        }   
                        
                        if(myJSONResult[i].CampaignType!=='NCM'){                            
                            document.getElementById("scrollingcampaign").innerHTML = myJSONResult[i].Year + " " + myJSONResult[i].CampaignDescription +  "... " + myJSONResult[i].Days + " days left." + " " + myJSONResult[i].MsgBoard;                  
                        }else{
                            document.getElementById("scrollingcampaign").innerHTML = myJSONResult[i].MsgBoard; 
                        }
                     }

                 }
             };
             xmlhttp.open("GET", "getCurrentCampaign.php?congregationnumber=" + congregationNumber, true);
             xmlhttp.send();             
        }
        
    
           
            $(document).ready(function(){
                var screen = Number($(window).width());
                var menuwidth = Math.round((200/screen)*100);
                
                var territorynavigation = false;
                                
                getTerritoryGroups();
                LoadSearch();
                getCurrentCampaign();
                
                if(screen<768){
//                    document.getElementById("msg").style.display = 'none';
                    document.getElementById("donatefunds").innerHTML = "$";
                    document.getElementById("myname").innerHTML = '<a href = "welcome.php" class="menutitle"><img src = "icons/TO_logo.png"></a>';
                    document.getElementById("mobilemenu").style.display = 'block';
                    document.getElementById("desktopmenu").style.display = 'none';
                    document.getElementById("signout").innerHTML = '';
                    document.getElementById("signout2").style.display = 'block';
                };
                
                if(screen>=768 && screen<=1024){
//                    document.getElementById("msg").style.display = 'none'; 
                    document.getElementById("menucontrolclose").style.display = 'block';
                    document.getElementById("myname").innerHTML = '<a href = "welcome.php" class="menutitle"><img src = "icons/TO_largelogo1.png"></a>';                     
                }
                
                $("#search").keyup(function (){  
                    var myDropDown = document.getElementById("searchSelect");
                    var mySearch = document.getElementById("search");
//                    var length = myDropDown.options.length;
                    //open dropdown
//                    myDropDown.size = length;
                    //close dropdown
    //                myDropDown.size = 0;
                    if (mySearch.value===''){
                        myDropDown.style.display='none'; 
                    }else{
                        $('#searchSelect').empty();
                        addressObj = [];
                        Search(mySearch.value);
                        myDropDown.style.display='block';  
                    }
                });  
                
                $("#searchSelect").change(function(){
                    //selection changed
//                    alert(this.value);//this will give the selected option's value
//                    alert($(this).find(':selected').text());//this will give the selected option's text
                    document.getElementById("search").value = $(this).find(':selected').text();
                    
                    var lat;
                    var lng;
                    var territory;
                    var ttype;
                    var phone;
                    var touched;
                    var image;
                    
                    for(i=0;i<addressObj.length;i++){
                        if(addressObj[i].RID===this.value){
                            lat = addressObj[i].Lat;
                            lng = addressObj[i].Lng;
                            territory = addressObj[i].Territory;
                            ttype = addressObj[i].Type;
                            phone = addressObj[i].Phone;
                            touched = addressObj[i].Touched;
                        }
                    }
//                    alert("Lat: " + lat + " Lng: " + lng + " RID: " + this.value);  
                        
                        
                    if(phone==='0' && ttype==='NH' && touched==='0'){
                        image = icons.NW.icon;
                    }
                    if(phone==='0' && ttype==='NH' && touched==='1'){
                        image = icons.NH.icon;
                    }
                    if(phone==='0' && ttype==='HH'){
                        image = icons.HH.icon;                       
                    }
                    if(phone==='0' && ttype==='NTR'){
                        image = icons.NTR.icon;                         
                    }
                    if(phone==='1' && ttype==='NH' && touched==='0'){
                        image = icons.Phone_NW.icon;
                    }
                    if(phone==='1' && ttype==='NH' && touched==='1'){
                        image = icons.Phone_NH.icon;                        
                    }
                    if(phone==='1' && ttype==='HH'){
                        image = icons.Phone_HH.icon;                           
                    }
                    if(phone==='1' && ttype==='NTR'){
                        image = icons.Phone_NTR.icon;                           
                    }
                    if(ttype==='DNC'){
                        image = icons.DNC;                          
                    }  
                    var html = '<p>Territory: ' + territory + '<br>' + 'Address:' + '<br>' + $(this).find(':selected').text() + '</p>';
                    var myinfowindow = new google.maps.InfoWindow({ content: html}); 
                    addressMarker = new google.maps.Marker({
                      position: new google.maps.LatLng(lat, lng),
                      title: 'Territory: ' + territory + '\n' + 'Address:' + '\n' + $(this).find(':selected').text() ,
                      draggable: false,
                      icon: image,
                      map: map,
                      infowindow: myinfowindow
                    });
                    
                    $('#searchSelect').empty();
                    document.getElementById("searchSelect").style.display='none';                     
                   // map.panTo(addressMarker.getPosition()); 
                    map.setCenter(addressMarker.getPosition());
                    map.setZoom(19);
//                    map.zoomOut();
                });
                
                $("#mobilemenudisplay").hover(function (){   
                   document.getElementById("mobilemenucontrol").style.width = menuwidth.toString() + "%";
                   document.getElementById("mobilemenucontrol").style.display = 'block';
                   document.getElementById("myleft2").style.width = "0"; 
                   document.getElementById("main1").style.marginLeft = "0";
                   document.getElementById("banner").style.marginLeft = "0";
                });     
                
                $("#desktopmenudisplay").hover(function (){   
                   document.getElementById("menucontrol").style.width = menuwidth.toString() + "%";
                   document.getElementById("menucontrol").style.display = 'block';
                   document.getElementById("myleft2").style.width = "0"; 
                   document.getElementById("main1").style.marginLeft = "0";
                   document.getElementById("banner").style.marginLeft = "0";                   
                });                                                                  
                
                $(".closebtn").click(function (){  
                    document.getElementById("mobilemenucontrol").style.width = "0";                     
                    document.getElementById("main1").style.marginLeft = "0"; 
                    document.getElementById("banner").style.marginLeft = "0";                     
                    document.getElementById("myleft2").style.width = "0"; 
                 });                                 
                 
                $("#mobileselectterritory").click(function (){  
                   document.getElementById("myleft2").style.width = "100%";                      
                   document.getElementById("mobilemenucontrol").style.width = "0";  
                   document.getElementById("main1").style.width = "0";  
                   document.getElementById("banner").style.width = "0";                   
                 });  
                 
                $("#selectterritory").click(function (){  
                   territorynavigation = true
                   document.getElementById("main1").style.marginLeft = "400px";   
                   document.getElementById("banner").style.marginLeft = "400px";                     
                   document.getElementById("myleft2").style.width = "400px";                       
                   document.getElementById("menucontrol").style.width = "0";  
                 
                 });                  
                 
                $("main").hover(function (){         
                   // document.getElementById("myleft2").style.width = "0";  
                    document.getElementById("mobilemenucontrol").style.width = "0";     
                    document.getElementById("menucontrol").style.width = "0";                       
                    if(territorynavigation === false){
                        document.getElementById("main1").style.marginLeft = "0";
                        document.getElementById("banner").style.marginLeft = "0";                        
                    }; 
                });
                
                $("#banner").hover(function (){
                    document.getElementById("mobilemenucontrol").style.width = "0";
                    document.getElementById("menucontrol").style.width = "0";              
                    if(territorynavigation === false){
                        document.getElementById("main1").style.marginLeft = "0";
                        document.getElementById("banner").style.marginLeft = "0";                        
                    }; 
                });                 
                
                $(".closebuttonright").click(function (){ 
                    document.getElementById("mobilemenucontrol").style.width = "0";     
                    document.getElementById("menucontrol").style.width = "0";                       
                    if(territorynavigation === false){
                        document.getElementById("main1").style.marginLeft = "0";
                        document.getElementById("banner").style.marginLeft = "0";                        
                    };                     
                });                    
                    
                
              
            });
        </script>
        
        </div>
    </body>
</html>
