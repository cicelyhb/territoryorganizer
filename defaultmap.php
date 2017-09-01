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
        <link rel="stylesheet" type="text/css" href="main.css">
    </head>
    <body>
        <div id="sample" style="width:1400px; height:750px;"></div>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1Fdvd0EPg3knllyj9gBhZ8tFoxuWQOTU" type="text/javascript"></script>  
        <script type="text/javascript">
        <?php
            $LatLng_Terr = "28.4831620,-81.2966469";
            echo "var mapOptions = {center:new google.maps.LatLng($LatLng_Terr),zoom:17};",PHP_EOL;
            echo "var map = new google.maps.Map(document.getElementById(\"sample\"), mapOptions);",PHP_EOL;
            echo "var marker = new google.maps.Marker({",PHP_EOL;
            echo "position: new google.maps.LatLng($LatLng_Terr),",PHP_EOL;
            echo "map: map,",PHP_EOL;
            echo "draggable: false",PHP_EOL;
            echo "});",PHP_EOL; 
        
        ?>

       </script>
    </body>
</html>
