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
        <link rel="stylesheet" type="text/css" href="myStyle.css">
    </head>
<body>
        <div id="sample" style="width:1580px; height:900px;"></div>
<!--        <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>-->
        <title>Google Maps JavaScript API Example: Map Simple</title>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1Fdvd0EPg3knllyj9gBhZ8tFoxuWQOTU" type="text/javascript"></script>
        <script type="text/javascript">
                          
            var d = new Date();
            var marker_resident = [];
            var marker_resident_home = [];
            var marker_resident_nt = [];
            var marker_phone = [];
            var marker_phone_home = [];
            var marker_phone_nt = [];
            var marker_dnc = [];
            var resident_layer = [[]]; //[[html,latitude,longitude]]
            var resident_layer_home = [[]]; //[[html,latitude,longitude]]
            var resident_layer_nt = [[]]; //[[html,latitude,longitude]]            
            var phone_layer = [[]]; //[[html,latitude,longitude]]
            var phone_layer_home = [[]]; //[[html,latitude,longitude]]
            var phone_layer_nt = [[]]; //[[html,latitude,longitude]]            
            var dnc_layer = [[]]; //[[html,latitude,longitude]]
            
            var marker_apt = [];
            var layer_apt = [];
            var marker_resident_apt = [];
            var marker_resident_home_apt  = [];
            var marker_resident_nt_apt  = [];
            var marker_phone_apt  = [];
            var marker_phone_home_apt  = [];
            var marker_phone_nt_apt  = [];
            var marker_dnc_apt  = [];
            var resident_layer_apt  = [[]]; //[[html,latitude,longitude]]
            var resident_layer_home_apt  = [[]]; //[[html,latitude,longitude]]
            var resident_layer_nt_apt  = [[]]; //[[html,latitude,longitude]]            
            var phone_layer_apt  = [[]]; //[[html,latitude,longitude]]
            var phone_layer_home_apt  = [[]]; //[[html,latitude,longitude]]
            var phone_layer_nt_apt  = [[]]; //[[html,latitude,longitude]]            
            var dnc_layer_apt  = [[]]; //[[html,latitude,longitude]]
            

        <?php
        include("coordinates.php"); 
        include("db_ConnectionInfo.php");
        include("MyClassLibrary.php");
        
        // Gets data from URL parameters
        $Territory = $_GET['territory'];
        
//        $Territory = 3;
        
        
        if($Territory==1)
            {
              echo "var mapOptions = {center:new google.maps.LatLng($LatLng_Terr1),zoom:17};",PHP_EOL;
              $PolygonTerr = $PolygonTerr1;   
              $NorthArrow = $NorthArrowTerr1;
            }
        if($Territory==2)
            {
              echo "var mapOptions = {center:new google.maps.LatLng($LatLng_Terr2),zoom:17};",PHP_EOL;
              $PolygonTerr = $PolygonTerr2; 
              $NorthArrow = $NorthArrowTerr2;
            }
        if($Territory==3)
            {
              echo "var mapOptions = {center:new google.maps.LatLng($LatLng_Terr3),zoom:17};",PHP_EOL;
              $PolygonTerr = $PolygonTerr3;
              $NorthArrow = $NorthArrowTerr3;
            }
            
        echo "var map = new google.maps.Map(document.getElementById(\"sample\"), mapOptions);",PHP_EOL;
        echo "// Construct the polygon.",PHP_EOL;
        echo "var Polygon = new google.maps.Rectangle({",PHP_EOL;
        echo "strokeColor: '#072f72',",PHP_EOL;
        echo "strokeOpacity: 0.8,",PHP_EOL;
        echo "strokeWeight: 5,",PHP_EOL;
        echo "fillColor: '#072f72',",PHP_EOL;
        echo "fillOpacity: 0,",PHP_EOL;
        echo "map:map,",PHP_EOL;
        echo $PolygonTerr,PHP_EOL;
        echo "});",PHP_EOL;  
        
        echo "var marker = new google.maps.Marker({",PHP_EOL;
        echo "position: new google.maps.LatLng($NorthArrow),",PHP_EOL;
        echo "icon: {path: google.maps.SymbolPath.FORWARD_CLOSED_ARROW, scale: 12},",PHP_EOL;
        echo "map: map,",PHP_EOL;
        echo "draggable: false,",PHP_EOL;
        echo "});",PHP_EOL;
             
             
 
        $mapLayer= new Layer($server,$database,$username,$password);
        
        //Build Select query
        $where1 = "TerritoryNumber = ".$Territory." AND Apartment IS NULL AND bPhone = 0 AND Type NOT IN ('DNC','HH','NTR')";
        $mapLayer->MapA($where1,"resident_layer","marker_resident",false);              
         //Build Select query
        $where2 = "TerritoryNumber = ".$Territory." AND Apartment IS NULL AND bPhone = 0 AND Type = 'HH'";
        $mapLayer->MapA($where2,"resident_layer_home","marker_resident_home",false);                             
        //Build Select query
        $where3 = "TerritoryNumber = ".$Territory." AND Apartment IS NULL AND bPhone = 0 AND Type = 'NTR'";
        $mapLayer->MapA($where3,"resident_layer_nt","marker_resident_nt",false);                
        //Build Select query
        $where4 = "TerritoryNumber = ".$Territory." AND Apartment IS NULL AND bPhone = 1 AND Type NOT IN ('DNC','HH','NTR')";
        $mapLayer->MapA($where4,"phone_layer","marker_phone",true);                       
        //Build Select query
        $where5 = "TerritoryNumber = ".$Territory." AND Apartment IS NULL AND bPhone = 1 AND Type = 'HH'";
        $mapLayer->MapA($where5,"phone_layer_home","marker_phone_home",true);                         
        //Build Select query
        $where6 = "TerritoryNumber = ".$Territory." AND Apartment IS NULL AND bPhone = 1 AND Type = 'NTR'";
        $mapLayer->MapA($where6,"phone_layer_nt","marker_phone_nt",true);                         
        //Build Select query
        $where7 = "TerritoryNumber = ".$Territory." AND Apartment IS NULL AND Type = 'DNC'";
        $mapLayer->MapA($where7,"dnc_layer","marker_dnc",false);  
        //Build Select query
//        $param =  array(array('"Layer"=>"resident_layer_apt ","Marker"=>"marker_resident_apt ","bPhone"=>0,"Type"=>"DNC:HH:NTR"'),
//                        array('"Layer"=>"resident_layer_home_apt ","Marker"=>"marker_resident_home_apt ","bPhone"=>0,"Type"=>"HH"'),     
//                        array('"Layer"=>"resident_layer_nt_apt ","Marker"=>"marker_resident_nt_apt ","bPhone"=>0,"Type"=>"NTR"'),
//                        array('"Layer"=>"phone_layer_apt ","Marker"=>"marker_phone_apt ","bPhone"=>1,"Type"=>"DNC:HH:NTR"'),
//                        array('"Layer"=>"phone_layer_home_apt ","Marker"=>"marker_phone_home_apt ","bPhone"=>1,"Type"=>"HH"'),
//                        array('"Layer"=>"phone_layer_nt_apt ","Marker"=>"marker_phone_nt_apt ","bPhone"=>1,"Type"=>"NTR"'),
//                        array('"Layer"=>"dnc_layer_apt ","Marker"=>"marker_dnc_apt ","bPhone"=>-1,"Type"=>"DNC"'),
//            );
//        
//        $where8 = "TerritoryNumber = ".$Territory; 
//        $mapLayer->MapB($where8,"layer_apt","marker_apt",$param);
        $mapLayer->close();

        
        
        ?>
   

   
    CreateMarker(marker_resident,resident_layer,'http://localhost/PhpDbProject/icons/House_NH.png','http://localhost/PhpDbProject/icons/House_MouseOver.png');
    CreateMarker(marker_resident_home,resident_layer_home,'http://localhost/PhpDbProject/icons/House_H.png','http://localhost/PhpDbProject/icons/House_MouseOver.png');
    CreateMarker(marker_resident_nt,resident_layer_nt,'http://localhost/PhpDbProject/icons/House_NT.png','http://localhost/PhpDbProject/icons/House_MouseOver.png');
    CreateMarker(marker_phone,phone_layer,'http://localhost/PhpDbProject/icons/Phone_NH.png','http://localhost/PhpDbProject/icons/Phone_MouseOver.png');
    CreateMarker(marker_phone_home,phone_layer_home,'http://localhost/PhpDbProject/icons/Phone_H.png','http://localhost/PhpDbProject/icons/Phone_MouseOver.png');
    CreateMarker(marker_phone_nt,phone_layer_nt,'http://localhost/PhpDbProject/icons/Phone_NT.png','http://localhost/PhpDbProject/icons/Phone_MouseOver.png');
    CreateMarker(marker_dnc,dnc_layer,'http://localhost/PhpDbProject/icons/DNC.png','http://localhost/PhpDbProject/icons/DNC_MouseOver.png');

  
    function expandCollapse(showHide,expand) {
        var hideShowDiv;
        var label;        

        hideShowDiv = document.getElementById(showHide);      
        label = document.getElementById(expand);

        if (hideShowDiv.style.display == 'none') {
            label.innerHTML = label.innerHTML.replace("[+]", "[-]");
            hideShowDiv.style.display = 'block';            
        } else {
            label.innerHTML = label.innerHTML.replace("[-]", "[+]");
            hideShowDiv.style.display = 'none';

        }
    }
    
    

    
    function CreateMarker(marker,layer,icon,mouseoverIcon){
        for (var i = 0; i <layer.length; i++) {
               //create marker

               var myinfowindow = new google.maps.InfoWindow({ content: layer[i][0] });

               marker.push(new google.maps.Marker({
                   position: new google.maps.LatLng(layer[i][1], layer[i][2]),
                   icon: icon,
                   map: map,
                   draggable: false,
                   infowindow: myinfowindow

               }));

               marker[i].setMap(map);

               google.maps.event.addListener(marker[i], "click", function () {this.infowindow.open(map, this);});
               google.maps.event.addListener(marker[i], "mouseover",function() {this.setIcon(mouseoverIcon);});
               google.maps.event.addListener(marker[i], "mouseout",function() {this.setIcon(icon);});   
        }
    }

    function disable(){
        var bPhone = escape(document.getElementById("bPhone").value);
        document.getElementById("Language").disabled = true;
        document.getElementById("Type").disabled = true;
        if (bPhone=="true"){
         document.getElementById("PhoneType").disabled = true;}
       
    }

    function enable(){
        var bPhone = escape(document.getElementById("bPhone").value);
        document.getElementById("Language").disabled = false;
        document.getElementById("Type").disabled = false;
        if (bPhone=="true"){
         document.getElementById("PhoneType").disabled = false;}

    }
    
    
    function TerritoryType(type)
    {
        switch(type)
        {
            case "DNC":
             return "Do Not Call";
             break;
            case "HH":
             return "Home";
             break;
            case "NH":
             return "Not Home";
             break;
            case "NTR":
             return "No Trespassing";
             break;
        }


    }


    function openInfowindow(markername,index){
        switch  (markername){
                case "marker_resident_apt":
                  marker_resident_apt[index].infowindow.open(map, this);
                  break;
                case "marker_resident_home_apt":
                  marker_resident_home_apt[index].infowindow.open(map, this);
                  break;
                case "marker_resident_nt_apt":
                  marker_resident_nt_apt[index].infowindow.open(map, this);
                  break;
                case "marker_dnc_apt":
                  marker_dnc_apt[index].infowindow.open(map, this);
                  break;
                case "marker_phone_apt":
                  marker_phone_apt[index].infowindow.open(map, this);
                  break;
                case "marker_phone_home_apt":
                  marker_phone_home_apt[index].infowindow.open(map, this);
                  break;
                case "marker_phone_nt_apt":
                  marker_phone_nt_apt[index].infowindow.open(map, this);
                  break;
        }  // end of switch
    }
    
    
    function saveData() {
      const resident_home = 'http://localhost/PhpDbProject/icons/House_H.png';
      const resident_nothome = 'http://localhost/PhpDbProject/icons/House_NH.png';
      const resident_notres = 'http://localhost/PhpDbProject/icons/House_NT.png';
      const phone_home = 'http://localhost/PhpDbProject/icons/Phone_H.png';
      const phone_nothome = 'http://localhost/PhpDbProject/icons/Phone_NH.png';
      const phone_notres = 'http://localhost/PhpDbProject/icons/Phone_NT.png';
      const dnc = 'http://localhost/PhpDbProject/icons/DNC.png';
        
      var addressguid = escape(document.getElementById("AddressGUID").value);
      var type = escape(document.getElementById("Type").value);
      var language = escape(document.getElementById("Language").value);
      var bPhone = escape(document.getElementById("bPhone").value);
      var markername = escape(document.getElementById("markername").value);
      var index = parseInt(escape(document.getElementById("index").value));
      var initdate = escape(document.getElementById("InitDate").value);
      var phonetype;
      var n1; 
      var n2; 
      var n3; 
      var n4; 
      var n5; 
      var n6;
      
      var n1d; 
      var n2d;
      var n3d;
      var n4d; 
      var n5d;
      var n6d;   
      
      var N1_typedesc;
      var N2_typedesc;
      var N3_typedesc;
      var N4_typedesc;
      var N5_typedesc;
      var N6_typedesc;
      
      var n = escape(document.getElementById("Notes").value);
      var nt = parseInt(escape(document.getElementById("N_total").value));
      var d = new Date();
      //2016-11-04 12:40:54.907
      
      if(bPhone=="true")
      {
        phonetype = escape(document.getElementById("PhoneType").value);
      } else{phonetype="NC";}
      
      
      var datestring = d.getFullYear() + "-" + ZeroPadding(d.getMonth() + 1) + "-" + ZeroPadding(d.getDate()) + " " + ZeroPadding(d.getHours()) + ":" + ZeroPadding(d.getMinutes()) + ":" + ZeroPadding(d.getSeconds()) + "." + ZeroPadding(d.getMilliseconds());
      
      if(initdate=="")
      {
          initdate = datestring;
      }
      else if(Date(initdate)> Date('1/1/1900'))
      {
          initdate = datestring;
      }
      
      if(nt==1) 
      {
          n1 = escape(document.getElementById("N1").value);    
          n1d = escape(document.getElementById("N1_date").value);
          N1_typedesc = escape(document.getElementById("N1_typedesc").value);
      }
      
      if(nt==2) 
      {
          n1 = escape(document.getElementById("N1").value);    
          n1d = escape(document.getElementById("N1_date").value);
          N1_typedesc = escape(document.getElementById("N1_typedesc").value);
          
          n2 = escape(document.getElementById("N2").value);    
          n2d = escape(document.getElementById("N2_date").value); 
          N2_typedesc = escape(document.getElementById("N2_typedesc").value);
      }     

      if(nt==3) 
      {
          n1 = escape(document.getElementById("N1").value);    
          n1d = escape(document.getElementById("N1_date").value);
          N1_typedesc = escape(document.getElementById("N1_typedesc").value);
          
          n2 = escape(document.getElementById("N2").value);    
          n2d = escape(document.getElementById("N2_date").value); 
          N2_typedesc = escape(document.getElementById("N2_typedesc").value);
          
          n3 = escape(document.getElementById("N3").value);    
          n3d = escape(document.getElementById("N3_date").value); 
          N3_typedesc = escape(document.getElementById("N3_typedesc").value);
      }
       
      if(nt==4) 
      {
          n1 = escape(document.getElementById("N1").value);    
          n1d = escape(document.getElementById("N1_date").value);
          N1_typedesc = escape(document.getElementById("N1_typedesc").value);
          
          n2 = escape(document.getElementById("N2").value);    
          n2d = escape(document.getElementById("N2_date").value);
          N2_typedesc = escape(document.getElementById("N2_typedesc").value);
          
          n3 = escape(document.getElementById("N3").value);    
          n3d = escape(document.getElementById("N3_date").value);
          N3_typedesc = escape(document.getElementById("N3_typedesc").value);
          
          n4 = escape(document.getElementById("N4").value);    
          n4d = escape(document.getElementById("N4_date").value); 
          N4_typedesc = escape(document.getElementById("N4_typedesc").value);
      } 
       
      if(nt==5) 
      {
          n1 = escape(document.getElementById("N1").value);    
          n1d = escape(document.getElementById("N1_date").value);
          N1_typedesc = escape(document.getElementById("N1_typedesc").value);
          
          n2 = escape(document.getElementById("N2").value);    
          n2d = escape(document.getElementById("N2_date").value);
          N2_typedesc = escape(document.getElementById("N2_typedesc").value);
          
          n3 = escape(document.getElementById("N3").value);    
          n3d = escape(document.getElementById("N3_date").value); 
          N3_typedesc = escape(document.getElementById("N3_typedesc").value);
          
          n4 = escape(document.getElementById("N4").value);    
          n4d = escape(document.getElementById("N4_date").value);
          N4_typedesc = escape(document.getElementById("N4_typedesc").value);
          
          n5 = escape(document.getElementById("N5").value);    
          n5d = escape(document.getElementById("N5_date").value);
          N5_typedesc = escape(document.getElementById("N5_typedesc").value);
      }    
      
      if(nt==6) 
      {
          n1 = escape(document.getElementById("N1").value);    
          n1d = escape(document.getElementById("N1_date").value);
          N1_typedesc = escape(document.getElementById("N1_typedesc").value);
          
          n2 = escape(document.getElementById("N2").value);    
          n2d = escape(document.getElementById("N2_date").value);
          N2_typedesc = escape(document.getElementById("N2_typedesc").value);
          
          n3 = escape(document.getElementById("N3").value);    
          n3d = escape(document.getElementById("N3_date").value);
          N3_typedesc = escape(document.getElementById("N3_typedesc").value);
          
          n4 = escape(document.getElementById("N4").value);    
          n4d = escape(document.getElementById("N4_date").value); 
          N4_typedesc = escape(document.getElementById("N4_typedesc").value);
          
          n5 = escape(document.getElementById("N5").value);    
          n5d = escape(document.getElementById("N5_date").value); 
          N5_typedesc = escape(document.getElementById("N5_typedesc").value);
          
          n6 = escape(document.getElementById("N6").value);    
          n6d = escape(document.getElementById("N6_date").value); 
          N6_typedesc = escape(document.getElementById("N6_typedesc").value);
      }        
      
      
      var notes="<notes>";
      if(nt==6) 
      {         
          notes=notes + "<note><date>" + n2d + "</date><username>testuser</username><typedescription>" + N2_typedesc + "</typedescription><content>" + n2 + "</content></note>";
          notes=notes + "<note><date>" + n3d + "</date><username>testuser</username><typedescription>" + N3_typedesc + "</typedescription><content>" + n3 + "</content></note>";
          notes=notes + "<note><date>" + n4d + "</date><username>testuser</username><typedescription>" + N4_typedesc + "</typedescription><content>" + n4 + "</content></note>";    
          notes=notes + "<note><date>" + n5d + "</date><username>testuser</username><typedescription>" + N5_typedesc + "</typedescription><content>" + n5 + "</content></note>"; 
          notes=notes + "<note><date>" + n6d + "</date><username>testuser</username><typedescription>" + N6_typedesc + "</typedescription><content>" + n6 + "</content></note>";           
          notes=notes + "<note><date>" + datestring  + "</date><username>testuser</username><typedescription>" + TerritoryType(type) + "</typedescription><content>" + n + "</content></note>";          
      }        
      if(nt==5) 
      {
          notes=notes + "<note><date>" + n1d + "</date><username>testuser</username><typedescription>" + N1_typedesc + "</typedescription><content>" + n1 + "</content></note>";          
          notes=notes + "<note><date>" + n2d + "</date><username>testuser</username><typedescription>" + N2_typedesc + "</typedescription><content>" + n2 + "</content></note>";
          notes=notes + "<note><date>" + n3d + "</date><username>testuser</username><typedescription>" + N3_typedesc + "</typedescription><content>" + n3 + "</content></note>";
          notes=notes + "<note><date>" + n4d + "</date><username>testuser</username><typedescription>" + N4_typedesc + "</typedescription><content>" + n4 + "</content></note>";    
          notes=notes + "<note><date>" + n5d + "</date><username>testuser</username><typedescription>" + N5_typedesc + "</typedescription><content>" + n5 + "</content></note>";           
          notes=notes + "<note><date>" + datestring  + "</date><username>testuser</username><typedescription>" + TerritoryType(type) + "</typedescription><content>" + n + "</content></note>";          
      }      
      if(nt==4) 
      {
          notes=notes + "<note><date>" + n1d + "</date><username>testuser</username><typedescription>" + N1_typedesc + "</typedescription><content>" + n1 + "</content></note>";          
          notes=notes + "<note><date>" + n2d + "</date><username>testuser</username><typedescription>" + N2_typedesc + "</typedescription><content>" + n2 + "</content></note>";
          notes=notes + "<note><date>" + n3d + "</date><username>testuser</username><typedescription>" + N3_typedesc + "</typedescription><content>" + n3 + "</content></note>";
          notes=notes + "<note><date>" + n4d + "</date><username>testuser</username><typedescription>" + N4_typedesc + "</typedescription><content>" + n4 + "</content></note>";          
          notes=notes + "<note><date>" + datestring  + "</date><username>testuser</username><typedescription>" + TerritoryType(type) + "</typedescription><content>" + n + "</content></note>";          
      }      
      if(nt==3) 
      {
          notes=notes + "<note><date>" + n1d + "</date><username>testuser</username><typedescription>" + N1_typedesc + "</typedescription><content>" + n1 + "</content></note>";          
          notes=notes + "<note><date>" + n2d + "</date><username>testuser</username><typedescription>" + N2_typedesc + "</typedescription><content>" + n2 + "</content></note>";
          notes=notes + "<note><date>" + n3d + "</date><username>testuser</username><typedescription>" + N3_typedesc + "</typedescription><content>" + n3 + "</content></note>";
          notes=notes + "<note><date>" + datestring  + "</date><username>testuser</username><typedescription>" + TerritoryType(type) + "</typedescription><content>" + n + "</content></note>";          
      }
      if(nt==2) 
      {
          notes=notes + "<note><date>" + n1d + "</date><username>testuser</username><typedescription>" + N1_typedesc + "</typedescription><content>" + n1 + "</content></note>";
          notes=notes + "<note><date>" + n2d + "</date><username>testuser</username><typedescription>" + N2_typedesc + "</typedescription><content>" + n2 + "</content></note>";
          notes=notes + "<note><date>" + datestring  + "</date><username>testuser</username><typedescription>" + TerritoryType(type) + "</typedescription><content>" + n + "</content></note>";          
      }  
      if(nt==1) 
      {
          notes=notes + "<note><date>" + n1d + "</date><username>testuser</username><typedescription>" + N1_typedesc + "</typedescription><content>" + n1 + "</content></note>";
          notes=notes + "<note><date>" + datestring  + "</date><username>testuser</username><typedescription>" + TerritoryType(type) + "</typedescription><content>" + n + "</content></note>";          
      }  
      if(nt==0) 
      {
          notes=notes + "<note><date>" + datestring  + "</date><username>testuser</username><typedescription>" + TerritoryType(type) + "</typedescription><content>" + n + "</content></note>";          
      }       

      notes=notes + "</notes>";
      
      var url = "db_SaveRow.php?addressguid=" + addressguid + "&type=" + type + 
                "&phonetype=" + phonetype + "&language=" + language + "&notes=" + notes + "&initdate=" + initdate + "&moddate=" + datestring;
        
      downloadUrl(url, function(data, responseCode) {
        if (responseCode == 200 && data.length >= 1) {

        switch  (markername){
                case "marker_resident":
                  marker_resident[index].infowindow.close();
                  break;
                case "marker_resident_home":
                  marker_resident_home[index].infowindow.close();
                  break;
                case "marker_resident_nt":
                  marker_resident_nt[index].infowindow.close();
                  break;
                case "marker_dnc":
                  marker_dnc[index].infowindow.close();
                  break;
                case "marker_phone":
                  marker_phone[index].infowindow.close();
                  break;
                case "marker_phone_home":
                  marker_phone_home[index].infowindow.close();
                  break;
                case "marker_phone_nt":
                  marker_phone_nt[index].infowindow.close();
                  break;
        }  // end of switch       
         // document.getElementById("message").innerHTML = "Location Saved.";
        };
      });
    }
    

    function downloadUrl(url, callback) {
      var request = window.ActiveXObject ?
          new ActiveXObject('Microsoft.XMLHTTP') :
          new XMLHttpRequest;

      request.onreadystatechange = function() {
        if (request.readyState == 4) {
          request.onreadystatechange = doNothing;
          callback(request.responseText, request.status);
        }
      };

      request.open('GET', url, true);
      request.send(null);
    }
    
    function ZeroPadding(number){
        if (number.toString().length == 1) {return "0" + number.toString();}
        else {
            return number.toString();
        };
    };
    function doNothing() {}
    </script>

    </body>
</html>
