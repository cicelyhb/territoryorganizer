<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include("db_ConnectionInfo.php");
        include("MyClassLibrary.php");

// Gets data from URL parameters
          $confirmation = $_GET['confirm'];
          //$confirmation = 'P77o9T84NE7EoP9T64NI7EPP9T64NI13EP9T33NO';
          $verifyacccount = new Login($host,$username,$password,$database,$port,$socket);
          $verifyacccount->emailverification($confirmation);
          $verifyacccount->close();
          
          
        ?>
    </body>
</html>
