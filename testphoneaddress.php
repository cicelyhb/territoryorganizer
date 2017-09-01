<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>testjquery</title> 
    </head>
    <body>
        <table>
            <tr>
                <td><input type="text" value="Copy and Paste HTML:" readonly> </td>
            </tr>
            <tr>
                <td><textarea id="html" rows="15" cols="120" value=""/></textarea></td>
            </tr>
            <tr>
                <td><input type="button" value="Find Elements" onclick="javascript:getData()"/></td>
            </tr>
            
             <tr>
                <td><textarea id="elements" rows="15" cols="120" value=""/></textarea></td>
            </tr>
    </table>
         
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type=”text/javascript”>
   var ExternalURL = "http://www.addresses.com/reverse-address"; // This address must not contain any leading “http://”
   var ContentLocationInDOM = “#someNode > .childNode“; // If you’re trying to get sub-content from the page, specify the “CSS style” jQuery syntax here, otherwise set this to “null”

   $(document).ready(loadContent);
   function loadContent()
   {
      var QueryURL = “http://anyorigin.com/get?url=” + ExternalURL + “&callback=?”;
      $.getJSON(QueryURL, function(data){
         if (data && data != null && typeof data == “object” && data.contents && data.contents != null && typeof data.contents == “string”)
         {
            data = data.contents.replace(/<script[^>]*>[sS]*?</script>/gi, ”);
            if (data.length > 0)
            {
               if (ContentLocationInDOM && ContentLocationInDOM != null && ContentLocationInDOM != “null”)
               {
                  $(‘#queryResultContainer’).html($(ContentLocationInDOM, data));
               }
               else
               {
                  $(‘#queryResultContainer’).html(data);
               }
            }
         }
      });
   }
</script>
<div id=”queryResultContainer”/>
        <?php
        // put your code here
        ?>
    </body>
</html>
