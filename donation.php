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
        <title>Donation</title>
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
        echo '<tr><td><a href = "#" class="button" style="width: 90%;color: white;font-size: 12px;">Contact Us</a></td></tr>',PHP_EOL;      
        echo '<tr><td><div id="signout2" style="display:none;"><a href = "logout.php" class="button" style="width: 90%;color: white;font-size: 12px;">Sign Out</a></div></td></tr>',PHP_EOL;         
        echo '</table>',PHP_EOL;  
        ?>   
        </div>         
        
        
        <div id="menucontrol" class="sideleftnav">
        <script src="scripts/menu.js"></script> 
        <?php
        echo '<table>',PHP_EOL;                   
        echo '<tr><td><a href = "#" class="button" style="width: 90%;color: white;font-size: 12px;">Contact Us</a></td></tr>',PHP_EOL;        
        echo '</table>',PHP_EOL;  
        ?>   
        </div>            
        
        <div id="main1" class="staticmain">
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1Fdvd0EPg3knllyj9gBhZ8tFoxuWQOTU" type="text/javascript"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>            
        <script src="scripts/myscripts.js"></script>
        
        <p>Thank you for using Territory Organizer. This website is free to use, however, it will be greatly appreciative to consider the cost 
           to keep this site up and running. Every little contribution can help with the expense. To Donate to website, please click on the following paypal link.
        </p>
        <br>
        <form name="" method="post">                
        <input type="hidden" name="cmd" value="_xclick"> 
        <input type="hidden" name="business" value="me@mybiz.com">
        <input type="hidden" name="item_name" value="Team In Training"> 
        <input type="hidden" name="currency_code" value="USD"> 
        <input type="hidden" name="amount" value="2.50"> 
        <input type="image" src="http://www.paypal.com/en_US/i/btn/x-click-butcc-donate.gif" border="0" name="submit" alt="Make payments with PayPal - it'.$sngquote.'s fast, free and secure!">
        </form>
        <script type="text/javascript">  
        <?php 
            echo 'var congregationNumber = "'.$congregationnumber.'";',PHP_EOL;
            echo 'var username = "'.$_SESSION['username'].'";',PHP_EOL;            
        ?>            
        
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
