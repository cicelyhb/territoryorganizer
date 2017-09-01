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
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1Fdvd0EPg3knllyj9gBhZ8tFoxuWQOTU" type="text/javascript"></script>
<!--        <div id="map" style="width:1400px; height:750px;"></div>-->
        <div id="map" style="width:100%; height:850px; padding:0px"></div>
        <script src="scripts/myscripts.js"></script>
        <script type="text/javascript"> 
      
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 7,
          center: {lat: 41.879, lng: -87.624}  // Center the map on Chicago, USA.
        }); 
        
        
            var polygonCoordinates = [
            {lat: 41.43449, lng: -95.86670},
            {lat: 41.47566, lng: -95.63599},
            {lat: 41.45920, lng: -94.62524},
            {lat: 41.45920, lng: -94.25171},
            {lat: 41.54148, lng: -93.91113},
            {lat: 41.58258, lng: -93.73535},
            {lat: 40.58058, lng: -93.81226},
            {lat: 40.42186, lng: -93.92212},
            {lat: 40.13689, lng: -93.98804},
            {lat: 39.97712, lng: -94.06494},
            {lat: 39.72409, lng: -94.14185},
            {lat: 39.49556, lng: -94.21875},
            {lat: 39.21523, lng: -94.38354},
            {lat: 39.03625, lng: -94.51538},
            {lat: 39.09596, lng: -94.72412},
            {lat: 39.38526, lng: -94.75708},
            {lat: 39.71564, lng: -94.79004},
            {lat: 39.85915, lng: -94.84497},
            {lat: 40.00237, lng: -95.19653},
            {lat: 40.08648, lng: -95.25146},
            {lat: 40.19566, lng: -95.42725},
            {lat: 40.50545, lng: -95.59204},
            {lat: 40.63897, lng: -95.81177},
            {lat: 40.84706, lng: -95.78979},
            {lat: 41.15384, lng: -95.83374},
            {lat: 41.39329, lng: -95.84473},
            {lat: 41.43449, lng: -95.86670}
        
    ];
    
          var myPolygon = new google.maps.Polygon({
                paths: polygonCoordinates,
                strokeColor: '#FF0000',
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: '#FF0000',
                fillOpacity: 0.35              
          });
          myPolygon.setMap(map);    
        <?php
        // put your code here
        ?>
       </script>            
    </body>
</html>
