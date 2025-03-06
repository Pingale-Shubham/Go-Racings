<?php

$serverName = "110.227.185.209";
// $serverName = "SWYOM\GORACINGS";
// $serverName = "SWYOMSOFT\GORACINGS";
// $connectionInfo = array( "Database"=>"Race", "UID"=>"sa", "PWD"=>"gosusat@123");
$connectionInfo = array("Database" => "Race", "UID" => "sa", "PWD" => "Heshavi@123");
$conn = sqlsrv_connect($serverName, $connectionInfo);
//$color = "brown";
if ($conn) {
    //echo "<font color='$color'>Connection to the site successful. Welcome!</font>";
} else {
    //echo "<font color='$color'>We're experiencing some technical difficulties. Please try again later.</font>";
    //die( print_r(sqlsrv_errors(), true));
}

?>