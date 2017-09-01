<?php
include("db_ConnectionInfo.php");

// Opens a connection to a MS SQL Server
$connectionInfo = array("UID"=>$username,"PWD"=>$password,"Database"=>$database);
$conn = sqlsrv_connect( $server, $connectionInfo);

//Build Select query
$tsql = "SELECT AddressGUID,TerritoryNumber,Latitude,Longitude,FormattedAddress,Type,Residents FROM dbo.Territory WHERE TerritoryNumber = 1";

$stmt = sqlsrv_query($conn,$tsql);

if ( $stmt )  
{  
     echo "Statement executed.<br>\n";  
}   
else   
{  
     echo "Error in statement execution.\n";  
     die( print_r( sqlsrv_errors(), true));  
}  

//* Iterate through the result set printing a row of data upon each iteration.*/  
  
while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC))  
{  
     echo "AddressGUID: ".$row[0]."\n";  
     echo "TerritoryNumber: ".$row[1]."\n";  
     echo "Latitude: ".$row[2]."\n"; 
     echo "Longitude: ".$row[3]."\n"; 
     echo "FormattedAddress: ".$row[4]."\n"; 
     echo "Type: ".$row[5]."\n"; 
     echo "Residents: ".$row[6]."<br>\n";  
     echo "-----------------<br>\n";  
}  

/* Free statement and connection resources. */  
sqlsrv_free_stmt( $stmt);  
sqlsrv_close( $conn);
?>
