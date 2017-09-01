<!--<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
   ob_start();
   session_start();
   
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Territory Organizer</title>
        <link rel="stylesheet" type="text/css" href="main.css">  
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
         <script>
//            $(document).ready(function(){
//                $("myloginbox").click()(function(){
//                     $(".loginbox").hide();
//                });
//            });
           </script>        
    </head>
    <link rel="shortcut icon" href="icons/TO_smalllogo.png" type="image/png" />
    <body>
        <div id="banner" class="top">
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

               echo '<td id="myname" align="center" class="menucenter"><a href = "welcome.php" class="menutitle">Territory Organizer</a></td>',PHP_EOL;    

                echo '<td class="menuright">',PHP_EOL;                
                echo '<div id="msg" style="display:block;">',PHP_EOL;               
                if(!empty($_SESSION['username'])){ 
                    echo '<font color = "white">'.$_SESSION['username'].'</font>',PHP_EOL;   
                }                    
                echo '</div>',PHP_EOL;  
                echo '</td>',PHP_EOL; 
               
               echo '<td align="right">',PHP_EOL;
//                   echo '<div id="signup" class="dropdown"><button class="dropbtn">Signup</button></div>',PHP_EOL;  
               echo '<div id="signup"><a href = "#" class="menu">Login</a></div>',PHP_EOL;                     
               echo '</td>',PHP_EOL;                   
               
                         
               echo '</tr>',PHP_EOL;
               echo '</table>',PHP_EOL;
            ?>
        </div>
        
        <div id="mobilemenucontrol" class="sideleftnav">
        <script src="scripts/menu.js"></script> 
        <table>
            <tr><td><a href = "#" class="button" style="width: 100px;color: white;font-size: 12px;">Contact Us</a></td></tr>        
        </table> 
        </div>             
        
        <div id="menucontrol" class="sideleftnav">
        <script src="scripts/menu.js"></script>          
        <table>
            <tr><td><a href = "#" class="button" style="width: 100px;color: white;font-size: 12px;">Contact Us</a></td></tr>        
        </table>        
        </div>
        
        
        <div id="mysignupbox" class="signupbox">        
        <script src="scripts/menu.js"></script>
        <script src="scripts/myscripts.js"></script>
        <div id="mylogin" style="display:block;">
           <?php 
                include("login.php");           
           ?> 
            
            <center><a href="#" id="showsignup">Signup?</a></center>
        </div>
<!--           <a href="#" class="closebtn" onclick="closeSignup()">&times;</a>-->
        <div id="mysignup" style="display:none;">
        <div class = "container form-signup">
        <div class = "container">      
         <form class = "form-signup" role = "form" 
               action = "createaccount.php" method = "post" onsubmit = "return validations()">               
<!--               action = "createaccount.php" method = "post" onsubmit = "return validations()">-->
             <div id="search" style="display:block;">
             <table>          
                 <tr>
                     <th<h2><u>Search Congregation</u></h2></th>
                </tr>                
                </table>
                 <table>
                        <tr>
                            <td><input type = "text"   name = "congregation_zipcode" id = "congregation_zipcode" placeholder="Zipcode" style="width: 80px;"></td> 
                            <td><input type = "button" name = "searchcongregation" id = "searchcongregation"  value = "Search by Zipcode" style="padding: 8px 32px;"></td>                                                        
                        </tr> 
                 </table>
                <table>
                    <tr><td>Congregation*</td></tr>
                    <tr><td><select name = "congregation" id = "congregation" style="width: 270px;"></select></td></tr>
                </table>             
             <br>
             </div>
             <div id="new_cong" style="display:none;">
                <table> 
                 <tr>
                     <th<h2><u>Create Congregation</u></h2></th>
                </tr>
                    <tr>
                        <td>Will you be a responsible administrator for your congregation?</td>
                    </tr> 
                </table>
                <table>
                    <tr>
                        <form action="">
                        <td><input type="radio" name="admin_yesno" id = "admin_yes" value="yes" style="width: 30px;" onclick="check('new_cong2')">Yes</td>
                        <td><input type="radio" name="admin_yesno" id = "admin_no"  value="no"  style="width: 30px;" onclick="check('new_cong2')" checked>No</td>
                        </form>
                    </tr>
                </table>
                <div id="new_cong2" style="display:none;">
                <table>
                    <tr><td>Language*</td></tr>
                    <tr><td><select name = "language" id="language" style="width: 200px;"></select></td></tr>
                </table>                  
                <table>
                    <tr>
                        <td>CongregationID*</td>
                        <td>Congregation Name*</td>
                    </tr> 
                    <tr>
                         <td><input type = "text" name = "congregationID" id="congregationID" style="width: 120px;"></td>
                         <td><input type = "text" name = "congregationname"   id="congregationname" style="width: 220px;" ></td>                        
                    </tr>                    
                </table> 
                 <table>
                        <tr>
                            <td>Address*</td>
                            <td>Apt/Unit</td>
                        </tr>
                        <tr>
                            <td><input type = "text" name = "congregationaddress"   id="congregationaddress" placeholder="Address" style="width: 270px;"></td>                                
                            <td><input type = "text" name = "congregationunit" id="congregationunit" style="width: 70px;"></td>
                        </tr>
                 </table>
                 <table>
                        <tr>
                            <td>City*</td>
                            <td>State*</td>
                            <td>Zipcode*</td>
                        </tr>
                        <tr>
                            <td><input type = "text" name = "congregationcity" id="congregationcity" placeholder="City"></td>
                            <td><select name = "congregationstate" id="congregationstate"></select></td>
                            <td><input type = "text" name = "congregationzipcode" id="congregationzipcode" placeholder="Zipcode" style="width: 80px;"></td>
                        </tr>                       
                        <tr><td>Phone (optional)</td></tr>
                        <tr>
                            <td><input type = "text" name = "phone" id="phone" placeholder="(999)999-9999" ></td>
                            <td><input type = "button" name = "authorize" id = "authorize"  value = "Authorization" onclick="geoCodedAddress()" style="padding: 8px 32px;"></td> 
                            <td><h4 id = "geoComplete"></h4></td>
                        </tr>
                        <tr>
                            <td><input type = "hidden" name = "formattedaddress" id="formattedaddress" value = "" ></td>
                            <td><input type = "hidden" name = "latitude" id="latitude" value = "" ></td>
                            <td><input type = "hidden" name = "longitude" id="longitude" value = "" ></td>
                        </tr>
               </table>
               </div>
               <br>
               </div>             
             <table>
          
                 <tr>
                     <th<h2><u>Create Profile</u></h2></th>
                </tr>                
                </table>
                 <table>
                        <tr>
                            <td>Firstname*</td>
                            <td>M</td>
                            <td>Lastname*</td>
                            <td>Suffix</td>
                        </tr>
                        <tr>
                            <td><input type = "text" name = "firstname"  id="firstname" placeholder="Firstname" style="width: 150px;" required></td>
                            <td><input type = "text" name = "middleinit" id="middleinit" style="width: 20px;"></td>
                            <td><input type = "text" name = "lastname"   id="lastname" placeholder="Lastname" style="width: 150px;" required></td>
                            <td>
                                <select name = "suffix" id="suffix">
                                    <option value=""></option>
                                    <option value="Jr">Jr</option>
                                    <option value="Sr">Sr</option>
                                    <option value="II">II</option>
                                    <option value="III">III</option>
                                </select>
                            </td>
                        </tr>
                </table>
                 <table>
                        <tr>
                            <td>Address*</td>
                            <td>Apt/Unit</td>
                        </tr>
                        <tr>
                            <td><input type = "text" name = "address" id="address" placeholder="Address" style="width: 270px;" required></td>                                
                            <td><input type = "text" name = "apartment" id="apartment" style="width: 70px;"></td>
                        </tr>
                 </table>
                 <table>
                        <tr>
                            <td>City*</td>
                            <td>State*</td>
                            <td>Zipcode*</td>
                        </tr>
                        <tr>
                            <td><input type = "text" name = "city" id="city" placeholder="City" required></td>
                            <td><select name = "state" id="state" required></select></td>
                            <td><input type = "text" name = "zipcode" id="zipcode" placeholder="Zipcode" style="width: 80px;" required></td>
                        </tr>
               </table>
             <br>
             <table> 
                 <tr>
                     <th<h2><u>Create Account</u></h2></th>
                </tr>                  

                     <tr><td>Username*</td></tr>
                     <tr><td><input type = "text" name = "username" id="username" placeholder = "username" required></td></tr>

                     <tr>
                         <td>Email*</td>
                         <td>Confirm Email*</td>
                     </tr>
                     <tr>
                         <td><input type = "text" name = "email"  placeholder = "email" ></td>
                         <td><input type = "text" name = "confirmemail" placeholder = "confirm email" ></td>
                     </tr>

                    <tr>
                        <td>Password*</td>
                        <td>Confirm Password*</td>
                    </tr>
                    <tr>
                        <td><input type = "password"  name = "password"  placeholder = "password" required></td>
                        <td><input type = "password"  name = "confirmpassword"  placeholder = "confirm password" required></td>
                    </tr>
                <br>                    
                </table>               
                <table>              
                <tr>
                    <td><input type = "button" name = "cancel" id="cancel"  value = "Cancel" onclick="closeSignup()"></td>  
                    <td><input type = "button" name = "createcongregation" id="createcongregation"  value = "Create Congregation" onclick="expandSection('new_cong','search','createcongregation')" ></td>
                    <td><input type = "submit" name = "create" value = "Create Account"></td>                       
                </tr>
                 <tr><td>
                    <h2 id = "errormessage"> </h2>
                 </td></tr>   
             </table>
         </form>
      </div>  
     </div>   
        </div>  
        </div>
        <div id="main1" class="bg">
         <script src="scripts/menu.js"></script>          
            <?php
//             echo '<div id="default" style="display:block;">',PHP_EOL;
//             echo '<center>',PHP_EOL; 
//             echo '<h1>Welcome to Territory Manager</h1>',PHP_EOL;
//             echo '</center>',PHP_EOL;
//             echo '<center>',PHP_EOL;
//             echo '<p>This application will help you to better manager your territory.</p>',PHP_EOL;
//             echo '</center>',PHP_EOL;
//             echo '<center><img src="icons/streetmap.png" alt="Street Map"></center>',PHP_EOL;
//             echo '</div>',PHP_EOL;
            ?>
        </div>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>  
      <script>
          var myObj;
          var language_fill = 0;
          var state_fill = 0;
          fill_dropdowns();
          $(document).ready(function(){
                    $("#searchcongregation").click(function(){
                        if(myObj){
                            $("select#congregation option[value='']").remove();
                            for (var i=0;i<myObj.length;i++){
                                $("select#congregation option[value='" + myObj[i].CongregationID + "']").remove();
                            }
                        }
                            myObj = null;
                                                      
                            var zipcode = escape(document.getElementById("congregation_zipcode").value);
                            var xmlhttp = new XMLHttpRequest();
                            xmlhttp.onreadystatechange = function() {
                                if (this.readyState == 4 && this.status == 200) {
                                     myObj = JSON.parse(this.responseText);
                                     if(myObj.length>0){
                                        var option='<option value="">' + 'Select an option' + '</option>';
                                        for (var i=0;i<myObj.length;i++){
                                        //$('#congregation').append('<option value="' + myObj[i].CongregationID + '">' + myObj[i].Congregation + '</option>');
                                         option += '<option value="' + myObj[i].CongregationID  + '">' + myObj[i].Congregation + '</option>';                                  
                                        }
                                        $('#congregation').append(option);
                                     }
                                }
                            };
                            xmlhttp.open("GET", "CongregationID.php?zipcode=" + zipcode.toString(), true);
                            xmlhttp.send();
                                    
                            });
            });
            
            function check(showHide) {
                var hideShowDiv;
                hideShowDiv = document.getElementById(showHide);                 
                if(document.getElementById("admin_yes").checked){
                    hideShowDiv.style.display = 'block';
                    document.getElementById('congregation').required=false;
                    document.getElementById('language').required=true;
                    document.getElementById('congregationID').required=true;
                    document.getElementById('congregationname').required=true;
                    document.getElementById('congregationaddress').required=true;
                    document.getElementById('congregationcity').required=true;
                    document.getElementById('congregationstate').required=true;
                    document.getElementById('congregationzipcode').required=true;
                }
                else{
                    hideShowDiv.style.display = 'none';
                    document.getElementById('congregation').required=true;
                    document.getElementById('language').required=false;
                    document.getElementById('congregationID').required=false;
                    document.getElementById('congregationname').required=false;
                    document.getElementById('congregationaddress').required=false;
                    document.getElementById('congregationstate').required=false;
                    document.getElementById('congregationcity').required=false;
                    document.getElementById('congregationzipcode').required=false;
                }
           }
            
            function fill_dropdowns(){
                if (language_fill==0){
                    language_fill=1;
                    
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                             var langObj = JSON.parse(this.responseText);
                             if(langObj.length>0){
                                var option='<option value="">' + 'Select an option' + '</option>';
                                for (var i=0;i<langObj.length;i++){
                                 option += '<option value="' + langObj[i].LanguageID  + '">' + langObj[i].Language + '</option>';                                  
                                }
                                $('#language').append(option);
                             }
                        }
                    };
                    xmlhttp.open("GET", "LanguageID.php", true);
                    xmlhttp.send();                    
                }
                
                
                if (state_fill==0){
                    state_fill=1;
                    
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                             var stateObj = JSON.parse(this.responseText);
                             if(stateObj.length>0){
                                var option='<option value="">' + 'Select an option' + '</option>';
                                for (var i=0;i<stateObj.length;i++){
                                 option += '<option value="' + stateObj[i].StateID  + '">' + stateObj[i].State + '</option>';                                  
                                }
                                $('#state').append(option);
                                $('#congregationstate').append(option);
                             }
                        }
                    };
                    xmlhttp.open("GET", "StateID.php", true);
                    xmlhttp.send();  
                                        
                }                
            }
            
     function geoCodedAddress(){       
       var caddress = document.getElementById('congregationaddress').value +  ',+' + document.getElementById('congregationcity').value + ',+' + document.getElementById('congregationstate').value + '+' + document.getElementById('congregationzipcode').value;       

            //alert(caddress.replace(new RegExp(' ', 'g'), '+'));
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                         var myJSONResult = JSON.parse(this.responseText);
//                         for (i = 0; i < myJSONResult.results.length; i++) {
//                             alert('id: ' +  i.toString() + ' ' + myJSONResult.results[i].formatted_address);
//                             alert('id: ' +  i.toString() + ' ' + myJSONResult.results[i].geometry.location.lat);
//                             alert('id: ' +  i.toString() + ' ' + myJSONResult.results[i].geometry.location.lng);
//                          }
                          $('#formattedaddress').val(myJSONResult.results[0].formatted_address);                          
                          $('#latitude').val(myJSONResult.results[0].geometry.location.lat);                          
                          $('#longitude').val(myJSONResult.results[0].geometry.location.lng);

                       // alert(this.responseText);
                    }
                };
                xmlhttp.open("GET", "https://maps.googleapis.com/maps/api/geocode/json?address=" + caddress.replace(new RegExp(' ', 'g'), '+') + "&key=AIzaSyB1Fdvd0EPg3knllyj9gBhZ8tFoxuWQOTU", true);
                xmlhttp.send(); 
                $('#geoComplete').html('Complete!');
     }
     
     function validations(){
     
         return true;
     }
     
     
    $(document).ready(function(){
        var screen = Number($(window).width());
        var menuwidth = Math.round((200/screen)*100);

        var territorynavigation = false;
        if(screen<768){
            document.getElementById("msg").style.display = 'none';
            document.getElementById("myname").innerHTML = '<a href = "welcome.php" class="menutitle"><img src = "icons/TO_logo.png"></a>';
            document.getElementById("mobilemenu").style.display = 'block';
            document.getElementById("desktopmenu").style.display = 'none';
        };
            
        if(screen>=768 && screen<=1024){
            document.getElementById("msg").style.display = 'none'; 
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
                     
        1 
        $("#signup").hover(function (){
           if(screen>=768){
               document.getElementById("mysignupbox").style.marginLeft = "650px";
               document.getElementById("mysignupbox").style.width = "550px"; 
              // alert(document.getElementById("banner").style.)
           }//document.getElementById("main1").style.width - 550;  
           if(screen<768){
             var hideShowDiv1;
             var hideShowDiv2;
             hideShowDiv1 = document.getElementById('mylogin'); 
             hideShowDiv2 = document.getElementById('mysignup'); 
             
             hideShowDiv1.style.display = 'block';
             hideShowDiv2.style.display = 'none';
             document.getElementById("mysignupbox").style.width = "100%";
           }
           

        });   
        
        $("#showsignup").click(function () {
             var hideShowDiv1;
             var hideShowDiv2;
             hideShowDiv1 = document.getElementById('mylogin'); 
             hideShowDiv2 = document.getElementById('mysignup'); 
             
             hideShowDiv1.style.display = 'none';
             hideShowDiv2.style.display = 'block';
            
        });
          
        
        $("#main1").hover(function (){
            document.getElementById("menucontrol").style.width = "0"; 
            document.getElementById("mobilemenucontrol").style.width = "0"; 
            document.getElementById("mysignupbox").style.width = "0"; 
        });           

    });


      </script>
    </body>
</html>
