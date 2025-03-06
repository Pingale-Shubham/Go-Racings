<?php
include 'gRconn.php';
// //$serverName = "110.227.185.209";
// $serverName = "SWYOM\GORACINGS";
// $connectionOptions = array(
//     "Database" => "Race",
//     "Uid" => "sa",
//     "PWD" => "Heshavi@123"
// );

// Establish the connection
// $conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Get the selected date from the GET parameters
$RaceDateandTime = $_GET['date-selected']; // Make sure this matches the parameter name sent from the frontend
// $RaceDateandTime = "2024-05-11";
// Define the query to call the SQL Server function
$query = "SELECT * FROM dbo.GetEventByDate(?)";

// Prepare the SQL statement
$stmt = sqlsrv_prepare($conn, $query, array(&$RaceDateandTime));

if (!$stmt) {
    die(print_r(sqlsrv_errors(), true));
}

// Execute the SQL statement
$result = sqlsrv_execute($stmt);

if ($result === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Fetch the results
while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    // Handle each row of results as needed
    echo "<br>"." Race Name: " . $row['RaceName'] . "<br>" . " Race Date & Time : " . date("F j, Y h:i A", strtotime($row['RaceDateandTime'])) . "<br>";
}

// Clean up resources
sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
?>
